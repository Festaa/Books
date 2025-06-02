<?php
session_start();
include_once("config.php");

if (isset($_POST['register'])) {
    $username = trim($_POST['username']);
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

   
    if (empty($username) || empty($password) || empty($confirm_password)) {
        $error = "Please fill in all the fields";
    } elseif ($password !== $confirm_password) {
        $error = "The passwords do not match.";
    } else {
        
        $sql = "SELECT * FROM users WHERE username = :username LIMIT 1";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(":username", $username);
        $stmt->execute();

        if ($stmt->fetch(PDO::FETCH_ASSOC)) {
            $error = "This username is already in use.";
        } else {
           
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            $sql = "INSERT INTO users (username, password, is_admin) VALUES (:username, :password, 0)";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(":username", $username);
            $stmt->bindParam(":password", $hashed_password);

            if ($stmt->execute()) {
                $_SESSION['success'] = "Registration was successful! You can now log in.";
                header("Location: login.php");
                exit();
            } else {
                $error = "Error during registration.";
            }
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Regjistrohu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="text-center">

<div class="container w-25 mt-5">
    <h1>Regjistrohu</h1>

    <?php if (isset($error)) { ?>
        <div class="alert alert-danger"><?= htmlspecialchars($error) ?></div>
    <?php } ?>

    <form method="post" action="signup.php">
        <div class="mb-3">
            <label>Username</label>
            <input type="text" name="username" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Password</label>
            <input type="password" name="password" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Confirm Password</label>
            <input type="password" name="confirm_password" class="form-control" required>
        </div>
        <button type="submit" name="register" class="btn btn-primary w-100">Register</button>
    </form>

    <p class="mt-3">Do you have an account? <a href="login.php">Log in here</a></p>
</div>

</body>
</html>
