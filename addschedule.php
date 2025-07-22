<?php
session_start();
if ($_SESSION['USER'] == "") {
    header("location:index.php");
} else {
    require_once("connection.php");
    $date = date("Y-m-d");
    // require_once("fetchEvents.php");

    if (isset($_POST["add"])) {
        $fid = $_SESSION["ID"];
        $date = $_POST['date'];
        $start_time = $_POST['start_time'];
        $remark = $_POST['remark'];
        $end_time = $_POST['end_time'];
        $sql = "insert into sub_schedule_tbl (fid,sub_weekly_date,sub_remark,sub_start_date,sub_end_date) values ($fid,'$date','$remark','$start_time','$end_time')";
        $result = mysqli_query($con, $sql);
        
        if ($result) {
            
$sql = "SELECT `token` FROM `group_stud_tbl` WHERE `faculty_id` = $fid";
$res = mysqli_query($con, $sql);
// $x = mysqli_fetch_array($res);
// $c = count($x);
// echo $c;
$serverKey = 'AAAAuE_p1ag:APA91bESGoVFEFpNhmq5AU5i42Xd-9ABUMBhEg10t72cN6UyCqDdnMAqyH1BWGntzbeH8rNA--XBOiZtlZc3U-EsqZCx7wCr-L8aGb5YcdBVXqmdywhavb5qVQK__0QkUAMqMEDV8Kzn';


// Update the row count retrieval
$count = mysqli_num_rows($res);
// echo $count;
// Iterate over the fetched rows
while ($row = mysqli_fetch_assoc($res)) {
    $token = $row['token'];
    if (!empty($token)) {
        // Your notification sending logic here
        // $message = "New Schedule Added \n";
        // $msg;

        $notificationData = [
            'to' => $token,
            'notification' => [
                'title' => 'Progress Pilot',
                'body' => $remark,
            ],
        ];

        $ch = curl_init('https://fcm.googleapis.com/fcm/send');
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($notificationData));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json',
            'Authorization: key=' . $serverKey,
        ]);

        $result = curl_exec($ch);
        curl_close($ch);
        // echo $result;
        // echo $token;
    }
}

        }
        header("location:addschedule.php");
    }
    ?>
    <!doctype html>
    <html class="no-js " lang="en">

    <!-- Mirrored from thememakker.com/templates/oreo/university/html/events.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 18 Dec 2023 15:37:32 GMT -->

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=Edge">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <meta name="description" content="Responsive Bootstrap 4 and web Application ui kit.">

        <title>Progress Pilot</title>
        <link rel="icon" href="favicon.ico" type="image/x-icon">
        <!-- Favicon-->
        <link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/plugins/fullcalendar/fullcalendar.min.css">
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
        <?php include("navbar.php"); ?>
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
        <!-- Right Sidebar -->

    

        <section class="content page-calendar">
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-7 col-md-6 col-sm-12">
                        <h2>Schedule Calendar
                            <small>Welcome to Progress Pilot</small>
                        </h2>
                    </div>
                    <!-- <div class="col-lg-5 col-md-6 col-sm-12">
                    <ul class="breadcrumb float-md-right">
                        <li class="breadcrumb-item"><a href="index.html"><i class="zmdi zmdi-home"></i> Oreo</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0);">App</a></li>
                        <li class="breadcrumb-item active">Calendar</li>
                    </ul>
                </div> -->
                </div>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12 col-lg-4 col-xl-4">
                        <div class="card" style="height: auto;">
                            <div class="header">
                                <h2><strong>Upcoming Schedules</strong></h2>
                                <!-- <ul class="header-dropdown">
                                <li class="dropdown"> <a href="javascript:void(0);" class="dropdown-toggle"
                                        data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="zmdi zmdi-more"></i> </a>
                                    <ul class="dropdown-menu dropdown-menu-right slideUp">
                                        <li><a href="javascript:void(0);">Action</a></li>
                                        <li><a href="javascript:void(0);">Another action</a></li>
                                        <li><a href="javascript:void(0);">Something else</a></li>
                                    </ul>
                                </li>
                                <li class="remove">
                                    <a role="button" class="boxs-close"><i class="zmdi zmdi-close"></i></a>
                                </li>
                            </ul> -->
                            </div>
                            <div class="body">
                                <button type="button" class="btn btn-round btn-block waves-effect mb-4" data-toggle="modal"
                                    data-target="#addevent">Add New Schedule</button>
                                <?php
                                $sql = "SELECT * FROM `sub_schedule_tbl` WHERE fid = $_SESSION[ID] and sub_weekly_date >= '$date' order by sub_weekly_date limit 6";
                                $res = mysqli_query($con, $sql);
                                while ($row = mysqli_fetch_array($res)) {
                                    $dt = new DateTime($row['sub_weekly_date']);
                                    $y = $dt->format("Y"); // Output: 2024
                                    
                                    // Fetch the month
                                    $m = $dt->format("m"); // Output: 02
                                    
                                    // Fetch the day
                                    $d = $dt->format("d"); // Output: 22
                                    
                                    ?>
                                    <div class="event-name b-lightred row">
                                        <div class="col-2 text-center">
                                            <h4><?php echo $d?><span><?php echo $m?></span><span><?php echo $y?></span></h4>
                                        </div>
                                        <div class="col-8">
                                            <h6><?php echo $row['sub_remark']?></h6>
                                            <p><b>Start Time : &nbsp;&nbsp;</b><?php echo   $row['sub_start_date']?></p>
                                            <p><b>End Time : &nbsp;&nbsp;</b><?php echo $row['sub_end_date']?></p>
                                            <!-- <address><i class="zmdi zmdi-pin"></i> 123 6th St. Melbourne, FL 32904</address> -->
                                        </div>
                                        
                                        <div class="col-2 mt-3">
                                        <a href="delsch.php?del=<?php echo $row[0]; ?>"onclick="return confirm('Are you sure you want to delete Schedule' );">
                                            <i class="zmdi zmdi-delete " style="font-size: 35px;color:red"></i>
                                        </a>  
                                        </div>
                                    </div>
                                <?php } ?>
                                
                                <!-- <div class="event-name b-greensea row">
                            <div class="col-2 text-center">
                                <h4>16<span>Dec</span><span>2017</span></h4>
                            </div>
                            <div class="col-10">
                                <h6>Repeating Event</h6>
                                 <p>It is a long established fact that a reader will be distracted</p> 
                                 <address><i class="zmdi zmdi-pin"></i> 123 6th St. Melbourne, FL 32904</address> 
                            </div>
                        </div> 
                             <div class="event-name b-primary row">
                            <div class="col-2 text-center">
                                <h4>11<span>Dec</span><span>2017</span></h4>
                            </div>
                            <div class="col-10">
                                <h6>Conference</h6>
                                 <p>It is a long established fact that a reader will be distracted</p> 
                                 <address><i class="zmdi zmdi-pin"></i> 123 6th St. Melbourne, FL 32904</address>   
                            </div>
                        </div>-->
                            </div>
                        </div>
                        <!-- <div class="card">
                    <div class="header">
                        <h2><strong>Activity</strong></h2>
                        <ul class="header-dropdown">
                            <li class="dropdown"> <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="zmdi zmdi-more"></i> </a>
                                <ul class="dropdown-menu dropdown-menu-right slideUp">
                                    <li><a href="javascript:void(0);">Action</a></li>
                                    <li><a href="javascript:void(0);">Another action</a></li>
                                    <li><a href="javascript:void(0);">Something else</a></li>
                                </ul>
                            </li>
                            <li class="remove">
                                <a role="button" class="boxs-close"><i class="zmdi zmdi-close"></i></a>
                            </li>
                        </ul>                        
                    </div>
                    <div class="body">                                                    
                        <div class="event-name b-primary row">
                            <div class="col-2 text-center">
                                <h4>13<span>Dec</span><span>2017</span></h4>
                            </div>
                            <div class="col-10">
                                <h6>Birthday</h6>
                                <p>It is a long established fact that a reader will be distracted</p>
                                <address><i class="zmdi zmdi-pin"></i> 123 6th St. Melbourne, FL 32904</address>
                            </div>
                        </div>
                    </div>
                </div> -->
                    </div>
                    <div class="col-md-12 col-lg-8 col-xl-8">
                        <div class="card">
                            <div class="body">
                                <button class="btn btn-primary btn-sm btn-round waves-effect"
                                    id="change-view-today">today</button>
                                <button class="btn btn-default btn-sm btn-simple btn-round waves-effect"
                                    id="change-view-day">Day</button>
                                <button class="btn btn-default btn-sm btn-simple btn-round waves-effect"
                                    id="change-view-week">Week</button>
                                <button class="btn btn-default btn-sm btn-simple btn-round waves-effect"
                                    id="change-view-month">Month</button>
                                <div id="calendar"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Default Size -->
        <form method="POST">
            <div class="modal fade" id="addevent" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="title" id="defaultModalLabel">Add Schedule</h4>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="Date" class="form-control" placeholder="Schedule Date" name="date" min=<?php echo $date?> required>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="Time" class="form-control" placeholder="Schedule Time" id="start_time" name="start_time" max="15:00" min="07:30" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="Time" class="form-control" placeholder="To" id="end_time" name="end_time" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" class="form-control" placeholder="Topic" name="remark" required>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <input type="Submit" class="btn btn-primary btn-round waves-effect" value="ADD" name="add">
                            <input type="button" class="btn btn-simple btn-round waves-effect" data-dismiss="modal"
                                value="close"></button>
                        </div>
                    </div>
                </div>
            </div>
        </form>

        <!-- Jquery Core Js -->
        <!-- <div class="modal" id="confirmationModal">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Confirmation</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                Are you sure you want to delete this item?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                <button type="button" class="btn btn-danger" id="confirmDelete">Yes</button>
            </div>
            </div>
        </div>
        </div> -->
 


        <script src="assets/bundles/libscripts.bundle.js"></script>
        <!-- Lib Scripts Plugin Js -->
        <script src="assets/bundles/vendorscripts.bundle.js"></script>
        <!-- Lib Scripts Plugin Js -->

        <script src="assets/bundles/fullcalendarscripts.bundle.js"></script>
        <!-- / calender javascripts -->

        <script src="assets/bundles/mainscripts.bundle.js"></script>
        <!-- Custom Js -->
        <!-- <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.2.0/main.min.js"></script> -->
        <script src="assets/js/pages/calendar/calendar.js"></script>
        <script>
    const startTimeInput = document.getElementById('start_time');
    // Get the end time input field
    const endTimeInput = document.getElementById('end_time');

    // Add event listener to the start time input field
    startTimeInput.addEventListener('input', function() {
        // Parse the start time string
        const startTimeParts = this.value.split(':');
        // Convert hours and minutes to integers
        const startHours = parseInt(startTimeParts[0], 10);
        const startMinutes = parseInt(startTimeParts[1], 10);

        // Calculate the minimum end time
        let minEndHours = startHours + 1;
        let minEndMinutes = startMinutes;

        // Ensure that the minimum end time does not exceed 4:00 PM
        if (minEndHours >= 16) {
            minEndHours = 16;
            minEndMinutes = 0;
        }

        // Format the minimum end time
        const formattedMinEndHours = minEndHours < 10 ? '0' + minEndHours : minEndHours;
        const formattedMinEndMinutes = minEndMinutes < 10 ? '0' + minEndMinutes : minEndMinutes;
        const minEndTime = formattedMinEndHours + ':' + formattedMinEndMinutes;

        // Set the minimum value of the end time input field
        endTimeInput.min = minEndTime;

        // Set the maximum value of the end time input field to 4:00 PM
        endTimeInput.max = '16:00';
    });
 
