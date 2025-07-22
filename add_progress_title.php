<?php
require_once("connection.php");
session_start();
if($_SESSION['USER'] == "")
{
    header("location:index.php");
}else{
// $fid=$_SESSION['ID'];
// $s="select name_id from progress_name where fid=$fid";
// $res=mysqli_query($con,$s);
// if(mysqli_num_rows($res)>0){
    
// }else{
//    $sql="insert into progress_name (name_id,name1,name2,name3,name4,name5,name6,name7,name8,name9,fid) values('','Project Profile & Objectives','Requirement Specifications','Project Modules & Flow','Data Dictionary & Table Relations','DFD Or USeCase Or UML Etc..','BackEnd Or UserSide','FrontEnd Or AdminSide','Testing & Validations','Documentations',$fid)";
//     mysqli_query($con,$sql);
// }
if(isset($_REQUEST['add']))
{
    $a=array();
    for($j=1;$j<=9;$j++){
        array_push($a,$_REQUEST["p$j"]);
    }
    // $a1=$_REQUEST["p1"];
    // $a2=$_REQUEST["p2"];
    // $a3=$_REQUEST["p3"];
    // $a4=$_REQUEST["p4"];
    // $a5=$_REQUEST["p5"];
    // $a6=$_REQUEST["p6"];
    // $a7=$_REQUEST["p7"];
    // $a8=$_REQUEST["p8"];
    // $a9=$_REQUEST["p9"];

    if($a[0]=="" || $a[1]=="" || $a[2]=="" || $a[3]=="" || $a[4]=="" || $a[5]=="" || $a[6]=="" || $a[7]=="" || $a[8]==""){
        echo "<script>alert('Empty Field..');</script>";
    }else{
       
       for($i=0;$i<9;$i++){
     
            $qry="update progress_part_tbl set pro_name='$a[$i]' where id=$i+1";
            mysqli_query($con,$qry);
            
            
        }
    //    $str="update progress_part_tbl set pro_name='$a',name2='$b',name3='$c',name4='$d',name5='$e',name6='$f',name7='$g',name8='$h',name9='$i' where fid=$fid";
    //    mysqli_query($con,$str);
      
        header("location:add_progress_title.php");
    }
}
?>
<!doctype html>

<html class="no-js " lang="en">

<!-- Mirrored from thememakker.com/templates/oreo/university/html/add-students.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 18 Dec 2023 15:37:36 GMT -->
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<meta name="description" content="Responsive Bootstrap 4 and web Application ui kit.">

<title>Progress Pilot</title>
<link rel="icon" href="favicon.ico" type="image/x-icon">
<!-- Favicon-->
<link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.min.css">
<!-- Dropzone Css -->
<link href="assets/plugins/dropzone/dropzone.css" rel="stylesheet">
<!-- Bootstrap Material Datetime Picker Css -->
<link href="assets/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css" rel="stylesheet" />
<!-- Bootstrap Select Css -->
<link href="assets/plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />
<!-- Custom Css -->
<link rel="stylesheet" href="assets/css/main.css">
<link rel="stylesheet" href="assets/css/color_skins.css">
</head>
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
        <!-- Top Bar -->
        <?php include "navbar.php"; ?>
        <!-- Left Sidebar -->
        <?php
    if ($_SESSION["USER"] == "ADMIN") {

        include "adminsidebar.php";

    } elseif ($_SESSION["USER"] == "HEAD") {

        include "hodsidebar.php";

    } elseif ($_SESSION["USER"] == "FACULTY") {

        include "sidebar.php";

    }

    ?>

<!-- Top Bar -->

<!-- Chat-launcher -->


<section class="content profile-page">
    <div class="block-header">
        <div class="row">
            <div class="col-lg-7 col-md-6 col-sm-12">
                <h2>Manage Titles
                <small class="text-muted">Welcome to Progress Pilot</small>
                </h2>
            </div>
            <!-- <div class="col-lg-5 col-md-6 col-sm-12">
                <button class="btn btn-white btn-icon btn-round float-right m-l-10" type="button">
                    <i class="zmdi zmdi-plus"></i>
                </button>
                <ul class="breadcrumb float-md-right">
                    <li class="breadcrumb-item"><a href="index.html"><i class="zmdi zmdi-home"></i> Oreo</a></li>
                    <li class="breadcrumb-item"><a href="javascript:void(0);">Student</a></li>
                    <li class="breadcrumb-item active">Add</li>
                </ul>
            </div> -->
        </div>
    </div>
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="header">
                        <h2><strong>Progress</strong> Title <small>Add progress title by yourself . . .</small> </h2>
                        <!-- <ul class="header-dropdown">
                            <li class="dropdown"> <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="zmdi zmdi-more"></i> </a>
                                <ul class="dropdown-menu dropdown-menu-right slideUp">
                                    <li><a href="javascript:void(0);" class="waves-effect waves-block">Action</a></li>
                                    <li><a href="javascript:void(0);" class="waves-effect waves-block">Another action</a></li>
                                    <li><a href="javascript:void(0);" class="waves-effect waves-block">Something else</a></li>
                                </ul>
                            </li>
                            <li class="remove">
                                <a role="button" class="boxs-close"><i class="zmdi zmdi-close"></i></a>
                            </li>
                        </ul> -->
                    </div>
                    <form method="post">
                        <?php
                        
                        $pro=mysqli_query($con,'select * from progress_part_tbl');
                        $rw=array();
                        while($s=mysqli_fetch_array($pro)){
                            array_push($rw,$s[1]);
                        } ?>
                    
                    <div class="body">
                        <div class="row clearfix">
                            
                            <div class="col-md-6 col-lg-12">
                                <div class="form-group">
                                    <input type="text" name="p1" class="form-control" value="<?php echo $rw[0] ?>" placeholder="1st Progress Title">
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-12">
                                <div class="form-group">
                                    <input type="text" class="form-control"  name="p2" placeholder="2nd Progress Title" value="<?php echo $rw[1] ?>">
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-12">
                                <div class="form-group">
                                    <input type="text"  name="p3" class="form-control" placeholder="3th Progress Title" value="<?php echo $rw[2] ?>">
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-12">
                                <div class="form-group">
                                    <input type="text" class="form-control"  name="p4" placeholder="4th Progress Title" value="<?php echo $rw[3] ?>">
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-12">
                                <div class="form-group">
                                    <input type="text" class="form-control"  name="p5" placeholder="5th Progress Title" value="<?php echo $rw[4] ?>">
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-12">
                                <div class="form-group">
                                    <input type="text" class="form-control"  name="p6" placeholder="6th Progress Title" value="<?php echo $rw[5] ?>">
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-12">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="p7"  placeholder="7th Progress Title" value="<?php echo $rw[6] ?>">
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-12">
                                <div class="form-group">
                                    <input type="text" class="form-control"  name="p8" placeholder="8th Progress Title" value="<?php echo $rw[7] ?>">
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-12">
                                <div class="form-group">
                                    <input type="text" class="form-control"  name="p9" placeholder="9th Progress Title" value="<?php echo $rw[8] ?>">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <input type="submit" class="btn btn-raised btn-round btn-primary" value="Save" name="add">
                                <input type="reset" class="btn btn-raised btn-round" value="Reset">
                            </div>

                        
                    </div>
                </div>
            
                    </form>
            </div>
        </div>
        
    </div>
</section>
<!-- Jquery Core Js --> 
<script src="assets/bundles/libscripts.bundle.js"></script> <!-- Bootstrap JS and jQuery v3.2.1 -->
<script src="assets/bundles/vendorscripts.bundle.js"></script> <!-- slimscroll, waves Scripts Plugin Js -->  

<script src="assets/plugins/autosize/autosize.js"></script> <!-- Autosize Plugin Js --> 
<script src="assets/plugins/momentjs/moment.js"></script> <!-- Moment Plugin Js --> 
<script src="assets/plugins/dropzone/dropzone.js"></script> <!-- Dropzone Plugin Js -->
<!-- Bootstrap Material Datetime Picker Plugin Js --> 
<script src="assets/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js"></script>

<script src="assets/bundles/mainscripts.bundle.js"></script><!-- Custom Js -->
<script src="assets/js/pages/forms/basic-form-elements.js"></script>
</body>

<!-- Mirrored from thememakker.com/templates/oreo/university/html/add-students.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 18 Dec 2023 15:37:39 GMT -->
</html>
<?php }?>