<?php
// Database connection
$host = 'localhost';
$user = 'root';
$password = '';
$dbname = 'tales_panels';

$conn = new mysqli($host, $user, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the selected genre
$genre = isset($_GET['genre']) ? $_GET['genre'] : '';

if ($genre) {
    $stmt = $conn->prepare("SELECT name, author, cover FROM manga WHERE genre = ?");
    $stmt->bind_param("s", $genre);
    $stmt->execute();
    $result = $stmt->get_result();
} else {
    $result = false;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Genre: <?php echo htmlspecialchars($genre); ?></title>
    <link rel="stylesheet" href="C:\xampp\htdocs\tables\370-project\genre\genre.html">
    <style>
        .manga-list {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: center;
            padding: 20px;
        }

        .manga-item {
            border: 1px solid #ccc;
            border-radius: 8px;
            overflow: hidden;
            width: 200px;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
            padding: 10px;
        }

        .manga-item img {
            width: 100%;
            height: 300px;
            object-fit: cover;
        }

        .manga-item h3 {
            font-size: 16px;
            margin: 10px 0;
        }

        .manga-item p {
            margin: 5px 0;
            color: #555;
        }
    </style>
</head>
<body>
    <div class="content">
        <h1>Genre: <?php echo htmlspecialchars($genre); ?></h1>
        <?php if ($result && $result->num_rows > 0): ?>
            <div class="manga-list">
                <?php while ($row = $result->fetch_assoc()): ?>
                    <div class="manga-item">
                        <img src="<?php echo htmlspecialchars($row['cover']); ?>" alt="Cover">
                        <h3><?php echo htmlspecialchars($row['name']); ?></h3>
                        <p><strong>Author:</strong> <?php echo htmlspecialchars($row['author']); ?></p>
                    </div>
                <?php endwhile; ?>
            </div>
        <?php else: ?>
            <p>No mangas found for this genre.</p>
        <?php endif; ?>
    </div>
</body>
</html>
<?php $conn->close(); ?>
