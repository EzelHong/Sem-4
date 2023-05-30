<!DOCTYPE html>
<html>
<head>
	<title>Show Register Form</title>
	<link rel="stylesheet" href="FA_Login.css">
</head>
<body>
<nav>
	<label class="logo">Foodie Express</label>
	<ul>
		<li><a href="FA_Home.php">Home</a></li>
		<li><a href="#">About</a></li>
		<li><a href="#">Food</a></li>
		<li><a href="#">Cart</a></li>
		<li><a href="FA_Login.html">Login</a></li>
	</ul>
</nav><br>

<center>
<div class="wrapper">
<h2>Register Complete!</h2><br>

<?php
    session_start();
    
    $servername = "localhost";
    $dbusername = "root";
    $dbpassword = "ROOT28";

    $conn = new mysqli($servername, $dbusername, $dbpassword);

    // Check the connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Create the database
    $sql = "CREATE DATABASE IF NOT EXISTS Final";
    if ($conn->query($sql) === TRUE) {
        echo "Database created successfully, ";
    } else {
        echo "Error creating database: " . $conn->error;
    }

    $conn->close();

	//Table
    $servername = "localhost";
    $dbusername = "root";
    $dbpassword = "ROOT28";
    $dbname = "Final";

    $conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

    // Check the connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Create the "users" table
    $sql = "CREATE TABLE IF NOT EXISTS users (
        username VARCHAR(30) NOT NULL PRIMARY KEY,
        password VARCHAR(30) NOT NULL,
        email VARCHAR(250) NOT NULL,
        address VARCHAR(250) NOT NULL,
        dob DATE NOT NULL
    )";
    
    if ($conn->query($sql) === TRUE) {
        echo "Table created successfully";
    } else {
        echo "Error creating table: " . $conn->error;
    }

    $conn->close();
?>


<?php
	if (isset($_POST["submit"])) {
		$name = $_POST["username"];
		$userpassword = $_POST["password"];
		$confirm_password = $_POST["confirm_password"];
		$email = $_POST["email"];
		$address = $_POST["address"];
		$dob = $_POST["dob"];
		$accept_terms = $_POST["terms"];

		$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Insert user data into the table
        $sql = "INSERT INTO users (username, password, email, address, dob) VALUES ('$name', '$userpassword', '$email', '$address', '$dob')";
        if ($conn->query($sql) === TRUE) {
            echo "User registered successfully <br><br>";
        } else {
            echo "<strong>Error! Username has been taken Please Register Again! </strong><br><br>";
        }

        $conn->close();
		
		if (empty($name) || empty($userpassword) || empty($confirm_password) || empty($email) || empty($address) || empty($dob) || empty($accept_terms)) {
			echo "Error: All fields are required.";
		} elseif (strlen($name) > 30 || !preg_match('/^[A-Za-z0-9]+$/', $name)) {
			echo "Error: Username must be max 30 characters and contain only letters and numbers.";
		} elseif (strlen($userpassword) < 4) {
			echo "Error: Password must be at least 4 characters long.";
		} elseif ($confirm_password !== $userpassword) {
			echo "<script>alert('Error: Passwords do not match. Password and Confirm Password fields must same.'); 
            window.location.href = 'FA_Register.html';</script>";
		} elseif (!filter_var($address)) {
			echo "Error: Please enter your address.";
		} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			echo "Error: Invalid email format.";
		}

		else {
			echo "<table>";
			echo "<tr><td>Username:</td><td>" . $name . "</td></tr>";
			echo "<tr><td>Password:</td><td>" . $userpassword . "</td></tr>";
			echo "<tr><td>Email:</td><td>" . $email . "</td></tr>";
			echo "<tr><td>Address:</td><td>" . $address . "</td></tr>";
			echo "<tr><td>Date of Birth:</td><td>" . $dob . "</td></tr>";
			echo "<tr><td>Acceptance of terms and conditions:</td><td>Yes</td></tr>";
			echo "</table>";
		}
	}
?>
<br><br>
<a href="FA_Login.html">Go to Login</a>
</div>
</body>
</html>
