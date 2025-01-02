<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/style1.css">
    <title>Website Title</title> <!-- Optional: Customize per page -->
</head>
<body>
<div class="page-container">
    <!-- Header -->
    <div class="header">

        <h1>TALES & PANELS</h1>
        <p>A getaway to the world of manga and novels</p>
    </div>

    <!-- Navbar -->
    <div class="navbar">
        <a href="home.php">Home</a>
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
        <div class="dropdown">
            <button class="dropbtn">My Bookmarks</button>
            <div class="dropdown-content">
                <a href="bookmarked_manga_pg.html">Manga</a>
                <a href="bookmarked_novel_pg.html">Novel</a>       
            </div>
        </div>
        <a href="logout.php" class="right">Log Out</a>

        <div class="search-container">
            <form action="search.php" method="GET">
                <input type="text" placeholder="Search for Manga.." name="query" required>
                <button type="submit">Go</button>
            </form>
        </div>
    </div>
