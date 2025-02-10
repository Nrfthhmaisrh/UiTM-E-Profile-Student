<?php
session_start();
include("db.php");

// Check if student is logged in
if (!isset($_SESSION['student_id'])) {
    die("Session error: Student not logged in. <a href='index.html'>Go to Login</a>");
}

// Debug: Check database connection
if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}

// Fetch announcements from the database
$sql = "SELECT * FROM announcements ORDER BY created_at DESC";
$result = mysqli_query($conn, $sql);

// Debug: Check if query executed successfully
if (!$result) {
    die("Error fetching announcements: " . mysqli_error($conn));
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Announcements</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        .container { max-width: 600px; margin: auto; }
        .announcement { border-bottom: 1px solid #ccc; padding: 10px 0; }
        .date { font-size: 12px; color: gray; }
        .back-btn { display: inline-block; margin-top: 15px; padding: 8px 12px; background: #007BFF; color: white; text-decoration: none; border-radius: 5px; }
        .back-btn:hover { background: #0056b3; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Latest Announcements</h2>

        <?php if (mysqli_num_rows($result) > 0) { ?>
            <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                <div class="announcement">
                    <h3><?php echo htmlspecialchars($row['title']); ?></h3>
                    <p><?php echo nl2br(htmlspecialchars($row['content'])); ?></p>
                    <p class="date">Posted on: <?php echo date("F j, Y, g:i a", strtotime($row['created_at'])); ?></p>
                </div>
            <?php } ?>
        <?php } else { ?>
            <p>No announcements available.</p>
        <?php } ?>

        <a href="dashboard.php" class="back-btn">Back to Dashboard</a>
    </div>

    <!-- Footer -->
    <footer style="text-align: center; margin-top: 20px;">
        &copy; <?php echo date("Y"); ?> UiTM Student E-profile
    </footer>
</body>
</html>


