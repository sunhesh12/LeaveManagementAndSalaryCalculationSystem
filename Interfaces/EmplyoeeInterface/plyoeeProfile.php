<!DOCTYPE html>
<html lang="en">
<head>
    <?php include(__DIR__ . '/../../TitleOfWebPage/title.php'); ?>
    <link rel="stylesheet" type="text/css" href="/styleCSS/DirectorInterface/DirectorInterfaceStyle.php">
    <link rel="stylesheet" type="text/css" href="/styleCSS/systemAdminInterface/AddUserStyle.php">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <style>

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
                <div class="div-profilePic">
                    <img class="img1" src="/Interfaces/SystemAdminInterface/images/nullProfileIcon.png" alt="nullIcon" >
                    <br>
                    <img class="img2" src="/Interfaces/SystemAdminInterface/images/changeProfile.png " alt="nullIcon" >
                    <br>
                </div>
                <input type ="text"  placeholder="Emp Number" required>
                <input type ="text"  placeholder="Full Name" required>
                <select name="dep-Select" id="dep-select" required>
                    <option value="volvo">-Select a department-</option>
                    <?php
                        include '../../DataBase/contodb.php';
                        session_start();

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
                    ?>

                </select>

                <!-- <input type ="text" onfocus="(this.type='date')" onblur="(this.type='text')" placeholder="Date of join" required > -->
                <!-- <input type ="text" onfocus="(this.type='date')" onblur="(this.type='text')" placeholder="Date of birth" required > -->

                <!-- <input type ="text"  placeholder="Contact number" required > -->
                <input type ="email"  placeholder="Email" required>
            </div>
            <div class="Div-RightContainer" >

                <!-- <input type ="text"  placeholder="First Name"  required > -->
                <!-- <input type ="text"  placeholder="Last Name" required > -->
                <!-- <input type ="email" placeholder="Email" required > -->
                <!-- <select name="gender" id="gender" required>
                    <option value="volvo">-Select Gender-</option>
                    <option value="volvo">Male</option>
                    <option value="volvo">FeMale</option>
                    <option value="volvo">Other</option>
                </select> -->
                <input type ="text"  placeholder="UserName" required >
                <select name="Role-Select" id="Role-select" required>
                    <option value="volvo">-Select a Role-</option>
                    <?php
                        include '../../DataBase/contodb.php';
                        session_start();

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
                    ?>
                </select>
                
                <input type ="text"  placeholder="Position" required >
                <input type ="text"  placeholder="NIC"  required >
                <input type ="Password"  placeholder="Password" required >
                <input type ="Password"  placeholder="Conform-Password" required >

            </div>
        </div>
        <div class="Div-btnContainer">
            <p>Tehre is a error message</p>
            <button>Update</button>
            <!-- <button>Delete</button> -->
        
        </div>
       </form>
    </div>
    <script>
        function clearFields() {
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
        <?php include '../../Scripts/navigationBarScript.php/navigationbarScript.php' ?>
    </script>
    <script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script>
</body>
</html>
