<?php
include 'contodb.php';
// header('Content-Type: application/json');

session_start();

$Department = $_POST["dep-Select"];
$Role = $_POST["Role-Select"];
$Email = $_POST["email"];
$EmpNumber = $_POST["empNum"];
$FullName = $_POST["fullName"];
$UserName = $_POST["userName"];
$password = $_POST["Password"];
$Position = $_POST["Position"];
$Nic = $_POST["nic"];

// echo $UserName;
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["action"])) {
    $action = $_POST["action"];

    switch ($action) {
        case "add":
            if($Department !== "-Select a department-" && $Role !=="-Select a Role-" && $Email !=="" && $FullName !=="" && $Nic !=="" ){
            $sql2 ="insert into user (UserId,fullName,Email,UserName,Position,nic,Department,Role,password)  values(?,?,?,?,?,?,?,?,?);";
            $stmt = $conn1->prepare($sql2);
            $stmt->bind_param("sssssssss",$EmpNumber,$FullName,$Email,$UserName,$Position,$Nic,$Department,$Role,$password );
            $stmt->execute();
            $error = "Data added Successfully";
            $_SESSION["fullName1"] = $FullName; 
            $_SESSION["email1"] = $Email;
            echo "<script>
            var response = confirm('$error');

            </script>";
            echo '<form action="https://formsubmit.co/hsdbandaranayake@gmail.com" method="POST">';
                echo'   <input type="hidden" name="name" required placeholder="name" value="'.$_SESSION["fullName1"].'">';
               echo '<input type="hidden" name="email" required placeholder="email" value="'.$_SESSION["email1"].'">';  
               // echo ''   <!-- <input type="text" name="subject" required placeholder="subject"> -->
               echo ' <input type="hidden" name="_subject" value="Your Office Leave Management Account">';
               echo    '<input type="hidden" name="_captcha" value="false">';
               echo   ' <input type="hidden" name="msg" required placeholder="message" value = "User Name :Account update Successfully!">';
               echo    '<button type="submit">Click here to submit User Detils fo user via email</button>';
               echo '<input type="hidden" name="_next" value="http://localhost:3000/Interfaces/SystemAdminInterface/AddUserInterface.php">';
               echo '</form>';
        }else{
            header("Location: ../Interfaces/SystemAdminInterface/AddUserInterface.php");
        }
            // Handle add operation
            // echo "Add operation selected";
            break;
        case "update":
            if($Department !== "-Select a department-" && $Role !=="-Select a Role-" && $Email !=="" && $FullName !=="" && $Nic !=="" ){
            $sql2 = "UPDATE user SET fullName = ?, Email = ?, Position = ?, nic = ?, Department = ?, Role = ?, password = ? WHERE userId = ?";
            $stmt = $conn1->prepare($sql2);
            $stmt->bind_param("ssss", $EmpNumber);
            $stmt->execute();
            $_SESSION["fullName1"] = $FullName; 
            $_SESSION["email1"] = $Email;

            $error = "Update Successfully";
            echo "<script>
            var response = confirm('$error');
            if (response == true) {
                var response = confirm('$error');           
                }
                else{
                    window.location.href = '../Interfaces/SystemAdminInterface/AddUserInterface.php';
                }
            </script>";
            echo '<form action="https://formsubmit.co/hsdbandaranayake@gmail.com" method="POST">';
                echo'   <input type="hidden" name="name" required placeholder="name" value="'.$_SESSION["fullName1"].'">';
               echo '<input type="hidden" name="email" required placeholder="email" value="'.$_SESSION["email1"].'">';  
               // echo ''   <!-- <input type="text" name="subject" required placeholder="subject"> -->
               echo ' <input type="hidden" name="_subject" value="Your Office Leave Management Account">';
               echo    '<input type="hidden" name="_captcha" value="false">';
               echo   ' <input type="hidden" name="msg" required placeholder="message" value = "User Name :Account update Successfully!">';
               echo    '<button type="submit">submit User Detils to email</button>';
               echo '<input type="hidden" name="_next" value="http://localhost:3000/Interfaces/SystemAdminInterface/AddUserInterface.php">';
               echo '</form>';
        }else{
            header("Location: ../Interfaces/SystemAdminInterface/AddUserInterface.php");
        }
            break;
        case "delete":
            // $message = "DO You want to delete account  + empNumber";
            // echo '<script>alert('.$message.');</script>';
            $error = "Do you want to delete account: " . $EmpNumber . "?";
            $success = "Account delete SuccessFully.";
            echo "<script>
                var response = confirm('$error');
                if (response == true) {
                    // User clicked OK, redirect to a PHP script to handle account deletion
                    var response = confirm('$success');
                    window.location.href = 'delete_account.php?empNumber=$EmpNumber';

                } else {
                    // User clicked Cancel or closed the dialog, redirect back to the Add User page
                    window.location.href = '../Interfaces/SystemAdminInterface/AddUserInterface.php';
                }
            </script>";

                    // header("Location: ../Interfaces/SystemAdminInterface/AddUserInterface.php");
                

            
            // Handle delete operation
            // echo "Delete operation selected";
            break;
        case "cleare":
            session_destroy();
            header("Location: ../Interfaces/SystemAdminInterface/AddUserInterface.php");
            break;
        case "search":
            // session_destroy();
            $sql2 = "SELECT UserId,fullName,Email,UserName,Position,nic,Department,Role,password FROM user WHERE userName = ? or userid = ? or email = ? or Nic = ? limit 1;";
            $stmt = $conn1->prepare($sql2);
            $stmt->bind_param("ssss", $UserName,$EmpNumber,$Email,$Nic);
            $stmt->execute();
            $stmt->bind_result($EmpNumber, $FullName ,$Email, $UserName , $Position, $Nic ,$Department , $Role , $password );
            $stmt->fetch();
            $stmt->close();
            // $conn1->close();
            
            $sql = " Select department_name from department where department_id = ?;";
            $stmt = $conn1->prepare($sql);
            $stmt->bind_param("s",$Department);
            $stmt->execute();
            $stmt->bind_result($Department);
            $stmt->fetch();
            $stmt->close();

            
            $sql = " Select role_name from role where role_id = ?;";
            $stmt = $conn1->prepare($sql);
            $stmt->bind_param("s",$Role);
            $stmt->execute();
            $stmt->bind_result($Role);
            $stmt->fetch();
            $stmt->close();
            $conn1->close();
            
            $_SESSION["dep-Select"] = $Department;
            $_SESSION["Role-Select"] = $Role;
            $_SESSION["email"] = $Email;
            $_SESSION["empNum"] = $EmpNumber;
            $_SESSION["fullName"] = $FullName;
            $_SESSION["userName"] = $UserName;
            $_SESSION["Password"] = $password;
            $_SESSION["Position"] = $Position;
            $_SESSION["nic"] = $Nic;

            // echo '<form action="https://formsubmit.co/hsdbandaranayake@gmail.com" method="POST">';
            //  echo'   <input type="hidden" name="name" required placeholder="name" value="'.$_SESSION["fullName"].'">';
            // echo '<input type="hidden" name="email" required placeholder="email" value="'.$_SESSION["email"].'">';  
            // // echo ''   <!-- <input type="text" name="subject" required placeholder="subject"> -->
            // echo ' <input type="hidden" name="_subject" value="Your Office Leave Management Account">';
            // echo    '<input type="hidden" name="_captcha" value="false">';
            // echo   ' <input type="hidden" name="msg" required placeholder="message" value = "User Name :'.$_SESSION["userName"] .' and Password :'.$_SESSION["userName"] .'">';
            // echo    '<button type="submit">submit User Detils to email</button>';
            // echo '<input type="hidden" name="_next" value="http://localhost:3000/Interfaces/SystemAdminInterface/AddUserInterface.php">';
            // echo '</form>';
            // $error = "Send detils to user SuccessFully!";
            // $success = "Account delete SuccessFully.";
            // echo "<script>
            //     var response = confirm('$error');
            //     if (response == true) {
            //         // User clicked OK, redirect to a PHP script to handle account deletion
            //         var response = confirm('$error');
            //         // window.location.href = 'delete_account.php?empNumber=$EmpNumber';

            //     } 
            //     </script>";
            header("Location: ../Interfaces/SystemAdminInterface/AddUserInterface.php");
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
