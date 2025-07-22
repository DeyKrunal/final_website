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
// $x = "";
if(isset($_POST["submit"])){
    $x = $_POST["hidden1"];
    $id = $_SESSION['ID'];
    $count = count($id);
    for($i = 0; $i < $count; $i++){
        $sql = "UPDATE `group_stud_tbl` SET `faculty_id`='$x' where `gsid` = '$id[$i]'";
        mysqli_query($con, $sql);
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

    <!-- Chat-launcher -->
    <div class="chat-launcher"></div>
    <div class="chat-wrapper">
        <div class="card">
            <div class="header">
                <ul class="list-unstyled team-info margin-0">
                    <li class="m-r-15">
                        <h2>Pro. Team</h2>
                    </li>
                    <li>
                        <img src="assets/images/xs/avatar2.jpg" alt="Avatar">
                    </li>
                    <li>
                        <img src="assets/images/xs/avatar3.jpg" alt="Avatar">
                    </li>
                    <li>
                        <img src="assets/images/xs/avatar4.jpg" alt="Avatar">
                    </li>
                    <li>
                        <img src="assets/images/xs/avatar6.jpg" alt="Avatar">
                    </li>
                    <li>
                        <a href="javascript:void(0);" title="Add Member"><i class="zmdi zmdi-plus-circle"></i></a>
                    </li>
                </ul>
            </div>
            <div class="body">
                <div class="chat-widget">
                    <ul class="chat-scroll-list clearfix">
                        <li class="left float-left">
                            <img src="assets/images/xs/avatar3.jpg" class="rounded-circle" alt="">
                            <div class="chat-info">
                                <a class="name" href="javascript:void(0);">Alexander</a>
                                <span class="datetime">6:12</span>
                                <span class="message">Hello, John </span>
                            </div>
                        </li>
                        <li class="right">
                            <div class="chat-info"><span class="datetime">6:15</span> <span class="message">Hi,
                                    Alexander<br> How are you!</span> </div>
                        </li>
                        <li class="right">
                            <div class="chat-info"><span class="datetime">6:16</span> <span class="message">There are
                                    many variations of passages of Lorem Ipsum available</span> </div>
                        </li>
                        <li class="left float-left"> <img src="assets/images/xs/avatar2.jpg" class="rounded-circle"
                                alt="">
                            <div class="chat-info"> <a class="name" href="javascript:void(0);">Elizabeth</a> <span
                                    class="datetime">6:25</span> <span class="message">Hi, Alexander,<br> John <br> What
                                    are you doing?</span> </div>
                        </li>
                        <li class="left float-left"> <img src="assets/images/xs/avatar1.jpg" class="rounded-circle"
                                alt="">
                            <div class="chat-info"> <a class="name" href="javascript:void(0);">Michael</a> <span
                                    class="datetime">6:28</span> <span class="message">I would love to join the
                                    team.</span> </div>
                        </li>
                        <li class="right">
                            <div class="chat-info"><span class="datetime">7:02</span> <span class="message">Hello,
                                    <br>Michael</span> </div>
                        </li>
                    </ul>
                </div>
                <div class="input-group p-t-15">
                    <input type="text" class="form-control" placeholder="Enter text here...">
                    <span class="input-group-addon">
                        <i class="zmdi zmdi-mail-send"></i>
                    </span>
                </div>
            </div>
        </div>
    </div>

    <section class="content profile-page">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>All Faculty 
                        <small class="text-muted">Welcome to Oreo</small>
                    </h2>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">
                    <button class="btn btn-white btn-icon btn-round float-right m-l-10" type="button">
                        <i class="zmdi zmdi-plus"></i>
                    </button>
                    <ul class="breadcrumb float-md-right">
                        <li class="breadcrumb-item"><a href="index.html"><i class="zmdi zmdi-home"></i> Oreo</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Faculty</a></li>
                        <li class="breadcrumb-item active">All</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- <div class="container-fluid" id="myDiv1">
            <div class="row clearfix">
                <div class="col-md-12">
                    <div class="card student-list">
                        <div class="header">
                            <h2><strong>Faculty</strong> List</h2>
                            <ul class="header-dropdown">
                                <li class="dropdown"> <a href="javascript:void(0);" class="dropdown-toggle"
                                        data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="zmdi zmdi-more"></i> </a>
                                    <ul class="dropdown-menu dropdown-menu-right slideUp">
                                        <li><a href="javascript:void(0);">2017 Year</a></li>
                                        <li><a href="javascript:void(0);">2016 Year</a></li>
                                        <li><a href="javascript:void(0);">2015 Year</a></li>
                                    </ul>
                                </li>
                                <li class="remove">
                                    <a role="button" class="boxs-close"><i class="zmdi zmdi-close"></i></a>
                                </li>
                            </ul>
                        </div>

                        <div class="body" style="background:#f4f6f9">
                            <div class="table-responsive"> -->

                                <!-- <table class="table table-bordered table-striped js-basic-example dataTable table-hover m-b-0"> -->
                                <!-- <thead>
                                    <tr>

                                         <th>image</th>
                                       
                                    <th>Name</th>
                                        <th>Pass</th>
                                        <th>phono</th>
                                        <th>email</th>  


                                    </tr>
                                </thead> -->
                                <!-- <tbody> -->
                                <?php
                                // unset($_SESSION['faculty']);
                                // $x = array();
                                // $res = mysqli_query($con, "select * from faculty_tbl");
                                // $res1 = mysqli_query($con, "select faculty_id from group_stud_tbl group by faculty_id");
                                // while($row1 = mysqli_fetch_array($res1)){
                                    // array_push($x,$row1[0]);
                                // }
                                // 
                                // 
                                // while ($row = mysqli_fetch_array($res)) {
                                    // ?>
<!--  -->
                                        <!-- <div class="col-lg-2 col-md-3 col-sm-6" style="float:left;">
                                            <div class="card member-card" style="margin:1rem;width:11rem;">
                                                <div class="body">
                                                    <div class="member-thumb">
                                                        <img src="upload\<?php echo $row[4]; ?>" class="img-fluid rounded"
                                                            alt="profile-image">
                                                    </div>
                                                    <div class="detail">
                                                        <h4 class="m-b-0" style="font-size:12.5px;margin-top :1rem;">
                                                            <?php echo $row[1]; ?>
                                                        </h4>
                                                            <a href="faculty_group_view.php?ffid=<?php echo $row[0]; ?>"><button class="btn btn-primary faculty" onclick="toggleDiv(<?php echo $row[0]; ?>)">View Group</button></a>
                                                        
                                                        <!-- <input type="hidden" id="val" value="<?php //echo $row[1]; ?>" /> -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        </tr> -->
                                        <?php
                               // }
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
                                <!-- </tbody> -->
                                <!-- </table> -->
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
                    </div>-->
                </div>
            </div>
        </div>
        </div>
    <!-- <form method="post" >
    <input type="hidden" id="val" name="hidden1"  />

        <div class="container-fluid" id="myDiv" style="display: none;">
            <div class="row clearfix">
                <div class="col-md-12">
                    <div class="card">
                    <button class="btn btn-primary faculty" onclick="toggleDiv1()" style="margin:2rem;">Back</button>
                    <button class="btn btn-primary faculty" onclick="toggleDiv(<?php echo $row[0]; ?>)">Add Group</button>
                    <!-- <div class="card action_bar"> 
                </div>
                    <div class="body">                        
                        <div class="tab-content">
                            <div class="tab-pane active" id="Professors">
                                <div class="table-responsive">
                                    <table class="table table-hover m-b-0 c_list">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Name</th>                                    
                                                <th data-breakpoints="xs" >Group Members</th>                                    
                                                <th data-breakpoints="xs sm md"></th>
                                                <!--<th data-breakpoints="xs">Action</th> 
                                            </tr>
                                        </thead>
                                            <tbody>
                                            <?php
                                            $res = mysqli_query($con, "SELECT * FROM `group_stud_tbl`");
                                            while ($row = mysqli_fetch_array($res)) {
                                                ?>

                                            <tr>
                                                <td>
                                                <input id="adelete_2" type="checkbox" id="myCheckbox" onchange="toggleButton()" name="grpname[]" value="<?php echo $row[0];?>" style="height:1.2rem;width:2rem;">

                                                    <!-- <div class="checkbox">
                                                        <input id="adelete_2" type="checkbox" name="grpname[]">
                                                        <label for="adelete_2">&nbsp;</label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <img src="upload/<?php echo $row['image'];?>" class="rounded-circle avatar" height=80 width=80 alt="">
                                                    <p class="c_name"><?php echo $row['group_name'];?></p>
                                                </td>
                                                <td> 
                                                    <p class="c_name" style="font-size:1.1rem"><?php echo $row['name1'];?></p>
                                                    <p class="c_name" style="font-size:1.1rem"><?php echo $row['name2'];?></p> 
                                                    <p class="c_name" style="font-size:1.1rem"><?php echo $row['name3'];?></p> 
                                                    <p class="c_name" style="font-size:1.1rem"><?php echo $row['name4'];?></p> 
                                                </td>
                                                                                   
                                            </tr>    
                                            <?php } ?>                                    
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                                                 
                        </div>
                    </div>
                </div>  
                </div>
            </div>
        </div>


        </div>
        </form> -->

        <form method="post" >
    <input type="hidden" id="val1" name="hidden2"  />

        <div class="container-fluid" id="myDiv2" >
            <div class="row clearfix">
                <div class="col-md-12">
                    <div class="card">
                    <a href="allocated_group.php" class="btn btn-primary m-5">Back</a>
                    <input class="btn btn-primary float-right" name="Add Group"  id="myButton" style="margin:2rem;"></input>
                    <!-- <div class="card action_bar"> -->
                </div>
                    <div class="body">                        
                        <div class="tab-content">
                            <div class="tab-pane active" id="Professors">
                                <div class="table-responsive">
                                    <table class="table table-hover m-b-0 c_list">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Name</th>                                    
                                                <th data-breakpoints="xs" >Group Members</th>                                    
                                                <th data-breakpoints="xs sm md"></th>
                                                <!--<th data-breakpoints="xs">Action</th> -->
                                            </tr>
                                        </thead>
                                            <tbody>
                                            <?php
                                            $x = $_SESSION['ID'];
                                            $res = mysqli_query($con, "SELECT * FROM `group_stud_tbl` where faculty_id = '$x'");
                                            // session_unset();
                                            while ($row = mysqli_fetch_array($res)) {
                                                ?>

                                            <tr>
                                                <td>
                                                <input id="adelete_2" type="checkbox" id="myCheckbox" onchange="toggleButton()" name="grpname[]" value="<?php echo $row[0];?>" style="height:1.2rem;width:2rem;">

                                                    <!-- <div class="checkbox">
                                                        <input id="adelete_2" type="checkbox" name="grpname[]">
                                                        <label for="adelete_2">&nbsp;</label>
                                                    </div> -->
                                                </td>
                                                <td>
                                                    <img src="upload/<?php echo $row['image'];?>" class="rounded-circle avatar" height=80 width=80 alt="">
                                                    <p class="c_name"><?php echo $row['group_name'];?></p>
                                                </td>
                                                <td> 
                                                    <p class="c_name" style="font-size:1.1rem"><?php echo $row['name1'];?></p>
                                                    <p class="c_name" style="font-size:1.1rem"><?php echo $row['name2'];?></p> 
                                                    <p class="c_name" style="font-size:1.1rem"><?php echo $row['name3'];?></p> 
                                                    <p class="c_name" style="font-size:1.1rem"><?php echo $row['name4'];?></p> 
                                                </td>
                                                                                   
                                            </tr>    
                                            <?php } ?>                                    
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                                                 
                        </div>
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
        function toggleDiv(value) {
            document.getElementById('val').value = value;

            var myDiv = document.getElementById("myDiv");
            var myDiv1 = document.getElementById("myDiv1");
            // alert('Value set: ' + value);
            // Toggle the visibility of the div
            if (myDiv.style.display === "none") {
                myDiv.style.display = "block";
                myDiv1.style.display = "none";
            } else {
                myDiv1.style.display = "block";
                myDiv.style.display = "none";
            }
        }
        function toggleDiv1() {
            var myDiv = document.getElementById("myDiv");
            var myDiv1 = document.getElementById("myDiv1");

            // Toggle the visibility of the div
            if (myDiv1.style.display === "none") {
                myDiv1.style.display = "block";
                myDiv.style.display = "none";
            } else {
                myDiv.style.display = "block";
                myDiv1.style.display = "none";
            }
        }
        function toggleDiv2(value) {
            var myDiv = document.getElementById("myDiv1");
            var myDiv2 = document.getElementById("myDiv2");
            var x = "<?php echo $_SESSION['faculty']?>";
            console.log(x);

            // Toggle the visibility of the div
            if (myDiv2.style.display === "none") {
                myDiv2.style.display = "block";
                myDiv.style.display = "none";
            } else {
                myDiv.style.display = "block";
                myDiv2.style.display = "none";
            }
        }
        function toggleButton() {
            var myCheckbox = document.getElementById("myCheckbox");
            var myButton = document.getElementById("myButton");

            // Toggle the visibility of the button based on the checkbox state
            myButton.style.display = myCheckbox.checked ? "block" : "none";
        }
    </script>
</body>

<!-- Mirrored from thememakker.com/templates/oreo/university/html/students.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 18 Dec 2023 15:37:36 GMT -->

</html>
    <?php }?>