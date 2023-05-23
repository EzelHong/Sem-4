<!DOCTYPE html>
<html>
<head>
	<title>Show Register Form</title>
	<link rel="stylesheet" href="FA_Login.css">
</head>
<body>
<nav>
	<label class="logo">DeliverFood</label>
	<ul>
		<li><a class="active" href="FA_Home.php">Home</a></li>
		<li><a href="#">About</a></li>
		<li><a href="#">Services</a></li>
		<li><a href="#">Contact</a></li>
		<li><a href="#">Feedback</a></li>
		<li><a href="FA_Login.html">Login</a></li>
	</ul>
</nav><br>

<center>
<div class="wrapper">
<h2>Register Complete!</h2><br>
<?php
	if (isset($_POST["submit"])) {
		$username = $_POST["username"];
		$password = $_POST["password"];
		$confirm_password = $_POST["confirm_password"];
		$email = $_POST["email"];
		$dob = $_POST["dob"];
		$accept_terms = $_POST["terms"];

		if (empty($username) || empty($password) || empty($confirm_password) || empty($email) || empty($dob) || empty($accept_terms)) {
			echo "Error: All fields are required.";
		} elseif (strlen($username) > 15 || !preg_match('/^[A-Za-z0-9]+$/', $username)) {
			echo "Error: Username must be max 15 characters and contain only letters and numbers.";
		} elseif (strlen($password) < 4) {
			echo "Error: Password must be at least 4 characters long.";
		} elseif ($confirm_password !== $password) {
			echo "<script>alert('Error: Passwords do not match. Please make sure the password and confirm password fields are the same.'); window.location.href = 'FA_Register.html';</script>";
		} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			echo "Error: Invalid email format.";
		} else {
			$today = new DateTime();
			$dob_date = new DateTime($dob);
			$age = $today->diff($dob_date)->y;
	
			if ($age < 0 ) {
				echo "Error: You must be at least 18 years old to purchase items.";
			} else {
				echo "<table>";
				echo "<tr><td>Username:</td><td>" . $username . "</td></tr>";
				echo "<tr><td>Password:</td><td>" . $password . "</td></tr>";
				echo "<tr><td>Email:</td><td>" . $email . "</td></tr>";
				echo "<tr><td>Date of Birth:</td><td>" . $dob . "</td></tr>";
				echo "<tr><td>Acceptance of terms and conditions:</td><td>Yes</td></tr>";
				echo "</table>";
			}
		}
	} 
?>
<br><br>
<a href="FA_Login.html">Go to Login</a>
</div>
</body>
</html>
