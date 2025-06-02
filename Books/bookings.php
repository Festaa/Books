<?php
session_start();
include_once('config.php');


if (!isset($_SESSION['username']) || !isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

$user_id = $_SESSION['user_id'];

$sql = "SELECT b.id, bk.title AS book_name, bk.author, bk.genre, b.booking_date 
        FROM bookings b 
        JOIN books bk ON b.book_id = bk.id 
        WHERE b.user_id = :user_id 
        ORDER BY b.booking_date DESC";



$stmt = $conn->prepare($sql);
$stmt->bindParam(':user_id', $user_id);
$stmt->execute();
$bookings = $stmt->fetchAll();
?>


<!DOCTYPE html>
<html>
<head>
    <title>My Bookings</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <h2>My Bookings</h2>

    <?php if (count($bookings) == 0): ?>
        <p>No bookings have been made yet.</p>
    <?php else: ?>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Book Title</th>
                    <th>Booking Date</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($bookings as $booking): ?>
                    <tr>
                        <td><?= htmlspecialchars($booking['book_name']) ?></td>
                        <td><?= $booking['booking_date'] ?></td>
                        
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
</div>

</body>
</html>
