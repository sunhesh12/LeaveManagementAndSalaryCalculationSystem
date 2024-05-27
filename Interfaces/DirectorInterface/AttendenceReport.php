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
    <div class="Div-subContainer" style=" display: flex; text-align: center; ">
    <div style=" width:33%; height:100px; float:left;">
    <form method="post" action="">
        <select selected name="selectYear">
            <option value="">-Year-</option>
            <?php
                $curYear = date('Y'); 

                for($i=$curYear;$i<=$curYear +10;$i++){
                    echo '<option value ="'.$i.'">'.$i.'</option>';
                }
            ?>

        </select >
        </div> 
        <div style=" width:33%; height:100px;  float:left; margin-left:10px;">
        <select name="Month"  >
            <option value="" selected>-Month-</option>
            <option value="1">January</option>
            <option value="2">February</option>
            <option value="3">March</option>
            <option value="4">April</option>
            <option value="5">May</option>
            <option value="6">June</option>
            <option value="7">July</option>
            <option value="8">August</option>
            <option value="9">September</option>
            <option value="10">October</option>
            <option value="11">November</option>
            <option value="12">December</option>


        </select>
        </div>
        <div style=" width:33%; height:100px; float:left; margin-left:10px;">
        <select name="department">
            <option value="volvo">-Department-</option>
            <?php 
                // echo '<option value="-Select a department-">-Select a department-</option>';
                
                include '../../DataBase/contodb.php';
                

                $sql = "SELECT Department_name FROM department WHERE Department_id LIKE 'DEP%'";
                $result = $conn1->query($sql);

                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo '<option value="'.$row['Department_name'].'">'. $row['Department_name'] .'</option>'; 
                    }
                } else {
                    echo '<option value="">No departments found</option>';
                }

                $conn1->close();
            ?>
        </select>
        </div>
        <button type="submit" name="count_dates" >Veiw Report</button>
     </form>
    </div>
        <div class="Div-subContainer" style=" display: block; text-align: center; ">
            <h1>Emplyoee Attendence Report</h1>
            <br>
            <table  id="table">
                <tr style=" background-color: rgb(105, 111, 255); ">
                    <th>Emplyoee ID</th>
                    <th>Name</th>
                    <th>Total Days</th>
                    <th>Absent Days</th>
                    <th>Presnt Days</th>
                    <!-- <th>Action</th> -->
                    
                </tr>
                <?php
                    include '../../DataBase/contodb.php';
                    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['count_dates'])) {
                        $Department = $_POST["department"];
                        $year = $_POST["selectYear"];
                        $month = $_POST["Month"];
                        echo $month;
                        
                        
                        
                        $sql = "SELECT COUNT(DISTINCT date) FROM worktime WHERE MONTH(date) = MONTH(CURRENT_DATE()) AND YEAR(date) = YEAR(CURRENT_DATE());";
                        $stmt = $conn1->prepare($sql);
                        $stmt ->execute();
                        $stmt->bind_result($dayTotalCount);
                        $stmt->fetch();
                        $stmt->close();
    
                        
                        $sql = "SELECT w.empid AS empid, u.fullname AS fullName, COUNT(DISTINCT w.date) AS date_count
                        FROM worktime w
                        INNER JOIN user u ON w.empid = u.userid
                        INNER JOIN department d ON u.department = d.department_id
                        WHERE d.department_name LIKE ?
                        or MONTH(w.date) = ? or YEAR(w.date) = ?
                        GROUP BY w.empid, u.fullname; ";
                        $stmt = $conn1->prepare($sql);
                        $stmt->bind_param("sii",$Department,$month,$year );
                        $stmt->execute();
    
                        // Get the result
                        $result = $stmt->get_result();
                        //////////
                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                        
                        // The date you want to get the day for
                        $empid = $row['empid'];
    
    
    
                        $fullName = $row['fullName'];
                        $date_count = $row['date_count'];
                        $absent = $dayTotalCount-$date_count;
                        echo '<tr>';
                            echo '<td>'.$empid.'</td>';
                            echo '<td>'. $fullName.'</td>';
                            echo '<td>'.$dayTotalCount.'</td>';
                            echo '<td>'.$absent.'</td>';
                            echo '<td>'.$date_count.'</td>';
                        echo '</tr>';
                            }}
                    }else{
                        $sql = "SELECT COUNT(DISTINCT date) FROM worktime WHERE MONTH(date) = MONTH(CURRENT_DATE()) AND YEAR(date) = YEAR(CURRENT_DATE());";
                        $stmt = $conn1->prepare($sql);
                        $stmt ->execute();
                        $stmt->bind_result($dayTotalCount);
                        $stmt->fetch();
                        $stmt->close();
    
                        $sql = "SELECT  w.empid As empid ,u.fullname As fullName , COUNT(DISTINCT w.date) AS date_count
                        FROM worktime w
                        INNER JOIN user u ON w.empid = u.userid 
                        WHERE MONTH(date) = MONTH(CURRENT_DATE()) AND YEAR(date) = YEAR(CURRENT_DATE())
                        GROUP BY w.empid, u.fullname;";
                        $stmt = $conn1->prepare($sql);
                        $stmt->execute();
    
                        // Get the result
                        $result = $stmt->get_result();
                        //////////
                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                        
                        // The date you want to get the day for
                        $empid = $row['empid'];
    
    
    
                        $fullName = $row['fullName'];
                        $date_count = $row['date_count'];
                        $absent = $dayTotalCount-$date_count;
                        echo '<tr>';
                            echo '<td>'.$empid.'</td>';
                            echo '<td>'. $fullName.'</td>';
                            echo '<td>'.$dayTotalCount.'</td>';
                            echo '<td>'.$absent.'</td>';
                            echo '<td>'.$date_count.'</td>';
                        echo '</tr>';
                            }}
                    }


                ?>
            </table>
        <!-- <button type="button" onclick="exportPdf()" class="btn btn-primary">Export To PDF</button> -->
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
                    3:{cellWidth:10},
                    4:{cellWidth:50}
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