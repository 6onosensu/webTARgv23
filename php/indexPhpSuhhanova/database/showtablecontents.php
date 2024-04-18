<?php
require ('conf.php');
// show table contents
global $connection;
$kask=$connection->prepare("SELECT id, date_, temprature, description FROM weather ORDER BY date_ DESC");
$kask->bind_result($id, $date_, $temprature, $description);
$kask->execute();

?>
<!DOCTYPE html>
<html>
<head>
    <title>Tabeli 'weather' sisu vaatamine</title>

</head>
<body>
    <h1>Tabeli 'weather' sisu vaatamine</h1>
    <table border="1">
        <tr>
            <td>Nr</td>
            <td>Date</td>
            <td>Temperature</td>
            <td>Description</td>
        </tr>
        <?php
        while($kask->fetch()) {
            echo "<tr><td>".htmlspecialchars($id)."</td>";
            echo "<td>".htmlspecialchars($date_)."</td>";
            echo "<td>".htmlspecialchars($temprature)."</td>";
            echo "<td><img src='$description' alt='pilt' width='100'></td>";
        }
        ?>
    </table>
</body>
</html>
<?php
$connection->close();