<?php
include_once("connection.php");
$response=array();
    $name = $_REQUEST['name'];
	$pwd = $_REQUEST['pwd'];

    $sql="select * from group_stud_tbl where group_name='$name'";
    $a = mysqli_num_rows(mysqli_query($con, $sql));
    if ($a > 0) {
    
        $gid=mysqli_fetch_array(mysqli_query($con, $sql));
        if ($gid["group_name"] == $name && password_verify($pwd, $gid["pass"])) {
            $response["success"]=1;
            echo json_encode($response);    

        }else{
            $response["success"]=0;
            echo json_encode($response);
        }
    }else{
        $response["success"]=0;
        echo json_encode($response);
    }
?>