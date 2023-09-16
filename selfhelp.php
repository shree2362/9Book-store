<html>
<head>
	<title>9BOOKS-Recommended for u!</title>
<link rel="stylesheet" type="text/css" href="main.css">
<link rel="shortcut icon" href="D:\project\images\book.ico">
</head>
<body>
<div id="container">
<header>
	<div class="wrapper">
    <h1><a href="D:/project/categories/recommended.html"><img src="D:\project\images\book.ico"/>9BOOKS</a></h1>
    <div class="dropdown">
  <button class="dropbtn"><?php echo $userRow['Name']; ?>'s Account</button>
  <div class="dropdown-content">
    <a href="#">account</a>
    <a href="#">view cart</a>
    <a href="#">sign-out</a>
  </div>
</div>
    </nav>
</div>
</header>
<nav>
  <ul>
  	<li id="id1">Categories</li>
   <li><a href="#">Pre-orders</a></li>
   <button class="drop">Fiction</button>
        <div class="dropPanel rig">
          <ul >
        	<li><a href="fiction.html">crime</a></li>
            <li><a href="fiction_drama.html">drama</a></li>
            <li><a href="fiction_romance.html">romance</a></li>
          </ul>
        </div>
   <li><a href="selfhelp.html">Self-help</a></li>
   <li><a href="#">programming</a></li>
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
   <li><a href="#">Biographies</a></li>
   <li><a href="selfhelp.php?cat_id=9">Cooking</a></li>
   	<li><a href="#">Bussiness&management</a></li>
   	<li><a href="#">Teens</a></li>
  </ul>
</nav>

<div class="side">
	<div class="standard">Self-help</div>


<?php
  include('db.php');
  $catid = $_GET['cat_id'];
  $sql="SELECT id,cat_id,book_title,book_price,book_author,book_desc FROM book_details WHERE cat_id='".$catid."' ";
  $result=mysqli_query($conn,$sql);
  while($row = mysqli_fetch_array($result))
  {
	  extract($row);
	   echo '<div class="book-panel">
		    <div class="book-cover">
		        <img src="images/',$id,'.jpg" alt="you" />
	        </div>
	       <div id="desc">
	          <h5>', $book_title ,'<i> by ', $book_author ,'</i></h5> 
	          <p>', $book_desc ,'</p>
	          <p><b>Rs.', $book_price ,'</b><p>
	       </div>';
	       
       echo '</div>';
   }
  ?>
	
	<!--   <div class="book-panel">
		    <div class="book-cover">
		        <img src="D:\project\images\the-secret.jpeg"/>
	        </div>
	       <div id="desc">
	          <h5 >The-secret<i> by Rhonda Byrne</i></h5>
	          <p>he Secret begins with Byrne introducing the concept of the law of attraction. Byrne maintains that the universe emits a certain frequency which people can attract towards themselves. She stresses that positive thinking is a powerful entity which draws in energy in the same frequency range. In other words, by always engaging in positive thinking, Byrne claims that people will attract back positivity.</p>
	          <p><b>Rs.400</b><p>
	       </div>
	       <form action="">
	       	 <input type="hidden" name="book_half-girlfriend" value="NFB01"/>
	       	 <input class="myButton"type="submit" name="submit" value='Add To Cart' />
	       	 <input type="hidden" name="quantity" value="1"/>
	       </form>
	       <form action="">
	       	 <input type="hidden" name="book_half-girlfriend" value="NFB01"/>
	       	 <input class="myButton"type="submit" name="submit" value='Buy Now' />
	       </form>
       </div>

       <div class="book-panel">
		    <div class="book-cover">
		        <img src="D:\project\images\The 7 Habits of Highly Effective People.jpg"/>
	        </div>
	       <div id="desc">
	          <h5 >The 7 Habits of Highly Effective People <i>by Stephen R. Covey</i></h5>
	          <p>In this book, he speaks of seven habits of people who are effective and live a good life because of it. It discusses three stages of character development: dependence, independence and interdependence. This stage marks the progress from dependence to interdependence. This takes place during the growing years of a child till the time they learn how to take care of themselves.</p>
	          <p><b>Rs.340</b><p>
	       </div>
	       <form action="">
	       	 <input type="hidden" name="book_half-girlfriend" value="NFB01"/>
	       	 <input class="myButton"type="submit" name="submit" value='Add To Cart' />
	       	 <input type="hidden" name="quantity" value="1"/>
	       </form>
	       <form action="">
	       	 <input type="hidden" name="book_half-girlfriend" value="NFB01"/>
	       	 <input class="myButton"type="submit" name="submit" value='Buy Now' />
	       </form>
       </div>

       <div class="book-panel">
		    <div class="book-cover">
		        <img src="D:\project\images\Life Without Limits.jpg"/>
	        </div>
	       <div id="desc">
	          <h5 >Life Without Limits<i> by Nick Vujicic</i></h5>
	          <p> With the help of his personal experiences he has crafted this book, which will certainly motivate people and help them sail through their problems by keeping an optimistic attitude towards life. He asks his readers to believe in the power of faith and the life path God has planned for each one of us. </p>
	          <p><b>Rs.500</b><p>
	       </div>
	       <form action="">
	       	 <input type="hidden" name="book_half-girlfriend" value="NFB01"/>
	       	 <input class="myButton"type="submit" name="submit" value='Add To Cart' />
	       	 <input type="hidden" name="quantity" value="1"/>
	       </form>
	       <form action="">
	       	 <input type="hidden" name="book_half-girlfriend" value="NFB01"/>
	       	 <input class="myButton"type="submit" name="submit" value='Buy Now' />
	       </form>
       </div>

       <div class="book-panel">
		    <div class="book-cover">
		        <img src="D:\project\images\Think And Grow Rich.jpeg"/>
	        </div>
	       <div id="desc">
	          <h5 >Think And Grow Rich<i> by Napoleon Hill</i></h5>
	          <p>After interviewing over 500 of the most affluent men and women of his time, he uncovered the secret to great wealth based on the notion that if we can learn to think like the rich, we can start to behave like them. By understanding and applying the thirteen simple steps that constitute Hills formula, you can achieve your goals, change your life and join the ranks of the rich and successful.</p>
	          <p><b>Rs.284</b><p>
	       </div>
	       <form action="">
	       	 <input type="hidden" name="book_half-girlfriend" value="NFB01"/>
	       	 <input class="myButton"type="submit" name="submit" value='Add To Cart' />
	       	 <input type="hidden" name="quantity" value="1"/>
	       </form>
	       <form action="">
	       	 <input type="hidden" name="book_half-girlfriend" value="NFB01"/>
	       	 <input class="myButton"type="submit" name="submit" value='Buy Now' />
	       </form>
       </div>
   </div>
 <div class="center">
 <ul class="pagination">
  <li><a  href="#"><<</a></li>
  <li><a class="active"href="#">1</a></li>
  <li><a  href="D:project/categories/selfhelp_page2.html">2</a></li>
  <li><a href="#">3</a></li>
  <li><a href="#">>></a></li>
   </ul>
 </div>-->

</div>
<footer>
	<h2>9BOOKS</h2>
	<p>Copyright &copy 2016 9books. All rights reserved.</p>
    <p><a href="#">Terms of Service</a> | <a href="#">Privacy</a></p>
</footer>
</body>
</html>