<?php
// Include the database connection file
require_once('dbconnection.php');
require_once( 'header.php'); 
// Check if the manga name is passed via the URL
if (isset($_GET['Name'])) {
    $manga_name = $_GET['Name'];

    // Query to fetch manga details by name
    $query = "SELECT * FROM manga WHERE Name = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $manga_name); // Bind the manga name (string)
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
    // If no manga name is provided, set $manga to null
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
        <link rel="stylesheet" href="style.css">
    </head>
    <body>

   
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
        <<div class="chapter-list">
    <h2>Chapters</h2>
    <ul>
        <li><a href="#">Chapter 1</a></li>
        <li><a href="#">Chapter 2</a></li>
        <li><a href="#">Chapter 3</a></li>
        <li><a href="#">Chapter 4</a></li>
        <li><a href="#">Chapter 5</a></li>
        <li><a href="#">Chapter 6</a></li>
        <li><a href="#">Chapter 7</a></li>
        <li><a href="#">Chapter 8</a></li>
        <li><a href="#">Chapter 9</a></li>
        <li><a href="#">Chapter 10</a></li>
    </ul>
</div>
    </div>

    
    <?php include('footer.php'); ?>

    </body>
    </html>
    <?php
} else {
    // Handle the case where no manga was found or no name was provided
    echo "Invalid manga name.";
}
?>
