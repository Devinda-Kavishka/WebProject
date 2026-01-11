<?php

require_once('database.php'); 


if($conn===false)
{
	die("connection error");
}

if (isset($_POST['submit'])) {

    $data_name=$_POST['name'];
    $data_surname=$_POST['surname'];
    $data_email=$_POST['email'];
    $data_message=$_POST['message'];



    $sql="INSERT INTO contact_us (Name,Surname,Email,Message) VALUES
    ('$data_name', '$data_surname','$data_email','$data_message')";

    $result=mysqli_query($conn,$sql);


    if($result){

       echo 'Data sent successfully';

        header("location:Home.php");
    }else{
        echo "Apply Failed";
    }




}












?>






















