<?php
session_start();

$con = mysqli_connect('localhost','root','');
mysqli_select_db($con, 'twilio_sms');

$id = $_POST['id'];
$password = $_POST['password'];

$sql = "SELECT * FROM user WHERE id = '$id' && password = '$password'";
$result = mysqli_query($con, $sql);
$num = mysqli_num_rows($result);

if($num == 1){
    $_SESSION['user_id'] = $id;
    $_SESSION['is_logged_in'] = true;
   header('location:home.php');
}
else { header('location:index.php'); }

?>