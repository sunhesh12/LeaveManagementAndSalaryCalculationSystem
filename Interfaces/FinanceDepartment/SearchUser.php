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
            <p>Select Category 
                <select name="gender" id="gender" required>
                <option value="volvo">User ID</option>
                <option value="volvo">User Name</option>
                <option value="volvo">User Job Position</option>
                <option value="volvo">Telephone Number</option>
            </select></p>
            <p>Select User <input placeholder="Enter Emplyoee ID"><button>Search</button> </p>
        </div>
        <div class="Div-lowerBox">
            <img class="img1" src="/Interfaces/SystemAdminInterface/images/nullProfileIcon.png" alt="nullIcon" >
            <br>
            <p>Emplyoee Id</p>
            <p>Full Name</p>
            <p>Job Role</p>
            <a href="/Interfaces/SystemAdminInterface/AddUserInterface.php"><button>Update</button></a>
            <button>Delete</button>
        </div>
    </div>

    <script>
        <?php include '../../Scripts/navigationBarScript.php/navigationbarScript.php' ?>
    </script>
    <script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script>
</body>
</html>
