<?php

    
    include('connection.php');
    $gid = $_GET['gid'];
    $file = $_GET['name'];
    $profile = $_FILES['profile']['name'];
    
    $sql = "Select image from `group_stud_tbl` where `gsid` = $gid";
    $res = mysqli_query($con,$sql);
    $x = mysqli_fetch_assoc($res);
    // echo $x['image'];
    if($x['image'] != 'group.png' && $x['image'] != 'man.jpg' && $file != 'group.png' && $file != 'man.jpg'){
        if (file_exists("../upload/" . $x['image'])) {
            unlink("../upload/" . $x['image']);
        }
    }
    $fac_img = $_FILES['profile']['name'];
     $fac_img=str_replace(' ', '_',  $fac_img);
    $path = "../upload/" . $fac_img;
    
    move_uploaded_file(str_replace(' ', '_',$_FILES['profile']['tmp_name']), $path);
     $file=str_replace(' ', '_', $file);
        
        $query = "UPDATE `group_stud_tbl` SET `image`='$file' WHERE `gsid` = '$gid'";
        $res = mysqli_query($con,$query);
        if($res){
            $response["success"]=1;
        }else{
            $response["success"]=0;
        
    }
    echo json_encode($response);

?>