<?php
// Include the database connection file
require_once('dbconnection.php');

// Check if the manga ID is passed via the URL
if (isset($_GET['Name'])) {
    $manga_id = $_GET['Name'];

    // Query to fetch manga details by manga_id
    $query = "SELECT * FROM manga WHERE Name = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $manga_id);  // Bind the manga ID (integer)
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        // Fetch the manga details
        $manga = $result->fetch_assoc();
    } else {
        // If no results are found, set $manga to null
        $manga = null;
    }
} else {
    // If no manga ID is provided, set $manga to null
    $manga = null;
}

// Check if $manga is not null before trying to access its values
if ($manga) {
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?php echo htmlspecialchars($manga['Name']); ?> - Manga Details</title>
        <link rel="stylesheet" href="css/style1.css" />
        
    </head>
    <body>

    <!-- Header -->
    <div class="header">
        <h1>TALES & PANELS</h1>
        <p>A getaway to the world of manga and novels</p>
    </div>

    <!-- Navbar -->
    <div class="navbar">
    <a href="home.php">Home</a>
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
    <div class="dropdown">
      <button class="dropbtn">My Bookmarks</button>
      <div class="dropdown-content">
        <a href="bookmarked_manga_pg.html">Manga</a>
        <a href="bookmarked_novel_pg.html">Novel</a>       
      </div>
    </div>
    
    <a href="logout.php" class="right">Log Out</a>
    <div class="search-container">
    <form action="search.php" method="GET">
        <input type="text" placeholder="Search for Manga.." name="query" required>
        <button type="submit">Go</button>
    </form>
</div>
</div>


    <!-- Manga Details -->
    <div class="container">
        <div class="title-section">
            <img src="<?php echo htmlspecialchars($manga['Covers']); ?>" alt="<?php echo htmlspecialchars($manga['Name']); ?> Cover">
            <div class="title-details">
                <h1><?php echo htmlspecialchars($manga['Name']); ?></h1>
                <p><strong>Author:</strong> <?php echo htmlspecialchars($manga['Author']); ?></p>
                <p><strong>Genre:</strong> <?php echo htmlspecialchars($manga['Genre']); ?></p>
                <p><strong>Rating:</strong> <?php echo htmlspecialchars($manga['Rating']); ?> / 5</p>
                <p><strong>Review:</strong> <?php echo htmlspecialchars($manga['Review']); ?></p>

                <div class="action-buttons">
                    <button>Like</button>
                    <button>Bookmark</button>
                </div>
            </div>
        </div>

        <!-- Description -->
        <div class="description">
            <h2>Description</h2>
            <p><?php echo htmlspecialchars($manga['Review']); ?></p>
        </div>

        <!-- Chapters -->
        <div class="description">
            <h2>Chapters</h2>
            <ul>
                <?php
                // Assuming the 'Chapters' field contains a comma-separated list of chapters
                $chapters = explode(',', $manga['Chapters']);
                foreach ($chapters as $chapter) {
                    echo "<li><a href='#'>Chapter " . htmlspecialchars($chapter) . "</a></li>";
                }
                ?>
            </ul>
        </div>
    </div>

    <!-- Footer -->
    <div class="footer">
        <p>&copy; 2025 Tales & Panels. All Rights Reserved.</p>
    </div>

    </body>
    </html>
    <?php
} else {
    // Handle the case where no manga was found or no ID was provided
    echo "Invalid manga ID.";
}
?>
