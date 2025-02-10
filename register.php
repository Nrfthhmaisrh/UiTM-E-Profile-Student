<?php
session_start();
include('db.php');  // Include database connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $student_id = $_POST['student-id'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm-password'];

    // Sanitize inputs
    $student_id = mysqli_real_escape_string($conn, $student_id);
    $password = mysqli_real_escape_string($conn, $password);
    $confirm_password = mysqli_real_escape_string($conn, $confirm_password);

    // Check if passwords match
    if ($password !== $confirm_password) {
        echo "<script>alert('Passwords do not match!'); window.location.href='register.php';</script>";
        exit();
    } else {
        // Check if student ID already exists
        $sql = "SELECT * FROM students WHERE student_id = '$student_id'";
        $result = mysqli_query($conn, $sql);
        
        if (mysqli_num_rows($result) > 0) {
            echo "<script>alert('Student ID already exists!'); window.location.href='register.php';</script>";
            exit();
        } else {
            // Store password as plain text (⚠️ Not Secure)
            $sql = "INSERT INTO students (student_id, password) VALUES ('$student_id', '$password')";
            if (mysqli_query($conn, $sql)) {
                echo "<script>alert('Registration successful! Redirecting to login...'); window.location.href='login.php';</script>";
                exit();
            } else {
                echo "<script>alert('Error: " . mysqli_error($conn) . "');</script>";
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Registration</title>
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
            min-height: 100vh; /* Ensures full height */
        }

        .wrapper {
            flex: 1; /* Pushes the footer to the bottom */
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .register-container {
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
        <div class="register-container">
            <h2>Student Registration</h2>
            <form action="register.php" method="POST">
                <label for="student-id">Student ID:</label>
                <input type="text" id="student-id" name="student-id" placeholder="Enter your student ID" required>

                <label for="password">Password:</label>
                <input type="password" id="password" name="password" placeholder="Enter your password" required>

                <label for="confirm-password">Confirm Password:</label>
                <input type="password" id="confirm-password" name="confirm-password" placeholder="Confirm your password" required>

                <button type="submit">Register</button>
            </form>
        </div>
    </div>
    
    <!-- Footer -->
    <footer class="footer">
        &copy; <?php echo date("Y"); ?> UiTM Student E-profile
    </footer>
</body>
</html>

