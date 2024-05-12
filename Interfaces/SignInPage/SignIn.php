<!DOCTYPE html>
<html lang="en">
<head>
    <?php include(__DIR__ . '/../../TitleOfWebPage/title.php'); ?>
    <link rel="stylesheet" type="text/css" href="\styleCSS\Singin\signInStyle.php">
</head>
<body>
    <div class="div-background" >
        <div class="div-logo">
            <br>
            <img src="\Logo\logo.png" alt="Lanka Security logo">
        </div>
        <div>
            <form method="post" action="../../DataBase/SignInDb.php">
                <input type="text" placeholder="Enter user name" name="userName" required >
                <br>
                <input type="password" placeholder="Enter password" name="password" required >
                <br>
                <div class="div-lab">
                    <label style="float:left;">
                        <input type="checkbox" id="rememberMeCheckbox">Remember Me
                    </label>
                    <label style="float:right;"><a href="#" style="text-decoration: none;">Forgot password</a></label>
                    <br>
                    <label id="error-text">error-message show here</label>
                    <br>
                </div>
                <br>
                <a href="Interfaces/DirectorInterface/DirectorDashBoard.php">
                    <button class="btn-log-in">Log in</button>
                </a>
            </form>
        </div>
    </div>
    <script src="scriptSignIn.js"></script>
</body>
</html>
