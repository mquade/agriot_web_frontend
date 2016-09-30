<?php
require 'dbConnect.php';

$query = 'SELECT * FROM agriot_productive.users WHERE id = :id';
$statement = $db->prepare ( $query );
$statement ->bindParam(':id', $id);

$id = 3;

$statement->execute ();

//echo $statement [2];

// $db->prepare("SELECT * FROM agriot_productive.users WHERE id = :id");
// $db->exec(array(":id" => $_GET["id"]));

// echo
/*
 *
 *
 *
 * $sql = "SELECT * FROM agriot_productive.users";
 * $result = $db->query ( $sql );
 * echo "<ul>";
 * foreach ( $result as $row ) {
 * echo "<li>" . htmlspecialchars ( $row ["id"] ) . ": " . htmlspecialchars ( $row ["firstName"] ) . "</li>";
 * }
 * echo "</ul>";
 *
 */
?>
