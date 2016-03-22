#!/usr/bin/env bash

if [ ! -f /root/environment ]; then
        echo "no /root/environment file, exiting."
        exit
fi

environment=$(cat /root/environment)
logstash_config="/etc/logstash/conf.d/company_stash.json"
data_file="/tmp/company.csv"
current_alias="current"
index="`date +%s`_companies-`date +%Y-%m-%d`"
sqs_queue_url="https://sqs.us-east-1.amazonaws.com/188675239635/acbj-cf-data-datahub-${environment}-jobs"

if [ ${environment} == "production" ]; then
    datahub_url="elb.elasticsearch.datahub.bizj-internal.com:9200"
elif [ ${environment} == "staging" ]; then
    datahub_url="elb.elasticsearch.datahub.bizj-staging.com:9200"
else
    datahub_url="elb.elasticsearch.datahub.bizj-dev.com:9200"
fi

if [ ! -f /tmp/lock.stash ]; then
	touch /tmp/lock.stash
else
	logger "datahub - restash - lock file exists, exiting"
	exit
fi

queue_count=$(aws sqs receive-message --queue-url ${sqs_queue_url} | grep "company.csv\|company_stash.json" | wc -l)

if [ ${queue_count} -gt 0 ]; then
	logger "datahub - restash - s3 file operation event detected - running logstash"
	#grab data csv
	aws s3 cp s3://acbj-team-data-datahub-${environment}/company.csv ${data_file}
	aws s3 cp s3://acbj-team-data-datahub-${environment}/company_stash.json ${logstash_config}
	sed s/companies/${index}/ ${logstash_config} > /tmp/stash.conf
	sed -i s/datahub_url/${datahub_url}/ /tmp/stash.conf

	/opt/logstash/bin/logstash agent -f /tmp/stash.conf < ${data_file}

	#check for and remove current alias from existing indices and alias the new index
	if [ $(curl -sL -w "%{http_code}\n" -XGET ${datahub_url}/${current_alias} -o /dev/null) -eq 200 ]; then
		curl -XPOST "${datahub_url}/_aliases" -d '
		{
			"actions" : [
			{ "remove" : { "index" : "*", "alias" : "'${current_alias}'" } },
			{ "add" : { "index" : "'${index}'", "alias" : "'${current_alias}'" } }
			]
		}'
	#apply current alias to new index
	else
		curl -XPOST "${datahub_url}/_aliases" -d '
		{
			"actions" : [
			{ "add" : { "index" : "'${index}'", "alias" : "'${current_alias}'" } }
			]
		}'
	fi

	#delete indexes older than 14 days if more than 2 indices exist
	if [ `curl -XGET ${datahub_url}/_cat/indices | wc -l` -gt 2 ]; then
		curator --host ${datahub_url} delete indices --older-than 3 --time-unit days --timestring '%Y-%m-%d' > /dev/null
	fi

	aws sqs purge-queue --queue-url ${sqs_queue_url}
	rm -f .sincedb*
	rm -f /tmp/lock.stash

else

	rm -f /tmp/lock.stash
	logger "datahub - restash - no s3 file events detected, exiting."
	exit
fi
