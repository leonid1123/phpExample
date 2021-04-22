<?php
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'ts_user');
define('DB_PASSWORD', '1234567890');
define('DB_NAME', 'tushkanchik');

$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
} else {
    //echo "connected";
}
?>