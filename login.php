<?php
require_once('DBconnect.php');

if(isset($_POST['Name']) && isset($_POST['Password'])){
    $username = $_POST['Name'];
    $password = $_POST['Password'];
    $sql = "SELECT * FROM users WHERE Name = '$username' AND Password = '$password'";
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) > 0){
        // echo "Let him enter";
        header("Location: home.php");
    }
    else{
        echo "Wrong username or password";
    }
}
?>