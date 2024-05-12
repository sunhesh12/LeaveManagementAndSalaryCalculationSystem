<?php
$server_name = "localhost";
$user_name = "root";
$password = "wakudabarnp123";
$database = "LMS";

$conn1 = new mysqli($server_name, $user_name, $password, $database);

if ($conn1->connect_error) {
    die("Connection error😒: " . $conn1->connect_error);
}
else{
    echo 'Connect successfully...👌😁😎';
}
?>