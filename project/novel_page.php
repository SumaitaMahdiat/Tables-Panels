<?php
session_start();
// Include the database connection file
require_once('dbconnection.php');
require_once( 'header.php'); 
// Check if the novel name is passed via the URL
if (isset($_GET['Name'])) {
    $novel_name = $_GET['Name'];
   

    // Query to fetch manga details by name
    $query = "SELECT * FROM webnovels WHERE Name = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $novel_name); // Bind the manga name (string)
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        // Fetch the manga details
        $novel = $result->fetch_assoc();
        $Covers = $novel["Covers"]; 
        $imageUrl = "Covers for Tables/".$Covers;
    } else {
        // If no results are found, set $novel to null
        $novel = null;
    }
} else {
    // If no novel name is provided, set $novel to null
    $novel = null;
}

// Handle Like Button
if (isset($_POST['action']) && $_POST['action'] === 'like') {
    $novel_id = $novel['ID']; // Assuming manga has an `ID` column
    $query = "UPDATE webnovels SET Likes = Likes + 1 WHERE ID = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $novel_id);
    if ($stmt->execute()) {
        echo "Like added successfully!<br>";
    } else {
        echo "Error: " . $stmt->error . "<br>";
    }
    $stmt->close();
}

// Handle Bookmark Button
if (isset($_POST['action']) && $_POST['action'] === 'bookmark') {
    $username = $_SESSION['username']; // Assuming the username is stored in the session
    $novel_name = $novel['Name']; // Assuming the manga name is used as the identifier

    // First, check if the bookmark already exists
    $checkQuery = "SELECT * FROM bookmarks WHERE Reader_Name = ? AND Product_Name = ?";
    $stmt = $conn->prepare($checkQuery);
    $stmt->bind_param("ss", $username, $novel_name);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        // Bookmark already exists
        echo "Bookmark already exists!<br>";
    } else {
        // Bookmark doesn't exist, insert it
        $insertQuery = "INSERT INTO bookmarks (Reader_Name, Product_Name) VALUES (?, ?)";
        $stmt = $conn->prepare($insertQuery);
        $stmt->bind_param("ss", $username, $novel_name);
        if ($stmt->execute()) {
            echo "Bookmark added successfully!<br>";
        } else {
            echo "Error: " . $stmt->error . "<br>";
        }
    }
}
// Check if $novel is not null before trying to access its values
if ($novel) {
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?php echo htmlspecialchars($novel['Name']); ?> - Novel Details</title>
        <link rel="stylesheet" href="style.css" />
    </head>
    <body>

    <ul class="breadcrumb">
    <li><a href="home.php">Home</a></li> 
    <li><?php echo htmlspecialchars($novel['Name']); ?></li> 
    </ul>
    <!-- Novel Details -->
    <div class="container">
        <div class="title-section">
        <?php echo "<img src='$imageUrl'>"; ?>
            <div class="title-details">
                <h1><?php echo htmlspecialchars($novel['Name']); ?></h1>
                <p><strong>Author:</strong> <?php echo htmlspecialchars($novel['Author']); ?></p>
                <p><strong>Genre:</strong> <?php echo htmlspecialchars($novel['Genre']); ?></p>
                <p><strong>Rating:</strong> <?php echo htmlspecialchars($novel['Rating']); ?> / 5</p>
                <p><strong></strong> <?php echo htmlspecialchars($novel['Likes']); ?> reader(s) liked this manga.</p>
                <p><strong>Review:</strong> <?php echo htmlspecialchars($novel['Review']); ?></p>
                <div class="video-section">
        <?php if (!empty($novel['YT_Link'])): ?>
            <?php
            // Convert the yt_link to an embeddable YouTube URL
            $embedUrl = str_replace("watch?v=", "embed/", $novel['YT_Link']);
            // Append autoplay=1 to ensure the video plays automatically
            $embedUrl .= "?autoplay=1&enablejsapi=1&autohide=1&showinfo=0";
            ?>
            <div class="video-container">
                <iframe src="<?php echo htmlspecialchars($embedUrl); ?>" allow="autoplay; encrypted-media" allowfullscreen></iframe>
            </div>
        <?php else: ?>
            <p>No video available for this novel.</p>
        <?php endif; ?>
    </div>

    <script src="https://www.youtube.com/iframe_api"></script>

                <div class="action-buttons">
                  <button type="submit" name="action" value="like">Like</button>
                  <button type="submit" name="action" value="bookmark">Bookmark</button>
                </div>
            </div>
        </div>

        <!-- Description -->
        <div class="description">
            <h2>Summary</h2>
            <p><?php echo htmlspecialchars($novel['Summary']); ?></p>
        </div>
        <h3 class="extra-info">Extra Info:</h3>
        <div>Support the author by buying their work!</div>
        <!-- Chapters -->
        <div class="chapter-list">
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
    // Handle the case where no novel was found or no name was provided
    echo "Invalid novel name.";
}
?>