</script>
        <script>
            var currentDate = new Date();
            // var username = "<?php echo $_SESSION['fetchEvents']; ?>";
            // alert(username)
            $('#calendar').fullCalendar({
                header: {
                    left: 'prev',
                    center: 'title',
                    right: 'next'
                },
                defaultDate: currentDate,
                editable: true,
                droppable: true, // this allows things to be dropped onto the calendar
                drop: function () {
                    // is the "remove after drop" checkbox checked?
                    if ($('#drop-remove').is(':checked')) {
                        // if so, remove the element from the "Draggable Events" list
                        $(this).remove();
                    }
                },
                eventLimit: true, // allow "more" link when too many events
                events: {
                    url: 'fetchEvents.php',
                    method: 'GET'
                },
            });
            calendar.render()
        </script>
        <!-- <script>
            $(document).ready(function(){
            $(".delete-icon").click(function(){
                var itemId = $(this).data('item-id');
                $('#confirmationModal').data('item-id', itemId).modal('show');
            });

            $("#confirmDelete").click(function(){
                var itemId = $('#confirmationModal').data('item-id');
                window.location.href = 'delete.php?id=' + itemId;
            });
            });
     </script> -->
     </body>

    <!-- Mirrored from thememakker.com/templates/oreo/university/html/events.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 18 Dec 2023 15:37:33 GMT -->

    </html>
<?php } ?>