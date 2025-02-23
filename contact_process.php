<?php
    // Database configuration
    $servername = "localhost";
    $username = "root";  // default xampp username
    $password = "";       // default xampp password
    $dbname = "portfolio_db";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Form data
    $username = $_POST['username'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    // Prepare SQL statement
    $sql = "INSERT INTO contacts (username, email, subject, message)
            VALUES ('$username', '$email', '$subject', '$message')";

    // Execute the query
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
        // Redirect back to the main page or a thank you page
        header("Location: index.html");  // Redirect to index.html
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the connection
    $conn->close();
?>
