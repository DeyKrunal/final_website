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
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

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
                <div class="card student-list">
                    <div class="header">
                        <h2><strong>Faculty</strong> List</h2>
                        
                        <ul class="header-dropdown">
                        <input type="text" id="searchInput" class="form-control" style="color:black;" placeholder="Search by name">
                        </ul>
                        
                    <!-- </div>
        <div class="input-group mb-3" style="width:20%; Margin-left:78%;">
                    <input type="text" id="searchInput" class="form-control" style="color:black;" placeholder="Search by name">
                </div> -->
        <div class="container-fluid mt-3" id="studentContainer">
                        <div class="row clearfix">
                            
                            <?php
                             $res=mysqli_query($con,"select * from faculty_tbl");
                             while($row=mysqli_fetch_array($res)) { ?>
                                <div class="col-md-5 col-lg-3" >
                                    <!-- <div class="card" style="width: 19rem;"> -->
                                        <div class="body bg-light mb-4 mt-4" >
                                        <img src="upload\<?php echo $row[4]; ?>" alt="img" style="height:200px; width:250px;" class="img-fluid rounded m-b-20" >
                                            <center><h6><?php echo $row[1]; ?></h6></center>
                                            <!-- <div class="table-responsive"> -->

                                            <table class="table table-hover js-basic-examples #00ced1 m-b-0">
                                            <tbody>
                                                <tr>
                                                    <td>Qualification: </td>
                                                    <td>
                                                        <?php echo $row[6]; ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Designation: </td>
                                                    <td>
                                                        <?php echo $row[5]; ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Experience: </td>
                                                    <td>
                                                        <?php echo $row[7]." Years"; ?>
                                                    </td>
                                                </tr>
                                                
                                               
                                            </tbody>
                                            </table>
                                            <!-- </div> -->
                                            <a href="change_hod.php?id=<?php echo $row[0]; ?>"  class="btn btn-block btn-primary btn-default btn-simple btn-round waves-effect"
                                                role="button" onclick="return confirm('Are you sure you want to set  <?php echo $row[1]; ?> as HOD..?' );">
                                        <i class="fa fa-graduation-cap" aria-hidden="true"></i>&nbsp;&nbsp;Set As HOD</a>
                                            
                                        </div>
                                    <!-- </div> -->
                                </div>
                            <?php } ?>
                        </div>
                    
        </div>
                </div>
            </div>
        </div>
         </div>
         
   
    </section>

 <!-- <section class="content profile-page"> -->
    <!-- <div class="block-header">
        <div class="row">
            <div class="col-lg-7 col-md-6 col-sm-12">
                <h2>All Faculties
                <small class="text-muted">Welcome to Progress Pilot</small>
                </h2>
            </div>
        
        </div>
    </div> -->
    <!--  <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-md-12">
                <div class="card student-list">
                    <div class="header">
                        <h2><strong>Faculty</strong> List</h2>
                        <ul class="header-dropdown">
                           
                        </ul>
                    </div>
                
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped js-basic-example dataTable table-hover m-b-0">
                                <thead>
                                    <tr>                                       
                                        
                                       
                                    <th style="width: 400px;">Profile</th>
                                        <th>Name</th>
                                        <th>Qualification</th>
                    
                                        <th>Designation</th>
                                        
                                        
                                        <th>Experience</th>
                                        <th>Email</th>
                                        <th>Contact No</th>
                                        <th>Manage</th>
                                       
                                       
                                    </tr>
                                </thead>
                                <tbody> -->
                                <?php 
                                    // $res=mysqli_query($con,"select * from faculty_tbl");
                                    // while($row=mysqli_fetch_array($res)) { ?>

                                        <!-- <td style="width: 400px;"><img src="upload\<?php echo $row[4]; ?>" height=100 width=100></td>
                                        <td><?php //echo $row[1]; ?></td>
                                        <td><?php //echo $row[6]; ?></td>
                                        <td><?php //echo $row[5]; ?></td>
                                        <td><?php //echo $row[7]." Years"; ?></td>
                                        <td><?php //echo $row[2]; ?></td>
                                        <td><?php //echo $row[3]; ?></td>
                                       
                                        
                                        
                                        
                                        <td><img src="upload\" height=100 width=100></td> -->
                                        <!-- <td><a href="change_hod.php?id=<?php // echo $row[0]; ?>" onclick="return confirm('Are you sure you want to set  <?php //echo $row[1]; ?> as HOD..?' );"> -->
                                        <!-- <i class="fa fa-graduation-cap" aria-hidden="true"></i>&nbsp;&nbsp;Set As HOD</a><span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span> -->
                                        <!-- <td><a href="add-students.php?upd=<?php // echo $row[0]; ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>&nbsp;&nbsp;Edit</a></td> -->
                                        </tr> 
                                <?php 
                                    //} 
                                    ?>
                                    
                                <!-- </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            
            </div>
        </div>
    </div>
</section> -->
<!-- Jquery Core Js --> 
<script src="assets/bundles/libscripts.bundle.js"></script> <!-- Bootstrap JS and jQuery v3.2.1 -->
<script src="assets/bundles/vendorscripts.bundle.js"></script> <!-- slimscroll, waves Scripts Plugin Js -->  
<script src="assets/bundles/datatablescripts.bundle.js"></script>

<script src="assets/bundles/mainscripts.bundle.js"></script><!-- Custom Js -->
<script src="assets/js/pages/tables/jquery-datatable.js"></script>
<script>
        // jQuery script for live search
        $(document).ready(function(){
            $('#searchInput').keyup(function(){
                var query = $(this).val();
                $.ajax({
                    url: 'search_faculty_admin.php', // Your PHP script to handle the search
                    method: 'GET',
                    data: {search: query},
                    success: function(response){
                        $('#studentContainer').html(response);
                    }
                });
            });
        });
    </script>
</body>

<!-- Mirrored from thememakker.com/templates/oreo/university/html/students.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 18 Dec 2023 15:37:36 GMT -->
</html>
<?php }?>