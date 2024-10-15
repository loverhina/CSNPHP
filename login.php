<?php
// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start(); // Start session for managing logged-in users

// Include the database connection file
include('db_connect.php');

// Check if form was submitted
if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the form inputs
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    // Check if both fields are filled in
    if (empty($username) || empty($password)) {
        echo "Please fill in both fields.";
    } else {
        // Sanitize inputs using prepared statements to prevent SQL injection
        $stmt = $conn->prepare("SELECT * FROM userentity WHERE username = ? AND status = 'active'");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        // Check if user exists
        if ($result->num_rows == 1) {
            // User found, now verify the password
            $user = $result->fetch_assoc();
            
            // For now, use direct comparison since we're skipping password hashing
            if ($password === $user['password']) {
                // Correct password, regenerate session ID to prevent fixation attacks
                session_regenerate_id();
                
                // Set session variables
                $_SESSION['username'] = $user['username'];
                $_SESSION['isAdmin'] = $user['IsAdmin'];

                // Redirect based on role
                if ($user['IsAdmin']) {
                    header("Location: AdminDashboard.php"); // Redirect admin to the admin dashboard
                } else {
                    header("Location: index.php"); // Redirect parent to the parent dashboard
                }
                exit;
            } else {
                // Incorrect password
                echo "Invalid password.";
            }
        } else {
            // User not found or account inactive
            echo "Invalid username or account not active.";
        }

        // Close the statement
        $stmt->close();
    }
}

// Close the database connection
$conn->close();
?>
