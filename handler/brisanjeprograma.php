<?php
include "../dbBroker.php";

$programid = $_GET['programid'];
$sql = "DELETE FROM program WHERE programID='" . $programid . "'";
$conn->query($sql) or die($sql);

header("Location:sviprogrami.php");
