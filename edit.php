<?php
if (isset($_GET['username'], $_GET['password'], $_GET['name'], $_GET['location'])) {
    // Sanitize and store input data
    $username = filter_input(INPUT_GET, 'username', FILTER_SANITIZE_STRING);
    $password = filter_input(INPUT_GET, 'password', FILTER_SANITIZE_STRING);
    $name = filter_input(INPUT_GET, 'name', FILTER_SANITIZE_STRING);
    $location = filter_input(INPUT_GET, 'location', FILTER_SANITIZE_STRING);

    // Database configuration
    $db_host = 'localhost';
    $db_user = 'your_database_username';
    $db_pass = 'your_database_password';
    $db_name = 'your_database_name';

    // Create a database connection
    $conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

    // Check if the connection was successful
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    echo "Connected successfully";

    // Update the user information in the database
    $update_query = "UPDATE user_information SET password=?, Name=?, Location=? WHERE username=?";

    $stmt = $conn->prepare($update_query);

    if ($stmt) {
        $stmt->bind_param("ssss", $password, $name, $location, $username);

        if ($stmt->execute()) {
            echo "Record updated successfully";

            // Update session variables
            $_SESSION['name'] = $name;
            $_SESSION['password'] = $password;
            $_SESSION['location'] = $location;

            header("Location: user.php");
        } else {
            echo "Error updating record: " . $stmt->error;
        }

        // Close the prepared statement
        $stmt->close();
    } else {
        echo "Error preparing statement: " . $conn->error;
    }

    // Close the database connection
    $conn->close();
} else {
    echo "Error: Please input all the fields.";
}
