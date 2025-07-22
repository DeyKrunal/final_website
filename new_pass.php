<?php

require_once ("connection.php");

$email = $_REQUEST['email'];


if (isset($_REQUEST['new'])) {
    $pass = $_REQUEST['pass'];
    $conpass = $_REQUEST['conpass'];
    if ($pass == $conpass ) {
        $hashedPassword = password_hash($conpass, PASSWORD_DEFAULT);
        $a = "update faculty_tbl set f_pwd='$hashedPassword' where f_email='$email'";


        if (mysqli_query($con, $a)) {
            session_unset();
            session_destroy();
            echo "<script>alert('Password Change Successfully..'); window.location.href = 'index.php';</script>";

            //   header("Location:index.php");
        }

    } else {
        echo "<script>alert('Password not matched...');</script>";
    }
}

?>
<!doctype html>
<html class="no-js " lang="en">

<!-- Mirrored from thememakker.com/templates/oreo/university/html/forgot-password.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 18 Dec 2023 15:37:41 GMT -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="description" content="Responsive Bootstrap 4 and web Application ui kit.">

    <title>Progress Pilot</title>
    <!-- Favicon-->
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <!-- Custom Css -->
    <link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="assets/css/authentication.css">
    <link rel="stylesheet" href="assets/css/color_skins.css">
</head>

<body class="theme-blush authentication sidebar-collapse">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg fixed-top navbar-transparent">
        <div class="container">
            <div class="navbar-translate n_logo">
               <h4>Welcome To <br><strong style="color:#f094a3">Progress Pilot</strong></h4>
                <button class="navbar-toggler" type="button">
                    <span class="navbar-toggler-bar bar1"></span>
                    <span class="navbar-toggler-bar bar2"></span>
                    <span class="navbar-toggler-bar bar3"></span>
                </button>
             
            </div>
    </nav>
    <!-- End Navbar -->
    <div class="page-header">
        <div class="page-header-image" style="background-image:url(assets/images/login.jpg)"></div>
        <div class="container">
            <div class="col-md-12 content-center">
                <div class="card-plain">
                    <form class="form" method="post" id="myForm">
                        <div class="header">
                            <div class="logo-container">
                                <img src="assets/images/logo.svg" alt="">
                            </div>
                            <h5>Create New Password</h5>
                            <span></span>
                        </div>
                        <div class="content">
                            <div class="input-group">
                                <input type="password" class="form-control" name="pass" id="pas"
                                    placeholder="New Password" required>
                                <span class="input-group-addon">
                                    <i class="zmdi zmdi-email"></i>
                                </span>
                            </div>
                        </div>
                        <div class="content">
                            <div class="input-group">
                                <input type="password" class="form-control" name="conpass" id="conpass"
                                    placeholder="Re-Type Password" required>
                                <span class="input-group-addon">
                                    <i class="zmdi zmdi-email"></i>
                                </span>
                            </div>
                        </div>
                        <div class="footer text-center">
                            <input type="submit" value="Change" id="new" name="new"
                                class="btn btn-primary btn-round btn-lg btn-block waves-effect waves-light" required>
                            <!-- <h5><a href="javascript:void(0);" class="link">Need Help?</a></h5> -->
                        </div>
                    </form>
                </div>
            </div>
        </div>
       
    </div>

    <!-- Jquery Core Js -->
    <script src="assets/bundles/libscripts.bundle.js"></script>
    <script src="assets/bundles/vendorscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js -->
    <script>
        $(".navbar-toggler").on('click', function () {
            $("html").toggleClass("nav-open");
        });

    </script>
</body>

<!-- Mirrored from thememakker.com/templates/oreo/university/html/forgot-password.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 18 Dec 2023 15:37:41 GMT -->

</html>