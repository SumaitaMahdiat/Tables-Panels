<?php

require_once('dbconnection.php');

if(isset($_GET['search'])){
    $searchName = $_GET['search'];
   

    $sql = "SELECT * FROM manga WHERE Name Like %$searchName$ ";

    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) > 0){
        // echo "Let him enter";
        while ($row = $result->fetch_assoc())
          echo "<li><strong>Name:</strong></li>";
          header("Location: manga page.html")
    }
    else{
        echo "Title not found.";
    }
}

