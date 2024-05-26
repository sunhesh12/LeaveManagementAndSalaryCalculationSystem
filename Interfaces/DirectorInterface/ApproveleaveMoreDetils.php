<?php session_start();?>
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
    <a href="ApproveLeave.php" style="text-decoration: none;"><h4 style="margin-left:30px; margin-bottom:-10px;">Leave>Approve Leave>More Details</h4></a>
    
    <div class="Main-Dashboard" style="text-align:center; width:90%; background-color: rgb(205, 215, 253);">
            <img src="../../Interfaces/SystemAdminInterface/images/nullProfileIcon.png" alt="icon" style="width:15%;height:auto;">
            <?php
            include '../../DataBase/contodb.php';
            $LeaveId1 = $_SESSION["LeaveMd"];
            $sql = "SELECT * FROM leaveapply where leaveid = ?";
            $stmt = $conn1->prepare($sql);
            $stmt -> bind_param("i", $LeaveId1);
            $stmt->execute();
            $stmt->bind_result($LeaveId, $userId, $StartDate, $EndDate, $Message, $Reason);
            $stmt->fetch();
            $state ="Not Approve or Reject";
            
            if ($LeaveId == "") {
                $LeaveId1 = $_SESSION["LeaveMd"];
                // No rows found in leaveapply table, so query reject table
                $sql = "SELECT * FROM reject where leaveid = ?";
                $stmt = $conn1->prepare($sql);
                $stmt -> bind_param("i", $LeaveId1);
                $stmt->execute();
                $stmt->bind_result($rejectid,$userId, $StartDate, $EndDate, $Message, $Reason,$LeaveId);
                $stmt->fetch();
                $state ="Rejected";
                echo '<style>
                .state{
                    color:red;
                }
                </style>';
            } 
            
            if ($LeaveId == "") {
                $LeaveId1 = $_SESSION["LeaveMd"];
                // No rows found in reject table as well, so query approve table
                $sql = "SELECT * FROM approve where leaveid = ?";
                $stmt = $conn1->prepare($sql);
                $stmt -> bind_param("i", $LeaveId1);
                $stmt->execute();
                $stmt->bind_result($approveid,$userId, $StartDate, $EndDate, $Message, $Reason,$LeaveId);
                $stmt->fetch();
                $state ="Approved";
                echo '<style>
                .state{
                    color:green;
                }
                </style>';

            }
            
            $stmt->close();
            
            
            $Email;$FullName;
            $sql1 = "SELECT email,fullName FROM user WHERE userId = ?";
            $stmt1 = $conn1->prepare($sql1);
            $stmt1->bind_param("s", $userId);
            $stmt1->execute();
            $stmt1->bind_result($Email,$FullName);
            $stmt1->fetch();
            $stmt1->close();

            echo'<h2>'.$FullName.'</h2>
            <p>'.$Email.'</p>
            <p class="state">'.$state.'</p>
            <table id="table" style="Width:60%; margin-left:20%;">
                <tr>
                    <td>Leave Type</td>
                    <td>'.$Reason.'</td>
                </tr>
                <tr>
                    <td>Start Date</td>
                    <td>'.$StartDate.'</td>
                </tr>
                <tr>
                    <td>End Date</td>
                    <td>'.$EndDate.'</td>
                </tr>
                <tr>
                    <td>comment</td>
                    <td>'.$Message.'</td>
                </tr>
            </table>
            <a href="ApproveLeave.php"><button>Back</button></a>'
            ?>
        </div>
    </div>
    <!-- <script>
         function exportPdf(){
            var pdf = new jsPDF();
            pdf.text(12,20,"Attendence Report");
            pdf.autoTable({html:'#table',
                startY: 25,
                theme:'grid',
                columnStyles:{
                    0:{cellWidth:20},
                    1:{cellWidth:20}
                },
                bodyStyles: {lineColor: [1, 1, 1]},
                styles:{minCellHeight:5}
            });
            window.open(URL.createObjectURL(pdf.output("blob")))
         }
    </script> -->
    <script>
        <?php include '../../Scripts/navigationBarScript.php/navigationbarScript.php' ?>
    </script>
    <script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script>
</body>
</html>
