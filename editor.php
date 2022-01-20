<?php


$content = file_get_contents('waiver_master.xml');

$new = str_replace('firstName_p', $firstName, $content);
$new = str_replace('lastName_p', $lastName, $new);
$new = str_replace('idN_p', $idNumber, $new);
$new = str_replace('email_p', $email, $new);
$new = str_replace('address_p', $address, $new);
$new = str_replace('city_p', $city, $new);
$new = str_replace('province_p', $province, $new);
$new = str_replace('e_relationship_p', $e_relation, $new);
$new = str_replace('e_firstName_p', $e_firstName, $new);
$new = str_replace('e_lastName_p', $e_lastName, $new);
$new = str_replace('e_phone_p', $e_phone, $new);


$file = fopen('waiver.xml', 'w');

fwrite($file, $new);
fclose($file);


?>
