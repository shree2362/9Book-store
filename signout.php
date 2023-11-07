<?php
session_start();

if(!isset($_SESSION['user']))
{
 header("Location: login.html");
}
else if(isset($_SESSION['user'])!="")
{
 header("Location: categories.php?cat_id=1&cat_name=Pre-orders");
}

if(isset($_GET['logout']))
{
 session_destroy();
 unset($_SESSION['user']);
 header("Location: login.php");
}
?>