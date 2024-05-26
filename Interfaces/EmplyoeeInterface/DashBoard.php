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

<div style="background-color: none; width:500px; height: 40px; margin-left:650px; margin-top:10px; float:right ">
    <button style="background-color: black; height: 40px; width: 100px; float: right; margin-left: 10px;margin-top:-6px;" 
        onmouseover="this.style.backgroundColor='red';" 
        onmouseout="this.style.backgroundColor='black';"
        onclick="confirmExit();">
    Log Out
</button>
    <!-- <img src="\Logo\logo.png" alt="logo"> -->
    <!-- <div style="background-color: none; width:500px; height: 50px; margin-left:650px; margin-top:10px; float:right "> -->
    <img src="images/null profile1.png" style="height: 40px; width:40px; float:right; margin-left:10px; margin-top:-6px">
    <h2 style="margin-top:1px; color:white; float:right; margin-left:10px;">
    <?php 
    session_start();
        // Check if the cookie is set
        if (isset($_COOKIE['username'])) {
            $username = $_COOKIE['username'];

        }
        // $username ='EMP001';
        include '../../DataBase/contodb.php';
        
        $sql = "select fullName from user where username like '".$username."';";
        $stmt = $conn1->prepare($sql);
        $stmt->execute();
        $stmt->bind_result($Count);
        $stmt->fetch();
        echo $Count;
        $stmt->close();
        $conn1->close();
        session_abort();
        ?>
    </h2>
    <img src="images/notification1.png" style="height: 40px; width:40px; float:right; margin-left:10px;;margin-top:-5px;">
    <!-- <img src="images/searchIcon1.png" style="height: 40px; width:40px; float:right; margin-left:10px;" > -->
    
</div>
</div>
<div class="sidebar-toggle">
<button id="toggleNav"><i class="fa fa-bars"></i></button>
</div>
<div class="div-main" >
<div class="div-nav">
    <li><a href="/Interfaces/EmplyoeeInterface/EmplyoeeDashBoard.php">Dashboard</a></li>
    <li class="dropdown-btn">
        <a href="#">Attendance</a>
        <i class="fa fa-caret-right"></i>
    </li>
    <div class="dropdown-container">
        <li><a href="/Interfaces/EmplyoeeInterface/EmplyoeeAttendence.php">My Attendance Report</a></li>
        <li><a href="#">Calander</a></li>
    </div>
    <!-- <li><a href="#">Attendance</a></li> -->
    <li class="dropdown-btn">
        <a href="#">Leave</a>
        <i class="fa fa-caret-right"></i>
    </li>
    <div class="dropdown-container">
        <li><a href="/Interfaces/EmplyoeeInterface/EmplyoLeaveApply.php">Apply Leave</a></li>
        <li><a href="/Interfaces/EmplyoeeInterface/EmplyoeeLeaveBlance.php">Leave Balance</a></li>
        <li><a href="/Interfaces/EmplyoeeInterface/ApproveStatus.php">Approve Status</a></li>
    </div>
   <!--  <li><a href="#">Approve Leave</a></li>
    <li class="dropdown-btn">
        <a href="#">Report</a>
        <i class="fa fa-caret-right"></i>
    </li>
    <div class="dropdown-container">
        <li><a href="#">Attendance Report</a></li>
        <li><a href="#">Leave Report</a></li>
        <li><a href="#">Salary Report</a></li>
    </div>-->
    <li><a href="#">Salary</a></li>
    <li><a href="#">Profile</a></li> 
</div>