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
if (isset($_REQUEST["newtemp"]) && !empty($_REQUEST["date"]) && !empty($_REQUEST["temperature"]))  {
    $kask=$connection->prepare("INSERT INTO weather(date_, temprature, description, color) VALUES (?,?,?,?)");
    //s-string d-double i-integer -- sis
    $kask->bind_param("siss", $_REQUEST["date"], $_REQUEST["temperature"], $_REQUEST["description"],
        $_REQUEST["color"]);
    $kask->execute();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tabeli 'weather' sisu vaatamine</title>

</head>
<body>
<h1>Click on the date to show the temperature</h1>
<?php
    // show table contents
    $kask=$connection->prepare("SELECT id, date_ FROM weather ORDER BY date_ DESC");
    $kask->bind_result($id, $date_);
    $kask->execute();
    echo "<ul>";
    while ($kask->fetch()) {
        echo "<li><a href='?weather_id=$id'>".$date_."</a></li>";
    }
    echo "</ul>";
    echo "<li><a href='?add=yes'>Add new temperature...</a></li>"
?>
<div id="sisu">
    <?php
        if (isset($_REQUEST["weather_id"])) {
            $kask=$connection->prepare("SELECT id, date_, temprature, description, color FROM weather where id=?");
            $kask->bind_result($id, $date_, $temprature, $description, $color);
            $kask->bind_param("i", $_REQUEST["weather_id"]);
            $kask->execute();
            //showing by one id
            if ($kask->fetch()) {
                echo "<table border='1' width='50%'>";
                echo "<tr>";
                echo "<th>$id</th>";
                echo "<th bgcolor='$color'>$date_</th>";
                echo "<th>Temperature: ".$temprature."</th>";
                echo "<th><img src='$description' alt='img' width='100%'></th>";
                echo "<th><a href='?delete=$id'>Delete</a></th>";
                echo "</tr>";
                echo "</table>";
            }
        }
    ?>
</div>
<?php
if(isset($_REQUEST["add"])){
?>
<form action="?">
    <input type="hidden" value="yes" name="newtemp">
    <label for="date">Date</label>
    <input type="date" name="date" id="date">
    <br>
    <label for="temperature">Temperature</label>
    <input type="number" name="temperature" id="temperature">
    <br>
    <label for="description">Description</label>
    <textarea name="description" id="description"></textarea>
    <br>
    <label for="color">Color</label>
    <input type="color" name="color" id="color">
    <br>
    <input type="submit" name="submit" value="Add">
</form>
<?php
}
?>
</body>
</html>