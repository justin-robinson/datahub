<?php
 session_start();
 $libpath = $_SERVER["DOCUMENT_ROOT"]; //dh - TODO: add libpath to constants.inc
 set_include_path(get_include_path() . PATH_SEPARATOR . $libpath);
 require_once($_SERVER["DOCUMENT_ROOT"] .'/lib/functions.php');
?>
