<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
<form action="" method="post">
	<label>Leerling</label>
	<input type="text" name="leerling">
	<br>
	<label>Vak</label>
	<input type="text" name="vak">
	<br>
	<label>Cijfer</label>
	<input type="number" name="cijfer">
	<br>
	<input type="submit" name="verzenden" value="Verzenden">
</form>

<?php
try {
	$db = new PDO("mysql:host=localhost;dbname=cijfersysteem","root","");
	if(isset($_POST["verzenden"])) {
		$leerling = filter_input(INPUT_POST,"leerling",FILTER_SANITIZE_STRING);
		$vak = filter_input(INPUT_POST,"vak",FILTER_SANITIZE_STRING);
		$cijfer = filter_input(INPUT_POST,"cijfer",FILTER_SANITIZE_NUMBER_FLOAT);
		$query = $db->prepare("UPDATE cijfer SET leerling = :leerling, vak = :vak, cijfer = :cijfer WHERE id = :id");
		$query->bindParam("leerling",$leerling);
		$query->bindParam("vak",$vak);
		$query->bindParam("cijfer",$cijfer);
		$query->bindParam("id",$_GET['id']);
		if($query->execute()) {
			echo "De nieuwe gegevens zijn toegevoegd." . "<br>";
		} else {
			echo "Er is een fout opgetreden!" . "<br>";
		}
		echo "<br>";
	} else {
		$query = $db->prepare("SELECT * FROM cijfer WHERE id = :id");
		$query->bindParam("id",$_GET["id"]);
		$query->execute();
		$result = $query->fetchAll(PDO::FETCH_ASSOC);

		foreach($result as &$data) {
			$leerling = $data["leerling"];
			$vak = $data["vak"];
			$cijfer = $data["cijfer"];
		}
	}
} catch (PDOException $e) {
	die ("Error!: " . $e->getMessage());
}
?>
</body>
</html>