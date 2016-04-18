# It's a hub for data! :fire::fire::fire:
## general elastic notes
### elastic paths
| | dev | testing | staging | prod |
| --- | --- | ------- | ------- | ---- |
| url | http://elb.es.datahub.bizj-dev.com:9200 | http://elb.es.datahub.bizj-dev.com:9200 | http://elb.es.datahub.bizj-internal.com:9200 | http://elb.es.datahub.bizj-internal.com:9200 |
### to delete indexes from elastic:
```shell
curl -sXDELETE <path_to_your_elastic_instance>:<port>/<index>
```
### example
```shell
curl -sXDELETE http://datahub.listsandleads.elasticsearch.bizj-dev.com:9200/rerefinery
```
## before you reimport data
delete any “.sincedb_<hash?> files from your home dir

## to run the logstash export:
    run :<path/to/logstash -f <your_file>.conf
### example
```shell
/opt/logstash/bin/logstash -f listLeads.conf
```
you may want to symlink config/logstash/refineryDump.conf to wherever your logstash install lives

## if you’ve installed kibana
```shell
kibana serve
```
go to http://localhost:5601/

## importing records to match against
```shell
sudo /var/www/datahub/scripts/run.php import refinery -e development --file=/home/vagrant/files/refineryDump.csv
```

## matching:
run it from /scripts
```shell
php run.php  meroveus match -e development #where -e is environment
```



## aws notes

initiating a re-stash of the data (names of files company.csv and company_stash.json should remain the same)

```shell
aws s3 cp /path/to/company.csv s3://acbj-team-data/datahub/<environment>/company.csv
```
or
```shell
aws s3 cp /datahub/repo/logstash/company_stash.json s3://acbj-team-data/datahub/<environment>/company_stash.json
```

## graph notes
here's a basic graph query
```json
GET lists/_graph/explore
{
    "query": {
		"query_string": {
			"default_field": "_all",
			"query": "chiquita"
		}
	},
	"controls": {
		"use_significance": true,
		"sample_size": 2000,
		"timeout": 5000
	},
	"connections": {
		"vertices": [
			{
				"field": "list_id",
				"size": 5,
				"min_doc_count": 3
			}
		]
	},
	"vertices": [
		{
			"field": "company_name",
			"size": 5,
			"min_doc_count": 3
		},
		{
			"field": "list_id",
			"size": 5,
			"min_doc_count": 3
		},
        {
    		"field": "object_id",
			"size": 5,
			"min_doc_count": 3
		}
	]
}