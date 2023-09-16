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
<style>
table, td, th {    
     padding: 8px;
    text-align: left;
    border-bottom: 1px solid #ddd;
    vertical-align:top;
    padding:0;
}

table {
    border-collapse: collapse;
    width: 100%;
}

th, td {
    padding: 15px;
}
</style>
</head>
<body>
	<header>
		<div class="wrapper">
			<h1><a href="categories.php"><img src="images/book.ico"/>9BOOKS</a></h1>
		</div></header>
<div class="main">
  <div class="breadcrumb flat">
	 <a href="checkout.php">Email</a>
	 <a href="checkout2.php">Delivery Address</a>
	 <a href="#" class="active">Order Summary</a>
	 <a href="#">Payment Method</a>
  </div>
  <?php
       $session=session_id();
       $query='SELECT t.item_id,item_qty,cat_id,book_title,book_price,book_desc FROM shopper_track t JOIN book_details p ON t.item_id=p.id
               WHERE session_id="'.$session.'" ORDER BY t.item_id ASC';
       $result=mysqli_query($conn,$query);
       $rows=mysqli_num_rows($result);
      if($rows==0)
        {echo 'Your shopping cart is empty';}
      if($rows>0)
       {
    ?>

     <table >
       <tr style="background:grey;">
          <th style="width:140px;">Item</th>
          <th></th>
          <th style="width:100px;">Price</th>
          <th style="width:100px;">Qty</th>
          <th style="width:150px;">Subtotal</th>
       </tr>
     <?php
        $total=0;
        $odd=true;
        while($row = mysqli_fetch_array($result)) {
          echo ($odd == true) ? '<tr style="background:#EEE;">' : '<tr style="background:#FFF;">' ;
          $odd=!$odd;
          extract($row);
          ?>
          <td> <a href="viewproduct.php?book_id=<?php echo $item_id; ?>">
          <img src="images/<?php echo $item_id ; ?>.jpg" style="width:100px; height:120px;"/></a></td>

          <td><a href="viewproduct.php?book_id=<?php echo $item_id ; ?> " > <?php echo $book_title; ?> </a></td>
          <td>Rs. <?php echo $book_price ; ?></td>
          <td>
            <form method='post' action="update_cart.php">
            <div>
             <input type="text" name="qty"  maxlength="2" szie="2" style="width: 50px;" value="<?php echo $item_qty; ?>"/><br><br>
             <input type="hidden" name="book_id" value="<?php echo $item_id ; ?>"/>
             <input type="hidden" name="redirect" value="viewcart.php"/>
             <input type="submit" name="submit" value="Change Qty" style="width:40px;font-size:10px;"/>
            </div>
        </form>
        </td>
          <td>Rs. <?php echo number_format($book_price*$item_qty,2) ; ?></td>
       </tr>
       <?php
           $total=$total + $book_price*$item_qty;
         }
       ?>
     </table>
      <div >
        <div class="posi3">
          <p style="float:right;padding-right:15px;">Amount Payable: Rs. <b><?php echo number_format($total,2) ; ?></b></p></div>
        <div >

  <form method="post" action="payment.php">
     <input type="hidden"  name="name" value="<?php echo $_POST['name']; ?>"/>
	<input type="hidden"   name="address" value="<?php echo $_POST['address']; ?>"/>
	<input type="hidden"  name="city" value="<?php echo $_POST['city']; ?>"/>
	<input type="hidden"  name="state" value="<?php echo $_POST['state']; ?>"/>
	<input type="hidden"  name="pin" value="<?php echo $_POST['pin']; ?>"/>
	<input type="hidden"  name="tel" value="<?php echo $_POST['tel']; ?>"/>
	<input type="hidden" name="email" value="<?php echo $_POST['email']; ?>"/>
    
	<input type="submit" class="myButton2" style="float:left;" value="Continue">
	</form>
   </div>
       </div>
       <?php
     }
     ?>
</div>
</body>
</html>