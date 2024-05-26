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
    <a href="ApplyLeave.php" style="text-decoration: none;"><h4 style="margin-left:30px; margin-bottom:-10px;">Leave>Approve Leave</h4></a>
    <div class="Main-Dashboard" style="text-align:center; width:90%; background-color: rgb(205, 215, 253);">
            <h1>Approve Emplyoee Leave </h1>
            <br>
            <table  id="table">
                <tr style=" background-color: rgb(105, 111, 255); ">
                    <th>Name</th>
                    <th>Leave Ttype</th>
                    <th>Date</th>
                    <th>Total Days</th>
                    <th>Currrent status</th>
                    <th>Action</th>
                    
                </tr>
                <?php
                include '../../DataBase/contodb.php';

                if (isset($_COOKIE['username'])) {
                    $username = $_COOKIE['username'];
                    $userId = 0;
                    $sql1 = "SELECT UserId,fullName FROM user WHERE userName = ?";
                    $stmt1 = $conn1->prepare($sql1);
                    $stmt1->bind_param("s", $username);
                    $stmt1->execute();
                    $stmt1->bind_result($userId,$fullName);
                    $stmt1->fetch();
                    $stmt1->close();

                    // Assuming $userId is retrieved successfully, now retrieve data specific to this user
                    $sql2 = "SELECT * FROM leaveapply WHERE UserId not like ?";
                    // $sql2 = "SELECT * FROM leaveapply ";
                    $stmt2 = $conn1->prepare($sql2);
                    $stmt2->bind_param("s", $userId);
                    $stmt2->execute();
                    $result = $stmt2->get_result();

                    if ($result->num_rows > 0) {
                        
                        while ($row = $result->fetch_assoc()) {
                            echo '<form method="post" action="../../DataBase/ApproveLeave.php" id="AdduserForm">';
                            $userid = $row['UserId'];

                            $sql2 = "SELECT fullName FROM user WHERE userid = ?";
                            $stmt = $conn1->prepare($sql2);
                            $stmt->bind_param("s", $userid);
                            $stmt->execute();
                            $stmt->bind_result($fulName);
                            $stmt->fetch();
                            $stmt->close();
                           

                            $Reason = $row['Reason'];
                            $startDate = $row['startDate'];
                            $endDate = $row['endDate'];
                            $Comment = $row['Message'];
                            $leaveid = $row['LeaveId'];
                            echo '<input name="leaveid" value = "'.$leaveid.'" hidden>';
                            
                            $status = '<img src="images/questionMark.png" style="width:60px;">';
                            // $dayCOunt=$endDate - $startDate +'1' ;
                            $startDateObj = new DateTime($startDate);
                            $endDateObj = new DateTime($endDate);
                            $difference = $startDateObj->diff($endDateObj);
                            $dayCOunt = $difference->days;
                            echo '<tr>';
                            echo '<td>'.$fulName.'</td>';
                            echo '<td>'.$Reason.'</td>';
                            echo '<td>'.$startDate.'</td>';
                            echo '<td style="text-align:center">'.$dayCOunt.'</td>';
                            echo '<td style="text-align:center">'.$status.'</td>';
                            echo '<td>
                            <a href="/Interfaces/DirectorInterface/ApproveleaveMoreDetils.php">
                            
                            <button style="width:90%;" type="submit" name="action" value="md" >More Detils</button></a>
                            
                            
                            <button style="width:40%;" type="submit" name="action" value="approve" >Approve</button>
                            <button style="width:40%;" type="submit" name="action" value="reject" >Reject</button></td>';
                            // echo '<td><button type="submit" name="action" value="delete" style="width:80%;">cancel</button></td>';
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
                    $sql1 = "SELECT UserId,fullName FROM user WHERE userName = ?";
                    $stmt1 = $conn1->prepare($sql1);
                    $stmt1->bind_param("s", $username);
                    $stmt1->execute();
                    $stmt1->bind_result($userId,$fullName);
                    $stmt1->fetch();
                    $stmt1->close();

                    // Assuming $userId is retrieved successfully, now retrieve data specific to this user
                    // $sql2 = "SELECT * FROM leaveapply WHERE UserId not like ?";
                    $sql2 = "SELECT * FROM approve WHERE UserId not like ? ";
                    $stmt2 = $conn1->prepare($sql2);
                    $stmt2->bind_param("s", $userId);
                    $stmt2->execute();
                    $result = $stmt2->get_result();

                    if ($result->num_rows > 0) {
                        
                        while ($row = $result->fetch_assoc()) {
                            echo '<form method="post" action="../../DataBase/ApproveLeave.php" id="AdduserForm">';
                            $userid = $row['UserId'];

                            $sql2 = "SELECT fullName FROM user WHERE userid = ?";
                            $stmt = $conn1->prepare($sql2);
                            $stmt->bind_param("s", $userid);
                            $stmt->execute();
                            $stmt->bind_result($fulName);
                            $stmt->fetch();
                            $stmt->close();
                           

                            $Reason = $row['Reason'];
                            $startDate = $row['startDate'];
                            $endDate = $row['endDate'];
                            $Comment = $row['Message'];
                            $leaveid = $row['LeaveId'];
                            echo '<input name="leaveid" value = "'.$leaveid.'" hidden>';
                            
                            $status = '<img src="images/approve.png" style="width:60px;">';
                            // $dayCOunt=$endDate - $startDate +'1' ;
                            $startDateObj = new DateTime($startDate);
                            $endDateObj = new DateTime($endDate);
                            $difference = $startDateObj->diff($endDateObj);
                            $dayCOunt = $difference->days;
                            echo '<tr>';
                            echo '<td>'.$fulName.'</td>';
                            echo '<td>'.$Reason.'</td>';
                            echo '<td>'.$startDate.'</td>';
                            echo '<td style="text-align:center">'.$dayCOunt.'</td>';
                            echo '<td style="text-align:center">'.$status.'</td>';
                            echo '<td>
                            <a href="/Interfaces/DirectorInterface/ApproveleaveMoreDetils.php">
                            
                            <button style="width:90%;" type="submit" name="action" value="md" >More Detils</button></a>';
                            // echo '<td><button type="submit" name="action" value="delete" style="width:80%;">cancel</button></td>';
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
                    $sql1 = "SELECT UserId,fullName FROM user WHERE userName = ?";
                    $stmt1 = $conn1->prepare($sql1);
                    $stmt1->bind_param("s", $username);
                    $stmt1->execute();
                    $stmt1->bind_result($userId,$fullName);
                    $stmt1->fetch();
                    $stmt1->close();

                    // Assuming $userId is retrieved successfully, now retrieve data specific to this user
                    // $sql2 = "SELECT * FROM leaveapply WHERE UserId not like ?";
                    $sql2 = "SELECT * FROM reject WHERE UserId not like ? ";
                    $stmt2 = $conn1->prepare($sql2);
                    $stmt2->bind_param("s", $userId);
                    $stmt2->execute();
                    $result = $stmt2->get_result();

                    if ($result->num_rows > 0) {
                        
                        while ($row = $result->fetch_assoc()) {
                            echo '<form method="post" action="../../DataBase/ApproveLeave.php" id="AdduserForm">';
                            $userid = $row['UserId'];

                            $sql2 = "SELECT fullName FROM user WHERE userid = ?";
                            $stmt = $conn1->prepare($sql2);
                            $stmt->bind_param("s", $userid);
                            $stmt->execute();
                            $stmt->bind_result($fulName);
                            $stmt->fetch();
                            $stmt->close();
                           

                            $Reason = $row['Reason'];
                            $startDate = $row['startDate'];
                            $endDate = $row['endDate'];
                            $Comment = $row['Message'];
                            $leaveid = $row['LeaveId'];
                            echo '<input name="leaveid" value = "'.$leaveid.'" hidden>';
                            
                            $status = '<img src="images/reject.png" style="width:60px;">';
                            // $dayCOunt=$endDate - $startDate +'1' ;
                            $startDateObj = new DateTime($startDate);
                            $endDateObj = new DateTime($endDate);
                            $difference = $startDateObj->diff($endDateObj);
                            $dayCOunt = $difference->days;
                            echo '<tr>';
                            echo '<td>'.$fulName.'</td>';
                            echo '<td>'.$Reason.'</td>';
                            echo '<td>'.$startDate.'</td>';
                            echo '<td style="text-align:center">'.$dayCOunt.'</td>';
                            echo '<td style="text-align:center">'.$status.'</td>';
                            echo '<td>
                            <a href="/Interfaces/DirectorInterface/ApproveleaveMoreDetils.php">
                            
                            <button style="width:90%;" type="submit" name="action" value="md" >More Detils</button></a>';
                            // echo '<td><button type="submit" name="action" value="delete" style="width:80%;">cancel</button></td>';
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
                    1:{cellWidth:20},
                    2:{cellWidth:30},
                    3:{cellWidth:30},
                    4:{cellWidth:30}
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
