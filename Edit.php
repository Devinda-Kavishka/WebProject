<?php
require 'database.php';

if ($conn === false) {
    die('Connection error');
}

if (isset($_GET['id']) && isset($_GET['type'])) {
    $id = $_GET['id'];
    $type = $_GET['type'];


    if ($type !== 'user' && $type !== 'Therapist') {
        die('Invalid type');
    }

    $sql = "SELECT * FROM signup WHERE id='$id' AND usertype='$type'";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $info = $result->fetch_assoc();
    } else {
        die('Record not found');
    }
}


if (isset($_POST['update'])) {
    $name = $_POST['Username'];
    $email = $_POST['email'];
    $contact = $_POST['Contact'];
    $pass = $_POST['password'];
    $usertype = $_POST['usertype']; 
    $id = $_POST['id'];

    // Update query
    $update = "UPDATE signup SET username='$name', email='$email', contact='$contact', password='$pass', usertype='$usertype' WHERE id='$id'";
    $result2 = mysqli_query($conn, $update);

    if ($result2) {
        echo 'Update Successfully';
    } else {
        echo 'Error: ' . mysqli_error($conn);
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign-Up Form</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body background="./image/nature.webp" style="background-size:cover; align-items:center;">
    <div style="position:absolute; top:0; left:0; width:100%; height:100%; background:url('stars-bg.jpg') no-repeat center center fixed; background-size:cover;">
        <div style="width:100%; height:100%; background:rgba(0, 0, 0, 0.5);"></div>
    </div>

   
  <center>
 <h1 class="topic">Sign-Up</h1>
</center>

<center>
<div class="Signup">
  

<form action="#" method="post">


        <label for="Username"class="label">Username</label>
        <input type="text" name="Username" placeholder="Username"class="input-area" value="<?php echo $info['username']; ?>">

        <label for="email" class="label">Email</label>
        <input type="email" name="email" placeholder="email" class="input-area" value="<?php echo $info['email']; ?>">

        <label for="email" class="label">Contact No</label>
        <input type="Contact" name="Contact" placeholder="Contact" class="input-area" value="<?php echo $info['contact']; ?>">

        <label for="Password"class="label">Password</label>
        <input type="text" name="password" placeholder="password" class="input-area"value="<?php echo $info['password']; ?>">

        <button type="submit" id="btn1" name="update">Update</button>
         </center>

         
    </form>
   
</div>







    
</body>
</html>

