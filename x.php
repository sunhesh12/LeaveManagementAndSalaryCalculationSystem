<?php

session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Salary Report</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.6/jspdf.plugin.autotable.min.js"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        .report {
            border-collapse: collapse;
            width: 100%;
        }
        .report th, .report td {
            border: 1px solid #dddddd;
            padding: 8px;
            text-align: left;
        }
        .report th {
            background-color: #f2f2f2;
        }
        .button-container {
            text-align: center;
            margin-top: 20px;
        }
        .pdf-button {
            padding: 10px 20px;
            background-color: #007bff;
            color: #ffffff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
</head>
<body>

<?php
// Include database connection


if (isset($_COOKIE['username'])) {
    $username = $_COOKIE['username'];
}
include 'DataBase/contodb.php';
// $username ='EMP001';
// include '../../DataBase/contodb.php';

$sql = "select fullName,userid from user where username like '".$username."';";
$stmt = $conn1->prepare($sql);
$stmt->execute();
$stmt->bind_result($Count,$id);
$stmt->fetch();
// echo $Count;
$stmt->close();
// $conn1->close();
session_abort();
// Fetch data from the database
$sql = "SELECT * FROM financedetils WHERE userid = ? LIMIT 1";
$stmt = $conn1->prepare($sql);
$stmt->bind_param("s", $id); // Assuming $userid is the user ID
// $userid = $_COOKIE['username']; // Get the user ID from the cookie
$stmt->execute();
$stmt->bind_result($Count,$id,$tax,$epf,$etf,$basicsalary,$ta,$ma);
$stmt->fetch();

// Assign variables from the fetched row
// $basicsalary = $row['BasicSalary'];
// $value = $row['Value']; // Assuming this is the overtime pay
// $epf = $row['Epf'];
// $etf = $row['Etf'];
// $tax = $row['Tax'];
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

$stmt->close();
$conn1->close();

echo'
<div class="container">
    <div class="header">
        <h2>Employee Salary Report</h2>
        <h3>'.$Count.'</h3>
    </div>
    
    <table class="report">
        <tr>
            <th>Earning</th>
            <th>Value</th>
        </tr>
        <tr>
            <td>Basic Salary</td>
            <td><?php echo Rs'.$basicsalary.'.00; ?></td>
        </tr>
        <tr>
            <td>Over Time Pay</td>
            <td><?php echo Rs'.$value.'.00; ?></td>
        </tr>
        <!-- Add more earning items here -->
    </table>
    
    <table class="report">
        <tr>
            <th>Deduction</th>
            <th>Value</th>
        </tr>
        <tr>
            <td>EPF Contribution</td>
            <td><?php echo Rs'.$epf.'.00; ?></td>
        </tr>
        <tr>
            <td>ETF Contribution</td>
            <td><?php echo Rs'.$etf.'.00; ?></td>
        </tr>
        <!-- Add more deduction items here -->
    </table>
    
    <div class="summary">
        <h3>Gross Salary: <?php echo Rs'.($basicsalary+$value).'0; ?></h3>
        <h3>Total Deductions: <?php echo Rs'.($epf+$etf+$tax).'0; ?></h3>
        <h3>Net Salary: <?php echo Rs'.($basicsalary+$value-($epf+$etf+$tax)).'0; ?></h3>
    </div>
    
    <div class="button-container">
        <button class="pdf-button" onclick="exportPdf()">Export To PDF</button>
    </div>
</div>'
// }
?>
<script>
    function exportPdf() {
        var pdf = new jsPDF();
        pdf.text(12, 20, "Employee Salary Report");
        pdf.autoTable({html: '.report', startY: 25});
        pdf.text(12, pdf.lastAutoTable.finalY + 20, "Summary");
        pdf.text(12, pdf.lastAutoTable.finalY + 30, "Gross Salary: <?php echo 'Rs'.($basicsalary+$value).'0'; ?>");
        pdf.text(12, pdf.lastAutoTable.finalY + 40, "Total Deductions: <?php echo 'Rs'.($epf+$etf+$tax).'0'; ?>");
        pdf.text(12, pdf.lastAutoTable.finalY + 50, "Net Salary: <?php echo 'Rs'.($basicsalary+$value-($epf+$etf+$tax)).'0'; ?>");
        pdf.save("Employee_Salary_Report.pdf");
    }
</script>

</body>
</html>
