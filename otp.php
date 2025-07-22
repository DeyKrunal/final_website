<?php
session_start();
$otp=$_SESSION['otp'];
if(isset($_REQUEST['verify'])){

$n1=$_REQUEST['digit1'];
$n2=$_REQUEST['digit2'];
$n3=$_REQUEST['digit3'];
$n4=$_REQUEST['digit4'];
$n5=$_REQUEST['digit5'];
$final_otp=$n1.$n2.$n3.$n4.$n5;
// echo "$final_otp";
if($otp==$final_otp)
{
    header("Location:new_pass.php");
}else{
    echo "<script>alert('Invalid OTP');</script>";
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            /* background: linear-gradient(45deg, #3498db, #e74c3c); */
            background-image: url("assets/images/login.jpg");
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0;
        }

        .otp-container {
            background-color: pink;
            width: auto;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }

        .otp-box {
            display: inline-block;
            margin: 0 5px;
        }

        input[type="text"] {
            text-align: center;
            width: 50px;
            font-size: 20px;
        }

        button {
            background-color: #27ae60;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #219d54;
        }
    </style>
    <title>OTP Verification</title>
</head>
<body>
<!-- <div class="page-header-image" style="background-image:url(assets/images/login.jpg)"></div> -->

    <div class="container otp-container">
        <h2 class="text-center m-5">OTP Verification</h2>
        <form method="post">
            <div class="form-group text-center">
                <div class="otp-box">
                    <input type="text" name="digit1" maxlength="1" required>
                </div>
                <div class="otp-box">
                    <input type="text" name="digit2" maxlength="1" required>
                </div>
                <div class="otp-box">
                    <input type="text" name="digit3" maxlength="1" required>
                </div>
                <div class="otp-box">
                    <input type="text" name="digit4" maxlength="1" required>
                </div>
                <div class="otp-box">
                    <input type="text" name="digit5" maxlength="1" required>
                </div>
            </div>
            <div class="form-group text-center">
                <input type="submit" value="Varify OTP"  id="verify" name="verify">
            </div>
        </form>
    </div>
</body>
</html>