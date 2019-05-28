<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>gar-update-klant3.php</title>
    <link rel="stylesheet" href="garage.scss">
</head>
<body>
<h1>garage update klant 3</h1>
<p>
    Dit formulier wordt gebruikt om klantgegevens te wijzigen
    in de tabel klant van de database garage.
</p>
<?php
//klantgegevens uit het formulier halen-------
$klantid = $_POST["klantidvak"];
$klantnaam = $_POST["klantnaamvak"];
$klantadres = $_POST["klantadresvak"];
$klantpostcode = $_POST["klantpostcodevak"];
$klantplaats = $_POST["klantplaatsvak"];

//updaten klantgegevens----------
require_once "gar-connect.php";

$sql = $conn->prepare
("
update klant set klantnaam = :klantnaam,
klantadres = :klantadres,
klantpostcode = :klantpostcode,
klantplaats = :klantplaats
where klantid = :klantid
");

$sql->execute
([
    "klantid" => $klantid,
    "klantnaam" => $klantnaam,
    "klantadres" => $klantadres,
    "klantpostcode" => $klantpostcode,
    "klantplaats" => $klantplaats
]);
echo "De klant is gewijzigd, <br/>";
echo "<a href='gar-menu.php'>terug naar het menu</a>";
?>
</body>
</html>
