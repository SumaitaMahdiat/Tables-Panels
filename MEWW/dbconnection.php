<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tales_and_panels";
$conn = mysqli_connect($servername, $username, $password, $dbname);
if(!$conn) {
    echo ("Connection failed: " . mysqli_connect_error());
}

