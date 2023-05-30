<?php
    session_start();
    if (!isset($_SESSION['username'])) {
        header("Location: FA_Login.html");
        exit();
    }

    if (isset($_POST['logout'])) {
        session_destroy();
        header("Location: FA_Login.html");
        exit();
    }
?>

<!DOCTYPE html>
<html>
<head>
<title>Home Page</title>
<link rel="stylesheet" href="Final.css">
<style>
    body{
        background-image: url('images/bg2.jpg');
        background-repeat: 1;
        background-size: 20%;
        font-family: Times, sans-serif;
    }

    .container {
        text-align: left;
        max-width: 800px;
        margin: 0 auto;
        padding: 20px;
        font-size: 20px;
    }

    .container2 {
        display: flex;
        flex-wrap: wrap;
    }

    .row {
        display: flex;
        justify-content: space-between;
        width: 100%;
        margin-bottom: 20px;
    }

    .item {
        flex-basis: calc(50% - 10px);
    }

    img {
        width: 100%;
        height: 80%;
    }

    p {
        text-align: center;
    }

    .Extensive a {
        text-align: left;
        display: block;
        max-width: 800px;
        margin: 0 auto;
        padding: 20px;
        font-size: 18px;
    }

    #header{
        border-radius: 25px;
        background-image: url(images/bg1.jpg);
        background-size: 100% auto;
        margin-top:20px;
        display: block;
        width:90%;
        height:300px;
    }

    .DES a {
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

    .session-message {
        text-align: center;
        font-size: 24px;
    }

    .logout-form {
        text-align: right;
        margin-top: 20px;
    }

    .logout-btn {
        padding: 10px 20px;
        background-color: red;
        color: white;
        border: none;
        cursor: pointer;
    }
</style>
</head>
<body>
<nav>
	<label class="logo">Foodie Express</label>
	<ul>
		<li><a class="active" href="FA_Home.php">Home</a></li>
		<li><a href="FA_About.php">About</a></li>
		<li><a href="FA_Food.php">Food</a></li>
		<li><a href="FA_Cart.php">Cart</a></li>
		<li><a href="FA_Login.html">Login</a></li>
	</ul>
</nav>

<center>
<div class="wrapper">
    <h1>Welcome to Foodie Express!</h1><br><hr>
    <div class="container">
    <div class="session-message">
    <p>Hello, <?php echo $_SESSION['username']; ?>!</p><br>
    </div>
    <p>We're here to make your dining experience convenient, enjoyable, and satisfying. 
        Browse our curated restaurant listings, explore enticing menus, and place your order effortlessly. 
        We prioritize quality and partner with reputable restaurants for fresh, delicious meals. 
        Our dedicated delivery drivers ensure promptness and professionalism. Your feedback is important to us. 
        Thank you for choosing Foodie Express, your trusted food delivery partner. Let us bring culinary delights to your doorstep!</p>
    <br><p> - The Foodie Express Team</p>
</div><hr>
<div class="logout-form">
    <form method="post">
        <input class="logout-btn" type="submit" name="logout" value="Logout">
    </form>
</div>
</div>


<div class="wrapper">
<form method="post">
        <h2><a>Cuisine from around the world:</a></h2><br><hr><br>
        <div class="container2">
            <div class="row">
                <div class="item">
                    <img src="images/fc1.jpg" alt="Image 1">
                    <p><strong>Western Cuisine</strong></p>
                    <p>A diverse range of culinary traditions and dishes originating from Europe and North America.
                        It is characterized by its emphasis on meat, dairy products, grains, and a wide variety of flavors and cooking techniques.</p>
                </div><hr>

                <div class="item">
                    <img src="images/fc2.jpg" alt="Image 2">
                    <p><strong>Japanese Cuisine</strong></p>
                    <p>A culinary tradition that emphasizes simplicity, balance, and the use of fresh, seasonal ingredients. 
                        It is renowned for its delicate flavors, artful presentation, and attention to detail.</p>
                </div>
            </div><br>

            <div class="row">
                <div class="item">
                    <img src="images/fc3.jpg" alt="Image 3">
                    <p><strong>Malaysian Cuisine</strong></p>
                    <p>A delightful fusion of flavors, influenced by Malay, Chinese, Indian, and indigenous culinary traditions. 
                        It is known for its diverse and vibrant dishes that reflect the country's multicultural heritage.</p>
                </div><hr>

                <div class="item">
                    <img src="images/fc4.jpg" alt="Image 4">
                    <p><strong>Thailand Cuisine</strong></p>
                    <p>Thai cuisine is renowned for its bold flavors, aromatic herbs, and vibrant colors. 
                        It is a harmonious balance of sweet, sour, salty, and spicy elements, creating a delightful culinary experience.</p>
                </div>
            </div>
        </div>
    </form><br><hr>
</div>
    

<div class="wrapper">
    <form method="post">
    <h1><a>Why choose Foodie Express?</a></h1><br><hr>
    <div class="DES">
        <a><strong>Quickest</strong> - We provides the fastest food delivery in the market.</a>
        <a><strong>Easiest</strong> - Now order your food is just a few clicks or taps away. Order online for a faster and more rewarding experience.</a>
        <a><strong>Food for all cravings</strong> - From local fare to restaurant favourites, our wide selection of food will definitely satisfy all your cravings.</a>
        <a><strong>Pay with ease</strong> - It’s easy to get your foods delivered to you. It’s even easier to pay for it with online payment.</a>
    </div><hr>
    </form>
</div>


<footer>
    <div class="footer-content">
        <p>&copy; <?php echo date("Y"); ?> Foodie Express. All rights reserved.</p>
    </div>
</footer>
</body>
</html>
