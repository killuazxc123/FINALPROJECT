<?php

$hostName = "localhost:3307";
$dbUser = "root";
$dbPassword = "";
$dbName = "login_register";
$connections = mysqli_connect($hostName, $dbUser, $dbPassword, $dbName);
if (!$connections) {
    die("Something went wrong;");
}

?>