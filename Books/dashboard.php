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
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet" />
    <style>
        body {
            background-color: #f8f9fa;
        }
        .card:hover {
            box-shadow: 0 8px 16px rgba(0,0,0,0.15);
            transform: translateY(-5px);
            transition: all 0.3s ease-in-out;
        }
        header {
            box-shadow: 0 2px 6px rgba(0,0,0,0.1);
        }
        .book-img {
            height: 200px;
            object-fit: cover;
        }
    </style>
</head>
<body>

<header class="navbar navbar-dark bg-primary p-3 d-flex justify-content-between align-items-center">
    <a class="navbar-brand fs-4" href="#">Welcome, <strong><?php echo htmlspecialchars($_SESSION['username']); ?></strong></a>
    <a href="logout.php" class="btn btn-outline-light"><i class="fas fa-sign-out-alt"></i> Logout</a>
</header>

<div class="container mt-5">
    <h1 class="mb-4 text-center">Dashboard</h1>
    <p class="text-center text-muted mb-5">This is the user control panel.</p>

    <div class="row g-4 justify-content-center">
        <div class="col-12 col-md-6 col-lg-4">
            <a href="books.php" class="text-decoration-none">
                <div class="card text-center p-4 h-100">
                    <i class="fas fa-book fa-3x mb-3 text-primary"></i>
                    <h5 class="card-title">Manage Books</h5>
                    <p class="card-text text-muted">Add, edit, and delete books in the database.</p>
                </div>
            </a>
        </div>

        <div class="col-12 col-md-6 col-lg-4">
            <a href="bookings.php" class="text-decoration-none">
                <div class="card text-center p-4 h-100">
                    <i class="fas fa-calendar-check fa-3x mb-3 text-success"></i>
                    <h5 class="card-title">Bookings</h5>
                    <p class="card-text text-muted">View and manage book bookings.</p>
                </div>
            </a>
        </div>

       
    

    <hr class="my-5">

    <h3 class="text-center mb-4">Latest Books</h3>
    <div class="row g-4 justify-content-center">
        <div class="col-12 col-md-4">
            <div class="card h-100 shadow-sm">
                <img src="book2.png" class="card-img-top book-img" alt="Libri 1">
                <div class="card-body">
                    <h5 class="card-title">November 9</h5>
                    <p class="card-text">Colleen Hoover</p>
                    <a href="books.php" class="btn btn-primary">See More</a>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-4">
            <div class="card h-100 shadow-sm">
                <img src="book3.png" class="card-img-top book-img" alt="Libri 2">
                <div class="card-body">
                    <h5 class="card-title">The 7 habits of highly effective people</h5>
                    <p class="card-text">Stephen Covey</p>
                    <a href="books.php" class="btn btn-primary">See More</a>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-4">
            <div class="card h-100 shadow-sm">
                <img src="book4.png" class="card-img-top book-img" alt="Libri 3">
                <div class="card-body">
                    <h5 class="card-title">Surviving Summer</h5>
                    <p class="card-text">Lynley Phillips</p>
                    <a href="books.php" class="btn btn-primary">See More</a>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js"></script>
</body>
</html>



