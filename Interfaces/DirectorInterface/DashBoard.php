
<script>
        function confirmExit() {
            var userResponse = confirm("Do you want to exit?");
            if (userResponse) {
                window.close(); 
                window.location.replace("../SignInPage/SignIn.php");
                // window.location.href = '../SignInPage/SignIn.php';
            }
            
        }
    </script>
<div class="div-logo">
<img src="\Logo\logo.png" alt="logo">
    <div style="background-color: none; width:500px; height: 50px; margin-left:650px; margin-top:10px; float:right ">
    <button style="background-color: black; height: 40px; width: 100px; float: right; margin-left: 10px;margin-top:-3px;" 
        onmouseover="this.style.backgroundColor='red';" 
        onmouseout="this.style.backgroundColor='black';"
        onclick="confirmExit();">
    Log Out
</button>
    <img src="images/null profile1.png" style="height: 50px; width:50px; float:right; margin-left:10px; margin-top:-6px">
    <h2 style="margin-top:9px; color:white; float:right; margin-left:10px;">
    <?php 
        // Check if the cookie is set
        if (isset($_COOKIE['username'])) {
            $username = $_COOKIE['username'];

        }
        include '../../DataBase/contodb.php';
        
        $sql = "select fullName from user where username like '".$username."';";
        $stmt = $conn1->prepare($sql);
        $stmt->execute();
        $stmt->bind_result($Count);
        $stmt->fetch();
        echo $Count;
        $stmt->close();
        $conn1->close();
        ?>
    </h2>
    <!-- <img src="images/searchIcon1.png" style="height: 40px; width:40px; float:right; margin-left:10px;" > -->
    
    <img src="images/notification1.png" style="height: 40px; width:40px; float:right; margin-left:-10px;">

    
    </div>
</div>
</div>
<div class="sidebar-toggle">
<button id="toggleNav"><i class="fa fa-bars"></i></button>
</div>
<div class="div-main" >
<div class="div-nav">
    <li><a href="/Interfaces/DirectorInterface/DirectorDashBoard.php">Dashboard</a></li>
    <li><a href="/Interfaces/DirectorInterface/DirectorAttendenceInterface.php">Attendance</a></li>
    <li class="dropdown-btn">
        <a href="#">Leave</a>
        <i class="fa fa-caret-right"></i>
    </li>
    <div class="dropdown-container">
        <li><a href="/Interfaces/DirectorInterface/ApplyLeave.php">Apply Leave</a></li>
        <li><a href="/Interfaces/DirectorInterface/DirectorLeaveBlance.php">Leave Balance</a></li>
        <li><a href="/Interfaces/DirectorInterface/ApproveStatus.php">Approve status</a></li>
    </div>
    <li><a href="/Interfaces/DirectorInterface/ApproveLeave.php">Approve Leave</a></li>
    <li class="dropdown-btn">
        <a href="#">Report</a>
        <i class="fa fa-caret-right"></i>
    </li>
    <div class="dropdown-container">
        <li><a href="/Interfaces/DirectorInterface/AttendenceReport.php">Attendance Report</a></li>
        <li><a href="/Interfaces/DirectorInterface/LeaveReport.php">Leave Report</a></li>
        <!-- <li><a href="#">Salary Report</a></li> -->
    </div>
    <li><a href="/Interfaces/DirectorInterface/Salary.php">Salary</a></li>
    <li><a href="/Interfaces/DirectorInterface/directorProfile.php">Profile</a></li>
</div>