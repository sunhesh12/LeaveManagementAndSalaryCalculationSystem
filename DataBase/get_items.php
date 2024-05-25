<?php
include 'contodb.php';
// header('Content-Type: application/json');

session_start();

$category = $_POST["category"];
$value = $_POST["value"];

if($category ==='Full Name')
{
    $category ='fullName';

}else if($category ==='Emplyoee Number')
{
    $category ='UserId';

}else if($category ==='User Name')
{
    $category = 'UserName';
}

echo $category;
echo $value;
// session_destroy();
$sql2 = "SELECT * FROM user WHERE $category LIKE ? LIMIT 1;";
$stmt = $conn1->prepare($sql2);
$stmt->bind_param("s", $value);
$value = '%' . $value . '%'; // Surround the value with '%' wildcards
$stmt->execute();
$stmt->bind_result($EmpNumber, $FullName ,$Email, $UserName , $Position, $Nic ,$Department , $Role , $password );
$stmt->fetch();
$stmt->close();

$sql2 = "SELECT Role_Name FROM Role where Role_Id = ?  limit 1;";
$stmt = $conn1->prepare($sql2);
$stmt->bind_param("s",$Role);
$stmt->execute();
$stmt->bind_result($Role);
$stmt->fetch();
$stmt->close();

// $_SESSION["empNum"] = $EmpNumber;
// $_SESSION["fullName"] = $FullName;
// $_SESSION["Position"] = $Role;

$_SESSION["dep-Select"] = $Department;
$_SESSION["Role-Select"] = $Role;
$_SESSION["email"] = $Email;
$_SESSION["empNum"] = $EmpNumber;
$_SESSION["fullName"] = $FullName;
$_SESSION["userName"] = $UserName;
$_SESSION["Password"] = $password;
$_SESSION["Position"] = $Position;
$_SESSION["nic"] = $Nic;

// echo $_SESSION["empNum"];
echo $EmpNumber;
// echo 'hello';


$conn1->close();

header("Location: ../Interfaces/SystemAdminInterface/SearchUser.php");

        

