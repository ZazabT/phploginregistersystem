<?php
// Start the session
session_start();

// Check if the user is logged in by checking the session variables
if (!isset($_SESSION['id'])) {
    // If not logged in, redirect to the login page
    header('Location: loginPage.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
</head>
<body>
    <h1>Welcome to the Home Page</h1>
    
    <!-- Display the logged-in user's information -->
    <p>Hello, <?php echo htmlspecialchars($_SESSION['username']); ?>!</p>
    <p>Your email: <?php echo htmlspecialchars($_SESSION['email']); ?></p>
    
    <a href="logout.php">Logout</a>
</body>
</html>
