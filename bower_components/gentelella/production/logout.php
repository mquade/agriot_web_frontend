<?php
session_start ();
session_destroy ();
unset ( $_SESSION ['userid'] );
// Remove Cookies
setcookie ( "identifier", "", time () - (3600 * 24 * 365) );
setcookie ( "securitytoken", "", time () - (3600 * 24 * 365) );
?>

<div class="container main-container">
	Der Logout war erfolgreich. <a href="login_2.php">Zur�ck zum Login</a>.
</div>