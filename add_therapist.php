<?php
require 'database.php';

if ($conn === false) {
    die('Connection error');
}

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    $password = $_POST['password'];
    $usertype = $_POST['usertype']; 

    $check = "SELECT * FROM signup WHERE email='$email'";
    $result = mysqli_query($conn, $check);

    if (mysqli_num_rows($result) > 0) {
        echo "This email is already registered.";
    } else {
        $insert = "INSERT INTO signup (username, email, contact, password, usertype) 
                   VALUES ('$username', '$email', '$contact', '$password', '$usertype')";
        if (mysqli_query($conn, $insert)) {
            header("Location:add_therapist.php");
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
        <link rel="stylesheet" type="text/css" href="style.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" 
integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>

<?php include 'Admin_header.php'; ?>
<?php include 'Admin_Sidebar.php'; ?>


<div class="content">


<center>
<h2 style="margin-top: 10px;">Register New Therapist</h2>
<form action="add_therapist.php" method="POST" style="background-color:  #007a4d;; width:450px; height:420px; margin-top:10px; padding:10px;">
    <label>Username:</label>
    <input type="text" name="username" required style="border: 1px solid #000; padding: 6px; width:300px; border-radius: 10px;">

    <label>Email:</label>
    <input type="email" name="email" required  style="border: 1px solid #000; padding: 6px; width:300px; border-radius: 10px;">

    <label>Contact:</label>
    <input type="text" name="contact" required style="border: 1px solid #000; padding: 6px; width:300px; border-radius: 10px;" >

    <label>Password:</label>
    <input type="password" name="password" required style="border: 1px solid #000; padding: 6px; width:300px; border-radius: 10px;">

    <div>
    <input type="hidden" name="usertype" value="therapist">
    <button type="submit" name="submit" class="btn btn-primary">Register Therapist</button>
     </div>
</form>
</center>
</div>



    
</body>
</html>