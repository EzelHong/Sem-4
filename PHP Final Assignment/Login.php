<?php
    session_start();

    if (isset($_POST["submit"])) {
        // Retrieve user inputs
        $name = $_POST["username"];
        $userpassword = $_POST["password"];

        $servername = "localhost";
        $dbusername = "root";
        $dbpassword = "ROOT28";
        $dbname = "Final";

        $conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Check username and password match
        $sql = "SELECT * FROM users WHERE username = '$name' AND password = '$userpassword'";
        $result = $conn->query($sql);

        if ($result->num_rows == 1) {
            // Login successful take session username
            echo "Login successful";
            $_SESSION['username'] = $name;

            // Create a cart table for the user if it doesn't exist
            $createCartTableQuery = "CREATE TABLE IF NOT EXISTS $name (
                CartID INT(10) PRIMARY KEY AUTO_INCREMENT,
                FoodID INT(10) NOT NULL,
                FoodName VARCHAR(50) NOT NULL,
                Price DECIMAL(10, 2) NOT NULL
            )";

            if ($conn->query($createCartTableQuery) === FALSE) {
                echo "Error creating cart table: " . $conn->error;
                $conn->close();
                exit;
            }
            header("Location: FA_Home.php");
            exit();

        } else {
            echo "Invalid username or password";
        }

        $conn->close();
    }
?>
