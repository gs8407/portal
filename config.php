<?php
define('DB_SERVER', 'localhost'); // db host
define('DB_USERNAME', ''); // db user username
define('DB_PASSWORD', ''); // db user password
define('DB_NAME', ''); // db name

/* Attempt to connect to MySQL database */
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
