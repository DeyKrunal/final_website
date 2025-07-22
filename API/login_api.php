<?php
include_once("connection.php");
    $response=array();
//     $name = $_POST['name'];
// 	$pwd = $_POST['pwd'];
    $name = $_REQUEST['name'];
	$pwd = $_REQUEST['pwd'];

        $sql="select * from faculty_tbl where f_name='$name'";
        $a = mysqli_num_rows(mysqli_query($con, $sql));
        if ($a > 0) {
            
            $fid=mysqli_fetch_array(mysqli_query($con, $sql));
            if ($fid["f_name"] == $name && password_verify($pwd, $fid["f_pwd"])) {

                 $response["success"]=1;
                $response["fid"]=$fid["fid"];
	            echo json_encode($response);
            }else{
                $response["success"]=0;
	            echo json_encode($response);
            }
        }else{
            $sql="select * from group_stud_tbl where group_name='$name'";
            $a = mysqli_num_rows(mysqli_query($con, $sql));
            if ($a > 0) {
            
                $gid=mysqli_fetch_array(mysqli_query($con, $sql));
                if ($gid["group_name"] == $name && password_verify($pwd, $gid["pass"])) {
                    $response["success"]=2;
                    $response["gid"]=$gid["gsid"];
                    $response["fid"]=$gid["faculty_id"];
                    echo json_encode($response);    

                }else{
                    $response["success"]=0;
                    echo json_encode($response);
                }
            }else{
                $response["success"]=0;
                echo json_encode($response);
            }
        }
	

?>