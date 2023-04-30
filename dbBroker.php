<?php

$host="localhost";
$db="fitnezz";
$user="root";
$pass="";

$conn=new mysqli($host,$user,$pass,$db);

if($conn->connect_errno){
exit("Failed connection: ".$conn->connect_error);
}




?>