<?php
// Connect to the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tables_and_panels";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch songs for a specific genre
$genre = $_GET['genre']; // Assuming genre is passed via URL, e.g., ?genre=Fantasy
$sql = "SELECT Song_Name, Artist_Name, Song_URL FROM Playlist WHERE Genre = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $genre);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $song_url = $row['Song_URL'];

        // Convert YouTube link to embed format
        $embed_url = str_replace("watch?v=", "embed/", $song_url);

        echo "<h3>" . $row['Song_Name'] . " by " . $row['Artist_Name'] . "</h3>";
        echo "<iframe 
                width='300' 
                height='60' 
                src='$embed_url' 
                frameborder='0' 
                allow='autoplay; encrypted-media' 
                allowfullscreen>
              </iframe>";
    }
} else {
    echo "No songs found for this genre.";
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Songs by Genre</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            margin: 20px;
        }
        h3 {
            margin: 10px 0;
        }
        iframe {
            margin: 15px 0;
        }
    </style>
</head>
<body>
    <h1>Songs for Genre: <?php echo htmlspecialchars($_GET['genre']); ?></h1>
    <?php
    // PHP Code from Step 2 goes here
    ?>
</body>
</html>
