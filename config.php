<?php
/**
  * Configuration for database connection
  *
  */

  $host       = "localhost";
  $username   = "root";
  $password   = "root"; 
  $dbname     = "SKI_LIBRARY"; 
  
  $connection = new mysqli($host, $username, $password, $dbname);

?>