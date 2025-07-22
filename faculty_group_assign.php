<?php
session_start();
if($_SESSION['USER'] == "")
{
    header("location:index.php");
}else{
require_once("connection.php");

if(isset($_POST["addgroup"])){
    $x = $_GET["afid"];
   // $x1 = $_POST["hidden1"];
    if(isset($_POST['grpname']))
    {
        $id = $_POST['grpname'];

        if ($id == "")
        {
            
        }else{
            $count = count($id);
            for($i = 0; $i < $count; $i++){
                $sql = "UPDATE `group_stud_tbl` SET `faculty_id`='$x' where `gsid` = '$id[$i]'";
                mysqli_query($con, $sql);
            }
        }
    }
   
    
    // header("location:grp_allocate.php");
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
    <style>
            #sp1 {
                display: inline-block;
                width: 120px;
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

        include "adminsidebar.php";

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
       
        <form method="post">
                

                <div class="container-fluid">
                    <div class="row clearfix">
                        <div class="col-md-12">
                            <div class="card student-list">
                                <div class="header">
                               
                                  
                                    <h2><strong>Groups</strong> List</h2>
                                    <ul class="header-dropdown">
                                        <li><input type="text" id="searchInput" class="form-control" style="color:black;width:250px;"
                                        placeholder="Search by name"></li>
                                        <li> <input class="btn btn-primary" name="addgroup" type="submit" id="myButton" value="submit"></input></li>
                                    </ul>
                                </div>
                            
                                <div class="container-fluid mt-4" id="studentContainer">
                                      <div class="row clearfix">
                                    <?php
                                     $res = mysqli_query($con, "SELECT * FROM `group_stud_tbl` where faculty_id = 0");
                                     if(mysqli_num_rows($res)<=0)
                                     {
                                         echo "<h6 class='m-5'>No Groups Yet</h6>";
                                     }else{
                                    $i = 1;
                                    while ($row = mysqli_fetch_array($res)) {

                                        if ($i == 1) {
                                            ?>
                                            <div class="col-sm-12 col-md-6 col-lg-3">
                                                <div class="card social_widget2">
                                                    <div class="body data text-center">
                                                        <ul class="list-unstyled m-b-0">
                                                            <li class="m-b-20">
                                                                <!-- <i class="zmdi zmdi-thumb-up col-blue"></i> -->
                                                                <h4 class="m-t-0 m-b-0"><img src="upload/<?php echo $row['image'];  ?>" alt="grp img"
                                                                        height="150px" width="150px"></h4>
                                                                <!-- <span>Post View</span> -->
                                                            </li>
                                                            <li>
                                                            <h6><i class="zmdi zmdi-graduation-cap"></i><span><?php echo "&nbsp;&nbsp;&nbsp;GROUP ".$row['gsid']; ?></span></h6>

                                                            </li>

                                                        </ul>
                                                        
                                                    </div>

                                                    <div class="name facebook">
                                                        <ul class="list-unstyled m-b-30">
                                                            <li class="m-b-20">
                                                                <div class="progress-container">
                                                                    <span id="sp1" class="progress-badge">
                                                                        <?php if ($row['name1'] == "") {
                                                                            echo "&nbsp";
                                                                        } else {
                                                                            echo $row['name1'];
                                                                        } ?>
                                                                    </span>

                                                                    <span class="progress-badge" style="float:right;">
                                                                        <?php echo $row['div1']; ?>
                                                                    </span><br>
                                                                    <span class="progress-badge" style="float:right;">
                                                                        <?php if ($row['rn1'] == "") {
                                                                            echo "&nbsp";
                                                                        } else {
                                                                            echo $row['rn1'];
                                                                        } ?>
                                                                    </span>

                                                                </div>
                                                            </li>
                                                            <li class="m-b-20">
                                                                <div class="progress-container">
                                                                    <span class="progress-badge" id="sp1">
                                                                        <?php if ($row['name2'] == "") {
                                                                            echo "&nbsp";
                                                                        } else {
                                                                            echo $row['name2'];
                                                                        } ?>
                                                                    </span>

                                                                    <span class="progress-badge" style="float:right;">
                                                                        <?php echo $row['div2']; ?>
                                                                    </span><br>
                                                                    <span class="progress-badge" style="float:right;">
                                                                        <?php if ($row['rn2'] == "") {
                                                                            echo "&nbsp";
                                                                        } else {
                                                                            echo $row['rn2'];
                                                                        } ?>
                                                                    </span>
                                                                </div>
                                                            </li>
                                                            <li class="m-b-20">
                                                                <div class="progress-container">
                                                                    <span class="progress-badge" id="sp1">
                                                                        <?php if ($row['name3'] == "") {
                                                                            echo "&nbsp";
                                                                        } else {
                                                                            echo $row['name3'];
                                                                        } ?>
                                                                    </span>

                                                                    <span class="progress-badge" style="float:right;">
                                                                        <?php echo $row['div3']; ?>
                                                                    </span><br>
                                                                    <span class="progress-badge" style="float:right;">
                                                                        <?php if ($row['rn3'] == "") {
                                                                            echo "&nbsp";
                                                                        } else {
                                                                            echo $row['rn3'];
                                                                        } ?>
                                                                    </span>

                                                                </div>
                                                            </li>
                                                            <li class="m-b-20">
                                                                <div class="progress-container">
                                                                    <span class="progress-badge" id="sp1">
                                                                        <?php echo $row['name4']; ?>
                                                                        <?php if ($row['name4'] == "") {
                                                                            echo "&nbsp";
                                                                        } else {
                                                                            echo $row['name4'];
                                                                        } ?>
                                                                    </span>

                                                                    <span class="progress-badge" style="float:right;">
                                                                        <?php echo $row['div4']; ?>
                                                                    </span><br>
                                                                    <span class="progress-badge" style="float:right;">
                                                                        <?php if ($row['rn4'] == "") {
                                                                            echo "&nbsp";
                                                                        } else {
                                                                            echo $row['rn4'];
                                                                        } ?>
                                                                    </span>

                                                                </div>
                                                            </li>
                                                        </ul>
                                                        <h5><input id="adelete_2" type="checkbox" id="myCheckbox" onchange="toggleButton()" name="grpname[]" value="<?php echo $row[0];?>" style="height:1.2rem;width:2rem;">
                                                <span>select group</span>
                                                        </h5>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php $i++;
                                        } else if ($i == 2) { ?>
                                                <div class="col-sm-12 col-md-6 col-lg-3">
                                                    <div class="card social_widget2">
                                                        <div class="body data text-center">
                                                            <ul class="list-unstyled m-b-0">
                                                                <li class="m-b-20">
                                                                    <!-- <i class="zmdi zmdi-thumb-up col-blue"></i> -->
                                                                    <h4 class="m-t-0 m-b-0"><img src="upload/<?php echo $row['image'];  ?>" alt="grp img"
                                                                            height="150px" width="150px"></h4>
                                                                    <!-- <span>Post View</span> -->
                                                                </li>
                                                                <li>
                                                                <h6><i class="zmdi zmdi-graduation-cap"></i><span><?php echo "&nbsp;&nbsp;&nbsp;GROUP ".$row['gsid']; ?></span></h6>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <div class="name dribbble">
                                                            <ul class="list-unstyled m-b-30">
                                                                <li class="m-b-20">
                                                                    <div class="progress-container">
                                                                        <span id="sp1" class="progress-badge">
                                                                        <?php if ($row['name1'] == "") {
                                                                            echo "&nbsp";
                                                                        } else {
                                                                            echo $row['name1'];
                                                                        } ?>
                                                                        </span>

                                                                        <span class="progress-badge" style="float:right;">
                                                                        <?php echo $row['div1']; ?>
                                                                        </span><br>
                                                                        <span class="progress-badge" style="float:right;">
                                                                        <?php if ($row['rn1'] == "") {
                                                                            echo "&nbsp";
                                                                        } else {
                                                                            echo $row['rn1'];
                                                                        } ?>
                                                                        </span>

                                                                    </div>
                                                                </li>
                                                                <li class="m-b-20">
                                                                    <div class="progress-container">
                                                                        <span class="progress-badge" id="sp1">
                                                                        <?php if ($row['name2'] == "") {
                                                                            echo "&nbsp";
                                                                        } else {
                                                                            echo $row['name2'];
                                                                        } ?>
                                                                        </span>

                                                                        <span class="progress-badge" style="float:right;">
                                                                        <?php echo $row['div2']; ?>
                                                                        </span><br>
                                                                        <span class="progress-badge" style="float:right;">
                                                                        <?php if ($row['rn2'] == "") {
                                                                            echo "&nbsp";
                                                                        } else {
                                                                            echo $row['rn2'];
                                                                        } ?>
                                                                        </span>
                                                                    </div>
                                                                </li>
                                                                <li class="m-b-20">
                                                                    <div class="progress-container">
                                                                        <span class="progress-badge" id="sp1">
                                                                        <?php if ($row['name3'] == "") {
                                                                            echo "&nbsp";
                                                                        } else {
                                                                            echo $row['name3'];
                                                                        } ?>
                                                                        </span>

                                                                        <span class="progress-badge" style="float:right;">
                                                                        <?php echo $row['div3']; ?>
                                                                        </span><br>
                                                                        <span class="progress-badge" style="float:right;">
                                                                        <?php if ($row['rn3'] == "") {
                                                                            echo "&nbsp";
                                                                        } else {
                                                                            echo $row['rn3'];
                                                                        } ?>
                                                                        </span>

                                                                    </div>
                                                                </li>
                                                                <li class="m-b-20">
                                                                    <div class="progress-container">
                                                                        <span class="progress-badge" id="sp1">
                                                                        <?php echo $row['name4']; ?>
                                                                        <?php if ($row['name4'] == "") {
                                                                            echo "&nbsp";
                                                                        } else {
                                                                            echo $row['name4'];
                                                                        } ?>
                                                                        </span>

                                                                        <span class="progress-badge" style="float:right;">
                                                                        <?php echo $row['div4']; ?>
                                                                        </span><br>
                                                                        <span class="progress-badge" style="float:right;">
                                                                        <?php if ($row['rn4'] == "") {
                                                                            echo "&nbsp";
                                                                        } else {
                                                                            echo $row['rn4'];
                                                                        } ?>
                                                                        </span>

                                                                    </div>
                                                                </li>
                                                            </ul>

                                                            <h5><input id="adelete_2" type="checkbox" id="myCheckbox" onchange="toggleButton()" name="grpname[]" value="<?php echo $row[0];?>" style="height:1.2rem;width:2rem;">
                                                                                                    <span>select group</span>
                                                            </h5>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php $i++;
                                        } else if ($i == 3) { ?>
                                                    <div class="col-sm-12 col-md-6 col-lg-3">
                                                        <div class="card social_widget2">
                                                            <div class="body data text-center">
                                                                <ul class="list-unstyled m-b-0">
                                                                    <li class="m-b-20">
                                                                        <!-- <i class="zmdi zmdi-thumb-up col-blue"></i> -->
                                                                        <h4 class="m-t-0 m-b-0"><img src="upload/<?php echo $row['image'];  ?>" alt="grp img"
                                                                                height="150px" width="150px"></h4>
                                                                        <!-- <span>Post View</span> -->
                                                                    </li>
                                                                    <li>
                                                                    <h6><i class="zmdi zmdi-graduation-cap"></i><span><?php echo "&nbsp;&nbsp;&nbspGROUP ".$row['gsid']; ?></span></h6>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                            <div class="name twitter">
                                                                <ul class="list-unstyled m-b-30">
                                                                    <li class="m-b-20">
                                                                        <div class="progress-container">
                                                                            <span id="sp1" class="progress-badge">
                                                                        <?php if ($row['name1'] == "") {
                                                                            echo "&nbsp";
                                                                        } else {
                                                                            echo $row['name1'];
                                                                        } ?>
                                                                            </span>

                                                                            <span class="progress-badge" style="float:right;">
                                                                        <?php echo $row['div1']; ?>
                                                                            </span><br>
                                                                            <span class="progress-badge" style="float:right;">
                                                                        <?php if ($row['rn1'] == "") {
                                                                            echo "&nbsp";
                                                                        } else {
                                                                            echo $row['rn1'];
                                                                        } ?>
                                                                            </span>

                                                                        </div>
                                                                    </li>
                                                                    <li class="m-b-20">
                                                                        <div class="progress-container">
                                                                            <span class="progress-badge" id="sp1">
                                                                        <?php if ($row['name2'] == "") {
                                                                            echo "&nbsp";
                                                                        } else {
                                                                            echo $row['name2'];
                                                                        } ?>
                                                                            </span>

                                                                            <span class="progress-badge" style="float:right;">
                                                                        <?php echo $row['div2']; ?>
                                                                            </span><br>
                                                                            <span class="progress-badge" style="float:right;">
                                                                        <?php if ($row['rn2'] == "") {
                                                                            echo "&nbsp";
                                                                        } else {
                                                                            echo $row['rn2'];
                                                                        } ?>
                                                                            </span>
                                                                        </div>
                                                                    </li>
                                                                    <li class="m-b-20">
                                                                        <div class="progress-container">
                                                                            <span class="progress-badge" id="sp1">
                                                                        <?php if ($row['name3'] == "") {
                                                                            echo "&nbsp";
                                                                        } else {
                                                                            echo $row['name3'];
                                                                        } ?>
                                                                            </span>

                                                                            <span class="progress-badge" style="float:right;">
                                                                        <?php echo $row['div3']; ?>
                                                                            </span><br>
                                                                            <span class="progress-badge" style="float:right;">
                                                                        <?php if ($row['rn3'] == "") {
                                                                            echo "&nbsp";
                                                                        } else {
                                                                            echo $row['rn3'];
                                                                        } ?>
                                                                            </span>

                                                                        </div>
                                                                    </li>
                                                                    <li class="m-b-20">
                                                                        <div class="progress-container">
                                                                            <span class="progress-badge" id="sp1">
                                                                        <?php echo $row['name4']; ?>
                                                                        <?php if ($row['name4'] == "") {
                                                                            echo "&nbsp";
                                                                        } else {
                                                                            echo $row['name4'];
                                                                        } ?>
                                                                            </span>

                                                                            <span class="progress-badge" style="float:right;">
                                                                        <?php echo $row['div4']; ?>
                                                                            </span><br>
                                                                            <span class="progress-badge" style="float:right;">
                                                                        <?php if ($row['rn4'] == "") {
                                                                            echo "&nbsp";
                                                                        } else {
                                                                            echo $row['rn4'];
                                                                        } ?>
                                                                            </span>

                                                                        </div>
                                                                    </li>
                                                                </ul>
                                                                <h5><input id="adelete_2" type="checkbox" id="myCheckbox" onchange="toggleButton()" name="grpname[]" value="<?php echo $row[0];?>" style="height:1.2rem;width:2rem;">
                                                                            <span>select group</span>
                                                                </h5>
                                                            </div>
                                                        </div>
                                                    </div>

                                            <?php $i++;
                                        } else if ($i == 4) { ?>
                                                        <div class="col-sm-12 col-md-6 col-lg-3">
                                                            <div class="card social_widget2">
                                                                <div class="body data text-center">
                                                                    <ul class="list-unstyled m-b-0">
                                                                        <li class="m-b-20">
                                                                            <!-- <i class="zmdi zmdi-thumb-up col-blue"></i> -->
                                                                            <h4 class="m-t-0 m-b-0"><img src="upload/<?php echo $row['image'];  ?>" alt="grp img"
                                                                        height="150px" width="150px"></h4>
                                                                            <!-- <span>Post View</span> -->
                                                                        </li>
                                                                        <li>
                                                                        <h6><i class="zmdi zmdi-graduation-cap"></i><span><?php echo "&nbsp;&nbsp;&nbsp;GROUP ".$row['gsid'] ?></span></h6>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                                <div class="name youtube">
                                                                    <ul class="list-unstyled m-b-30">
                                                                        <li class="m-b-20">
                                                                            <div class="progress-container">
                                                                                <span id="sp1" class="progress-badge">
                                                                        <?php if ($row['name1'] == "") {
                                                                            echo "&nbsp";
                                                                        } else {
                                                                            echo $row['name1'];
                                                                        } ?>
                                                                                </span>

                                                                                <span class="progress-badge" style="float:right;">
                                                                        <?php echo $row['div1']; ?>
                                                                                </span><br>
                                                                                <span class="progress-badge" style="float:right;">
                                                                        <?php if ($row['rn1'] == "") {
                                                                            echo "&nbsp";
                                                                        } else {
                                                                            echo $row['rn1'];
                                                                        } ?>
                                                                                </span>

                                                                            </div>
                                                                        </li>
                                                                        <li class="m-b-20">
                                                                            <div class="progress-container">
                                                                                <span class="progress-badge" id="sp1">
                                                                        <?php if ($row['name2'] == "") {
                                                                            echo "&nbsp";
                                                                        } else {
                                                                            echo $row['name2'];
                                                                        } ?>
                                                                                </span>

                                                                                <span class="progress-badge" style="float:right;">
                                                                        <?php echo $row['div2']; ?>
                                                                                </span><br>
                                                                                <span class="progress-badge" style="float:right;">
                                                                        <?php if ($row['rn2'] == "") {
                                                                            echo "&nbsp";
                                                                        } else {
                                                                            echo $row['rn2'];
                                                                        } ?>
                                                                                </span>
                                                                            </div>
                                                                        </li>
                                                                        <li class="m-b-20">
                                                                            <div class="progress-container">
                                                                                <span class="progress-badge" id="sp1">
                                                                        <?php if ($row['name3'] == "") {
                                                                            echo "&nbsp";
                                                                        } else {
                                                                            echo $row['name3'];
                                                                        } ?>
                                                                                </span>

                                                                                <span class="progress-badge" style="float:right;">
                                                                        <?php echo $row['div3']; ?>
                                                                                </span><br>
                                                                                <span class="progress-badge" style="float:right;">
                                                                        <?php if ($row['rn3'] == "") {
                                                                            echo "&nbsp";
                                                                        } else {
                                                                            echo $row['rn3'];
                                                                        } ?>
                                                                                </span>

                                                                            </div>
                                                                        </li>
                                                                        <li class="m-b-20">
                                                                            <div class="progress-container">
                                                                                <span class="progress-badge" id="sp1">
                                                                        <?php echo $row['name4']; ?>
                                                                        <?php if ($row['name4'] == "") {
                                                                            echo "&nbsp";
                                                                        } else {
                                                                            echo $row['name4'];
                                                                        } ?>
                                                                                </span>

                                                                                <span class="progress-badge" style="float:right;">
                                                                        <?php echo $row['div4']; ?>
                                                                                </span><br>
                                                                                <span class="progress-badge" style="float:right;">
                                                                        <?php if ($row['rn4'] == "") {
                                                                            echo "&nbsp";
                                                                        } else {
                                                                            echo $row['rn4'];
                                                                        } ?>
                                                                                </span>

                                                                            </div>
                                                                        </li>
                                                                    </ul>
                                                                    <h5><input id="adelete_2" type="checkbox" id="myCheckbox" onchange="toggleButton()" name="grpname[]" value="<?php echo $row[0];?>" style="height:1.2rem;width:2rem;">
                                                                                    <span>select group</span>
                                                                    </h5>
                                                                </div>
                                                            </div>
                                                        </div>

                                            <?php $i = 1;
                                        }
                                    }} ?>
                                </div>
                </div>
                        </div>
                    </div>
                </div>
                


                </div>
                











                
            </form>
 

    </section>

    <!-- Jquery Core Js -->
    <script src="script.js"></script>
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
                    url: 'search_for_allocate.php', // Your PHP script to handle the search
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
<?php }?>