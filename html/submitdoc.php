<?php
session_start();
require_once('functions.php');
// Create connection
$conn = sqlConnect();

$value = $_POST['title'];
$value2 = $_POST['desc'];
$dataTime = $_POST['date'];
$value = addslashes($value);
$value2 = addslashes($value2);
$statusMsg = '';

//file upload path
$targetDir = "docs/";
$fileName = basename($_FILES["file"]["name"]);
$targetFilePath = $targetDir . $fileName;
$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

if(isset($_SESSION['user']) && isset($_POST['title']) && !empty($_FILES["file"]["name"])) {
    //allow certain file formats
    $allowTypes = array('jpg','png','jpeg','gif','pdf');
    if(in_array($fileType, $allowTypes)){
        //upload file to server
        if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){
            $statusMsg = "The file ".$value. " has been uploaded.";
            if(mysqli_query($conn, "INSERT into documentation (title, description, date, image) VALUES ('$value','$value2','$dataTime','$fileName')"))
            {
                echo "src added to the database! ";
            }
            else{
                echo "File upload failed, please try again." . mysqli_error($conn);
            }
        }else{
            $statusMsg = "Sorry, there was an error uploading your file.";
        }
    }else{
        $statusMsg = 'Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload.';
    }
}else{
    $statusMsg = 'Please select a file to upload.';
}

//display status message
echo $statusMsg;
?>