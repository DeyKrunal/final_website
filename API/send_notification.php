<?php
// echo $x = $_POST['student_id'];
echo $x = "frnobb1DRyCRMJmjIXQAYM:APA91bECwkFiFt2a2ClsUVhbBoFTzUUDiaMFSnUmmqlGZApgQJcA7xf_w6ylARz9oC0swHCFq9cgN-urmS0_N77cSE3-1RjtzYgBgXp6Nckilm7SGELnT_EjhRGB-OMVX3IF39SzXbla";

    $serverKey = 'AAAAYMY2doo:APA91bFZSP5x67MLU4kEWxU-iovRgzQ8mewgwGHKcw7EBQkowmV46UPukFgSAa3h0YJUS0kWa8krvoFkTGWqOm_osJMnaDwlFA624WRfcM9KJkf2WDnsIGGaIJQwpjyN1eik2RRinUsc';
    $url = 'https://fcm.googleapis.com/v1/projects/chatter-ed5ac/messages:send';
    
     echo "Hello1";

    $notification = [
        'title' => 'New Schedule Added',
        'body' => 'A new schedule has been added by the faculty.',
    ];
     echo "Hello2";

    $data = [
        'notification' => $notification,
        'token' => $x,
    ];
     echo "Hello3";

    $headers = [
        'Authorization: Bearer ' . $serverKey,
        'Content-Type: application/json',
    ];
     echo "Hello4";

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
     echo "Hello5";
     echo "Hello6";
    
    // $result = curl_exec($ch);

    if ($result === false) {
        // return false;
        echo 'Curl error: ' . curl_error($ch);
    } else {
        // return true;
        echo 'Notification sent successfully!';
    }

    curl_close($ch);



?>