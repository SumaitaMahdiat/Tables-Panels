<?php
// Database connection
$host = 'localhost';
$user = 'root';
$password = '';
$dbname = 'tales';

$conn = new mysqli($host, $user, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch genres
$sql = "SELECT DISTINCT genre FROM Manga";
$result = $conn->query($sql);

// Display genres in the sidebar
if ($result->num_rows > 0) {
    echo '<h2>Genres</h2>';
    echo '<ul>';
    while ($row = $result->fetch_assoc()) {
        $genre = htmlspecialchars($row['genre']);
        echo '<li><a href="genre.php?genre=' . urlencode($genre) . '">' . $genre . '</a></li>';
    }
    echo '</ul>';
} else {
    echo '<p>No genres found.</p>';
}

$conn->close();
?>
