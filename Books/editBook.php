<?php
session_start();
include_once('config.php');

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}


if (!isset($_GET['id'])) {
    header("Location: books.php");
    exit();
}

$id = $_GET['id'];


$sql = "SELECT * FROM books WHERE id = :id";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':id', $id);
$stmt->execute();
$book = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$book) {
    echo "Libri nuk u gjet!";
    exit();
}


if (isset($_POST['submit'])) {
    $title = $_POST['title'];
    $author = $_POST['author'];
    $description = $_POST['description'];
    $genre = $_POST['genre'];
    $rating = $_POST['rating'];

    if (!empty($title) && !empty($author)) {
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
    } else {
        $error = "Titulli dhe Autori janë të detyrueshëm.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edito Libër</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2>Edito Libër</h2>
    <?php if (isset($error)) { ?>
        <div class="alert alert-danger"><?= $error ?></div>
    <?php } ?>
    <form method="post" action="">
        <div class="mb-3">
            <label>Titulli:</label>
            <input type="text" name="title" class="form-control" value="<?= htmlspecialchars($book['title']) ?>" required>
        </div>
        <div class="mb-3">
            <label>Autori:</label>
            <input type="text" name="author" class="form-control" value="<?= htmlspecialchars($book['author']) ?>" required>
        </div>
        <div class="mb-3">
            <label>Përshkrimi:</label>
            <textarea name="description" class="form-control"><?= htmlspecialchars($book['description']) ?></textarea>
        </div>
        <div class="mb-3">
            <label>Zhanri:</label>
            <input type="text" name="genre" class="form-control" value="<?= htmlspecialchars($book['genre']) ?>">
        </div>
        <div class="mb-3">
            <label>Vlerësimi (1-5):</label>
            <input type="number" name="rating" class="form-control" min="1" max="5" value="<?= htmlspecialchars($book['rating']) ?>">
        </div>
        <button type="submit" name="submit" class="btn btn-primary">Ruaj Ndryshimet</button>
        <a href="books.php" class="btn btn-secondary">Anulo</a>
    </form>
</div>
</body>
</html>
