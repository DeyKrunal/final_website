
<?php
require_once("connection.php");
$gname = $_GET['gname'];
$pname = $_GET['pname'];
$tech = $_GET['tech'];


$gname = $_REQUEST['gname'];
$pname = $_REQUEST['pname'];
$tech = $_REQUEST['tech'];
// $img = $_REQUEST['img'];
$gid = $_REQUEST['gid'];

$sql = "UPDATE `group_stud_tbl` SET `group_name`='$gname',`title`='$pname',`tech`='$tech' WHERE `gsid` = $gid";
$res = mysqli_query($con,$sql);


// $q = "SELECT * FROM `pro_profile_tbl` WHERE `g_id` = $gid";
// $r = mysqli_query($con,$q);
// $query = "";

// if(mysqli_num_rows($r) > 0){

//     $query .= "UPDATE `pro_profile_tbl` SET `g_img`='$img',`g_title`='$pname',
// `back_end`='$back',`front_end`='$front',`database_name`='$database' WHERE `g_id` = $gid";

// }else{

//     $sql = "INSERT INTO `pro_profile_tbl`(`g_id`)
//     VALUES ('$gid')";
//     $res = mysqli_query($con,$sql);
//     if($res){
//          $query .= "UPDATE `pro_profile_tbl` SET `g_img`='$img',`g_title`='$pname',
// `back_end`='$back',`front_end`='$front',`database_name`='$database' WHERE `g_id` = $gid";
//     }

// }
// $result = mysqli_query($con,$query);

if($res){
    echo json_encode(array("msg"=>"success"));
}else{
    echo json_encode(array("msg"=>"failure"));
}

?>