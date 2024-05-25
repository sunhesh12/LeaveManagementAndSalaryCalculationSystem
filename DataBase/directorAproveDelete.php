<?php
include 'contodb.php';

$leaveid = $_GET['leaveid'];
// echo $leaveid;

$sql2 = "DELETE FROM leaveapply WHERE leaveId = ?";
$stmt2 = $conn1->prepare($sql2);
$stmt2->bind_param("i", $leaveid);
$stmt2->execute();
$stmt2->close();
$conn1->close();

header("Location: ../Interfaces/DirectorInterface/ApproveStatus.php");
?>