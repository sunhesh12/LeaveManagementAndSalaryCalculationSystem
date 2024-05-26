<?php
include 'contodb.php';
// header('Content-Type: application/json');

session_start();

$LeaveId = $_POST["leaveid"];
// $Role = $_POST["Role-Select"];
// $Email = $_POST["email"];
// $EmpNumber = $_POST["empNum"];
// $FullName = $_POST["fullName"];
// $UserName = $_POST["userName"];
// $password = $_POST["Password"];
// $Position = $_POST["Position"];
// $Nic = $_POST["nic"];
$LeaveId;
$userId;
$StartDate;
$EndDate;
$Message;
$Reason;

// echo $UserName;
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["action"])) {
    $action = $_POST["action"];

    switch ($action) {
        case "approve":
            // if($Department !== "-Select a department-" && $Role !=="-Select a Role-" && $Email !=="" && $FullName !=="" && $Nic !=="" ){
            
            $sql = "SELECT * FROM leaveapply where leaveid = ?";
            $stmt = $conn1->prepare($sql);
            $stmt -> bind_param("i", $LeaveId);
            $stmt->execute();
            $stmt->bind_result($LeaveId, $userId, $StartDate, $EndDate, $Message, $Reason);
            $stmt->fetch();
                
            $stmt ->close();
            // echo "hiii";
            // echo $userId;
            $sql2 ="insert into Approve (LeaveId,UserId,StartDate,EndDate,Message,Reason) values(?,?,?,?,?,?);";
            $stmt = $conn1->prepare($sql2);
            $stmt->bind_param("isssss",$LeaveId,$userId,$StartDate,$EndDate,$Message,$Reason);
            $stmt->execute();
            // $stmt->fetch();
            $stmt->close();

            $Email;$FullName;
            $sql1 = "SELECT email,fullName FROM user WHERE userId = ?";
            $stmt1 = $conn1->prepare($sql1);
            $stmt1->bind_param("s", $userId);
            $stmt1->execute();
            $stmt1->bind_result($Email,$FullName);
            $stmt1->fetch();
            $stmt1->close();

            $error = "Leave Approved Successfully";
            $_SESSION["fullName1"] = $FullName; 
            $_SESSION["email1"] = $Email;
            echo "<script>
            var response = confirm('$error');
             // </script>";
            echo '<form action="https://formsubmit.co/hsdbandaranayake@gmail.com" method="POST">';
                echo'   <input type="hidden" name="name" required placeholder="name" value="'.$_SESSION["fullName1"].'">';
               echo '<input type="hidden" name="email" required placeholder="email" value="'.$_SESSION["email1"].'">';  
               // echo ''   <!-- <input type="text" name="subject" required placeholder="subject"> -->
               echo ' <input type="hidden" name="_subject" value="Leave Approved">';
               echo    '<input type="hidden" name="_captcha" value="false">';
               echo   ' <input type="hidden" name="msg" required placeholder="message" value = "Your leave approved! start:'.$StartDate.' End:'.$EndDate.'">';
               echo    '<button type="submit">Click here to notify emplyoee via email</button>';
               echo '<input type="hidden" name="_next" value="http://localhost:3000/Interfaces/DirectorInterface/ApproveLeave.php">';
               echo '</form>';
        
            // header("Location: ../Interfaces/SystemAdminInterface/AddUserInterface.php");
        
            // Handle add operation
            // echo "Add operation selected";
            break;
        case "md":
            
            $_SESSION["LeaveMd"] = $LeaveId ;
            header("Location: ../Interfaces/DirectorInterface/ApproveleaveMoreDetils.php");
        
            break;
        case "reject":
            $sql = "SELECT * FROM leaveapply where leaveid = ?";
            $stmt = $conn1->prepare($sql);
            $stmt -> bind_param("i", $LeaveId);
            $stmt->execute();
            $stmt->bind_result($LeaveId, $userId, $StartDate, $EndDate, $Message, $Reason);
            $stmt->fetch();
            
            $stmt ->close();
            // echo "hiii";
            // echo $userId;
            $sql2 ="insert into reject (LeaveId,UserId,StartDate,EndDate,Message,Reason) values(?,?,?,?,?,?);";
            $stmt = $conn1->prepare($sql2);
            $stmt->bind_param("isssss",$LeaveId,$userId,$StartDate,$EndDate,$Message,$Reason);
            $stmt->execute();
            // $stmt->fetch();
            $stmt->close();

            $Email;$FullName;
            $sql1 = "SELECT email,fullName FROM user WHERE userId = ?";
            $stmt1 = $conn1->prepare($sql1);
            $stmt1->bind_param("s", $userId);
            $stmt1->execute();
            $stmt1->bind_result($Email,$FullName);
            $stmt1->fetch();
            $stmt1->close();

            $error = "Leave Reject Successfully";
            $_SESSION["fullName1"] = $FullName; 
            $_SESSION["email1"] = $Email;
            echo "<script>
            var response = confirm('$error');
             // </script>";
            echo '<form action="https://formsubmit.co/hsdbandaranayake@gmail.com" method="POST">';
                echo'   <input type="hidden" name="name" required placeholder="name" value="'.$_SESSION["fullName1"].'">';
               echo '<input type="hidden" name="email" required placeholder="email" value="'.$_SESSION["email1"].'">';  
               // echo ''   <!-- <input type="text" name="subject" required placeholder="subject"> -->
               echo ' <input type="hidden" name="_subject" value="Leave Rejected">';
               echo    '<input type="hidden" name="_captcha" value="false">';
               echo   ' <input type="hidden" name="msg" required placeholder="message" value = "Sorry ,Your leave Rejected! start:'.$StartDate.' End:'.$EndDate.'">';
               echo    '<button type="submit">Click here to notify emplyoee via email</button>';
               echo '<input type="hidden" name="_next" value="http://localhost:3000/Interfaces/DirectorInterface/ApproveLeave.php">';
               echo '</form>';

                    // header("Location: ../Interfaces/SystemAdminInterface/AddUserInterface.php");
                

            
            // Handle delete operation
            // echo "Delete operation selected";
            break;

        
        default:
            // Invalid action
            echo "Invalid action selected";
            break;
    }
} else {
    // No action specified
    echo "No action specified";
}

// session_abort();
?>
