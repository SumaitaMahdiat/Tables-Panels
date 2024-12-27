<?php

require_once('dbconnection.php');
session_start(); // Start a session for user authentication

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = $conn->real_escape_string($_POST['username']);
    $email = $conn->real_escape_string($_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash the password for security

    // Insert into the database
    $sql = "INSERT INTO reader (Name, Email, Password) VALUES ('$name', '$email', '$password')";

    if ($conn->query($sql) === TRUE) {
        echo "Sign up successful!";
        // Redirect to home.php after successful sign-up
        header("Location: home.php");
        exit(); // Ensure the script stops executing after redirection
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
}

$conn->close();
?>
