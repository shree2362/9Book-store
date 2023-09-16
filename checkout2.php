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
	<a href="checkout.php" >Email</a>
	<a href="checkout2.php" class="active">Delivery Address</a>
	<a href="ordersummary.php">Order Summary</a>
	<a href="#">Payment Method</a>
</div>

<form method="post" action="check_ordersummary.php">

    
    <div>
    	<p>Enter Shipping Address<p>
	<input type="text"   name="name" placeholder="Name" required >
	<input type="text"  name="address" style="height:100px;" placeholder="address" required>
	<input type="text"  name="city" placeholder="city" equired>
	<input type="text"  name="state" placeholder="state" required>
	<input type="text"  name="pin" placeholder="Pin Code" required>
	<input type="text"  name="country" disabled="disabled" value="Country: India" required>
	<p style="color:red">service available only in india</p>
	<input type="text"  name="tel" placeholder="Mobile No." required>
	<input type="hidden" name="email" value="<?php echo $_POST['email']; ?>">
	<input type="submit" name="submit" class="myButton2" value="Continue">
</div>
</form>
	

</div>
</body>
</html>