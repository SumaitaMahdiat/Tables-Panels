<?php
session_start();
// Debugging: Show session variables
if (!isset($_SESSION['username'])) {
    die("User not logged in.");
}
// Include the database connection file
include('C:/xampp/Xampp/htdocs/tales_and_panels/dbconnection.php');

// Check if the manga name is passed via the URL
$manga = null; // Initialize $manga variable
if (isset($_GET['Name'])) {
    $manga_name = $_GET['Name'];
    // Query to fetch manga details by name
    $query = "SELECT * FROM manga WHERE Name = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $manga_name);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        $manga = $result->fetch_assoc();
    }
    $stmt->close();
}

if (!$manga) {
    die("Manga not found.");
}

// Handle Like Button
if (isset($_POST['action']) && $_POST['action'] === 'like') {
    $manga_id = $manga['ID']; // Assuming manga has an `ID` column
    $query = "UPDATE manga SET Likes = Likes + 1 WHERE ID = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $manga_id);
    if (!$stmt->execute()) {
        echo "Like added successfully!<br>";
    } else {
        echo "Error: " . $stmt->error . "<br>";
    }
    $stmt->close();
}

// Handle Bookmark Button
if (isset($_POST['action']) && $_POST['action'] === 'bookmark') {
    $username = $_SESSION['username']; // Assuming the username is stored in the session
    $manga_name = $manga['Name']; // Assuming the manga name is used as the identifier

    // First, check if the bookmark already exists
    $checkQuery = "SELECT * FROM bookmarks WHERE Reader_Name = ? AND Product_Name = ?";
    $stmt = $conn->prepare($checkQuery);
    $stmt->bind_param("ss", $username, $manga_name);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Bookmark already exists
        echo "Bookmark already exists!<br>";
    } else {
        // Bookmark doesn't exist, insert it
        $insertQuery = "INSERT INTO bookmarks (Reader_Name, Product_Name) VALUES (?, ?)";
        $stmt = $conn->prepare($insertQuery);
        $stmt->bind_param("ss", $username, $manga_name);

        if ($stmt->execute()) {
            echo "Bookmark added successfully!<br>";
        } else {
            echo "Error: " . $stmt->error . "<br>";
        }
    }
    $stmt->close();
}
?>





<!DOCTYPE html>
<html lang="en">
<?php include('C:/xampp/Xampp/htdocs/tales_and_panels/header.php'); ?>

<body>
    <ul class="breadcrumb">
        <li><a href="home 1.php">Home</a></li>
        <li><?php echo htmlspecialchars($manga['Name']); ?></li>
    </ul>

    <div class="container">
        <div class="title-section">
            <img src="<?php echo htmlspecialchars($manga['Covers']); ?>" alt="<?php echo htmlspecialchars($manga['Name']); ?> Cover">
            <div class="title-details">
                <h1><?php echo htmlspecialchars($manga['Name']); ?></h1>
                <p><strong>Author:</strong> <?php echo htmlspecialchars($manga['Author']); ?></p>
                <p><strong>Genre:</strong> <?php echo htmlspecialchars($manga['Genre']); ?></p>
                <p><strong>Chapters:</strong> <?php echo htmlspecialchars($manga['Chapters']); ?></p>
                <p><strong>Rating:</strong> <?php echo htmlspecialchars($manga['Rating']); ?> / 5</p>
                <p><strong>Review:</strong> <?php echo htmlspecialchars($manga['Review']); ?></p>
            </div>
        </div>

        <form method="post" action="">
            <div class="action-buttons">
                <button type="submit" name="action" value="like">Like</button>
                <button type="submit" name="action" value="bookmark">Bookmark</button>
            </div>
        </form>

        <div class="description">
            <h2>Description</h2>
            <p><?php echo htmlspecialchars($manga['Summary']); ?></p>
            
        </div>
        <h3 class="extra-info">Extra Info:</h3>
        <div>Support the author by buying their work!</div>
    </div>

    <h2 style="text-align: center;">Chapters</h2>
    <div style="text-align: center;">
        <ul style="list-style: none; padding: 0; display: inline-block; text-align: left;">
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

    <div class="video-section">
        <?php if (!empty($manga['YT_Link'])): ?>
            <?php
            // Convert the yt_link to an embeddable YouTube URL
            $embedUrl = str_replace("watch?v=", "embed/", $manga['YT_Link']);
            // Append autoplay=1 to ensure the video plays automatically
            $embedUrl .= "?autoplay=1&enablejsapi=1&autohide=1&showinfo=0";
            ?>
            <div class="video-container">
                <iframe src="<?php echo htmlspecialchars($embedUrl); ?>" allow="autoplay; encrypted-media" allowfullscreen></iframe>
            </div>
        <?php else: ?>
            <p>No video available for this manga.</p>
        <?php endif; ?>
    </div>

</body>

    <style>
        .description p {
            width: 80%; /* Set the width to 80% of the page */
            margin: 0 auto; /* Center the text */
            line-height: 1.6; /* Optional: Adjust line height for readability */
        }

        .video-container {
            position: fixed;
            top: 45%;
            /* Center vertically */
            right: 0;
            /* Align to the right */
            transform: translateY(-50%);
            /* Adjust for vertical centering */
            margin: 0;
            padding: 0;
            z-index: 1000;
        }

        iframe {
            width: 850px;
            height: 350px;
            border: black;
        }
    </style>

    <script src="https://www.youtube.com/iframe_api"></script>
<?php include('C:/xampp/Xampp/htdocs/tales_and_panels/footer.php'); ?>

</html>