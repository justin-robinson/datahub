# It's a hub for data! :fire::fire::fire:
## general elastic notes
### elastic paths
| | dev | testing | staging | prod |
| --- | --- | ------- | ------- | ---- |
| url | http://datahub.listsandleads.elasticsearch.bizj-dev.com:9200 | http://datahub.listsandleads.elasticsearch.bizj-dev.com:9200 | http://elb.es.production-datahub.bizj-internal.com:9200 | http://elb.es.production-datahub.bizj-internal.com:9200 |
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

    
## matching:
run it from /scripts
```shell
php run.php  meroveus match -e development #where -e is environment
```


## importing records to match against
```shell
sudo /var/www/datahub/scripts/run.php import refinery -e development --file=/home/vagrant/files/refineryDump.csv
```

## aws notes

initiating a re-stash of the data (names of files company.csv and company_stash.json should remain the same)

```shell
aws s3 cp /path/to/company.csv s3://acbj-team-data/datahub/company.csv
```
or
```shell
aws s3 cp /datahub/repo/logstash/company_stash.json s3://acbj-team-data/datahub/company_stash.json
```
