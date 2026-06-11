<?php
$username = $_POST['username'];

$secretKey = "6Lfb6hktAAAAAOax9Z4piFCMi8P5CxOP5OJIMAmD";

$responseKey = $_POST['g-recaptcha-response'];

$url = "https://www.google.com/recaptcha/api/siteverify?secret=$secretKey&response=$responseKey";

$response = file_get_contents($url);

$data = json_decode($response);

if($data->success)
{
    echo "<h2>Captcha Verified Successfully</h2> <b>Welcome ".$username."</b>";
}else
{
    echo "Please Complete Captcha";
}

?>