<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "vape_shop";

$connection = mysqli_connect($servername, $username, $password, $database);

if ($connection === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
