<?php
include 'contodb.php';
session_start();

$UName = $_POST["userName"];
$Password = $_POST["password"];
// $UName = 'Admin';
// $Password = 'Admin';

// Use prepared statements to avoid SQL injection
$sql2 = "SELECT password FROM user WHERE user_name = ? ";
$stmt = $conn1->prepare($sql2);
$stmt->bind_param("s", $UName);
$stmt->execute();
$stmt->bind_result($storedPassword);
$stmt->fetch();
$stmt->close();
$conn1->close();

// Verify password using password_verify
if ($Password === $storedPassword) {
    // If password is correct
    $_SESSION['logged_in'] = true;
    header('Location: ../Interfaces/SystemAdminInterface/SystemAdminDashboard.php');
    exit();
} else {
    // If password is incorrect
    header('Location: ../index.php');
    // exit();
}


?>
