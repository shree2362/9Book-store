<?php

//include('db.php');
$servername="localhost";
$username="root";
$pass="";
$dbname="9books";
$conn=mysqli_connect($servername,$username,$pass,$dbname) or die(mysqli_error($conn));



        $name = mysqli_real_escape_string($conn,$_POST['name']);

        $email = mysqli_real_escape_string($conn,$_POST['email']);
        $password = mysqli_real_escape_string($conn,$_POST['password']);

    $sql="SELECT email FROM users WHERE email='".$email."'";

    $result=mysqli_query($conn,$sql);

    $numResults = mysqli_num_rows($result);

  $en_password = md5($password);

 if($numResults >= 1)
 {
 	$message = "Email already exist!";
 }
 else
 {
 	 $sql="INSERT INTO users(Name,email,password) values('$name','$email','$en_password')";
 	 mysqli_query($conn,$sql);
 	 
            $message = "Signup Sucessfully!";
            header("Location: login.php");
 }


?>