<div class="Main-Dashboard">
    <div class="small-boxes">
        <div class="div-icon">
            <img src="\DashBoardBoxes\images\TotalEmplyoee.png" alt="icon" >
        </div>
        <div class="div-text">
            <h2>Total Employee</h2>
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                <h2 class="h1-number" name="count">
                    <?php 
                    include '../../DataBase/contodb.php';
                    // session_start();
                    $sql = "select COUNT(*) from user;";
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
            </form>
        </div>
    </div>

    <div class="small-boxes">
        <div class="div-icon">
            <img src="\DashBoardBoxes\images\totalPresent.png" alt="icon">
        </div>
        <div class="div-text">
            <h2>Today Present</h2>
            <!-- <h2 class="h1-number">55</h2> -->
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                <h2 class="h1-number" name="Presentcount">
                    <?php 
                    include '../../DataBase/contodb.php';
                    // session_start();
                    $sql1 = "select COUNT(*) from user;";
                    $stmt = $conn1->prepare($sql1);
                    $stmt->execute();
                    $stmt->bind_result($Count1);
                    $stmt->fetch();
                    $stmt->close();

                    $sql = "select COUNT(*) from absent;";
                    $stmt = $conn1->prepare($sql);
                    $stmt->execute();
                    $stmt->bind_result($Count);
                    $stmt->fetch();
                    echo $Count1-$Count;
                    $stmt->close();
                    $conn1->close();
                    // session_abort();
                    ?>
                </h2>
            </form>
            
        </div>
    </div>
    <div class="small-boxes">
        <div class="div-icon">
            <img src="\DashBoardBoxes\images\Cancelled.png" alt="icon" >
        </div>
        <div class="div-text">
            <h2>Attendence Precentage</h2>
            <h2 class="h1-number">
            <?php

            // Check if the cookie is set
            if (isset($_COOKIE['username'])) {
                $username = $_COOKIE['username'];

            }
            include '../../DataBase/contodb.php';
            // session_start();
            
            $sql1 = "SELECT COUNT(DISTINCT date) FROM worktime WHERE EmpId = '".$username."' ;";
            $stmt = $conn1->prepare($sql1);
            $stmt->execute();
            $stmt->bind_result($Count1);
            $stmt->fetch();
            $stmt->close();

            $sql = "SELECT COUNT(DISTINCT date) FROM worktime";
            $stmt = $conn1->prepare($sql);
            $stmt->execute();
            $stmt->bind_result($Count);
            $stmt->fetch();
            if($Count1==0 && $Count==0){
                echo "0 %";
            }else{
                echo $Count1/$Count." %";
            }
            
            $stmt->close();
            $conn1->close();
            // session_abort();
            ?>
            </h2>
        </div>
    </div>
    <div class="small-boxes">
        <div class="div-icon">
            <img src="\DashBoardBoxes\images\AbsentToday.png" alt="icon">
        </div>
        <div class="div-text">
            <h2>Absent Today</h2>
            <!-- <h2 class="h1-number">55</h2> -->
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                <h2 class="h1-number" name="Absentcount">
                    <?php 
                    include '../../DataBase/contodb.php';
                    // session_start();
                    $sql = "select COUNT(*) from absent;";
                    $stmt = $conn1->prepare($sql);
                    $stmt->execute();
                    $stmt->bind_result($Count);
                    $stmt->fetch();
                    echo $Count;
                    $stmt->close();
                    $conn1->close();
                    // session_abort();
                    ?>
                </h2>
            </form>
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

    <div class="Div-subContainer" style=" display: block; text-align: center; ">
            <h1>Today Absents</h1>
            <!-- <br>         -->
            <table  id="table">
                <tr style=" background-color: rgb(105, 111, 255); ">
                    <th>User Name</th>
                    <th>Deparment</th>
                </tr>

                <?php
                    include '../../DataBase/contodb.php';
                    // session_start();
                    $sql = "SELECT u.fullName, d.Department_name FROM user u INNER JOIN absent a ON u.userID = a.userId INNER JOIN department d ON u.Department = d.Department_id;";
                    $stmt = $conn1->prepare($sql);
                    $stmt->execute();
                    $stmt->bind_result($fullName, $department);
                    // session_abort();
                    while ($stmt->fetch()) {
                        $uname = $fullName;
                        $Deparment = $department;
                        echo '<tr>';
                            echo '<td>'.$uname.'</td>';
                            echo '<td>'.$Deparment.'</td>';
                        echo '</tr>';
                    }
                    // session_abort();
                ?>
            </table>
        <!-- <button type="button" onclick="exportPdf()" class="btn btn-primary">Export To PDF</button> -->
        </div>

</div>
