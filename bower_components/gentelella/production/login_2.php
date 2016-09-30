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
	// Überprüfung des Passworts
	if ($user !== false && password_verify ( $password, $user ['passwordHashed'] )) {
		$_SESSION ['userid'] = $user ['id'];
	} else {
		$error_msg = "E-Mail oder Passwort war ungültig<br><br>";
	}
}

$email_value = "";
if (isset ( $_POST ['email'] ))
	$email_value = htmlentities ( $_POST ['email'] );
?>


<!DOCTYPE html>
<html lang="de">
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
	<div>
		<a class="hiddenanchor" id="signup"></a> <a class="hiddenanchor"
			id="signin"></a>

		<div class="login_wrapper">
			<div class="animate form login_form">
				<section class="login_content">
					<form action="login_2.php" method="post">
						<h1>Login Form</h1>
						<?php
						if (isset ( $error_msg ) && ! empty ( $error_msg )) {
							echo $error_msg;
						}
						
						if (isset ( $_SESSION ['userid'] )) {
							echo "Angemeldet mit ID" . $_SESSION ['userid'];
							echo '<a class="btn btn-lg btn-primary btn-block" type="submit" href="logout.php">Logout</a>';
						}
						?>
											
						<div>
							<input type="email" name="email" id="inputEmail" maxlength="255"
								class="form-control" placeholder="Email-Adresse"
								value="<?php echo $email_value; ?>" required autofocus />
						</div>
						<div>
							<input type="password" name="password" id=inputPassword
								class="form-control" placeholder="Passwort" required />
						</div>
						<div class="checkbox">
							<label> <input type="checkbox" value="remember-me"
								name="angemeldet_bleiben" value="1" checked> Angemeldet bleiben
							</label>
						</div>

						<div>
							<button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>


							<!-- <input type="submit" value="Login"> <a
								class="btn btn-default submit" href="index.html">Log in</a>
							-->
							<a class="reset_pass" href="#">Lost your password?</a>


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
								<p>Â©2016 All Rights Reserved. Gentelella Alela! is a Bootstrap
									3 template. Privacy and Terms</p>
							</div>
						</div>

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
								<p>Â©2016 All Rights Reserved. Gentelella Alela! is a Bootstrap
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