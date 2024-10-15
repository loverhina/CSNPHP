<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start(); // Start session management

// Check if user is logged in; if not, redirect to login page
if (!isset($_SESSION['username'])) {
    header("Location: login.php"); // Redirect to login page if not logged in
    exit;
}

// Sample dynamic data (Replace this with actual database queries)
$totalParents = 120; // Example: Fetch from database
$pendingRequests = 15; // Example: Fetch from database
$pendingApprovals = 8; // Example: Fetch from database
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/styles_admin.css"> <!-- External CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- jQuery, Popper.js, and Bootstrap JS (Ensure proper loading order) -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-2 bg-light sidebar" id="sidebar">
                <div class="logo-container text-center py-4">
                    <img src="../images/csnlogo-removebg.png" alt="CSN Logo" class="logo img-fluid">
                    <p class="logo-text mt-2">Parent Portal - Admin</p>
                </div>
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link active" href="#"><i class="fas fa-tachometer-alt"></i> <span>Dashboard</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fas fa-users"></i> <span>Registered Parents</span></a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="parentParticipationDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-user-friends"></i> <span>Parent Participation</span>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="parentParticipationDropdown">
                            <a class="dropdown-item" href="#"><i class="fas fa-user-friends"></i> Seminars</a>
                            <a class="dropdown-item" href="#"><i class="fas fa-chalkboard-teacher"></i> Training</a>
                            <a class="dropdown-item" href="#"><i class="fas fa-calendar-check"></i> Meetings</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fas fa-bullhorn"></i> <span>Announcements</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fas fa-calendar-plus"></i> <span>Create Event</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fas fa-clock"></i> <span>Pending Requests</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php"><i class="fas fa-sign-out-alt"></i> <span>Log Out</span></a>
                    </li>
                </ul>
            </div>

            <!-- Main Content Area -->
            <main class="col-md-10 offset-md-2 main-content" id="main-content">
                <div id="content-area">
                    <!-- Statistics Section -->
                    <div class="statistics-section mt-4">
                        <h2 class="text-left mb-4">Dashboard</h2>
                        <div class="row">
                            <!-- Total Parents Card -->
                            <div class="col-md-4 mb-4">
                                <div class="card shadow-sm border-0 rounded-lg">
                                    <div class="card-header bg-info text-white">
                                        <h6 class="mb-0">Total Parents</h6>
                                    </div>
                                    <div class="card-body d-flex align-items-center justify-content-between">
                                        <div>
                                            <h2 class="card-title mb-0 font-weight-bold"><?php echo $totalParents; ?></h2> <!-- Dynamic data -->
                                            <p class="card-text text-muted">Total number of registered parents</p>
                                        </div>
                                        <div class="icon bg-light rounded-circle text-info" style="font-size: 2.5rem;">
                                            <i class="fas fa-users"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Pending Requests Card -->
                            <div class="col-md-4 mb-4">
                                <div class="card shadow-sm border-0 rounded-lg">
                                    <div class="card-header bg-warning text-white">
                                        <h6 class="mb-0">Pending Requests</h6>
                                    </div>
                                    <div class="card-body d-flex align-items-center justify-content-between">
                                        <div>
                                            <h2 class="card-title mb-0 font-weight-bold"><?php echo $pendingRequests; ?></h2> <!-- Dynamic data -->
                                            <p class="card-text text-muted">Requests waiting for approval</p>
                                        </div>
                                        <div class="icon bg-light rounded-circle text-warning" style="font-size: 2.5rem;">
                                            <i class="fas fa-clock"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Pending Approvals Card -->
                            <div class="col-md-4 mb-4">
                                <div class="card shadow-sm border-0 rounded-lg">
                                    <div class="card-header bg-danger text-white">
                                        <h6 class="mb-0">Pending Approvals</h6>
                                    </div>
                                    <div class="card-body d-flex align-items-center justify-content-between">
                                        <div>
                                            <h2 class="card-title mb-0 font-weight-bold"><?php echo $pendingApprovals; ?></h2> <!-- Dynamic data -->
                                            <p class="card-text text-muted">Registrations pending admin approval</p>
                                        </div>
                                        <div class="icon bg-light rounded-circle text-danger" style="font-size: 2.5rem;">
                                            <i class="fas fa-exclamation-circle"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Approval Requests Section -->
                    <div class="approval-requests-section mt-4">
                        <h2 class="text-left mb-4">Pending Pre-Registrations</h2>
                        <div class="card shadow-sm border-0 rounded-lg">
                            <div class="card-header bg-primary text-white">
                                <h6 class="mb-0">Pending Approvals</h6>
                            </div>
                            <div class="card-body">
                                <div id="requests-container">
                                    <div id="no-requests" class="text-center" style="display: none;">
                                        <p class="text-muted">Currently, there are no pending pre-registrations.</p>
                                    </div>
                                    <ul id="request-list" class="list-group">
                                        <!-- Sample request items (Replace with dynamic data) -->
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            Parent Name
                                            <div>
                                                <button class="btn btn-success btn-sm me-2" onclick="approveRequest('request-id')">Approve</button>
                                                <button class="btn btn-danger btn-sm" onclick="deleteRequest('request-id')">Delete</button>
                                            </div>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            Parent Name
                                            <div>
                                                <button class="btn btn-success btn-sm me-2" onclick="approveRequest('request-id')">Approve</button>
                                                <button class="btn btn-danger btn-sm" onclick="deleteRequest('request-id')">Delete</button>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>

        </div>
    </div>
</body>
</html>

