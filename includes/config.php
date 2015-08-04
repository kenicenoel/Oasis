<?php

//Connection to the MySQL Server
define('DB_SERVER', 'localhost'); // Mysql hostname, usually localhost
define('DB_USERNAME', 'admin');    // Mysql username
define('DB_PASSWORD', '0@sis'); // Mysql password
define('DB_DATABASE', 'oasisdb'); // Mysql database name

// create new mysqli object
$connection = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
/* check connection */
if (mysqli_connect_errno()) 
{
    printf("Sorry. Could not connect to the OASIS database. Here's the error: %s\n", mysqli_connect_error());
    exit();
}









?>
