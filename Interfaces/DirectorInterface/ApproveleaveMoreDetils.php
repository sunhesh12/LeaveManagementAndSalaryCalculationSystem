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
            <img src="../../Interfaces/SystemAdminInterface/images/nullProfileIcon.png" alt="icon" style="width:10%;height:10%;">
            <h2>Kavindi Fernando</h2>
            <p>Kavindi123@gmail.com</p>
            <table id="table" style="Width:60%; margin-left:20%;">
                <tr>
                    <td>Leave Type</td>
                    <td>Annual Leave</td>
                </tr>
                <tr>
                    <td>Period</td>
                    <td>Half Day</td>
                </tr>
                <tr>
                    <td>Date</td>
                    <td>03/04/2024</td>
                </tr>
                <tr>
                    <td>Time</td>
                    <td>11:26</td>
                </tr>
                <tr>
                    <td>comment</td>
                    <td>i am feeling not well</td>
                </tr>
            </table>
            <a href="/Interfaces/DirectorInterface/ApproveLeave.php"><button>Back</button></a>
        </div>
    </div>
    <!-- <script>
         function exportPdf(){
            var pdf = new jsPDF();
            pdf.text(12,20,"Attendence Report");
            pdf.autoTable({html:'#table',
                startY: 25,
                theme:'grid',
                columnStyles:{
                    0:{cellWidth:20},
                    1:{cellWidth:20}
                },
                bodyStyles: {lineColor: [1, 1, 1]},
                styles:{minCellHeight:5}
            });
            window.open(URL.createObjectURL(pdf.output("blob")))
         }
    </script> -->
    <script>
        <?php include '../../Scripts/navigationBarScript.php/navigationbarScript.php' ?>
    </script>
    <script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script>
</body>
</html>
