<?php
session_start();
require_once('dbconnection.php');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = $conn->real_escape_string($_POST['username']);
    $email = $conn->real_escape_string($_POST['email']);
    $password = password_hash($conn->real_escape_string($_POST['password']), PASSWORD_DEFAULT); // Hash the password

    // Check if the email is already registered
    $sql_check = "SELECT * FROM reader WHERE Email = ?";
    if ($stmt_check = $conn->prepare($sql_check)) {
        $stmt_check->bind_param("s", $email);
        $stmt_check->execute();
        $result_check = $stmt_check->get_result();

        if ($result_check->num_rows > 0) {
            echo "Email already registered!";
        } else {
            // Insert the new user into the database
            $sql = "INSERT INTO reader (Name, Email, Password) VALUES (?, ?, ?)";
            if ($stmt = $conn->prepare($sql)) {
                $stmt->bind_param("sss", $name, $email, $password);
                if ($stmt->execute()) {
                    header("Location: index.php");
                    exit();
                } else {
                    echo "Error: " . $stmt->error;
                }
            }
        }
        $stmt_check->close();
    }
}

$conn->close();
?>