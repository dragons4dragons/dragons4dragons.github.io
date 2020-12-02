<?php
define('DB_NAME','dragons4dragons');
define('DB_USER','root');
define('DB_PASSWORD','');
define('DB_HOST','localhost');

function sqlConnect(){
    $conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD);
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_error($conn));
    }

    $db_selected = mysqli_select_db($conn, DB_NAME);

    if (!$db_selected) {
        die('Can\'t use ' . DB_NAME . ': ' . mysqli_error($conn));
    }
    return $conn;
}

function sqlConn(){
    $conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD);
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_error($conn));
    }
    return $conn;
}

function sqlConnectDB($dub){
    $conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD);
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_error($conn));
    }
    define('DB_NAME2',$dub);
    $db_selected = mysqli_select_db($conn, DB_NAME2);

    if (!$db_selected) {
        die('Can\'t use ' . DB_NAME2 . ': ' . mysqli_error($conn));
    }
    return $conn;
}

?>