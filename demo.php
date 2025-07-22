<?php
session_start();

require_once("connection.php");
$gid=$_REQUEST['gid'];
$date=date("Y/m/d");
$_SESSION['gid'] = $gid;
$sql = "Select proid from progress_tbl where grpid = $gid";
$res = mysqli_query($con,$sql);
$x = mysqli_num_rows($res);
if($x == 0){
    // // header("location : manage_progress.php");
//     // echo $_SESSION['gid']."if";
// echo "Hello";
// }
// else{
     $sql1 = "INSERT INTO `progress_tbl`(`grpid`, `p1`, `p2`, `p3`, `p4`, `p5`, `p6`, `p7`, `p8`, `p9`, `date`) VALUES ('$gid','0','0','0','0','0','0','0','0','0','$date')";
    $res = mysqli_query($con,$sql1);
    // echo "Hello";
}

if($_SESSION['USER'] == "")
{
    header("location:index.php");
}else{

require_once("connection.php");
$gid=$_SESSION["gid"];

if (isset($_REQUEST['save'])){
  $date1=date("Y/m/d");
//   $r1=$_REQUEST['r1']; 
//   $r2=$_REQUEST['r2']; 
//   $r3=$_REQUEST['r3']; 
//   $r4=$_REQUEST['r4']; 
//   $r5=$_REQUEST['r5']; 
//   $r6=$_REQUEST['r6']; 
//   $r7=$_REQUEST['r7']; 
//   $r8=$_REQUEST['r8']; 
//   $r9=$_REQUEST['r9']; 
//   $gid = $_SESSION['gid'];

$r1=$_POST['r1']; 
$r2=$_POST['r2']; 
$r3=$_POST['r3']; 
$r4=$_POST['r4']; 
$r5=$_POST['r5']; 
$r6=$_POST['r6']; 
$r7=$_POST['r7']; 
$r8=$_POST['r8']; 
$r9=$_POST['r9']; 
$gid = $_SESSION['gid'];
 
  $str="update progress_tbl set p1=$r1,p2=$r2,p3=$r3,p4=$r4,p5=$r5,p6=$r6,p7=$r7,p8=$r8,p9=$r9,date='$date1' where grpid=$gid";
  mysqli_query($con,$str); 
  header("Location:view_progress.php");
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
    /* Custom Styles */
    .gradient-card {
      background-color: rgb(250, 230, 233);
      border: none;
      border-radius: 15px;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }
    .color-range {
      -webkit-appearance: none;
      width: 100%;
      height: 15px;
      border-radius: 5px;
      background: linear-gradient(to right, white,white);
      outline: none;
      margin-bottom: 10px;
    
    }
    /* Style for range input thumb (button) */
    .color-range::-webkit-slider-thumb {
      -webkit-appearance: none;
      appearance: none;
      width: 20px;
      height: 20px;
      background-color: pink; /* Change thumb color */
      border-radius: 50%; /* Make it circular */
      cursor: pointer;
    }
    .range-width{
      width:100%;
    }
    .card11 {
    width: 100%;
    height: 20vh; /* 20% of the viewport height */
    background-color: #f0f0f0;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    padding: 8px;
    box-sizing: border-box;
    margin-bottom: 16px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    
  }
  
  .card11 img {
    width: 20%; /* Adjust as needed */
    height: auto;
    border-radius: 8px;
    margin:10px;
  }

  .content11 {
    width: 70%; /* Adjust as needed */
  }

  .title11 {
    font-size: 16px;
    font-weight: bold;
    margin-bottom: 8px;
  }

  .student11 {
    font-size: 14px;
    display: inline-block;
    margin-right: 8%;
    margin-top:2%;
    font-weight: bold;
    font-family: Lucida Console;
  }
  .x{
    background-color: #f0f0f0;
    border-radius: 8px;
   
    border-radius: 10%; color: black; height: 40px; width: 80px;padding: auto; margin: 30px;
  }

</style>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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
                    <h2>Manage Progress
                        <small class="text-muted">Welcome to Progress Pilot</small>
                    </h2>
                </div>
                
            </div>
        </div>
        <form method="POST">
          <input type="hidden" id="gid" value="<?php echo $_REQUEST['gid'];?>"/>
            <div class="container-fluid" style="width:100%;">
              <div class="row justify-content-center" >
                <div class="col-md-12">

            <div>
            <?php
                $res = mysqli_query($con, "select * from group_stud_tbl where gsid=$_SESSION[gid]");
                while ($row = mysqli_fetch_array($res)) { 
                    ?>
              <div >
                <div class="card11" style="height:170px;">
                <img src="upload/<?php echo $row['image'];?>" alt="img" style="height:150px;width:200px;" class="img-fluid rounded m-b-20">
                  <div class="content11">
                      <div class="title11"><h6><?php echo "GROUP ".$row['gsid']; ?></h6><?php echo "Title: ".$row['title']; ?><br><?php echo "Type: ".$row['tech']; ?></div>
                    <div>
                      <span class="student11"><?php echo $row['name1'] ?></span>
                      <span class="student11"><?php echo $row['name2'] ?></span>
                      <span class="student11"><?php echo $row['name3'] ?></span>
                      <span class="student11"><?php echo $row['name4'] ?></span>
                    </div>
                    </div>
                <input type="submit" name="save" class="btn btn-warning" value="Save"></input>
              </div>
                  </div>
                </div>
                <!-- <input type="submit" id="p1" value="Save" style="background-color: pink; border: 0px; border-radius: 10%; color: black; height: 40px; width: 80px;padding: auto; margin: 30px; padding-top: 10px;"> -->
              </div>

              <?php } ?>

            </div> 


<div>
        <?php
        $pro=mysqli_query($con,'select * from progress_part_tbl');
        $rw=array();
        while($s=mysqli_fetch_array($pro)){
            array_push($rw,$s[1]);
        }
        $x=array();
        $a = "name";
        $b = 1;
        $r=mysqli_query($con,"select * from progress_tbl where grpid=$_SESSION[gid]");
        while ($row = mysqli_fetch_assoc($r)) { ?>
        
          <div class="card gradient-card">
              <div class="card-body d-flex justify-content-between align-items-center" >
                <div class="range-width">
                  <h5 class="card-title"><?php echo $rw[0];?></h5>
                  <input type="range" min="0" max="100" value="<?php echo $row['p1'] ;?>" id="r1" name="r1" class="color-range" >
                  <p><span id="sliderValue"></span></p>
                </div>
                <!-- <input type="submit" id="p1" value="Save" style="background-color: pink; border: 0px; border-radius: 10%; color: black; height: 40px; width: 80px;padding: auto; margin: 30px; padding-top: 10px;"> -->
              </div>
            </div>
            
            <div class="card gradient-card">
              <div class="card-body d-flex justify-content-between align-items-center" >
                <div class="range-width">
                  <h5 class="card-title"><?php echo $rw[1];?></h5>
                  <input type="range" min="0" max="100"  id="r2" name="r2" class="color-range" value="<?php echo $row['p2'] ;?>">
                  <p><span id="sliderValue2"></span></p>
                </div>
                <!-- <input type="submit" id="p2"  value="Save" style="background-color: pink; border: 0px; border-radius: 10%; color: black; height: 40px; width: 80px;padding: auto; margin: 30px; padding-top: 10px;"> -->
              </div>
            </div>
          
            <div class="card gradient-card">
              <div class="card-body d-flex justify-content-between align-items-center" >
                <div class="range-width">
                  <h5 class="card-title"><?php echo $rw[2];?></h5>
                  <input type="range" min="0" max="100"  id="r3" name="r3" class="color-range" value="<?php echo $row['p3'] ;?>">
                  <p><span id="sliderValue3"></span></p>
                </div>
                <!-- <input type="submit" id="p3"  value="Save" style="background-color: pink; border: 0px; border-radius: 10%; color: black; height: 40px; width: 80px;padding: auto; margin: 30px; padding-top: 10px;"> -->
              </div>
            </div>

            <div class="card gradient-card">
              <div class="card-body d-flex justify-content-between align-items-center" >
                <div class="range-width">
                  <h5 class="card-title"><?php echo $rw[3];?></h5>
                  <input type="range" min="0" max="100"  id="r4" name="r4" class="color-range" value="<?php echo $row['p4'] ;?>">
                  <p><span id="sliderValue4"></span></p>
                </div>
                <!-- <input type="submit" id="p4"  value="Save" style="background-color: pink; border: 0px; border-radius: 10%; color: black; height: 40px; width: 80px;padding: auto; margin: 30px; padding-top: 10px;"> -->
              </div>
            </div>
        
            <div class="card gradient-card">
              <div class="card-body d-flex justify-content-between align-items-center" >
                <div class="range-width">
                  <h5 class="card-title"><?php echo $rw[4];?></h5>
                  <input type="range" min="0" max="100"  id="r5" name="r5" class="color-range" value="<?php echo $row['p5'] ;?>">
                  <p><span id="sliderValue5"></span></p>
                </div>
                <!-- <input type="submit" id="p5"  value="Save" style="background-color: pink; border: 0px; border-radius: 10%; color: black; height: 40px; width: 80px;padding: auto; margin: 30px; padding-top: 10px;"> -->
              </div>
            </div>
    
            <div class="card gradient-card">
              <div class="card-body d-flex justify-content-between align-items-center" >
                <div class="range-width">
                  <h5 class="card-title"><?php echo $rw[5];?></h5>
                  <input type="range" min="0" max="100"  id="r6" name="r6" class="color-range" value="<?php echo $row['p6'] ;?>">
                  <p><span id="sliderValue6"></span></p>
                </div>
                <!-- <input type="submit" id="p6"  value="Save" style="background-color: pink; border: 0px; border-radius: 10%; color: black; height: 40px; width: 80px;padding: auto; margin: 30px; padding-top: 10px;"> -->
              </div>
            </div>
    
            <div class="card gradient-card">
              <div class="card-body d-flex justify-content-between align-items-center" >
                <div class="range-width">
                  <h5 class="card-title"><?php echo $rw[6];?></h5>
                  <input type="range" min="0" max="100"  id="r7" name="r7" class="color-range" value="<?php echo $row['p7'] ;?>">
                  <p><span id="sliderValue7"></span></p>
                </div>
                <!-- <input type="submit" id="p7"  value="Save" style="background-color: pink; border: 0px; border-radius: 10%; color: black; height: 40px; width: 80px;padding: auto; margin: 30px; padding-top: 10px;"> -->
              </div>
            </div>
          
            <div class="card gradient-card">
              <div class="card-body d-flex justify-content-between align-items-center" >
                <div class="range-width">
                  <h5 class="card-title"><?php echo $rw[7];?></h5>
                  <input type="range" min="0" max="100"  id="r8" name="r8" class="color-range" value="<?php echo $row['p8'] ;?>">
                  <p><span id="sliderValue8"></span></p>
                </div>
                <!-- <input type="submit" id="p8"  value="Save" style="background-color: pink; border: 0px; border-radius: 10%; color: black; height: 40px; width: 80px;padding: auto; margin: 30px; padding-top: 10px;"> -->
              </div>
            </div>
            
            <div class="card gradient-card">
              <div class="card-body d-flex justify-content-between align-items-center" >
                <div class="range-width">
                  <h5 class="card-title"><?php echo $rw[8];?></h5>
                  <input type="range" min="0" max="100"  id="r9" name="r9" class="color-range" value="<?php echo $row['p9'] ;?>">
                  <p><span id="sliderValue9"></span></p>
               </div>
              </div>
            </div>
            <?php } ?>
          
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
    <script>

                              



    var slider = document.getElementById("r1");
    var output = document.getElementById("sliderValue");
    output.innerHTML = slider.value;
    
    slider.oninput = function() {
      output.innerHTML = this.value;
    }
    document.getElementById('r1').addEventListener('input', function() {
    var value = (this.value - this.min) / (this.max - this.min);
    this.style.background = 'linear-gradient(to right,  pink 0%,rgb(180,166,168) ' + (value * 100) + '%, white ' + (value * 100) + '%, white 100%)';
  });



  var slider2 = document.getElementById("r2");
    var output2 = document.getElementById("sliderValue2");
    output2.innerHTML = slider2.value;
    
    slider2.oninput= function() {
      output2.innerHTML = this.value;
    }
    document.getElementById('r2').addEventListener('input', function() {
    var value = (this.value - this.min) / (this.max - this.min);
    this.style.background = 'linear-gradient(to right,  pink 0%,rgb(180,166,168) ' + (value * 100) + '%, white ' + (value * 100) + '%, white 100%)';
  });


  var slider3 = document.getElementById("r3");
    var output3 = document.getElementById("sliderValue3");
    output3.innerHTML = slider3.value;
    
    slider3.oninput = function() {
      output3.innerHTML = this.value;
    }
    document.getElementById('r3').addEventListener('input', function() {
    var value = (this.value - this.min) / (this.max - this.min);
    this.style.background = 'linear-gradient(to right,  pink 0%,rgb(180,166,168) ' + (value * 100) + '%, white ' + (value * 100) + '%, white 100%)';
  });
  
  var slider4 = document.getElementById("r4");
    var output4 = document.getElementById("sliderValue4");
    output4.innerHTML = slider4.value;
    
    slider4.oninput = function() {
      output4.innerHTML = this.value;
    }
    document.getElementById('r4').addEventListener('input', function() {
    var value = (this.value - this.min) / (this.max - this.min);
    this.style.background = 'linear-gradient(to right,  pink 0%,rgb(180,166,168) ' + (value * 100) + '%, white ' + (value * 100) + '%, white 100%)';
  });

  var slider5 = document.getElementById("r5");
    var output5 = document.getElementById("sliderValue5");
    output5.innerHTML = slider5.value;
    
    slider5.oninput = function() {
      output5.innerHTML = this.value;
    }
    document.getElementById('r5').addEventListener('input', function() {
    var value = (this.value - this.min) / (this.max - this.min);
    this.style.background = 'linear-gradient(to right,  pink 0%,rgb(180,166,168) ' + (value * 100) + '%, white ' + (value * 100) + '%, white 100%)';
  });

  var slider6 = document.getElementById("r6");
    var output6 = document.getElementById("sliderValue6");
    output6.innerHTML = slider6.value;
    
    slider6.oninput = function() {
      output6.innerHTML = this.value;
    }
    document.getElementById('r6').addEventListener('input', function() {
    var value = (this.value - this.min) / (this.max - this.min);
    this.style.background = 'linear-gradient(to right,  pink 0%,rgb(180,166,168) ' + (value * 100) + '%, white ' + (value * 100) + '%, white 100%)';
  });

  var slider7 = document.getElementById("r7");
    var output7 = document.getElementById("sliderValue7");
    output7.innerHTML = slider7.value;
    
    slider7.oninput = function() {
      output7.innerHTML = this.value;
    }
    document.getElementById('r7').addEventListener('input', function() {
    var value = (this.value - this.min) / (this.max - this.min);
    this.style.background = 'linear-gradient(to right,  pink 0%,rgb(180,166,168) ' + (value * 100) + '%, white ' + (value * 100) + '%, white 100%)';
  });

  var slider8 = document.getElementById("r8");
    var output8 = document.getElementById("sliderValue8");
    output8.innerHTML = slider8.value;
    
    slider8.oninput = function() {
      output8.innerHTML = this.value;
    }
    document.getElementById('r8').addEventListener('input', function() {
    var value = (this.value - this.min) / (this.max - this.min);
    this.style.background = 'linear-gradient(to right,  pink 0%,rgb(180,166,168) ' + (value * 100) + '%, white ' + (value * 100) + '%, white 100%)';
  });

  var slider9 = document.getElementById("r9");
    var output9 = document.getElementById("sliderValue9");
    output9.innerHTML = slider9.value;
    
    slider9.oninput = function() {
      output9.innerHTML = this.value;
    }
    document.getElementById('r9').addEventListener('input', function() {
    var value = (this.value - this.min) / (this.max - this.min);
    this.style.background = 'linear-gradient(to right,  pink 0%,rgb(180,166,168) ' + (value * 100) + '%, white ' + (value * 100) + '%, white 100%)';
  });
</script>

</body>

<!-- Mirrored from thememakker.com/templates/oreo/university/html/students.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 18 Dec 2023 15:37:36 GMT -->

</html>
<?php }?>