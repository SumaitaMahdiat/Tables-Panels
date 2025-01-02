<?php

require_once('C:\xampp1\htdocs\tales\370-project\login\dbconnection.php');

$sql = "SELECT name, genre, author,rating,covers FROM Manga";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "id: " . $row["name"]. " - Name: " . $row["author"]. " " . $row["rating"]. "<br>";
  }
} else {
  echo "0 results";
}
$conn->close();
?>