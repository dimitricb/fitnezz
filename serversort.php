<?php  
 //sort.php  
 include "dbBroker";
 include "model/program.php";
 include "model/programtype.php";

 $output = '';  
 $order = $_POST["order"];

 if($order == 'desc')  
 {  
      $order = 'asc';  
 }  
 else  
 {  
      $order = 'desc';  
 }  

 public $programid;
	public $program_name;
	public $duration;
	public $date;
    public $price;
    public $description;
    public $programtype;

 $uslov = " ORDER BY ".$_POST["column_name"]." ".$_POST["order"]."";  
 $programs = Predstava::vratiSve($mysqli,$uslov);
 $output .= '  
 <table class="table"> <tbody> 
      <tr>  
        <th><a class="column_sort" id="program_name" data-order="'.$order.'" href="#">Program name</a></th>
        <th><a class="column_sort" id="duration" data-order="'.$order.'" href="#">Duration</a></th>
        <th><a class="column_sort" id="date" data-order="'.$order.'" href="#">Date</a></th>
        <th><a class="column_sort" id="price" data-order="'.$order.'" href="#">Price</a></th>
        <th><a class="column_sort" id="description" data-order="'.$order.'" href="#">Description</a></th>
        <th>Program type</th>
        <th>Options</th>     
      </tr>  
 ';  
 foreach($programs as $program){
    $output=$output.'<tr>';
    $output=$output.'<td>'.$program->program_name.'</td>';
    $output=$output.'<td>'.$program->duration.'</td>';
    $output=$output.'<td>'.$program->date.'</td>';
    $output=$output.'<td>'.$program->price.'</td>';
    $output=$output.'<td>'.$program->description.'</td>';
    $output=$output.'<td>'.$program->programtype->programtypename.'</td>';
    $output=$output.'<td><a href="brisanjeprograma.php?id='.$program->programid.'">
    <img class="icon-images" src="img/trash.png" width="20px" height="20px"/>
</a>
<a href="izmenaprograma.php?id='.$program->programid.'">
    <img class="icon-images" src="img/refresh.png" width="20px" height="20px" />
</a></td>';
    $output=$output.'</tr>';
 }
 $output .= '</tbody></table>';  
 echo $output;  
 ?>  