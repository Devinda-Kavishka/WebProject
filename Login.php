<?php
session_start(); 

require_once('database.php'); 


if ($conn ===false) {
    die("Connection error");
}

if (isset($_POST['submit'])) {

    $Username = $_POST['Username'];
    $Password = $_POST['Password'];

    if(empty($Username) || empty($Password)){
        echo 'username & password is required';
    }else{
    
    $sql = "SELECT * FROM signup WHERE username='$Username' AND password='$Password'";
    $result = mysqli_query($conn, $sql);

    if ($row = mysqli_fetch_assoc($result)) {
        $_SESSION['username'] = $row['username'];
        $_SESSION['usertype'] = $row['usertype'];

        if ($row['usertype'] == "user") {
            header("Location: Client_Dashboard.php");
        } elseif ($row['usertype'] == "Therapist") {
            header("Location: Therapist_Dashboard.php");
        } else {
            header("Location: Admin_Dashboard.php");
        }
        exit;
    } else {
        echo "Invalid Username or Password!";
    }
}
}
?>
