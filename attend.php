<!DOCTYPE html>
<html lang="en">
<head>
    <?php include(__DIR__ . '/TitleOfWebPage/title.php'); ?>
    <link rel="stylesheet" type="text/css" href="styleCSS/Singin/signInStyle.php">
    <Link rel="stylesheet" type="text/css" href="/styleCSS/systemAdminInterface/SearchUserStyle.php">
    <link rel="stylesheet" type="text/css" href="/styleCSS/DirectorInterface/DirectorInterfaceStyle.php">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <div class="div-background">
        <div class="div-logo" style="height:150px">
            <br>
            <img src="Logo/logo.png" alt="Lanka Security logo">
        </div>
    <?php
        include 'DataBase/contodb.php';

        // Select for attendance
        echo '<form method="POST" action="/Attendence.php">';
        echo '<select name="getUser" id="attendence-select" >';
        echo '<option value="-Select a User-">-Select a user-</option>';

        $sql = "SELECT u.userId As userid, u.fullname As fullName  FROM user u INNER JOIN absent a ON u.userid = a.userid";
        $result = $conn1->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo '<option value="'.$row['userid'].'">'.$row['userid'].'-'. $row['fullName'] .'</option>'; 
            }
        } else {
            echo '<option value="">No users found</option>';
        }

        echo '</select>';
        echo '<p>Attendance:<button>Attend</button></p>';
        echo '</form>';

        // Select for leave
        echo '<form method="POST" action="/leave.php">';
        echo '<select name="getUser" id="leave-select" >';
        echo '<option value="-Select a User-">-Select a user-</option>';

        $sql = "SELECT u.userId As userid, u.fullname As fullName  FROM user u INNER JOIN presnt a ON u.userid = a.userid";
        $result = $conn1->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo '<option value="'.$row['userid'].'">'.$row['userid'].'-'. $row['fullName'] .'</option>'; 
            }
        } else {
            echo '<option value="">No users found</option>';
        }

        echo '</select>';
        echo '<p>Attendance:<button>Leave</button></p>';
        echo '</form>';

        $conn1->close();
    ?>
    </div>
</body>
</html>
