<?php

//Connection to the MySQL Server
define('DB_SERVER', 'localhost'); // Mysql hostname, usually localhost
define('DB_USERNAME', 'root');    // Mysql username
define('DB_PASSWORD', 'afrique90'); // Mysql password
define('DB_DATABASE', 'oasisdb'); // Mysql database name

// create new mysqli object
$connection = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
/* check connection */
if (mysqli_connect_errno()) 
{
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}









?>
