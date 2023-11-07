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
<link rel="stylesheet" type="text/css" href="viewprod.css">
<link rel="stylesheet" type="text/css" href="style.css">
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
<div class="side pad">
<form method="post" action="reviewprocess.php">
<input type="hidden" name="book_id" value="<?php echo $_GET['book_id']; ?>">
<input type="hidden" name="reviewer" value="<?php echo $userRow['Name']; ?>">
<div class="in">
<label id="title">Review Title:</label>
<input type="text" name="title" for="title" class="wid"/>
<label id="title">Review:</label>
<input type="text" name="review" class="wid" style="height:85px" />
<label id="title" style="margin-top:110px;">Rating:</label>
</div>
<div class="stars st">
  <input class="star" id="star-1" type="radio" name="star" value="5"/>
  <label class="star" for="star-1"></label>
  <input class="star" id="star-2" type="radio" name="star" value="4"/>
  <label class="star" for="star-2"></label>
  <input class="star" id="star-3" type="radio" name="star" value="3"/>
  <label class="star" for="star-3"></label>
  <input class="star" id="star-4" type="radio" name="star" value="2"/>
  <label class="star" for="star-4"></label>
  <input class="star" id="star-5" type="radio" name="star" value="1"/>
  <label class="star" for="star-5"></label>
</div>
<input type="submit" name="submit" value="submit">
</form>
</div>
<footer>
  <div class="divfoot">
  <h2>9BOOKS</h2>
  <p>Copyright &copy 2016 9books. All rights reserved.</p>
    <p><a href="#">Terms of Service</a> | <a href="#">Privacy</a></p>
  </div>
</footer>
</body>
</html>