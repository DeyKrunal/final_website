<?php
session_start();
require_once ("connection.php");
$otp = $_SESSION['otp'];
$email = $_REQUEST['email'];
if (isset($_REQUEST['verify'])) {

    $n1 = $_REQUEST['digit1'];
    $n2 = $_REQUEST['digit2'];
    $n3 = $_REQUEST['digit3'];
    $n4 = $_REQUEST['digit4'];
    $n5 = $_REQUEST['digit5'];
    $final_otp = $n1 . $n2 . $n3 . $n4 . $n5;
    // echo "$final_otp";
    if ($otp == $final_otp) {
        header("Location:new_pass.php?email=$email");
    } else {
        echo "<script>alert('Invalid OTP');</script>";
    }
}
?>
<!doctype html>
<html class="no-js " lang="en">



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
<style>
  

    .otp-container {
     
        align-items: center;
        width: 350px;
        padding: 10px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
    }

    .otp-box {
        display: inline-block;
        margin: 0 5px;
    }

    input[type="text"] {
        text-align: center;
        width: 50px;
        font-size: 20px;
    }

    
</style>

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
                            <h5>Verify OTP?</h5>
                            <span>Enter your OTP sent on registered email address</span>

                            <div>

                                <div class="container otp-container">


                                    <div class="form-group text-center">
                                        <div class="otp-box">
                                            <input type="text" name="digit1" maxlength="1" required>
                                        </div>
                                        <div class="otp-box">
                                            <input type="text" name="digit2" maxlength="1" required>
                                        </div>
                                        <div class="otp-box">
                                            <input type="text" name="digit3" maxlength="1" required>
                                        </div>
                                        <div class="otp-box">
                                            <input type="text" name="digit4" maxlength="1" required>
                                        </div>
                                        <div class="otp-box">
                                            <input type="text" name="digit5" maxlength="1" required>
                                        </div>
                                    </div>
                                

                                </div>



                            </div>
                        </div>
                        <div class="footer text-center">
                            <input type="submit" value="Varify OTP" id="verify" name="verify"
                                class="btn btn-primary btn-round btn-lg btn-block waves-effect waves-light">
                           
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


</html>