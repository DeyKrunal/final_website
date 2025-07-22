<?php
session_start();
if ($_SESSION['USER'] == "") {
    header("location:index.php");
} else {
    require_once("connection.php");
    $page=$_REQUEST['name'];



    ?>
<!DOCTYPE html>
<html>
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
    <!-- Include Chart.js library -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="assets/bundles/libscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js ( jquery.v3.2.1, Bootstrap4 js) --> 
<script src="assets/bundles/vendorscripts.bundle.js"></script> <!-- slimscroll, waves Scripts Plugin Js -->

<script src="assets/bundles/morrisscripts.bundle.js"></script><!-- Morris Plugin Js -->
<script src="assets/bundles/jvectormap.bundle.js"></script> <!-- JVectorMap Plugin Js -->
<script src="assets/plugins/jvectormap/jquery-jvectormap-us-aea-en.js"></script><!-- USA Map Js -->
<script src="assets/bundles/knob.bundle.js"></script> <!-- Jquery Knob, Count To, Sparkline Js -->

<script src="assets/bundles/mainscripts.bundle.js"></script>
<script src="assets/js/pages/index.js"></script>
<script>
      
            window.print();
            window.location.href = $page;
           
    </script>
<style>
    /* table {
        font-family: Arial, sans-serif;
        border-collapse: collapse;
        width: 100%;
    } */

    td, th {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
    }

    th {
        background-color: #f2f2f2;
    }

    canvas {
        display: block;
        margin: auto;
        max-width: 100%;
    }
</style>
</head>
<body>
    
<!-- <form action="pdf2.php" method="post"> -->
<!-- <a class="btn btn-danger float-left" href="<?php echo $page;?>">BACK</a>
<button class="btn btn-danger float-right" onclick="printPage();">Generate PDF</button> -->
<table class="table table-hover">
    <thead >
    <tr>
            <th>Group No.</th>
            <th>Student Names</th>
            <th>Roll No</th>
            <th>Division</th>
            <th>
           Progress Detials
            </th>
            <th>Faculty Name</th>
            <th>Remark</th>
    </tr>
    </thead>
    <tbody>
    <?php
    // Step 1: Establish database connection
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "project";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if($_SESSION['USER'] == "ADMIN")
    {
        $sql="SELECT g.gsid as gid,name1,rn1,div1,name2,rn2,div2,name3,rn3,div3,name4,rn4,div4,f.f_name as fname,p1,p2,p3,p4,p5,p6,p7,p8,p9 from group_stud_tbl g join faculty_tbl f on g.faculty_id=f.fid join progress_tbl p on p.grpid=g.gsid order by g.gsid";

    }
    else{
        $fid= $_SESSION['ID'];
        $sql="SELECT g.gsid as gid,name1,rn1,div1,name2,rn2,div2,name3,rn3,div3,name4,rn4,div4,f.f_name as fname,p1,p2,p3,p4,p5,p6,p7,p8,p9 from group_stud_tbl g join faculty_tbl f on g.faculty_id=f.fid join progress_tbl p on p.grpid=g.gsid where g.faculty_id=$fid order by g.gsid ";

    }
    
    // Step 2: Fetch data from progress_tbl and student_tbl (assuming student_tbl contains student names)

    $result = $conn->query($sql);

    // Step 3: Render student information in table format
    while ($row = $result->fetch_assoc()) {
        $studentID = $row['gid'];
        $fname= $row['fname'];
        $n1 = $row['name1'];
        $n2 = $row['name2'];
        $n3 = $row['name3'];
        $n4 = $row['name4'];
        $rn1 = $row['rn1'];
        $rn2 = $row['rn2'];
        $rn3 = $row['rn3'];
        $rn4 = $row['rn4'];
        $d1 = $row['div1'];
        $d2 = $row['div2'];
        $d3 = $row['div3'];
        $d4 = $row['div4'];

        $marks = array($row['p1'], $row['p2'], $row['p3'], $row['p4'], $row['p5'], $row['p6'], $row['p7'], $row['p8'], $row['p9']); // Marks for subjects

        // Render chart
        $chartData = json_encode($marks);
        ?>
        <tr>
            <td><?php echo $studentID; ?></td>
            <td><?php echo $n1."<br>".$n2."<br>".$n3."<br>",$n4; ?></td>
            <td><?php echo $rn1."<br>".$rn2."<br>".$rn3."<br>",$rn4; ?></td>
            <td><?php echo $d1."<br>".$d2."<br>".$d3."<br>",$d4; ?></td>
            <td style="align-item:center;">
                 <canvas id="myChart<?php echo $studentID; ?>"></canvas>
                <script>
                    // Render chart
                    var ctx<?php echo $studentID; ?> = document.getElementById('myChart<?php echo $studentID; ?>').getContext('2d');
                    var myChart<?php echo $studentID; ?> = new Chart(ctx<?php echo $studentID; ?>, {
                        type: 'bar',
                        data: {
                            labels: ['1', '2', '3', '4', '5', '6', '7', '8', '9'],
                            datasets: [{
                                label: 'Progress',
                                data: <?php echo $chartData; ?>,
                                backgroundColor: ['green'],
                                // borderColor: getRandomColor(),
                                borderWidth: 1
                            }]
                        },
                        options: {
                            scales: {
                                yAxes: [{
                                    ticks: {
                                        beginAtZero: false,
                                        // Customize y-axis ticks here
                                        stepSize: 10, // Define the step size
                                        min: 0, // Define the minimum value
                                        max: 100 
                                    }
                                }]
                            }
                        }
                    });

                    // Function to generate random color
                    function getRandomColor() {
                        var letters = '0123456789ABCDEF';
                        var color = '#';
                        for (var i = 0; i < 6; i++) {
                            color += letters[Math.floor(Math.random() * 16)];
                        }
                        return color;
                    }
                </script>
            </td>
            <td><?php echo $fname; ?></td>
            <td><?php echo "&nbsp"; ?></td>
        </tr>
        <?php
    }

    // Close database connection
    $conn->close();
    ?>
    </tbody>
</table>
<!-- </form> -->
</body>
</html>
<?php } ?>