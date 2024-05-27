<!DOCTYPE html>
<html lang="en">
<head>
    <?php include(__DIR__ . '/../../TitleOfWebPage/title.php'); ?>
    <link rel="stylesheet" type="text/css" href="/styleCSS/DirectorInterface/DirectorInterfaceStyle.php">
    <link rel="stylesheet" type="text/css" href="/styleCSS/systemAdminInterface/AddUserStyle.php">
    <link rel="stylesheet" type="text/css" href="/styleCSS/systemAdminInterface/AttendenceStyle.php">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" > -->
    <script src="    https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.6/jspdf.plugin.autotable.min.js"></script>
    <style>

    </style>
</head>
<body>
    <div class="div-header">
        <?php include 'DashBoard.php' ?>
    </div>
    <div class="div-Main-container">
    <a href="ApplyLeave.php" style="text-decoration: none;"><h4 style="margin-left:30px; margin-bottom:-10px;">Leave>Approve Status</h4></a>
    <div class="Main-Dashboard" style="text-align:center; width:90%; background-color: rgb(205, 215, 253);">
            <h1>My Leave Approve Status</h1>
            <br>
            <table  id="table">
                <tr style=" background-color: rgb(105, 111, 255); ">
                    <th>Leave Name</th>
                    <!-- <th>Period</th> -->
                    <th>Start Date</th>
                    <th>End Time</th>
                    <th>Comment</th>
                    <th>Status</th>
                    <th>Cancel</th>
                </tr>
                <?php
                include '../../DataBase/contodb.php';

                if (isset($_COOKIE['username'])) {
                    $username = $_COOKIE['username'];
                    $userId = 0;
                    $sql1 = "SELECT UserId FROM user WHERE userName = ?";
                    $stmt1 = $conn1->prepare($sql1);
                    $stmt1->bind_param("s", $username);
                    $stmt1->execute();
                    $stmt1->bind_result($userId);
                    $stmt1->fetch();
                    $stmt1->close();

                    // Assuming $userId is retrieved successfully, now retrieve data specific to this user
                    $sql2 = "SELECT Reason, startDate, endDate,LeaveId, Message FROM approve WHERE UserId = ?";
                    $stmt2 = $conn1->prepare($sql2);
                    $stmt2->bind_param("s", $userId);
                    $stmt2->execute();
                    $result = $stmt2->get_result();

                    if ($result->num_rows > 0) {
                        
                        while ($row = $result->fetch_assoc()) {
                            echo '<form method="post" action="../../DataBase/deleteApproveStateDb.php" id="AdduserForm">';
                            $Reason = $row['Reason'];
                            $startDate = $row['startDate'];
                            $endDate = $row['endDate'];
                            $Comment = $row['Message'];
                            $leaveid = $row['LeaveId'];
                            echo '<input name="leaveid" value = "'.$leaveid.'" hidden>';
                            
                            $status = '<img src="images/approve.png" style="width:50px; margin-left:30px">';

                            echo '<tr>';
                            echo '<td>'.$Reason.'</td>';
                            echo '<td>'.$startDate.'</td>';
                            echo '<td>'.$endDate.'</td>';
                            echo '<td>'.$Comment.'</td>';
                            echo '<td>'.$status.'</td>';
                            
                            echo '<td><button type="submit" name="action" value="delete" style="width:80%;">cancel</button></td>';
                            echo '</form>';
                            echo '</tr>';
                        }
                    } else {
                        // No rows found
                        // echo '<tr><td colspan="6">No data found</td></tr>';
                    }
                    $stmt2->close();
                }
                $conn1->close();
            ?>
                <?php
                include '../../DataBase/contodb.php';

                if (isset($_COOKIE['username'])) {
                    $username = $_COOKIE['username'];
                    $userId = 0;
                    $sql1 = "SELECT UserId FROM user WHERE userName = ?";
                    $stmt1 = $conn1->prepare($sql1);
                    $stmt1->bind_param("s", $username);
                    $stmt1->execute();
                    $stmt1->bind_result($userId);
                    $stmt1->fetch();
                    $stmt1->close();

                    // Assuming $userId is retrieved successfully, now retrieve data specific to this user
                    $sql2 = "SELECT Reason, startDate, endDate,LeaveId, Message FROM leaveapply WHERE UserId = ?";
                    $stmt2 = $conn1->prepare($sql2);
                    $stmt2->bind_param("s", $userId);
                    $stmt2->execute();
                    $result = $stmt2->get_result();

                    if ($result->num_rows > 0) {
                        
                        while ($row = $result->fetch_assoc()) {
                            echo '<form method="post" action="../../DataBase/deleteApproveStateDb.php" id="AdduserForm">';
                            $Reason = $row['Reason'];
                            $startDate = $row['startDate'];
                            $endDate = $row['endDate'];
                            $Comment = $row['Message'];
                            $leaveid = $row['LeaveId'];
                            echo '<input name="leaveid" value = "'.$leaveid.'" hidden>';
                            
                            $status = '<img src="images/questionMark.png" style="width:50px; margin-left:30px">';

                            echo '<tr>';
                            echo '<td>'.$Reason.'</td>';
                            echo '<td>'.$startDate.'</td>';
                            echo '<td>'.$endDate.'</td>';
                            echo '<td>'.$Comment.'</td>';
                            echo '<td>'.$status.'</td>';
                            
                            echo '<td><button type="submit" name="action" value="delete" style="width:80%;">cancel</button></td>';
                            echo '</form>';
                            echo '</tr>';
                        }
                    } else {
                        // No rows found
                        // echo '<tr><td colspan="6">No data found</td></tr>';
                    }
                    $stmt2->close();
                }
                $conn1->close();
            ?>

