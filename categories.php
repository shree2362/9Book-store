<?php
session_start();
include('db.php');

if(!isset($_SESSION['user']))
{
 header("Location: login.php");
}
$res=mysqli_query($conn,"SELECT * FROM users WHERE id='".$_SESSION['user']."' ");
$userRow=mysqli_fetch_array($res);

 $session=session_id();
       $sql='SELECT item_id FROM shopper_track 
               WHERE session_id="'.$session.'" ';

  $out=mysqli_query($conn,$sql);
  $rows=mysqli_num_rows($out);
?>
<html>
<head>
	<title>9BOOKS-Recommended for u!</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="main.css">
<link rel="stylesheet" type="text/css" href="style.css">
<link rel="shortcut icon" href="images\book.ico">
</head>
<body>
<div id="container">
<header>
<div class="wrapper">
      <h1><a href="categories.php?cat_id=1&cat_name=Pre-orders"><img src="images/book.ico"/>9BOOKS</a></h1>
      <form class="ser" >
<div id="livesearch" class="serdiv"></div>
</form>
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
<nav>
  <ul>
  	<li id="id1">Categories</li>
   <li><a href="categories.php?cat_id=1&cat_name=Pre-orders">Pre-orders</a></li>
   <button class="drop">Fiction</button>
        <div class="dropPanel rig">
          <ul >
        	<li><a href="categories.php?cat_id=2&cat_name=Fiction->crime">Crime</a></li>
            <li><a href="categories.php?cat_id=4&cat_name=Fiction->drama">Drama</a></li>
            <li><a href="categories.php?cat_id=5&cat_name=Fiction->romance">Romance</a></li>
          </ul>
        </div>
   <li><a href="categories.php?cat_id=6&cat_name=Self-help">Self-help</a></li>
   <li><a href="categories.php?cat_id=7&cat_name=programming">Programming</a></li>
        <script>
var acc =document.getElementsByClassName("drop");
var i;

for (i=0; i<acc.length;i++) {
    acc[i].onclick=function(){
        this.classList.toggle("active");
        this.nextElementSibling.classList.toggle("show");
  }
}
</script>
   	</li>
   <li><a href="categories.php?cat_id=8&cat_name=Biographies">Biographies</a></li>
   <li><a href="categories.php?cat_id=9&cat_name=cooking">Cooking</a></li>
   	<li><a href="categories.php?cat_id=10&cat_name=Bussiness&management">Bussiness&management</a></li>
   	<li><a href="categories.php?cat_id=11&cat_name=Teens">Teens</a></li>
  </ul>
</nav>



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

<div class="side">
  <div class="standard"><?php error_reporting(E_ALL & ~E_NOTICE);if($_GET['cat_name']!=NULL){echo $_GET['cat_name'] ;} else echo 'preorder' ;?></div>


<?php
  include('db.php');
  $catid = $_GET['cat_id'];
  if(!$catid)
  {
    $catid=1;
  }
  $sql="SELECT id,cat_id,book_title,book_price,book_author,book_desc FROM book_details WHERE cat_id='".$catid."' ";
  $result=mysqli_query($conn,$sql);
  
  while($row = mysqli_fetch_array($result))
  {
    extract($row);
    $avg=0;
    echo '<div class="book-panel">
    <div class="book-cover">
        <a href="viewproduct.php?book_id=', $id, '"><img src="images/', $id, '.jpg" alt="images/book.ico" /></a>
    </div>
    <div class="btitle">
        <a href="viewproduct.php?book_id=', $id, '" class="blink">', strlen($book_title) > 15 ? substr($book_title, 0, 15) . '...' : $book_title, '</a>
    </div>
    <div class="bauth">by ', $book_author, '</div>';
      $query="SELECT * FROM reviews WHERE review_book_id='".$id."'";
  $res=mysqli_query($conn,$query); 
  $numres=mysqli_num_rows($res);
    echo '<div class="stars">';
        while($ro= mysqli_fetch_array($res))
        {
            extract($ro);
            $avg=$avg+$review_rating;
        }
        $avg=3;
        $dum=$avg;

      while($avg!=0)
      {
       echo '<span class="st" >&#x2605</span>';
       $avg--;
     }
      $av=5-$dum;
      while($av!=0)
      {
        echo '<span class="st" >&#x2606</span>';
       $av--;
      }

    echo '<p> (',$numres,' ratings)</p></div>';
      echo '<p id="par"><b>Rs. ', $book_price ,'</b><p>';
       echo '</div>';
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
<!--cart panel-->
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
  </div> 
  <?php } ?>
</div> 


<script>
function showResult(str) {
  if (str.length==0) { 
    document.getElementById("livesearch").innerHTML="";
    document.getElementById("livesearch").style.border="0px";
    
    return;
  }
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else {  // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
      document.getElementById("livesearch").innerHTML=xmlhttp.responseText;
      document.getElementById("livesearch").style.border="1px solid #A5ACB2";
      
    }
  }
  xmlhttp.open("GET","livesearch.php?q="+str,true);
  xmlhttp.send();
}
</script>
</body>
</html>