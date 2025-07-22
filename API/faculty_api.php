<?php
include_once("connection.php");
$response=array();
 
$sql="SELECT * FROM faculty_tbl";
	
$result = mysqli_query($con,$sql);

$res=array();


while ($row=mysqli_fetch_array($result)) 
{
	
	$faculty=array();
	$faculty['fid']=$row[0];
	$faculty['f_name']=$row[1];
	$faculty['f_email']=$row[2];
    $faculty['f_phno']=$row[3];
    $faculty['f_img']=$row[4];
    $faculty['f_desc']=$row[5];
    $faculty['f_qualif']=$row[6];
    $faculty['f_exp']=$row[7];
    $faculty['f_address']=$row[8];
    $faculty['f_pwd']=$row[9];
	array_push($res, $faculty);

}

echo json_encode($res);




 
?>
