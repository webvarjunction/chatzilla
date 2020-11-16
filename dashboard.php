<?php 
//Database Connection
include_once('connections/myconnect.php');
session_start();
if(!isset($_SESSION['username'])){
	header('location: index.php');
}else{
	


?>
<!doctype html>
<html>
<head>
<?php include_once('sections/links.tpl'); ?>
<!--Custom CSS-->
<link rel="stylesheet" href="css/dashboard.css" type="text/css">
</head>

<body>
	<header>
		<nav class="d-flex justify-content-between align-items-center px-5 bg-info">
			<h1 class="text-uppercase text-white"><a href="dashboard.php">chat-zilla</a></h1>
			<h1 class="text-body">Welcome <?php echo $_SESSION['fname']. " " . $_SESSION['lname']; ?></h1>
			<a href="logout.php" class="btn btn-danger">Logout</a>
		</nav>
		<div class="row">
			<div class="col-lg-2 col-md-2 col-2 d-flex flex-column left_div">
				<a href="compose.php" class="active">compose</a>
				<a href="profile.php">profile</a>
				<a href="inbox.php">inbox</a>
				<a href="sent.php">sent</a>
			</div>
			<div class="col-lg-10 col-md-10 col-10 right_div">
				<h1 class="bg-success text-center dash">Dashboard</h1>
				<div class="details">
					<table>
						<tbody>
							<tr>
								<td>First Name</td>
								<td><?php echo $_SESSION['fname']; ?></td>
							</tr>
							<tr>
								<td>Last Name</td>
								<td><?php echo $_SESSION['lname']; ?></td>
							</tr>
							<tr>
								<td>Username</td>
								<td><?php echo $_SESSION['username']; ?></td>
							</tr>
							<tr>
								<td>Mobile</td>
								<td><?php echo $_SESSION['mobile']; ?></td>
							</tr>
							<tr>
								<td>Email</td>
								<td><?php echo $_SESSION['email']; }?></td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</header>
</body>
</html>