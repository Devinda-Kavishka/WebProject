<?php
require_once('database.php'); 

if ($conn === false) {
    die("Connection error");
}

if (isset($_POST['save'])) {
    $therapist = $_POST['therapist'];
    $date = $_POST['date'];
    $time = $_POST['time'];

    
    $check = "SELECT * FROM bookings 
              WHERE therapist_name='$therapist' 
              AND appointment_date='$date' 
              AND appointment_time='$time'";
    $result = mysqli_query($conn, $check);

    if (mysqli_num_rows($result) > 0) {
        echo "This time slot has already been reserved.";
    } else {
        $sql = "INSERT INTO bookings (therapist_name, appointment_date, appointment_time) 
                VALUES ('$therapist','$date','$time')";
        
        if (mysqli_query($conn, $sql)) {
            echo "Appointment booked successfully!";
            header("location:booking.php");

        } else {
            echo "Booking Failed: " . mysqli_error($conn);
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
        <form class="data" method="POST" action="booking.php">
            <label for="therapist">Therapist Name:</label>
            <select id="therapist" name="therapist" class="therapist-select" required>
                <option value="">Select a Therapist</option>
                <option value="therapist1">Therapist 1</option>
                <option value="therapist2">Therapist 2</option>
                <option value="therapist3">Therapist 3</option>
                <option value="therapist4">Therapist 4</option>
                <option value="therapist5">Therapist 5</option>
            </select>

            <div>
                <label for="date">Appointment Date</label>
                <input type="date" id="date" name="date" class="therapist-select"  required>
            </div>

            <div>
    <label for="time">Appointment Time</label>
    <select id="time" name="time"  class="therapist-select" required>
        <option value="">Select a Time Slot</option>
        <option value="09:00">09:00 AM - 09:30 AM</option>
        <option value="09:30">09:30 AM - 10:00 AM</option>
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
                <button type="submit" class="sv btn btn-primary" name="save">Booking Request</button>
            </div>
        </form>
    </center>
</div>





    
</body>
</html>


























