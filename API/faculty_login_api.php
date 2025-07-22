<?php
include_once("connection.php");
$response=array();
    $name = $_REQUEST['name'];
	$pwd = $_REQUEST['pwd'];

        $sql="select * from faculty_tbl where f_email='$name'";
        $a = mysqli_num_rows(mysqli_query($con, $sql));
        if ($a > 0) {
            
            $fid=mysqli_fetch_array(mysqli_query($con, $sql));
            if ($fid["f_email"] == $name && password_verify($pwd, $fid["f_pwd"])) {

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