
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <main>
        <section class="login">
            <div class="login_box">
                <h1>Sign Up</h1>
        <form class="login_form" action="sign_up_process.php" method="post">
            <input
              type="text"
              id="username"
              name="username"
              placeholder="username"
            />
            <input
              type="text"
              id="email"
              name="email"
              placeholder="email"
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
                    <p>Already have an account?</p>
                    <a href="index.php"><button id="Login">Login</button></a>
                </div>
            </div>
        </section>
    </main>
</body>
</html>