<?php
                include '../../DataBase/contodb.php';

                if (isset($_COOKIE['username'])) {
                    $username = $_COOKIE['username'];
                    $userId = 0;
                    $sql1 = "SELECT UserId FROM user WHERE userName = ?";
                    $stmt1 = $conn1->prepare($sql1);
                    $stmt1->bind_param("s", $username);
                    $stmt1->execute();
                    $stmt1->bind_result($userId);
                    $stmt1->fetch();
                    $stmt1->close();

                    // Assuming $userId is retrieved successfully, now retrieve data specific to this user
                    $sql2 = "SELECT Reason, startDate, endDate,LeaveId, Message FROM reject WHERE UserId = ?";
                    $stmt2 = $conn1->prepare($sql2);
                    $stmt2->bind_param("s", $userId);
                    $stmt2->execute();
                    $result = $stmt2->get_result();

                    if ($result->num_rows > 0) {
                        
                        while ($row = $result->fetch_assoc()) {
                            echo '<form method="post" action="../../DataBase/deleteApproveStateDb.php" id="AdduserForm">';
                            $Reason = $row['Reason'];
                            $startDate = $row['startDate'];
                            $endDate = $row['endDate'];
                            $Comment = $row['Message'];
                            $leaveid = $row['LeaveId'];
                            echo '<input name="leaveid" value = "'.$leaveid.'" hidden>';
                            
                            $status = '<img src="images/reject.png" style="width:50px; margin-left:30px">';

                            echo '<tr>';
                            echo '<td>'.$Reason.'</td>';
                            echo '<td>'.$startDate.'</td>';
                            echo '<td>'.$endDate.'</td>';
                            echo '<td>'.$Comment.'</td>';
                            echo '<td>'.$status.'</td>';
                            
                            echo '<td><button type="submit" name="action" value="delete" style="width:80%;">cancel</button></td>';
                            echo '</form>';
                            echo '</tr>';
                        }
                    } else {
                        // No rows found
                        // echo '<tr><td colspan="6">No data found</td></tr>';
                    }
                    $stmt2->close();
                }
                $conn1->close();
            ?>
            </table>
        <!-- <button type="button" onclick="exportPdf()" class="btn btn-primary">Export To PDF</button> -->
        </div>
    </div>
    <script>
         function exportPdf(){
            var pdf = new jsPDF();
            pdf.text(12,20,"Attendence Report");
            pdf.autoTable({html:'#table',
                startY: 25,
                theme:'grid',
                columnStyles:{
                    0:{cellWidth:20},
                    1:{cellWidth:70},
                    2:{cellWidth:30},
                    3:{cellWidth:30},
                    4:{cellWidth:30},
                    5:{cellWidth:10},
                    6:{cellWidth:30}
                },
                bodyStyles: {lineColor: [1, 1, 1]},
                styles:{minCellHeight:5}
            });
            window.open(URL.createObjectURL(pdf.output("blob")))
         }
    </script>
    <script>
        <?php include '../../Scripts/navigationBarScript.php/navigationbarScript.php' ?>
    </script>
    <script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script>
</body>
</html>
