<?php
session_start();
include('C:/xampp/Xampp/htdocs/tales_and_panels/dbconnection.php');

// Fetch data for manga and webnovels
$mangaQuery = "SELECT Name, Genre, Covers, Author, Chapters FROM manga ORDER BY ID";
$novelQuery = "SELECT Name, Genre, Covers, Author, Chapters FROM webnovels ORDER BY ID";
$mangaResult = mysqli_query($conn, $mangaQuery);
$novelResult = mysqli_query($conn, $novelQuery);

if (!$mangaResult || !$novelResult) {
    die("Query failed: " . mysqli_error($conn));
}

$mangaList = mysqli_fetch_all($mangaResult, MYSQLI_ASSOC);
$novelList = mysqli_fetch_all($novelResult, MYSQLI_ASSOC);

// Free results and close connection
mysqli_free_result($mangaResult);
mysqli_free_result($novelResult);
mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
<?php include("C:/xampp/Xampp/htdocs/tales_and_panels/header.php"); ?>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Manga & Webnovel Gallery</title>
<link rel="stylesheet" href="C:/xampp/Xampp/htdocs/tales_and_panels/style.css" />
<body>
    <h1 style="text-align: center; padding: 20px;">Manga Gallery</h1>
    <div class="gallery">
        <?php if (!empty($mangaList)): ?>
            <?php foreach ($mangaList as $manga): ?>
                <div class="card">
                    <img src="<?php echo htmlspecialchars($manga['Covers']); ?>" alt="<?php echo htmlspecialchars($manga['Name']); ?> Cover">
                    <h3><a href="manga_pg.php?Name=<?php echo urlencode($manga['Name']); ?>">
                            <strong><?php echo htmlspecialchars($manga['Name']); ?></strong>
                        </a></h3>
                    <p>Author: <?php echo htmlspecialchars($manga['Author']); ?></p>
                    <p>Genre: <?php echo htmlspecialchars($manga['Genre']); ?></p>
                    <p><?php echo htmlspecialchars($manga['Chapters']); ?> Chapters</p>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>No manga available at the moment.</p>
        <?php endif; ?>
    </div>

    <h1 style="text-align: center; padding: 20px;">Webnovel Gallery</h1>
    <div class="gallery">
        <?php if (!empty($novelList)): ?>
            <?php foreach ($novelList as $novel): ?>
                <div class="card">
                    <img src="<?php echo htmlspecialchars($novel['Covers']); ?>" alt="<?php echo htmlspecialchars($novel['Name']); ?> Cover">
                    <h3><a href="webnovel_pg.php?Name=<?php echo urlencode($novel['Name']); ?>">
                            <strong><?php echo htmlspecialchars($novel['Name']); ?></strong>
                        </a></h3>
                    <p>Author: <?php echo htmlspecialchars($novel['Author']); ?></p>
                    <p>Genre: <?php echo htmlspecialchars($novel['Genre']); ?></p>
                    <p><?php echo htmlspecialchars($novel['Chapters']); ?> Chapters</p>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>No webnovels available at the moment.</p>
        <?php endif; ?>
    </div>
</body>

</html>

<?php include('C:/xampp/Xampp/htdocs/tales_and_panels/footer.php'); ?>
