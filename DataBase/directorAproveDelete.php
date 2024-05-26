<?php
include 'contodb.php';

$leaveid = $_GET['leaveid'];
// echo $leaveid;


$sql = "SELECT * FROM leaveapply where leaveid = ?";
$stmt = $conn1->prepare($sql);
$stmt -> bind_param("i", $leaveid);
$stmt->execute();
$stmt->bind_result($LeaveId, $userId, $StartDate, $EndDate, $Message, $Reason);
$stmt->fetch();
$stmt->close();
// $state ="Not Approve or Reject";

if ($LeaveId == "") {
    $LeaveId1 = $_GET['leaveid'];
    // No rows found in leaveapply table, so query reject table
    $sql = "SELECT * FROM reject where leaveid = ?";
    $stmt = $conn1->prepare($sql);
    $stmt -> bind_param("i", $LeaveId1);
    $stmt->execute();
    $stmt->bind_result($rejectid,$userId, $StartDate, $EndDate, $Message, $Reason,$LeaveId);
    $stmt->fetch();
    $stmt->close();

    if ($LeaveId == "") {
        $LeaveId1 = $_GET['leaveid'];
        // No rows found in reject table as well, so query approve table

        $sql2 = "DELETE FROM approve WHERE leaveId = ?";
        $stmt2 = $conn1->prepare($sql2);
        $stmt2->bind_param("i", $leaveid);
        $stmt2->execute();
        $stmt2->close();
        $conn1->close();
    
    }else{
        $sql2 = "DELETE FROM reject WHERE leaveId = ?";
        $stmt2 = $conn1->prepare($sql2);
        $stmt2->bind_param("i", $leaveid);
        $stmt2->execute();
        $stmt2->close();
        $conn1->close();
    }

} 
    $sql2 = "DELETE FROM leaveapply WHERE leaveId = ?";
    $stmt2 = $conn1->prepare($sql2);
    $stmt2->bind_param("i", $leaveid);
    $stmt2->execute();
    $stmt2->close();
    $conn1->close();






header("Location: ../Interfaces/DirectorInterface/ApproveStatus.php");
?>