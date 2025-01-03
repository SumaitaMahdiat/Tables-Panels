<?php
session_start();
require_once("dbconnection.php");

// Get the selected genre
$genre = $_GET['genre'] ?? ''; // Use null coalescing for simplicity
$mangaResult = false;
$novelResult = false;
$playlist = [];

if ($genre) {
    // Query to fetch manga details based on the genre
    $mangaSql = "SELECT name, author, covers, genre, chapters FROM manga WHERE genre = ?";
    $mangaStmt = $conn->prepare($mangaSql);
    $mangaStmt->bind_param("s", $genre);
    $mangaStmt->execute();
    $mangaResult = $mangaStmt->get_result();

    // Query to fetch novel details based on the genre
    $novelSql = "SELECT name, author, covers, genre, chapters FROM webnovels WHERE genre = ?";
    $novelStmt = $conn->prepare($novelSql);
    $novelStmt->bind_param("s", $genre);
    $novelStmt->execute();
    $novelResult = $novelStmt->get_result();

    // Query to fetch playlist details based on the genre
    $playlistSql = "SELECT Song_Name, Song_URL FROM playlist WHERE Genre = ?";
    $playlistStmt = $conn->prepare($playlistSql);
    $playlistStmt->bind_param("s", $genre);
    $playlistStmt->execute();
    $playlistResult = $playlistStmt->get_result();
    $playlist = $playlistResult->fetch_all(MYSQLI_ASSOC);

    $mangaStmt->close();
    $novelStmt->close();
    $playlistStmt->close();
}

// Check for database connection errors
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>

<?php require_once("header.php"); ?>
<div class="content">
    <!-- Manga Section -->
    <?php if ($mangaResult && $mangaResult->num_rows > 0): ?>
        <h2>Manga in <?php echo htmlspecialchars($genre); ?> Genre:</h2>
        <div class="gallery">
        <?php foreach ($mangaResult as $manga): ?>
            <div class="card">
                <?php $manga_name = $manga['name']; include('image.php'); ?>
                <h3><a href="manga_pg.php?name=<?php echo urlencode($manga['name']); ?>">
                        <strong><?php echo htmlspecialchars($manga['name']); ?></strong>
                    </a></h3>
                <p>Author: <?php echo htmlspecialchars($manga['author']); ?></p>
                <p>Genre: <?php echo htmlspecialchars($manga['genre']); ?></p>
                <p><?php echo htmlspecialchars($manga['chapters']); ?> Chapters</p>
            </div>
        <?php endforeach; ?>
        </div>
    <?php else: ?>
        <p>No manga found for the selected genre.</p>
    <?php endif; ?>

    <!-- Novel Section -->
    <?php if ($novelResult && $novelResult->num_rows > 0): ?>
        <h2>Novels in <?php echo htmlspecialchars($genre); ?> Genre:</h2>
        <div class="gallery">
        <?php foreach ($novelResult as $novel): ?>
            <div class="card">
                <?php $novel_name = $novel['name']; include('image.php'); ?>
                <h3><a href="webnovel_pg.php?name=<?php echo urlencode($novel['name']); ?>">
                        <strong><?php echo htmlspecialchars($novel['name']); ?></strong>
                    </a></h3>
                <p>Author: <?php echo htmlspecialchars($novel['author']); ?></p>
                <p>Genre: <?php echo htmlspecialchars($novel['genre']); ?></p>
                <p><?php echo htmlspecialchars($novel['chapters']); ?> Chapters</p>
            </div>
        <?php endforeach; ?>
        </div>
    <?php else: ?>
        <p>No novels found for the selected genre.</p>
    <?php endif; ?>

    <!-- Playlist Section -->
    <?php if (!empty($playlist)): ?>
        <h2>Playlist for <?php echo htmlspecialchars($genre); ?> Genre:</h2>
        <div id="video-container" class="video-container">
            <?php 
            $currentSong = $playlist[0]['Song_URL'];
            $embedURL = '';
            if (strpos($currentSong, "youtu.be") !== false) {
                $path = parse_url($currentSong, PHP_URL_PATH);
                $embedURL = "https://www.youtube.com/embed" . $path;
            } elseif (strpos($currentSong, "youtube.com") !== false && strpos($currentSong, "v=") !== false) {
                parse_str(parse_url($currentSong, PHP_URL_QUERY), $queryParams);
                $embedURL = "https://www.youtube.com/embed/" . $queryParams['v'];
            }
            ?>
            <iframe 
                id="player"
                src="<?php echo htmlspecialchars($embedURL); ?>?autoplay=1&enablejsapi=1" 
                allow="autoplay; encrypted-media" 
                allowfullscreen>
            </iframe>
        </div>
    <?php else: ?>
        <p>No songs found for the selected genre.</p>
    <?php endif; ?>
</div>

<?php include('footer.php'); ?>
</body>
</html>

