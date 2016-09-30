<?php
session_start ();
require_once ("../../../dbConnect.php");

print_r ( $_GET );
print_r ( $_POST );
print_r ( $_SESSION );

$error_msg = "";
if (isset ( $_POST ['email'] ) && isset ( $_POST ['password'] )) {
	$email = $_POST ['email'];
	$password = $_POST ['password'];
	
	$statement = $db->prepare ( "SELECT * FROM users WHERE email = :email" );
	$result = $statement->execute ( array (
			'email' => $email 
	) );
	$user = $statement->fetch ();
	// �berpr�fung des Passworts
	if ($user !== false && password_verify ( $password, $user ['passwordHashed'] )) {
		$_SESSION ['userid'] = $user ['id'];
	} else {
		$error_msg = "E-Mail oder Passwort war ung�ltig<br><br>";
	}
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<!-- Meta, title, CSS, favicons, etc. -->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>agrIoT Login</title>

<!-- Bootstrap -->
<link href="../vendors/bootstrap/dist/css/bootstrap.min.css"
	rel="stylesheet">
<!-- Font Awesome -->
<link href="../vendors/font-awesome/css/font-awesome.min.css"
	rel="stylesheet">
<!-- Animate.css -->
<link href="https://colorlib.com/polygon/gentelella/css/animate.min.css"
	rel="stylesheet">

<!-- Custom Theme Style -->
<link href="../build/css/custom.min.css" rel="stylesheet">
</head>

<body class="login">
<?php
if (isset ( $error_msg ) && ! empty ( $error_msg )) {
	echo $error_msg;
}
?>
	<div>
		<a class="hiddenanchor" id="signup"></a> <a class="hiddenanchor"
			id="signin"></a>

		<div class="login_wrapper">
			<div class="animate form login_form">
				<section class="login_content">
					<form action="login_2.php" method="post">
						<h1>Login Form</h1>

						<!-- 						
						<div>
							<input type="email" maxlength="255" class="form-control"
								placeholder="Email-Adresse" name="email" required="" />
						</div>
						<div>
							<input type="password" class="form-control"
								placeholder="Password" required="" name="password" />
						</div>
						<div>
							<input type="submit" value="Login"> <a
								class="btn btn-default submit" href="index.html">Log in</a> <a
								class="reset_pass" href="#">Lost your password?</a>
						</div>

						<div class="clearfix"></div>

						<div class="separator">
							<p class="change_link">
								New to site? <a href="#signup" class="to_register"> Create
									Account </a>
							</p>

							<div class="clearfix"></div>
							<br />

							<div>
								<h1>
									<i class="fa fa-paw"></i> Gentelella Alela!
								</h1>
								<p>©2016 All Rights Reserved. Gentelella Alela! is a Bootstrap
									3 template. Privacy and Terms</p>
							</div>
						</div>
						 -->
						<label for="inputEmail" class="sr-only">E-Mail</label> <input
							type="email" name="email" id="inputEmail" class="form-control"
							placeholder="E-Mail" value="<?php echo $email_value; ?>" required
							autofocus> <label for="inputPassword" class="sr-only">Password</label>
						<input type="password" name="password" id="inputPassword"
							class="form-control" placeholder="Passwort" required>
						<div class="checkbox">
							<label> <input type="checkbox" value="remember-me"
								name="angemeldet_bleiben" value="1" checked> Angemeldet bleiben
							</label>
						</div>
						<button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
						<br> <a href="passwortvergessen.php">Passwort vergessen</a>
					</form>
				</section>
			</div>

			<div id="register" class="animate form registration_form">
				<section class="login_content">
					<form action="">
						<h1>Create Account</h1>
						<div>
							<input type="text" class="form-control" placeholder="Username"
								required="" />
						</div>
						<div>
							<input type="email" class="form-control" placeholder="Email"
								required="" />
						</div>
						<div>
							<input type="password" class="form-control"
								placeholder="Password" required="" />
						</div>
						<div>
							<a class="btn btn-default submit" href="index.html">Submit</a>
						</div>

						<div class="clearfix"></div>

						<div class="separator">
							<p class="change_link">
								Already a member ? <a href="#signin" class="to_register"> Log in
								</a>
							</p>

							<div class="clearfix"></div>
							<br />

							<div>
								<h1>
									<i class="fa fa-paw"></i> Gentelella Alela!
								</h1>
								<p>©2016 All Rights Reserved. Gentelella Alela! is a Bootstrap
									3 template. Privacy and Terms</p>
							</div>
						</div>
					</form>
				</section>
			</div>
		</div>
	</div>
</body>
</html>