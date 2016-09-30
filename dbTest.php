<?php
require 'dbConnect.php';

$query = 'SELECT * FROM agriot_productive.users WHERE id <= :id';
$statement = $db->prepare ( $query );
$statement->bindParam ( ':id', $_GET ["id"] );

$statement->execute ();

$allResults = $statement->fetchAll ( PDO::FETCH_ASSOC );

print "<pre>";

print_r ( $allResults );

echo $allResults [0] ['firstName'];

print "</pre>";

$query = "SELECT value, timestamp FROM agriot_productive.`values` JOIN sensors ON values.sensorId=sensors.id JOIN users ON sensors.ownerId = users.id WHERE users.id = :id AND values.timestamp > '2016-09-01 03:25:43'";
$statement = $db->prepare ( $query );
$statement->bindParam ( ':id', $_GET ["id"] );
$statement->execute ();
$allResults = $statement->fetchAll ( PDO::FETCH_ASSOC );

print "<pre>";
print_r ( $allResults );
print "</pre>";

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
