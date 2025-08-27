<?php 
session_start();

// --- Restrict access to admin only ---
if (!isset($_SESSION['username']) || $_SESSION['username'] !== 'lakshmikantdhaker1@gmail.com') {
    echo "<script>alert('Access Denied! Only admin can access this page.'); window.location.href='login.php';</script>";
    exit();
}

$conn = new mysqli("localhost", "root", "", "rajpoi");

// --- Handle delete action ---
if (isset($_GET['delete'])) {
    $id = intval($_GET['delete']);
    $conn->query("DELETE FROM users WHERE id = $id");
}

// --- Fetch users ---
$result = $conn->query("SELECT id, email, password, registered_at, status FROM users");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard - Users</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body {
            background: #f8f9fa;
        }
        .container {
            margin-top: 50px;
        }
        .btn-sm {
            margin-right: 5px;
        }
        table {
            background: #fff;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 0 15px rgba(0,0,0,0.1);
        }
        th {
            background: #6A0DAD;
            color: #fff;
        }
        .masked {
            font-family: 'Courier New', Courier, monospace;
            letter-spacing: 3px;
            color: #999;
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
        .logout-btn {
            position: absolute;
            top: 20px;
            right: 20px;
            background-color: #dc3545;
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 50px;
            font-size: 0.9rem;
            text-decoration: none;
        }
        .logout-btn:hover {
            background-color: #c82333;
        }
        .verify-btn {
            background-color: #198754;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 8px;
            font-size: 1rem;
            text-decoration: none;
            margin-bottom: 20px;
        }
        .verify-btn:hover {
            background-color: #157347;
        }
    </style>
</head>
<body>

<a href="index.php" class="top-left-logo">
    <img src="logo111.png" alt="Top Left Logo">
</a>

<a href="logout.php" class="logout-btn">Logout</a>

<div class="container">
    <h2 class="mb-3">👤 User Management Panel</h2>

    <!-- ✅ New Verify POIs Button -->
    <a href="admin_verification.php" class="verify-btn">✔️ Verify POIs</a>

    <table class="table table-hover">
        <thead>
        <tr>
            <th>User Email</th>
            <th>Password</th>
            <th>Registered On</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        <?php while ($row = $result->fetch_assoc()) { ?>
            <tr>
                <td><?= htmlspecialchars($row['email']) ?></td>
                <td class="masked">••••••••</td>
                <td><?= $row['registered_at'] ?></td>
                <td>
                    <?= ($row['status'] === 'blocked') ? '<span class="badge bg-danger">Blocked</span>' : '<span class="badge bg-success">Active</span>' ?>
                </td>
                <td>
                    <a href="change_password.php?id=<?= $row['id'] ?>" class="btn btn-warning btn-sm">Change Password</a>

                    <?php if ($row['status'] === 'active'): ?>
                        <a href="block_user.php?id=<?= $row['id'] ?>" class="btn btn-secondary btn-sm">Block</a>
                    <?php else: ?>
                        <a href="block_user.php?id=<?= $row['id'] ?>" class="btn btn-success btn-sm">Unblock</a>
                    <?php endif; ?>

                    <a href="admin_dashboard.php?delete=<?= $row['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</a>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>

</body>
</html>
