<?php 
//Database Connection
include_once('connections/myconnect.php');

if(isset($_SESSION['username'])){
	header('location: dashboard.php');
}

if(isset($_POST['submit'])){
	$username = mysqli_real_escape_string($conn, $_POST['username']);
	$password = mysqli_real_escape_string($conn, md5($_POST['password']));
	
	$query = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
	$result = mysqli_query($conn, $query) or die("Query Failed");
	if($result){
		if(mysqli_num_rows($result) > 0){
			
			while($row = mysqli_fetch_assoc($result)){
				session_start();
				$_SESSION['id'] = $row['id'];
				$_SESSION['fname'] = $row['fname'];
				$_SESSION['lname'] = $row['lname'];
				$_SESSION['username'] = $row['username'];
				$_SESSION['password'] = $row['password'];
				$_SESSION['mobile'] = $row['mobile'];
				$_SESSION['email'] = $row['email'];
				
				header('location: dashboard.php');
			}
		}else{
			?>
			<script type="text/javascript">
				alert("Login Failed");
			</script>
	<?php
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
	<?php include_once('sections/login.tpl'); ?>
	
	<?php include_once('sections/scriptLinks.tpl'); ?>
</body>
</html>