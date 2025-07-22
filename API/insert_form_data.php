<?php
// Database connection
include("connection.php");

$name1 = $_GET['name1'];
$rno1 = $_GET['rn1'];
$cno1 = $_GET['phno1'];
$email1 = $_GET['email1'];
$div1 = $_GET['div1'];

$name2 = $_GET['name2'];
$rno2 = $_GET['rn2'];
$cno2 = $_GET['phno2'];
$email2 = $_GET['email2'];
$div2 = $_GET['div2'];

$name3 = $_GET['name3'];
$rno3 = $_GET['rn3'];
$cno3 = $_GET['phno3'];
$email3 = $_GET['email3'];
$div3 = $_GET['div3'];

$name4 = $_GET['name4'];
$rno4 = $_GET['rn4'];
$cno4 = $_GET['phno4'];
$email4 = $_GET['email4'];
$div4 = $_GET['div4'];

$gname = $_GET['group_name'];
$pwd = $_GET['pass'];
$hash = password_hash($pwd, PASSWORD_DEFAULT);

$sql = "INSERT INTO `group_stud_tbl`(`name1`, `rn1`, `div1`, `phno1`, `email1`,
 `name2`, `rn2`, `div2`, `phno2`,`email2`, 
 `name3`, `rn3`, `div3`, `phno3`, `email3`, 
 `name4`, `rn4`, `div4`, `phno4`, `email4`,  
 `faculty_id`, `group_name`, `pass`)
 VALUES 
 ('$name1','$rno1','$div1','$cno1','$email1',
 '$name2','$rno2','$div2','$cno2','$email2',
 '$name3','$rno3','$div3','$cno3','$email3',
 '$name4','$rno4','$div4','$cno4','$email4',
 '0','$gname','$hash')";
 
 
 $res = mysqli_query($con,$sql);
 if($res){
     echo json_encode(array("success"=>"1"));
 }else{
     echo json_encode(array("success"=>"0"));
 }

?>