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

<?php require_once("header.php"); ?>
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

    <?php include('footer.php'); ?>
</body>
</html>
