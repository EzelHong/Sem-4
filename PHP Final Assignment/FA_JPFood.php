<?php
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
    $query = "CREATE TABLE IF NOT EXISTS food (
                FoodID INT(10) PRIMARY KEY AUTO_INCREMENT,
                FoodName VARCHAR(50) NOT NULL,
                FoodImage VARCHAR(100) NOT NULL,
                Price DECIMAL(10, 2) NOT NULL
            )";
    mysqli_query($conn, $query);

    // Insert sample data into the "food" table only if it's empty
    $query = "SELECT * FROM food";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) === 0) {
        $insertQuery = "INSERT INTO food (FoodName, FoodImage, Price)
            VALUES
                ('Sushi set', 'Sushi.jpg', 10.99),
                ('Burger', 'burger.jpg', 8.99),
                ('Pasta', 'pasta.jpg', 12.99),
                ('Salad', 'salad.jpg', 6.99),
                ('Ice Cream', 'icecream.jpg', 4.99)";
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
        /* Additional CSS styles for the table */
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
    </style>
</head>
<body>
<nav>
	<label class="logo">Foodie Express</label>
	<ul>
		<li><a href="FA_Home.php">Home</a></li>
		<li><a href="FA_About.php">About</a></li>
		<li><a class="active" href="FA_Food.php">Food</a></li>
		<li><a href="#">Cart</a></li>
		<li><a href="FA_Login.html">Login</a></li>
	</ul>
</nav><br>

<div class="wrapper">

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
    $query = "SELECT * FROM food";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        echo "<table>";
        echo "<tr>";
        echo "<th>FoodID</th>";
        echo "<th>FoodName</th>";
        echo "<th>FoodImage</th>";
        echo "<th>Price</th>";
        echo "<th>Buy Now</th>";
        echo "</tr>";

        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['FoodID'] . "</td>";
            echo "<td>" . $row['FoodName'] . "</td>";
            echo "<td><img src='images/JPF.jpg' width='100' height='100'></td>";
            echo "<td>" . $row['Price'] . "</td>";
            echo "<td><button class='buy-now-btn'>Buy Now</button></td>";
            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "No records found.";
    }

    $conn->close();
?>
</div>
</body>
</html>
