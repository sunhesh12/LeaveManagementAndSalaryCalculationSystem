<?php
include 'contodb.php';
if (isset($_GET['empNumber'])) {
    // Get the employee number from the URL parameter
    $empNumber = $_GET['empNumber'];

    $sql2 = "SELECT UserId,fullName,Email,UserName,Position,nic,Department,Role,password FROM user WHERE userid = ? limit 1;";
    $stmt = $conn1->prepare($sql2);
    $stmt->bind_param("s",$EmpNumber);
    $stmt->execute();
    $stmt->bind_result($EmpNumber, $FullName ,$Email, $UserName , $Position, $Nic ,$Department , $Role , $password );
    $stmt->fetch();
    $stmt->close();
    // Perform the deletion query
    $_SESSION["fullName1"] =$FullName;
    $_SESSION["email1"] = $Email;
    $sql = "DELETE FROM user WHERE UserId = ?";
    $stmt = $conn1->prepare($sql);
    $stmt->bind_param("s", $empNumber);
    $stmt->execute();
    echo '<form action="https://formsubmit.co/hsdbandaranayake@gmail.com" method="POST">';
        echo'   <input type="hidden" name="name" required placeholder="name" value="'.$_SESSION["fullName1"].'">';
       echo '<input type="hidden" name="email" required placeholder="email" value="'.$_SESSION["email1"].'">';  
       // echo ''   <!-- <input type="text" name="subject" required placeholder="subject"> -->
       echo ' <input type="hidden" name="_subject" value="Your Office Leave Management Account">';
       echo    '<input type="hidden" name="_captcha" value="false">';
       echo   ' <input type="hidden" name="msg" required placeholder="message" value = "Sorry , Your Account delete from Admin!">';
       echo    '<button type="submit">Click here to submit User Detils fo user via email</button>';

       echo '<input type="hidden" name="_next" value="http://localhost:3000/Interfaces/SystemAdminInterface/AddUserInterface.php">';
       echo '</form>';
    // Redirect back to the Add User page after deletion
    // header("Location: ../Interfaces/SystemAdminInterface/AddUserInterface.php");
    
    exit; // Ensure script execution stops after redirection
}
?>
