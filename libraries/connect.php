<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "kalori_web";
$port = 3306;

$connection = mysqli_connect($host, $username, $password, $database, $port);

if ($connection == false) {
    die("Error connecting to MySQL" . mysqli_connect_error());
}
