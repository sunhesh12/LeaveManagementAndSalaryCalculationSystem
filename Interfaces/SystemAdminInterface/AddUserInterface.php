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
                    <p style="margin-bottom:-25px; margin-left:-340px">department</p>
                    <select name="dep-Select" id="dep-select" >
                    <?php
                    // session_start();
                        
                        if(isset($_SESSION["dep-Select"])){
                            $dep = $_SESSION["dep-Select"];
                            // echo $dep;
                            echo '<option value="'.$dep.'">'.$dep.'</option>';
                            echo '<option value="-Select a department-">-Select a department-</option>';
                            unset($_SESSION["dep-Select"]);
                        }else{
                            echo '<option value="-Select a department-">-Select a department-</option>';
                        }

                        include '../../DataBase/contodb.php';
                        

                        $sql = "SELECT Department_name FROM department WHERE Department_id LIKE 'DEP%'";
                        $result = $conn1->query($sql);

                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                echo '<option value="department">'. $row['Department_name'] .'</option>'; 
                            }
                        } else {
                            echo '<option value="">No departments found</option>';
                        }

                        $conn1->close();
                        // session_abort();

                    ?>

                    </select>
                    <p style="margin-bottom:-25px; margin-left:-360px">Job Role</p>
                    <!-- <input type ="text" onfocus="(this.type='date')" onblur="(this.type='text')" placeholder="Date of join" required > -->
                    <!-- <input type ="text" onfocus="(this.type='date')" onblur="(this.type='text')" placeholder="Date of birth" required > -->
                    <select name="Role-Select" id="Role-select"  >
                        <!-- <option value="volvo">-Select a Role-</option> -->
                    <?php
                        if(isset($_SESSION["Role-Select"])){
                            $Role = $_SESSION["Role-Select"];
                            // echo $dep;
                            echo '<option value='.$Role.'>'.$Role.'</option>';
                            echo '<option value="-Select a Role-">-Select a Role-</option>';
                            unset($_SESSION["Role-Select"]);
                        }else{
                            echo '<option value="-Select a Role-">-Select a Role-</option>';
                        }

                        ?>
                        <?php
                            include '../../DataBase/contodb.php';
                            // session_start();

                            $sql = "SELECT Role_name FROM role WHERE Role_id LIKE 'ROL%'";
                            $result1 = $conn1->query($sql);

                            if ($result1->num_rows > 0) {
                                while($row1 = $result1->fetch_assoc()) {
                                    echo '<option value="role">'. $row1['Role_name'] .'</option>'; 
                                }
                            } else {
                                echo '<option value="">No Role found</option>';
                            }

                            $conn1->close();
                            // session_abort();
                        ?>
                    </select>
                    <!-- <input type ="text"  placeholder="Contact number" required > -->
                    <p style="margin-bottom:-25px; margin-left:-376px">Email</p>
                    <?php 
                    if(isset($_SESSION["email"])){
                        echo '<input type="email" name ="email" id="email"  placeholder="Email" value = '.$_SESSION["email"].'>';
                        session_unset();
                    }else{
                        echo '<input type="email" name ="email" id="email"  placeholder="Email" >'; 
                    }
                    
                    ?>
                </div>
                <div class="Div-RightContainer" >
                    <?php 
                        include '../../DataBase/contodb.php';
                        // header('Content-Type: application/json');
                        // session_start();
                        $sql = "SELECT Max(UserID) AS lastEmpNumber FROM user;";
                        $stmt = $conn1->prepare($sql);
                        $stmt->execute();
                        $stmt->bind_result($Count);
                        $stmt->fetch();
                        // session_abort();
                        // echo $Count;
                        // Current employee ID
                        $currentEmpID = $Count;

                        // Step 1: Extract the numeric part using preg_replace
                        $numericPart = preg_replace('/[^0-9]/', '', $currentEmpID);

                        // Step 2: Increment the numeric part
                        $incrementedNumericPart = (int)$numericPart + 1;

                        // Step 3: Combine the prefix with the incremented numeric part
                        // Ensure the numeric part retains its leading zeros (e.g., '041' instead of '41')
                        $newEmpID = 'EMP' . str_pad($incrementedNumericPart, 3, '0', STR_PAD_LEFT);
                        $_SESSION["id"] = $newEmpID;
                        // if()
                        // echo $newEmpID; // Outputs: EMP041
                        $stmt->close();
                        $conn1->close();
                        ?>
                    <?php       
                    // $_SESSION["id"]='usr0001';
                    // echo $_SESSION["fullName"];
                        echo '<p style="margin-bottom:-25px; margin-left:-300px">Emplyoee Number</p>';
                        if(isset($_SESSION["empNum"])){
                            echo '<input name ="empNum" id="empNumber"  placeholder="Emplyoee Number"value="'.$_SESSION['empNum'].'">';
                            unset($_SESSION["empNum"]);
                        // echo '<lable type="text" id="fullname" name ="fullName"  placeholder="Full Name" >'.$_SESSION['fullName'].'</label>';
                        }else{
                            echo '<input name ="empNum" id="empNumber"  placeholder="Emplyoee Number" value="'.$_SESSION["id"] .'" >';
                            // unset($_SESSION["id"]);
                        }

                        echo '<p style="margin-bottom:-25px; margin-left:-350px">Full Name </p>';
                        if(isset($_SESSION["fullName"])){
                            echo '<input type="text" id="fullName" name ="fullName"  placeholder="Full Name" value="'.$_SESSION["fullName"].'">';
                            unset($_SESSION["fullName"]);
                        // echo '<lable type="text" id="fullname" name ="fullName"  placeholder="Full Name" >'.$_SESSION['fullName'].'</label>';
                        }else{
                            echo '<input type="text" name ="fullName" id="fullName"  placeholder="Full Name">';
                        }

                        echo '<p style="margin-bottom:-25px; margin-left:-350px">User Name</p>';
                        if(isset($_SESSION["userName"])){
                            echo '<input type="text" name ="userName" id="userName" placeholder="User Name" value="'.$_SESSION['userName'].'">';
                            unset($_SESSION["userName"]);
                        // echo '<lable type="text" id="fullname" name ="fullName"  placeholder="Full Name" >'.$_SESSION['fullName'].'</label>';
                        }else{
                            echo '<input type="text" name ="userName" id="userName" placeholder="User Name" value="'.$_SESSION["id"].'"  >';
                            // unset($_SESSION["id"]);
                        }

                        echo '<p style="margin-bottom:-25px; margin-left:-360px">Password</p>';
                        if(isset($_SESSION["Password"])){
                            echo '<input type="password" name ="Password" id="password" placeholder="Password" value="'.$_SESSION["Password"].'">';
                            unset($_SESSION["Password"]);
                        // echo '<lable type="text" id="fullname" name ="fullName"  placeholder="Full Name" >'.$_SESSION['fullName'].'</label>';
                        }else{
                            echo '<input type="password" name ="Password" id="password" placeholder="Password" value="'.$_SESSION["id"] .'"  >';
                            unset($_SESSION["id"]);
                        }

                        echo '<p style="margin-bottom:-25px; margin-left:-350px">Job Position</p>';
                        if(isset($_SESSION["Position"])){
                            echo '<input type="text" name ="Position" id="position"  placeholder="Job Position"  value="'.$_SESSION["Position"].'">';
                            unset($_SESSION["Position"]);
                        // echo '<lable type="text" id="fullname" name ="fullName"  placeholder="Full Name" >'.$_SESSION['fullName'].'</label>';
                        }else{
                            echo '<input type="text" name ="Position" id="position"  placeholder="Job Position"  >';
                        }

                        echo '<p style="margin-bottom:-25px; margin-left:-400px">NIC</p>';
                        if(isset($_SESSION["nic"])){
                            echo '<input type="text" name ="nic" id="nic"  placeholder="NIC"  value="'.$_SESSION["nic"].'">';
                            unset($_SESSION["nic"]);
                        // echo '<lable type="text" id="fullname" name ="fullName"  placeholder="Full Name" >'.$_SESSION['fullName'].'</label>';
                        }else{
                            echo '<input type="text" name ="nic" id="nic"  placeholder="NIC"   >';
                        }  

                    ?>
                    
                </div>
            </div>
            <div class="Div-btnContainer">
                <button type="submit" name="action" value="search">Search</button>
                <button type="submit" name="action" value="add" onclick="validateForm()" >Add</button>
                <button type="submit" name="action" value="update" onclick="validateForm()">Update</button>
                <button type="submit" name="action" value="delete" onclick="DeleteForm()">Delete</button>
                <button type="submit" name="action" value="cleare" onclick="clearFields()" >Clear All</button>
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
    <script>
        function DeleteForm() {

            var empNumber = document.getElementById("empNumber").value;
            var userName = document.getElementById("userName").value;


            if (empNumberv==="" ) {
                alert("Please enter your employee number that you wanna delete");
                return false;
            }
            if (empNumberv !=="" ) {
                alert("do you wanna delete :"+empNumber);
                return false;
            }

            // Form is valid
            return true;
        }
    </script>
    <script>
        function validateForm() {
            // Get form fields
            var fullName = document.getElementById("fullName").value;
            var email = document.getElementById("email").value;
            var nic = document.getElementById("nic").value;
            var position = document.getElementById("position").value;
            var password = document.getElementById("password").value;
            var empNumber = document.getElementById("empNumber").value;
            var userName = document.getElementById("userName").value;
            var department = document.getElementById("dep-select").value;
            var role = document.getElementById("Role-select").value;

            // Regular expressions for validation
            // var nicRegex = /^(?:20)?\d{9}[vVxX]?$/; // Sri Lankan NIC format (9 digits followed by 'v' or 'x' or 'V' or 'X')
            var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/; // Basic email format validation

            // Validate each field
            if (department === "-Select a department-") { // Assuming "volvo" is the default option
                alert("Please select a department");
                return false;
            }          
            if (role === "-Select a Role-") { // Assuming "volvo" is the default option
                alert("Please select a role");
                return false;
            }
            if (!emailRegex.test(email)) {
                alert("Please enter a valid email address");
                return false;
            }
            if (empNumber.trim() === "") {
                alert("Please enter your employee number");
                return false;
            }
            if (fullName.trim() === "") {
                alert("Please enter your full name");
                return false;
            }
            if (userName.trim() === "") {
                alert("Please enter your username");
                return false;
            }
            if (password.length < 6) {
                alert("Password must be at least 6 characters long");
                return false;
            }
            if (position.trim() === "") {
                alert("Please enter your position");
                return false;
            }
            // if (!nicRegex.test(nic.toUpperCase())) {
            //     alert("Please enter a valid Sri Lankan NIC");
            //     return false;
            // }

            // Form is valid
            return true;
        }
    </script>
</body>
</html>
