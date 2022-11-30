<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    try {
        $db = new PDO("mysql:host=localhost;dbname=cijfersysteem","root","");
        if (isset($_GET["id"])) {
            $query = $db->prepare("DELETE FROM cijfer WHERE id = :id");
            $id = filter_input(INPUT_GET,"id",FILTER_SANITIZE_NUMBER_INT);
            $query->bindParam("id",$id);
            if ($query->execute()) {
                echo "Het item is verwijderd.";
            } else {
                echo "Er is een fout opgetreden!";
            }
            echo "<br>";
        }
    } catch (PDOException $e) {
        die("Error!: " . $e->getMessage());
    }

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
		echo "</tr>";
	}
	echo "</table>";
    ?>
</body>
</html>