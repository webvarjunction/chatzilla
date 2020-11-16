<header>
		<div class="container d-flex justify-content-center align-items-center">
			<div class="center_div my-5">
				<h1>chat-zilla</h1>
				<h3>user login</h3>
				<form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
					<div class="form-group my-4">
						<input type="text" class="form-control" placeholder="Username" name="username" required>
					</div>
					<div class="form-group my-4">
						<input type="password" class="form-control" placeholder="Password" name="password" required>
					</div>
					<button type="submit" name="submit" class="btn btn-primary btn-block my-3">Login</button>
					<h4>new to chatzilla</h4>
					<a href="registration.php" class="btn btn-success btn-block my-3">Sign Up</a>
				</form>
			</div>
		</div>
	</header>