<?php
session_start();
$conn = new mysqli("localhost", "root", "", "rajpoi");

// Load PHPMailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require __DIR__ . '/vendor/autoload.php';

// Google reCAPTCHA secret key
$secretKey = "6LduQgorAAAAAEPDjPX_HdY3A66SxQzbYyEmUGmc";

function sendVerificationEmail($email, $code) {
    $mail = new PHPMailer(true);

    try {
        // SMTP configuration (you can replace it with your own SMTP server details)
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';  // Your SMTP server, e.g., Gmail
        $mail->SMTPAuth = true;
        $mail->Username = 'lakshmikantdhaker1@gmail.com';  // Your email address
        $mail->Password = 'yidb aebg gplw bsbj';     // App Password generated from Google
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        // Email content
        $mail->setFrom('your-email@gmail.com', 'Points of Interest in Rajasthan');
        $mail->addAddress($email);
        $mail->isHTML(true);
        $mail->Subject = 'Verify your email - Points of Interest in Rajasthan';
        $mail->Body = "
            <p>Hello,</p>
            <p>Your verification code is: <strong>$code</strong></p>
            <p>Please enter this code on the website to complete your registration.</p>
            <p>Thanks,<br>Team Rajasthan POI</p>
        ";

        // Send the email
        $mail->send();
        return true;
    } catch (Exception $e) {
        return "Mailer Error: {$mail->ErrorInfo}";
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $recaptchaResponse = $_POST['g-recaptcha-response'];

    // Verify reCAPTCHA
    $verifyResponse = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secretKey&response=$recaptchaResponse");
    $responseData = json_decode($verifyResponse);

    if (!$responseData->success) {
        $error = "reCAPTCHA verification failed!";
    } else {
        // Check if email is already registered
        $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $error = "Email already registered!";
        } else {
            // Generate a random 6-digit verification code
            $verification_code = rand(100000, 999999);

            // Store session data for verification step
            $_SESSION['email'] = $email;
            $_SESSION['password'] = password_hash($password, PASSWORD_BCRYPT);
            $_SESSION['verification_code'] = $verification_code;

            // Send verification email
            $mailResult = sendVerificationEmail($email, $verification_code);

            if ($mailResult === true) {
                // Redirect user to the verification code page
                header("Location: verify_code.php");
                exit();
            } else {
                $error = "Email sending failed: $mailResult";
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <link rel="stylesheet" href="styles.css">
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
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

        .container .logo {
            width: 80px;
            height: auto;
            margin-bottom: 20px;
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

        .g-recaptcha {
            margin-top: 15px;
        }

        @media (max-width: 500px) {
            .container {
                padding: 20px;
            }
            .input-field {
                padding: 10px;
                font-size: 0.95em;
            }
            .button {
                padding: 10px 20px;
                font-size: 1em;
            }
        }
    </style>
</head>
<body>

<a href="index.php" class="top-left-logo">
    <img src="logo111.png" alt="Top Left Logo">
</a>

<div class="container">
    <img src="logo111.png" alt="POI Logo" class="logo">

    <h2>Create an Account</h2>
    <?php if (isset($error)) echo "<p class='error'>$error</p>"; ?>

    <form method="POST">
        <input type="email" name="email" class="input-field" placeholder="Email" required>
        <input type="password" name="password" class="input-field" placeholder="Password" required>

        <div class="g-recaptcha" data-sitekey="6LduQgorAAAAAPs12bRt9BpgoDM-JRPkEfCmm3q6"></div>

        <button type="submit" class="button">Register</button>
    </form>

    <p>Already have an account? <a href="login.php" class="link">Login here</a></p>
</div>

</body>
</html>
