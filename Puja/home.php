<!DOCTYPE html>
<html lang="en">
<head>
<title>Page Title</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/style1.css" />

</head>
<body>

<!--<h1>My Website</h1>
<p>A website created by me.</p>-->



<div class="header">
    <h1>TALES & PANELS</h1>
    <p>A getaway to the world of manga and novels</p>
  </div>

  <div class="navbar">
    <a class="active" href="#home">Home</a>   
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
    <div class="dropdown">
      <button class="dropbtn">My Bookmarks</button>
      <div class="dropdown-content">
        <a href="bookmarked_manga_pg.html">Manga</a>
        <a href="bookmarked_novel_pg.html">Novel</a>       
      </div>
    </div>
   
    <div class="dropdown" style="float:right;">
      <button class="dropbtn">My Profile</button>
      <div class="dropdown-content">
        <a href="#">Username</a>
        <a href="#">Email</a>
        <a href="C:\xampp\htdocs\tables\370-project\Change password\change_pw.html">Change Password</a>
      </div>
    </div>
    <div class="search-container">
            <form action="search.php" method="GET">
                <input type="text" placeholder="Search for Manga.." name="query" required>
                <button type="submit">Go</button>
            </form>
        </div>
  </div>  


  <ul class="breadcrumb">
    <li><a href="#">Home</a></li>    
  </ul>
 
 
  <div class="row">
    <div class="column" style="background-color:#aaa;">
      <h2>Column 1</h2>
      <p>Some text..</p>
    </div>
    <div class="column" style="background-color:#bbb;">
      <h2>Column 2</h2>
      <p>Some text..</p>
    </div>
  </div>
  
  <div class="footer">
    <p>Footer</p>
  </div> 

</body>
</html>
