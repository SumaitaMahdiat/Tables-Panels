<?php
require_once("dbconnection.php");
require_once("header.php");

$novel = "SELECT Name, Genre, Covers,Author, Chapters FROM webnovels order by ID";
$manga = "SELECT Name, Genre, Covers,Author, Chapters FROM manga ORDER BY ID";
$res1 = mysqli_query($conn, $manga);
$res2 = mysqli_query($conn, $novel);
$mangaList = mysqli_fetch_all($res1, MYSQLI_ASSOC);
$novellist  =  mysqli_fetch_all($res2, MYSQLI_ASSOC);
mysqli_free_result($res1);
mysqli_free_result($res2);
mysqli_close($conn);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Manga Gallery</title>
    <link rel="stylesheet" href="style1.css">
</head>
    
   


<h1 style="text-align: center; padding: 20px;">Manga & Webtoon Gallery</h1>
    <div class="gallery">
        <?php foreach ($mangaList as $manga): ?>
            <div class="card">
                <img src="<?php echo htmlspecialchars($manga['Covers']); ?>" alt="<?php echo htmlspecialchars($manga['Name']); ?>">
                <h3><a href="manga_pg.php?Name=<?php echo urlencode($manga['Name']); ?>">
                            <strong><?php echo htmlspecialchars($manga['Name']); ?></strong>
                        </a></h3>
                <p>Author: <?php echo htmlspecialchars($manga['Author']); ?></p>
                <p>Genre:<?php echo htmlspecialchars($manga['Genre']); ?></p>
                <p><?php echo htmlspecialchars($manga['Chapters']); ?> Chapters</p>
            </div>
        <?php endforeach; ?>
    </div>

<h1 style="text-align: center; padding: 20px;">Webnovel Gallery</h1>
    <div class="gallery">
        <?php foreach ($novellist as $novel): ?>
            <div class="card">
                <img src="<?php echo htmlspecialchars($novel['Covers']); ?>" alt="<?php echo htmlspecialchars($manga['Name']); ?>">
                <h3><a href="novel_pg.php?Name=<?php echo urlencode($novel['Name']); ?>">
                            <strong><?php echo htmlspecialchars($novel['Name']); ?></strong></a></h3>
                <p>Author: <?php echo htmlspecialchars($novel['Author']); ?></p>
                <p>Genre:<?php echo htmlspecialchars($novel['Genre']); ?></p>
                <p><?php echo htmlspecialchars($novel['Chapters']); ?> Chapters</p>
            </div>
        <?php endforeach; ?>
    </div>
    </body>

</html>
<?php include('footer.php'); ?>
