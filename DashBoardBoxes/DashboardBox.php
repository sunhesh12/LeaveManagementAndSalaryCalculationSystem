<div class="Main-Dashboard">
    <div class="small-boxes">
        <div class="div-icon">
            <img src="\DashBoardBoxes\images\TotalEmplyoee.png" alt="icon" >
        </div>
        <div class="div-text">
            <h1>Total Employee</h1>
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                <h1 class="h1-number" name="count">
                    <?php 
                    include '../../DataBase/contodb.php';
                    session_start();
                    $sql = "select COUNT(*) from user;";
                    $stmt = $conn1->prepare($sql);
                    $stmt->execute();
                    $stmt->bind_result($Count);
                    $stmt->fetch();
                    echo $Count;
                    $stmt->close();
                    $conn1->close();
                    ?>
                </h1>
            </form>
        </div>
    </div>

    <div class="small-boxes">
        <div class="div-icon">
            <img src="\DashBoardBoxes\images\totalPresent.png" alt="icon">
        </div>
        <div class="div-text">
            <h1>Today Present</h1>
            <h1 class="h1-number">55</h1>
        </div>
    </div>
    <div class="small-boxes">
        <div class="div-icon">
            <img src="\DashBoardBoxes\images\Cancelled.png" alt="icon" >
        </div>
        <div class="div-text">
            <h1>Attendence Precentage</h1>
            <h1 class="h1-number">55</h1>
        </div>
    </div>
    <div class="small-boxes">
        <div class="div-icon">
            <img src="\DashBoardBoxes\images\AbsentToday.png" alt="icon">
        </div>
        <div class="div-text">
            <h1>Absent Today</h1>
            <h1 class="h1-number">55</h1>
        </div>
    </div>

    <!-- <div class="small-boxes">
        <div class="div-icon">
            <img src="\DashBoardBoxes\images\Cancelled.png" alt="icon">
        </div>
        <div class="div-text">
            <h1>Cancelled</h1>
            <h1 class="h1-number">55</h1>
        </div>
    </div> -->

</div>
