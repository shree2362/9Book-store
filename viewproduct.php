<?php
session_start();
include('db.php');

if(!isset($_SESSION['user']))
{
 header("Location: login.php");
}
$item_id=isset($_GET['book_id'])?$_GET['book_id'] : '';
$out1=mysqli_query($conn,"SELECT * FROM users WHERE id='".$_SESSION['user']."' ");
$userRow=mysqli_fetch_array($out1);
        $session=session_id();
       $sql='SELECT item_id FROM shopper_track 
               WHERE session_id="'.$session.'" ';

  $out=mysqli_query($conn,$sql);
  $rows=mysqli_num_rows($out);

$query= 'SELECT * FROM book_details WHERE id="'.mysqli_real_escape_string($conn,$item_id).'" ';

$res=mysqli_query($conn,$query);
$row=mysqli_fetch_assoc($res);
extract($row);

?>
<html>
<head>
	<title><?php echo $book_title; ?>-9Books.com</title>

<link rel="stylesheet" type="text/css" href="viewprod.css">
<link rel="stylesheet" type="text/css" href="style.css">
<link rel="shortcut icon" href="images\book.ico">
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
           <a href="viewcart.php">view cart <span class="badge"><?php echo $rows; ?></span></a>
           <a href="signout.php?logout">sign-out</a>
         </div>
      </div>
        <div class="cs1" onclick="myFunction()">
          <span class="cs4"><img src="images/cart.ico" style="width:25px;height:20px;"/></span>
          <span class="cs2">cart</span> 
          <span class="badge cs3"><?php echo $rows; ?></span>
         </div>
    </div>
  </header>
  <div class="containr" id="panel">
  <div class="shopping-cart">
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
        $total=0;
        while($row = mysqli_fetch_array($result)) {
         
          extract($row);
        $total=$total + $book_price*$item_qty;}
        ?>
    <div class="shopping-cart-header">
      <span class="badge"><?php echo $rows; ?></span>
      <div class="shopping-cart-total">
        <span class="lighter-text">Total:</span>
        <span class="main-color-text">Rs. <?php echo $total; ?></span>
      </div>
    </div> 

    <ul class="shopping-cart-items">
    <?php
        $result=mysqli_query($conn,$query);
        while($row = mysqli_fetch_array($result)) {
         
          extract($row);
          ?>
      <li class="clearfix">
        <img src="images/<?php echo $item_id ; ?>.jpg" alt="item1" />
        <span class="item-name"><?php echo $book_title; ?></span>
        <span class="item-price">Rs. <?php echo number_format($book_price*$item_qty,2) ; ?></span>
        <span class="item-quantity">Quantity: <?php echo $item_qty; ?></span>
      </li>
    <?php
         }
       ?>
    </ul>

    <a href="checkout.php" class="button">Checkout</a>
    <?php } ?>
  </div> 
  
</div> 

  <div class="side">
      <div class="pos">
  	     <img id="zoom_01" src="images/<?php echo $id; ?>.jpg" data-zoom-image="images/<?php echo $id; ?>.jpg"/>
      </div>

     <div class="posi">
        <h1 class="title"><?php echo $book_title; ?></h1><hr>
        <p><b style="color:#737373; font-weight:bold;font-size:15px;">Author: </b><?php echo $book_author; ?></p><hr>
      <div style="width:40%;padding-right:30px;border-right:1px groove;height: 180px;display: inline-block;float:left;">
        <p>Deal Price:<b style="font-weight:500;color:#666666;">Rs. <?php echo $book_price; ?></b></p>

        <form method="post" action="update_cart.php">
          <div style="display:block;">
              <input type="hidden" name="book_id" value="<?php echo $id; ?>"/>
              <label for="qty">Quantity:</label>
            <?php
              echo '<input type="hidden" name="redirect" value="viewproduct.php?book_id=',$id,'"/>';
                $item_qty=1;
             echo '<input type="text" name="qty" id="qty"  maxlength="2" szie="2" style="width: 50px;" value="'.$item_qty.'"/>';
              echo '<input class="myButton" type="submit" name="submit" style="margin-top:5px;" value="Add to Cart" />'; //}
             ?>
          </div>
        </form>
     </div>
       <div class="posi2">
            <p>Available only:<br><b style="font-weight:500;color:#666666;">CASH ON DELIVERY</b></p>
       </div>
       
 </div>
 <hr style="width:100%;border:1px solid black;">
     <div id="desc">
      <h3>Summary of The Book</h3>
      <p><?php echo $book_desc; ?></p>
     </div>
  <div class="stars">
    <p>Have used this book? Rate the Book</p>
<form action="">
  <input class="star" id="star-1" type="radio" name="star"/>
  <label class="star" for="star-1"></label>
  <input class="star" id="star-2" type="radio" name="star"/>
  <label class="star" for="star-2"></label>
  <input class="star" id="star-3" type="radio" name="star"/>
  <label class="star" for="star-3"></label>
  <input class="star" id="star-4" type="radio" name="star"/>
  <label class="star" for="star-4"></label>
  <input class="star" id="star-5" type="radio" name="star"/>
  <label class="star" for="star-5"></label>
</form>
<a href="review.php?book_id=<?php echo $id; ?>" style="display:block;clear:right;">write review</a>
</div>
<hr style="width:100%;border:1px solid black;">
  <?php
  $query="SELECT * FROM reviews WHERE review_book_id='".$id."'";
  $res=mysqli_query($conn,$query);
  echo '<h3>Reviews of ', $book_title,'<h3>';
  while($ro= mysqli_fetch_array($res))
        {
            extract($ro);
            echo '<h3>',$review_title,'</h3>
                  <p>',$review_com,'</p>';

        }
  ?>
</div>
<footer>
  <div class="divfoot">
  <h2>9BOOKS</h2>
  <p>Copyright &copy 2016 9books. All rights reserved.</p>
    <p><a href="#">Terms of Service</a> | <a href="#">Privacy</a></p>
  </div>
</footer>
</div>
<script>
var count=0;
function myFunction() {
    if(count%2==0)
    document.getElementById("panel").style.display = "block";
  else
document.getElementById("panel").style.display = "none";
count++;
}
</script>
</body>
</html>