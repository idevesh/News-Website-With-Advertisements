<?php
define('DB_SERVER','');
define('DB_USER','');
define('DB_PASS' ,'');
define('DB_NAME','');
$con = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);

date_default_timezone_set('Asia/Kolkata');


if (mysqli_connect_errno())
{
 echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

?>
