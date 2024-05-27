<?php 
include 'DataBase/contodb.php';

// if(isset($_POST["getUser"])) {
    $userId = $_POST["getUser"];
    
// echo $userId;
    // Prepare and execute the SQL query
    $sql2 = "INSERT INTO absent (UserID) VALUES (?)";
    $stmt = $conn1->prepare($sql2);
    
    // // // Bind parameters and execute the statement
    $stmt->bind_param("s", $userId);
    $stmt->execute();

    // // // Close the statement and database connection
    $stmt->close();
    $conn1->close();

    $error = "Leave Successfully! have a good day..";
    echo "<script>
    var response = confirm('$error');
    window.location.href = 'attend.php';
    </script>";
// } else {
//     echo "No user data received.";
// }
?>
