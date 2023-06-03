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

    // Retrieve the username and address from the user table
    $userQuery = "SELECT Username, Email, Address FROM users WHERE Username = '$name'";
    $userResult = mysqli_query($conn, $userQuery);

    if (mysqli_num_rows($userResult) > 0) {
        // Fetch the username and address
        $userData = mysqli_fetch_assoc($userResult);
        $username = $userData['Username'];
        $email = $userData['Email'];
        $address = $userData['Address'];

        // Retrieve all rows from the table
        $query = "SELECT * FROM $name";
        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) > 0) {
            // Define the filename for the download
            $filename = "Cart_data.csv";

            // Set the appropriate headers for CSV download
            header('Content-Type: text/csv');
            header('Content-Disposition: attachment; filename="' . $filename . '"');

            // Open a file pointer for writing
            $fp = fopen('php://output', 'w');

            // Write the username and address as CSV headers
            fputcsv($fp, array('Username', 'Email', 'Address'));
            fputcsv($fp, array($username, $email, $address));

            // Get the column names
            $columns = mysqli_fetch_fields($result);
            $columnNames = array();
            foreach ($columns as $column) {
                $columnNames[] = $column->name;
            }

            // Write the CSV headers for the table data
            fputcsv($fp, $columnNames);

            // Iterate over the rows and write data to the CSV file
            while ($row = mysqli_fetch_assoc($result)) {
                fputcsv($fp, $row);
            }

            fclose($fp);
        } else {
            echo "No data in the table.";
        }
    } else {
        echo "No user data found.";
    }

    $conn->close();
?>
