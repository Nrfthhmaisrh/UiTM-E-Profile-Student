<?php
session_start();
include('db.php'); // Include database connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $student_id = $_POST['student-id'];
    $password = $_POST['password'];

    // Sanitize inputs
    $student_id = mysqli_real_escape_string($conn, $student_id);
    $password = mysqli_real_escape_string($conn, $password);

    // Check if the student exists
    $query = "SELECT * FROM students WHERE student_id = '$student_id' AND password = '$password'";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $student = mysqli_fetch_assoc($result);

        // Set session variables
        $_SESSION['student_id'] = $student_id;
        $_SESSION['student_name'] = $student['name']; // Optional

        // Redirect to dashboard
        header("Location: dashboard.php");
        exit();
    } else {
        echo "<script>alert('Invalid Student ID or Password!'); window.location.href='login.php';</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Login</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f4f7fc;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        .wrapper {
            flex: 1; /* Pushes footer to the bottom */
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .login-container {
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 40px;
            width: 100%;
            max-width: 400px;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
        }

        input {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 16px;
        }

        button {
            width: 100%;
            padding: 12px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }

        .register-link {
            text-align: center;
            margin-top: 20px;
        }

        .register-link a {
            color: #4CAF50;
            text-decoration: none;
        }

        .register-link a:hover {
            text-decoration: underline;
        }

        /* Footer */
        .footer {
            background-color: #2a2a3b;
            padding: 15px;
            text-align: center;
            font-size: 14px;
            color: white;
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
    <div class="wrapper">
        <div class="login-container">
            <h2>Student Login</h2>
            <form action="login.php" method="POST">
                <label for="student-id">Student ID:</label>
                <input type="text" id="student-id" name="student-id" placeholder="Enter your student ID" required>

                <label for="password">Password:</label>
                <input type="password" id="password" name="password" placeholder="Enter your password" required>

                <button type="submit">Login</button>
            </form>

            <div class="register-link">
                <p>Don't have an account? <a href="register.php">Register here</a></p>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="footer">
        &copy; <?php echo date("Y"); ?> UiTM Student E-profile
</body>
</html>



