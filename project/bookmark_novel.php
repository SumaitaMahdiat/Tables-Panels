<?php
// Include the database connection file
require_once('dbconnection.php');
require_once( 'header.php'); 




// Get the selected genre
$genre = $_GET['genre'] ?? ''; // Use null coalescing for simplicity

if ($genre) {
    // Query to fetch manga details based on the genre
    $sql = "SELECT name, author, covers FROM webnovels WHERE genre = ?";
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
    <link rel="stylesheet" href="style.css">
</head>

<body>

<ul class="breadcrumb">
    <li><a href="home.php">Home</a></li> 
    <li>Bookmarked Novels</li>   
  
</ul>

<div class="content">
        <?php if ($result && $result->num_rows > 0): ?>
            <h2>Bookmarked novels in <?php echo htmlspecialchars($genre); ?> Bookmared Novels:</h2>
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
            <p>No novel found.Please bookmark novels.</p>
        <?php endif; ?>
    </div>
    <?php include('footer.php'); ?>
    
</body>
</html>
