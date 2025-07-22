<?php
session_start();
if ($_SESSION['USER'] == "") {
    header("location:index.php");
} else {
    require_once("connection.php");

    $fid = $_REQUEST['ffid'];

    if(isset($_POST['change'])) {
        if(isset($_POST['fac_id'])) {
            $gid=$_POST['optionId'];
            $fac_id= $_POST['fac_id'];
            $qry="update group_stud_tbl set faculty_id=$fac_id where gsid=$gid";
            $run=mysqli_query($con, $qry);
            if($run) {
                header("Location:allocated_group.php");
                
            }
        }
   
    // echo "<script>alert('$qry');</script>";
    }

    ?>
    <!doctype html>
    <html class="no-js " lang="en">

    <!-- Mirrored from thememakker.com/templates/oreo/university/html/students.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 18 Dec 2023 15:37:36 GMT -->

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=Edge">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <meta name="description" content="Responsive Bootstrap 4 and web Application ui kit.">

        <title>Progress Pilot</title>
        <link rel="icon" href="favicon.ico" type="image/x-icon">
        <!-- Favicon-->
        <link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.min.css">
        <link href="assets/plugins/jquery-datatable/dataTables.bootstrap4.min.css" rel="stylesheet">
        <!-- Custom Css -->
        <link rel="stylesheet" href="assets/css/main.css">
        <link rel="stylesheet" href="assets/css/color_skins.css">

        <style>
            #sp1 {
                display: inline-block;
                width: 120px;
                overflow: hidden;
                white-space: nowrap;
                text-overflow: ellipsis;
            }
        </style>
    </head>

    <body class="theme-blush">
        <!-- Page Loader -->
        <div class="page-loader-wrapper">
            <div class="loader">
                <div class="m-t-30"><img class="zmdi-hc-spin" src="assets/images/logo.svg" width="48" height="48"
                        alt="Oreo"></div>
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

            include "adminsidebar.php";

        }


        ?>
        

        <section class="content profile-page">
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-7 col-md-6 col-sm-12">
                        <h2>Allocated Groups
                            <small class="text-muted">Welcome to Progress Pilot</small>
                        </h2>
                    </div>
                </div>
            </div>
          

          
                







                <div class="container-fluid" id="myDiv1">
                    <div class="row clearfix">
                        <div class="col-md-12">
                            <div class="card student-list p-3">
                                <div class="header">
                                    <h2><strong>Groups</strong> List of <strong><?php
                                     $qry="select f_name from faculty_tbl where fid=$fid";
                                     $r=mysqli_query($con,$qry);
                                     $row = mysqli_fetch_assoc($r);
                                     echo $row['f_name'];
                                     ?></strong></h2>
                                    <ul class="header-dropdown">



                                    </ul>
                                </div>
                                <form method="post">
                                <div class="row clearfix">
                                
                                    <?php
                                    $res = mysqli_query($con, "SELECT * FROM `group_stud_tbl` where faculty_id = '$fid'");
                                    if(mysqli_num_rows($res)<=0)
                                    {
                                        ?>
                                        <center>
                                           
                                                <div class="card">
                                                    <div class="body" >
                                                        <?php  echo "<h6>No Groups Allocate Yet</h6>"; ?>
                                                    </div>
                                                </div>
                                           
                                        </center>
                                        <?php
                                    }else{
                                        
                                    
                                    $i = 1;
                                    while ($row = mysqli_fetch_array($res)) {

                                        if ($i == 1) {
                                            ?>
                                            <div class="col-sm-12 col-md-6 col-lg-3">
                                                <div class="card social_widget2">
                                                    <div class="body data text-center">
                                                        <ul class="list-unstyled m-b-0">
                                                            <li class="m-b-20">
                                                                <!-- <i class="zmdi zmdi-thumb-up col-blue"></i> -->
                                                                <h4 class="m-t-0 m-b-0"><img src="upload/<?php echo $row['image'];  ?>" alt="grp img"
                                                                        height="150px" width="150px"></h4>
                                                                <!-- <span>Post View</span> -->
                                                            </li>
                                                            <li>
                                                                <i class="zmdi zmdi-graduation-cap"></i><span></span>

                                                            </li>
                                                        </ul>
                                                    </div>

                                                    <div class="name facebook">
                                                        <ul class="list-unstyled m-b-30">
                                                            <li class="m-b-20">
                                                                <div class="progress-container">
                                                                    <span id="sp1" class="progress-badge">
                                                                        <?php if ($row['name1'] == "") {
                                                                            echo "&nbsp";
                                                                        } else {
                                                                            echo $row['name1'];
                                                                        } ?>
                                                                    </span>

                                                                    <span class="progress-badge" style="float:right;">
                                                                        <?php echo $row['div1']; ?>
                                                                    </span><br>
                                                                    <span class="progress-badge" style="float:right;">
                                                                        <?php if ($row['rn1'] == "") {
                                                                            echo "&nbsp";
                                                                        } else {
                                                                            echo $row['rn1'];
                                                                        } ?>
                                                                    </span>

                                                                </div>
                                                            </li>
                                                            <li class="m-b-20">
                                                                <div class="progress-container">
                                                                    <span class="progress-badge" id="sp1">
                                                                        <?php if ($row['name2'] == "") {
                                                                            echo "&nbsp";
                                                                        } else {
                                                                            echo $row['name2'];
                                                                        } ?>
                                                                    </span>

                                                                    <span class="progress-badge" style="float:right;">
                                                                        <?php echo $row['div2']; ?>
                                                                    </span><br>
                                                                    <span class="progress-badge" style="float:right;">
                                                                        <?php if ($row['rn2'] == "") {
                                                                            echo "&nbsp";
                                                                        } else {
                                                                            echo $row['rn2'];
                                                                        } ?>
                                                                    </span>
                                                                </div>
                                                            </li>
                                                            <li class="m-b-20">
                                                                <div class="progress-container">
                                                                    <span class="progress-badge" id="sp1">
                                                                        <?php if ($row['name3'] == "") {
                                                                            echo "&nbsp";
                                                                        } else {
                                                                            echo $row['name3'];
                                                                        } ?>
                                                                    </span>

                                                                    <span class="progress-badge" style="float:right;">
                                                                        <?php echo $row['div3']; ?>
                                                                    </span><br>
                                                                    <span class="progress-badge" style="float:right;">
                                                                        <?php if ($row['rn3'] == "") {
                                                                            echo "&nbsp";
                                                                        } else {
                                                                            echo $row['rn3'];
                                                                        } ?>
                                                                    </span>

                                                                </div>
                                                            </li>
                                                            <li class="m-b-20">
                                                                <div class="progress-container">
                                                                    <span class="progress-badge" id="sp1">
                                                                        <?php echo $row['name4']; ?>
                                                                        <?php if ($row['name4'] == "") {
                                                                            echo "&nbsp";
                                                                        } else {
                                                                            echo $row['name4'];
                                                                        } ?>
                                                                    </span>

                                                                    <span class="progress-badge" style="float:right;">
                                                                        <?php echo $row['div4']; ?>
                                                                    </span><br>
                                                                    <span class="progress-badge" style="float:right;">
                                                                        <?php if ($row['rn4'] == "") {
                                                                            echo "&nbsp";
                                                                        } else {
                                                                            echo $row['rn4'];
                                                                        } ?>
                                                                    </span>

                                                                </div>
                                                            </li>
                                                        </ul>
                                                        <h5><i class="zmdi zmdi-pin-account m-r-10"></i><span>
                                                            <?php echo "GROUP ".$row['gsid']."&nbsp;"; ?> 
                                                        <?php if($_SESSION['USER'] == "HEAD"){?>
                                                        <i class="zmdi zmdi-edit " style="cursor: pointer;" data-toggle="modal" data-target="#smallModal" onclick="setOptionId(<?php echo $row['gsid']; ?>)" style="font-size: 20px;"></i>
                                                    <?php } ?>
                                                    </span>
                                                        </h5>
                                                        
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                            <?php $i++;
                                        } else if ($i == 2) { ?>
                                                <div class="col-sm-12 col-md-6 col-lg-3">
                                                    <div class="card social_widget2">
                                                        <div class="body data text-center">
                                                            <ul class="list-unstyled m-b-0">
                                                                <li class="m-b-20">
                                                                    <!-- <i class="zmdi zmdi-thumb-up col-blue"></i> -->
                                                                    <h4 class="m-t-0 m-b-0"><img src="upload/<?php echo $row['image'];  ?>" alt="grp img"
                                                                            height="150px" width="150px"></h4>
                                                                    <!-- <span>Post View</span> -->
                                                                </li>
                                                                <li>
                                                                    <i class="zmdi zmdi-graduation-cap"></i><span></span>

                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <div class="name dribbble">
                                                            <ul class="list-unstyled m-b-30">
                                                                <li class="m-b-20">
                                                                    <div class="progress-container">
                                                                        <span id="sp1" class="progress-badge">
                                                                        <?php if ($row['name1'] == "") {
                                                                            echo "&nbsp";
                                                                        } else {
                                                                            echo $row['name1'];
                                                                        } ?>
                                                                        </span>

                                                                        <span class="progress-badge" style="float:right;">
                                                                        <?php echo $row['div1']; ?>
                                                                        </span><br>
                                                                        <span class="progress-badge" style="float:right;">
                                                                        <?php if ($row['rn1'] == "") {
                                                                            echo "&nbsp";
                                                                        } else {
                                                                            echo $row['rn1'];
                                                                        } ?>
                                                                        </span>

                                                                    </div>
                                                                </li>
                                                                <li class="m-b-20">
                                                                    <div class="progress-container">
                                                                        <span class="progress-badge" id="sp1">
                                                                        <?php if ($row['name2'] == "") {
                                                                            echo "&nbsp";
                                                                        } else {
                                                                            echo $row['name2'];
                                                                        } ?>
                                                                        </span>

                                                                        <span class="progress-badge" style="float:right;">
                                                                        <?php echo $row['div2']; ?>
                                                                        </span><br>
                                                                        <span class="progress-badge" style="float:right;">
                                                                        <?php if ($row['rn2'] == "") {
                                                                            echo "&nbsp";
                                                                        } else {
                                                                            echo $row['rn2'];
                                                                        } ?>
                                                                        </span>
                                                                    </div>
                                                                </li>
                                                                <li class="m-b-20">
                                                                    <div class="progress-container">
                                                                        <span class="progress-badge" id="sp1">
                                                                        <?php if ($row['name3'] == "") {
                                                                            echo "&nbsp";
                                                                        } else {
                                                                            echo $row['name3'];
                                                                        } ?>
                                                                        </span>

                                                                        <span class="progress-badge" style="float:right;">
                                                                        <?php echo $row['div3']; ?>
                                                                        </span><br>
                                                                        <span class="progress-badge" style="float:right;">
                                                                        <?php if ($row['rn3'] == "") {
                                                                            echo "&nbsp";
                                                                        } else {
                                                                            echo $row['rn3'];
                                                                        } ?>
                                                                        </span>

                                                                    </div>
                                                                </li>
                                                                <li class="m-b-20">
                                                                    <div class="progress-container">
                                                                        <span class="progress-badge" id="sp1">
                                                                        <?php echo $row['name4']; ?>
                                                                        <?php if ($row['name4'] == "") {
                                                                            echo "&nbsp";
                                                                        } else {
                                                                            echo $row['name4'];
                                                                        } ?>
                                                                        </span>

                                                                        <span class="progress-badge" style="float:right;">
                                                                        <?php echo $row['div4']; ?>
                                                                        </span><br>
                                                                        <span class="progress-badge" style="float:right;">
                                                                        <?php if ($row['rn4'] == "") {
                                                                            echo "&nbsp";
                                                                        } else {
                                                                            echo $row['rn4'];
                                                                        } ?>
                                                                        </span>

                                                                    </div>
                                                                </li>
                                                            </ul>

                                                            <h5><i class="zmdi zmdi-pin-account m-r-10"></i><span>
                                                            <?php echo "GROUP ".$row['gsid']."&nbsp;"; ?> 
<?php if($_SESSION['USER'] == "HEAD"){?>
                                                        <i class="zmdi zmdi-edit  " style="cursor: pointer;" data-toggle="modal" data-target="#smallModal" onclick="setOptionId(<?php echo $row['gsid']; ?>)" style="font-size: 20px;"></i>
                                                    <?php } ?>
                                                    </span>
                                                        </h5>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php $i++;
                                        } else if ($i == 3) { ?>
                                                    <div class="col-sm-12 col-md-6 col-lg-3">
                                                        <div class="card social_widget2">
                                                            <div class="body data text-center">
                                                                <ul class="list-unstyled m-b-0">
                                                                    <li class="m-b-20">
                                                                        <!-- <i class="zmdi zmdi-thumb-up col-blue"></i> -->
                                                                        <h4 class="m-t-0 m-b-0"><img src="upload/<?php echo $row['image'];  ?>" alt="grp img"
                                                                                height="150px" width="150px"></h4>
                                                                        <!-- <span>Post View</span> -->
                                                                    </li>
                                                                    <li>
                                                                        <i class="zmdi zmdi-graduation-cap"></i><span></span>

                                                                    </li>
                                                                </ul>
                                                            </div>
                                                            <div class="name twitter">
                                                                <ul class="list-unstyled m-b-30">
                                                                    <li class="m-b-20">
                                                                        <div class="progress-container">
                                                                            <span id="sp1" class="progress-badge">
                                                                        <?php if ($row['name1'] == "") {
                                                                            echo "&nbsp";
                                                                        } else {
                                                                            echo $row['name1'];
                                                                        } ?>
                                                                            </span>

                                                                            <span class="progress-badge" style="float:right;">
                                                                        <?php echo $row['div1']; ?>
                                                                            </span><br>
                                                                            <span class="progress-badge" style="float:right;">
                                                                        <?php if ($row['rn1'] == "") {
                                                                            echo "&nbsp";
                                                                        } else {
                                                                            echo $row['rn1'];
                                                                        } ?>
                                                                            </span>

                                                                        </div>
                                                                    </li>
                                                                    <li class="m-b-20">
                                                                        <div class="progress-container">
                                                                            <span class="progress-badge" id="sp1">
                                                                        <?php if ($row['name2'] == "") {
                                                                            echo "&nbsp";
                                                                        } else {
                                                                            echo $row['name2'];
                                                                        } ?>
                                                                            </span>

                                                                            <span class="progress-badge" style="float:right;">
                                                                        <?php echo $row['div2']; ?>
                                                                            </span><br>
                                                                            <span class="progress-badge" style="float:right;">
                                                                        <?php if ($row['rn2'] == "") {
                                                                            echo "&nbsp";
                                                                        } else {
                                                                            echo $row['rn2'];
                                                                        } ?>
                                                                            </span>
                                                                        </div>
                                                                    </li>
                                                                    <li class="m-b-20">
                                                                        <div class="progress-container">
                                                                            <span class="progress-badge" id="sp1">
                                                                        <?php if ($row['name3'] == "") {
                                                                            echo "&nbsp";
                                                                        } else {
                                                                            echo $row['name3'];
                                                                        } ?>
                                                                            </span>

                                                                            <span class="progress-badge" style="float:right;">
                                                                        <?php echo $row['div3']; ?>
                                                                            </span><br>
                                                                            <span class="progress-badge" style="float:right;">
                                                                        <?php if ($row['rn3'] == "") {
                                                                            echo "&nbsp";
                                                                        } else {
                                                                            echo $row['rn3'];
                                                                        } ?>
                                                                            </span>

                                                                        </div>
                                                                    </li>
                                                                    <li class="m-b-20">
                                                                        <div class="progress-container">
                                                                            <span class="progress-badge" id="sp1">
                                                                        <?php echo $row['name4']; ?>
                                                                        <?php if ($row['name4'] == "") {
                                                                            echo "&nbsp";
                                                                        } else {
                                                                            echo $row['name4'];
                                                                        } ?>
                                                                            </span>

                                                                            <span class="progress-badge" style="float:right;">
                                                                        <?php echo $row['div4']; ?>
                                                                            </span><br>
                                                                            <span class="progress-badge" style="float:right;">
                                                                        <?php if ($row['rn4'] == "") {
                                                                            echo "&nbsp";
                                                                        } else {
                                                                            echo $row['rn4'];
                                                                        } ?>
                                                                            </span>

                                                                        </div>
                                                                    </li>
                                                                </ul>
                                                                <h5><i class="zmdi zmdi-pin-account m-r-10"></i><span>
                                                            <?php echo "GROUP ".$row['gsid']."&nbsp;"; ?> 
<?php if($_SESSION['USER'] == "HEAD"){?>
                                                        <i class="zmdi zmdi-edit " style="cursor: pointer;" data-toggle="modal" data-target="#smallModal" onclick="setOptionId(<?php echo $row['gsid']; ?>)" style="font-size: 20px;"></i>
                                                    <?php } ?>
                                                    </span>
                                                        </h5>
                                                            </div>
                                                        </div>
                                                    </div>

                                            <?php $i++;
                                        } else if ($i == 4) { ?>
                                                        <div class="col-sm-12 col-md-6 col-lg-3">
                                                            <div class="card social_widget2">
                                                                <div class="body data text-center">
                                                                    <ul class="list-unstyled m-b-0">
                                                                        <li class="m-b-20">
                                                                            <!-- <i class="zmdi zmdi-thumb-up col-blue"></i> -->
                                                                            <h4 class="m-t-0 m-b-0"><img src="upload/<?php echo $row['image'];  ?>" alt="grp img"
                                                                                    height="150px" width="150px"></h4>
                                                                            <!-- <span>Post View</span> -->
                                                                        </li>
                                                                        <li>
                                                                            <i class="zmdi zmdi-graduation-cap"></i><span></span>

                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                                <div class="name youtube">
                                                                    <ul class="list-unstyled m-b-30">
                                                                        <li class="m-b-20">
                                                                            <div class="progress-container">
                                                                                <span id="sp1" class="progress-badge">
                                                                        <?php if ($row['name1'] == "") {
                                                                            echo "&nbsp";
                                                                        } else {
                                                                            echo $row['name1'];
                                                                        } ?>
                                                                                </span>

                                                                                <span class="progress-badge" style="float:right;">
                                                                        <?php echo $row['div1']; ?>
                                                                                </span><br>
                                                                                <span class="progress-badge" style="float:right;">
                                                                        <?php if ($row['rn1'] == "") {
                                                                            echo "&nbsp";
                                                                        } else {
                                                                            echo $row['rn1'];
                                                                        } ?>
                                                                                </span>

                                                                            </div>
                                                                        </li>
                                                                        <li class="m-b-20">
                                                                            <div class="progress-container">
                                                                                <span class="progress-badge" id="sp1">
                                                                        <?php if ($row['name2'] == "") {
                                                                            echo "&nbsp";
                                                                        } else {
                                                                            echo $row['name2'];
                                                                        } ?>
                                                                                </span>

                                                                                <span class="progress-badge" style="float:right;">
                                                                        <?php echo $row['div2']; ?>
                                                                                </span><br>
                                                                                <span class="progress-badge" style="float:right;">
                                                                        <?php if ($row['rn2'] == "") {
                                                                            echo "&nbsp";
                                                                        } else {
                                                                            echo $row['rn2'];
                                                                        } ?>
                                                                                </span>
                                                                            </div>
                                                                        </li>
                                                                        <li class="m-b-20">
                                                                            <div class="progress-container">
                                                                                <span class="progress-badge" id="sp1">
                                                                        <?php if ($row['name3'] == "") {
                                                                            echo "&nbsp";
                                                                        } else {
                                                                            echo $row['name3'];
                                                                        } ?>
                                                                                </span>

                                                                                <span class="progress-badge" style="float:right;">
                                                                        <?php echo $row['div3']; ?>
                                                                                </span><br>
                                                                                <span class="progress-badge" style="float:right;">
                                                                        <?php if ($row['rn3'] == "") {
                                                                            echo "&nbsp";
                                                                        } else {
                                                                            echo $row['rn3'];
                                                                        } ?>
                                                                                </span>

                                                                            </div>
                                                                        </li>
                                                                        <li class="m-b-20">
                                                                            <div class="progress-container">
                                                                                <span class="progress-badge" id="sp1">
                                                                        <?php echo $row['name4']; ?>
                                                                        <?php if ($row['name4'] == "") {
                                                                            echo "&nbsp";
                                                                        } else {
                                                                            echo $row['name4'];
                                                                        } ?>
                                                                                </span>

                                                                                <span class="progress-badge" style="float:right;">
                                                                        <?php echo $row['div4']; ?>
                                                                                </span><br>
                                                                                <span class="progress-badge" style="float:right;">
                                                                        <?php if ($row['rn4'] == "") {
                                                                            echo "&nbsp";
                                                                        } else {
                                                                            echo $row['rn4'];
                                                                        } ?>
                                                                                </span>

                                                                            </div>
                                                                        </li>
                                                                    </ul>
                                                                    <h5><i class="zmdi zmdi-pin-account m-r-10"></i><span>
                                                            <?php echo "GROUP ".$row['gsid']."&nbsp;"; ?> 
<?php if($_SESSION['USER'] == "HEAD"){?>
                                                        <i class="zmdi zmdi-edit" style="cursor: pointer;" data-toggle="modal" data-target="#smallModal" onclick="setOptionId(<?php echo $row['gsid']; ?>)" style="font-size: 20px;"></i>
                                                    <?php } ?>
                                                    </span>
                                                        </h5>
                                                                </div>
                                                            </div>
                                                        </div>

                                            <?php $i = 1;
                                        }
                                    } 
                                    } ?>
                                </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>















                
          

        </section>
        <div class="modal fade" id="smallModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="title" id="smallModalLabel">Change Faculty</h4>
            </div>
            <form method="post">
            <input type="hidden" id="optionId" name="optionId">
            <div class="modal-body"> 
                
                                    <?php
                                    $a="select fid,f_name from faculty_tbl";
                                    $r=mysqli_query($con, $a);
                                    while ($x=mysqli_fetch_array($r)) { ?>
                                        <div class="form-check">
                                        <input type="radio" class="form-check-input" name="fac_id" value="<?php echo $x[0]; ?>">
                                        <label class="form-check-label"><?php echo $x[1]; ?></label>
                                    </div>
                                  <?php
                                    }
                                    
                                    
                                    ?>

                </div>
            <div class="modal-footer">
                                <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">CLOSE</button>

                <input type="submit" class="btn btn-success  waves-effect" value="SAVE CHANGES" name="change" id="chnage">
            </div>
            </form>
        </div>
    </div>
</div>
<script>
function setOptionId(optionId) {
    document.getElementById('optionId').value = optionId;
}
</script>
        <!-- Jquery Core Js -->
        <script src="script.js"></script>
        <script src="assets/bundles/libscripts.bundle.js"></script> <!-- Bootstrap JS and jQuery v3.2.1 -->
        <script src="assets/bundles/vendorscripts.bundle.js"></script> <!-- slimscroll, waves Scripts Plugin Js -->
        <script src="assets/bundles/datatablescripts.bundle.js"></script>

        <script src="assets/bundles/mainscripts.bundle.js"></script><!-- Custom Js -->
        <script src="assets/js/pages/tables/jquery-datatable.js"></script>
       
    </body>

   
    </html>
<?php } ?>