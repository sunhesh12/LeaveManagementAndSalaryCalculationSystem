<?php
include 'contodb.php';
// header('Content-Type: application/json');
session_start();

$UName = $_POST["userName"];
$Password = $_POST["password"];

// Use prepared statements to avoid SQL injection
$sql2 = "SELECT password, Role FROM user WHERE userName = ?";
$stmt = $conn1->prepare($sql2);
$stmt->bind_param("s", $UName);
$stmt->execute();
$stmt->bind_result($storedPassword, $role);
$stmt->fetch();
$stmt->close();
$conn1->close();

// Verify password using password_verify
if ($Password === $storedPassword) {
    // If password is correct
    $_SESSION['logged_in'] = true;
    $_SESSION['role'] = $role; // Store the role in the session

    // Redirect based on the role
    switch ($role) {
        case 'ROL001':
            header('Location: ../Interfaces/ManagingDirector/MdDashBoard.php');
            break;
        case 'ROL002':
            header('Location: ../Interfaces/DirectorInterface/DirectorDashBoard.php');
            break;
        case 'ROL003':
            header('Location: ../Interfaces/Role3Interface/SystemAdminDashboard.php');
            break;
        case 'ROL004':
            header('Location: ../Interfaces/EmplyoeeInterface/EmplyoeeDashBoard.php');
            break;
        case 'ROL005':
            header('Location: ../Interfaces/FinanceDepartment/FinanceDashBoard.php');
            break;
        default:
            
            header('Location: ../index.php'); // Default case, in case of an unknown role
            break;
    }
    exit();
} else {
    
    // If password is incorrect
    // $error="There is a issue";
    // $_POST["error-text"] = $error  ;
    
        $error = "Please Check User name and password are correct!";

        // Store the error message in a session variable
        $_SESSION["error-text"] = $error;

        // Redirect to another page
        header("Location: ../Interfaces/SignInPage/SignIn.php");

    // header('Location: ../index.php');
    // exit();
}
?>
