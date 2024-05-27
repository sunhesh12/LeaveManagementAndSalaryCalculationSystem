<?php
include 'contodb.php';
// header('Content-Type: application/json');

session_start();


                    
// echo $UserName;
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["action"])) {
    $action = $_POST["action"];
    $Department = $_POST["dep-Select"];
    $Role = $_POST["Role-Select"];
    $Email = $_POST["email"];
    $EmpNumber = $_POST["empNum"];
    $FullName = $_POST["fullName"];
    $UserName = $_POST["userName"];
    $password = $_POST["Password"];
    $Position = $_POST["Position"];
    $Nic = $_POST["nic"];
    
     // Retrieve Department_id
    $sql = "SELECT Department_id FROM department WHERE Department_name = ?";
    $stmt1 = $conn1->prepare($sql);
    $stmt1->bind_param("s", $Department);
    $stmt1->execute();
    $stmt1->bind_result($Department);
    $stmt1->fetch();
    $stmt1->close();
    
    // Retrieve Role_id
    $sql = "SELECT Role_id FROM role WHERE Role_name = ?";
    $stmt2 = $conn1->prepare($sql);
    $stmt2->bind_param("s", $Role);
    $stmt2->execute();
    $stmt2->bind_result($Role);
    $stmt2->fetch();
    $stmt2->close();

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
               echo   ' <input type="hidden" name="msg" required placeholder="message" value = "Hello,'.$FullName.' Your Account ,User Name:'.$EmpNumber.' and Password : '.$EmpNumber.'!">';
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

            if (isset($_COOKIE['username'])) {
                $username = $_COOKIE['username'];
                include 'contodb.php';
                $userId=0;
                $role=0;
                $sql1 = "SELECT UserId,role FROM user WHERE userName = ?";
                $stmt1 = $conn1->prepare($sql1);
                $stmt1->bind_param("s", $username);
                $stmt1->execute();
                $stmt1->bind_result($userId,$role);
                $stmt1->fetch();
                $stmt1->close();
                
                if($role === 'ROL003'){
                    if($Department !== "-Select a department-" && $Role !=="-Select a Role-" && $Role !=="ROL003" && $Email !=="" && $FullName !=="" && $Nic !=="" ){
                        // Update user details in the database
                        $sql2 = "UPDATE user SET fullName = ?, Email = ?, Position = ?, nic = ?, Department = ?, Role = ?, password = ? WHERE userId = ?";
                        $stmt12 = $conn1->prepare($sql2);
                        
                        $stmt12->bind_param("ssssssss", $FullName, $Email, $Position, $Nic, $Department, $Role, $password, $EmpNumber);
                        $stmt12->execute();
                        $_SESSION["fullName1"] = $FullName; 
                        $_SESSION["email1"] = $Email;
            
                        $error = "Update Successfully";
                        echo "<script>
                        var response = confirm('$error');
                        
                        </script>";
                        echo '<form action="https://formsubmit.co/hsdbandaranayake@gmail.com" method="POST">';
                            echo'   <input type="hidden" name="name" required placeholder="name" value="'.$_SESSION["fullName1"].'">';
                           echo '<input type="hidden" name="email" required placeholder="email" value="'.$_SESSION["email1"].'">';  
                           // echo ''   <!-- <input type="text" name="subject" required placeholder="subject"> -->
                           echo ' <input type="hidden" name="_subject" value="Your Office Leave Management Account">';
                           echo    '<input type="hidden" name="_captcha" value="false">';
                           echo   ' <input type="hidden" name="msg" required placeholder="message" value = "Account update Successfully!">';
                           echo    '<button type="submit">submit User Detils to email</button>';
                           echo '<input type="hidden" name="_next" value="http://localhost:3000/Interfaces/SystemAdminInterface/AddUserInterface.php">';
                           echo '</form>';
                    }else{
                        header("Location: ../Interfaces/SystemAdminInterface/AddUserInterface.php");
                    }
                }else if($role === 'ROL001'){
                    $sql2 = "UPDATE user SET fullName = ?, Email = ?, Position = ?, nic = ?, Department = ?, Role = ?, password = ? WHERE userId = ?";
                    $stmt12 = $conn1->prepare($sql2);
                    
                    $stmt12->bind_param("ssssssss", $FullName, $Email, $Position, $Nic, $Department, $Role, $password, $EmpNumber);
                    $stmt12->execute();
                    $error = "Update Successfully";
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
                    echo "<script>
                    var response = confirm('$error');
                    
                    window.location.href = '../Interfaces/ManagingDirector/MdProfile.php';
                    </script>";
                }else if($role === 'ROL002'){
                    $sql2 = "UPDATE user SET fullName = ?, Email = ?, Position = ?, nic = ?, Department = ?, Role = ?, password = ? WHERE userId = ?";
                    $stmt12 = $conn1->prepare($sql2);
                    
                    $stmt12->bind_param("ssssssss", $FullName, $Email, $Position, $Nic, $Department, $Role, $password, $EmpNumber);
                    $stmt12->execute();
                    $error = "Update Successfully";
                    echo "<script>
                    var response = confirm('$error');
                    window.location.href = '../Interfaces/DirectorInterface/directorProfile.php';
                    </script>";
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
                }else if($role === 'ROL004'){
                    $sql2 = "UPDATE user SET fullName = ?, Email = ?, Position = ?, nic = ?, Department = ?, Role = ?, password = ? WHERE userId = ?";
                    $stmt12 = $conn1->prepare($sql2);
                    
                    $stmt12->bind_param("ssssssss", $FullName, $Email, $Position, $Nic, $Department, $Role, $password, $EmpNumber);
                    $stmt12->execute();
                    $error = "Update Successfully";
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
                    echo "<script>
                    var response = confirm('$error');
                    window.location.href = '../Interfaces/EmplyoeeInterface/plyoeeProfile.php';
                    </script>";
                }
            
            
            
            
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
