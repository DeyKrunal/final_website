<?php
session_start();
if($_SESSION['USER'] == "")
{
    header("location:index.php");
}else{
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

</head>
<body class="theme-blush">
<!-- Page Loader -->
<div class="page-loader-wrapper">
    <div class="loader">
        <div class="m-t-30"><img class="zmdi-hc-spin" src="assets/images/logo.svg" width="48" height="48" alt="Oreo"></div>
        <p>Please wait...</p>
    </div>
</div>
<!-- Overlay For Sidebars -->
<div class="overlay"></div>
<!-- Top Bar -->
<?php include "navbar.php";?>
<!-- Left Sidebar -->

<?php
if ($_SESSION["USER"]=="ADMIN")
{
    
include "adminsidebar.php";

}elseif ($_SESSION["USER"]=="HEAD")
{
    
include "hodsidebar.php";

}elseif ($_SESSION["USER"]=="FACULTY"){
    
include "sidebar.php";

}

?>

 <section class="content profile-page">
    <div class="block-header">
        <div class="row">
            <div class="col-lg-7 col-md-6 col-sm-12">
                <h2>All Student
                <small class="text-muted">Welcome to Progress Pilot</small>
                </h2>
            </div>
            <!-- <div class="col-lg-5 col-md-6 col-sm-12">
                <button class="btn btn-white btn-icon btn-round float-right m-l-10" type="button">
                    <i class="zmdi zmdi-plus"></i>
                </button>
                <ul class="breadcrumb float-md-right">
                    <li class="breadcrumb-item"><a href="index.html"><i class="zmdi zmdi-home"></i> Oreo</a></li>
                    <li class="breadcrumb-item"><a href="javascript:void(0);">Student</a></li>
                    <li class="breadcrumb-item active">All</li>
                </ul>
            </div> -->
        </div>
    </div>
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-md-12">
                <div class="card student-list">
                    <div class="header">
                        <h2><strong>Student</strong> List</h2>
                        <!-- <ul class="header-dropdown">
                            <li class="dropdown"> <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="zmdi zmdi-more"></i> </a>
                                <ul class="dropdown-menu dropdown-menu-right slideUp">
                                    <li><a href="javascript:void(0);">2017 Year</a></li>
                                    <li><a href="javascript:void(0);">2016 Year</a></li>
                                    <li><a href="javascript:void(0);">2015 Year</a></li>
                                </ul>
                            </li>
                            <li class="remove">
                                <a role="button" class="boxs-close"><i class="zmdi zmdi-close"></i></a>
                            </li>
                        </ul> -->
                    </div>
                
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped js-basic-example dataTable table-hover m-b-0">
                                <thead>
                                    <tr>                                       
                                        
                                       
                                        <th>Rollno</th>
                                        <th>Name</th>
                                        <th>Div</th>
                                        <th>phono</th>
                                        <th>email</th>

                                       
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                    $res=mysqli_query($con,"select * from group_stud_tbl WHERE COALESCE(rn1, rn2, rn3, rn4) IS NOT NULL ORDER BY rn1, rn2, rn3, rn4;");
                                    while($row=mysqli_fetch_array($res)) { 
                                        ?>

<?php if($row['rn1'] != Null){?>
                                        <tr><td><?php echo $row['rn1']; ?></td>
                                        <td><?php echo $row['name1']; ?></td>
                                        <td><?php echo $row['div1']; ?></td>
                                        <td><?php echo $row['phno1']; ?></td>
                                        <td><?php echo $row['email1']; ?></td></tr>
                                        <?php }if($row['rn2'] != Null){?>
                                        <tr><td><?php echo $row['rn2']; ?></td>
                                        <td><?php echo $row['name2']; ?></td>
                                        <td><?php echo $row['div2']; ?></td>
                                        <td><?php echo $row['phno2']; ?></td>
                                        <td><?php echo $row['email2']; ?></td></tr>
                                        <?php } if($row['rn3'] != Null){?>
                                        <tr><td><?php echo $row['rn3']; ?></td>
                                        <td><?php echo $row['name3']; ?></td>
                                        <td><?php echo $row['div3']; ?></td>
                                        <td><?php echo $row['phno3']; ?></td>
                                        <td><?php echo $row['email3']; ?></td></tr>
                                        
                                        <?php } if($row['rn4'] != Null){?>
                                        <tr><td><?php echo $row['rn4']; ?></td>
                                        <td><?php echo $row['name4']; ?></td>
                                        <td><?php echo $row['div4']; ?></td>
                                        <td><?php echo $row['phno4']; ?></td>
                                        <td><?php echo $row['email4']; ?></td></tr>
                                        <?php }?>
                                     <?php 
                                    }
                                    ?>
                                    <!-- <tr>
                                        <td><span class="list-icon"><img class="rounded" src="assets/images/xs/avatar1.jpg" alt=""></span></td>
                                        <td><span class="list-name">OU 00456</span></td>
                                        <td>Joseph</td>
                                        <td>25</td>
                                        <td>70 Bowman St. South Windsor, CT 06074</td>
                                        <td>404-447-6013</td>
                                        <td><span class="badge badge-primary">MCA</span></td>
                                    </tr>
                                    <tr>
                                        <td><span class="list-icon"><img class="rounded" src="assets/images/xs/avatar2.jpg" alt=""></span></td>
                                        <td><span class="list-name">KU 00789</span></td>
                                        <td>Cameron</td>
                                        <td>27</td>
                                        <td>123 6th St. Melbourne, FL 32904</td>
                                        <td>404-447-4569</td>
                                        <td><span class="badge badge-warning">Medical</span></td>
                                    </tr>
                                    <tr>
                                        <td><span class="list-icon"><img class="rounded" src="assets/images/xs/avatar3.jpg" alt=""></span></td>
                                        <td><span class="list-name">KU 00987</span></td>
                                        <td>Alex</td>
                                        <td>23</td>
                                        <td>123 6th St. Melbourne, FL 32904</td>
                                        <td>404-447-7412</td>
                                        <td><span class="badge badge-info">M.COM</span></td>
                                    </tr>
                                    <tr>
                                        <td><span class="list-icon"><img class="rounded" src="assets/images/xs/avatar4.jpg" alt=""></span></td>
                                        <td><span class="list-name">OU 00951</span></td>
                                        <td>James</td>
                                        <td>23</td>
                                        <td>44 Shirley Ave. West Chicago, IL 60185</td>
                                        <td>404-447-2589</td>
                                        <td><span class="badge badge-default">MBA</span></td>
                                    </tr>
                                    <tr>
                                        <td><span class="list-icon"><img class="rounded" src="assets/images/xs/avatar1.jpg" alt=""></span></td>
                                        <td><span class="list-name">OU 00953</span></td>
                                        <td>charlie</td>
                                        <td>21</td>
                                        <td>123 6th St. Melbourne, FL 32904</td>
                                        <td>404-447-9632</td>										
                                        <td><span class="badge badge-success">BBA</span></td>
                                    </tr>
                                    <tr>
                                        <td><span class="list-icon"><img class="rounded" src="assets/images/xs/avatar1.jpg" alt=""></span></td>
                                        <td><span class="list-name">OU 00456</span></td>
                                        <td>Joseph</td>
                                        <td>25</td>
                                        <td>70 Bowman St. South Windsor, CT 06074</td>
                                        <td>404-447-6013</td>
                                        <td><span class="badge badge-primary">MCA</span></td>
                                    </tr>
                                    <tr>
                                        <td><span class="list-icon"><img class="rounded" src="assets/images/xs/avatar2.jpg" alt=""></span></td>
                                        <td><span class="list-name">KU 00789</span></td>
                                        <td>Cameron</td>
                                        <td>27</td>
                                        <td>123 6th St. Melbourne, FL 32904</td>
                                        <td>404-447-4569</td>
                                        <td><span class="badge badge-warning">Medical</span></td>
                                    </tr>
                                    <tr>
                                        <td><span class="list-icon"><img class="rounded" src="assets/images/xs/avatar3.jpg" alt=""></span></td>
                                        <td><span class="list-name">KU 00987</span></td>
                                        <td>Alex</td>
                                        <td>23</td>
                                        <td>123 6th St. Melbourne, FL 32904</td>
                                        <td>404-447-7412</td>
                                        <td><span class="badge badge-info">M.COM</span></td>
                                    </tr>
                                    <tr>
                                        <td><span class="list-icon"><img class="rounded" src="assets/images/xs/avatar4.jpg" alt=""></span></td>
                                        <td><span class="list-name">OU 00951</span></td>
                                        <td>James</td>
                                        <td>23</td>
                                        <td>44 Shirley Ave. West Chicago, IL 60185</td>
                                        <td>404-447-2589</td>
                                        <td><span class="badge badge-default">MBA</span></td>
                                    </tr>
                                    <tr>
                                        <td><span class="list-icon"><img class="rounded" src="assets/images/xs/avatar1.jpg" alt=""></span></td>
                                        <td><span class="list-name">OU 00953</span></td>
                                        <td>charlie</td>
                                        <td>21</td>
                                        <td>123 6th St. Melbourne, FL 32904</td>
                                        <td>404-447-9632</td>										
                                        <td><span class="badge badge-success">BBA</span></td>
                                    </tr> -->
                                </tbody>
                            </table>
                        </div>
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
<?php }?>