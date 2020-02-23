<?php 

/**
 * functions
 * 
 * @package techzy-php-core
 * @author AkashSingh
 */

$db = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
$db->set_charset('utf8mb4');
if(mysqli_connect_error()) {
    _error('DB_ERROR');
}
 ?>