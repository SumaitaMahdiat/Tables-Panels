<?php
// Database connection
require_once("dbconnection.php");

// Get the selected genre
$genre = $_GET['genre'] ?? ''; // Use null coalescing for simplicity

$mangaResult = false;
$novelResult = false;

if ($genre) {
    // Query to fetch manga details based on the genre
    $mangaSql = "SELECT name, author, covers FROM manga WHERE genre = ?";
    $mangaStmt = $conn->prepare($mangaSql);
    $mangaStmt->bind_param("s", $genre);
    $mangaStmt->execute();
    $mangaResult = $mangaStmt->get_result();

    // Query to fetch novel details based on the genre
    $novelSql = "SELECT name, author, covers FROM webnovels WHERE genre = ?";
    $novelStmt = $conn->prepare($novelSql);
    $novelStmt->bind_param("s", $genre);
    $novelStmt->execute();
    $novelResult = $novelStmt->get_result();
}

// Check for database connection errors
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Close the database connection
$conn->close();
?>

<?php require_once("header.php"); ?>
<div class="content">
    <?php if ($mangaResult && $mangaResult->num_rows > 0): ?>
        <h2>Manga in <?php echo htmlspecialchars($genre); ?> Genre:</h2>
        <?php while ($row = $mangaResult->fetch_assoc()): ?>
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

    <?php if ($novelResult && $novelResult->num_rows > 0): ?>
        <h2>Novels in <?php echo htmlspecialchars($genre); ?> Genre:</h2>
        <?php while ($row = $novelResult->fetch_assoc()): ?>
            <div class="manga-item">
                <div class="manga-left">
                    <img src="<?php echo htmlspecialchars($row['covers']); ?>" alt="Cover Image" class="manga-cover">
                </div>
                <div class="manga-right">
                    <a href="novel_pg.php?Name=<?php echo urlencode($row['name']); ?>">
                        <strong><?php echo htmlspecialchars($row['name']); ?></strong>
                    </a>
                    <p>Author: <?php echo htmlspecialchars($row['author']); ?></p>
                </div>
            </div>
        <?php endwhile; ?>
    <?php else: ?>
        <p>No novels found for the selected genre.</p>
    <?php endif; ?>
</div>

<?php include('footer.php'); ?>
</body>
</html>
