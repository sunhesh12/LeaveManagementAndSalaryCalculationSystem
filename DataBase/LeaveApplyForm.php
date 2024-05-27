<?php
session_start();

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
    
    $EmpNumber = $userId;
    $startDate = $_POST["startDate"];
    $endDate = $_POST["endDate"];
    $Message = $_POST["message"];
    $Reason = $_POST["leaveType"];

    $currentDate = date("Y-m-d");
    if($endDate === '' ){
        $endDate = $startDate;
    }
    // echo "Current Date: " . $currentDate;
    if($Reason === 'volvo'){
        $_SESSION["error"] = 'Please Select leave type';
        if($role === 'ROL002'){
            header("Location:../Interfaces/DirectorInterface/ApplyLeave.php ");
        }else if($role === 'ROL004'){
            header("Location:../Interfaces/EmplyoeeInterface/EmplyoLeaveApply.php ");
        }
        
    }else if($startDate < $currentDate ){
        $_SESSION["error2"] = 'Please Select leave type';
        if($role === 'ROL002'){
            header("Location:../Interfaces/DirectorInterface/ApplyLeave.php ");
        }else if($role === 'ROL004'){
            header("Location:../Interfaces/EmplyoeeInterface/EmplyoLeaveApply.php ");
        }
    }else if($endDate < $currentDate ){
        $_SESSION["error3"] = 'Please Select leave type';
        if($role === 'ROL002'){
            header("Location:../Interfaces/DirectorInterface/ApplyLeave.php ");
        }else if($role === 'ROL004'){
            header("Location:../Interfaces/EmplyoeeInterface/EmplyoLeaveApply.php ");
        }
    }else if( $endDate < $startDate){
        $_SESSION["error1"] = 'Please Select valid date';
        if($role === 'ROL002'){
            header("Location:../Interfaces/DirectorInterface/ApplyLeave.php ");
        }else if($role === 'ROL004'){
            header("Location:../Interfaces/EmplyoeeInterface/EmplyoLeaveApply.php ");
        }
    }else{
        $sql2 = "INSERT INTO leaveapply (userId, startDate, endDate, Message, Reason) VALUES (?, ?, ?, ?, ?)";
        $stmt2 = $conn1->prepare($sql2);
        $stmt2->bind_param("sssss", $EmpNumber, $startDate, $endDate, $Message, $Reason);
        $stmt2->execute();
        $stmt2->close();
    
        $conn1->close();
        session_abort();
        unset($_SESSION["error"]);
        unset($_SESSION["error1"]);
        unset($_SESSION["error2"]);
        unset($_SESSION["error3"]);
        session_abort();
        $error = "Message send SuccessFully!";
        // echo $role;
        
        echo "<script>    
            var response = confirm('" . $error . "');
            if (response == true) {
                if('" . $role . "' == 'ROL002'){
                    window.location.href = '../Interfaces/DirectorInterface/ApplyLeave.php';
                } else if('" . $role . "' == 'ROL004'){
                    window.location.href = '../Interfaces/EmplyoeeInterface/EmplyoLeaveApply.php';
                }
            } else {
                if('" . $role . "' == 'ROL002'){
                    window.location.href = '../Interfaces/DirectorInterface/ApplyLeave.php';
                } else if('" . $role . "' == 'ROL004'){
                    window.location.href = '../Interfaces/EmplyoeeInterface/EmplyoLeaveApply.php';
                }
            }
        </script>";
        
        
    }


    // header("Location: ");
} else {
    // Handle case where username is not set in session
    // Redirect or show an error message
    echo 'There is error please log again!';
    if($role === 'ROL002'){
        header("Location:../Interfaces/DirectorInterface/ApplyLeave.php ");
    }else if($role === 'ROL004'){
        header("Location:../Interfaces/EmplyoeeInterface/EmplyoLeaveApply.php ");
    }
}


?>
