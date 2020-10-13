<?php
session_start();
if(!isset($_SESSION['is_logged_in'])){ header('location:index.php'); }
?>
<html>

<head>
    <title>Home Page</title>
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/homestyle.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>

<body>
    <a class="float-right logout" href="logout.php">LOGOUT </a>
    <h1 class="display-5">Welcome ID Number: <?php echo $_SESSION['user_id']; ?> </h1>

    <div class="container" id="mainCont">
        <div class="tableCont">
            <h3>Contacts</h3>
            <table id="table">
                <tr>
                    <th>ID Number</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Phone Number</th>
                    <th>Program</th>
                    <th>Action</th>
                </tr>
                <?php
                $con = mysqli_connect('localhost','root','');
                mysqli_select_db($con, 'twilio_sms');    

                $sql = "SELECT * FROM user";
                $result = $con->query($sql);

                if($result->num_rows > 0) {
                    while($row = $result-> fetch_assoc()) {
            ?>
                <tr>
                    <td><?php echo $row["id"]; ?></td>
                    <td><?php echo $row["firstname"]; ?></td>
                    <td><?php echo $row["lastname"]; ?></td>
                    <td><?php echo $row["phone_number"]; ?></td>
                    <td><?php echo $row["program"]; ?></td>
                    <td>
                        <button class="btn btn-secondary" id="smsbtn" data-toggle="modal"
                            data-target="#msgModal">SMS</button>
                        <a href="messagelog.php?id=<?php echo $row['id']; ?>" class="btn btn-secondary">Logs</a>
                    </td>
                </tr>
                <?php 
                    } 
                } 
            ?>

            </table>
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#sendToMany">Send
                Group</button>
        </div>
    </div>


    <div class="modal fade" role="dialog" id="msgModal" tabindex="-1">
        <div class="modal-dialog" id="modalSMS" role="document">
            <div class="modal-content">
                <form action="process.php" method="POST">
                    <div class="modal-header">
                        <h3 class="modal-title">Send SMS</h3>
                        <button class="close" type="button" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group" hidden>
                            <label for="indivMsg">ID</label>
                            <input type="text" id="user_id" name="user_id" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="indivMsg">Phone Number</label>
                            <input type="text" id="number" name="number" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="userSMS">Type your message here</label>
                            <textarea class="form-control" name="message" id="message" rows="3"
                                placeholder="type here"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" name="send_message" class="btn btn-success">Send</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <!-- Group Message -->
    <div class="modal fade" role="dialog" id="sendToMany" tabindex="-1">
        <div class="modal-dialog" id="modalSMS" role="document">
            <div class="modal-content">
                <form action="processgroup.php" method="POST">
                    <div class="modal-header">
                        <h3 class="modal-title">Send SMS</h3>
                        <button class="close" type="button" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="groupProg">Enter Program</label>
                            <input type="text" id="program" name="program" class="form-control"
                                placeholder="Enter Course" required>
                        </div>
                        <div class="form-group">
                            <label for="userSMS">Type your message here</label>
                            <textarea class="form-control" name="message" id="message" rows="3"
                                placeholder="type here"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" name="send_bulk_message" class="btn btn-success">Send</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="js/jquery-3.5.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/tablejs.js"></script>

</body>

</html>