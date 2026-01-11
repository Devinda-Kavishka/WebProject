<?php

session_start();

require_once('database.php'); 


if($conn===false)
{
	die("connection error");
}

if (isset($_POST['submit'])) {

    $Username=$_POST['Username'];
    $email=$_POST['email'];
    $contact=$_POST['Contact'];
    $password=$_POST['password'];

    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){

        echo 'This email is not valid so input valid email';
    }
elseif(strlen($password) < 6){

    echo 'Enter Valid password On input field';
    
}else{

     $check = "SELECT * FROM signup WHERE email='$email'";
     $checkr = mysqli_query($conn, $check);


    if(mysqli_num_rows($checkr)>0){

       
     echo 'This email is already taken.';

    }else{

  $sql="INSERT INTO signup (username,email, contact,password) VALUES
 ('$Username', '$email','$contact','$password')";
 $result=mysqli_query($conn,$sql);

 if($result){
  echo 'Registration Successfully.';

    } 

      
    }



}

    

}
?>

