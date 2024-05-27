
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include(__DIR__ . '/../../TitleOfWebPage/title.php'); ?>
    <link rel="stylesheet" type="text/css" href="/styleCSS/DirectorInterface/DirectorInterfaceStyle.php">
    <link rel="stylesheet" type="text/css" href="/styleCSS/systemAdminInterface/AddUserStyle.php">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body>
    <div class="div-header">
        <?php include 'DashBoard.php' ?>
    </div>
    <div class="div-Main-container">
       <form method="post" action="../../DataBase/AddUserFinanceDb.php" id="AdduserForm">
        <div class="Div-subContainer">
                <div class="Div-leftContainer" >
                    <h1>Add Salary Detils</h1>
                    <p style="margin-bottom:-25px; margin-left:-720px">Select Emplyoee Number</p>
                    <select name="getUser" id="dep-select" >
                    <?php
                        echo '<option value="-Select a User-">-Select a user-</option>';

                        include '../../DataBase/contodb.php';
                        

                        $sql = "SELECT * FROM user";
                        $result = $conn1->query($sql);

                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                echo '<option value="'.$row['userid'].'">'.$row['UserId'].'-'. $row['fullName'] .'</option>'; 
                            }
                        } else {
                            echo '<option value="">No departments found</option>';
                        }

                        $conn1->close();
                        // session_abort();

                    ?>

                 
                    </select>

                    <?php       
                    // $_SESSION["id"]='usr0001';
                    // echo $_SESSION["fullName"];
                        





                        



                        // echo '<p style="margin-bottom:-25px; margin-left:-780px">Medical Allawns</p>';
                        // echo '<input name ="ma" id="empNumber"  placeholder="Emplyoee Number"value="">';
                        // $taxFromDB = $row['Tax'];
                
                        
                        // $bsFromDB = ;
                        // $taFromDB = ;
                        // $maFromDB = ;


                        if(isset($row['BasicSalary'])){
                            echo '<p style="margin-bottom:-25px; margin-left:-810px">Basic Salary</p>';
                        echo '<input name ="bs" id="empNumber"  placeholder="Emplyoee Number"value="'.$row['BasicSalary'].'">';
                            unset($row['BasicSalary']);
                        }else{
                            echo '<p style="margin-bottom:-25px; margin-left:-810px">Basic Salary</p>';
                        echo '<input name ="bs" id="empNumber"  placeholder="Emplyoee Number"value="">';
                        }
                        if(isset($row['Tax'])){
                            echo '<p style="margin-bottom:-25px; margin-left:-860px">Tax</p>';
                            echo '<input name ="tax" id="empNumber"  placeholder="Emplyoee Number"value="'.$row['Tax'].'">';
                            unset($row['Tax']);
                        }else{
                            echo '<p style="margin-bottom:-25px; margin-left:-860px">Tax</p>';
                            echo '<input name ="tax" id="empNumber"  placeholder="Emplyoee Number"value="">';
                        }
                        if(isset($row['Epf']) ){
                            echo '<p style="margin-bottom:-25px; margin-left:-860px">EPF</p>';
                            echo '<input name ="epf" id="empNumber"  placeholder="Emplyoee Number"value="'.$row['Epf'].'">';
                            unset($row['Epf']);
                        }else{
                            echo '<p style="margin-bottom:-25px; margin-left:-860px">EPF</p>';
                            echo '<input name ="epf" id="empNumber"  placeholder="Emplyoee Number"value="">';
                        }
                        if(isset( $row['Etf'])){
                            echo '<p style="margin-bottom:-25px; margin-left:-860px">ETF</p>';
                            echo '<input name ="etf" id="empNumber"  placeholder="Emplyoee Number"value="'. $row['Etf'].'">';
                            unset( $row['Etf']);
                        }else{
                            echo '<p style="margin-bottom:-25px; margin-left:-860px">ETF</p>';
                        echo '<input name ="etf" id="empNumber"  placeholder="Emplyoee Number"value="">';
                        }

                        if(isset($row['MedicalAllawance'])){
                            echo '<p style="margin-bottom:-25px; margin-left:-790px">Traval Allawns</p>';
                            echo '<input name ="ma" id="empNumber"  placeholder="Emplyoee Number"value="'.$row['MedicalAllawance'].'">';
                            unset($row['MedicalAllawance']);
                        }else{
                            echo '<p style="margin-bottom:-25px; margin-left:-790px">Traval Allawns</p>';
                            echo '<input name ="ma" id="empNumber"  placeholder="Emplyoee Number"value="">';
                        }
                        if( isset($row['TravalAllownace'] )){
                            echo '<p style="margin-bottom:-25px; margin-left:-860px">ETF</p>';
                            echo '<input name ="etf" id="empNumber"  placeholder="Emplyoee Number"value="'. $row['TravalAllownace'].'">';
                            unset( $row['TravalAllownace']);
                        }else{
                            echo '<p style="margin-bottom:-25px; margin-left:-860px">ETF</p>';
                        echo '<input name ="ta" id="empNumber"  placeholder="Emplyoee Number"value="">';
                        }


                    ?>
                    
                </div>
            </div>
            <div class="Div-btnContainer">
                <button type="submit" name="action" value="search">Search</button>
                <button type="submit" name="action" value="add" onclick="validateForm()" >Add</button>
                <button type="submit" name="action" value="update" onclick="validateForm()">Update</button>
                <!-- <button type="submit" name="action" value="delete" onclick="DeleteForm()">Delete</button> -->
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
     

</body>
</html>
