<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>gar-delete-klant2.php</title>
    <link rel="stylesheet" href="garage.scss">
</head>
<body>
<h1>garage delete klant 2</h1>
<p>
    Op klantid gegevens zoeken uit de
    tabel klanten van de database garage
    zodat ze verwijderd kunnen worden,
</p>
<?php
//klantid uit het formulier halen-----
$klantid = $_POST["klantidvak"];

//klantgegevens uit de tabel halen-----
require_once "gar-connect.php";

$klanten = $conn->prepare("
select klantid,
klantnaam,
klantadres,
klantpostcode,
klantplaats
from klant
where klantid = :klantid
");
$klanten->execute(["klantid" => $klantid]);

//klantgegevens laten zien------
echo "<table>";
foreach ($klanten as $klant)
{
    echo "<tr>";
    echo"<td>" . $klant["klantid"] . "</td>";
    echo"<td>" . $klant["klantnaam"] . "</td>";
    echo"<td>" . $klant["klantadres"] . "</td>";
    echo"<td>" . $klant["klantpostcode"] . "</td>";
    echo"<td>" . $klant["klantplaats"] . "</td>";
    echo "</tr>";
}
echo "</table><br/>";

echo "<form action='gar-delete-klant3.php' method='post'>";
//klantid mag niet meer gewijzigd worden
echo "<input type='hidden' name='klantidvak' value=$klantid>";
//waarde 0 doorgegeven als er niet gecheckt wordt
echo "<input type='hidden' name='verwijdervak' value='0'>";
echo "<input type='checkbox' name='verwijdervak' value='1'>";
echo "Verwijder deze klant. <br/>";
echo "<input type='submit'>";
echo "</form>";
?>
</body>
</html>