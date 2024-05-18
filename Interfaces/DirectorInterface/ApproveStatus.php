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
        <div class="Div-subContainer" style=" display: block; text-align: center; ">
            <h1>My Attendence Report</h1>
            <br>
            <table  id="table">
                <tr style=" background-color: rgb(105, 111, 255); ">
                    <th>Leave Name</th>
                    <th>Period</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Comment</th>
                    <th>Status</th>
                    <th>Cancel</th>
                </tr>
                <?php
                    for($i=0;$i<30;$i++){
                        $ID = 'Annual Leave';
                        $uname = 'Half Day';
                        $inTime = '03/04/2024';
                        $outTime = '11:26';
                        $Comment = 'I am Feeling unwell';
                        $status = '';
                        // echo '<button>cancel</button>';

                        echo '<tr>';
                            echo '<td>'.$ID.'</td>';
                            echo '<td>'.$uname.'</td>';
                            echo '<td>'.$inTime.'</td>';
                            echo '<td>'.$outTime.'</td>';
                            echo '<td>'.$Comment.'</td>';
                            echo '<td>'.$status.'</td>';
                            echo '<td><button style="width:80%;">cancel</button></td>';
                        echo '</tr>';
                    }
                ?>
            </table>
        <button type="button" onclick="exportPdf()" class="btn btn-primary">Export To PDF</button>
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
                    1:{cellWidth:70},
                    2:{cellWidth:30},
                    3:{cellWidth:30},
                    4:{cellWidth:30},
                    5:{cellWidth:10},
                    6:{cellWidth:30}
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
