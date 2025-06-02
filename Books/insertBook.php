<?php
session_start();
include_once('config.php');

if (!isset($_SESSION['username']) || $_SESSION['is_admin'] != 1) {
    header("Location: home.php");
    exit();
}

if (isset($_POST['submit'])) {
    $title = $_POST['title'];
    $author = $_POST['author'];
    $description = $_POST['description'];
    $genre = $_POST['genre'];
    $rating = $_POST['rating'];

    $sql = "INSERT INTO books (title, author, description, genre, rating) VALUES (:title, :author, :description, :genre, :rating)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':title', $title);
    $stmt->bindParam(':author', $author);
    $stmt->bindParam(':description', $description);
    $stmt->bindParam(':genre', $genre);
    $stmt->bindParam(':rating', $rating);

    if ($stmt->execute()) {
        header("Location: books.php");
        exit();
    } else {
        echo "Error while adding the book.";
    }
} else {
    header("Location: addBook.php");
    exit();
}
?>
