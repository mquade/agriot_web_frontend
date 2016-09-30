<?php
require 'dbConnect.php';

$sql = "SELECT * FROM agriot_productive.users";
$result = $db->query ( $sql );
echo "<ul>";
foreach ( $result as $row ) {
	echo "<li>" . htmlspecialchars ( $row ["id"] ) . ": " . htmlspecialchars ( $row ["firstName"] ) . "</li>";
}
echo "</ul>";
?>
