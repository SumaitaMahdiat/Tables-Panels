<?php
require_once("dbconnection.php");
if (isset($novel_name)) {
  
  $query = "SELECT * FROM webnovels WHERE name = ?";

  $stmt = $conn->prepare($query);
  $stmt->bind_param("s", $novel_name); // Bind the novel name (string)
  $stmt->execute();
  $result = $stmt->get_result();

  if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) { // Use fetch_assoc() for prepared statements
          $covers = $row["Covers"];
          $imageUrl = "Covers for Tables/" . $covers;
          
          // Debugging - Echo the path to ensure it's correct
          //echo "Image URL: " . $imageUrl . "<br>";
          
          // Display the image
          echo "<img src='$imageUrl' alt='Cover Image' />";
      }
  } else {
      echo "No images found for the specified novel.";
  }
} else {
  echo "No 'Name' parameter provided.";
}
?>