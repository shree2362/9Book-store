<?php
session_start();
include('db.php');

if(!isset($_SESSION['user'])) {
    header("Location: login.php");
}

$res=mysqli_query($conn,"SELECT * FROM users WHERE id='".$_SESSION['user']."' ");
$userRow = mysqli_fetch_array($res);

if ($userRow) {
    $email = $userRow['email'];
} else {
    $email = "";
}
?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="checkout.css">
</head>
<body>
	<header>
		<div class="wrapper">
			<h1><a href="categories.php?cat_id=1&cat_name=Pre-orders"><img src="images/book.ico"/>9BOOKS</a></h1>
		</div></header>
<div class="main">
<div class="breadcrumb flat">
	<a>Email</a>
	<a href="checkout2.php" class="active">Delivery Address</a>
	<a>Order Summary</a>
	<a>Payment Method</a>
</div>

<form method="post" action="ordersummary.php" onsubmit="return validateForm(event)">
	<div class="form-container">
        <p>Enter Shipping Address</p>

        <input type="text" name="name" id="name" placeholder="Name">
        <div id="nameError" class="error-message"></div>
        
        <input type="text" name="address" id="address" style="height:100px;" placeholder="Address">
        <div id="addressError" class="error-message"></div>
        
        <input type="text" name= "city" id="city" placeholder="City">
        <div id="cityError" class="error-message"></div>
        
        <select name="state" id="state">
            <option value="" disabled selected>Select State</option>
			<option value="Andhra Pradesh">Andhra Pradesh</option>
    		<option value="Arunachal Pradesh">Arunachal Pradesh</option>
    		<option value="Assam">Assam</option>
    		<option value="Bihar">Bihar</option>
    		<option value="Chhattisgarh">Chhattisgarh</option>
    		<option value="Goa">Goa</option>
    		<option value="Gujarat">Gujarat</option>
    		<option value="Haryana">Haryana</option>
    		<option value="Himachal Pradesh">Himachal Pradesh</option>
    		<option value="Jharkhand">Jharkhand</option>
    		<option value="Karnataka">Karnataka</option>
    		<option value="Kerala">Kerala</option>
    		<option value="Madhya Pradesh">Madhya Pradesh</option>
    		<option value="Maharashtra">Maharashtra</option>
    		<option value="Manipur">Manipur</option>
    		<option value="Meghalaya">Meghalaya</option>
    		<option value="Mizoram">Mizoram</option>
    		<option value="Nagaland">Nagaland</option>
    		<option value="Odisha">Odisha</option>
    		<option value="Punjab">Punjab</option>
    		<option value="Rajasthan">Rajasthan</option>
    		<option value="Sikkim">Sikkim</option>
    		<option value="Tamil Nadu">Tamil Nadu</option>
    		<option value="Telangana">Telangana</option>
    		<option value="Tripura">Tripura</option>
    		<option value="Uttar Pradesh">Uttar Pradesh</option>
    		<option value="Uttarakhand">Uttarakhand</option>
    		<option value="West Bengal">West Bengal</option>
        </select>
        <div id="stateError" class="error-message"></div>
        
        <input type="number" maxlength="6" name="pin" id="pin" placeholder="Pin Code">
        <div id="pinError" class="error-message"></div>
        
        <input type="text" name="country" disabled="disabled" value="Country: India">
        <label style="color:blue">Service available only in India</label>
        
        <input type="number" maxlength="10" name="tel" id="tel" placeholder="Mobile No.">
        <div id="telError" class="error-message"></div>
        <input type="hidden" name="email" value="<?php echo $email; ?>">
        <input type="submit" name="submit" class="myButton2" value="Continue">
    </div>
</form>

<script>
    function validateForm(event) {
        //event.preventDefault(); // Prevent form submission

        var name = document.getElementById("name").value;
        var address = document.getElementById("address").value;
        var city = document.getElementById("city").value;
        var state = document.getElementById("state").value;
        var pin = document.getElementById("pin").value;
        var tel = document.getElementById("tel").value;
        var isValid = true;

        // Function to display an error message for a specific field
        function showError(id, message) {
            document.getElementById(id + "Error").innerHTML = message;
            isValid = false;
        }

        // Reset error messages
        document.querySelectorAll(".error-message").forEach(function(element) {
            element.innerHTML = "";
        });

        // Name validation: No special characters
        if (!/^[a-zA-Z ]+$/.test(name)) {
            showError("name", "Name should not have special characters");
        }

		if (address.trim() === "") {
            showError("address", "Address is mandatory");
        }

        if (city.trim() === "") {
            showError("city", "City is mandatory");
        }

        // Pin validation: Only numbers, 6 digits
        if (!/^[0-9]{6}$/.test(pin)) {
            showError("pin", "Pin Code should be 6 digits and contain only numbers");
        }

        // Mobile Number validation: Only numbers, 10 digits
        if (!/^[0-9]{10}$/.test(tel)) {
            showError("tel", "Mobile No. should be 10 digits and contain only numbers");
        }

        // State validation: Ensure a state is selected
        if (state === "") {
            showError("state", "Please select a state");
        }

        return isValid;
    }
</script>


	

</div>
</body>
</html>