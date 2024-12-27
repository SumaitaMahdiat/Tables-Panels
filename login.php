<?php

require_once('dbconnection.php');

if(isset($_POST['loginid']) && isset($_POST['password'])){
    $loginid = $_POST['loginid'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM reader WHERE (Name = '$loginid' OR Email = '$loginid') AND Password = '$password'";

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
