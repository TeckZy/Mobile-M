<?php 
require_once('constants.php');
require_once('core/functions.php');
define("SYS_URL", ''. get_system_url(). '');

require_once('config.php');



if(DEBUGGING) {
    ini_set("display_errors", true);
    error_reporting(E_ALL ^ E_NOTICE);
} else {
    ini_set("display_errors", false);
    error_reporting(0);
}

?>