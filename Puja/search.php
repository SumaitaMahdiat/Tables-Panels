
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


<?php
// Include the database connection file
require_once('dbconnection.php');

// Check if the search query is set
if (isset($_GET['query'])) {
    $searchQuery = $_GET['query'];

    // Query to fetch manga details based on the search query
    $query = "SELECT * FROM manga WHERE Name LIKE ?";
    $stmt = $conn->prepare($query);
    $searchQuery = "%" . $searchQuery . "%";  // Use wildcards for partial matching
    $stmt->bind_param("s", $searchQuery);  // Bind the search query (string)
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        // Display each manga as a clickable link
        while ($manga = $result->fetch_assoc()) {
            ?>
            <div class="manga-result">
                <a href="manga_pg.php?Name=<?php echo urlencode($manga['Name']); ?>">
                    <div class="manga-item">
                        <img src="<?php echo htmlspecialchars($manga['Covers']); ?>" alt="<?php echo htmlspecialchars($manga['Name']); ?> Cover">
                        <div class="manga-info">
                            <h3><?php echo htmlspecialchars($manga['Name']); ?></h3>
                            <p><strong>Author:</strong> <?php echo htmlspecialchars($manga['Author']); ?></p>
                        </div>
                    </div>
                </a>
            </div>
            <?php
        }
    } else {
        echo "No manga found matching your search.";
    }
} else {
    echo "Please enter a search query.";
}
?>

