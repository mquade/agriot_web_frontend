<?php
$server = 'mysql:dbname=datenbank; host=localhost; port=3306';
$user = 'user';
$password = 'pw';
$options = array (
		PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8' 
);

try {
	$db = new PDO ( $server, $user, $password, $options );
} catch ( PDOException $e ) {
	echo 'Error: ' . htmlspecialchars ( $e->getMessage () );
	exit ();
}
?>
