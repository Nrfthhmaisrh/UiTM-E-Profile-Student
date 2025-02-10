<?php
session_start();
include("db.php");

if (!isset($_SESSION['student_id'])) {
    header("Location: index.html");
    exit();
}

$student_id = $_SESSION['student_id'];
$sql = "SELECT courses.course_name, attendance.date, attendance.status 
        FROM attendance 
        JOIN courses ON attendance.course_id = courses.course_id 
        WHERE attendance.student_id = '$student_id'";
$result = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Attendance</title>
</head>
<body>
    <h2>Attendance Record</h2>
    <table border="1">
        <tr>
            <th>Course</th>
            <th>Date</th>
            <th>Status</th>
        </tr>
        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
            <tr>
                <td><?php echo $row['course_name']; ?></td>
                <td><?php echo $row['date']; ?></td>
                <td><?php echo $row['status']; ?></td>
            </tr>
        <?php } ?>
    </table>
    <a href="dashboard.php">Back to Dashboard</a>
    <!-- Footer -->
    <footer class="footer">
        &copy; <?php echo date("Y"); ?> UiTM Student E-profile
</body>
</html>

