<!DOCTYPE html>
<html lang="en">
<head>
    <?php include(__DIR__ . '/../../TitleOfWebPage/title.php'); ?>
    <link rel="stylesheet" type="text/css" href="/styleCSS/DirectorInterface/DirectorInterfaceStyle.php">
    <link rel="stylesheet" type="text/css" href="/styleCSS/systemAdminInterface/AddUserStyle.php">
    <link rel="stylesheet" type="text/css" href="/styleCSS/systemAdminInterface/AttendenceStyle.php">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" > -->
    <script src="    https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.6/jspdf.plugin.autotable.min.js"></script>
    <style>

    </style>
</head>
<body>
    <div class="div-header">
        <?php include 'DashBoard.php' ?>
    </div>
    <div class="div-Main-container">
    <a href="ApplyLeave.php" style="text-decoration: none;"><h4 style="margin-left:30px; margin-bottom:-10px;">Salary</h4></a>
        <div class="Main-Dashboard" style="text-align:center; width:90%; background-color: rgb(205, 215, 253);">
        <div style="background-color:none;width:100%; height:270px; margin-left:0px;">
        <h3 style="margin-left:-750px;">Emplyoee deteils</h3>
        <div style="background-color:blue;width:40%; height:10px; margin-left:5%; float:left;"  >


        <?php
        
        include '../../DataBase/contodb.php';

        // session_start();
        // Check if the cookie is set
        if (isset($_COOKIE['username'])) {
            $username = $_COOKIE['username'];

        }
        // $username ='EMP001';
        include '../../DataBase/contodb.php';

        $sql = "select * from user where username like '".$username."';";
        $stmt = $conn1->prepare($sql);
        $stmt->execute();
        $stmt->bind_result($userid,$fullName,$Email,$userName,$Position,$Nic,$Department,$Role,$x);
        $stmt->fetch();
        // echo $Count;
        $stmt->close();
        // $conn1->close();
        session_abort();
        
        
        echo'
            <div style=" background-color: rgb(182, 165, 255); width:40%; height:auto; float:left;"  >
                <h3 >Name</h3>
                <h3 >ID</h3>
                <h3 >Email</h3>
                <h3 >Nic</h3>
            </div>
            <div style="background-color:white; width:60%; height:auto; float:left;"  >
                <h3>'.$fullName.'</h3>
                <h3 >'.$userid.'</h3>
                <h3 >'.$Email.'</h3>
                <h3 >'.$Nic.'</h3>
            </div>
        </div>

        <div style="background-color:blue;width:40%; height:10px; margin-left:5%; float:left;"  >
            <div style="background-color: rgb(182, 165, 255); width:40%; height:auto; float:left;"  >
                <h3 >Department</h3>
                <h3 >Designation</h3>

            </div>
            <div style="background-color:white; width:60%; height:auto; float:left;"  >
                <h3 >'.$Department.'</h3>
                <h3 >'.$Position.'</h3>
            </div>
        </div>

        </div>

        <div style="background-color:none;width:100%; height:370px; margin-left:0px;">
        <!-- <div class="Main-Dashboard" style="text-align:center; width:90%; background-color: rgb(205, 215, 253);"> -->
            <!-- <h1>Approve Emplyoee Leave </h1> -->
            <table  id="table" style="width:40%; float:left;">
                <tr style=" background-color: rgb(105, 111, 255); ">
                    <th>Earning</th>
                    <th>Value</th>
                    
                </tr>
                '?>
            <?php

                            include '../../DataBase/contodb.php';

                            // session_start();
                            // Check if the cookie is set
                            if (isset($_COOKIE['username'])) {
                                $username = $_COOKIE['username'];

                            }
                            // $username ='EMP001';
                            include '../../DataBase/contodb.php';

                            $sql = "select fullName,userid from user where username like '".$username."';";
                            $stmt = $conn1->prepare($sql);
                            $stmt->execute();
                            $stmt->bind_result($Count,$id);
                            $stmt->fetch();
                            // echo $Count;
                            $stmt->close();
                            // $conn1->close();
                            session_abort();

                            $sql = "select * from financedetils where userid like '".$id."';";
                            $stmt = $conn1->prepare($sql);
                            $stmt->execute();
                            $stmt->bind_result($Count1,$userid,$tax,$epf,$etf,$basicsalary,$ta,$ma);
                            $stmt->fetch();
                            // echo $Count;
                            $stmt->close();

                            echo '<tr>';
                            echo '<td>Basic Salary</td>';
                            echo '<td><input type="text" style="width: 90%; border: 2px solid black; margin-top:0px "  value="Rs'.$basicsalary.'.00" disabled> </td>'; 
                            echo '</tr>';
                            // echo '<tr>';




                            $sql = "SELECT 
                            sum(
                            HOUR(
                            TIMEDIFF(
                                CASE WHEN timeout < '17:00:00' THEN '17:00:00' ELSE timeout END, 
                        '17:00:00')
                            )) AS working_hours
                        FROM 
                            worktime
                        WHERE 
                            timein <= '17:00:00' and empid=?;";
                            $stmt = $conn1->prepare($sql);
                            $stmt->bind_param("s",$Count);
                            $stmt->execute();
                            // $error = "Data updated Successfully";

                            // $sql2 = "UPDATE financedetils SET Tax = ?, Epf = ?, Etf = ?, BasicSalary = ?, TravalAllownace = ?, MedicalAllawance = ? WHERE UserId = ?";
                            // $stmt = $conn1->prepare($sql2);
                            $stmt->bind_param("s", $house);
                            $stmt->execute();
                            $value = $house * 200;
                            // echo '<td>Over Time Pay</td>';
                            // echo '<td><input type="text" style="width: 90%; border: 2px solid black;margin-top:0px " value=Rs'.$value.'.00 disabled></td>'; 
                            // echo '</tr>';
                            echo '<tr>';
                            echo '<td>Bonus</td>';
                            echo '<td><input type="text" style="width: 90%; border: 2px solid black;margin-top:0px " value="" disabled></td>'; 
                            echo '</tr>';
                            echo '<tr>';
                            echo '<td>Travelling Allowance</td>';
                            echo '<td><input type="text" style="width: 90%; border: 2px solid black;margin-top:0px " value="Rs'.$ta.'.00" disabled></td>'; 
                            echo '</tr>';
                            echo '<tr>';
                            echo '<td>Medical Allowance</td>';
                            echo '<td><input type="text" style="width: 90%; border: 2px solid black;margin-top:0px " value="Rs'.$ma.'.00" disabled></td>'; 
                            echo '</tr>';
     
            ?>
            </table>
            <table  id="table" style="width:40%; float:left;">
                <tr style=" background-color: rgb(105, 111, 255); ">
                    <th>Deduction</th>
                    <th>Value</th>
                    
                </tr>
            <?php

                echo '<tr>';
                echo '<td>EPF Contibution</td>';
                echo '<td><input type="text" style="width: 90%; border: 2px solid black; margin-top:0px "  value="Rs'.$epf.'.00" disabled> </td>'; 
                echo '</tr>';
                echo '<tr>';
                echo '<td>ETF Contibution</td>';
                echo '<td><input type="text" style="width: 90%; border: 2px solid black;margin-top:0px " value="Rs'.$etf.'.00" disabled></td>'; 
                echo '</tr>';
                echo '<tr>';
                echo '<td>Tax</td>';
                echo '<td><input type="text" style="width: 90%; border: 2px solid black;margin-top:0px " value="Rs'.$tax.'.00" disabled></td>'; 
                echo '</tr>';
     
            echo'
            </table>
            </div>
            <div style="background-color:none;width:100%; height:370px; margin-left:0px;">   
                
                <div style=" background-color:none;width:40%; margin-left:-480px ;float:left">
                    <h3 >Gross Salary : RS'.$basicsalary+$value+$ta+$ma.'.00</h3>
                </div>
                <div style="width:40%; margin-top:0px ; float:left">
                    <h3 >Total deductions : RS.'.$epf+$etf+$tax.'.00</h3>
                    <h3 style="margin-left:-40px">Net Salary :   RS'.$basicsalary+$value+$ta+$ma-($epf+$etf+$tax).'.00</h3>
                </div>
                <a href="../../x.php"> <button>View Pdf</button> </a>
             <!-- <button type="button" onclick="exportPdf()" class="btn btn-primary">Export To PDF</button>  -->
             <!-- <button type="button" onclick="exportPdf()" class="btn btn-primary">Export To PDF</button>  -->
             </div>
'?>
    </div>
    </div>

    <script>
         function exportPdf(){
            var pdf = new jsPDF();
            pdf.text(12,20,"Attendence Report");
            pdf.autoTable({html:'#table',
                startY: 25,
                theme:'grid',
                columnStyles:{
                    0:{cellWidth:20},
                    1:{cellWidth:20},
                    2:{cellWidth:30},
                    3:{cellWidth:30},
                    4:{cellWidth:30}
                },
                bodyStyles: {lineColor: [1, 1, 1]},
                styles:{minCellHeight:5}
            });
            window.open(URL.createObjectURL(pdf.output("blob")))
         }
    </script>
    <script>
        <?php include '../../Scripts/navigationBarScript.php/navigationbarScript.php' ?>
    </script>
    <script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script>
</body>
</html>
