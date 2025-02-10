<?php
session_start();
include("db.php");

// Check if a student ID is provided in the URL
if (isset($_GET['student_id'])) {
    $student_id = $_GET['student_id'];
} elseif (isset($_SESSION['student_id'])) {
    $student_id = $_SESSION['student_id']; // Default to the logged-in student
} else {
    header("Location: index.html");
    exit();
}

// Fetch student data
$sql = "SELECT * FROM students WHERE student_id = ?";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "s", $student_id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$student = mysqli_fetch_assoc($result);

// Redirect if student not found
if (!$student) {
    echo "<script>alert('Student profile not found!'); window.location.href='members.php';</script>";
    exit();
}

// Use student's photo if available, otherwise show a placeholder image
$profile_photo = !empty($student['photo']) ? $student['photo'] : 'uploads/default-profile.png';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($student['name']); ?>'s Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f7fc;
            text-align: center;
            padding: 20px;
        }

        .profile-container {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            display: inline-block;
            text-align: left;
        }

        .profile-photo {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            object-fit: cover;
            border: 3px solid #4CAF50;
            margin-bottom: 20px;
        }

        .profile-info p {
            font-size: 18px;
            margin: 10px 0;
        }

        a {
            text-decoration: none;
            color: white;
            background: #2a2a3b;
            padding: 8px 12px;
            border-radius: 5px;
        }

        a:hover {
            background: #1e1e30;
        }
    </style>
</head>
<body>
    <div class="profile-container">
        <h2><?php echo htmlspecialchars($student['name']); ?>'s Profile</h2>
        <img src="<?php echo htmlspecialchars($profile_photo); ?>" alt="Profile Photo" class="profile-photo">
        <div class="profile-info">
            <p><strong>Student ID:</strong> <?php echo htmlspecialchars($student['student_id']); ?></p>
            <p><strong>Name:</strong> <?php echo htmlspecialchars($student['name']); ?></p>
            <p><strong>Email:</strong> <?php echo htmlspecialchars($student['email']); ?></p>
            <p><strong>Phone:</strong> <?php echo htmlspecialchars($student['phone']); ?></p>
            <p><strong>Course:</strong> <?php echo htmlspecialchars($student['course']); ?></p>
        </div>
        <br><br>
        <a href="dashboard.php">Back to Dashboard</a>
    </div>
    <!-- Footer -->
    <footer class="footer">
        &copy; <?php echo date("Y"); ?> UiTM Student E-profile
</body>
</html>



