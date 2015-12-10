<?php
 /* @filename dlog.php
  * @description development log class
  * @author D.Hopley
  * @created_at 20120430 - dh ; simple means to log / notice details
  */

class dlog {
   var $file;
   public function __construct($devlog=null) {
    $this->file="/tmp/dlog";
    //$fh = fopen($file,'a+');

   }//end __construct()
//
  public function msg($msg) {
    $daStamp=date("Ymd-His");
    //$file="/tmp/dlog";
    // $fh = fopen($file,'c+');
    $fh = fopen($this->file,'a');
    $msg = "[".$daStamp."] - " . $msg . "\n";
    fwrite($fh,$msg);
    fclose($fh);
 }//end msg

}//eof

