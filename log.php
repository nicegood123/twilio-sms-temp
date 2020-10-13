<?php
session_start();

$con = mysqli_connect('localhost','root','');
mysqli_select_db($con, 'twilio_sms');

$id = $_POST['id'];
$message = $_POST['message'];


  $sql ="INSERT INTO message_log VALUES ('$id','$message', 'delivered', now())";
  mysqli_query($con,$sql);


?>