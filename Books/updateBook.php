<?php
session_start();
include_once('config.php');

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $title = $_POST['title'];
    $author = $_POST['author'];
    $description = $_POST['description'];
    $genre = $_POST['genre'];
    $rating = $_POST['rating'];

    $sql = "UPDATE books SET title = :title, author = :author, description = :description, genre = :genre, rating = :rating WHERE id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':title', $title);
    $stmt->bindParam(':author', $author);
    $stmt->bindParam(':description', $description);
    $stmt->bindParam(':genre', $genre);
    $stmt->bindParam(':rating', $rating);
    $stmt->bindParam(':id', $id);
    $stmt->execute();

    header("Location: books.php");
    exit();
}
?>
