
<style>
    td,th{
        text-align: center;
    }
</style>
<div class="Main-Dashboard" style="text-align:center; width:90%; background-color: rgb(205, 215, 253);">
        <h1>My Leave Blanace</h1>
        <br>
        <table  id="table">
            <tr style=" background-color: rgb(105, 111, 255); ">
                <th style="text-align:left">Leave Type</th>
                <th>All Leave</th>
                <th>Apply Leave</th>
                <th>Approved Leave</th>
                <th>Avilable Leave</th>
            </tr>
            <?php
                    include '../../DataBase/contodb.php';
                    
                    if (isset($_COOKIE['username'])) {
                        $username = $_COOKIE['username'];
                        $userId;
                        $sql1 = "SELECT UserId FROM user WHERE userName = ? ";
                        $stmt1 = $conn1->prepare($sql1);
                        $stmt1->bind_param("s", $username);
                        $stmt1->execute();
                        $stmt1->bind_result($userId);
                        $stmt1->fetch();
                        $stmt1->close();

                        $sql2 = "SELECT COUNT(*) FROM approve WHERE UserId = ? AND Reason = 'Half Day'";
                        $stmt2 = $conn1->prepare($sql2);
                        $stmt2->bind_param("s", $userId);
                        $stmt2->execute();
                        $stmt2->bind_result($AnnualCount11); // Fix the variable name here
                        $stmt2->fetch();
                        $stmt2->close();
                
                        $sql2 = "SELECT COUNT(*) FROM leaveapply WHERE UserId = ? AND Reason = 'Half Day'";
                        $stmt2 = $conn1->prepare($sql2);
                        $stmt2->bind_param("s", $userId);
                        $stmt2->execute();
                        $stmt2->bind_result($applycount11); // Fix the variable name here
                        $stmt2->fetch();
                        $stmt2->close();
                        // $AnualCount=1;
                        // Assuming $userId is retrieved successfully, now retrieve data specific to this user
                        $sql2 = "SELECT COUNT(*) FROM approve WHERE UserId = ? AND Reason = 'Annual leave'";
                        $stmt2 = $conn1->prepare($sql2);
                        $stmt2->bind_param("s", $userId);
                        $stmt2->execute();
                        $stmt2->bind_result($AnnualCount); // Fix the variable name here
                        $stmt2->fetch();
                        $stmt2->close();

                        $sql2 = "SELECT COUNT(*) FROM leaveapply WHERE UserId = ? AND Reason = 'Annual leave'";
                        $stmt2 = $conn1->prepare($sql2);
                        $stmt2->bind_param("s", $userId);
                        $stmt2->execute();
                        $stmt2->bind_result($applycount); // Fix the variable name here
                        $stmt2->fetch();
                        $stmt2->close();
                        

                    $ID = 'Annual Leave';
                    $inTime = '14';
                    $AnualCount1 = $AnnualCount;      
                    $outTime = $applycount;
                    $availabale = 14-$AnnualCount;
                    echo '<tr>';
                        echo '<td style="text-align:left">'.$ID.'</td>';
                        echo '<td>'.$inTime.'</td>';
                        echo '<td>'.$outTime.'</td>';
                        echo '<td>'.$AnualCount1.'</td>';
                        echo '<td>'.$availabale.'</td>';
                    echo '</tr>';

                    $sql2 = "SELECT COUNT(*) FROM approve WHERE UserId = ? AND Reason = 'Casual leave'";
                    $stmt2 = $conn1->prepare($sql2);
                    $stmt2->bind_param("s", $userId);
                    $stmt2->execute();
                    $stmt2->bind_result($AnnualCount); // Fix the variable name here
                    $stmt2->fetch();
                    $stmt2->close();

                    $sql2 = "SELECT COUNT(*) FROM leaveapply WHERE UserId = ? AND Reason = 'Casual leave'";
                    $stmt2 = $conn1->prepare($sql2);
                    $stmt2->bind_param("s", $userId);
                    $stmt2->execute();
                    $stmt2->bind_result($applycount); // Fix the variable name here
                    $stmt2->fetch();
                    $stmt2->close();
                    

                $ID = 'Casual Leave';
                $inTime = '7';
                $AnualCount1 = $AnnualCount;      
                $outTime = $applycount;
                $availabale = 7-($AnnualCount +$AnnualCount11);
                echo '<tr>';
                    echo '<td style="text-align:left">'.$ID.'</td>';
                    echo '<td>'.$inTime.'</td>';
                    echo '<td>'.$outTime.'</td>';
                    echo '<td>'.$AnualCount1.'</td>';
                    echo '<td>'.$availabale.'</td>';
                echo '</tr>';

                $sql2 = "SELECT COUNT(*) FROM approve WHERE UserId = ? AND  Reason = 'Medical leave';";
                $stmt2 = $conn1->prepare($sql2);
                $stmt2->bind_param("s", $userId);
                $stmt2->execute();
                $stmt2->bind_result($AnnualCount); // Fix the variable name here
                $stmt2->fetch();
                $stmt2->close();

                $sql2 = "SELECT COUNT(*) FROM leaveapply WHERE UserId = ? AND Reason = 'Medical leave'";
                $stmt2 = $conn1->prepare($sql2);
                $stmt2->bind_param("s", $userId);
                $stmt2->execute();
                $stmt2->bind_result($applycount); // Fix the variable name here
                $stmt2->fetch();
                $stmt2->close();
                

            $ID = 'Meidical Leave';
            $inTime = '7';
            $AnualCount1 = $AnnualCount;      
            $outTime = $applycount;
            $availabale = 7-$AnnualCount;
            echo '<tr>';
                echo '<td style="text-align:left">'.$ID.'</td>';
                echo '<td>'.$inTime.'</td>';
                echo '<td>'.$outTime.'</td>';
                echo '<td>'.$AnualCount1.'</td>';
                echo '<td>'.$availabale.'</td>';
            echo '</tr>';

            $sql2 = "SELECT COUNT(*) FROM approve WHERE UserId = ? AND Reason = 'Work from home'";
            $stmt2 = $conn1->prepare($sql2);
            $stmt2->bind_param("s", $userId);
            $stmt2->execute();
            $stmt2->bind_result($AnnualCount); // Fix the variable name here
            $stmt2->fetch();
            $stmt2->close();

            $sql2 = "SELECT COUNT(*) FROM leaveapply WHERE UserId = ? AND Reason = 'Work from home'";
            $stmt2 = $conn1->prepare($sql2);
            $stmt2->bind_param("s", $userId);
            $stmt2->execute();
            $stmt2->bind_result($applycount); // Fix the variable name here
            $stmt2->fetch();
            $stmt2->close();
            

        $ID = 'Work From Home';
        $inTime = '';
        $AnualCount1 = $AnnualCount;      
        $outTime = $applycount;
        $availabale = '';
        echo '<tr>';
            echo '<td style="text-align:left">'.$ID.'</td>';
            echo '<td>'.$inTime.'</td>';
            echo '<td>'.$outTime.'</td>';
            echo '<td>'.$AnualCount1.'</td>';
            echo '<td>'.$availabale.'</td>';
        echo '</tr>';


                    $ID = 'Half day';
                    $uname = '(same as casual)';
                    $inTime = $AnnualCount11;
                    $outTime = $applycount11;
                    $status = '(same as casual)';
                    echo '<tr>';
                        echo '<td style="text-align:left">'.$ID.'</td>';
                        echo '<td>'.$uname.'</td>';
                        echo '<td>'.$outTime.'</td>';
                        echo '<td>'.$inTime.'</td>';
                        echo '<td>'.$status.'</td>';
                    echo '</tr>';
                }
            ?>
        </table>
</div>