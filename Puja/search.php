<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Search Results</title>
    <link rel="stylesheet" href="css/style1.css" />
</head>
<body>

<?php require_once("header.php"); ?>

<div class="content">
    <?php
    // Include the database connection file
    require_once('dbconnection.php');

    // Check if the search query is set
    if (isset($_GET['query'])) {
        $searchQuery = $_GET['query'];

        // Query to fetch manga details based on the search query
        $mangaQuery = "SELECT * FROM manga WHERE Name LIKE ?";
        $novelQuery = "SELECT * FROM webnovels WHERE Name LIKE ?";
        
        // Prepare and execute manga search query
        $stmt = $conn->prepare($mangaQuery);
        $likeSearchQuery = "%" . $searchQuery . "%"; // Use wildcards for partial matching
        $stmt->bind_param("s", $likeSearchQuery);
        $stmt->execute();
        $mangaResult = $stmt->get_result();

        // Prepare and execute novel search query
        $stmt = $conn->prepare($novelQuery);
        $stmt->bind_param("s", $likeSearchQuery);
        $stmt->execute();
        $novelResult = $stmt->get_result();

        // Display manga results
        if ($mangaResult->num_rows > 0) {
            echo "<h2>Manga Results for '" . htmlspecialchars($searchQuery) . "':</h2>";
            while ($manga = $mangaResult->fetch_assoc()) {
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
            echo "<p>No manga found matching your search.</p>";
        }

        // Display novel results
        if ($novelResult->num_rows > 0) {
            echo "<h2>Novel Results for '" . htmlspecialchars($searchQuery) . "':</h2>";
            while ($novel = $novelResult->fetch_assoc()) {
                ?>
                <div class="manga-result">
                    <a href="novel_pg.php?Name=<?php echo urlencode($novel['Name']); ?>">
                        <div class="manga-item">
                            <img src="<?php echo htmlspecialchars($novel['Covers']); ?>" alt="<?php echo htmlspecialchars($novel['Name']); ?> Cover">
                            <div class="manga-info">
                                <h3><?php echo htmlspecialchars($novel['Name']); ?></h3>
                                <p><strong>Author:</strong> <?php echo htmlspecialchars($novel['Author']); ?></p>
                            </div>
                        </div>
                    </a>
                </div>
                <?php
            }
        } else {
            echo "<p>No novels found matching your search.</p>";
        }
    } else {
        echo "<p>Please enter a search query.</p>";
    }

    // Close the database connection
    $conn->close();
    ?>
</div>

<?php include('footer.php'); ?>

</body>
</html>

