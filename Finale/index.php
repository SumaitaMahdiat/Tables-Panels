<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Fredoka:wght@300..700&display=swap"
      rel="stylesheet"
    />
    <title>Tales & Panels</title>
  </head>

  <body>
    <header>
      <nav>
        <div class="nav_logo">
          <h1><a href="index.php">Tales & Panels</a></h1>
        </div>
        <div class="nav_links">
          <?php
          session_start();
          if (isset($_SESSION['user_id'])) {
              echo '<a href="logout.php">Logout</a>';
          }
          ?>
        </div>
      </nav>
    </header>
    <main>
      <section class="login">
        <div class="login_box">
          <h1>Login</h1>
          <form class="login_form" action="login.php" method="post">
            <input
              type="text"
              id="username"
              name="username"
              placeholder="username or Email"
            />
            <input
              type="password"
              id="password"
              name="password"
              placeholder="password"
            />
            <input type="submit" value="Submit" />
          </form>
          <div class="links">
            <p>Don't Have an account yet?</p>
            <a href="signup.php"><button id="SignUpButton">Sign up</button></a>
          </div>
        </div>
      </section>
    </main>
  </body>
</html>