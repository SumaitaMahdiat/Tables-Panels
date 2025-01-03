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

// Fetch bookmarked web novels for the logged-in user
$sql = "SELECT w.name, w.author, w.covers 
        FROM bookmarks b
        JOIN webnovels w ON b.Product_Name = w.Name
        WHERE b.Reader_Name = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();

// Close the database connection
$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bookmarked Web Novels</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<ul class="breadcrumb">
    <li><a href="home.php">Home</a></li>
    <li>Bookmarked Web Novels</li>
</ul>

<div class="content">
    <?php if ($result && $result->num_rows > 0): ?>
        <h2>Your Bookmarked Web Novels:</h2>
        <?php while ($row = $result->fetch_assoc()): ?>
            <div class="novel-item">
                <div class="novel-left">
                    <img src="<?php echo htmlspecialchars($row['covers']); ?>" alt="Cover Image" class="novel-cover">
                </div>
                <div class="novel-right">
                    <a href="webnovel_pg.php?Name=<?php echo urlencode($row['name']); ?>">
                        <strong><?php echo htmlspecialchars($row['name']); ?></strong>
                    </a>
                    <p>Author: <?php echo htmlspecialchars($row['author']); ?></p>
                </div>
            </div>
        <?php endwhile; ?>
    <?php else: ?>
        <p>No web novels found. Please bookmark your favorite novels.</p>
    <?php endif; ?>
</div>

<?php include('footer.php'); ?>
</body>
</html>
