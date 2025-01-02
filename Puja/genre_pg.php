<?php
// Database connection
require_once("dbconnection.php");

// Get the selected genre
$genre = $_GET['genre'] ?? ''; // Use null coalescing for simplicity

if ($genre) {
    // Query to fetch manga details based on the genre
    $sql = "SELECT name, author, covers FROM manga WHERE genre = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $genre);
    $stmt->execute();
    $result = $stmt->get_result();
} else {
    $result = false;
}

// Check for database connection errors
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Genres</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        * {box-sizing: border-box;}
        body { font-family: Arial, Helvetica, sans-serif; margin: 0; padding: 0; }
        .header { padding: 10px; text-align: center; background: #1abc9c; color: white; }
        .header h1 { font-size: 40px; }
        .navbar { overflow: hidden; background-color: #333; font-family: Arial; }
        .navbar a, .dropdown .dropbtn { float: left; font-size: 16px; color: white; text-align: center; padding: 14px 16px; text-decoration: none; }
        .navbar a:hover, .dropdown:hover .dropbtn { background-color: red; }
        .dropdown { float: left; overflow: hidden; }
        .dropdown-content { display: none; position: absolute; background-color: #f9f9f9; min-width: 160px; z-index: 1; }
        .dropdown-content a { float: none; color: black; padding: 12px 16px; text-decoration: none; display: block; }
        .dropdown:hover .dropdown-content { display: block; }
        .breadcrumb { padding: 10px 16px; list-style: none; background-color: #eee; }
        .breadcrumb li { display: inline; font-size: 18px; }
        .breadcrumb li+li:before { padding: 8px; color: black; content: "/\00a0"; }
        .breadcrumb li a { color: #0275d8; text-decoration: none; }
        .breadcrumb li a:hover { color: #01447e; text-decoration: underline; }
        .footer { position: fixed; left: 0; bottom: 0; width: 100%; background-color: black; color: white; text-align: center; }
        .content { padding: 20px; }
        .manga-item { background: #eee; margin-bottom: 20px; padding: 10px; border-radius: 5px; }
        .manga-item img { width: 100px; height: auto; border-radius: 5px; }
        .manga-item strong { font-size: 18px; }
    </style>
</head>
<body>
    <div class="header">
        <h1>TALES & PANELS</h1>
        <p>A getaway to the world of manga and novels</p>
    </div>

    <div class="navbar">
        <a href="#home">Home</a>
        <a href="logout.php" class="right">Log Out</a>
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
        <div class="search-container" style="float:right;">
            <form action="/action_page.php">
                <input type="text" placeholder="Search.." name="search">
                <button type="submit">Go</button>
            </form>
        </div>
    </div>

    <ul class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li>Genres</li>
    </ul>

    <div class="content">
        <?php if ($result && $result->num_rows > 0): ?>
            <h2>Manga in <?php echo htmlspecialchars($genre); ?> Genre:</h2>
            <?php while ($row = $result->fetch_assoc()): ?>
                <div class="manga-item">
                    <strong><?php echo htmlspecialchars($row['name']); ?></strong> by <?php echo htmlspecialchars($row['author']); ?><br>
                    <img src="<?php echo htmlspecialchars($row['covers']); ?>" alt="Cover Image">
                </div>
            <?php endwhile; ?>
        <?php else: ?>
            <p>No manga found for the selected genre.</p>
        <?php endif; ?>
    </div>

    <div class="footer">
        <p>Footer</p>
    </div>
</body>
</html>
