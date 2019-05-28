<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>gar-read-auto.php</title>
    <link rel="stylesheet" href="garage.scss">
</head>
<body>
<h1>garage read auto met klantnaam</h1>
<p>
    Dit zijn alle gegevens van auto's inclusief
    de eigenaar van de auto van de database garage
</p>
<?php

require_once "gar-connect.php";

$autos = $conn->prepare("
select  auto.autokenteken,
auto.automerk,
auto.autotype,
auto.autokmstand,
klant.klantid AS kid,
klant.klantnaam AS knaam
from auto, klant
where auto.klantid = klant.klantid
");

$autos ->execute();

echo "<table>";
foreach ($autos as $auto)
{
    echo "<tr><th>Kenteken</th><th>Merk</th><th>Type</th><th>Kmstand</th><th>Klantid</th><th>Klantnaam</th></tr>";
    echo "<tr>";
    echo "<td>" . $auto["autokenteken"] . "</td>";
    echo "<td>" . $auto["automerk"] . "</td>";
    echo "<td>" . $auto["autotype"] . "</td>";
    echo "<td>" . $auto["autokmstand"] . "</td>";
    echo "<td>" . $auto["kid"] . "</td>";
    echo "<td>" . $auto["knaam"] . "</td>";
    echo "</tr>";
}
echo "</table>";

echo "<a href='gar-menu.php'>terug naar het menu</a>";
?>
</body>
</html>