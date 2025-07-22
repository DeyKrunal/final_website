<?php

session_start();
if ($_SESSION['USER'] == "") {
    header("location:index.php");
} else {
    require_once("connection.php");
    $fid = $_SESSION['ID'];


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
                width: 150px;
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

            include "sidebar.php";

        }
        ?>
        <!-- Chat-launcher -->
       

        <section class="content profile-page">
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-7 col-md-6 col-sm-12">
                        <h2>Progress OF Groups
                            <small class="text-muted">Welcome to Progress Pilot</small>
                        </h2>
                    </div>

                </div>
            </div>
<?php 
    $qry="select p.grpid,p1,p2,p3,p4,p5,p6,p7,p8,p9,name1,name2,name3,name4 from progress_tbl p join group_stud_tbl g on p.grpid=g.gsid where g.faculty_id=$fid ORDER BY grpid";
    $res=mysqli_query($con,$qry);
    while ($row=mysqli_fetch_array($res)) {
?>
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="card">
                        <div class="header">
                            <h2> <strong>GROUP <?php echo "&nbsp;&nbsp;".$row[0];?></strong> <small><b><?php echo $row['name1']."&nbsp;&nbsp&nbsp;".$row['name2']."&nbsp;&nbsp&nbsp;".$row['name3']."&nbsp;&nbsp&nbsp;".$row['name4']."&nbsp;&nbsp&nbsp";?></b></small> </h2>
                        </div>


                        <div class="body">

                            <div class="progress m-b-10" style="height:12px;">
                                <div class="progress-bar progress-bar-danger progress-bar-striped" role="progressbar"
                                    aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $row[1];?>%;">  <?php echo $row[1]."%";?></div>
                            </div>

                            <div class="progress m-b-10" style="height:12px;">
                                <div class="progress-bar progress-bar-striped b-primary" role="progressbar"
                                    aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $row[2];?>%;">  <?php echo $row[2]."%";?></div>
                            </div>

                            <div class="progress m-b-10" style="height:12px;">
                                <div class="progress-bar progress-bar-warning progress-bar-striped" role="progressbar"
                                    aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $row[3];?>%;">  <?php echo $row[3]."%";?>  </div>
                            </div>

                            <div class="progress m-b-10" style="height:12px;">
                                <div class="progress-bar progress-bar-success  progress-bar-striped" role="progressbar"
                                    aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $row[4];?>%;">  <?php echo $row[4]."%";?> </div>
                            </div>
                            <div class="progress m-b-10" style="height:12px;">
                                <div class="progress-bar progress-bar-success progress-bar-striped bg-dark" role="progressbar"
                                    aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $row[5];?>%;">  <?php echo $row[5]."%";?>  </div>
                            </div>

                            <div class="progress m-b-10" style="height:12px;">
                                <div class="progress-bar progress-bar-success progress-bar-striped " role="progressbar"
                                    aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $row[6];?>%;">  <?php echo $row[6]."%";?> </div>
                            </div>

                            <div class="progress m-b-10" style="height:12px;">
                                <div class="progress-bar progress-bar-warning progress-bar-striped" role="progressbar"
                                    aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $row[7];?>%;">  <?php echo $row[7]."%";?></div>
                            </div>

                            <div class="progress m-b-10" style="height:12px;">
                                <div class="progress-bar progress-bar-striped b-primary" role="progressbar"
                                    aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $row[8];?>%;">  <?php echo $row[8]."%";?> </div>
                            </div>

                            <div class="progress m-b-10" style="height:12px;">
                                <div class="progress-bar progress-bar-danger progress-bar-striped" role="progressbar"
                                    aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $row[9];?>%;">  <?php echo $row[9]."%";?>  </div>
                            </div>

                        </div>

                    </div>
                </div>
            </div>

<?php }?>
            
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