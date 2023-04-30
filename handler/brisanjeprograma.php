<?php
include "../dbBroker.php";

$id = $_GET['programid'];
$sql = "DELETE FROM program WHERE programid='" . $id . "'";
$conn->query($sql) or die($sql);

header("Location:pretraga.php");
