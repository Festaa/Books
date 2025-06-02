<!DOCTYPE html>
<html>
<head>
	<title>Register - Books Management</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
	<div class="row justify-content-center">
		<div class="col-md-6">
			<div class="card p-4 shadow">
				<h2 class="text-center mb-4">Register</h2>
				<form method="POST" action="register.php">
					<div class="mb-3">
						<label class="form-label">Full Name</label>
						<input type="text" name="emri" class="form-control" required>
					</div>
					<div class="mb-3">
						<label class="form-label">Username</label>
						<input type="text" name="username" class="form-control" required>
					</div>
					<div class="mb-3">
						<label class="form-label">Email</label>
						<input type="email" name="email" class="form-control" required>
					</div>
					<div class="mb-3">
						<label class="form-label">Password</label>
						<input type="password" name="password" class="form-control" required>
					</div>
					<div class="mb-3">
						<label class="form-label">Confirm Password</label>
						<input type="password" name="confirm_password" class="form-control" required>
					</div>
					<button type="submit" name="submit" class="btn btn-primary w-100">Register</button>
					<p class="text-center mt-3">Already registered? <a href="login.php">Login here</a></p>
				</form>
			</div>
		</div>
	</div>
</div>

</body>
</html>
