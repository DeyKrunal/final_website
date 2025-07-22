<?php
session_start();
require_once("connection.php");

if ($_SESSION['USER'] == "") {
    header("location:index.php");
} else {
    $fid = $_SESSION['ID'];
    $date=date("Y/m/d");
 


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
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <style>
            #sp1 {
                display: inline-block;
                width: 170px;
                overflow: hidden;
                white-space: nowrap;
                text-overflow: ellipsis;
            }
            #sp2 {
                display: inline-block;
                width: 150px;
                overflow: hidden;
                white-space: nowrap;
                text-overflow: ellipsis;
            }
        </style>
    </head>

    <body class="theme-blush">
         <!--Page Loader -->
        <div class="page-loader-wrapper">
            <div class="loader">
                <div class="m-t-30"><img class="zmdi-hc-spin" src="assets/images/logo.svg" width="48" height="48"
                        alt="Oreo"></div>
                <p>Please wait...</p>
            </div>
        </div>
         <!--Overlay For Sidebars -->
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
        <!-- Chat-launcher -->
       

        <section class="content profile-page">
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-7 col-md-6 col-sm-12">
                        <h2>Expected Internal Marks
                            <small class="text-muted">Welcome to Progress Pilot</small>
                        </h2>
                    </div>

                </div>
            </div>
            <div class="container-fluid">
                <div class="row clearfix">
                    <?php
                    $res = mysqli_query($con, "select * from group_stud_tbl where faculty_id=$fid");
                    if (mysqli_num_rows($res) == 0) {
                        ?>
                        <center>

                            <div class="card">
                                <div class="body">
                                    <?php echo "<h6>No Groups Allocate Yet</h6>";
                                    ?>
                                </div>
                            </div>

                        </center>
                    <?php } else {
                        while ($row = mysqli_fetch_array($res)) { ?>
                            <div class="col-md-6 col-lg-4">
                                <div class="card">
                                    <div class="body">
                                        <center>
                                            <h3>
                                                <?php echo "GROUP " . $row['gsid']; ?>
                                            </h3>
                                        </center>
                                       
                                        <!-- <strong style="color:black;float:left;">Project</strong>
                                        <strong style="color:black;float:right;">Attendance</strong> -->
                                    
                                     
                                        <center>
                                            
                                            <?php if(mysqli_num_rows(mysqli_query($con, "select * from progress_tbl where grpid=$row[0]")) == 0){
                                                 $sql1 = "INSERT INTO `progress_tbl`(`grpid`, `p1`, `p2`, `p3`, `p4`, `p5`, `p6`, `p7`, `p8`, `p9`, `date`) VALUES ('$row[0]','0','0','0','0','0','0','0','0','0','$date')";
                                                 mysqli_query($con,$sql1);
                                                
                                                }?>
                                            <?php $s = mysqli_query($con, "SELECT  (p1 + p2 + p3 + p4 + p5 + p6 + p7 + p8 + p9) AS total_sum FROM progress_tbl where grpid=$row[0]"); ?>
                                            <h3 class="m-t-0 m-b-0">
                                                <?php

                                                while ($rx = mysqli_fetch_assoc($s)) { 
                                                    $t=$rx['total_sum'];
                                                    $tot=$t*100/900;
                                                    $att = mysqli_num_rows(mysqli_query($con, "select * from attandence_tbl where gid=$row[0]"));
                                                    $att_tot=$att*20/15;
                                                   echo "<strong style='color:black'>".round($tot)."</strong> 
                                                   <sub>/100</sub>&nbsp;&nbsp;
                                                   <span style='border-left: 2px solid black; height: 40px; display: inline-block;'></span>&nbsp;&nbsp;
                                                   <strong style='color:black'>".round($att_tot)."</strong> 
                                                   <sub>/20</sub>&nbsp;&nbsp; = &nbsp;&nbsp;<strong style='color:black'>".(round($att_tot) + round($tot))."</strong> ";

                                                }
                                                 ?>
                                            </h3>
                                            <br>
                                            <strong style="color:black;float:left;">Project</strong>
                                        <strong style="color:black;">Attendance</strong>
                                        <strong style="color:black;float:right;">Total</strong>
                                        <br>
                                            <hr>
                                            <span><h5><strong style="color:#f094a3;">Expected</strong> Internal Marks Out Of <strong style="color:#f094a3">120</strong></h5></span>
                                            <!-- <br> -->
                                            <div style='border-top: 1px solid black;'></div>
                                            <br>
                                            <h6>students Name</h6>
                                        </center>

                                        <table class="table table-hover m-t-20">
                                            
                                            <tbody>
                                                <tr>
                                                    <td id="sp1"><?php if ($row['name1']!=""){echo $row['name1'];}else{echo "&nbsp";} ?></td>
                                                    <td id="sp1">
                                                    <?php if ($row['name2']!=""){echo $row['name2'];}else{echo "&nbsp";} ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td id="sp1"><?php if ($row['name3']!=""){echo $row['name3'];}else{echo "&nbsp";} ?></td>
                                                    <td id="sp1">
                                                    <?php if ($row['name4']!=''){echo $row['name4'];}else{echo "&nbsp";} ?>
                                                    </td>
                                                </tr>
                                                <!-- <tr>
                                                    <td >3th name:</td>
                                                    <td id="sp1">
                                                        <?php echo $row['name3'] ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>4th name:</td>
                                                    <td id="sp1">
                                                        <?php echo $row['name4'] ?>
                                                    </td>
                                                </tr> -->
                                            </tbody>
                                        </table>
                                        
                                        <center>
                                            <div style='border-top: 1px solid black;'></div>
                                            <br>
                                            <h6>Individual Progresses</h6>
                                        </center>
                                        <?php 
                                       $pro=mysqli_query($con,'select * from progress_part_tbl');
                                       $px=array();
                                       while($sj=mysqli_fetch_array($pro)){
                                           array_push($px,$sj[1]);
                                       }

                                       $rj=mysqli_query($con,"select * from progress_tbl where grpid=$row[0]");
                                       while ($rowj = mysqli_fetch_assoc($rj)) { ?>
                                        
                                        
                                         <table class="table table-hover m-t-10">
                                            
                                            <tbody>
                                                <tr>
                                                    <td ><span  id="sp2" class="float-left"><?php echo $px[0];?></span><span class="float-right"><?php echo $rowj['p1']." /100"; ?></span></td>
                                                   
                                                </tr>
                                                <tr>
                                                <td ><span  id="sp2" class="float-left"><?php echo $px[1];?></span><span class="float-right"><?php echo $rowj['p2']." /100"; ?></span></td>

                                                </tr>
                                                <tr>
                                                <td ><span  id="sp2"  class="float-left"><?php echo $px[2];?></span><span class="float-right"><?php echo $rowj['p3']." /100"; ?></span></td>

                                                </tr>
                                                <tr>
                                                <td ><span  id="sp2" class="float-left"><?php echo $px[3];?></span><span class="float-right"><?php echo $rowj['p4']." /100"; ?></span></td>

                                                </tr>
                                                <tr>
                                                <td ><span  id="sp2" class="float-left"><?php echo $px[4];?></span><span class="float-right"><?php echo $rowj['p5']." /100"; ?></span></td>

                                                </tr>
                                                <tr>
                                                <td ><span  id="sp2" class="float-left"><?php echo $px[5];?></span><span class="float-right"><?php echo $rowj['p6']." /100"; ?></span></td>

                                                </tr>
                                                <tr>
                                                <td ><span  id="sp2" class="float-left"><?php echo $px[6];?></span><span class="float-right"><?php echo $rowj['p7']." /100"; ?></span></td>

                                                </tr>
                                                <tr>
                                                <td ><span  id="sp2" class="float-left"><?php echo $px[7];?></span><span class="float-right"><?php echo $rowj['p8']." /100"; ?></span></td>

                                                </tr>
                                                <tr>
                                                <td ><span  id="sp2" class="float-left"><?php echo $px[8];?></span><span class="float-right"><?php echo $rowj['p9']." /100"; ?></span></td>

                                                </tr>

                                            </tbody>
                                        </table>
  <?php } ?>
                                        
                                    </div>
                                </div>
                            </div>
                        <?php }
                    } ?>
                </div>

            </div>
          
           
           
        </section>
        <!-- Jquery Core Js -->
        <script src="assets/bundles/libscripts.bundle.js"></script> <!-- Bootstrap JS and jQuery v3.2.1 -->
        <script src="assets/bundles/vendorscripts.bundle.js"></script> <!-- slimscroll, waves Scripts Plugin Js -->
        <script src="assets/bundles/datatablescripts.bundle.js"></script>

        <script src="assets/bundles/mainscripts.bundle.js"></script><!-- Custom Js -->
        <script src="assets/js/pages/tables/jquery-datatable.js"></script>
    </body>

    <!-- Mirrored from thememakker.com/templates/oreo/university/html/students.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 18 Dec 2023 15:37:36 GMT -->

    </html>
<?php } ?>