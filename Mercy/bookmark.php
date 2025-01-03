<!DOCTYPE html>
<html>
<?php include('C:/xampp/Xampp/htdocs/tales_and_panels/header.php'); ?>

<head>
  <title>Page Title</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style>
    * {
      box-sizing: border-box;
    }

    body {
      font-family: Arial, Helvetica, sans-serif;
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

    .navbar a {
      float: left;
      font-size: 16px;
      color: white;
      text-align: center;
      padding: 14px 16px;
      text-decoration: none;
    }

    .dropdown {
      float: left;
      overflow: hidden;
    }

    .dropdown .dropbtn {
      font-size: 16px;
      border: none;
      outline: none;
      color: white;
      padding: 14px 16px;
      background-color: inherit;
      font-family: inherit;
      margin: 0;
    }

    .navbar a:hover,
    .dropdown:hover .dropbtn {
      background-color: red;
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
      color: black;
      padding: 12px 16px;
      text-decoration: none;
      display: block;
      text-align: left;
    }

    .dropdown-content a:hover {
      background-color: #ddd;
    }

    .dropdown:hover .dropdown-content {
      display: block;
    }

    .navbar a.right {
      float: right;
    }

    .topnav .search-container {
      float: right;
    }

    .topnav input[type=text] {
      padding: 6px;
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

    ul.breadcrumb {
      padding: 10px 16px;
      list-style: none;
      background-color: #eee;
    }

    ul.breadcrumb li {
      display: inline;
      font-size: 18px;
    }

    ul.breadcrumb li+li:before {
      padding: 8px;
      color: black;
      content: "/\00a0";
    }

    ul.breadcrumb li a {
      color: #0275d8;
      text-decoration: none;
    }

    ul.breadcrumb li a:hover {
      color: #01447e;
      text-decoration: underline;
    }

    .row {
      display: flex;
      height: 100%;
    }

    .column {
      flex: 50%;
      padding: 10px;
      height: 100%;
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

    @media screen and (max-width: 400px) {
      .navbar a {
        float: none;
        width: 100%;
      }
    }
  </style>
</head>

<body>
  <div class="header">
    <h1>TALES & PANELS</h1>
    <p>A getaway to the world of manga and novels</p>
  </div>

  <div class="navbar">
    <a class="active" href="#home">Home</a>
    <a href="C:\xampp\htdocs\tables\370-project\login\index.html" class="right">Log Out</a>

    <div class="dropdown">
      <button class="dropbtn">Genres</button>
      <div class="dropdown-content">
        <a href="C:\xampp\htdocs\tables\370-project\genre\genre_pg.php">Fantasy</a>
        <a href="#">Comedy</a>
        <a href="#">Sports</a>
        <a href="#">Romance</a>
        <a href="#">Action</a>
        <a href="#">Horror</a>
      </div>
    </div>
    <div class="dropdown">
      <button class="dropbtn">My Bookmarks</button>
      <div class="dropdown-content">
        <a href="#">Manga</a>
        <a href="#">Novel</a>
      </div>
    </div>

    <div class="dropdown" style="float:right;">
      <button class="dropbtn">My Profile</button>
      <div class="dropdown-content"></div>
        <a href="#">Username</a>
        <a href="#">Email</a>
        <a href="C:\xampp\htdocs\tables\370-project\Change password\change_pw.html">Change Password</a>
      </div>
    </div>
    <div class="search-container" style="float:right"></div>
      <form action="/action_page.php"></form>
        <input type="text" placeholder="Search.." name="search">
        <button type="submit">Go</button>
      </form>
    </div>
  </div>

  <ul class="breadcrumb"></ul>
    <li><a href="C:\xampp\htdocs\tables\370-project\home\home.html">Home</a></li>
    <li>Bookmarked Manga</li>
  </ul>

  <div class="row">
    <div class="column" style="background-color:#aaa;"></div></div>
      <h2>Column 1</h2>
      <p>Some text..</p>
    </div>
    <div class="column" style="background-color:#bbb;"></div>
      <h2>Column 2</h2>
      <p>Some text..</p>
    </div>
  </div>

</body>
<?php include('C:/xampp/Xampp/htdocs/tales_and_panels/footer.php'); ?>

</html>
