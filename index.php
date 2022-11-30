<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>PHPopdracht</title>
</head>
<body>
<style>
table {
  border:1px solid black;
  border-collapse: collapse;
  text-align: center;
}

th {
	border-bottom:1px solid black;
	border-right: 1px solid black; 
}

td {
	border-bottom:1px solid black;
	border-right: 1px solid black; 
}
</style>

<?php
try {
	$db = new PDO("mysql:host=localhost;dbname=cijfersysteem","root","");
	$query = $db->prepare("SELECT * FROM cijfer");
	$query->execute();
	$result = $query->fetchALL(PDO::FETCH_ASSOC);
	echo "<table>";
	foreach ($result as &$data) {
		echo "<tr>";
		echo "<td>" . "Nummer" . "</td>";
		echo "<td>" . "Leerling" . "</td>";
		echo "<td>" . "Vak" . "</td>";
		echo "<td>" . "Cijfer" . "</td>";
		echo "</tr>";
		echo "<tr>";
		echo "<td>" . $data["id"] . "</td>";
		echo "<td>" . $data["leerling"] . "</td>";
		echo "<td>" . $data["vak"] . "</td>";
		echo "<td>" . $data["cijfer"] . "</td>";
		echo "<td>" . "<a href='detail.php?id=".$data["id"]."'>" . "update" . "</a>" . "</td>";
		echo "<td>" . "<a href='delete.php?id=".$data["id"]."'>" . "delete" . "</a>" . "</td>";
		echo "</tr>";
	}
	echo "</table>";
} catch (PDOException $e) {
	die ("Error! " . $e->getMessage());
}
?>
</body>
</html>
