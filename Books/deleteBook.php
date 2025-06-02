<?php
session_start();
include_once('config.php');

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    
    $sqlDeleteBookings = "DELETE FROM bookings WHERE book_id = :id";
    $stmt1 = $conn->prepare($sqlDeleteBookings);
    $stmt1->bindParam(':id', $id);
    $stmt1->execute();

   
    $sqlDeleteBook = "DELETE FROM books WHERE id = :id";
    $stmt2 = $conn->prepare($sqlDeleteBook);
    $stmt2->bindParam(':id', $id);
    $stmt2->execute();
}

header("Location: books.php");
exit();
?>
