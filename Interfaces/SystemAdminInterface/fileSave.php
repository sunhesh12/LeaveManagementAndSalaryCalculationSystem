<?php
// Check if file is uploaded
if(isset($_FILES['profilePic']) && $_FILES['profilePic']['error'] === UPLOAD_ERR_OK) {
    $file = $_FILES['profilePic'];
    
    // Specify the folder where you want to save the image
    $targetDir = 'profile';
    
    // Create the folder if it does not exist
    if (!file_exists($targetDir)) {
        mkdir($targetDir, 0777, true);
    }
    
    // Move the uploaded file to the target directory
    $targetFile = $targetDir . '/image123.png'; // Set filename
    move_uploaded_file($file['tmp_name'], $targetFile);
    
    echo 'Image saved successfully.';
} else {
    echo 'Error uploading image.';
}
?>