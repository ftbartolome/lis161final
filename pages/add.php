<!DOCTYPE html>
<?php
	session_start();
?>
<html lang="en">
<head>
	<title>FEM</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
</head>

<body>

	<div class="container">
		<nav class="navbar navbar-expand-sm navbar-light" style="background-color: #e3f2fd;">
			 <!-- Brand -->
			<a class="navbar-brand" href="#"> <img src = "agenda.png" alt="CRUD" width="25px" height="25px"> </a>

			<!-- Links -->
			<ul class="navbar-nav">
				<li class="nav-item">
				  <a class="nav-link" href="../home.php">Home</a>
				</li>
				<?php 
					if(isset($_SESSION['username'])){
				?>
				<li class="nav-item">
				  <a class="nav-link" href="../pages/index.php">Browse</a>
				</li>
				<li class="nav-item">
				  <a class="nav-link" href="../pages/add.php">Add</a>
				</li>
				<li class="nav-item">
				  <a class="nav-link" href="../auth/logout.php">Logout</a>
				</li>
				<?php 
					} 
					else{	
				?>
				<li class="nav-item">
				  <a class="nav-link" href="../auth/login.php">Login</a>
				</li>
				<?php } ?>
			</ul>
			
			<ul class="navbar-nav mx-auto">
				<li>
				<?php 
					if(isset($_SESSION['username'])){
					echo "<p>Welcome ".$_SESSION['name']."!</p>";
					}
				?>
				</li>
			</ul>
			
			<ul class="navbar-nav ml-auto">
				<!--Search Bar-->
				<li>
					<form class="form-inline navbar-right" method="GET" action="../pages/search.php">
						<input class="form-control mr-sm-2" type="text" name="query" placeholder="Search">
						<button class="btn btn-success" type="submit">Search</button>
					</form>
				</li>
			</ul>																			
		</nav>
		<br>
		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-8">
				<div class="card">
				  <div class="card-header"></div>
				  <div class="card-body">
					<?php 
						if(!isset($_SESSION['username'])){
					?>
						<p>Please sign in <a href='../auth/login.php'>here</a> to view this page!</p>
					<?php 
						} else{
					?>
						<form action="../crud/create.php" method="POST" class="px-4 py-3">
							<div class="form-group">
								<label for="name" class="col-form-label">Name</label>
								<input type="text" class="form-control" name="name" placeholder="Name">
							</div>
							<div class="form-group">
								<label for="nickname" class="col-form-label">Nickname</label>
								<input type="text" class="form-control" name="nickname" placeholder="Nickname">
							</div>
							<div class="form-group">
								<label for="birthdate" class="col-form-label">Birth Date</label>
								<input type="date" class="form-control" id="birthdate" name="birthdate" placeholder="2018-01-30">
							</div>
							<div class="form-group">
								<label for="address" class="col-form-label">Address</label>
								<input type="text" class="form-control" name="address" placeholder="Address">
							</div>
							<div class="form-group">
								<label for="gryrlvl" class="col-form-label">Grade/Year Level</label>
								<input type="text" class="form-control" name="gryrlvl" placeholder="III">
							</div>
							<button type="submit" name="Submit" class="btn btn-primary">Add</button>
						</form>
					<?php
						}
					?>
				  </div>
				</div>
			</div>
			<div class="col-md-2"></div>
		</div>
	</div>
	
</body>
</html>
