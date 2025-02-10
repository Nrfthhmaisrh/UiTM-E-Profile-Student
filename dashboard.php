<?php
session_start();
include('db.php'); // Include database connection

// Redirect to login if user is not logged in
if (!isset($_SESSION['student_id'])) {
    header("Location: login.php");
    exit();
}

$student_id = $_SESSION['student_id'];

// Fetch student details from database
$query = "SELECT * FROM students WHERE student_id = '$student_id'";
$result = mysqli_query($conn, $query);
$student = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Dashboard</title>
    <style>
        /* General Styling */
        body {
            font-family: 'Arial', sans-serif;
            background-color: #1e1e2e;
            color: white;
            margin: 0;
            padding: 0;
            text-align: center;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        /* Navbar */
        .navbar {
            background-color: #2a2a3b;
            padding: 15px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.3);
        }

        .logo {
            font-size: 22px;
            font-weight: bold;
            color: white;
            margin-left: 20px;
        }

        .nav-links {
            list-style: none;
            display: flex;
            gap: 20px;
            margin-right: 20px;
        }

        .nav-links li {
            display: inline;
        }

        .nav-links a {
            text-decoration: none;
            color: white;
            font-size: 16px;
            padding: 8px 12px;
            border-radius: 5px;
            transition: 0.3s;
        }

        .nav-links a:hover {
            background-color: #3a3a4d;
        }

        /* Logout Button */
        .logout-btn {
            background-color: #d9534f;
            color: white;
            border: none;
            padding: 8px 12px;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
        }

        .logout-btn:hover {
            background-color: #c9302c;
        }

        /* Dashboard Content */
        .dashboard-container {
            padding: 50px;
            flex: 1;
        }

        .dashboard-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 15px;
            max-width: 900px;
            margin: auto;
        }

        .dashboard-card {
            background-color: #3a3a4d;
            padding: 20px;
            text-decoration: none;
            color: white;
            font-size: 18px;
            border-radius: 8px;
            transition: 0.3s;
        }

        .dashboard-card:hover {
            background-color: #4a4a5d;
            transform: scale(1.05);
        }

        /* Footer */
        .footer {
            background-color: #2a2a3b;
            padding: 15px;
            text-align: center;
            font-size: 14px;
            color: white;
            margin-top: auto;
        }

        .footer a {
            color: #c4c4e0;
            text-decoration: none;
            margin: 0 10px;
            transition: 0.3s;
        }

        .footer a:hover {
            color: #ffffff;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar">
        <div class="logo">🎓 UiTM Student E-Profile </div>
        <ul class="nav-links">
            <li><a href="profile.php">Profile</a></li>
            <li><a href="members.php">Members</a></li>
            <li><a href="courses.php">Courses</a></li>
            <li><a href="attendance.php">Attendance</a></li>
            <li><a href="announcements.php">Announcements</a></li>
            <li><a href="support.php">Support</a></li>
            <li>
                <form action="logout.php" method="POST">
                    <button class="logout-btn">Logout</button>
                </form>
            </li>
        </ul>
    </nav>

    <!-- Dashboard Content -->
    <div class="dashboard-container">
        <h2>Welcome, <?php echo htmlspecialchars($student['name']); ?> 🎉</h2>
        <p>Your Student ID: <strong><?php echo htmlspecialchars($student_id); ?></strong></p>
        
        <div class="dashboard-grid">
            <a href="profile.php" class="dashboard-card">Profile</a>
            <a href="members.php" class="dashboard-card">Members</a>
            <a href="courses.php" class="dashboard-card">Courses</a>
            <a href="attendance.php" class="dashboard-card">Attendance</a>
            <a href="announcements.php" class="dashboard-card">Announcements</a>
            <a href="support.php" class="dashboard-card">Support/Help Desk</a>
        </div>
    </div>

    <!-- Footer -->
    <footer class="footer">
        &copy; <?php echo date("Y"); ?>  UiTM Student E-profile
    </footer>
</body>
</html>



