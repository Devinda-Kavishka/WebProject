<?php

require 'database.php';

if($conn==false){

    die("connection error");
}

$sql ='select * from inquiries';

$result = mysqli_query ($conn,$sql);

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


<div style="margin-left:210px;">

<center>
<table style="margin-top: -570px;">

<tr>
<th style="border:1px solid black; padding:10px;">User Name</th>
<th style="border:1px solid black; padding:10px;">Message</th>
<th style="border:1px solid black; padding:10px;">Response</th>
<th style="border:1px solid black; padding:10px;">status</th>

</tr>

<?php while($info=$result->fetch_assoc()){
?>

<tr>
<td style="border:1px solid black; padding:15px;"><?php echo $info ['full_name'];?></td>
<td style="border:1px solid black; padding:15px;"><?php echo $info ['inquiry'];?></td>
<td style="border:1px solid black; padding:15px;"><?php echo $info ['Response'];?></td>
<td style="border:1px solid black; padding:15px;"><?php echo $info ['status'];?></td>
</tr>

<?php
}
?>


</table>
</center>

</div>

    
</body>
</html>
