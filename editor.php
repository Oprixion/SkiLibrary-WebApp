<?php

/**
 * Must be included in addRecord.php
 * 
 * This file reads waiver_master.xml and replaces fields within that document
 * with variables (assumed to be strings), according to the respective
 * placeholder of each.
 * waiver_master.xml is then emailed by a Python script executed in the shell.
 * 
 * NOTE: the remote server host disallows .py shell scripts.
 */

$content = file_get_contents('waiver_master.xml');

$new  = str_replace('firstName_p', $firstName, $content);
$new  = str_replace('lastName_p', $lastName, $new);
$new  = str_replace('id_p', $idNumber, $new);
$new  = str_replace('email_p', $email, $new);
$new  = str_replace('address_p', $address, $new);
$new  = str_replace('city_p', $city, $new);
$new  = str_replace('province_p', $province, $new);

$new  = str_replace('e_relationship', $e_relation, $new);
$new  = str_replace('e_firstName', $e_firstName, $new);
$new  = str_replace('e_lastName', $e_lastName, $new);
$new  = str_replace('e_phone', $e_phone, $new);

$new  = str_replace('ini_p', $ini_para1, $new);

$date = date('jS \d\a\y \of F, Y ');
$new  = str_replace('p_date', $date, $new);


$filename = 'waiver_' . $lastName . ',' . $firstName . '.xml';
$file = fopen($filename, 'w');

fwrite($file, $new);
fclose($file);


$script_args = "python mail.py" . " " . $filename;

if ($sendMail){
  echo shell_exec($script_args);
}


?>
