
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
    <a href="ApplyLeave.php" style="text-decoration: none;"><h4 style="margin-left:30px; margin-bottom:-10px;">Leave>Apply Leave</h4></a>
    <?php 
    session_abort();
    $_SESSION['previousUrl'] = $_SERVER['REQUEST_URI'];
    ?>
    <?php include '../../LeaveApplyForm/LeaveApply.php' ?>

    </div>
    
    <script>
        <?php include '../../Scripts/navigationBarScript.php/navigationbarScript.php' ?>
    </script>
    <script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script>
</body>
</html>
