<?php
session_start();

$user = $_SESSION['user'];
if (!isset($user)) {
    header("Location: login1.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
<<style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background: linear-gradient(135deg, #00c6ff, #0072ff);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0;
        }
        .dashboard {
            background: #fff;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.2);
            text-align: center;
            width: 400px;
        }
        .dashboard h2 {
            color: #333;
        }
        .dashboard p {
            margin: 15px 0;
            color: #555;
        }
        .dashboard a {
            display: inline-block;
            padding: 12px 20px;
            background: linear-gradient(135deg, #ff416c, #ff4b2b);
            color: #fff;
            text-decoration: none;
            border-radius: 8px;
            transition: 0.3s;
        }
        .dashboard a:hover {
            opacity: 0.9;
        }
    </style>
</head>
<body>
    <div class="dashboard">
        <h2>Welcome, <?php echo $user; ?></h2>
        <p>You are now logged in. Sessions keep you authenticated across pages.</p>
        <a href="logout1.php">Logout</a>
    </div>
</body>
</html>