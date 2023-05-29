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

    // Select the database
    $conn->select_db($dbname);

    // Create the "food" table if it doesn't exist
    $query = "CREATE TABLE IF NOT EXISTS MYFood (
                FoodID INT(10) PRIMARY KEY AUTO_INCREMENT,
                FoodName VARCHAR(50) NOT NULL,
                FoodImage VARCHAR(100) NOT NULL,
                Price DECIMAL(10, 2) NOT NULL
            )";
    mysqli_query($conn, $query);

    // Insert sample data into the "food" table only if it's empty
    $query = "SELECT * FROM MYFood";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) === 0) {
        $insertQuery = "INSERT INTO MYFood (FoodName, FoodImage, Price)
            VALUES
                ('Nasi Lemak', 'MYF1.jpg', 3.00),
                ('Satay set', 'MYF2.jpg', 10.00),
                ('Roti Canai', 'MYF3.jpg', 2.00),
                ('Asam Laksa', 'MYF4.jpg', 8.00),
                ('Char Kuey Teow', 'MYF5.jpg', 7.00)";
        mysqli_query($conn, $insertQuery);
    }

    $conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Malaysia Food Category</title>
    <link rel="stylesheet" href="Final.css">
    <style>
        body{
            background-image: url('images/food.jpg');
            background-repeat: 1;
            background-size: 120%;
            background-position: center;
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
<h1>Malaysia Food Category</h1><br><hr><br>
<form method="post" action="FA_Cart.php">

<?php
    session_start();
    
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
    $query = "SELECT * FROM MYFood";
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
            $foodID = $row['FoodID'];
            $foodName = $row['FoodName'];
            $foodPrice = $row['Price'];

            echo "<tr>";
            echo "<td>" . $foodID . "</td>";
            echo "<td>" . $foodName . "</td>";
            echo "<td><img src='images/MYF$i.jpg' height='120' width='120'/></td>";
            echo "<td>" . $foodPrice . "</td>";
            echo "<td><a class='buy-now-btn' href='FA_Cart.php?id=" . $foodID . "&name=" . urlencode($foodName) . "&price=" . $foodPrice . "'>Buy Now</a></td>";
            echo "</tr>";
            $i++;
        }

        echo "</table>";
    } else {
        echo "No records found.";
    }

    $conn->close();
?>
<br>
<p><a href="javascript:history.go(-1)">Go back</a></p>
</div>

<footer>
    <div class="footer-content">
        <p>&copy; <?php echo date("Y"); ?> Foodie Express. All rights reserved.</p>
    </div>
</footer>

</form>
</body>
</html>
