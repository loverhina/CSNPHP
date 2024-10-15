<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start(); // Start session management

// Check if user is logged in; if not, redirect to login page
if (!isset($_SESSION['username'])) {
    header("Location: login.php"); // Redirect to login page if not logged in
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CSN Parent Portal</title>
    <link rel="stylesheet" href="css/style.css"> <!-- Link to external CSS -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet"> <!-- Montserrat Font -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"> <!-- Font Awesome CDN -->
</head>
<body>

    <!-- Navigation Sidebar -->
    <nav class="sidebar">
        <!-- Logo and Text Below -->
        <div class="logo-container">
            <img src="images/csnlogo.png" alt="CSN Logo" class="logo">
            <p class="logo-text">Parent Portal</p>
        </div>
        
        <ul class="nav-items">
            <li>
                <a href="index.php"> <!-- Correct Link for Dashboard -->
                    <i class="fas fa-dashboard"></i>
                    <span class="nav-item">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="enroll.php"> <!-- Update to PHP file -->
                    <i class="fas fa-pen"></i>
                    <span class="nav-item">Enroll</span>
                </a>
            </li>
            <li>
                <a href="history.php"> <!-- Update to PHP file -->
                    <i class="fas fa-history"></i>
                    <span class="nav-item">History</span>
                </a>
            </li>
            <li>
                <a href="request.php"> <!-- Update to PHP file -->
                    <i class="fas fa-envelope"></i>
                    <span class="nav-item">Request</span>
                </a>
            </li>
        </ul>

        <!-- Profile and Logout Section -->
        <div class="nav-bottom">
            <ul>
                <li>
                    <a href="edit.php"> <!-- Update to PHP file -->
                        <i class="fas fa-edit"></i>
                        <span class="nav-item">Edit Profile</span>
                    </a>
                </li>
                <li>
                    <a href="logout.php"> <!-- Update to PHP file -->
                        <i class="fas fa-sign-out-alt"></i>
                        <span class="nav-item">Log Out</span>
                    </a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Content for the main page -->
    <main>
        <h1>Dashboard</h1>
        <p>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?>!</p>
        <div class="designer-rectangle"></div>
    </main>

</body>
</html>

