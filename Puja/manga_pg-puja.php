<?php
// Include the database connection file
require_once('dbconnection.php');

// Check if the manga ID is passed via the URL
if (isset($_GET['id'])) {
    $manga_id = $_GET['id'];

    // Query to fetch manga details by manga_id
    $query = "SELECT * FROM manga WHERE Manga_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $manga_id);  // Bind the manga ID (integer)
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        // Fetch the manga details
        $manga = $result->fetch_assoc();
    } else {
        // If no results are found, set $manga to null
        $manga = null;
    }
} else {
    // If no manga ID is provided, set $manga to null
    $manga = null;
}

// Check if $manga is not null before trying to access its values
if ($manga) {
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?php echo htmlspecialchars($manga['Name']); ?> - Manga Details</title>
        <link rel="stylesheet" href="style.css">
        <style>
            /* Include your previous CSS here */
            * {box-sizing: border-box;}
            body {
                font-family: Arial, Helvetica, sans-serif;
                background-color: #f4f4f4;
                margin: 0;
                padding: 0;
            }
            .header {
                padding: 10px;
                text-align: center;
                background: #1abc9c;
                color: white;
            }
            .header h1 {
                font-size: 40px;
            }
           /* Links inside the navbar */
.navbar a {
  float: left;
  font-size: 16px;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

/* The dropdown container */
.dropdown {
  float: left;
  overflow: hidden;
}

/* Dropdown button */
.dropdown .dropbtn {
  font-size: 16px;
  border: none;
  outline: none;
  color: white;
  padding: 14px 16px;
  background-color: inherit;
  font-family: inherit; /* Important for vertical align on mobile phones */
  margin: 0; /* Important for vertical align on mobile phones */
}

/* Add a red background color to navbar links on hover */
.navbar a:hover, .dropdown:hover .dropbtn {
  background-color: red;
}

/* Dropdown content (hidden by default) */
.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

/* Links inside the dropdown */
.dropdown-content a {
  float: none;
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
  text-align: left;
}

/* Add a grey background color to dropdown links on hover */
.dropdown-content a:hover {
  background-color: #ddd;
}

/* Show the dropdown menu on hover */
.dropdown:hover .dropdown-content {
  display: block;
}

.dropdown a.right {
  float: right; /* Float a link to the right */
}


/* Right-aligned link */
.navbar a.right {
  float: right; /* Float a link to the right */
}

.topnav a.active {
  background-color: #2196F3;
  color: white;
}

.topnav .search-container {
    float: right;
  
}

.topnav input[type=text] {
  padding: 6px;
  /*margin-top: 8px;*/
  font-size: 17px;
  border: none;
  width: 100%;
  margin: 0;
  
}

.topnav .search-container button {
  float: right;
  padding: 6px;
  margin-top: 8px;
  margin-right: 16px;
  background: #ddd;
  font-size: 17px;
  border: none;
  cursor: pointer;
}


.topnav .search-container button:hover {
  background: #ccc;
}
            .title-section {
                display: flex;
                align-items: flex-start;
                gap: 20px;
                margin: 20px 0;
            }
            .title-section img {
                width: 200px;
                height: 300px;
                object-fit: cover;
                border-radius: 8px;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            }
            .title-details {
                flex: 1;
            }
            .title-details h1 {
                font-size: 28px;
                margin: 0 0 10px;
            }
            .title-details p {
                margin: 5px 0;
                font-size: 16px;
            }
            .metadata {
                display: flex;
                flex-wrap: wrap;
                gap: 10px;
                margin: 10px 0;
            }
            .metadata span {
                background-color: #e5e5e5;
                padding: 5px 10px;
                border-radius: 5px;
                font-size: 14px;
            }
            .action-buttons {
                margin-top: 10px;
                display: flex;
                gap: 10px;
            }
            .action-buttons button {
                padding: 10px 15px;
                background-color: #121314;
                color: #fff;
                border: none;
                border-radius: 5px;
                cursor: pointer;
            }
            .action-buttons button:hover {
                background-color: #6b7278;
            }
            .description {
                margin-top: 20px;
                background-color: white;
                padding: 20px;
                box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
                border-radius: 8px;
            }
            .footer {
                position: fixed;
                left: 0;
                bottom: 0;
                width: 100%;
                background-color: black;
                color: white;
                text-align: center;
                padding: 10px 0;
            }
        </style>
    </head>
    <body>

    <!-- Header -->
    <div class="header">
        <h1>TALES & PANELS</h1>
        <p>A getaway to the world of manga and novels</p>
    </div>

    <!-- Navbar -->
    <div class="navbar">
        <a href="home.php">Home</a>
        <!--<a href="genre_pg.php">Genre</a>-->
        <a href="logout.php" class="right">Log Out</a>
        <a href="my_bookmarks.html" class="right">My Bookmarks</a>
        <div class="dropdown">
      <button class="dropbtn">Genres</button>
      <div class="dropdown-content">
        <a href="genre_pg.php?genre=Fantasy">Fantasy</a>
        <a href="genre_pg.php?genre=Comedy">Comedy</a>
        <a href="genre_pg.php?genre=Fantasy">Sports</a>
        <a href="genre_pg.php?genre=Fantasy">Romance</a>
        <a href="genre_pg.php?genre=Fantasy">Action</a>
        <a href="genre_pg.php?genre=Fantasy">Horror</a>                 
      </div>    
         <!-- Search bar -->
    <div class="search-container">
      <form action="search.php" method="GET">
        <input type="text" placeholder="Search for Manga.." name="search">
        <button type="submit">Go</button>
      </form>
    </div>
    </div>

    <!-- Manga Details -->
    <div class="container">
        <div class="title-section">
            <img src="<?php echo htmlspecialchars($manga['Covers']); ?>" alt="<?php echo htmlspecialchars($manga['Name']); ?> Cover">
            <div class="title-details">
                <h1><?php echo htmlspecialchars($manga['Name']); ?></h1>
                <p><strong>Author:</strong> <?php echo htmlspecialchars($manga['Author']); ?></p>
                <p><strong>Genre:</strong> <?php echo htmlspecialchars($manga['Genre']); ?></p>
                <p><strong>Rating:</strong> <?php echo htmlspecialchars($manga['Rating']); ?> / 5</p>
                <p><strong>Review:</strong> <?php echo htmlspecialchars($manga['Review']); ?></p>

                <div class="action-buttons">
                    <button>Like</button>
                    <button>Bookmark</button>
                </div>
            </div>
        </div>

        <!-- Description -->
        <div class="description">
            <h2>Description</h2>
            <p><?php echo htmlspecialchars($manga['Review']); ?></p>
        </div>

        <!-- Chapters -->
        <div class="description">
            <h2>Chapters</h2>
            <ul>
                <?php
                // Assuming the 'Chapters' field contains a comma-separated list of chapters
                $chapters = explode(',', $manga['Chapters']);
                foreach ($chapters as $chapter) {
                    echo "<li><a href='#'>Chapter " . htmlspecialchars($chapter) . "</a></li>";
                }
                ?>
            </ul>
        </div>
    </div>

    <!-- Footer -->
    <div class="footer">
        <p>&copy; 2025 Tales & Panels. All Rights Reserved.</p>
    </div>

    </body>
    </html>
    <?php
} else {
    // Handle the case where no manga was found or no ID was provided
    echo "Invalid manga ID.";
}
?>
