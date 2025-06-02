<?php
session_start();

include_once('config.php');


if (isset($_SESSION['is_admin']) && (int)$_SESSION['is_admin'] === 1) {
    $_SESSION['message'] = "Admini nuk lejohet të bëjë rezervime.";
    header("Location: books.php");
    exit();
}

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

if (isset($_POST['submit'])) {
    $book_id = $_POST['book_id'];
    $user_id = $_SESSION['user_id'];

    if (!empty($book_id)) {

        
        $sqlCheck = "SELECT * FROM bookings WHERE user_id = :user_id AND book_id = :book_id";
        $stmtCheck = $conn->prepare($sqlCheck);
        $stmtCheck->bindParam(':user_id', $user_id);
        $stmtCheck->bindParam(':book_id', $book_id);
        $stmtCheck->execute();

        if ($stmtCheck->rowCount() > 0) {
            $_SESSION['message'] = "Keni rezervuar tashmë këtë libër.";
        } else {
            
            $sql = "INSERT INTO bookings (user_id, book_id) VALUES (:user_id, :book_id)";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':user_id', $user_id);
            $stmt->bindParam(':book_id', $book_id);

            if ($stmt->execute()) {
                $_SESSION['message'] = "Rezervimi u krye me sukses!";
            } else {
                $_SESSION['message'] = "Gabim gjatë rezervimit. Provoni përsëri.";
            }
        }

        header("Location: books.php");
        exit();

    } else {
        $_SESSION['message'] = "Nuk u dërgua ID-ja e librit për rezervim.";
        header("Location: books.php");
        exit();
    }
} else {
    header("Location: books.php");
    exit();
}

