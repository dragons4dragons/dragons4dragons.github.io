<?php
session_start();
require_once('functions.php');
// Create connection
$conn = sqlConnect();

$value = $_POST['username'];
$value2 = $_POST['psw'];

$sql = "SELECT * FROM users";

$result = $conn->query($sql);
$check = false;
$user = '0';

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        if ($value == $row["username"] && $value2 == $row["password"])
        {
            $user = $row["username"];
            $check = true;
        }
    }
}

if ($check == true)
{
    $_SESSION['user'] = $user;
    echo $_SESSION['user'];
}

if ($check == true)
{
    header('Location: documentation.php');
    exit;
}
header('Location: documentation.php');
exit;
?>