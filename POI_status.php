<?php 
session_start();
if (!isset($_SESSION['username'])) {
    die("User not logged in.");
}

$conn = new mysqli("localhost", "root", "", "rajpoi");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$email = $_SESSION['username'];

// Get user_id based on email
$stmt = $conn->prepare("SELECT id FROM users WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    die("User not found.");
}

$row = $result->fetch_assoc();
$user_id = $row['id'];

// Get pending POIs for this user
$stmt2 = $conn->prepare("SELECT * FROM pending_poi WHERE user_id = ?");
$stmt2->bind_param("i", $user_id);
$stmt2->execute();
$result2 = $stmt2->get_result();
?>
<!DOCTYPE html>
<html>
<head>
    <title>POI Submission Status</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: #eef2f3;
            padding: 40px;
            margin: 0;
        }

        /* Logo */
        .logo {
            position: absolute;
            top: 20px;
            left: 20px;
            width: 60px;
            height: 60px;
            border-radius: 50%; /* Circular logo */
            overflow: hidden;
        }

        .logo img {
            width: 100%;
            height: 100%;
            object-fit: cover; /* Ensure the logo is fully contained in the circle */
        }

        h2 {
            text-align: center;
            color: #333;
            margin-bottom: 30px;
        }

        .status-box {
            background: white;
            margin: 20px auto;
            padding: 20px;
            border-left: 6px solid #2196F3;
            border-radius: 8px;
            max-width: 600px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }

        .status-box h3 {
            margin: 0 0 10px;
            color: #2196F3;
        }

        .status-box p {
            margin: 5px 0;
        }
    </style>
</head>
<body>
      <a href="index.php" class="logo"> <!-- Link now points to index.php -->
            <img src="logo111.png" alt="POI Web Logo" />
        </a>
    <!-- /*<img src="logo11.jpg" alt="Logo" class="logo"> -->
    <h2>Your Submitted POIs</h2>

    <?php if ($result2->num_rows > 0): ?>
        <?php while ($poi = $result2->fetch_assoc()): ?>
            <div class="status-box">
                <h3><?= htmlspecialchars($poi['LocationName']) ?></h3>
                <p>Status: 
                    <strong><?= htmlspecialchars(ucfirst($poi['Status'])) ?></strong>
                </p>
                <p>
                    <?php if ($poi['Status'] === 'pending'): ?>
                        🕒 Your POI is awaiting approval. Our team is reviewing it!
                    <?php elseif ($poi['Status'] === 'approved'): ?>
                        ✅ Congratulations! Your POI has been approved and published.
                    <?php elseif ($poi['Status'] === 'rejected'): ?>
                        ❌ Your POI was not approved. Please review and resubmit.
                    <?php else: ?>
                        ℹ️ Status Unknown.
                    <?php endif; ?>
                </p>
            </div>
        <?php endwhile; ?>
    <?php else: ?>
        <div class="status-box">
            <p>No POIs submitted yet. Submit one to track your approval status here.</p>
        </div>
    <?php endif; ?>
</body>
</html>
