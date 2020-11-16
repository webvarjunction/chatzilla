<?php 
//Database Connection
include_once('connections/myconnect.php');

if(isset($_POST['submit'])){
	$fname = mysqli_real_escape_string($conn,$_POST['fname']);
	$lname = mysqli_real_escape_string($conn,$_POST['lname']);
	$username = mysqli_real_escape_string($conn,$_POST['username']);
	$password = mysqli_real_escape_string($conn,md5($_POST['password']));
	$mobile = mysqli_real_escape_string($conn,$_POST['mobile']);
	$email = mysqli_real_escape_string($conn,$_POST['email']);
	
	$query = "SELECT * FROM users WHERE username = '$username'";
	$result = mysqli_query($conn, $query) or die("Query Failed");
	if($result){
		if(mysqli_num_rows($result) > 0){
			?>
			<script type="text/javascript">
				alert("Username Already Exists! Please Try Diffrente Username!");
			</script>
	<?php
		}else{
			$insertQuery = "INSERT INTO users (fname,lname,username,password,mobile,email) VALUES ('$fname','$lname','$username','$password','$mobile','$email')";
			$result = mysqli_query($conn,$insertQuery) or die("Query Failed");
			if($result){
				?>
			<script type="text/javascript">
				alert("Data Inserted");
				window.location = "http://127.0.0.1/chatzilla/index.php";
			</script>
	<?php
			}
		}
	}
	
}

mysqli_close($conn);
?>

<!doctype html>
<html>
<head>
<?php include_once('sections/links.tpl'); ?>
<!--Custom CSS-->
<link rel="stylesheet" href="css/main.css" type="text/css">
</head>

<body>
	<header>
		<div class="container d-flex justify-content-center align-items-center">
			<div class="center_div my-4">
				<h1><a href="index.php">chat-zilla</a></h1>
				<h3>create account</h3>
				<form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
					<div class="form-group my-2">
						<input type="text" class="form-control" placeholder="First Name" name="fname" required>
					</div>
					<div class="form-group my-4">
						<input type="text" class="form-control" placeholder="Last Name" name="lname" required>
					</div>
					<div class="form-group my-4">
						<input type="text" class="form-control" placeholder="Username" name="username" required>
					</div>
					<div class="form-group my-4">
						<input type="password" class="form-control" placeholder="Password" name="password" required>
					</div>
					<div class="form-group my-4">
						<input type="text" class="form-control" placeholder="Mobile" name="mobile" required>
					</div>
					<div class="form-group my-4">
						<input type="text" class="form-control" placeholder="example@gmail.com" name="email" required>
					</div>
					<button type="submit" name="submit" class="btn btn-primary btn-block my-3">Submit</button>
					<p>Already registered! <a href="index.php">Login now!</a></p>
				</form>
			</div>
		</div>
	</header>
	
<?php include_once('sections/scriptLinks.tpl'); ?>
</body>
</html>