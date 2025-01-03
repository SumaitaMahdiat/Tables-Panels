<?php
include('C:/xampp/Xampp/htdocs/tales_and_panels/dbconnection.php');
$novel = "SELECT Name, Genre, Covers, Chapters FROM webnovels order by ID";
$manga = "SELECT Name, Genre, Covers, Chapters FROM manga ORDER BY ID";
$res1 = mysqli_query($conn, $manga);
$res2 = mysqli_query($conn, $novel);
$mangaList = mysqli_fetch_all($res1, MYSQLI_ASSOC);
$novellist  =  mysqli_fetch_all($res2, MYSQLI_ASSOC);
mysqli_free_result($res1);
mysqli_free_result($res2);
mysqli_close($conn);
?>

<!DOCTYPE>
<html>
<?php include('C:/xampp/Xampp/htdocs/tales_and_panels/header.php'); ?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manga Gallery</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color:rgb(18, 18, 18);
            color: #ffffff;
        }

        .gallery {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            padding: 20px;
        }

        .card {
            background-color:rgb(30, 30, 30);
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.3);
            text-align: center;
            transition: transform 0.2s;
        }

        .card:hover {
            transform: scale(1.05);
        }

        .card img {
            width: 100%;
            height: 300px;
            object-fit: cover;
        }

        .card h3 {
            margin: 10px 0;
        }

        .card p {
            margin: 5px 0;
        }

        .status {
            font-size: 14px;
            padding: 5px 10px;
            border-radius: 5px;
            display: inline-block;
        }

        .status.active {
            background-color: #4caf50;
            color: #fff;
        }

        .status.hiatus {
            background-color: #f44336;
            color: #fff;
        }
    </style>
</head>

<h1 style="text-align: center; padding: 20px;">Manga & Webtoon Gallery</h1>
    <div class="gallery">
        <?php foreach ($mangaList as $manga): ?>
            <div class="card">
                <img src="<?php echo htmlspecialchars($manga['Covers']); ?>" alt="<?php echo htmlspecialchars($manga['Name']); ?>">
                <h3><?php echo htmlspecialchars($manga['Name']); ?></h3>
                <p><?php echo htmlspecialchars($manga['Genre']); ?></p>
                <p><?php echo htmlspecialchars($manga['Chapters']); ?> Chapters</p>
            </div>
        <?php endforeach; ?>
    </div>

<h1 style="text-align: center; padding: 20px;">Webnovel Gallery</h1>
    <div class="gallery">
        <?php foreach ($novellist as $novel): ?>
            <div class="card">
                <img src="<?php echo htmlspecialchars($novel['Covers']); ?>" alt="<?php echo htmlspecialchars($manga['Name']); ?>">
                <h3><?php echo htmlspecialchars($novel['Name']); ?></h3>
                <p><?php echo htmlspecialchars($novel['Genre']); ?></p>
                <p><?php echo htmlspecialchars($novel['Chapters']); ?> Chapters</p>
            </div>
        <?php endforeach; ?>
    </div>
    </body>

</html>
<?php include('C:/xampp/Xampp/htdocs/tales_and_panels/footer.php'); ?>