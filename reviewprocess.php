<?php
  session_start();
include('db.php');
$id=mysqli_real_escape_string($conn,$_POST['book_id']);
$sql='INSERT INTO reviews (review_book_id,review_date,reviewer_name,review_title,review_com,review_rating) VALUES 
        ("'.mysqli_real_escape_string($conn,$_POST['book_id']).'",now(),"'.mysqli_real_escape_string($conn,$_POST['reviewer']).'","'.mysqli_real_escape_string($conn,$_POST['title']).'","'.mysqli_real_escape_string($conn,$_POST['review']).'",
        	 "'.mysqli_real_escape_string($conn,$_POST['star']).'")';
   $result = mysqli_query($conn,$sql);
if(!$result)
{
echo 'MySQL Error: ' . mysqli_error($conn);
        exit;
}
  header("Location: viewproduct.php?book_id=$id");
?>