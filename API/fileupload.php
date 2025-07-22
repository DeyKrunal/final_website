<?php
    
include_once("connection.php");
if(isset($_FILES['file'])){
    $profile = $_FILES['file']['name'];
    $profile = str_replace(' ', '_', $profile);
    $fid = $_REQUEST['fid'];
    $path = "../upload/files/" . $profile;
    
    if(move_uploaded_file($_FILES['file']['tmp_name'], $path)){
        $sql = "INSERT INTO `upload_data`(`file_name`, `fid`, `status`) VALUES ('$profile','$fid','0')";
        $res = mysqli_query($con,$sql);
        if($res){
            $response["success"]=1;
        }
    }
    echo json_encode($response);
}else{
    $response["success"]=0;
    echo json_encode($response);
}

?>