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
	<title>shopping cart-9Books.com</title>

<link rel="stylesheet" type="text/css" href="viewprod.css">
<link rel="stylesheet" type="text/css" href="style.css">
<link rel="shortcut icon" href="images\book.ico">
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
 <div id="container">
  <header>
  <div class="wrapper">
     <h1><a href="categories.php?cat_id=1&cat_name=Pre-orders"><img src="images/book.ico"/>9BOOKS</a></h1>
      <div class="dropdown">
        <button class="dropbtn"><?php echo $userRow['Name']; ?>'s Account</button>
         <div class="dropdown-content">
           <a href="#">account</a>
           <a href="viewcart.php">view cart</a>
           <a href="signout.php?logout">sign-out</a>
         </div>
      </div>
    </div>
  </header>

  <div class="side">
    <h1>Shopping Cart</h1>
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

          <td><a href="viewproduct.php?book_id=<?php echo $item_id ; ?> " > <?php echo $book_title; ?> 
          <form method='post' action="update_cart.php">
            <div>
             <input type="hidden" name="qty"  maxlength="2" szie="2" style="width: 50px;" value="<?php echo $item_qty; ?>"/><br><br>
             <input type="hidden" name="book_id" value="<?php echo $item_id ; ?>"/>
             <input type="hidden" name="redirect" value="viewcart.php"/>
             <input type="submit" name="submit" value="Remove" style="width:50px;font-size:10px;"/>
            </div>
        </form></td>
          <td>Rs. <?php echo $book_price ; ?></td>
          <td>
            <form method='post' action="update_cart.php">
            <div>
             <input type="text" name="qty"  maxlength="2" szie="2" style="width: 50px;" value="<?php echo $item_qty; ?>"/><br><br>
             <input type="hidden" name="book_id" value="<?php echo $item_id ; ?>"/>
             <input type="hidden" name="redirect" value="viewcart.php"/>
             <input type="submit" name="submit" value="Change Qty" style="width:50px;font-size:10px;"/>
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
          <form method='post' action="update_cart.php">
            <div style="float:left;display:inline-block;padding-left:10px;">
             <input type="hidden" name="qty"  maxlength="2" szie="2" style="width: 50px;" value="<?php echo $item_qty; ?>"/><br><br>
             <input type="hidden" name="book_id" value="<?php echo $item_id ; ?>"/>
             <input type="hidden" name="redirect" value="viewcart.php"/>
             <input type="submit" name="submit" value="Empty Cart" />
            </div>
        </form>
          <p style="float:right;padding-right:15px;">Your total amount: Rs. <?php echo number_format($total,2) ; ?></p></div>
        <div >

         <form method='post' action="checkout.php">
           
            <input type="submit" class="myButton2" name="submit" style="float:right;" value="Proceed to Checkout">
           
         </form>
         <a href="categories.php?cat_id=6&cat_name=Self-help" class="cbutton"><span>continue shopping</span></a>
       </div>
       </div>
       <?php
     }
     ?>
  </div>

  </div>
</body>
</html>