<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>gar-search-auto2.php</title>
    <link rel="stylesheet" href="garage.scss">
</head>
<body>
<h1>garage zoek op kenteken 2</h1>
<p>
    Op kenteken gegevens zoeken uit de
    tabel auto van de database garage.
</p>
<?php

$autokenteken = $_POST["autokentekenvak"];

require_once "gar-connect.php";

$autos = $conn ->prepare ("
select autokenteken,
automerk,
autotype,
autokmstand,
klantid
from auto
where autokenteken = :autokenteken
");
$autos->execute(["autokenteken" => $autokenteken]);


echo "<table>";
foreach ($autos as $auto)
{
    echo "<tr>";
    echo "<td>" . $auto["autokenteken"] . "</td>";
    echo "<td>" . $auto["automerk"] . "</td>";
    echo "<td>" . $auto["autotype"] . "</td>";
    echo "<td>" . $auto["autokmstand"] . "</td>";
    echo "<td>" . $auto["klantid"] . "</td>";
}
?>
</body>
</html>