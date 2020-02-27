
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Login</title>
	
		<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
		<link href="style.css" rel="stylesheet" type="text/css">
	</head>
	<body>

		<script src="bootstrap/js/bootstrap.min.js"></script>
		<div class="login">
        <center>
		<img class="mcmLogo" src="assets/mcmLogo.png" alt="MCM Logo" height = "150px">
		<img class="mcmLogo" src="assets/ARRC-A.png" alt="MCM Logo" height = "150px">
        </center>
			<form action="authenticate.php" method="post">
				<p> <? $_SESSION['message']?> </p>
				<label for="username">
					<i class="fas fa-user"></i>
				</label  >
				<input type="text" name="username" placeholder="Username" id="username" >
				<label for="password">
					<i class="fas fa-lock"></i>
				</label>
				<input type="password" name="password" placeholder="Password" id="password" >
				<input type="submit" value="Login">
			</form>
		</div>
	</body>
</html>