<?php
session_start();

if (isset($_GET['username'], $_GET['password'], $_GET['name'], $_GET['location'])) {
    $username = $_GET['username'];
    $password = $_GET['password'];
    $name = $_GET['name'];
    $location = $_GET['location'];

    // Database info
    $host = 'localhost'; 
    $db_username = 'root'; 
    $db_password = ''; 
    $database = 'cat2';

    // Connection object
    $conn = new mysqli($host, $db_username, $db_password, $database);

    // Check if the connection was successful
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare the SQL statement
    $sql = "UPDATE `user information` SET `password`=?, `Name`=?, `Location`=? WHERE `username`=?";
    $stmt = $conn->prepare($sql);

    // Bind parameters to the statement
    $stmt->bind_param("ssss", $password, $name, $location, $username);

    // Execute the statement
    if ($stmt->execute()) {
        // Update session variables
        $_SESSION['name'] = $name;
        $_SESSION['password'] = $password;
        $_SESSION['location'] = $location;

        header("Location: user.php");
        exit();
    } else {
        // Handle errors
        echo "Error updating record: " . $conn->error;
    }

    // Close the statement and database connection
    $stmt->close();
    $conn->close();
} else {
    echo "Error: Please input all the fields.";
}
?>
