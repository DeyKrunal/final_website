<?php
session_start();
if ($_SESSION['USER'] == "") {
    header("location:index.php");
} else {
    require_once("connection.php");
    ?>
    <!doctype html>
    <html class="no-js " lang="en">

    <!-- Mirrored from thememakker.com/templates/oreo/university/html/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 18 Dec 2023 15:36:58 GMT -->

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=Edge">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <meta name="description" content="Responsive Bootstrap 4 and web Application ui kit.">
        <title>Progress Pilot</title>
        <link rel="icon" href="favicon.ico" type="image/x-icon"> <!-- Favicon-->
        <link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/plugins/jvectormap/jquery-jvectormap-2.0.3.min.css" />
        <link rel="stylesheet" href="assets/plugins/morrisjs/morris.min.css" />

        <!-- Custom Css -->
        <link rel="stylesheet" href="assets/css/main.css">
        <link rel="stylesheet" href="assets/css/color_skins.css">
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
        <?php include "sidebar.php"; ?>

        <!-- Right Sidebar -->


        <!-- Main Content -->
        <section class="content home">
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-5 col-md-5 col-sm-12">
                        <h2>Dashboard
                            <small>Welcome to Progress Pilot</small>
                        </h2>
                    </div>
                    <div class="col-lg-7 col-md-7 col-sm-12 text-right">
                        
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row clearfix">
                    <div class="col-lg-8 col-md-12">
                        <div class="row clearfix">
                            <div class="col-lg-4 col-md-6">
                                <div class="card top_counter">
                                    <div class="body">
                                        <div class="icon xl-slategray"><i class="zmdi zmdi-account-o"></i> </div>
                                        <div class="content">
                                            <div class="text">Student</div>
                                            <?php
                                            $sql = "select count(rn1) from group_stud_tbl where rn1 != ''";
                                            $result = mysqli_query($con, $sql);
                                            while ($row = mysqli_fetch_array($result)) {
                                                $sum = $row[0];
                                            }
                                            $sql = "select count(rn2) from group_stud_tbl where rn2 != ''";
                                            $result = mysqli_query($con, $sql);
                                            while ($row = mysqli_fetch_array($result)) {
                                                $sum2 = $row[0];
                                            }
                                            $sql = "select count(rn3) from group_stud_tbl where rn3 != ''";
                                            $result = mysqli_query($con, $sql);
                                            while ($row = mysqli_fetch_array($result)) {
                                                $sum3 = $row[0];
                                            }
                                            $sql = "select count(rn4) from group_stud_tbl where rn4 != ''";
                                            $result = mysqli_query($con, $sql);
                                            while ($row = mysqli_fetch_array($result)) {
                                                $sum4 = $row[0];
                                            }
                                            $tot = $sum + $sum2 + $sum3 + $sum4;
                                            ?>

                                            <h5 class="number count-to" data-from="0" data-to="<?php echo $tot; ?>"
                                                data-speed="2500" data-fresh-interval="700">
                                                <?php echo $tot; ?>
                                            </h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <div class="card top_counter">
                                    <div class="body">
                                        <div class="icon xl-slategray"><i class="zmdi zmdi-account-circle"></i> </div>
                                        <div class="content">
                                            <div class="text">Faculties</div>
                                            <?php
                                            $sql = "select fid from faculty_tbl";
                                            $result = mysqli_query($con, $sql);
                                            $tech = mysqli_num_rows($result);
                                            ?>
                                            <h5 class="number count-to" data-from="0" data-to="<?php echo $tech; ?>"
                                                data-speed="2500" data-fresh-interval="700">
                                                <?php echo $tech; ?>
                                            </h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <div class="card top_counter">
                                    <div class="body">
                                        <div class="icon xl-slategray"><i class="zmdi zmdi-label"></i> </div>
                                        <div class="content">
                                            <div class="text">Groups</div>
                                            <?php
                                            $sql = "select gsid from group_stud_tbl";
                                            $result = mysqli_query($con, $sql);
                                            $gs = mysqli_num_rows($result);
                                            ?>
                                            <h5 class="number count-to" data-from="0" data-to="<?php echo $gs; ?>"
                                                data-speed="2500" data-fresh-interval="700">
                                                <?php echo $gs; ?>
                                            </h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        <div class="card">
                            <div class="header">
                                <h2><strong>Progress</strong> Survey <small>All Over Progress Of Your Groups...</small></h2>
                               
                            </div>
                            <div class="body">
                            
                                <div class="tab-content m-t-10">
                                    <div class="tab-pane active" id="chart-view">
                                        <div id="m_bar_chart" class="graph"></div>
                                        <div class="xl-slategray">
                                            <div class="body">
                                                <div class="row text-center">
                                                    <div class="col-sm-12 col-12">
                                                        <h4 class="margin-0">Categories Of Progress</h4>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12">
                        <div class="card tasks_report">
                            <div class="header">
                               
                                <h2 ><strong>Progress</strong> Titles<small>Categories of Progress</small></h2>
                               
                                <div class="body">
                                    <ul class="list-unstyled activity mt-5">
                                    <?php 
                                $arr=['deep-purple','red','teal','pink','light-green','amber','black','green','grey'];
                                $i=0;
                                $str="select * from progress_part_tbl";
                                $result = mysqli_query($con, $str);
                                while ($row = mysqli_fetch_array($result)){
                                
                                ?>
                                        <li class="mb-3">
                                            <a href="javascript:void(0)">
                                                <i class="material-icons bg-<?php echo $arr[$i];?>">filter_<?php echo $i+1;?></i>
                                                <div class="info">
                                                    <h4><?php echo $row[1];?></h4>
                                                    <small>&nbsp;</small>
                                                </div>
                                            </a>
                                        </li>
                                        <?php $i++;} ?>
                                     
                                    </ul>
                                </div>
                              
                            </div>

                        </div>
                        
                    </div>
             
            <div class="card">
                            <div class="header">
                                <h2><strong>Expected</strong> Timeline</h2>
                                
                            </div>
                           
                            <div class="body">
                                <div class="new_timeline">
                                    <div class="header">
                                        <div class="color-overlay l-parpl">
                                            <div class="day-number "><?php echo date('d');?></div>
                                            <div class="date-right">
                                                <div class="day-name"><?php echo date("l");?></div>
                                                <div class="month"><?php echo date('F')."&nbsp;&nbsp;";?><?php echo date('Y');?></div>
                                            </div>
                                        </div>
                                    </div>
                                    <ul>
                                        <li>
                                            <div class="bullet pink"></div>
                                            <div class="time"><h6>Dec-Jan</h6></div>
                                            <div class="desc">
                                                <h6>Project Session Start</h6>
                                                <h3>Group Details & Faculty Alloction & start Project Work</h3>
                                                
                                            </div>
                                        </li>
                                        <li>
                                            <div class="bullet green"></div>
                                            <div class="time"><h6>Feb-Midd</h6></div>
                                            <div class="desc">
                                            <h6>Theory Examination</h6>
                                                <h3> Internal & External Theory Exams</h3>
                                                <!-- <ul class="list-unstyled team-info margin-0 p-t-5">
                                                    <li><img src="assets/images/xs/avatar1.jpg" alt="Avatar"></li>
                                                    <li><img src="assets/images/xs/avatar2.jpg" alt="Avatar"></li>
                                                    <li><img src="assets/images/xs/avatar3.jpg" alt="Avatar"></li>
                                                    <li><img src="assets/images/xs/avatar4.jpg" alt="Avatar"></li>
                                                </ul> -->
                                            </div>
                                        </li>
                                        <li>
                                            <div class="bullet orange"></div>
                                            <div class="time"><h6>Mar-End</h6></div>
                                            <div class="desc">
                                                <h6>Internal Submition</h6>
                                                <h3>Internal Submition Of Project & Seminar</h3>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="bullet pink"></div>
                                            <div class="time"><h6>Apr-Midd</h6></div>
                                            <div class="desc">
                                            <h6>External Submition</h6>
                                                <h3>External Submition Of Project & Seminar</h3>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="bullet green"></div>
                                            <div class="time"><h6>Apr</h6></div>
                                            <div class="desc">
                                            <h6>End Of Bechelore's</h6>
                                                
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
        </section>

        <script>
            $(function () {
                MorrisBarChart();
            });
            function MorrisBarChart() {
                $.ajax({
                    url: 'getchart_faculty.php',
                    dataType: 'json',
                    success: function (data) {
                        Morris.Bar({
                            element: 'm_bar_chart',
                            data: data,
                            xkey: 'y',
                            ykeys: ['a'],
                            labels: ['A'],
                            barColors: ['#eb91a0'],
                            hideHover: 'auto',
                            gridLineColor: '#eef0f2',
                            resize: true,
                            xLabels: 'Groups'
                        });
                    }
                });
            }

           
        </script>
        <!-- Jquery Core Js -->
        <script src="assets/bundles/libscripts.bundle.js"></script>
        <!-- Lib Scripts Plugin Js ( jquery.v3.2.1, Bootstrap4 js) -->
        <script src="assets/bundles/vendorscripts.bundle.js"></script> <!-- slimscroll, waves Scripts Plugin Js -->

        <script src="assets/bundles/morrisscripts.bundle.js"></script><!-- Morris Plugin Js -->
        <script src="assets/bundles/jvectormap.bundle.js"></script> <!-- JVectorMap Plugin Js -->
        <script src="assets/plugins/jvectormap/jquery-jvectormap-us-aea-en.js"></script><!-- USA Map Js -->
        <script src="assets/bundles/knob.bundle.js"></script> <!-- Jquery Knob, Count To, Sparkline Js -->

        <script src="assets/bundles/mainscripts.bundle.js"></script>
        <script src="assets/js/pages/index.js"></script>
    </body>

    <!-- Mirrored from thememakker.com/templates/oreo/university/html/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 18 Dec 2023 15:37:25 GMT -->

    </html>


<?php } ?>