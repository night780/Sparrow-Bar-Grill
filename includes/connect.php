<?php

$hostname = "localhost";
$database = "capulusb_grc";

$username = "capulusb_Test";
$password = "CapulusTest";


$cnxn = @mysqli_connect($hostname, $username, $password, $database);

if (!$cnxn) {
    die("Connection Failed" . mysqli_connect_error());
}
?>