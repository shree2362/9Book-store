<?php
session_start();
include('db.php');

if(!isset($_SESSION['user']))
{
 header("Location: login.php");
}
$res=mysqli_query($conn,"SELECT * FROM users WHERE id='".$_SESSION['user']."' ");
$userRow=mysqli_fetch_array($res);
?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="checkout.css">
</head>
<body>
	<header>
		<div class="wrapper">
			<h1><a href="categories.php"><img src="images/book.ico"/>9BOOKS</a></h1>
		</div></header>
<div class="main">
<div class="breadcrumb flat">
	<a href="checkout.php" class="active">Email</a>
	<a href="checkout2.php">Delivery Address</a>
	<a href="#">Order Summary</a>
	<a href="#">Payment Method</a>
</div>

<form method="post" action="checkout2.php">

    <label for="mail">Enter Email Address</label></br>
	<input type="email"  calss="tex" id="mail" name="email" ><br>
	<input type="submit" class="myButton2" value="Continue">
	</form>

</div>
</body>
</html>