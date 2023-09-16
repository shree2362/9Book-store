<?php
session_start();
include('db.php');
$email = mysqli_real_escape_string($conn,$_POST['email']);
$name = mysqli_real_escape_string($conn,$_POST['name']);
$address = mysqli_real_escape_string($conn,$_POST['address']);
$city = mysqli_real_escape_string($conn,$_POST['city']);
$state = mysqli_real_escape_string($conn,$_POST['state']);
$pin = mysqli_real_escape_string($conn,$_POST['pin']);
$tel = mysqli_real_escape_string($conn,$_POST['tel']);

$session=session_id();

$query="INSERT INTO store_orders (order_date,order_name,order_address,order_city,order_state,order_zip,order_mob,order_email,item_total,
	     shipping_total,authorization,status) VALUES (now(),NULL,'".$address."','".$city."','".$state."','".$pin."','".$tel."','".$email."',0.00,0.00,'auth','pending') ";

  mysqli_query($conn,$query);

$order_id=mysqli_insert_id($conn);
$query="INSERT INTO ordered_items (order_id,sel_item_id,sel_item_qty) SELECT '".$order_id."',item_id,item_qty FROM shopper_track WHERE 
            session_id='".$session."' ";

     $res=mysqli_query($conn,$query);
     
     $query='DELETE FROM shopper_track WHERE session_id="'.$session.'"';
     mysqli_query($conn,$query);

     $query="SELECT SUM(sel_item_qty*book_price) AS item_total FROM ordered_items d JOIN book_details p ON d.sel_item_id=p.id WHERE order_id='".$order_id."' ";
    $result= mysqli_query($conn,$query);
    
     $row = mysqli_fetch_assoc($result);
     extract($row);

     $item_tot=$item_total;

     $query="UPDATE store_orders SET item_total='".$item_tot."',shipping_total='".$item_tot."' WHERE id='".$order_id."' ";

     $result=mysqli_query($conn,$query);
     if (!$result) {
        echo 'MySQL Error: ' . mysqli_error($conn);
        exit;
    }
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
<div class="main" style="padding-left:0px">
<div class="breadcrumb flat">
	<a href="checkout.php" > Email</a>
	<a href="checkout2.php">Delivery Address</a>
	<a href="#">Order Summary</a>
	<a href="#" class="active">Payment Method</a>
</div>
<div class="chk-paym">
    <ul>
	    <li><a href="#">Credit Card</a></li>
		<li><a href="#">Debit Card</a></li>
		<li><a href="#">Net Banking</a></li>
		<li><a href="#">COD</a></li>
	</ul>
  </div>

</div>
</body>
</html>