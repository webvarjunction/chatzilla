<?php 
//Database Connection
include_once('connections/myconnect.php');

//Send messages to database
if(isset($_POST['submit'])){
	$sender = $_POST['sender'];
	$receiver = $_POST['receiver'];
	$msg = $_POST['messages'];
	
	$query1 = "INSERT INTO chatdata (sender,receiver,messages) VALUES ('$sender', '$receiver', '$msg')";
	$result1 = mysqli_query($conn, $query1) or die("Query Faild");
}


session_start();
if(!isset($_SESSION['username'])){
	header('location: index.php');
}else{
	$query = "SELECT username FROM users";
	$result = mysqli_query($conn, $query) or die("Query Failed");
	
	
?>
<!doctype html>
<html>
<head>
<?php include_once('sections/links.tpl'); ?>
<!--Custom CSS-->
<link rel="stylesheet" href="css/compose.css" type="text/css">
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
				<a href="" class="active">compose</a>
				<a href="profile.php">profile</a>
				<a href="inbox.php">inbox</a>
				<a href="sent.php">sent</a>
			</div>
			<div class="col-lg-10 col-md-10 col-10 right_div">
				<h1 class="bg-success text-center dash">Compose</h1>
				<div class="details">
					<form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
						<input type="hidden" name="sender" id="sender" value="<?php echo $_SESSION['username']; ?>">
						<label for="receiver">To : </label><br>
						<select name="receiver" id="receiver">
							<option value="">Select</option>
							<?php while($row = mysqli_fetch_assoc($result)){ ?>
							<option value="<?php echo $row['username']; ?>"><?php echo $row['username']; ?></option>
							<?php } ?>
						</select><br><br>
						<textarea name="messages" id="messages" cols="50" rows="10" placeholder="Enter Your Messages..."></textarea><br><br>
						<input type="submit" name="submit" value="Send" class="btn btn-success">
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