<?php
session_start();


if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="sq">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <style>
        body, html {
            height: 100%;
            margin: 0;
        }
        .bg-image {
           
            background-image: url('image.png');
            filter: blur(6px);
            -webkit-filter: blur(6px);
            height: 100%;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            position: fixed;
            width: 100%;
            z-index: -1;
            top: 0;
            left: 0;
        }
        .content {
            position: relative;
            background-color: rgba(255, 255, 255, 0.85);
            border-radius: 15px;
            padding: 30px;
            max-width: 600px;
            margin: 80px auto;
            box-shadow: 0 8px 16px rgba(0,0,0,0.3);
            text-align: center;
        }
        a.btn {
            min-width: 150px;
            margin: 10px;
        }
    </style>
</head>
<body>

<div class="bg-image"></div>

<div class="content">
    <h1 class="mb-4">Welcome, <?= htmlspecialchars($_SESSION['username']) ?>!</h1>
    <p class="mb-4">This is the home page where you can continue managing the books.</p>
    <a href="books.php" class="btn btn-primary">Books</a>
    <a href="dashboard.php" class="btn btn-secondary">Dashboard</a>
    <br><br>
    <a href="logout.php" class="btn btn-danger">Logout</a>
</div>

</body>
</html>
