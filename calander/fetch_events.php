<?php
include '../DataBase/contodb.php'; // Include your database connection file

$sql = "SELECT startDate as date FROM leaveApply"; // Modify your SQL query as needed
$result = $conn1->query($sql);
$events = array();

if ($result->num_rows > 0) {
    // Output data of each row
    while($row = $result->fetch_assoc()) {
        $events[] = $row;
    }
}

header('Content-Type: application/json');
echo json_encode($events);

// Close connection if needed
$conn1->close();
?>
