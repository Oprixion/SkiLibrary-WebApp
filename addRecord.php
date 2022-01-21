<?php
require "config.php";

if (isset($_POST['submit'])) {

  $sendMail = true;

  $firstName   = $_POST['firstName'];
  $lastName    = $_POST['lastName'];
  $idNumber    = $_POST['idNumber'];

  // $sql = "SELECT fName, lName, idNumber
  //         FROM  PERSONNEL
  //         WHERE fName = $firstName
  //             AND lName = $lastName
  //             AND idNumber = $idNumber";

  // $result = mysqli_query($connection, $sql);

  // if (!$sql){
  //   header("Location: waiver.php?status=invalid");
  // }

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
  } catch (Exception $e) {
    $log = fopen('error.txt', 'w');
    fwrite($log, $e);
    fclose($log);

    $sendMail =false;

    if (str_contains($e, 'Duplicate entry')){
      $fault = 'exists';
    } else {
      $fault = 'failed';
    }
    
    ?>
  <html>
    <script>
      document.location.href="waiver.php?status=<?php echo($fault);?>";
    </script>
  </html>

  <?php

  }


 require "editor.php";
//  $script_args = "python mail.py" . " " . $filename;

// if ($sendMail){
//   echo shell_exec($script_args);
// }

 ?>
  <html>
    <script>
      document.location.href="certificate.php?patron=<?php echo($idNumber);?>";
    </script>
  </html>

  <?php
  

} else {
  header("Location: waiver.php");
}

?>