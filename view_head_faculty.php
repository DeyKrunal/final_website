<?php
session_start();
if($_SESSION['USER'] == "")
{
    header("location:index.php");
}else{
$name=$_SESSION['NAME'];
?>
<!doctype html>

<html class="no-js " lang="en">

<!-- Mirrored from thememakker.com/templates/oreo/university/html/profile.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 18 Dec 2023 15:37:34 GMT -->
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<meta name="description" content="Responsive Bootstrap 4 and web Application ui kit.">

<title>Progress Pilot</title>
<link rel="icon" href="favicon.ico" type="image/x-icon">
<!-- Favicon-->
<link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.min.css">
<!-- Custom Css -->
<link rel="stylesheet" href="assets/css/main.css">
<link rel="stylesheet" href="assets/css/timeline.css">
<link rel="stylesheet" href="assets/css/color_skins.css"></head>
<body class="theme-blush">
<!-- Page Loader -->
<div class="page-loader-wrapper">
    <div class="loader">
        <div class="m-t-30"><img class="zmdi-hc-spin" src="assets/images/logo.svg" width="48" height="48" alt="Oreo"></div>
        <p>Please wait...</p>        
    </div>
</div>
<!-- Overlay For Sidebars -->
<div class="overlay"></div>
<?php include "navbar.php";?>
<?php
        if ($_SESSION["USER"] == "ADMIN") {

            include "adminsidebar.php";

        } elseif ($_SESSION["USER"] == "HEAD") {

            include "hodsidebar.php";

        } elseif ($_SESSION["USER"] == "FACULTY") {

            include "sidebar.php";

        }

        ?>


<section class="content profile-page">
    <div class="block-header">
        <div class="row">
            <div class="col-lg-7 col-md-6 col-sm-12">
                <h2>Profile
                <small>Details About Head Faculty</small>
                </h2>
            </div>
            <div class="col-lg-5 col-md-6 col-sm-12">                
                <!-- <button class="btn btn-white btn-icon btn-round float-right m-l-10" type="button">
                    <i class="zmdi zmdi-edit"></i>
                </button> -->
                <!-- <ul class="breadcrumb float-md-right">
                    <li class="breadcrumb-item"><a href="index.html"><i class="zmdi zmdi-home"></i> Oreo</a></li>
                    <li class="breadcrumb-item active">Profile</li>
                </ul>                 -->
            </div>
        </div>
    </div>   
    <?php 
                            include "connection.php";
                           $res=mysqli_query($con,"select * from faculty_tbl f join headfaculty_tbl h on h.fid=f.fid where h_status='1' ");
                           while($row=mysqli_fetch_array($res)) { 
                        
                    ?> 
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-4 col-md-12">
                <div class="card profile-header">
                    <div class="body text-center">
                   
                    <div class="profile-image"> <img src="upload/<?php echo $row['f_img'];?>" alt="Head Faculty"> </div>
                        <div>
                            <br>
                            <h3 class="m-b-0"><strong><?php echo $row['f_name']?></strong>  </h3>
                            <h5><span class="job_post">Head Faculty</span></h5>
                            <h5><p><?php echo $row['f_email']?></p></h5>
                        </div>
                       
                      
                    </div>                    
                </div>                               
                
            </div>
            <div class="col-lg-8 col-md-12">
                <div class="card">
                   
                    <div class="tab-content">
                        <div class="tab-pane body active" id="about">
                            <ul class="list-unstyled">
                                <h4>
                                <li><p><i class="zmdi zmdi-graduation-cap m-r-5"></i><strong>Degree:</strong> <?php echo $row['f_qualif']?></p></li>
                                <li><p><i class="zmdi zmdi-star m-r-5"></i><strong>Experience:</strong> <?php echo $row['f_exp']?> Years in IT Education Field</p></li>
                                <li><p><i class="zmdi zmdi-favorite m-r-5"></i><strong>Designation:</strong> <?php echo $row['f_desc']?></p></li>
                                <li><p><i class="zmdi zmdi-label m-r-5"></i><strong>Address:</strong> <?php echo $row['f_address']?></p></li>
                                <li><p><i class="zmdi zmdi-label m-r-5"></i><strong>Contact No:</strong> <?php echo $row['f_phno']?></p></li>
                           </h4>
                            </ul>
                            <hr>
                           </div>
                      
                        </div>
        </div>        
    </div>
    <?php  } ?>
</section>
<!-- Jquery Core Js --> 
<script src="assets/bundles/libscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js --> 
<script src="assets/bundles/vendorscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js --> 

<script src="assets/bundles/knob.bundle.js"></script> <!-- Jquery Knob Plugin Js -->

<script src="assets/bundles/mainscripts.bundle.js"></script><!-- Custom Js -->
<script src="assets/js/pages/charts/jquery-knob.js"></script>
</body>

<!-- Mirrored from thememakker.com/templates/oreo/university/html/profile.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 18 Dec 2023 15:37:36 GMT -->
</html>
<?php }?>