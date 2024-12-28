<?php

require_once('dbconnection.php');

if(isset($_POST['username']) && isset($_POST['password'])){
    $login_id = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM reader WHERE (Email = '$login_id' OR Name = '$login_id') AND Password = '$password'";

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
