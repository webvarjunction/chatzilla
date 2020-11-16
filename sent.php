<?php 
//Database Connection
include_once('connections/myconnect.php');


session_start();
if(!isset($_SESSION['username'])){
	header('location: index.php');
}else{
	
	$query = "SELECT receiver, messages FROM chatdata";
	$result = mysqli_query($conn, $query) or die("Query Failed");
	
	
?>
<!doctype html>
<html>
<head>
<?php include_once('sections/links.tpl'); ?>
<!--Custom CSS-->
<link rel="stylesheet" href="css/inbox.css" type="text/css">
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
				<h1 class="bg-success text-center dash">Sent</h1>
				<div class="details">
					<form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
						<table>
							<thead>
								<tr>
									<th>Reveiver</th>
									<th>Messages</th>
								</tr>
								
							</thead>
							<tbody>
						<?php while($row = mysqli_fetch_assoc($result)){ ?>
								<tr>
									<td><?php echo $row['receiver']; ?></td>
									<td><?php echo $row['messages']; ?></td>
								</tr>
						<?php } ?>
							</tbody>
						</table>
					</form>
				</div>
			</div>
		</div>
	</header>
	<?php
	
	
}
	mysqli_close($conn);
	?>
</body>
</html>