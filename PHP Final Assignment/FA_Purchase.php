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

        table {
            margin: auto;
            width: 500px;
            border-collapse: collapse;
        }
        
        .message {
            font-size: 24px;
            color: green;
        }

        .centered-table {
            margin: 0 auto;
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
		<li><a href="FA_Login.html">Logout</a></li>
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
        
        $userQuery = "SELECT Username, Email, Address FROM users WHERE Username = '$name'";
        $userResult = mysqli_query($conn, $userQuery);

        if (mysqli_num_rows($userResult) > 0) {
            $userData = mysqli_fetch_assoc($userResult);
            $username = $userData['Username'];
            $email = $userData['Email'];
            $address = $userData['Address'];

            echo "<h3>Username: $username</h3>";
            echo "<h3>Email: $email</h3>";
            echo "<h3>Address: $address</h3>";
            echo "<br>";
        }

        $query = "SELECT CartID, FoodName, Price FROM $name";
        $result = mysqli_query($conn, $query);
        $totalPrice = 0;

        if (mysqli_num_rows($result) > 0) {
            echo "<h2>Items You Purchased:</h2><br>";
            echo "<table>";
            echo "<tr>
                    <th>CartID</th>
                    <th>Food Name</th>
                    <th>Price</th>
                </tr>";

            while ($row = mysqli_fetch_assoc($result)) {
                $cartID = $row['CartID'];
                $foodName = $row['FoodName'];
                $foodPrice = $row['Price'];
                $totalPrice += $foodPrice;
                echo "<tr>
                        <td>$cartID</td>
                        <td>$foodName</td>
                        <td>RM $foodPrice</td>
                    </tr>";
            }
                echo "</table><br>";
                echo "<h2>Total Price: RM $totalPrice</h2>";
            } else {
                echo "<p>No items in the cart.</p>";
            }

        $conn->close();
    ?>
    <br><hr><br>

    <?php
        if (mysqli_num_rows($result) > 0) {
            echo '<a href="FA_Download.php" class="download-button">Download Purchase Details</a>';
        }
    ?>
    <br><br>
    <p><a href="FA_Home.php">Go back to Home</a></p>
</div>

<footer>
    <div class="footer-content">
        <p>&copy; <?php echo date("Y"); ?> Foodie Express. All rights reserved.</p>
    </div>
</footer>

</body>
</html>
