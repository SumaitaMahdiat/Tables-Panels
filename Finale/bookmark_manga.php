<?php
session_start();
// Include the database connection file
require_once('dbconnection.php');
require_once('header.php'); 

// Ensure the user is logged in
if (!isset($_SESSION['username'])) {
    die("You need to log in to view your bookmarks.");
}

// Get the username from the session
$username = $_SESSION['username'];

// Fetch bookmarked mangas for the logged-in user
$sql = "SELECT m.name, m.author, m.covers 
        FROM bookmarks b
        JOIN manga m ON b.Product_Name = m.Name
        WHERE b.Reader_Name = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();

// Check for database connection errors
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Close the database connection

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bookmarked Manga</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

<ul class="breadcrumb">
    <li><a href="home.php">Home</a></li> 
    <li>Bookmarked Manga</li>   
</ul>

<div class="content">
    <?php if ($result && $result->num_rows > 0): ?>
        <h2>Your Bookmarked Mangas:</h2>
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
        <p>No manga found. Please bookmark mangas.</p>
    <?php endif; ?>
</div>

<?php include('footer.php'); ?>
</body>
</html>
