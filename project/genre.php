<?php
// Database connection
require_once("dbconnection.php");

// Get the selected genre
$genre = $_GET['genre'] ?? ''; // Use null coalescing for simplicity

$mangaResult = false;
$novelResult = false;

if ($genre) {
    // Query to fetch manga details based on the genre
    $mangaSql = "SELECT name, author, covers, genre, chapters FROM manga WHERE genre = ?";
    $mangaStmt = $conn->prepare($mangaSql);
    $mangaStmt->bind_param("s", $genre);
    $mangaStmt->execute();
    $mangaResult = $mangaStmt->get_result();

    // Query to fetch novel details based on the genre
    $novelSql = "SELECT name, author, covers,genre,chapters FROM webnovels WHERE genre = ?";
    $novelStmt = $conn->prepare($novelSql);
    $novelStmt->bind_param("s", $genre);
    $novelStmt->execute();
    $novelResult = $novelStmt->get_result();
}

// Check for database connection errors
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}



?>

<?php require_once("header.php"); ?>
<div class="content">
    <?php if ($mangaResult && $mangaResult->num_rows > 0): ?>
        <h2>Manga in <?php echo htmlspecialchars($genre); ?> Genre:</h2>
     
        <div class="gallery">
        <?php foreach ($mangaResult as $manga): ?>
            <div class="card">
            
            <?php   $manga_name = $manga['name'];
                    include('image.php'); ?>
                <h3><a href="manga_page.php?name=<?php echo urlencode($manga['name']); ?>">
                            <strong><?php echo htmlspecialchars($manga['name']); ?></strong>
                        </a></h3>
                <p>Author: <?php echo htmlspecialchars($manga['author']); ?></p>
                <p>Genre:<?php echo htmlspecialchars($manga['genre']); ?></p>
                <p><?php echo htmlspecialchars($manga['chapters']); ?> Chapters</p>
            </div>
           
        <?php endforeach; ?>
    </div>
    <?php else: ?>
        <p>No manga found for the selected genre.</p>
    <?php endif; ?>

    <?php if ($novelResult && $novelResult->num_rows > 0): ?>
        <h2>Novels in <?php echo htmlspecialchars($genre); ?> Genre:</h2>
        <div class="gallery">
        <?php foreach ($novelResult as $novel): ?>
            <div class="card">
            
            <?php   $novel_name = $novel['name'];
                    include('image.php'); ?>
                <h3><a href="novel_page.php?name=<?php echo urlencode($novel['name']); ?>">
                            <strong><?php echo htmlspecialchars($novel['name']); ?></strong>
                        </a></h3>
                <p>Author: <?php echo htmlspecialchars($novel['author']); ?></p>
                <p>Genre:<?php echo htmlspecialchars($novel['genre']); ?></p>
                <p><?php echo htmlspecialchars($novel['chapters']); ?> Chapters</p>
            </div>
           
        <?php endforeach; ?>
    </div>
    <?php else: ?>
        <p>No novels found for the selected genre.</p>
    <?php endif; ?>
</div>

<?php include('footer.php'); ?>
</body>
</html>
