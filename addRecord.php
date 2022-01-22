<?php
/**
 * This file requires config.php and may require editor.php on valid submissions
 * (see below).
 * 
 * 
 * This file examines form data submitted to it and determines whether the data is
 * valid. Data is considered valid if and only if:
 *  - Form field entries for firstName, lastName, and idNumber have matching 
 *    entries in the PERSONNEL table.
 *  - The length of any entry does not exceed its maximum as prescribed by the
 *    table contraints.
 *  - A duplicate entry (idNumber primary key) does not already exist in the PATRON
 *    table.
 * 
 * Failing any one of the above conditions, the user is returned to the waiver page
 * with a corresponding status and error alert.
 * If a valid submission is posted, the submission is entered into table PATRON and
 * the user is passed onto the certificate page.
 * 
 * Links to waiver.php and certificate.php.
 * 
 */


require "config.php";

if (isset($_POST['submit'])) {

  $sendMail = true;

  $firstName   = strtoupper($_POST['firstName']);
  $lastName    = strtoupper($_POST['lastName']);
  $idNumber    = $_POST['idNumber'];

  $sql = "SELECT fName, lName, idNumber
          FROM  PERSONNEL
          WHERE fName = '$firstName'
              AND lName = '$lastName'
              AND idNumber = $idNumber";

  $result = mysqli_query($connection, $sql);

  try{
    if (empty($result)){
      throw new Exception ("Identity mismatch: unable to verify identity");
    }

    $age         = $_POST['age'];
    $email       = strtoupper($_POST['email']);
    $address     = strtoupper($_POST['address']);
    $city        = strtoupper($_POST['city']);
    $province    = strtoupper($_POST['province']);

    $e_relation  = strtoupper($_POST['emergency_relation']);
    $e_firstName = strtoupper($_POST['emergency_firstName']);
    $e_lastName  = strtoupper($_POST['emergency_lastName']);
    $e_phone     = $_POST['emergency_phone'];

    $ini_para1   = strtoupper($_POST['initials_para1']);
    $ini_para2   = strtoupper($_POST['initials_para2']);


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

  if (empty($result)){
    throw new Exception ("Invalid form data: field lengths have been exceeded in one or more entries");
  }

  $result = mysqli_query($connection, $sql);
  } catch (Exception $e) {
    $log = fopen('error.txt', 'w');
    fwrite($log, $e);
    fclose($log);

    $sendMail =false;

    if ((strpos($e, 'Identity mismatch') !== false)){
      $fault = 'invalid';
    } elseif (strpos($e, 'Duplicate entry') !== false) {
      $fault = 'exists';
    } else {
      $fault = 'failed';
    }

    header("Location: waiver.php?status=" . $fault);

  }

 require "editor.php";
 header("Location: certificate.php?patron=" . $idNumber);
  
} else {
  header("Location: waiver.php?status=unknown");
}
?>