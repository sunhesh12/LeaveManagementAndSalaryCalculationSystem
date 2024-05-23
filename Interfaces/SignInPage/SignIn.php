<!DOCTYPE html>
<html lang="en">
<head>
    <?php include(__DIR__ . '/../../TitleOfWebPage/title.php'); ?>
    <link rel="stylesheet" type="text/css" href="/styleCSS/Singin/signInStyle.php">
</head>
<body>
    <div class="div-background">
        <div class="div-logo" style="height:150px">
            <br>
            <img src="\Logo\logo.png" alt="Lanka Security logo">
        </div>
        <div style="height:350px">
            <form method="post" action="../../DataBase/SignInDb.php">
                <div style="background-color:none; width:80%; height:auto;margin-left:14%;text-align:left"> 
                <h3 style="margin:1%">Username <img src="172626_user_male_icon (1).png" style="margin-left:340px; margin-bottom:-10px" ></h3>
                <input type="text" placeholder="Enter user name" name="userName" id="username" required >
                <br>          
                </div>
                <!-- <br> -->
                <div style="background-color:none; width:80%; height:auto;margin-left:14%;text-align:left"> 
                <h3 style="margin:1%">Password<img src="8666758_unlock_lock_icon (1).png" style="margin-left:350px; margin-bottom:-10px"></h3>
                <input type="password" placeholder="Enter password" id="password" name="password" required >
                <br>
                </div>
                <div class="div-lab" style=" background-color:none">
                    <label style="float:left;">
                        <input type="checkbox" id="rememberMeCheckbox"> Remember Me
                    </label>
                    <label style="float:right;">
                        <a href="#" style="text-decoration: none;">Forgot password</a>
                    </label>
                </div>
                <br>
                <div style="background-color:none; width:80%; height:auto;margin-left:14%;text-align:left"> 
                <label id="error-text" name="error-text"></label>
                <?php
                // Start or resume the session
                session_start();

                // Check if the error message session variable is set
                if (isset($_SESSION["error-text"])) {
                    // Output the error message
                    // echo $_SESSION["error-text"];
                    echo '<label id="error-text" name="error-text">'.$_SESSION["error-text"].'</label>';
                    // Optionally, you may unset or destroy the session variable once it's displayed
                    unset($_SESSION["error-text"]);
                }
                ?>

                </div>
                <a href="Interfaces/DirectorInterface/DirectorDashBoard.php">
                    <button class="btn-log-in" onclick="myFunction()">Log in</button>
                </a>
            </form>
        </div>
    </div>
    <script>
        function myFunction() {
        // Get the value of the input field with id="numb"
        let x = document.getElementById("username").value;
        let y = document.getElementById("password").value;
        // If x is Not a Number or less than one or greater than 10
        let text;
        if (x=="") {
            text = "Enter user name";
        } else if(y == "") {
            text = "Enter Password";
        }
        document.getElementById("error-text").innerHTML = text;
        }
    </script>
</body>
</html>
