<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Flot Examples: Basic Usage</title>
<link href="./flot/examples/examples.css" rel="stylesheet"
	type="text/css">
<!--[if lte IE 8]><script language="javascript" type="text/javascript" src="./flot/excanvas.min.js"></script><![endif]-->
<script language="javascript" type="text/javascript"
	src="./flot/jquery.js"></script>
<script language="javascript" type="text/javascript"
	src="./flot/jquery.flot.js"></script>
<script type="text/javascript">

<?php
require 'dbConnect.php';

$query = "SELECT id, value FROM agriot_productive.`values` JOIN sensors ON values.sensorId=sensors.id JOIN users ON sensors.ownerId = users.id WHERE users.id = :id AND values.timestamp > '2016-09-01 03:25:43' ORDER BY values.timestamp";
$statement = $db->prepare ( $query );
$statement->bindParam ( ':id', $_GET ["id"] );
$statement->execute ();
$allResults = $statement->fetchAll (PDO::FETCH_NUM); // ( PDO::FETCH_ASSOC );

?>

$(function() {

	var d1 = <?php echo json_encode($allResults);?>;
	
	$.plot("#placeholder", [ d1 ]);

	// Add the Flot version string to the footer

	$("#footer").prepend("Flot " + $.plot.version + " &ndash; ");
});

	</script>
</head>
<body>

	<div id="header">
		<h2>Basic Usage</h2>
	</div>

	<div id="content">

		<div class="demo-container">
			<div id="placeholder" class="demo-placeholder"></div>
		</div>

		<p>You don't have to do much to get an attractive plot. Create a
			placeholder, make sure it has dimensions (so Flot knows at what size
			to draw the plot), then call the plot function with your data.</p>

		<p>The axes are automatically scaled.</p>

	</div>

	<div id="footer">Copyright &copy; 2007 - 2014 IOLA and Ole Laursen</div>

</body>
</html>

<?php ?>
