<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>gar-create-klant2</title>
    <link rel="stylesheet" href="garage.scss">
</head>
<body>
<h1>garage create klant 2</h1>
<p>
    Een klant toevoegen aan de tabel
    klant in de database garage.
</p>
<?php
//klantgegevens uit het formulier halen---------
$klantid = NULL; //komt niet uit het formulier (autoincrement)
$klantnaam = $_POST["klantnaamvak"];
$klantadres = $_POST["klantadresvak"];
$klantpostcode = $_POST["klantpostcodevak"];
$klantplaats = $_POST["klantplaatsvak"];

//klantgegevens invoeren in de tabel--------------
require_once "gar-connect.php";

$sql = $conn->prepare("
insert into klant values
(
:klantid, :klantnaam, :klantadres, :klantpostcode, :klantplaats
)
");
//manier 1 (of manier 2 gebruiken)--------
//$sql->bindParm(":klantid", $klantid);
//$sql->bindParm(":klantnaam", $klantnaam);
//$sql->bindParm("klantadres", $klantadres);
//$sql->bindParm("klantpostcode", $klantpostcode);
//$sql->bindParm("klantplaats", $klantplaats);

//$sql-> execute();

//manier 2-----------------
$sql->execute([
        "klantid" => $klantid,
    "klantnaam" => $klantnaam,
    "klantadres" => $klantadres,
    "klantpostcode" => $klantpostcode,
    "klantplaats" => $klantplaats
]);

echo "De klant is toegevoegd <br/>";
echo "<a href='gar-menu.php'>terug naar het menu </a>";
?>
</body>
</html>