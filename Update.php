<?php
require_once('database.php'); 

if ($conn === false) {
    die("Connection error");
}

if (isset($_GET['booking_id'])) {
    $id = $_GET['booking_id'];

    
    $sql = "SELECT * FROM bookings WHERE booking_id ='$id'";
    $result = mysqli_query($conn, $sql);
    $info = $result->fetch_assoc();
    
} else {
    
}

if (isset($_POST['save'])) {
    $therapist = $_POST['therapist'];
    $date = $_POST['date'];
    $time = $_POST['time'];

    $check = "UPDATE bookings 
              SET therapist_name ='$therapist', 
                  appointment_date ='$date', 
                  appointment_time='$time' 
              WHERE booking_id='$id'";

    
    $result2 = mysqli_query($conn ,$check);

    if ($result2) {
        header("Location:Update.php");
    } else {
        echo "Error: " . mysqli_error($conn);
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
      

      <form class="data" method="POST" action="#">
    <label for="therapist">Therapist Name:</label>
    <select id="therapist" name="therapist" class="therapist-select">
        <option value="">Select a Therapist</option>
        <option value="therapist1">Therapist1</option>
        <option value="therapist2" >Therapist 2</option>
        <option value="therapist3" >Therapist 3</option>
        <option value="therapist4" >Therapist 4</option>
        <option value="therapist5" >Therapist 5</option>
</select>
          <div>
                <label for="date">Appointment Date</label>
                <input type="date" id="date" name="date" required class="therapist-select" value="<?php echo "{$info['appointment_date']}" ;?>">
            </div>

            <div>
    <label for="time">Appointment Time</label>
    <select id="time" name="time" required class="therapist-select">
        <option value="">Select a Time Slot</option>
        <option value="09:00">09:00 AM</option>
        <option value="09:30">09:30 10:00 AM</option>
        <option value="10:00">10:00 AM - 10:30 AM</option>
        <option value="10:30">10:30 AM - 11:00 AM</option>
        <option value="11:00">11:00 AM - 11:30 AM</option>
        <option value="11:30">11:30 AM - 12:00 PM</option>
        <option value="14:00">02:00 PM - 02:30 PM</option>
        <option value="14:30">02:30 PM - 03:00 PM</option>
        <option value="15:00">03:00 PM - 03:30 PM</option>
        <option value="15:30">03:30 PM - 04:00 PM</option>
    </select>
</div>
            
        

            <div>
                <button type="submit" class="sv btn btn-primary" name="save">Save</button>
            </div>
</form>
    </center>
</div>



</body>
</html>
