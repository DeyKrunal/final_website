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
    $id = $_POST['grpname'];
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
    <!--<div class="page-loader-wrapper">-->
    <!--    <div class="loader">-->
    <!--        <div class="m-t-30"><img class="zmdi-hc-spin" src="assets/images/logo.svg" width="48" height="48"-->
    <!--                alt="Oreo"></div>-->
    <!--        <p>Please wait...</p>-->
    <!--    </div>-->
    <!--</div>-->
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
                    <h2>All Faculty 
                        <small class="text-muted">Welcome to Progress Pilot</small>
                    </h2>
                </div>
           
            </div>
        </div>
        <div class="container-fluid" id="myDiv1" >
            <div class="row clearfix">
                <div class="col-md-12">
                    <div class="card student-list">
                        <div class="header">
                            <h2><strong>Faculty</strong> List</h2>
                           
                        </div>

                        <div class="body" style="background:#f4f6f9">
                            <div class="table-responsive">

                             
                                <?php
                                // unset($_SESSION['faculty']);
                                $x = array();
                                $res = mysqli_query($con, "select * from faculty_tbl");
                                $res1 = mysqli_query($con, "select faculty_id from group_stud_tbl group by faculty_id");
                                while($row1 = mysqli_fetch_array($res1)){
                                    array_push($x,$row1[0]);
                                }
                                
                                
                                while ($row = mysqli_fetch_array($res)) {
                                    ?>

                                        <div class="col-lg-2 col-md-3 col-sm-6" style="float:left;">
                                            <div class="card member-card" style="margin:1rem;width:11rem;">
                                                <div class="body">
                                                    <div class="member-thumb">
                                                        <img src="upload\<?php echo $row[4]; ?>" style="height: 180px; width:150px;" class="img-fluid rounded"
                                                            alt="profile-image">
                                                    </div>
                                                    <div class="detail">
                                                        <h4 id="sp1" class="m-b-0" style="font-size:12.5px;margin-top :1rem;">
                                                            <?php echo $row[1]; ?>
                                                        </h4>
                                                            <a href="faculty_group_assign.php?afid=<?php echo $row[0]; ?>"><button class="btn btn-primary faculty" onclick="toggleDiv(<?php echo $row[0]; ?>)">Assign Group</button></a>
                                                            <!-- <button class="btn btn-primary faculty" onclick="toggleDiv(<?php echo $row[0]; ?>)">Assign Group</button> -->
                                                        
                                                        <!-- <input type="hidden" id="val" value="<?php //echo $row[1]; ?>" /> -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        </tr>
                                        <?php
                                }
                                ?>

                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
        </div>
    <form method="post" >
    <input type="hidden" id="val" name="hidden1"  />

        <div class="container-fluid" id="myDiv" style="display: none;">
            <div class="row clearfix">
                <div class="col-md-12">
                    <div class="card">
                    <button class="btn btn-primary faculty" onclick="toggleDiv1()" style="margin:2rem;">Back</button>
                    <!-- <button class="btn btn-primary faculty" onclick="toggleDiv(<?php echo $row[0]; ?>)">Add Group</button> -->
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
                                            $res = mysqli_query($con, "SELECT * FROM `group_stud_tbl` where faculty_id = 0");
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

        <form method="post" >
    <input type="hidden" id="val1" name="hidden2"  />

        <div class="container-fluid" id="myDiv2" style="display: none;">
            <div class="row clearfix">
                <div class="col-md-12">
                    <div class="card">
                    <button class="btn btn-primary faculty" onclick="toggleDiv1()" style="margin:2rem;">Back</button>
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
                                            echo $x = $_SESSION['faculty'];
                                            $res = mysqli_query($con, "SELECT * FROM `group_stud_tbl` where faculty_id like ($x)");
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
            var myDiv1 = document.getElementById("myDiv2");
            // alert('Value set: ' + value);
            // Toggle the visibility of the div
            if (myDiv.style.display === "none") {
                myDiv.style.display = "block";
                myDiv1.style.display = "none";
            } else {
                myDiv1.style.display = "none";
                myDiv.style.display = "block";
            }
        }
        function toggleDiv1() {
            var myDiv = document.getElementById("myDiv");
            var myDiv1 = document.getElementById("myDiv1");

            // Toggle the visibility of the div
            if (myDiv1.style.display === "none") {
                myDiv1.style.display = "none";
                myDiv.style.display = "block";
            } else {
                myDiv.style.display = "none";
                myDiv1.style.display = "block";
            }
        }
        // function toggleDiv2(value) {
        //     var myDiv = document.getElementById("myDiv1");
        //     var myDiv2 = document.getElementById("myDiv2");
        //     var x = "<?php echo $_SESSION['faculty']?>";
        //     console.log(x);

        //     // Toggle the visibility of the div
        //     if (myDiv2.style.display === "none") {
        //         myDiv2.style.display = "block";
        //         myDiv.style.display = "none";
        //     } else {
        //         myDiv.style.display = "block";
        //         myDiv2.style.display = "none";
        //     }
        // }
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