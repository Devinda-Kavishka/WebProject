<?php
$host = "localhost";
$user = "root";
$password = "";
$database = "healthmanagement";

$conn = new mysqli($host, $user, $password, $database);

if ($conn->connect_error) {
    die(" Database Connection failed: " . $conn->connect_error);
} else {
    //echo " Database Connected Successfully!";
}
?>
