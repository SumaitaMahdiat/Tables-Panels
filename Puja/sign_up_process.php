<?php
    require_once('dbconnection.php');
    session_start(); 
    
    
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $name = $conn->real_escape_string($_POST['username']);
        $email = $conn->real_escape_string($_POST['email']);
        //$password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash the password for security
        $password = $conn->real_escape_string($_POST['password']);
        
        $sql = "INSERT INTO reader (Name, Email, Password) VALUES ('$name', '$email', '$password')";
    
        if ($conn->query($sql) === TRUE) {
            
            header("Location: index.php");
            exit(); 
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
    
    $conn->close();
    ?>
    
    


$conn->close();
?>
