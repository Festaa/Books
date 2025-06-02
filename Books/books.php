<?php
session_start();
include_once('config.php');

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

if (isset($_SESSION['message'])) {
    echo "<div class='alert alert-info text-center'>" . htmlspecialchars($_SESSION['message']) . "</div>";
    unset($_SESSION['message']);
}


if (isset($_SESSION['is_admin']) && $_SESSION['is_admin'] == 1) {
    if (isset($_POST['submit'])) {
        $title = $_POST['title'];
        $author = $_POST['author'];
        $description = $_POST['description'];
        $genre = $_POST['genre'];
        $rating = $_POST['rating'];

        if (!empty($title) && !empty($author)) {
            try {
                $sql = "INSERT INTO books (title, author, description, genre, rating)
                        VALUES (:title, :author, :description, :genre, :rating)";
                $stmt = $conn->prepare($sql);
                $stmt->bindParam(':title', $title);
                $stmt->bindParam(':author', $author);
                $stmt->bindParam(':description', $description);
                $stmt->bindParam(':genre', $genre);
                $stmt->bindParam(':rating', $rating);
                $stmt->execute();
                echo "<div class='alert alert-success'>Libri u shtua me sukses!</div>";
            } catch (PDOException $e) {
                echo "<div class='alert alert-danger'>Gabim gjatë shtimit të librit: " . $e->getMessage() . "</div>";
            }
        } else {
            echo "<div class='alert alert-warning'>Ju lutem plotësoni Titullin dhe Autorin.</div>";
        }
    }
}


$books = $conn->query("SELECT * FROM books")->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Manage Books</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2>Book List</h2>

    
    <?php if (isset($_SESSION['is_admin']) && $_SESSION['is_admin'] == 1): ?>
        <h3>Add new Book</h3>
        <form method="post" action="books.php" class="mb-4">
            <div class="mb-3">
                <label>Title:</label>
                <input type="text" name="title" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Author:</label>
                <input type="text" name="author" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Description:</label>
                <textarea name="description" class="form-control"></textarea>
            </div>
            <div class="mb-3">
                <label>Genre:</label>
                <input type="text" name="genre" class="form-control">
            </div>
            <div class="mb-3">
                <label>Rating (1-5):</label>
                <input type="number" name="rating" class="form-control" min="1" max="5">
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Add Book</button>
        </form>
    <?php endif; ?>

    <hr>

    <table class="table table-bordered">
        <thead>
            <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Author</th>
            <th>Genre</th>
            <th>Rating</th>
            <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($books as $book) { ?>
            <tr>
                <td><?= $book['id'] ?></td>
                <td><?= htmlspecialchars($book['title']) ?></td>
                <td><?= htmlspecialchars($book['author']) ?></td>
                <td><?= htmlspecialchars($book['genre']) ?></td>
                <td><?= htmlspecialchars($book['rating']) ?></td>
                <td>
                    <?php if (isset($_SESSION['is_admin']) && $_SESSION['is_admin'] == 1): ?>
                        <a href="editBook.php?id=<?= $book['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                        <a href="deleteBook.php?id=<?= $book['id'] ?>" class="btn btn-danger btn-sm"
                           onclick="return confirm('A jeni të sigurt që dëshironi ta fshini këtë libër?');">Delete</a>
                        <span class="text-muted">Admin cannot reserve"</span>
                    <?php else: ?>
                        
                        <form method="post" action="addBooking.php" style="display:inline;">
                            <input type="hidden" name="book_id" value="<?= $book['id'] ?>">
                            <button type="submit" name="submit" class="btn btn-success btn-sm">Reserve</button>
                        </form>
                    <?php endif; ?>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>
</body>
</html>
