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
            <h1>Leave Report</h1>
            <br>
            <table  id="table">
                <tr style=" background-color: rgb(105, 111, 255); ">
                    <th>User ID</th>
                    <th>User Name</th>
                    <th>Total leave</th>
                    <th>Annual</th>
                    <th>Sick</th>
                    <th>Casual</th>
                    <th>Total Takes</th>
                </tr>
                <?php
                    for($i=0;$i<10;$i++){
                        $ID = 'Emp001';
                        $uname = 'Kosala Gamage';
                        $Total = '35';
                        $Annual = '14';
                        $casual = '7';
                        $Sick = '14';
                        $TotalTakes = '0';
                        echo '<tr>';
                            echo '<td>'.$ID.'</td>';
                            echo '<td>'.$uname.'</td>';
                            echo '<td>'.$Total.'</td>';
                            echo '<td>'.$Annual.'</td>';
                            echo '<td>'.$casual.'</td>';
                            echo '<td>'.$Sick.'</td>';
                            echo '<td>'.$TotalTakes.'</td>';
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
            pdf.text(12,20,"Leave Report");
            pdf.autoTable({html:'#table',
                startY: 25,
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
