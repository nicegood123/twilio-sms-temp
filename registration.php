<?php
session_start();
header('location:index.php');

$con = mysqli_connect('localhost','root','');
mysqli_select_db($con, 'twilio_sms');

$id = $_POST['id'];
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$phone_number = $_POST['phone_number'];
$program = $_POST['program'];
$password = $_POST['password'];

$sql = "SELECT * FROM user WHERE id = '$id'";
$result = mysqli_query($con, $sql);
$num = mysqli_num_rows($result);

if($num == 1){
    echo"ID Number is Already Taken";
}
else {
    $sql ="INSERT INTO user VALUES ('$id','$firstname', '$lastname','$phone_number','$program','$password',0)";
    mysqli_query($con,$sql);
    echo"Registration Successful";
}

?>