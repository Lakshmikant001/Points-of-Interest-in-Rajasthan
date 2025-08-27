<?php 
session_start();

// Database connection
$conn = new mysqli("localhost", "root", "", "rajpoi");

// Static admin email
$admin_email = "lakshmikantdhaker1@gmail.com";

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['username'];
    $password = $_POST['password'];

    if ($email === $admin_email) {
        // Fetch hashed password from database
        $stmt = $conn->prepare("SELECT password FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result && $result->num_rows === 1) {
            $row = $result->fetch_assoc();
            $hashed_password = $row['password'];

            if (password_verify($password, $hashed_password)) {
                $_SESSION['username'] = $email;
                header("Location: admin_dashboard.php");
                exit();
            } else {
                $error = "Incorrect password.";
            }
        } else {
            $error = "Admin account not found in the database.";
        }
    } else {
        $error = "Only the admin can log in here.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #6A0DAD, #F2994A);
            font-family: 'Arial', sans-serif;
        }
        .container {
            max-width: 400px;
            margin-top: 150px;
            background-color: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }
        .login-header {
            text-align: center;
            font-size: 2rem;
            margin-bottom: 30px;
            color: #6A0DAD;
        }
        .form-control {
            border-radius: 50px;
            border: 1px solid #ddd;
            padding: 10px;
        }
        .btn-primary {
            background-color: #6A0DAD;
            border: none;
            border-radius: 50px;
            padding: 10px;
        }
        .btn-primary:hover {
            background-color: #5c08b3;
        }
        .alert-danger {
            font-size: 0.9rem;
            margin-top: 10px;
        }
        .footer-text {
            text-align: center;
            margin-top: 20px;
            font-size: 0.9rem;
            color: #666;
        }
        .top-left-logo {
            position: absolute;
            top: 20px;
            left: 20px;
            display: inline-block;
        }
        .top-left-logo img {
            width: 50px;
            height: auto;
        }
        .forgot-password-link {
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>
<body>

<a href="index.php" class="top-left-logo">
    <img src="logo111.png" alt="Top Left Logo">
</a>

<div class="container">
    <h2 class="login-header">Admin Login</h2>

    <?php if (isset($error)) { ?>
        <div class="alert alert-danger">
            <?= $error ?>
        </div>
    <?php } ?>

    <form method="POST" action="">
        <div class="mb-4">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control" id="username" name="username" required>
        </div>

        <div class="mb-4">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>

        <button type="submit" class="btn btn-primary w-100">Login</button>
    </form>

    <div class="forgot-password-link">
        <a href="forgot_password.php">Forgot Password?</a>
    </div>

    <div class="footer-text">
        <p>&copy; 2025 Admin Portal. All Rights Reserved.</p>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
