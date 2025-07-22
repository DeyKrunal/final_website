<?php
    require_once("connection.php");

$my_email=$_REQUEST['email'];



$sql="select * from group_stud_tbl where email1='$my_email' or email2='$my_email' or email3='$my_email' or email4='$my_email'";
$n = mysqli_num_rows(mysqli_query($con,$sql));
// echo $my_email;

if($n>0){
  $url= "PHPMailer/class.smtp.php";
include("$url");

// optional, gets called from within class.phpmailer.php if not 
$url2="PHPMailer/class.phpmailer.php";
require_once("$url2");

$mail = new PHPMailer(); // create a new object
$mail->IsSMTP(); // enable SMTP
// $mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
$mail->SMTPAuth = true; // authentication enabled
$mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for GMail
$mail->Host = "smtp.gmail.com";
$mail->Port = 465; // or 587
$mail->IsHTML(true);
$mail->Username   = "projectmanage24@gmail.com";  // GMAIL username
$mail->Password   = "mscu ctiw xawz iwmz";            // GMAIL password

$mail->SetFrom("projectmanage24@gmail.com");
$mail->Subject = "Need to reset your password.!!";
$email=$my_email;

$permitted_chars = '0123456789';
$otp=substr(str_shuffle($permitted_chars), 0, 5);



//http://127.0.0.1/hope/CodeIgniter-3.1.6//index.php/login_con/resetpass
$mail->Body = "Hey there,<br><br>
Someone requested a new password for your <b>PROGRESS PILOT</b> account.<br><br>
Your Secret code <b>$otp</b>.<br><br>
If you didn’t make this request, then you can ignore this email 🙂.";
$mail->AddAddress($my_email);
$mail->Timeout = 30;
 if(!$mail->Send())
    {
  echo "Mailer Error: " . $mail->ErrorInfo;
    }
    else
    {
		
        $ar = array();
      $ar['sotp'] = $otp;
      $ar['email'] = $my_email;
      echo json_encode($ar);
    }
    // header("location:otp2.php");

}else{
 $ar = array();
  $ar['sotp'] = '0';
  echo json_encode($ar);
}

	
?>