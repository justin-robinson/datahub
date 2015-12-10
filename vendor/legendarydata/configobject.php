<?php
 /* @filename configobject.php
 * @description config object for handling configuration params
 * @author D.Feiveson
 * @created_at 20120517
 * @updated_at 20120517
  * @description configuration object - get config details
  * @author D.Hopley
  * @created_at 20120622
  * @updated_at 20121017 tdf -- removed all non-static attributes, renamed file to all lowercase
  */
 //dh - TODO: get into a config.inc or constanst.inc (there) and read in ...
 // dh ; later db config get into the db and then pull real details from a config table ...
define( "VERSION", 3.98 );

class ConfigObject {

        /*public $dbHost = "localhost";
        public $dbUser = "ssc";
        public $dbPwd = "sscmin12";
        public $dbDB = "ssc_beta";*/

        //private static $SSCHost = "dev.stratascore.com";

        private static $MeroveusHost = "http://uup.ipoxy.com:2012";
        private static $MeroveusRootHost = "http://uup.ipoxy.com:2012";
        //private static $MeroveusRootHost = "http://uup.ipoxy.com:2013";
        //private static $MeroveusAKEY = "aAyz87OsQ0HG2uz1yxPWsMD92"; //"QAN7ewwqpVNYaIGpxER6I23uI";
        //private static $MeroveusEKEY = "pCsYWh5uhFfxc73ZwcG0cIAQJ";
        private static $MeroveusWebAccessKey;
        private static $MeroveusWebEnvKey;
        private static $MeroveusRootAccessKey;
        private static $ReadOnlyHost = "NoneSpecified";
        private static $ReadOnlyHostLDAP = "NoneSpecified"; //Data Center url authenticated via activeDirectory
        private static $LDAPServerHost = "NoneSpecified"; //activeDirectory Host
	private static $ShutdownPage = ""; //valid filepath to page that gets thrown up for maintenance, etc.
        //private static $MeroveusRootKey;


        private static $DBHost;
        private static $DBUser;
        private static $DBPassword;
        private static $DBName;

        private static $LDAPRDN;
        private static $LDAPPass;
        private static $LDAPDN;

        private static $SubmissionLink = "";
	private static $ExtSubmissionLink = "";

        public function __construct() {

        }
        public static function Get( $sParam ) {
                if ( isset( self::${$sParam} ) ) {
                        return self::${$sParam};
                }
                return null;
        }

        public static function Set( $sParam, $sVal ) {
                self::${$sParam} = $sVal;
        }

}//end configObject

?>
