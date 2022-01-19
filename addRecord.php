<?php
require "config.php";
if (isset($_POST['submit'])) {

  $firstName = $_POST['firstName'];
  $lastName = $_POST['lastName'];
  $idNumber = $_POST['idNumber'];
  $age = $_POST['age'];
  $address = $_POST['address'];
  $city = $_POST['city'];
  $province = $_POST['province'];
  $emergency_firstName = $_POST['emergency_firstname'];
  $emergency_lastName = $_POST['emergency_lastname'];
  $emergency_phoneNumber = $_POST['emergency_phoneNumber'];

  $sql  = "INSERT INTO PATRON VALUES (
    '$firstName',
    '$lastName',
    '$idNumber',
    '$age',
    '$address',
    '$city',
    '$province',
    '$emergency_firstName',
    '$emergency_lastName',
    '$emergency_phoneNumber'
    )";

  mysqli_query($connection, $sql);

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