<?php

/**
  * Configuration for database connection
  *
  */

$host       = "localhost";
$username   = "root";
$password   = "root"; 
$dbname     = "epiz_30841014_SKI_LIBRARY"; 
$dsn        = "mysql:host=$host;dbname=$dbname";
$options    = array(
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
              ); 

$connection = new mysqli($host, $username, $password, $dbname);

?>