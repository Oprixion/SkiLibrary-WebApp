<?php
require "config.php";
if (isset($_POST['submit'])) {

  $firstName   = $_POST['firstName'];
  $lastName    = $_POST['lastName'];
  $idNumber    = $_POST['idNumber'];
  $age         = $_POST['age'];
  $email       = $_POST['email'];
  $address     = $_POST['address'];
  $city        = $_POST['city'];
  $province    = $_POST['province'];

  $e_relation  = $_POST['emergency_relation'];
  $e_firstName = $_POST['emergency_firstName'];
  $e_lastName  = $_POST['emergency_lastName'];
  $e_phone     = $_POST['emergency_phone'];

  $ini_para1   = $_POST['initials_para1'];
  $ini_para2   = $_POST['initials_para2'];

try{
  $sql  = "INSERT INTO PATRON VALUES (
    '$firstName',
    '$lastName',
    '$idNumber',
    '$age',
    '$email',
    '$address',
    '$city',
    '$province',

    '$e_relation',
    '$e_firstName',
    '$e_lastName',
    '$e_phone',

    '$ini_para1',
    '$ini_para2'
    )";

  $result = mysqli_query($connection, $sql);
  echo($result);
  } catch (Exception $e) {
    $log = fopen('error.txt', 'w');
    fwrite($log, $e);
    fclose($log);
    ?>
  <html>
    <script>
      document.location.href="waiver.php?status=<?php echo('failed');?>";
    </script>
  </html>

  <?php

  }


 require "editor.php";

 ?>
  <html>
    <script>
      document.location.href="certificate.php?patron=<?php echo($idNumber);?>";
    </script>
  </html>

  <?php
  

} else {
  echo("Something has gone wrong :(");
}

?>