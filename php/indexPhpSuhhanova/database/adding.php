
<?php
require ('conf.php');
global $connection;

// Deleting data from the table
if (isset($_REQUEST["delete"])) {
    $kask=$connection->prepare("DELETE FROM weather WHERE id=?");
    $kask->bind_param("i", $_REQUEST["delete"]);
    $kask->execute();
}

//Adding data to the table
if (isset($_REQUEST["date"]) && !empty($_REQUEST["date"]) && !empty($_REQUEST["temperature"]))  {
    $kask=$connection->prepare("INSERT INTO weather(date_, temprature, description) VALUES (?,?,?)");
    //s-string d-double i-integer -- sis
    $kask->bind_param("sis", $_REQUEST["date"], $_REQUEST["temperature"], $_REQUEST["description"]);
    $kask->execute();
}

// show table contents
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
            echo "<td>".htmlspecialchars($description)."</td>";
            echo "<td><a href='?delete=$id'>Delete</a></td></tr>";
        }
        ?>
    </table>
    <form action="?">
        <label for="date">Date</label>
        <input type="date" name="date" id="date">
        <br>
        <label for="temperature">Temperature</label>
        <input type="number" name="temperature" id="temperature">
        <br>
        <label for="description">Description</label>
        <textarea type="text" name="description" id="description"></textarea>
        <br>
        <input type="submit" name="submit" value="Add">
    </form>

    </body>
    </html>
<?php
$connection->close();