<?php
include('C:\xampp\Xampp\htdocs\tales_and_panels\dbconnection.php');
$novel = "SELECT Name, Genre, Covers FROM webnovels order by ID";
$manga = "SELECT Name, Genre, Covers FROM manga order by ID";
$row = [];
$col = [];
$result = mysqli_query($conn, $manga);
$res = mysqli_query($conn, $novel);

if ($result) {
    $row = mysqli_fetch_all($result, MYSQLI_ASSOC);
    $col = mysqli_fetch_all($res, MYSQLI_ASSOC);
    #print_r($row);
} else {
    echo "Error: " . mysqli_error($conn);
}

mysqli_free_result($result);
mysqli_free_result($res);
// Close the connection
mysqli_close($conn);
?>


<!DOCTYPE html>
<html>
<?php include('C:\xampp\Xampp\htdocs\tales_and_panels\header.php'); ?>
<h4 class="center" style="text-align: center; font-size: 24px;">Manga!</h4>
<div class="content">
    <?php foreach ($row as $manga): ?>
        <div class="manga-item">
            echo "<p>Debug: " . htmlspecialchars($manga['Covers']) . "</p>";
            <img src="https://drive.google.com/uc?export=view&id=15Eek1WAuvObvz6qOVe--veNg-45VVUTU" alt="Sample Image" style="width: 100px; height: 100px;">
            <h2><?php echo htmlspecialchars($manga['Name']); ?></h2>
            <p><?php echo htmlspecialchars($manga['Genre']); ?></p>
        </div>
    <?php endforeach; ?>
</div>

<h5 class="center" style="text-align: center; font-size: 24px;">Webnovels!</h5>
<div class="content">
    <?php foreach ($col as $novel): ?>
        <div class="manga-item">
            echo "<p>Debug: " . htmlspecialchars($manga['Covers']) . "</p>";
            <?php echo "<img src=" . htmlspecialchars($novel['Covers']) . " alt=" . htmlspecialchars($novel['Name']) . " style='width: 100px; height: 100px;'>"; ?>
            <h2><?php echo $novel['Name']; ?></h2>
            <p><?php echo $novel['Genre']; ?></p>
        </div>
    <?php endforeach; ?>
</div>
<style>
    .manga-item {
        border: 2px solid turquoise;
        padding: 10px;
        margin: 10px;
    }

    .manga-item img {
        width: 150px;
        height: auto;
    }
</style>
<?php include('C:\xampp\Xampp\htdocs\tales_and_panels/footer.php'); ?>

</html>