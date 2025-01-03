
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?php echo htmlspecialchars($manga['Name']); ?> - Manga Details</title>
        <link rel="stylesheet" href="css/style1.css" />
    </head>
    <body>

    <?php require_once("header.php"); ?>
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
<?php include('footer.php'); ?>

