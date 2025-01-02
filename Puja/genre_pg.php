<?php
// Database connection
require_once("dbconnection.php");

// Get the selected genre
$genre = $_GET['genre'] ?? ''; // Use null coalescing for simplicity

if ($genre) {
    // Query to fetch manga details based on the genre
    $sql = "SELECT name, author, covers FROM manga WHERE genre = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $genre);
    $stmt->execute();
    $result = $stmt->get_result();
} else {
    $result = false;
}

// Check for database connection errors
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Genres - Manga Details</title>
    <link rel="stylesheet" href="css/style1.css" />
</head>
<body>
    <div class="header">
        <h1>TALES & PANELS</h1>
        <p>A getaway to the world of manga and novels</p>
    </div>

    <div class="navbar">
        <a href="home.php">Home</a>
        <a href="logout.php" class="right">Log Out</a>
        <div class="dropdown">
            <button class="dropbtn">Genres</button>
            <div class="dropdown-content">
                <a href="genre_pg.php?genre=Fantasy">Fantasy</a>
                <a href="genre_pg.php?genre=Comedy">Comedy</a>
                <a href="genre_pg.php?genre=Sports">Sports</a>
                <a href="genre_pg.php?genre=Romance">Romance</a>
                <a href="genre_pg.php?genre=Action">Action</a>
                <a href="genre_pg.php?genre=Horror">Horror</a>
            </div>
        </div>
        <div class="search-container">
            <form action="search.php" method="GET">
                <input type="text" placeholder="Search for Manga.." name="query" required>
                <button type="submit">Go</button>
            </form>
        </div>
    </div>

    <div class="content">
        <?php if ($result && $result->num_rows > 0): ?>
            <h2>Manga in <?php echo htmlspecialchars($genre); ?> Genre:</h2>
            <?php while ($row = $result->fetch_assoc()): ?>
                <div class="manga-item">
                    <div class="manga-left">
                        <img src="<?php echo htmlspecialchars($row['covers']); ?>" alt="Cover Image" class="manga-cover">
                    </div>
                    <div class="manga-right">
                        <a href="manga_pg.php?Name=<?php echo urlencode($row['name']); ?>">
                            <strong><?php echo htmlspecialchars($row['name']); ?></strong>
                        </a>
                        <p>Author: <?php echo htmlspecialchars($row['author']); ?></p>
                    </div>
                </div>
            <?php endwhile; ?>
        <?php else: ?>
            <p>No manga found for the selected genre.</p>
        <?php endif; ?>
    </div>

    <div class="footer">
        <p>Footer</p>
    </div>
</body>
</html>
