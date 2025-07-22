<?php
session_start();
if ($_SESSION['USER'] == "") {
    header("location:index.php");
} else {
    require_once("connection.php");
    
    // if(isset($_REQUEST['del']))
// {
//     $pid=$_REQUEST['del'];
    // mysqli_query($con,"delete from emp where id="1"");
// }


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
                width: 250px;
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
   

        <section class="content profile-page">
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-7 col-md-6 col-sm-12">
                        <h2>All Faculties
                            <small class="text-muted">Welcome to Progress Pilot</small>
                        </h2>
                    </div>

                </div>
            </div>
            <div class="container-fluid">
                <div class="row clearfix">
                    <div class="col-md-12">
                        <div class="card student-list p-3">
                            <div class="header">
                                <h2><strong>Faculty</strong> List</h2>
                                <ul class="header-dropdown">

                                    <input type="text" id="searchInput" class="form-control" style="color:black;"
                                        placeholder="Search by name">


                                </ul>
                            </div>






                            <div class="tab-content m-t-10" id="studentContainer">
                                <div class="tab-pane active" id="Permanent">
                                    <div class="row clearfix">
                                        <?php
                                        $res = mysqli_query($con, "select * from faculty_tbl");
                                        while ($row = mysqli_fetch_array($res)) {
                                            ?>
                                            <div class="col-lg-3 col-md-6 col-sm-12">

                                                <div class="card member-card bg-light">
                                                    <div class="body">
                                                        <div class="member-thumb">
                                                            <img src="upload\<?php echo $row[4]; ?>" class="img-fluid rounded" style="width:200px; height:200px;"
                                                                alt="profile-image">
                                                        </div>
                                                        <div class="detail">
                                                            <h4 id="sp1" class="m-b-0">
                                                                <?php echo $row[1]; ?>
                                                            </h4>&nbsp;
                                                            <p class="text-muted">
                                                                <?php echo $row['f_desc']."&nbsp"; ?>
                                                            </p>
                                                            <p class="text-muted">
                                                                <?php echo $row['f_qualif']."&nbsp"; ?> 
                                                            </p>
                                                            <p class="text-muted">
                                                                <?php echo $row['f_exp'] . " Years of Experiance"; ?>
                                                            </p>

                                                            <p class="text-muted">
                                                                <?php echo $row[2]; ?>
                                                            </p>

                                            <?php if($_SESSION['USER'] == "ADMIN"){ ?>
                                                            <ul class="social-links list-inline m-t-20">
                                                                <li><a href="del.php?del=<?php echo $row[0]; ?>"
                                                                        onclick="return confirm('Are you sure you want to delete Record <?php echo $row[1]; ?>' );"><i
                                                                            class="zmdi zmdi-delete"
                                                                            style="font-size: 35px;"></i></a></li>&nbsp;&nbsp;
                                                                <li><a href="add-faculty.php?upd=<?php echo $row[0]; ?>"><i
                                                                            class="zmdi zmdi-edit"
                                                                            style="font-size: 35px;"></i></a></li>
                                                            </ul>
                                                            <?php }?>

                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        <?php } ?>

                                    </div>
                                </div>

                            </div>




















                        </div>

                    </div>
                </div>
            </div>
        </section>
        <!-- Jquery Core Js -->
        <script src="assets/bundles/libscripts.bundle.js"></script> <!-- Bootstrap JS and jQuery v3.2.1 -->
        <script src="assets/bundles/vendorscripts.bundle.js"></script> <!-- slimscroll, waves Scripts Plugin Js -->
        <script src="assets/bundles/datatablescripts.bundle.js"></script>

        <script src="assets/bundles/mainscripts.bundle.js"></script><!-- Custom Js -->
        <script src="assets/js/pages/tables/jquery-datatable.js"></script>


        <script>
            // jQuery script for live search
            $(document).ready(function () {
                $('#searchInput').keyup(function () {
                    var query = $(this).val();
                    $.ajax({
                        url: 'search_faculty.php', // Your PHP script to handle the search
                        method: 'GET',
                        data: { search: query },
                        success: function (response) {
                            $('#studentContainer').html(response);
                        }
                    });
                });
            });
        </script>
    </body>

    <!-- Mirrored from thememakker.com/templates/oreo/university/html/students.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 18 Dec 2023 15:37:36 GMT -->

    </html>
<?php } ?>