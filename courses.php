<?php
session_start();
include("db.php");

if (!isset($_SESSION['student_id'])) {
    header("Location: index.html");
    exit();
}

$student_id = $_SESSION['student_id'];

// Fetch courses that belong to the logged-in student
$sql = "SELECT course_name, instructor, credits FROM courses WHERE student_id = ?";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "s", $student_id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enrolled Courses</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <h2 class="text-center mb-4">Enrolled Courses</h2>
        <div class="card shadow p-4">
            <?php if (mysqli_num_rows($result) > 0) { ?>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Course Name</th>
                            <th>Instructor</th>
                            <th>Credits</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                            <tr>
                                <td><?php echo htmlspecialchars($row['course_name']); ?></td>
                                <td><?php echo htmlspecialchars($row['instructor']); ?></td>
                                <td><?php echo htmlspecialchars($row['credits']); ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            <?php } else { ?>
                <p class="text-center text-muted">You are not enrolled in any courses yet.</p>
            <?php } ?>
        </div>
        <a href="dashboard.php" class="btn btn-secondary mt-3">Back to Dashboard</a>
    </div>
    <!-- Footer -->
    <footer class="footer">
        &copy; <?php echo date("Y"); ?> UiTM Student E-profile
</body>
</html>


