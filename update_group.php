<?php
require_once("connection.php");
session_start();
// if(isset($_REQUEST['del']))
// {
//     $pid=$_REQUEST['del'];
// mysqli_query($con,"delete from emp where id="1"");
// }
$gid = $_REQUEST['gid'];
if(isset($_REQUEST['submit'])){
$gid=$_REQUEST['gid'];

    $name1=$_REQUEST['name1'];
    $name2=$_REQUEST['name2'];
    $name3=$_REQUEST['name3'];
    $name4=$_REQUEST['name4'];

    $rn1=$_REQUEST['rn1'];
    $rn2=$_REQUEST['rn2'];
    $rn3=$_REQUEST['rn3'];
    $rn4=$_REQUEST['rn4'];

    $div1=$_REQUEST['div1'];
    $div2=$_REQUEST['div2'];
    $div3=$_REQUEST['div3'];
    $div4=$_REQUEST['div4'];


    $phno1=$_REQUEST['phno1'];
    $phno2=$_REQUEST['phno2'];
    $phno3=$_REQUEST['phno3'];
    $phno4=$_REQUEST['phno4'];


    $email1=$_REQUEST['email1'];
    $email2=$_REQUEST['email2'];
    $email3=$_REQUEST['email3'];
    $email4=$_REQUEST['email4'];

// $sql="update group_stud_tbl set name1='$name1' name2='$name2' name3='$name3' name4='$name4' rn1= rn2= rn3= rn4=  where gsid=$gid ";
$sql="UPDATE `group_stud_tbl` SET `name1`='$name1',`rn1`='$rn1',`div1`='$div1',`phno1`='$phno1',`email1`='$email1',`name2`='$name2',`rn2`='$rn2',`div2`='$div2',`phno2`='$phno2',`email2`='$email2',`name3`='$name3',`rn3`='$rn3',`div3`='$div3',`phno3`='$phno3',`email3`='$email3',`name4`='$name4',`rn4`='$rn4',`div4`='$div4',`phno4`='$phno4',`email4`='$email4' WHERE gsid=$gid";
// echo "$sql";
$s=mysqli_query($con,$sql);
if($s){
    header("Location:groups.php");
}

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
                    <h2>All Groups
                        <small class="text-muted">Welcome to Progress Pilot</small>
                    </h2>
                </div>

            </div>
        </div>
        <form method="GET">
            <input type="hidden" id="gid" name="gid" value="<?php echo $gid; ?>">
            <div class="container-fluid" id="myDiv1">
                <div class="row clearfix">
                    <div class="col-md-12">
                        <div class="card student-list">
                            <div class="header">
                                <h2><strong>Update</strong> Details</h2>
                                <ul class="header-dropdown">

                                    <input type="submit" id="submit" name="submit" class="form-control btn btn-primary "
                                        style="color:black;" value="Save Details">


                                </ul>
                            </div>

                        <?php $sql = "select * from group_stud_tbl where gsid=$gid";
                        $res = mysqli_query($con, $sql);
                        while($row=mysqli_fetch_array($res)) {?>
                            <div class="row p-3">
                                <div class="col-md-6">
                                    <div class="card bg-light ">
                                        <h6 class="m-4">1st Student Details</h6>
                                        <div class="card-body">
                                            <input type="text" value="<?php echo $row[1]; ?>" name="name1"
                                                class="form-control" placeholder="Enter Name..."><br>
                                            <input type="text" value="<?php echo $row[2]; ?>" name="rn1"
                                                class="form-control" placeholder="Enter Roll No..."></br>
                                            <input type="text" value="<?php echo $row[3]; ?>" name="div1"
                                                class="form-control" placeholder="Enter Division..."></br>
                                            <input type="text" value="<?php echo $row[4]; ?>" name="phno1"
                                                class="form-control" placeholder="Enter Mobile No..."></br>
                                            <input type="text" value="<?php echo $row[5]; ?>" name="email1"
                                                class="form-control" placeholder="Enter Email Id..."></br>
                                        </div>
                                    </div>
                                </div>



                                <div class="col-md-6">
                                    <div class="card bg-light ">
                                        <h6 class="m-4">2nd Student Details</h6>
                                        <div class="card-body">
                                            <input type="text" value="<?php echo $row[6]; ?>" name="name2"
                                                class="form-control" placeholder="Enter Name..."><br>
                                            <input type="text" value="<?php echo $row[7]; ?>" name="rn2"
                                                class="form-control" placeholder="Enter Roll No..."></br>
                                            <input type="text" value="<?php echo $row[8]; ?>" name="div2"
                                                class="form-control" placeholder="Enter Division..."></br>
                                            <input type="text" value="<?php echo $row[9]; ?>" name="phno2"
                                                class="form-control" placeholder="Enter Mobile No..."></br>
                                            <input type="text" value="<?php echo $row[10]; ?>" name="email2" 
                                                class="form-control" placeholder="Enter Email Id..."></br>
                                        </div>
                                    </div>
                                </div>
                            </div>






                            <div class="row p-3">
                                <div class="col-md-6">
                                    <div class="card bg-light">
                                        <h6 class="m-4">3rd Student Details</h6>
                                        <div class="card-body">
                                            <input type="text" value="<?php echo $row[11]; ?>" name="name3"
                                                class="form-control" placeholder="Enter Name..."><br>
                                            <input type="text" value="<?php echo $row[12]; ?>" name="rn3"
                                                class="form-control" placeholder="Enter Roll No..."></br>
                                            <input type="text" value="<?php echo $row[13]; ?>" name="div3"
                                                class="form-control" placeholder="Enter Division..."></br>
                                            <input type="text" value="<?php echo $row[14]; ?>" name="phno3"
                                                class="form-control" placeholder="Enter Mobile No..."></br>
                                            <input type="text" value="<?php echo $row[15]; ?>" name="email3"
                                                class="form-control" placeholder="Enter Email Id..."></br>
                                        </div>
                                    </div>
                                </div>




                                <div class="col-md-6">
                                    <div class="card bg-light ">
                                        <h6 class="m-4">4th Student Details</h6>
                                        <div class="card-body">
                                            <input type="text" value="<?php echo $row[16]; ?>" name="name4"
                                                class="form-control" placeholder="Enter Name..."><br>
                                            <input type="text" value="<?php echo $row[17]; ?>" name="rn4"
                                                class="form-control" placeholder="Enter Roll No..."></br>
                                            <input type="text" value="<?php echo $row[18]; ?>" name="div4"
                                                class="form-control" placeholder="Enter Division..."></br>
                                            <input type="text" value="<?php echo $row[19]; ?>" name="phno4"
                                                class="form-control" placeholder="Enter Mobile No..."></br>
                                            <input type="text" value="<?php echo $row[20]; ?>" name="email4"
                                                class="form-control" placeholder="Enter Email Id..."></br>
                                        </div>
                                    </div>
                                </div>


                            </div>
                            <?php } ?>

                        </div>
                    </div>
                </div>
            </div>
        </form>
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