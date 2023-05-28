<?php
    session_start();
    
    $servername = "localhost";
    $dbusername = "root";
    $dbpassword = "ROOT28";
    $dbname = "Final";

    // Create a connection
    $conn = new mysqli($servername, $dbusername, $dbpassword);

    // Check the connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Select the database
    $conn->select_db($dbname);

    // Create the "food" table if it doesn't exist
    $query = "CREATE TABLE IF NOT EXISTS JPFood (
                FoodID INT(10) PRIMARY KEY AUTO_INCREMENT,
                FoodName VARCHAR(50) NOT NULL,
                FoodImage VARCHAR(100) NOT NULL,
                Price DECIMAL(10, 2) NOT NULL
            )";
    mysqli_query($conn, $query);

    // Insert sample data into the "food" table only if it's empty
    $query = "SELECT * FROM JPFood";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) === 0) {
        $insertQuery = "INSERT INTO JPFood (FoodName, FoodImage, Price)
            VALUES
                ('Sushi set', 'JF1.jpg', 12.00),
                ('Ramen', 'JF2.jpg', 16.00),
                ('Tempura', 'JF3.jpg', 12.00),
                ('Udon', 'JF4.jpg', 14.00),
                ('Takoyaki', 'JF5.jpg', 8.00)";
        mysqli_query($conn, $insertQuery);
    }

    $conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Japanese Food Category</title>
    <link rel="stylesheet" href="Final.css">
    <style>
        body{
            background-image: url('images/food.jpg');
            background-repeat: 1;
            background-size: 100%;
            font-family: Times, sans-serif;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }

        .buy-now-btn {
            background-color: #4CAF50;
            color: white;
            padding: 8px 16px;
            border: none;
            cursor: pointer;
            border-radius: 4px;
        }

        .buy-now-btn:hover {
            background-color: #45a049;
        }

        footer {
            background-color: darkred;
            padding: 20px;
            text-align: center;
            margin-top: auto;
            bottom: 0;
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
		<li><a class="active" href="FA_Food.php">Food</a></li>
		<li><a href="FA_Cart.php">Cart</a></li>
		<li><a href="FA_Login.html">Login</a></li>
	</ul>
</nav><br>

<div class="wrapper">
<h1>Japanese Food Category</h1><br><hr><br>
<form method="post" action="FA_Cart.php">

<?php
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

    // Retrieve data from the "food" table
    $query = "SELECT * FROM JPFood";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        echo "<table>";
        echo "<tr>";
        echo "<th width = '200px'>FoodID</th>";
        echo "<th width = '200px'>FoodName</th>";
        echo "<th width = '200px'>FoodImage</th>";
        echo "<th width = '200px'>Price</th>";
        echo "<th width = '200px'>Buy Now</th>";
        echo "</tr>";

        $i = 1;
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['FoodID'] . "</td>";
            echo "<td>" . $row['FoodName'] . "</td>";
            echo "<td><img src='images/JF$i.jpg' height='120' width='120'/></td>";
            echo "<td>" . $row['Price'] . "</td>";
            echo "<td><button class='buy-now-btn' onclick='addToCart(" . $row['FoodID'] . ")'>Buy Now</button></td>";
            echo "</tr>";
            $i++;
        }

        echo "</table>";
    } else {
        echo "No records found.";
    }

    $conn->close();
?>
</div>

<script>
    function addToCart(foodId) {
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "FA_Cart.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                alert(xhr.responseText);
            }
        };
        xhr.send("food_id=" + foodId);
    }
</script>

<footer>
    <div class="footer-content">
        <p>&copy; <?php echo date("Y"); ?> Foodie Express. All rights reserved.</p>
    </div>
</footer>

</form>
</body>
</html>
