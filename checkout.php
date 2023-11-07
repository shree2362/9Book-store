<?php
session_start();
include('db.php');

if(!isset($_SESSION['user'])) {
    header("Location: login.php");
}

$res=mysqli_query($conn,"SELECT * FROM users WHERE id='".$_SESSION['user']."' ");
$userRow = mysqli_fetch_array($res);

if ($userRow) {
    $email = $userRow['email'];
} else {
    $email = "";
}

?>
<html>
<head>
<title>9BOOKS-Checkout</title>
<link rel="stylesheet" type="text/css" href="checkout.css">
</head>
<body>
	<header>
		<div class="wrapper">
			<h1><a href="categories.php?cat_id=1&cat_name=Pre-orders"><img src="images/book.ico"/>9BOOKS</a></h1>
		</div></header>
<div class="main">
<div class="breadcrumb flat">
	<a href="checkout.php" class="active">Email</a>
	<a>Delivery Address</a>
	<a>Order Summary</a>
	<a>Payment Method</a>
</div>

<form method="post" action="checkout2.php">
	
  <input type="email" class="tex" value= "<?php echo $email; ?>"  disabled name="email"><br>
  <input type="submit" class="myButton2" value="Continue">
</form>

</div>
</body>
</html>