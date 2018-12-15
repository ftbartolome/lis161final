<!DOCTYPE html>
<?php
	session_start();
?>
<?php
//including the database connection file
include_once("../config/config.php");
 
//fetching data in descending order (lastest entry first)
$result = mysqli_query($mysqli, "SELECT * FROM clients ORDER BY id");
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
					<table class="table">
						<thead class="thead-light text-center">
						<tr bgcolor='#CCCCCC'>
						<td>Name</td>
						<td>Nickname</td>
						<td>Birthdate</td>
						<td>Address</td>
						<td>Grade/Year Level</td>
						<td>Update</td>
						</tr>
						</thead>
						<tbody class="text-center">
						<?php
							while($res = mysqli_fetch_array($result)) {        
								echo "<tr>";
								echo "<td>".$res['name']."</td>";
								echo "<td>".$res['nickname']."</td>";
								echo "<td>".$res['birthdate']."</td>";  
								echo "<td>".$res['address']."</td>"; 
								echo "<td>".$res['gryrlvl']."</td>"; 						
								echo "<td><a href=\"../pages/edit.php?id=$res[id]\">Edit</a> | <a href=\"../crud/delete.php?id=$res[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";        
								echo "</tr>";
							}
						?>
						</tbody>
					</table>    
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