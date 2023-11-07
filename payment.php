<?php
session_start();
include('db.php');

// Check if the form has been submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $city = mysqli_real_escape_string($conn, $_POST['city']);
    $state = mysqli_real_escape_string($conn, $_POST['state']);
    $pin = mysqli_real_escape_string($conn, $_POST['pin']);
    $tel = mysqli_real_escape_string($conn, $_POST['tel']);
    $total_payment = mysqli_real_escape_string($conn, $_POST['total']);

    $session = session_id();

    // Insert order into the database
    $query = "INSERT INTO store_orders (order_date, order_name, order_address, order_city, order_state, order_zip, order_mob, order_email, item_total, shipping_total, authorization, status) VALUES (now(), NULL, '" . $address . "','" . $city . "','" . $state . "','" . $pin . "','" . $tel . "','" . $email . "',0.00,0.00,'auth','Success')";
    mysqli_query($conn, $query);

    $order_id = mysqli_insert_id($conn);

    // Insert ordered items into the database
    $query = "INSERT INTO ordered_items (order_id, sel_item_id, sel_item_qty) SELECT '" . $order_id . "', item_id, item_qty FROM shopper_track WHERE session_id='" . $session . "'";
    $res = mysqli_query($conn, $query);

    // Delete items from shopper_track
    $query = 'DELETE FROM shopper_track WHERE session_id="' . $session . '"';
    mysqli_query($conn, $query);

    // Calculate the total order amount and update the order
    $query = "SELECT SUM(sel_item_qty * book_price) AS item_total FROM ordered_items d JOIN book_details p ON d.sel_item_id=p.id WHERE order_id='" . $order_id . "'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    extract($row);
    $item_tot = $item_total;

    $query = "UPDATE store_orders SET item_total='" . $item_tot . "',shipping_total='" . $item_tot . "' WHERE id='" . $order_id . "'";
    $result = mysqli_query($conn, $query);
    if (!$result) {
        echo 'MySQL Error: ' . mysqli_error($conn);
        exit;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>9BOOKS-Checkout</title>
    <link rel="stylesheet" type="text/css" href="checkout.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
</head>
<body>
    <header>
        <div class="wrapper">
            <h1><a href="categories.php?cat_id=1&cat_name=Pre-orders"><img src="images/book.ico"/>9BOOKS</a></h1>
        </div>
    </header>
    <div class="main" style="padding-left:0px">
        <div class="breadcrumb flat">
            <a> Email</a>
            <a>Delivery Address</a>
            <a>Order Summary</a>
            <a class="active">Payment Method</a>
        </div>

        <form> 
            <div class="form-container"> 
            <input type="text" name="name" id="name" value= "<?php echo $_POST['name']; ?>" disabled  placeholder="Enter your name"/><br/><br/>
            <input type="text" name="amt" id="amt" value= "<?php echo $_POST['total']; ?>" disabled placeholder="Enter amt"/><br/><br/>
             <input type="button" class = "myButton2" name="btn" id="btn" value="Pay Now" onclick="pay_now()"/>
</div>
        </form>
    </div>

    <script>
    function pay_now() {
        var name = jQuery('#name').val();
        var amt = jQuery('#amt').val();

        jQuery.ajax({
            type: 'post',
            url: 'payment_process.php',
            data: "amt=" + amt + "&name=" + name,
            success: function (result) {
                var options = {
                    "key": "rzp_test_itls759li1aNuI",
                    "amount": amt * 100,
                    "currency": "INR",
                    "name": "9 Books",
                    "description": "Test Transaction",
                    "image": "https://t3.ftcdn.net/jpg/05/11/38/18/240_F_511381862_zuI2W1eEqm4ExLcZMGRL7pgqmCKtLGtf.jpg",
                    "handler": function (response) {
                        jQuery.ajax({
                            type: 'post',
                            url: 'payment_process.php',
                            data: "payment_id=" + response.razorpay_payment_id,
                            success: function (result) {
                                    window.location.href = "thank_you.php";
                            }
                        });
                    }
                };
                var rzp1 = new Razorpay(options);
                rzp1.open();
            }
        });
    }
</script>


</body>
</html>
