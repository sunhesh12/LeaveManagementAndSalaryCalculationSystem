<?php

$leaveid = $_POST["leaveid"];
$error = "Do you want to delete your Request!";
$success = "Request delete SuccessFully.";
echo "<script>
    var response = confirm('$error');
    if (response == true) {
        // User clicked OK, redirect to a PHP script to handle account deletion
        var response = confirm('$success');
        window.location.href = 'directorAproveDelete.php?leaveid=$leaveid';

    } else {
        // User clicked Cancel or closed the dialog, redirect back to the Add User page
        window.location.href = '../Interfaces/DirectorInterface/ApproveStatus.php';
    }
</script>";



?>
