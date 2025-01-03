<head>
    <title>Genres</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
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

        .navbar {
            overflow: hidden;
            background-color: #333;
            font-family: Arial;
        }

        .navbar a, 
        .dropdown .dropbtn {
            background-color: black; /* Set background color to black */
            color: white; /* Text color remains white */
            float: left;
            font-size: 16px;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
            border: none; /* Remove borders */
            cursor: pointer; /* Pointer cursor for buttons */
        }

        .navbar a:hover, 
        .dropdown:hover .dropbtn {
            background-color: #444; /* Slightly lighter shade of black for hover effect */
        }

        .dropdown {
            float: left;
            overflow: hidden;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
            z-index: 1;
        }

        .dropdown-content a {
            float: none;
            color: white;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
            text-align: left;
        }

        .dropdown-content a:hover {
            background-color: #444; /* Match hover effect for dropdown links */
            color: white; /* Ensure text stays visible */
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }

        .breadcrumb {
            padding: 10px 16px;
            list-style: none;
            background-color: #eee;
        }

        .breadcrumb li {
            display: inline;
            font-size: 18px;
        }

        .breadcrumb li+li:before {
            padding: 8px;
            color: white;
            content: "/\00a0";
        }

        .breadcrumb li a {
            color: #0275d8;
            text-decoration: none;
        }

        .breadcrumb li a:hover {
            color: #01447e;
            text-decoration: underline;
        }

        .footer {
            position: fixed;
            left: 0;
            bottom: 0;
            width: 100%;
            background-color: black;
            color: white;
            text-align: center;
        }

        .search-container {
            float: right;
            margin-right: 16px;
        }

        .search-container input[type="text"] {
            padding: 6px;
            margin-top: 8px;
            font-size: 17px;
            border: none;
        }

        .search-container button {
            background-color: black; /* Set background color to black */
            color: white; /* Text color remains white */
            float: right;
            padding: 6px 10px;
            margin-top: 8px;
            margin-left: 2px;
            font-size: 17px;
            border: none; /* Remove borders */
            cursor: pointer; /* Pointer cursor for buttons */
        }

        .search-container button:hover {
            background-color: #444; /* Slightly lighter shade of black for hover effect */
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
        <a href="#home">Home</a>
        <a href="logout.php" class="right">Log Out</a>

        <!-- Genres Dropdown -->
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

        <!-- Bookmarks Dropdown -->
        <div class="dropdown">
            <button class="dropbtn">Bookmarks</button>
            <div class="dropdown-content">
                <a href="bookmarks.php?type=Manga">Manga</a>
                <a href="bookmarks.php?type=Novel">Novels</a>
            </div>
        </div>

        <!-- My Profile Dropdown -->
        <div class="dropdown" style="float:right;">
            <button class="dropbtn">My Profile</button>
            <div class="dropdown-content">
                <a href="#">Username</a>
                <a href="#">Email</a>
                <a href="change_pw.html">Change Password</a>
            </div>
        </div>

        <!-- Search -->
        <div class="search-container">
            <form action="/action_page.php" method="GET">
                <input type="text" placeholder="Search..." name="search">
                <button type="submit">Go</button>
            </form>
        </div>
    </div>
</body>
