<?php
session_start();

if (!isset($_SESSION['username']) || $_SESSION['is_admin'] != 1) {
    header("Location: home.php");
    exit();
}
?>


<!DOCTYPE html>
<html lang="sq">
<head>
    <meta charset="UTF-8" />
    <title>Add new Book</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body>

<div class="container mt-5">
    <h2>Add new Book</h2>

    <form method="post" action="insertBook.php">
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" name="title" id="title" class="form-control" required />
        </div>
        <div class="mb-3">
            <label for="author" class="form-label">Author</label>
            <input type="text" name="author" id="author" class="form-control" required />
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" id="description" class="form-control" rows="3" required></textarea>
        </div>
        <div class="mb-3">
            <label for="genre" class="form-label">Genre</label>
            <input type="text" name="genre" id="genre" class="form-control" required />
        </div>
        <div class="mb-3">
            <label for="rating" class="form-label">Rating</label>
            <input type="number" name="rating" id="rating" class="form-control" min="1" max="5" step="0.1" required />
        </div>

        <button type="submit" name="submit" class="btn btn-primary">Add Book</button>
        <a href="books.php" class="btn btn-secondary ms-2">Cancel</a>
    </form>
</div>

</body>
</html>
