<?php
include('db.php');
session_start();
$session=session_id();

$qty=(isset($_POST['qty']) && ctype_digit($_POST['qty'])) ? $_POST['qty'] : 0;
$item_id=(isset($_POST['book_id'])) ? $_POST['book_id'] : '';
$action=(isset($_POST['submit'])) ? $_POST['submit'] : '';
$redirect = (isset($_POST['redirect'])) ? $_POST['redirect'] : 'categories.php';

switch($action)
{
	case 'Add to Cart':
	   $query='SELECT item_qty FROM shopper_track WHERE session_id="'.$session.'" AND item_id="'.mysqli_real_escape_string($conn,$item_id).'" ';
         $res=mysqli_query($conn,$query);

          if(mysqli_num_rows($res) > 0)
          {
             $row=mysqli_fetch_assoc($res);
             extract($row);
             if($qty > 0){
             	$qty=$item_qty + $qty;
	   		$query='UPDATE shopper_track SET item_qty="'.$qty.'" , date_added=now() WHERE session_id="'.$session.'" AND item_id="'.mysqli_real_escape_string($conn,$item_id).'" ';
	   		mysqli_query($conn,$query);
	   }
             
          }
          else{
        
	  if(!empty($item_id) && $qty>0)
	  {
	  	$query='INSERT INTO shopper_track (session_id,item_id,item_qty,date_added) VALUES ("'.$session.'","'.mysqli_real_escape_string($conn,$item_id).'","'.mysqli_real_escape_string($conn,$qty).'",now())';
	  	mysqli_query($conn,$query);
	  }
	}
	  header('Location: ' . $redirect);
	  exit();
	  break;

	case 'Change Qty':
	   if(!empty($item_id))
	   {

	   	if($qty > 0){
	   		$query='UPDATE shopper_track SET item_qty="'.$qty.'" , date_added=now() WHERE session_id="'.$session.'" AND item_id="'.mysqli_real_escape_string($conn,$item_id).'" ';
	   }else{
	   	    $query = 'DELETE FROM shopper_track WHERE session_id="'.$session.'" AND item_id="'.mysqli_real_escape_string($conn,$item_id).'" ';
	   }
	   mysqli_query($conn,$query);
	}
	header('Location: ' . $redirect);
	  exit();
	  break;
    
    case 'Remove':
	   $query='DELETE FROM shopper_track WHERE item_id="'.$item_id.'" ';
	     mysqli_query($conn,$query);
	     header('Location: ' . $redirect);
	     exit();
	    break;

	case 'Empty Cart':
	   $query='DELETE FROM shopper_track WHERE session_id="'.$session.'" ';
	     mysqli_query($conn,$query);
	     header('Location: ' . $redirect);
	     exit();
	    break;

} 
?>