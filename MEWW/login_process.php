<?php
session_start();
require_once('dbconnection.php');
if (isset($_POST['username']) && isset($_POST['password'])) {
    $login_id = $_POST['username'];
    $password = $_POST['password'];

    // Debug: Show what username and password are being received
    echo "Received username: $login_id <br>";
    echo "Received password: $password <br>";

    // Use prepared statements to prevent SQL injection
    $sql = "SELECT * FROM reader WHERE (Email = ? OR Name = ?)";

    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("ss", $login_id, $login_id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();

            // Debug: Check what is fetched from the database
            var_dump($user);

            // Verify the password using password_verify()
            if (password_verify($password, $user['Password'])) {
                // Set session variables after successful login
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['username'] = $user['Name'];

                // Debug: Confirm the session variables are set
                echo "Login successful! <br>";
                echo 'User ID: ' . $_SESSION['user_id'] . '<br>';
                echo 'Username: ' . $_SESSION['username'] . '<br>';

                // Redirect to home.php after successful login
                header("Location: home.php");
                exit();
            } else {
                echo "Wrong username or password.";
                $stmt->close();
                $conn->close();
            }
        } else {
            echo "No user found with this email/username.";
        }
    } else {
        echo "Error with the query!";
    }

    $stmt->close();
}
