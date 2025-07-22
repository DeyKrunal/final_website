<?php
session_start();
if($_SESSION['USER'] == "")
{
    header("location:index.php");
}else{
require_once("connection.php");
global $idd;
if (isset($_GET['upd'])) {
    $idd = $_GET['upd'];
}

// $x = $idd;
// $q = "select * from emp where id='$idd'";
// $d = mysqli_query($con, $q);
// $row = mysqli_fetch_array($d);

if (isset($_REQUEST['b1'])) {

    $f1 = $_POST['f_name'];
    $f2 = $_POST['f_email'];
    $f3 = $_POST['f_phno'];
    $f4 = $_POST['f_desc'];
    $f5 = $_POST['f_qualif'];
    $f6 = $_POST['f_exp'];
    $f7 = $_POST['f_address'];



    $pass = $_POST['pass1'];
    $conpass = $_POST['pass2'];
    if($pass == $conpass)
    {
        $hashedPassword = password_hash($pass, PASSWORD_DEFAULT);

       
        $fac_img = $_FILES['f1']['name'];
        if($fac_img == "")
        {
            $sql = mysqli_query($con, "insert into faculty_tbl (f_name,f_email,f_phno,f_desc,f_qualif,f_exp,f_address,f_pwd) values ('$f1','$f2','$f3','$f4','$f5','$f6','$f7','$hashedPassword')");

        }
        else{
            $path = "upload/" . $fac_img;
    
            $sql = mysqli_query($con, "insert into faculty_tbl (f_name,f_email,f_phno,f_img,f_desc,f_qualif,f_exp,f_address,f_pwd) values ('$f1','$f2','$f3','$fac_img','$f4','$f5','$f6','$f7','$hashedPassword')");
        
        
        }

       
    
        move_uploaded_file($_FILES['f1']['tmp_name'], $path);
        header('location:faculty.php');
    
    }
    else{
        echo "<script>alert('Password not matched..')</script>";
    }
   



}
if (isset($_POST['updbtn'])) {
    $f1 = $_POST['f_name'];
    $f2 = $_POST['f_email'];
    $f3 = $_POST['f_phno'];
    $f4 = $_POST['f_desc'];
    $f5 = $_POST['f_qualif'];
    $f6 = $_POST['f_exp'];
    $f7 = $_POST['f_address'];
    $temp_img = $_POST['temp_img'];
    $temp_id = $_POST['temp_id'];

    if($temp_img != "man.jpg" && $_FILES['f1']['name'] != ""){

        if (file_exists("upload/" . $temp_img)) {
            unlink("upload/" . $temp_img);
        }
        $fac_img = $_FILES['f1']['name'];
        $path = "upload/" . $fac_img;
    }else{
        $fac_img = $temp_img;
        $path = "upload/" . $fac_img;
    }


    $pass = $_POST['pass1'];
    $hashedPassword = password_hash($pass, PASSWORD_DEFAULT);


    // $fac_img = $_FILES['f1']['name'];
    // $path = "upload/" . $fac_img;

    $sql = mysqli_query($con, "update faculty_tbl set f_name='$f1',f_email='$f2',f_phno='$f3',f_img='$fac_img',f_desc='$f4',f_qualif='$f5',f_exp='$f6',f_address='$f7' where fid=$temp_id");
   
  
    move_uploaded_file($_FILES['f1']['tmp_name'], $path);
   
   
    header('location:profile_faculty.php');


}
?>
<!doctype html>
<html class="no-js " lang="en">

<!-- Mirrored from thememakker.com/templates/oreo/university/html/add-students.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 18 Dec 2023 15:37:36 GMT -->

<head>

  
    <script type="text/javascript">
        function previewImage(event) {
            var input = event.target;
            var image = document.getElementById('preview');
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    image.src = e.target.result;
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
    <style>
        /* img {
            background-image: url('upload/no.png');
            width: 50px;
            height: 50px;
            xsd
        }*/

        #preview {
            border-radius: 50px;
            width: 50px;
            height: 50px;
        } 
    </style>



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
    <link href="assets/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css"
        rel="stylesheet" />
    <!-- Bootstrap Select Css -->
    <link href="assets/plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />
    <!-- Custom Css -->
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="assets/css/color_skins.css">
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->
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
                    <h2>Add Faculty
                        <small class="text-muted">Welcome to Progress Pilot</small>
                    </h2>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">
                    <!-- <button class="btn btn-white btn-icon btn-round float-right m-l-10" type="button">
                        <i class="zmdi zmdi-plus"></i>
                    </button> -->
                    <!-- <ul class="breadcrumb float-md-right">
                        <li class="breadcrumb-item"><a href="index.html"><i class="zmdi zmdi-home"></i> Oreo</a>
                        </li>
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Student</a></li>
                        <li class="breadcrumb-item active">Add</li>
                    </ul> -->
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="card">
                        <div class="header">
                            <h2><strong>Faculty</strong> Information <small>Manage Faculty Details belowe</small> </h2>
                            <!-- <ul class="header-dropdown">
                                <li class="dropdown"> <a href="javascript:void(0);" class="dropdown-toggle"
                                        data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="zmdi zmdi-more"></i> </a>
                                    <ul class="dropdown-menu dropdown-menu-right slideUp">
                                        <li><a href="javascript:void(0);" class="waves-effect waves-block">Action</a>
                                        </li>
                                        <li><a href="javascript:void(0);" class="waves-effect waves-block">Another
                                                action</a></li>
                                        <li><a href="javascript:void(0);" class="waves-effect waves-block">Something
                                                else</a></li>
                                    </ul>
                                </li>
                                <li class="remove">
                                    <a role="button" class="boxs-close"><i class="zmdi zmdi-close"></i></a>
                                </li>
                            </ul> -->
                        </div>
                        <form method="POST" enctype="multipart/form-data">

                            <?php
                            if ($idd == "") {
                                ?>
                                <div class="body">
                                    <div class="row clearfix">
                                        <div class="col-sm-4 col-md-6 col-lg-12">
                                            <div class="form-group">
                                                <input type="text" name="f_name" class="form-control"
                                                    placeholder="Enter Name" required>
                                            </div>
                                            <div class="form-group">
                                                <input type="email" name="f_email" class="form-control"
                                                    placeholder="Enter Email Id" required>
                                            </div>
                                            <div class="form-group">
                                                <input type="text" name="f_phno" class="form-control"
                                                    placeholder="Enter Contact No" >
                                            </div>
                                            <div class="form-group">
                                                <input type="text" name="f_desc" class="form-control"
                                                    placeholder="Enter Designation" >
                                            </div>
                                            <div class="form-group">
                                                <input type="text" name="f_qualif" class="form-control"
                                                    placeholder="Enter qualification" >
                                            </div>
                                            <div class="form-group">
                                                <input type="text" name="f_exp" class="form-control" placeholder="Experiance of Faculty"
                                                    >
                                            </div>
                                            <div class="form-group">
                                                <input type="text" name="f_address" class="form-control"
                                                    placeholder="Enter Recidental Address" >
                                            </div>


                                            <div class="form-group">
                                                <input type="password" name="pass1" class="form-control"
                                                    placeholder="password" required>
                                            </div>
                                            <div class="form-group">
                                                <input type="password" name="pass2" class="form-control"
                                                    placeholder="Re-type password" required>
                                            </div>
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="lg-col-6">
                                                        <input type="file" name="f1"  class="form-control" accept="image/*"
                                                            onchange="previewImage(event)" placeholder="chooses a file"
                                                             >
                                                    </div>
                                                    <div class="lg-col-6">
                                                        <img id="preview" alt="Not Found">
                                                    </div>

                                                </div>
                                            </div>


                                        </div>
                                    </div>
                                </div>
                            <?php } else {
                                $q = "select * from faculty_tbl where fid='$idd'";
                                $d = mysqli_query($con, $q);
                                $row = mysqli_fetch_array($d);
                                ?>
                                <div class="body">
                                    <div class="row clearfix">
                                        <div class="col-sm-4 col-md-6 col-lg-12">
                                            <div class="form-group">
                                                <input type="text" name="f_name" class="form-control"
                                                    placeholder="Enter Name" value="<?php echo $row[1]; ?>" required>
                                            </div>
                                            <div class="form-group">
                                                <input type="email" name="f_email" class="form-control"
                                                    placeholder="Enter Email Id" value="<?php echo $row[2]; ?>" required>
                                            </div>
                                            <div class="form-group">
                                                <input type="text" name="f_phno" class="form-control"
                                                    placeholder="Enter Contact No" value="<?php echo $row[3]; ?>" required>
                                            </div>
                                            <div class="form-group">
                                                <input type="text" name="f_desc" class="form-control"
                                                    placeholder="Enter Designation" value="<?php echo $row[5]; ?>" required>
                                            </div>
                                            <div class="form-group">
                                                <input type="text" name="f_qualif" class="form-control"
                                                    placeholder="Enter qualification" value="<?php echo $row[6]; ?>" required>
                                            </div>
                                            <div class="form-group">
                                                <input type="text" name="f_exp" class="form-control" placeholder="Experiance of Faculty"
                                                    value="<?php echo $row[7]; ?>" required>
                                            </div>
                                            <div class="form-group">
                                                <input type="text" name="f_address" class="form-control"
                                                    placeholder="Enter Recidental Address" value="<?php echo $row[8]; ?>" required>
                                            </div>



                                            <div class="form-group">

                                                <div class="lg-col-6">
                                                    <input type="file" name="f1" class="form-control" accept="image/*"
                                                        onchange="previewImage(event)" placeholder="chooses a file"
                                                        multiple>
                                                </div>
                                                <br>
                                                <div class="lg-col-6">
                                                    <img id="preview" src="upload/<?php echo $row['f_img']; ?>"
                                                        alt="Not Found">
                                                    <input type="hidden" value="<?php echo $row['f_img']; ?>"
                                                        name="temp_img">
                                                    <input type="hidden" value="<?php echo $row[0]; ?>" name="temp_id">
                                                </div>

                                            </div>
                                        </div>


                                    </div>
                                </div>
                        </div>
                    <?php } ?>
                    <div class="col-sm-12">
                        <?php
                        if ($idd == "") {
                            ?>
                            <input type="submit" class="btn btn-raised btn-round btn-primary" value="Submit" name="b1">
                            <?php
                        } else {
                            ?>
                            <input type="submit" class="btn btn-raised btn-round btn-primary" value="Update" name="updbtn">
                        <?php }
                        ?>
                        <a href="faculty.php" class="btn btn-raised btn-round">Cancel</a>
                    </div>
                    </form>

                    <!-- </div> -->

                </div>
            </div>
        </div>
        </div>


        <!-- <div class="row clearfix">
            <div class="col-md-12">
                <div class="card">
                    <div class="header">
                        <h2><strong>Account</strong> Information <small>Description text here...</small> </h2>
                        <ul class="header-dropdown">
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
                        </ul>
                    </div>
                    <div class="body">
                    
                </div>
            </div>
        </div> -->
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