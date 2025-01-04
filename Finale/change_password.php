<?php
require_once('dbconnection.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['email'];
    $current_password = $_POST['current_password'];
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];

    // Query to fetch the current password from the database
    $sql = "SELECT Password FROM reader WHERE Email = ?";  // Adjust to your table structure
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if ($current_password === $user['Password']) {  // No hashing of password here
            // Check if new password matches confirm password
            if ($new_password === $confirm_password) {
                // Update the password in the database without hashing
                $update_sql = "UPDATE reader SET Password = ? WHERE Email = ?";
                $update_stmt = $conn->prepare($update_sql);
                $update_stmt->bind_param("ss", $new_password, $username);  // Store plain password
                if ($update_stmt->execute()) {
                    $message = "Password changed successfully!";
                    header("Location: index.php");
    exit();
                } else {
                    $message = "Failed to change password. Please try again.";
                }
            } else {
                $message = "New password and confirmation do not match.";
            }
        } else {
            $message = "Current password is incorrect.";
        }
    } else {
        $message = "User not found.";
    }

    // Close the connection
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/style.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Fredoka:wght@300..700&display=swap"
        rel="stylesheet"
    />
    <title>Change Password</title>
</head>
<body>
    <header>
        <nav>
            <div class="nav_logo">
                <h1><a href="index.php">Tales & Panels</a></h1>
            </div>
        </nav>
    </header>

    <main>
        <section class="login">
            <div class="login_box">
                <h1>Change Password</h1>

                <?php if (isset($message)): ?>
                    <p style="color: red; text-align: center;"><?php echo htmlspecialchars($message); ?></p>
                <?php endif; ?>

                <form class="login_form" action="change_password.php" method="post">
                    <input
                        type="text"
                        name="email"
                        placeholder="Email"
                        required
                    />
                    <input
                        type="password"
                        name="current_password"
                        placeholder="Current Password"
                        required
                    />
                    <input
                        type="password"
                        name="new_password"
                        placeholder="New Password"
                        required
                    />
                    <input
                        type="password"
                        name="confirm_password"
                        placeholder="Confirm New Password"
                        required
                    />
                    <input type="submit" value="Change Password" />
                </form>
            </div>
        </section>
    </main>
</body>
</html>
