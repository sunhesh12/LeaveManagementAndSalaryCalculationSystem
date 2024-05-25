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
    <a href="DirectorAttendenceInterface.php" style="text-decoration: none;"><h4 style="margin-left:30px; margin-bottom:-10px;">Attendance</h4></a>
        <div class="Div-subContainer" style=" display: block; text-align: center; ">
            <h1>Attendence Report</h1>
            <br>
            <table  id="table">
                <tr style=" background-color: rgb(105, 111, 255); ">
                    <th>Date</th>
                    <th>Day</th>
                    <th>In</th>
                    <th>Out</th>
                    <th>Status</th>
                </tr>
                <?php


                        include '../../DataBase/contodb.php';
                        if (isset($_COOKIE['username'])) {
                            $username = $_COOKIE['username'];
                
                        }
                        $sql = "SELECT * FROM worktime where EmpId = 'EMP001'";
                        $result = $conn1->query($sql);
                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                        
                        // The date you want to get the day for
                        $date = $row['Date'];

                        // Convert the date string into a timestamp
                        $timestamp = strtotime($date);

                        // Get the day of the week
                        $dayOfWeek = date('l', $timestamp);


                        $inTime = $row['TimeIn'];
                        $outTime = $row['TimeOut'];
                        $status = $row['Status'];
                        echo '<tr>';
                            echo '<td>'.$date.'</td>';
                            echo '<td>'. $dayOfWeek.'</td>';
                            echo '<td>'.$inTime.'</td>';
                            echo '<td>'.$outTime.'</td>';
                            echo '<td>'.$status.'</td>';
                        echo '</tr>';
                    }
                }
                    
                ?>
            </table>
        <!-- <button type="button" onclick="exportPdf()" class="btn btn-primary">Export To PDF</button> -->
        </div>
    </div>
    <script>
         function exportPdf(){
            var pdf = new jsPDF();
            pdf.text(16,25,"Attendence Report");
            pdf.autoTable({html:'#table',
                startY: 30,
                theme:'grid',
                columnStyles:{
                    0:{cellWidth:20},
                    1:{cellWidth:70},
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
