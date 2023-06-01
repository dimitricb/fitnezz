<?php

$host = "localhost";
$db = "fitnezz";
$user = "root";
$pass = "";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_errno) {
    printf("Konekcija neuspešna: %s\n", $conn->connect_error);
    exit();
}
$conn->set_charset("utf8");
