<!DOCTYPE html>
<html>
<head>
    <title>Cart</title>
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
        }

        table {
            border-collapse: collapse;
            width: 500px;
        }
        th, td {
            border: 1px solid black;
            padding: 5px;
        }
        img {
            width: 200px;
            height: 150px;
        }
        .button {
            padding: 5px 10px;
            background-color: #4CAF50;
            color: white;
            text-decoration: none;
            border: none;
            cursor: pointer;
        }

        table{
            background-color: white;
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
        <li><a class="active" href="FA_Cart.php">Cart</a></li>
        <li><a href="FA_Login.html">Login</a></li>
    </ul>
</nav><br>

<?php
    session_start();

    if (isset($_GET['id']) && isset($_GET['name']) && isset($_GET['price'])) {
        $foodID = $_GET['id'];
        $foodName = $_GET['name'];
        $foodPrice = $_GET['price'];

        // Database connection configuration
        $servername = "localhost";
        $dbusername = "root";
        $dbpassword = "ROOT28";
        $dbname = "Final";

        // Create a connection
        $conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

        // Check the connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Create the "Cart" table if it doesn't exist
        $createTableQuery = "CREATE TABLE IF NOT EXISTS Cart (
            CartID INT(10) PRIMARY KEY AUTO_INCREMENT,
            FoodID INT(10) NOT NULL,
            FoodName VARCHAR(50) NOT NULL,
            Price DECIMAL(10, 2) NOT NULL
        )";
        if ($conn->query($createTableQuery) === FALSE) {
            echo "Error creating table: " . $conn->error;
            $conn->close();
            exit;
        }

        // Insert the selected food into the "Cart" table
        $insertQuery = "INSERT INTO Cart (FoodID, FoodName, Price) VALUES ('$foodID', '$foodName', '$foodPrice')";
        if ($conn->query($insertQuery) === TRUE) {
            // Display success message
            echo "Food added to cart successfully: " . $foodName;
        } else {
            echo "Error adding food to cart: " . $conn->error;
        }

        $conn->close();
    } else {
        echo "Invalid request.";
    }
?>


<div class="wrapper">
<h1>Cart</h1><br><hr><br>
<center>
    <table>
        <tr>
            <th>Food Name</th>
            <th>Price</th>
        </tr>

    <?php
        // Database connection configuration
        $servername = "localhost";
        $dbusername = "root";
        $dbpassword = "ROOT28";
        $dbname = "Final";

        // Create a connection
        $conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

        // Check the connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Retrieve items from the "Cart" table
        $query = "SELECT FoodName, Price FROM Cart";
        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $foodName = $row['FoodName'];
                $foodPrice = $row['Price'];

                echo "<tr>";
                echo "<td>$foodName</td>";
                echo "<td>$foodPrice</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr>";
            echo "<td colspan='2'>No items in the cart.</td>";
            echo "</tr>";
        }

        $conn->close();
    ?>

</table><br><hr>
</div>

<footer>
    <div class="footer-content">
        <p>&copy; <?php echo date("Y"); ?> Foodie Express. All rights reserved.</p>
    </div>
</footer>

</body>
</html>
