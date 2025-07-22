<?php

include_once ("connection.php");
$response = array();

$u_email = $_REQUEST['email'];
$u_psw = $_REQUEST['pwd'];

$hashedPassword = password_hash($u_psw, PASSWORD_DEFAULT);

$sql = "update group_stud_tbl set pass='$hashedPassword' where email1='$u_email' or email2='$u_email' or email3='$u_email' or email4='u_email'";
$res = mysqli_query($con, $sql);
if ($res) {
    $response["success"] = 1;
    echo json_encode($response);
} else {
    $response["success"] = 0;
    echo json_encode($response);
}

?>