It's a hub for data!
general elastic notes
    dev elastic path:
        http://datahub.listsandleads.elasticsearch.bizj-dev.com:9200
    to delete indexes from elastic:
        curl -sXDELETE <path_to_your_elastic_instance>:<port>/<index> 
        example:
            curl -sXDELETE http://datahub.listsandleads.elasticsearch.bizj-dev.com:9200/rerefinery
        
before you reimport data:
    delete any “.sincedb_<hash?> files from your home dir
    
to run the logstash export:
    run :<path/to/logstash -f <your_file>.conf
    example
        : /opt/logstash/bin/logstash -f listLeads.conf
        you may want to symlink config/logstash/refineryDump.conf to wherever your 
        logstash install lives
if you’ve installed kibana 
    kibana serve
    go to http://localhost:5601/
    
matching:
    run it from /scripts
    'php run.php  meroveus match -e development' where -e is environment 


importing records to match against:
    'sudo /var/www/datahub/scripts/run.php import refinery -e development --file=/home/vagrant/files/refineryDump.csv'