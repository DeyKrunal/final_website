<?php

include_once ("connection.php");
$data = json_decode(file_get_contents('php://input'), true);

$fid = $_REQUEST['fid'];
$msg = $_REQUEST['msg'];

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
                'body' => $msg,
                 
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
        echo $result;
        // echo $token;
    }
}

// $studentID = "cI_1KA9TT_G0Aurd3D27SH:APA91bFdb96va0PiGIGB5RgM2OqCMGwMPOhMt5qp39_H2B0UhBqlLz683ZqRpyGbHXUpCnHV81lqKG6tMG_chM_C5sxY5h9nTqmSMDZdmasvFLgfbl57Hhb4I65qqJWJMTuUfu6vpiC9";

?>