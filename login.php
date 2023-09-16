<html>
<head>
<title>9BOOKS-Login</title>
<link rel="stylesheet" type="text/css" href="sign-in.css">
<link rel="shortcut icon" href="images/book.ico">
</head>
<body>
  <?php
session_start();
include('db.php');
$msg='';
if( isset($_SESSION['user']) != "")

{

      header("Location: categories.php");
}
if (isset($_POST['login']) && !empty($_POST['email']) 
               && !empty($_POST['password']))
{
      $email = mysqli_real_escape_string($conn,$_POST['email']);
      $password = mysqli_real_escape_string($conn,$_POST['password']);
      $en_password = md5($password);

      $sql = "SELECT id,email,password FROM users WHERE email='".$email."' AND password='".$en_password."' ";

      $result = mysqli_query($conn,$sql);

      $numResults = mysqli_num_rows($result);
      $row = mysqli_fetch_array($result);
     
      if($numResults==1)
      {
            $_SESSION['user'] = $row['id'];
        header("Location: categories.php?cat_id=1&cat_name=Pre-orders");
        
      }
      else
      {
                   
                $msg="Invalid username or password";
                        
      }
}

?>

<div style="margin-top:40px">
<h1 style=text-decoration:none;text-align:center><a href="index.html">Welcome to <span style=color:red;>9books </span></a></h1>
<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
  <h4 style="color:red"><?php echo $msg; ?></h4>
  <h2>Login</h2>
  
  <label>
    <input type="email" name="email" placeholder="Email" required>
    <span>Email</span>
  </label>
  
  <label>
    <input type="password" name="password" placeholder="Password" required>
    <span>Password</span>
  </label>
	
  <input type="submit" name="login" >
  
</form>
</div>
</body>
</html>