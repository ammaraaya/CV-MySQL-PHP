<?php
session_start();
?>
<!doctype html>
<html lang="en">
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="main.css">
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
	<title>Login CV</title>
</head>
<body>
	<div class="container2">

		<div class="row">
			<div class="col-md-4 offset-md-4 mt-5">

				<?php
				if(isset($_SESSION['error'])) {
				?>
				<div class="alert alert-warning" role="alert">
				  <?php echo $_SESSION['error']?>
				</div>
				<?php
				}
				?>


				<div class="card1 ">
					<div class="card-title text-center">
						<h1>Login Form</h1>
					</div>
					<div class="card2">
						<form action="proses.php" method="post">
							<div class="form-group">
								<label for="username">Email address</label>
								<input type="text" name="username" class="form-control" id="username" aria-describedby="username" placeholder="username">

							</div>
							<div class="form-group">
								<label for="password">Password</label>
								<input type="password" name="password" class="form-control" id="password" placeholder="Password">
							</div>

							<button class="btn btn-primary">Submit</button>
						</form>

					</div>
				</div>
			</div>

		</div>

	</div>
</body>