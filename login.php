<?php  
session_start();
$conn = new mysqli("localhost", "root", "", "rajpoi");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Fetch password, status, and role
    $stmt = $conn->prepare("SELECT password, status, role FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // Check if user is blocked
        if ($row['status'] === 'blocked') {
            $error = "Your account has been blocked. Please contact the administrator.";
        } elseif (password_verify($password, $row['password'])) {
            // Set session variables
            $_SESSION['username'] = $email;
            $_SESSION['role'] = $row['role'];  // Store role in session

            // Redirect based on role
            if ($row['role'] === 'admin') {
                header("Location: admin_dashboard.php");
                exit();
            } else {
                header("Location: index.php");
                exit();
            }
        } else {
            $error = "Invalid credentials!";
        }
    } else {
        $error = "Invalid credentials!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .top-left-logo {
            position: fixed;
            top: 20px;
            left: 20px;
            z-index: 1000;
        }

        .top-left-logo img {
            height: 50px;
        }

        .container {
            background-color: white;
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
            text-align: center;
        }

        .logo {
            width: 80px;
            height: auto;
            display: block;
            margin: 0 auto 20px auto;
        }

        h2 {
            margin-bottom: 20px;
            color: #2d3748;
        }

        .input-field {
            width: 100%;
            padding: 12px 15px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 1em;
        }

        .button {
            background-color: #6A0DAD;
            color: white;
            padding: 12px 25px;
            margin-top: 20px;
            border: none;
            border-radius: 5px;
            font-size: 1.1em;
            cursor: pointer;
            transition: background-color 0.3s, transform 0.2s;
        }

        .button:hover {
            background-color: #8A2BE2;
            transform: scale(1.05);
        }

        .link {
            color: #6A0DAD;
            text-decoration: none;
            font-weight: bold;
        }

        .link:hover {
            text-decoration: underline;
        }

        .error {
            color: red;
            margin-bottom: 15px;
        }
    </style>
</head>
<body>

<a href="index.php" class="top-left-logo">
    <img src="logo111.png" alt="Top Left Logo">
</a>

<div class="container">
    <img src="logo111.png" alt="POI Logo" class="logo">
    <h2>Login</h2>
    <?php if (isset($error)) echo "<p class='error'>$error</p>"; ?>

    <form method="POST">
        <input type="email" name="email" class="input-field" placeholder="Email" required>
        <input type="password" name="password" class="input-field" placeholder="Password" required>
        <button type="submit" class="button">Login</button>
    </form>

    <p><a href="forgot_password.php" class="link">Forgot Password?</a></p>
    <p>Don't have an account? <a href="register.php" class="link">Register here</a></p>
</div>

</body>
</html>
