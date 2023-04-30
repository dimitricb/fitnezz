<?php

$programtypeid = $_GET['programtypeid'];


include "dbBroker.php";
include "model/program.php";
include "model/programtype.php";

$result=Program::vratiSve($mysqli, " where p.programtypeid =".$programtypeid);

 $nalepi = '<table class="table "><thead><tr><th>Program name</th><th>Duration</th><th>Date</th><th>Price</th><th>Description</th><th>Program type</th></thead><tbody>';

 foreach($result as $program){
    $nalepi=$nalepi.'<tr>';
    $nalepi=$nalepi.'<td>'.$program->program_name.'</td>';
    $nalepi=$nalepi.'<td>'.$program->duration.'</td>';
    $nalepi=$nalepi.'<td>'.$program->date.'</td>';
    $nalepi=$nalepi.'<td>'.$program->price.'</td>';
    $nalepi=$nalepi.'<td>'.$program->description.'</td>';
    $nalepi=$nalepi.'<td>'.$program->programtype->programtypename.'</td>';
    $nalepi=$nalepi.'</tr>';
 }
 
$nalepi=$nalepi.'</tbody></table>';          


echo($nalepi);


 ?>