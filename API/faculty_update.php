<?php

include_once("connection.php");

if(isset($_GET['fid'])){ $fid = $_GET['fid'];}

if(isset($_GET['f_name'])){$f_name = $_GET['f_name'];}
if(isset($_GET['f_email'])){$f_email = $_GET['f_email'];}
if(isset($_GET['f_phno'])){$f_phno = $_GET['f_phno'];}
if(isset($_GET['f_img'])){$f_img = $_GET['f_img'];}
if(isset($_GET['f_desc'])){$f_desc = $_GET['f_desc'];}
if(isset($_GET['f_qualif'])){$f_qualif = $_GET['f_qualif'];}
if(isset($_GET['f_exp'])){$f_exp = $_GET['f_exp'];}
if(isset($_GET['f_address'])){$f_address = $_GET['f_address'];}
if(isset($_GET['f_pwd'])){$f_pwd = $_GET['f_pwd'];}

$hashedPassword = password_hash($f_pwd, PASSWORD_DEFAULT);


echo $sql = "UPDATE faculty_tbl SET f_name = '$f_name', f_email = '$f_email', f_phno = '$f_phno', f_img = '$f_img', f_desc = '$f_desc', f_qualif = '$f_qualif', f_exp = '$f_exp', f_address = '$f_address', f_pwd = '$hashedPassword' WHERE fid = '$fid'";

if (mysqli_query($con, $sql)) {    
    echo json_encode(array("message" => "Record updated successfully"));
} else {
    echo json_encode(array("message" => "Error updating record: " . mysqli_error($con)));
}

mysqli_close($con);

?>