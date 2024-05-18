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
            <select name="gender" id="gender" required>
                    <option value="volvo">-Select Reason-</option>
                    <option value="volvo">Annual leave </option>
                    <option value="volvo">Casual leave </option>
                    <option value="volvo">Medical leave</option>
                    <option value="volvo">Work from home</option>
                </select>
                <input type ="Date"  placeholder="Emp Number" required>
                <input type ="Date"  placeholder="Full Name" required>
                <!-- <input type ="text"  placeholder="First Name"  required > -->
                <!-- <input type ="text"  placeholder="Last Name" required > -->
                <!-- <input type ="email" placeholder="Email" required > -->

                <textarea type ="text"  placeholder="Type your comments" required style="width: 78%;
        height: 300px;
        resize: none; 
        Border:none;
        border-radius: 10px; padding: 10px; margin-top: 33px; " ></textarea>

            </div>
        </div>
        <div class="Div-btnContainer">
            <!-- <div style="background-color: green; width: 50%; height: 4%; "> -->
                <p>Error message here</p> <!--Error message-->
            <!-- </div>      -->
            <button style=" width:260px; " >Submit</button>
            <!-- <button onclick="clearFields()" >Clear All</button> -->
        </div>
       </form>
    </div>

    <script>
        <?php include '../../Scripts/navigationBarScript.php/navigationbarScript.php' ?>
    </script>
    <script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script>
</body>
</html>
