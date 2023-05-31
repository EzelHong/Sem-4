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
            box-shadow: 0 20px 40px;
        }

        table {
            background-color: white;
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
            background-color: #4CAF50;
            color: white;
            padding: 8px 16px;
            border: none;
            cursor: pointer;
            border-radius: 4px;
        }

        .button:hover{
            background-color: #45a049;
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

        $name = $_SESSION['username'];

        $servername = "localhost";
        $dbusername = "root";
        $dbpassword = "ROOT28";
        $dbname = "Final";

        $conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Create the "Cart" table if it doesn't exist
        $createTableQuery = "CREATE TABLE IF NOT EXISTS $name (
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

        // Insert the selected food into the "$username" table
        $insertQuery = "INSERT INTO $name (FoodID, FoodName, Price) VALUES ('$foodID', '$foodName', '$foodPrice')";
        if ($conn->query($insertQuery) === TRUE) {
        } 
        else {
            echo "Error adding food to cart: " . $conn->error;
        }

        $conn->close();
    } else {
        echo "";
    }
?>

<?php
    if (isset($_POST['delete_id'])) {
        $foodID = $_POST['delete_id'];
        $name = $_SESSION['username'];
    
        $servername = "localhost";
        $dbusername = "root";
        $dbpassword = "ROOT28";
        $dbname = "Final";
    
        $conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);
    
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
    
        // Delete the selected food from the cart
        $deleteQuery = "DELETE FROM $name WHERE CartID = $foodID";
        if ($conn->query($deleteQuery) === TRUE) {  
        } 
        else {
            echo "Error deleting food from cart: " . $conn->error;
        }
    
        $conn->close();
    }
?>


<div class="wrapper">
<h1>Cart</h1><br><hr><br>
<center>
    <table>
        <tr>
            <th>Cart ID</th>
            <th>Food Name</th>
            <th>Price</th>
            <th>Delete</th>
        </tr>

    <?php
        $servername = "localhost";
        $dbusername = "root";
        $dbpassword = "ROOT28";
        $dbname = "Final";

        $name = $_SESSION['username'];

        $conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Retrieve items from the "Cart" table
        $query = "SELECT CartID, FoodName, Price FROM $name";
        $result = mysqli_query($conn, $query);
        $totalPrice = 0;

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $foodID = $row['CartID'];
                $foodName = $row['FoodName'];
                $foodPrice = $row['Price'];
                $totalPrice += $foodPrice;

                echo "<tr>";
                echo "<td>$foodID</td>";
                echo "<td>$foodName</td>";
                echo "<td>RM $foodPrice</td>";
                echo "<td>
                        <form method='POST' action='FA_Cart.php'>
                            <input type='hidden' name='delete_id' value='$foodID'>
                            <button type='submit'>Delete</button>
                        </form>
                    </td>";
                echo "</tr>";
            }
            echo "<h3>Total Price: RM $totalPrice</h3><br>";
        } else {
            echo "<tr>";
            echo "<td colspan='4'>No items in the cart.</td>";
            echo "</tr>";
            
        }

        $conn->close();
    ?>
</table><br>

<form action="FA_Purchase.php" method="POST">
    <button type="submit" class="button">Purchase</button>
</form><br><hr><br>

<p><a href="javascript:history.go(-1)">Go back</a></p>
</div>

<footer>
    <div class="footer-content">
        <p>&copy; <?php echo date("Y"); ?> Foodie Express. All rights reserved.</p>
    </div>
</footer>

</body>
</html>
