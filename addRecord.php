<?php
require "config.php";
if (isset($_POST['submit'])) {

  $firstName = $_POST['firstName'];
  $lastName = $_POST['lastName'];
  $idNumber = $_POST['idNumber'];
  $age = $_POST['age'];
  $email = $_POST['email'];
  $address = $_POST['address'];
  $city = $_POST['city'];
  $province = $_POST['province'];
  $emergency_relation = $_POST['emergency_relation'];
  $emergency_firstName = $_POST['emergency_firstName'];
  $emergency_lastName = $_POST['emergency_lastName'];
  $emergency_phone = $_POST['emergency_phone'];


  $sql  = "INSERT INTO PATRON VALUES (
    '$firstName',
    '$lastName',
    '$idNumber',
    '$age',
    '$email',
    '$address',
    '$city',
    '$province',
    '$emergency_relation',
    '$emergency_firstName',
    '$emergency_lastName',
    '$emergency_phone'
    )";

  mysqli_query($connection, $sql);


 require "editor.php";

 ?>
  <html>
    <script>
      document.location.href="certificationPage.php?patron=<?php echo($idNumber);?>";
    </script>
  </html>

  <?php

} else {
  echo("Something has gone wrong :(");
}

?>