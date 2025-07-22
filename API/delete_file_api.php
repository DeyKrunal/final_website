<?php

include_once("connection.php");
$fid = $_REQUEST['fid'];
$filename=$_REQUEST['name'];
   $path = '../upload/files/' . $filename;

        if (file_exists($path)) {
            unlink($path); // Delete file from storage

            // Delete file entry from database
            $delete_query = "DELETE FROM upload_data WHERE file_name like '$filename' AND fid=$fid";
            $res=mysqli_query($con,$delete_query);
        }

if($res){
    echo json_encode(array("success"=>"1"));
}else{
    echo json_encode(array("success"=>"0"));
}

?>