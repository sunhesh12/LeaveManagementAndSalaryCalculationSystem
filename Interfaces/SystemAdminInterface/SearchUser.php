<?php 
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include(__DIR__ . '/../../TitleOfWebPage/title.php'); ?>
    <Link rel="stylesheet" type="text/css" href="/styleCSS/systemAdminInterface/SearchUserStyle.php">
    <link rel="stylesheet" type="text/css" href="/styleCSS/DirectorInterface/DirectorInterfaceStyle.php">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <div class="div-header">
        <?php include 'DashBoard.php' ?>
    </div>
    <div class="Div-container">
        <div class="Div-UpperBox">
            <form method="POST" action="../../DataBase/get_items.php">
            <p>Select Category 
                <select name="category" id="gender" required>
                <?php
                    // session_start();
                        
                        // if(isset($_SESSION["dep-Select"])){
                        //     $dep = $_SESSION["dep-Select"];
                        //     // echo $dep;
                        //     echo '<option value="'.$dep.'">'.$dep.'</option>';
                        //     echo '<option value="-Select a department-">-Select a department-</option>';
                        //     unset($_SESSION["dep-Select"]);
                        // }else{
                        echo '<option value="-Select a department-">-Select a Category-</option>';
                        // }

                        include '../../DataBase/contodb.php';
                        

                        $sql = "SELECT `COLUMN_NAME` FROM `INFORMATION_SCHEMA`.`COLUMNS` WHERE `TABLE_SCHEMA`='lms' AND `TABLE_NAME`='user';";
                        $result = $conn1->query($sql);
                        $count = 0;
                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                $count++;
                                if($count == 3){
                                    $value = 'Full Name';
                                    echo '<option value="'.$value.'">'. $value.'</option>'; 
                                }else if($count == 8){
                                    $value = 'Emplyoee Number';
                                    echo '<option value="'.$value.'">'. $value.'</option>'; 
                                }else if($count == 9){
                                    $value = 'User Name';
                                    echo '<option value="'.$value.'">'. $value.'</option>'; 
                                }
                                else{
                                    echo '<option value="'.$value.'">'. $row['COLUMN_NAME'] .'</option>'; 
                                }
                                
                            
                            }
                        } else {
                            echo '<option value="">No COLUMN_NAME found</option>';
                        }

                        $conn1->close();
                        // session_abort();

                    ?>
                <!-- <option value="volvo">User ID</option>
                <option value="volvo">User Name</option>
                <option value="volvo">User Job Position</option>
                <option value="volvo">Telephone Number</option> -->
            </select></p>
            <p>Select User <input name="value" placeholder="Enter Value"><button>Search</button> </p>
            </form>
        </div>
        <div class="Div-lowerBox">
            <img class="img1" src="/Interfaces/SystemAdminInterface/images/nullProfileIcon.png" alt="nullIcon" >
            <br>
            <?php
                if(isset($_SESSION["empNum"])){
                    echo '<p>'.$_SESSION["empNum"].'</p>';
                    unset($_SESSION["empNum"]);
                }else{
                    echo '<p>Emplyoee Id</p>';
                }

                if(isset($_SESSION["fullName"])){
                    echo '<p>'.$_SESSION["fullName"].'</p>';
                    unset($_SESSION["fullName"]);
                }else{
                    echo '<p>Full Name</p>';
                }

                if(isset($_SESSION["Position"])){
                    echo '<p>'.$_SESSION["Position"].'</p>';
                    unset($_SESSION["Position"]);
                }else{
                    echo '<p>Job Role</p>';
                }
                
            ?>
            
            <a href="/Interfaces/SystemAdminInterface/AddUserInterface.php"><button>Update</button></a>

            
            <a href="/Interfaces/SystemAdminInterface/AddUserInterface.php"><button>Delete</button></a>


        </div>
    </div>

    <script>
        <?php include '../../Scripts/navigationBarScript.php/navigationbarScript.php' ?>
    </script>
    <script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script>
</body>
</html>
