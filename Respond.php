<?php

require_once 'database.php';

if ($conn == false) {
    die("connection error");
}

$sql = "SELECT * FROM inquiries";
$result = mysqli_query($conn, $sql);

if (isset($_POST['respond'])) {

    $inquiry  = $_POST['inquiry_id']; 
    $response = $_POST['response'];   


    $check = "UPDATE inquiries 
              SET response = '$response', status = 'responded' 
              WHERE id = '$inquiry'";

    $result2 = mysqli_query($conn, $check);

    if ($result2) {
        header("Location:Respond.php");
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


<center>
<table border="1px solid black;" style="margin-top: -520px; margin-left:350px; margin-right: 90px;">

<tr>

<th style="border:1px solid black; padding:10px;">full_name</th>
<th style="border:1px solid black; padding:10px;">email</th>
<th style="border:1px solid black; padding:10px;">service</th>
<th style="border:1px solid black; padding:10px;">inquiry</th>
<th style="border:1px solid black; padding:10px;">status</th>
<th style="border:1px solid black; padding:10px;">Response</th>

</tr>

<?php while($info=$result->fetch_assoc()){
    
    ?>




<tr>

<td style="border:1px solid black; padding:10px;"><?php echo $info ['full_name'];?></td>
<td style="border:1px solid black; padding:10px;"><?php echo $info ['email'];?></td>
<td style="border:1px solid black; padding:10px;"><?php echo $info ['service'];?></td>
<td style="border:1px solid black; padding:10px;"><?php echo $info ['inquiry'];?></td>
<td style="border:1px solid black; padding:10px;"><?php echo $info ['status'];?></td>
<td style="border:1px solid black; padding:10px;">

<form method="POST">
<input type="hidden" name="inquiry_id" value="<?php echo $info['id'];?>">
<textarea name="response" placeholder="Write response" style="width:180px;"></textarea><br>
<button type="submit" name="respond" class="btn btn-primary">Send Response</button>
</form>

</td>




</tr>
<?php
}
?>




</table>

</center>
    
</body>
</html>
