<?php

require_once('database.php'); 


if($conn===false)
{
	die("connection error");
}

     $sql = "SELECT * FROM bookings";

    $result=mysqli_query($conn,$sql);


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

<?php include 'Therapist_header.php'; ?>
<?php include 'Therapist_sidebar.php'; ?>


<div class="content1">

<center>
<table style="border: 1px solid black; border-collapse: collapse;">
  <tr>
    <th style="border: 1px solid black; padding: 10px; min-width: 100px;">Therapist Name</th>
    <th style="border: 1px solid black; padding: 10px; min-width: 200px;">Appointment Date</th>
    <th style="border: 1px solid black; padding: 10px; min-width: 120px;">Appointment Time</th>
     <th style="border: 1px solid black; padding: 10px; min-width: 120px;">Update</th>
  </tr>

  <?php
while($info=$result->fetch_assoc()){
?>



  <tr>
    <td style="border: 1px solid black; padding: 10px;"><?php echo "{$info['therapist_name']}" ;?></td>
    <td style="border: 1px solid black; padding: 10px;"><?php echo "{$info['appointment_date']}" ;?></td>
    <td style="border: 1px solid black; padding: 10px;"><?php echo "{$info['appointment_time']}" ;?></td>
    <td style="border: 1px solid black; padding: 10px;">
    <?php echo "<a href='Update.php?booking_id={$info['booking_id']}' class='btn btn-primary'>Edit </a>" ;?>
   </td>
  </tr>

  
 <?php
   }
 ?>






</table>




</center>

</div>


    
</body>
</html>

