<?php
session_start();
include("db.php");

if (!isset($_SESSION['student_id'])) {
    header("Location: index.html");
    exit();
}

$sql = "SELECT * FROM students LIMIT 10"; // Fetch at least 10 student profiles
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Profiles</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .profile-photo {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            object-fit: cover;
            border: 2px solid #4CAF50;
            display: block;
            margin: 0 auto 10px;
        }
    </style>
</head>
<body class="bg-light">
    <div class="container mt-5">
        <h2 class="text-center mb-4">Student Profiles</h2>
        <div class="row">
            <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                <div class="col-md-4">
                    <div class="card mb-3 shadow text-center p-3">
                        <img src="<?php echo htmlspecialchars($row['photo']); ?>" alt="Profile Photo" class="profile-photo">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo htmlspecialchars($row['name']); ?></h5>
                            <p class="card-text"><strong>Email:</strong> <?php echo htmlspecialchars($row['email']); ?></p>
                            <p class="card-text"><strong>Course:</strong> <?php echo htmlspecialchars($row['course']); ?></p>
                            <a href="profile.php?student_id=<?php echo $row['student_id']; ?>" class="btn btn-primary">View Profile</a>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
        <a href="dashboard.php" class="btn btn-secondary mt-3">Back to Dashboard</a>
    </div>
    <!-- Footer -->
    <footer class="footer">
        &copy; <?php echo date("Y"); ?> UiTM Student E-profile
</body>
</html>

