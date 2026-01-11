
<?php

require_once 'database.php';

if($conn==false){

    die('conneection error');
}



$sql = "SELECT * FROM signup WHERE usertype IN ('user', 'therapist')";

$result = mysqli_query($conn,$sql);


if($result){

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
<div style="margin-left:200px; margin-top:-550px;">

<table border="1px;">






<tr>
<th style="border:1px solid black; padding:20px;" >Username</th>
<th style="border:1px solid black; padding:20px; text-align: center;">Email</th>
<th style="border:1px solid black; padding:20px;">Contact No</th>
<th style="border:1px solid black; padding:20px;">Password</th>
<th style="border:1px solid black; padding:20px;">usertype</th>
<th style="border:1px solid black; padding:20px;">Update</th>


</tr>

<?php

while($info=$result->fetch_assoc()){

?>


<tr>

<td style="border:1px solid black; padding:20px;"><?php echo $info['username']; ?></td>
<td style="border:1px solid black; padding:20px;"><?php echo $info['email']; ?></td> 
<td style="border:1px solid black; padding:20px;"><?php echo $info['contact']; ?></td> 
<td style="border:1px solid black; padding:20px;"><?php echo $info['password']; ?></td>
<td style="border:1px solid black; padding:20px;"><?php echo $info['usertype']; ?></td>
<td style="border:1px solid black; padding:20px;">
   <a href="Edit.php?id=<?php echo $info['id']; ?>&type=<?php echo $info['usertype']; ?>" class="btn btn-primary">Edit</a>
</td>


</tr>

<?php

}

?>


</center>
</table>
</div>
    
</body>
</html>
