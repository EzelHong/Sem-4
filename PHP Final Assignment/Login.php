<?php
    if (isset($_POST["submit"])) {
        // Retrieve user inputs
        $name = $_POST["username"];
        $userpassword = $_POST["password"];

        // Database credentials
        $servername = "localhost";
        $dbusername = "root";
        $dbpassword = "ROOT28";
        $dbname = "Final";

        // Create a connection
        $conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Query to check if the username and password match
        $sql = "SELECT * FROM users WHERE username = '$name' AND password = '$userpassword'";
        $result = $conn->query($sql);

        if ($result->num_rows == 1) {
            // Login successful
            echo "Login successful";

            // Redirect the user to FA_Home.php
            header("Location: FA_Home.php");
            exit();
        } else {
            // Login failed
            echo "Invalid username or password";
        }

        $conn->close();
    }
?>
