<?php
session_start();
include('db.php');

if(!isset($_SESSION['user']))
{
 header("Location: login.html");
}
$res=mysqli_query($conn,"SELECT * FROM users WHERE id='".$_SESSION['user']."' ");
$userRow=mysqli_fetch_array($res);
?>
<html>

<head>
	<title>9BOOKS-Recommended for u!</title>
<link rel="stylesheet" type="text/css" href="main.css">
<link rel="shortcut icon" href="images/book.ico">
</head>

<body>
<div id="container">
 <header>
	<div class="wrapper">
    <h1><a href="recommended.html"><img src="images\book.ico"/>9BOOKS</a></h1>
    <div class="dropdown">
  <button class="dropbtn"><?php echo $userRow['Name']; ?>'s Account</button>
  <div class="dropdown-content">
    <a href="#">account</a>
    <a href="#">view cart</a>
    <a href="http://localhost/project/signout.php?logout">sign-out</a>
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
   <!-- <button class="drop">Academics</button> 
        <div class="dropPanel">
          <ul >
        	<li><a href="#">entrance exams</a></li>
            <li><a href="#">programming</a></li>
            <li><a href="#">mechanical</a></li>
          </ul>
        </div> -->
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
   <li><a href="biograpphy.html">Biographies</a></li>
   <li><a href="cooking.html">Cooking</a></li>
   	<li><a href="bussiness.html">Bussiness&management</a></li>
   	<li><a href="teens.html">Teens</a></li>
  </ul>
</nav>
<div class="side">

	<div class="standard">Recommended</div>
	   <div class="book-panel">
		    <div class="book-cover">
		        <img src="images\half-girlfriend.jpeg"/>
	        </div>
	       <div id="desc">
	          <h5 >half girlfriend <i> by chetan Baghat</i></h5> 
	          <p>Half Girlfriend is an adult romance novel set in the backdrop of Delhi & Bihar primarily. A Bihari boy Madhav falls in love with Riya, daughter of a rich Delhi businessman. They both love to play basketball and become friends. Madhav develops feelings for Riya. However, she is reluctant to commit and wants to stay just as a friend. But, Madhav does not. Riya suggests a compromise and becomes his ‘half-girlfriend’.</p>
	          <p><b>Rs.150</b><p>
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
		        <img src="images\wings-of-fire-an-autobiography.jpeg"/>
	        </div>
	       <div id="desc">
	          <h5 >wings of fire <i>by APJ Abdul Kalam</i></h5>
	          <p>Wings of Fire: An Autobiography is an inspirational and motivational book that tells the life story of APJ Abdul Kalam. The book is divided into seven parts and begins with an Introduction and Preface. It is followed by Orientation which contains a quote from Atharva Veda. Later, the chapters highlight the early life, school, background and professional life of Dr. Kalam. It also provides an insight to the visions he had for his country and its people.</p>
	          <p><b>Rs.150</b><p>
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
		        <img src="images\aLet-Us-C-English.jpg"/>
	        </div>
	       <div id="desc">
	          <h5 >Let Us C<i></i></h5>
	          <p>Let Us C 13th Edition is a great book for C Programming. This book covers the basic and fundamentals for C Programming. It's theory is clear and well in detailed helping the reader to understand the concepts clearly. With the theory there are practical examples and questions too. C Programming is the basic concept that is well in demand. </p>
	          <p><b>Rs.150</b><p>
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
		        <img src="images\tethe-perks-of-being-a-wallflower.jpeg"/>
	        </div>
	       <div id="desc">
	          <h5 >The Perks of Being a Wallflower<i> by Stephen Chbosky</i></h5>
	          <p>Charlie, a freshman without a single friend keeps himself busy with his unconventionally intelligent mind and keen spirit. His only friend, Michael committed suicide last summer and so Charlie must go into High School alone. At school, amidst an air of anonymity, Charlie goes through weeks before befriending two seniors, Sam and her step brother Patrick.</p>
	          <p><b>Rs.150</b><p>
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
		        <img src="images\aweb-technologies-html-javascript-php-java-jsp-asp-net-xml.jpeg"/>
	        </div>
	       <div id="desc">
	          <h5 >web-technologies<i> by Kogent</i></h5>
	          <p>Web technologies Black Book is the onetime reference book, written from the programmers point of view, containing hundreds of examples and covering nearly every aspect of various web technologies, such as PHP, HTML, AJAX, ASP.NET, Servlets, and JSP. It will help you to master the entire spectrum of Web Technologies by exploring and implementing various concepts of each web technology.</p>
	          <p><b>Rs.150</b><p>
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
     <li><a  href="#">2</a></li>
     <li><a href="#">3</a></li>
     <li><a href="#">>></a></li>
   </ul>
 </div>
 
</div>
<footer>
 	<h2>9BOOKS</h2>
	<p>Copyright &copy 2016 9books. All rights reserved.</p>
    <p><a href="#">Terms of Service</a> | <a href="#">Privacy</a></p>
    
  </footer>
</body>
</html>