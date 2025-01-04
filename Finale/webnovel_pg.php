<?php
session_start();
// Include the database connection file
require_once('dbconnection.php');
require_once('header.php');

// Check if the novel name is passed via the URL
if (isset($_GET['Name'])) {
    $novel_name = $_GET['Name'];

    // Query to fetch novel details by name
    $query = "SELECT * FROM webnovels WHERE Name = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $novel_name);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $novel = $result->fetch_assoc();
        $Covers = $novel["Covers"];
        $imageUrl = "Covers for Tables/" . $Covers;
    } else {
        $novel = null;
    }
} else {
    $novel = null;
}

if (!$novel) {
    die("Novel not found.");
}

// Handle Like Button
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['action']) && $_POST['action'] === 'like') {
        $novel_id = $novel['ID'];
        $query = "UPDATE webnovels SET Likes = Likes + 1 WHERE ID = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("i", $novel_id);
        if ($stmt->execute()) {
            echo "<script>alert('You liked this novel!');</script>";
        } else {
            echo "Error: " . $stmt->error;
        }
        $stmt->close();
    }

    // Handle Bookmark Button
    if (isset($_POST['action']) && $_POST['action'] === 'bookmark') {
        $username = $_SESSION['username'];
        $novel_name = $novel['Name'];

        $checkQuery = "SELECT * FROM bookmarks WHERE Reader_Name = ? AND Product_Name = ?";
        $stmt = $conn->prepare($checkQuery);
        $stmt->bind_param("ss", $username, $novel_name);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            echo "<script>alert('Bookmark already exists!');</script>";
        } else {
            $insertQuery = "INSERT INTO bookmarks (Reader_Name, Product_Name) VALUES (?, ?)";
            $stmt = $conn->prepare($insertQuery);
            $stmt->bind_param("ss", $username, $novel_name);
            if ($stmt->execute()) {
                echo "<script>alert('Bookmark added successfully!');</script>";
            } else {
                echo "Error: " . $stmt->error;
            }
        }
        $stmt->close();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo htmlspecialchars($novel['Name']); ?> - Novel Details</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<ul class="breadcrumb">
    <li><a href="home.php">Home</a></li>
    <li><?php echo htmlspecialchars($novel['Name']); ?></li>
</ul>

<div class="container">
    <div class="title-section">
        <img src="<?php echo htmlspecialchars($imageUrl); ?>" alt="Novel Cover">
        <div class="title-details">
            <h1><?php echo htmlspecialchars($novel['Name']); ?></h1>
            <p><strong>Author:</strong> <?php echo htmlspecialchars($novel['Author']); ?></p>
            <p><strong>Genre:</strong> <?php echo htmlspecialchars($novel['Genre']); ?></p>
            <p><strong>Rating:</strong> <?php echo htmlspecialchars($novel['Rating']); ?> / 5</p>
            <p><strong>Likes:</strong> <?php echo htmlspecialchars($novel['Likes']); ?> reader(s) liked this novel.</p>
            <p><strong>Review:</strong> <?php echo htmlspecialchars($novel['Review']); ?></p>
            <form method="POST" class="action-buttons">
                <button type="submit" name="action" value="like" class="btn btn-like">Like</button>
                <button type="submit" name="action" value="bookmark" class="btn btn-bookmark">Bookmark</button>
            </form>
        </div>
    </div>

    <div class="video-section">
        <?php if (!empty($novel['YT_Link'])): ?>
            <?php
            $embedUrl = str_replace("watch?v=", "embed/", $novel['YT_Link']);
            ?>
            <div class="video-container">
                <iframe src="<?php echo htmlspecialchars($embedUrl); ?>" allow="autoplay; encrypted-media" allowfullscreen></iframe>
            </div>
        <?php else: ?>
            <p>No video available for this novel.</p>
        <?php endif; ?>
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
    <div class="video-section">
        <?php if (!empty($novel['YT_Link'])): ?>
            <?php
            $embedUrl = str_replace("watch?v=", "embed/", $novel['YT_Link']);
            ?>
            <div class="video-container">
                <iframe src="<?php echo htmlspecialchars($embedUrl); ?>" allow="autoplay; encrypted-media" allowfullscreen></iframe>
            </div>
        <?php else: ?>
            <p>No video available for this novel.</p>
        <?php endif; ?>
    </div>

<?php include('footer.php'); ?>

</body>
</html>
