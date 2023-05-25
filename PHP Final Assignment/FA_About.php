<!DOCTYPE html>
<html>
<head>
    <title>About Us</title>
    <link rel="stylesheet" href="Final.css">
    <style>
        body{
            background-image: url('images/bg1.jpg');
            background-repeat: 1;
            background-size: 100%;
            font-family: Times, sans-serif;
        }

        .container {
            text-align: left;
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            font-size: 20px;
        }

        .AB a {
            text-align: left;
            display: block;
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            font-size: 18px;

        }

        footer {
            background-color: darkred;
            padding: 20px;
            text-align: center;
        }

        .footer-content {
            font-size: 15px;
            color: white;
        }

    </style>
</head>
<body>
<nav>
	<label class="logo">Foodie Express</label>
	<ul>
		<li><a href="FA_Home.php">Home</a></li>
		<li><a class="active" href="FA_About.php">About</a></li>
		<li><a href="FA_Food.php">Food</a></li>
		<li><a href="#">Cart</a></li>
		<li><a href="FA_Login.html">Login</a></li>
	</ul>
</nav>

<center>
<div id="header"></div>
<div class="wrapper">
    <h1>About Us - Foodie Express</h1><br><hr>
<form method="post">

<div class="container">
    <p><a><strong>Welcome to Foodie Express! </strong></a></p><br>
    <p>We're here to make your dining experience convenient, enjoyable, and satisfying. Browse our curated restaurant listings, explore enticing menus, and place your order effortlessly. We prioritize quality and partner with reputable restaurants for fresh, delicious meals. Our dedicated delivery drivers ensure promptness and professionalism. Your feedback is important to us. Thank you for choosing Foodie Express, your trusted food delivery partner. Let us bring culinary delights to your doorstep!</p>
    <br><p> - The Foodie Express Team</p>
</div><hr><br>

<h1><a>Contact Us</a></h1>
<div class="AB">
    <img src="images/phone.png" style = "width: 80px; height:70px; float: left;">
    <a><strong>Phone</strong> - 0123456789</a><br><br>
    <img src="images/email.png" style = "width: 80px; height:70px; float: left;">
    <a><strong>Email</strong> - tangkokhong0328@e.neivce.edu.my</a><br><br>
    <img src="images/address.jpg" style = "width: 80px; height:80px; float: left;">
    <a><strong>Address</strong> - Blok B&C, Lot, 5, Seksyen 10, Jalan Bukit, Taman Bukit Mewah, 43000 Kajang, Selangor</a><br><br>
    
</div><hr><br>

</form>
</div>
</center>

<footer>
    <div class="footer-content">
        <p>&copy; <?php echo date("Y"); ?> Foodie Express. All rights reserved.</p>
    </div>
</footer>
</body>
</html>
