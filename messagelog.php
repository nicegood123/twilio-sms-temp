<?php
session_start();
if(!isset($_SESSION['is_logged_in'])){ header('location:index.php'); }
?>
<html>

<head>
    <title>Message Log</title>
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/homestyle.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>

<body>
    <a class="float-right logout" href="logout.php">LOGOUT </a>
    <h1 class="display-5">Welcome ID Number: <?php echo $_SESSION['user_id']; ?> </h1>

    <div class="container" id="mainCont">
        <div class="tableCont">
            <h3>Logs</h3>
            <table id="table">
                <tr>
                    <th>Message</th>
                    <th>Status</th>
                    <th>Date Sent</th>

                </tr>
                <?php
                $con = mysqli_connect('localhost','root','');
                mysqli_select_db($con, 'twilio_sms');    

                $sql = "SELECT * FROM message_log WHERE user_id='".$_GET['id']."' ";
                $result = $con->query($sql);

                if($result->num_rows > 0) {
                    while($row = $result-> fetch_assoc()) {
            ?>
                <tr>
                    <td><?php echo $row["message"]; ?></td>
                    <td><?php echo $row["status"]; ?></td>
                    <td><?php echo $row["date_sent"]; ?></td>
               
                </tr>
                <?php 
                    } 
                } 
            ?>

            </table><br>
            <a href="home.php" class="btn btn-primary">Back</a>
        </div>
    </div>

    <script src="js/jquery-3.5.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/tablejs.js"></script>

</body>

</html>