<?php

require_once('dbconnection.php');

if $slug = isset($_GET['slug']) ? $conn->real_escape_string($_GET['slug']) : '')

if ($slug) {

    $sql = "SELECT * FROM manga WHERE slug ='$slug'";

    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) > 0){
        $manga = $result->fetch_assoc();
    } else {
        die("Manga not found.");
    }
} else {
    die("Invalid request.");
}



if(mysqli_num_rows($result) > 0){
    // echo "Go to home";
    header("Location: home.php");
}
else{
    echo "Wrong address";
}