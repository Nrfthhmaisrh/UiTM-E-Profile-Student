<?php
session_start();
include("db.php");

if (!isset($_SESSION['student_id'])) {
    header("Location: index.html");
    exit();
}

$student_id = $_SESSION['student_id'];
$message = "";

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $subject = mysqli_real_escape_string($conn, $_POST['subject']);
    $message_text = mysqli_real_escape_string($conn, $_POST['message']);

    $sql = "INSERT INTO support_requests (student_id, subject, message) 
            VALUES ('$student_id', '$subject', '$message_text')";

    if (mysqli_query($conn, $sql)) {
        $message = "Your support request has been submitted successfully!";
    } else {
        $message = "Error: " . mysqli_error($conn);
    }
}

// Fetch previous support requests
$sql = "SELECT * FROM support_requests WHERE student_id = '$student_id' ORDER BY created_at DESC";
$result = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Support</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        .container { max-width: 600px; margin: auto; }
        .message { color: green; font-weight: bold; }
        .error { color: red; font-weight: bold; }
        form { margin-bottom: 20px; }
        input, textarea { width: 100%; padding: 10px; margin: 5px 0; border: 1px solid #ccc; border-radius: 5px; }
        button { padding: 10px 15px; background: #007BFF; color: white; border: none; cursor: pointer; border-radius: 5px; }
        button:hover { background: #0056b3; }
        .request { border-bottom: 1px solid #ccc; padding: 10px 0; }
        .status { font-weight: bold; color: gray; }
        .back-btn { display: inline-block; margin-top: 15px; padding: 8px 12px; background: #007BFF; color: white; text-decoration: none; border-radius: 5px; }
        .back-btn:hover { background: #0056b3; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Support Center</h2>

        <?php if (!empty($message)) { ?>
            <p class="message"><?php echo $message; ?></p>
        <?php } ?>

        <form action="support.php" method="post">
            <label for="subject">Subject:</label>
            <input type="text" id="subject" name="subject" required>

            <label for="message">Message:</label>
            <textarea id="message" name="message" rows="4" required></textarea>

            <button type="submit">Submit Request</button>
        </form>

        <h3>Your Previous Support Requests</h3>
        <?php if (mysqli_num_rows($result) > 0) { ?>
            <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                <div class="request">
                    <h4><?php echo htmlspecialchars($row['subject']); ?></h4>
                    <p><?php echo nl2br(htmlspecialchars($row['message'])); ?></p>
                    <p class="status">Status: <?php echo $row['status']; ?></p>
                    <p class="date">Submitted on: <?php echo date("F j, Y, g:i a", strtotime($row['created_at'])); ?></p>
                </div>
            <?php } ?>
        <?php } else { ?>
            <p>No support requests submitted yet.</p>
        <?php } ?>

        <a href="dashboard.php" class="back-btn">Back to Dashboard</a>
    </div>

    <footer class="footer" style="text-align: center; margin-top: 20px;">
        &copy; <?php echo date("Y"); ?> UiTM Student E-profile
    </footer>
</body>
</html>
