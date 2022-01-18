<?php
require "config.php";


// Assume id number has been entered.

if (isset($_POST['submit'])) {
    $idNumber = $_POST['idNumber'];

    $statement = "SELECT fName 
                FROM PATRON
                WHERE idNumber='$idNumber'";
                
    mysqli_query($connection, $statement);
}



?>