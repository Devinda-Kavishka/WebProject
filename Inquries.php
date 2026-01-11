<?php

require_once('database.php'); 


if($conn===false)
{
	die("connection error");
}

if (isset($_POST['submit'])) {

    $data_name=$_POST['name'];
    $data_email=$_POST['email'];
    $data_service=$_POST['service'];
    $data_inquiry=$_POST['Inquiry'];


    if(!filter_var($data_email, FILTER_VALIDATE_EMAIL)){
    echo 'not valid email';
}

   else{ 
    $sql="INSERT INTO inquiries (full_name,email,service,inquiry) VALUES
    ('$data_name','$data_email','$data_service','$data_inquiry')";

    $result=mysqli_query($conn,$sql);


    if($result){

       echo 'Data insert successfully';

        header("location:Inquries.php");
    }else{
        echo "Apply Failed";
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
    
<?php include 'Client_header.php'; ?>
<?php include 'Client_Sidebar.php'; ?>

<div class="content">

<center>
<form style="background-color:#007a4d; width:450px; height:550px; margin-top:10px; margin-left:300px;" action="Inquries.php" method="POST">

<div>
  <label for="name" style="text-align: center; margin-top:25px; padding:18px;">Full Name</label>
  <input type="text" id="name" name="name" required style="border: 1px solid #000; padding: 6px; width:300px; border-radius: 10px;">
</div>

<div>
  <label for="Email" style="text-align: center; margin-top:15px;">Email</label>
  <input type="text" id="email" name="email" required style="border: 1px solid #000; padding: 6px; width:300px; border-radius: 10px;">
</div>

<div>
 <label for="service"style="text-align: center; margin-top:15px;">Therapy / Service</label>
<select name="service" required style="border: 1px solid #000; padding: 6px; width:300px; border-radius: 10px;">
<option value="">-- Select a Service --</option>
<option value="Yoga">Yoga Sessions</option>
<option value="Meditation">Meditation Sessions</option>
<option value="Fitness">Fitness Training</option>
<option value="Counseling">Counseling</option>
</select>
 
</div>


<div>
  <label for="Inquiry" style="text-align: center; margin-top:15px;">Inquery</label>
  <textarea type="text-area" id="name" name="Inquiry" required style="border: 1px solid #000; padding: 6px; width:300px; border-radius: 10px;"></textarea>
</div>

<div>
<button style="width:300px; background-color:blue; color:white; height:50px; border-radius:10px;" name="submit">Submit</button>
</div>


</form>
</center>

</div>


</body>
</html>
