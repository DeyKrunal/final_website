<?php
require_once("connection.php");
session_start();
if($_SESSION['USER'] == "")
{
    header("location:index.php");
}else{
$fid=$_SESSION['ID'];
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
if ($_SESSION["USER"] == "ADMIN")
{
    
include "adminsidebar.php";

}elseif ($_SESSION["USER"] == "HEAD")
{
    
include "hodsidebar.php";

}elseif ($_SESSION["USER"] == "FACULTY"){
    
include "sidebar.php";

}
?>
    <!-- Chat-launcher -->
 

    <section class="content profile-page">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Allocated Groups
                        <small class="text-muted">Welcome to Progress Pilot</small>
                    </h2>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">
                    
                    
                </div>
            </div>
        </div>
        <div class="container-fluid">
                        <div class="row clearfix">
                            <?php
                            $res = mysqli_query($con, "select * from group_stud_tbl where faculty_id=$fid");
                            if(mysqli_num_rows($res)<=0)
                            {
                            ?>
                            <center>
                               
                                    <div class="card">
                                        <div class="body" >
                                            <?php  echo "<h6>No Groups Allocate Yet</h6>";
?>
                                        </div>
                                    </div>
                               
                            </center>
                            <?php }else{
                            while ($row = mysqli_fetch_array($res)) { ?>
                                <div class="col-md-5 col-lg-3" style="height: 30.5rem;">
                                    <div class="card" style=" height:30rem;">
                                        <div class="body" >
                                        <center> <img src="upload/<?php echo $row['image'];?>" alt="img" style="height:150px;width:200px;" class="img-fluid rounded m-b-20">
                                            <h6><?php echo "GROUP ".$row['gsid']; ?></h6></center>
                                            <!-- <div class="table-responsive"> -->

                                            <table class="table table-hover m-t-20">
                                            <tbody>
                                                <tr>
                                                    <td>1st name:</td>
                                                    <td id="sp1">
                                                        <?php echo $row['name1'] ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>2nd name:</td>
                                                    <td id="sp1">
                                                        <?php echo $row['name2'] ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>3th name:</td>
                                                    <td id="sp1">
                                                        <?php echo $row['name3'] ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>4th name:</td>
                                                    <td id="sp1">
                                                        <?php echo $row['name4'] ?>
                                                    </td>
                                                </tr>
                                            </tbody>
                                            </table>
                                            <!-- </div> -->

                                            <a href="demo.php?gid=<?php echo $row[0]; ?>"
                                                class="btn btn-block btn-raised btn-default btn-simple btn-round waves-effect"
                                                role="button">Manage Progress</a>
                                        </div>
                                    </div>
                                </div>
                            <?php } }?>
                        </div>
                    
        </div>
        <!-- <div class="card">
                    <div class="body">                            
                        <ul class="pagination pagination-primary m-b-0">
                            <li class="page-item"><a class="page-link" href="javascript:void(0);"><i class="zmdi zmdi-arrow-left"></i></a></li>
                            <li class="page-item active"><a class="page-link" href="javascript:void(0);">1</a></li>
                            <li class="page-item"><a class="page-link" href="javascript:void(0);">2</a></li>
                            <li class="page-item"><a class="page-link" href="javascript:void(0);">3</a></li>
                            <li class="page-item"><a class="page-link" href="javascript:void(0);">4</a></li>
                            <li class="page-item"><a class="page-link" href="javascript:void(0);"><i class="zmdi zmdi-arrow-right"></i></a></li>
                        </ul>
                    </div>
                </div> -->
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
</body>

<!-- Mirrored from thememakker.com/templates/oreo/university/html/students.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 18 Dec 2023 15:37:36 GMT -->

</html>
<?php } ?>