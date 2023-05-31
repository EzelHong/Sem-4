<!DOCTYPE html>
<html>
<head>
    <title>Purchase Complete</title>
    <link rel="stylesheet" href="Final.css">
    <style>
        body{
            background-image: url('images/food.jpg');
            background-repeat: 1;
            background-size: 100%;
            font-family: Times, sans-serif;
        }
        
        .wrapper {
            width: 800px;
            padding: 30px;
            margin: 20px auto;
            background-color: lightyellow;
            border-radius: 10px;
            text-align: center;
            box-shadow: 0 20px 40px;
        }
        
        .message {
            font-size: 24px;
            color: green;
        }
        
        footer {
            background-color: darkred;
            padding: 20px;
            text-align: center;
            margin-top: auto;
            bottom: 0;
            width: 100%;
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
		<li><a href="FA_About.php">About</a></li>
		<li><a href="FA_Food.php">Food</a></li>
		<li><a href="FA_Cart.php">Cart</a></li>
		<li><a href="FA_Login.html">Login</a></li>
	</ul>
</nav>

<div class="wrapper">
    <h1>Purchase Complete!</h1><br><hr><br>
    <p class="message">Thank you for your purchase.</p><br>

    <?php
        session_start();
        $name = $_SESSION['username'];

        $servername = "localhost";
        $dbusername = "root";
        $dbpassword = "ROOT28";
        $dbname = "Final";

        $conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Retrieve items from the "Cart" table
        $query = "SELECT FoodName, Price FROM $name";
        $result = mysqli_query($conn, $query);
        $totalPrice = 0;

        if (mysqli_num_rows($result) > 0) {
            echo "<h2>Items You Purchased:</h2><br>";
            echo "<ul>";
            while ($row = mysqli_fetch_assoc($result)) {
                $foodName = $row['FoodName'];
                $foodPrice = $row['Price'];
                $totalPrice += $foodPrice;
                echo "<li>$foodName - RM $foodPrice</li>";
            }
            echo "</ul><br>";
            echo "<h3>Total Price: RM $totalPrice</h3>";
        } else {
            echo "<p>No items in the cart.</p>";
        }

        $conn->close();
    ?><br><hr><br>

<p><a href="FA_Home.php">Go back to Home</a></p>
</div>

<?php
    for ($i = 1; $i <= 20; $i++) {
        echo "Iteration: " . $i . "<br>";
    }
?>

<footer>
    <div class="footer-content">
        <p>&copy; <?php echo date("Y"); ?> Foodie Express. All rights reserved.</p>
    </div>
</footer>

</body>
</html>
