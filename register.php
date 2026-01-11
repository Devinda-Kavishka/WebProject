<?php
require_once('database.php'); 

if ($conn === false) {
    die("Connection error: " . mysqli_connect_error());
}

if (isset($_POST['register'])) {

    $data_name    = $_POST['name'];
    $data_email   = $_POST['email'];
    $data_service = $_POST['service'];
    $data_contact = $_POST['contact'];

    

    $sql = "INSERT INTO service_register (full_name, email,contact,service) 
            VALUES ('$data_name', '$data_email','$data_contact','$data_service')";

    $result = mysqli_query($conn, $sql);

    if ($result) {

        echo 'Registration successfully for wellness programs';
        header("Location: register.php");
        exit;
    } else {
        echo "Apply Failed: " . mysqli_error($conn);
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register_Form</title>
     <link rel="stylesheet" type="text/css" href="style.css">
 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" 
 integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>

<?php include 'Client_header.php'; ?>
<?php include 'Client_Sidebar.php'; ?>


<div class="content">


<center>
<form style="background-color: #007a4d; width:450px; height:500px; padding:35px; margin-top:25px; margin-left:30%;" action="register.php" method="POST">

<div>
<label for="name">FullName</label>
<input type="text" name="name" placeholder="Enter Your FullName" required style="border: 1px solid #000; padding:6px; width:300px; border-radius: 10px;">
</div>

<div>
<label for="email">Email</label>
<input type="text" name="email" placeholder="Enter Your Email" required style="border: 1px solid #000; padding: 6px; width:300px; border-radius: 10px;">
</div>

<div>
<label for="Contact">Contact No</label>
<input type="text" name="contact" placeholder="Enter Your contact no." required style="border: 1px solid #000; padding: 6px; width:300px; border-radius: 10px;">
</div>



<div>
 <label for="service"style="text-align: center; margin-top:15px;"> Service list</label>
<select name="service" required style="border: 1px solid #000; padding: 6px; width:300px; border-radius: 10px;">
<option value="">-- Select a Service --</option>
<option value="Yoga">Yoga Sessions</option>
<option value="Meditation">Meditation Sessions</option>
<option value="Fitness">Fitness Training</option>
<option value="Counseling">Counseling</option>
</select>
 </div>



<div>
<button style="padding:15px; margin-top:15px; width: 150px; border-radius:10px; background-color:blue; color:white;" name="register">Register</button>
</div>
</center>

</form>




</div>
    
</body>
</html>
