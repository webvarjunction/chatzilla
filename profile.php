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
				<h1 class="bg-success text-center dash">Profile</h1>
				<div class="details">
					<form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
						<input type="hidden" name="id" value="<?php echo $_SESSION['id']; ?>">
					<table>
						<tbody>
							<tr>
								<td>First Name</td>
								<td> <input type="text" name="fname" value="<?php echo $_SESSION['fname']; ?>"> </td>
							</tr>
							<tr>
								<td>Last Name</td>
								<td><input type="text" name="lname" value="<?php echo $_SESSION['lname']; ?>"></td>
							</tr>
							<tr>
								<td>Username</td>
								<td><input type="text" name="username" readonly="readonly" value="<?php echo $_SESSION['username']; ?>"></td>
							</tr>
							<tr>
								<td>Password</td>
								<td><input type="password" name="password" value="<?php echo $_SESSION['password']; ?>"></td>
							</tr>
							<tr>
								<td>Mobile</td>
								<td><input type="text" name="mobile" value="<?php echo $_SESSION['mobile']; ?>"></td>
							</tr>
							<tr>
								<td>Email</td>
								<td><input type="text" name="email" value="<?php echo $_SESSION['email']; ?>"></td>
							</tr>
							<tr>
								<td colspan="2"><input type="submit" name="update" value="Update" class="btn btn-success update_btn"></td>
								
							</tr>
						</tbody>
					</table>
					</form>
				</div>
			</div>
		</div>
	</header>
	<?php
	if(isset($_POST['update'])){
		$id = $_POST['id'];
		$fname = $_POST['fname'];
		$lname = $_POST['lname'];
		$password = md5($_POST['password']);
		$mobile = $_POST['mobile'];
		$email = $_POST['email'];
		
		$query = "UPDATE users SET fname = '$fname', lname = '$lname', password = '$password', mobile = '$mobile', email = '$email' WHERE id = '$id'";
		$result = mysqli_query($conn, $query) or die("Query Failed");
		if($result){
			$query1 = "SELECT * FROM users WHERE id = $id";
			$result1 = mysqli_query($conn, $query1) or die("Query Failed");
			if($result1){
				if(mysqli_num_rows($result1) > 0){
			
				while($row = mysqli_fetch_assoc($result1)){
				session_start();
				$_SESSION['id'] = $row['id'];
				$_SESSION['fname'] = $row['fname'];
				$_SESSION['lname'] = $row['lname'];
				$_SESSION['username'] = $row['username'];
				$_SESSION['mobile'] = $row['mobile'];
				$_SESSION['email'] = $row['email'];
				
				header('location: dashboard.php');
				}
			}
		}
//			header('location: dashboard.php');
		}
	}
}
	mysqli_close($conn);
	?>
</body>
</html>