<?php
session_start();
// session_start();
// session_unset();
// session_destroy();
require_once("connection.php");
$currentDate = date('Y-m-d');
$_SESSION['tdate'] = $currentDate;

if (isset($_POST['login'])) {
    $aname = $_REQUEST['aname'];
    $pwd = $_REQUEST['pwd'];
    if ($aname == "" || $pwd == "") {
        echo "<script>alert('all fiels are required')</script>";
    } else {
        $s = "select * from admin_tbl where a_name='$aname'";
        $a = mysqli_num_rows(mysqli_query($con, $s));
        if ($a == 1) {

            $sql = "select a_pwd from admin_tbl where a_name='$aname'";

            $s1 = mysqli_fetch_array(mysqli_query($con, $s));

            $enteredPassword = $pwd;
            $storedHashedPassword = $s1['a_pwd'];
            if (password_verify($enteredPassword, $storedHashedPassword)) {
                $_SESSION['USER']="ADMIN";
                $_SESSION['NAME']=$aname;
                
;               header("location:admin_dash.php");
            } else {
                echo "<script>";
                echo "alert('Invalid Id Password');";
                echo "</script>";
            }
        } else {
            $sql="select fid from headfaculty_tbl where h_status='1'";
            $hid=mysqli_fetch_array(mysqli_query($con, $sql));
            //echo $hid['fid'];
            $sql="select fid,f_name,f_pwd from faculty_tbl where f_name='$aname'";
            $a = mysqli_num_rows(mysqli_query($con, $sql));
            if ($a == 1) {
                $fid=mysqli_fetch_array(mysqli_query($con, $sql));
                if ($fid["f_name"] == $aname && password_verify($pwd, $fid["f_pwd"])) {
                    if($hid['fid']==$fid['fid'])
                    {
                        $_SESSION['USER']="HEAD";
                        $_SESSION['ID']=$fid['fid'];
                        $_SESSION['NAME']=$fid['f_name'];
                        

                     header("location:headfaculty_dash.php");
                    }else{
                        $_SESSION['USER']="FACULTY";
                        $_SESSION['ID']=$fid['fid'];
                        $_SESSION['NAME']=$fid['f_name'];
                       
                    header("location:faculty_dash.php");
                    }
                    
                } else {
                    echo "<script>alert('incorrect...')</script>";
                   
                }
            }else{
                echo "<script>alert('incorrect...N')</script>";
            }
            
        }
    }
}
?>
<!doctype html>
<html class="no-js " lang="en">

<!-- Mirrored from thememakker.com/templates/oreo/university/html/sign-in.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 18 Dec 2023 15:37:34 GMT -->

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
    <link rel="stylesheet" href="assets/plugins/sweetalert/sweetalert.css"/>
    <link rel="stylesheet" href="assets/css/authentication.css">
    <link rel="stylesheet" href="assets/css/color_skins.css">
</head>

<body class="theme-blush authentication sidebar-collapse">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg fixed-top navbar-transparent">
        <div class="container">
            <div class="navbar-translate n_logo">
               <h4>Welcome To <br><strong style="color:#f094a3">Progress Pilot</strong></h4>
                <!--<button class="navbar-toggler" type="button">-->
                <!--    <span class="navbar-toggler-bar bar1"></span>-->
                <!--    <span class="navbar-toggler-bar bar2"></span>-->
                <!--    <span class="navbar-toggler-bar bar3"></span>-->
                <!--</button>-->
            </div>
            <div class="navbar-collapse">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <!-- <a class="nav-link" href="index.html">Home</a> -->
                    </li>
                    <li class="nav-item">
                        <!-- <a class="nav-link" href="javascript:void(0);">Search Result</a> -->
                    </li>
                    <!-- <li class="nav-item">
                        <a class="nav-link" title="Follow us on Twitter" href="javascript:void(0);" target="_blank">
                            <i class="zmdi zmdi-twitter"></i>
                            <p class="d-lg-none d-xl-none">Twitter</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" title="Like us on Facebook" href="javascript:void(0);" target="_blank">
                            <i class="zmdi zmdi-facebook"></i>
                            <p class="d-lg-none d-xl-none">Facebook</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" title="Follow us on Instagram" href="javascript:void(0);" target="_blank">
                            <i class="zmdi zmdi-instagram"></i>
                            <p class="d-lg-none d-xl-none">Instagram</p>
                        </a>
                    </li> -->
                    <li class="nav-item">
                        <!-- <a class="nav-link btn btn-white btn-round" href="sign-up.html">SIGN UP</a> -->
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- End Navbar -->
    <div class="page-header">
        <div class="page-header-image" style="background-image:url(assets/images/login.jpg)"></div>
        <div class="container">
            <div class="col-md-12 content-center">
                <div class="card-plain">
                    <form class="form" method="POST">
                        <div class="header">
                            <div class="logo-container">
                                <img src="assets/images/logo.svg" alt="">
                            </div>
                            <h5>Log in</h5>
                        </div>
                        <div class="content">
                            <div class="input-group">
                                <input type="text" name="aname" class="form-control" placeholder="Enter User Name">
                                <span class="input-group-addon">
                                    <i class="zmdi zmdi-account-circle"></i>
                                </span>
                            </div>
                            <div class="input-group">
                                <input type="password" name="pwd" placeholder="Password" class="form-control" />
                                <span class="input-group-addon">
                                    <i class="zmdi zmdi-lock"></i>
                                </span>
                            </div>
                        </div>
                        <div class="footer text-center">
                            <input type="submit" name="login" value="Sign in"
                                class="btn btn-primary btn-round btn-lg btn-block " >
                            <h5><a href="forgot-password.php" class="link">Forgot Password?</a></h5>
                        </div>
                        
                    </form>

                </div>
            </div>
        </div>
        <footer class="footer">
            <div class="container">
                <!-- <nav>
                    <ul>
                        <li><a href="http://thememakker.com/contact/" target="_blank">Contact Us</a></li>
                        <li><a href="http://thememakker.com/about/" target="_blank">About Us</a></li>
                        <li><a href="javascript:void(0);">FAQ</a></li>
                    </ul>
                </nav> -->
                <!-- <div class="copyright">
                    &copy;
                    <script>
                        document.write(new Date().getFullYear())
                    </script>,
                    <span>Designed by <a href="http://thememakker.com/" target="_blank">ThemeMakker</a></span>
                </div> -->
            </div>
        </footer>
    </div>

    <!-- Jquery Core Js -->
    <!-- <script src="assets/plugins/sweetalert/sweetalert.min.js"></script> -->
    <!-- <script src="assets/js/pages/ui/dialogs.js"></script> -->
    <script src="assets/bundles/libscripts.bundle.js"></script>
    <script src="assets/bundles/vendorscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js -->

    <script>
        $(".navbar-toggler").on('click', function () {
            $("html").toggleClass("nav-open");
        });
        //=============================================================================
        $('.form-control').on("focus", function () {
            $(this).parent('.input-group').addClass("input-group-focus");
        }).on("blur", function () {
            $(this).parent(".input-group").removeClass("input-group-focus");
        });
    </script>
      
</body>

<!-- Mirrored from thememakker.com/templates/oreo/university/html/sign-in.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 18 Dec 2023 15:37:34 GMT -->

</html>