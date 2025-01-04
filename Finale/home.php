<?php
session_start();
require_once("dbconnection.php");
require_once("header.php");

$novel = "SELECT Name, Genre, Covers,Author, Chapters FROM webnovels order by ID";
$manga = "SELECT Name, Genre, Covers,Author, Chapters FROM manga ORDER BY ID";


$res1 = mysqli_query($conn, $manga);
$res2 = mysqli_query($conn, $novel);
$mangaList = mysqli_fetch_all($res1, MYSQLI_ASSOC);
$novelList  =  mysqli_fetch_all($res2, MYSQLI_ASSOC);
mysqli_free_result($res1);
mysqli_free_result($res2);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Manga Gallery</title>
    <link rel="stylesheet" href="css/style1.css">
</head>
    
   


<h1 style="text-align: center; padding: 20px;">Manga & Webtoon Gallery</h1>
    <div class="gallery">
        <?php foreach ($mangaList as $manga): ?>
            <div class="card">
            
            <?php   $manga_name = $manga['Name'];
                    include('image.php'); ?>
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
        <?php foreach ($novelList as $novel): ?>
            <div class="card">
            
            <?php   $novel_name = $novel['Name'];
                    include('novel_image.php'); ?>
                <h3><a href="webnovel_pg.php?Name=<?php echo urlencode($novel['Name']); ?>">
                            <strong><?php echo htmlspecialchars($novel['Name']); ?></strong>
                        </a></h3>
                <p>Author: <?php echo htmlspecialchars($novel['Author']); ?></p>
                <p>Genre:<?php echo htmlspecialchars($novel['Genre']); ?></p>
                <p><?php echo htmlspecialchars($novel['Chapters']); ?> Chapters</p>
            </div>
           
        <?php endforeach; ?>
    </div>
    <?php include('footer.php'); ?>
</body>
</html>

