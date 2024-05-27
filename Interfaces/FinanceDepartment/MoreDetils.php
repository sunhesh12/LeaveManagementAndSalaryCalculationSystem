<?php
    // session_start();  
    unset($_SESSION["fullName1"] ); 
    unset($_SESSION["email1"]);  
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include(__DIR__ . '/../../TitleOfWebPage/title.php'); ?>
    <link rel="stylesheet" type="text/css" href="/styleCSS/DirectorInterface/DirectorInterfaceStyle.php">
    <link rel="stylesheet" type="text/css" href="/styleCSS/systemAdminInterface/AddUserStyle.php">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
    .profile-pic {
        margin-left: 190px;
            border-radius: 50%;
            height: 150px;
            width: 150px;
            background-size: cover;
            background-position: center;
            background-blend-mode: multiply;
            color: transparent;
            transition: all .3s ease;
            cursor: pointer;
        }
        
        .profile-pic:hover {
            background-color: rgba(0,0,0,.5);
            z-index: 10000;
            color: #fff;
            transition: all .3s ease;
            text-decoration: none;
        }
        
        .profile-pic span {
            display: inline-block;
            padding-top: 4.5em;
            padding-bottom: 4.5em;
        }
        
        .img2:hover{
            cursor :pointer;
        }
        form input[type="file"] {
            display: none;
            cursor: pointer;
        }
        
    </style>
</head>
<body>
    <div class="div-header">
        <?php include 'DashBoard.php' ?>
    </div>
    <div class="div-Main-container">
       <form method="post" action="../../DataBase/AddUserDb.php" id="AdduserForm">
        <div class="Div-subContainer">
                <div class="Div-leftContainer" >
                    <div class="div-profilePic" style="background-color:none;">
                        <!-- <img style="background-color: red; border-radius:10000px; height:auto;" class="img1" src="/Interfaces/SystemAdminInterface/images/nullProfileIcon.png" alt="nullIcon" > -->
                        <div id="profilePic" class="profile-pic" style="background-image: url('/Interfaces/SystemAdminInterface/images/nullProfileIcon.png')" onclick="changeProfilePic()">
                            <span class="glyphicon glyphicon-camera"></span>
                            <!-- <span>Change Image</span> -->
                        </div>
                        
                        <input type="file" id="fileToUpload" onchange="previewImage(event)"  style="display: none;">

                        <br>
                        <img class="img2" src="/Interfaces/SystemAdminInterface/images/changeProfile.png " onclick="changeProfilePic()" alt="nullIcon" >
                        <br>
                        
                    </div>
                    <?php
                                            
                        include '../../DataBase/contodb.php';
                        $username =$_POST["moredetils"];
                        echo $username ;
                        
                        $sql2 = "SELECT UserId,fullName,Email,UserName,Position,nic,Department,Role,password FROM user WHERE userid = ?;";
                        $stmt = $conn1->prepare($sql2);
                        $stmt->bind_param("s", $username);
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
                        // $_SESSION["Password"] = $password;
                        $_SESSION["Position"] = $Position;
                        $_SESSION["nic"] = $Nic;
                                    
                    

                    echo '<p style="margin-bottom:-25px; margin-left:-340px">department</p>
                    <input name="dep-Select" id="dep-select" disabled value="'.$_SESSION["dep-Select"].'" >';
                    
                    echo'<p style="margin-bottom:-25px; margin-left:-360px">Job Role</p>
                    <input name="dep-Select" id="dep-select" disabled value="'.$_SESSION["Role-Select"].'" >';
    
                    echo '<p style="margin-bottom:-25px; margin-left:-376px">Email</p>';
                    echo '<input type="email" disabled name ="email" id="email"  placeholder="Email" value = '.$_SESSION["email"].'>';

                    
                    ?>
                </div>
                <div class="Div-RightContainer" >
                    <?php       
                    // $_SESSION["id"]='usr0001';
                    // echo $_SESSION["fullName"];
                        echo '<p style="margin-bottom:-25px; margin-left:-300px">Emplyoee Number</p>';        
                        echo '<input name ="empNum" id="empNumber"  placeholder="Emplyoee Number"value="'.$_SESSION['empNum'].'" disabled>';
                        unset($_SESSION["empNum"]);

                        echo '<p style="margin-bottom:-25px; margin-left:-350px">Full Name </p>';          
                        echo '<input type="text" id="fullName" name ="fullName"  placeholder="Full Name" value="'.$_SESSION["fullName"].'" disabled>';
                        unset($_SESSION["fullName"]);


                        echo '<p style="margin-bottom:-25px; margin-left:-350px">User Name</p>';
                            echo '<input type="text" name ="userName" id="userName" placeholder="User Name" value="'.$_SESSION['userName'].'" disabled>';
                            unset($_SESSION["userName"]);


                        echo '<p style="margin-bottom:-25px; margin-left:-350px">Job Position</p>';

                            echo '<input type="text" name ="Position" id="position"  placeholder="Job Position"  value="'.$_SESSION["Position"].'" disabled>';
                            unset($_SESSION["Position"]);


                        echo '<p style="margin-bottom:-25px; margin-left:-400px">NIC</p>';
                            echo '<input type="text" name ="nic" id="nic"  placeholder="NIC"  value="'.$_SESSION["nic"].'" disabled>';
                            unset($_SESSION["nic"]);


                    ?>
                    
                </div>
            </div>
            <div class="Div-btnContainer">

           <a href="/Interfaces/FinanceDepartment/SearchUser.php"   ><button type="submit" >Back</button></a>  
                <!-- <button type="submit" name="action" value="delete" onclick="DeleteForm()">Delete</button> -->
                
            </div>
       </form>
    </div>
    <script>
        // function deleteMessage(){
        //     var empNumber = document.getElementById("empNumber").value;
            
        // }
        function clearFields() {
            <?php session_destroy(); ?>
            // Get all input and select elements inside the form
            const form = document.getElementById('AdduserForm');
            const inputs = form.querySelectorAll('input');
            const selects = form.querySelectorAll('select');
            const dates = form.querySelectorAll('input[type="date"]');

            // Loop through input fields and clear their values
            inputs.forEach(input => {
                input.value = '';
            });

            // Loop through select fields and reset to their initial state (first option selected)
            selects.forEach(select => {
                select.selectedIndex = 0;
            });

            // Reset date fields to placeholder
            dates.forEach(date => {
                date.type = 'text';
                date.placeholder = 'Select Date';
            });
        }
    </script>
        <script>
        // Function to change the profile picture
        function changeProfilePic() {
            // Trigger click on file input element
            document.getElementById('fileToUpload').click();
        }

        // Function to preview the selected image before uploading
        function previewImage(event) {
            var profilePic = document.getElementById('profilePic');
            var file = event.target.files[0];
            var reader = new FileReader();

            reader.onload = function() {
                profilePic.style.backgroundImage = "url('" + reader.result + "')";
            }

            if (file) {
                reader.readAsDataURL(file);
            }
        }
    </script>
    <script>
        <?php include '../../Scripts/navigationBarScript.php/navigationbarScript.php' ?>
    </script>
    <script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script>
   </body>
</html>