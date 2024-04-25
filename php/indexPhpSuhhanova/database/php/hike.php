<?php if (isset($_GET['code'])) {die(highlight_file(__FILE__, 1));}?>
<?php
require('zoneconf.php');
global $connection;
// Deleting data from the table
if (isset($_REQUEST["delete"])) {
    $kask=$connection->prepare("DELETE FROM participants WHERE id=?");
    $kask->bind_param("i", $_REQUEST["delete"]);
    $kask->execute();
}

//Adding data to the table
if (isset($_REQUEST["name"]) && !empty($_REQUEST["dateofbirth"]) && !empty($_REQUEST["tel"])) {
    $kask = $connection->prepare("INSERT INTO participants(name, tel, photo, dateofbirth) VALUES (?,?,?,?)");
    $kask->bind_param("siss", $_REQUEST["name"], $_REQUEST["tel"], $_REQUEST["photo"], $_REQUEST["dateofbirth"]);
    $kask->execute();
    header("Location: ?"); // redirect on the same page
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Hiking</title>
    <link rel="stylesheet" href="hikingpagestyle.css">
</head>
<body>
<div id="hiking">
    <div>
    <h1>Hiking</h1>
    <h3>Click on the photo to show the personal information</h3>
    <?php
    $kask=$connection->prepare("SELECT id, photo FROM participants ORDER BY name DESC");
    $kask->bind_result($id, $photo);
    $kask->execute();
    echo "<ul class='link'>";
    while ($kask->fetch()) {
        echo "<li class='link'><a href='?person_id=$id'><img src='$photo' alt='img' width='100'></a></li>";
    }
    echo "</ul>";
    echo "<li><a class='link a' href='?add=yes'>Add new participant...</a></li>"
    ?>

    <div id="sisu">
        <?php
        if (isset($_REQUEST["person_id"])) {
            $kask=$connection->prepare("SELECT id, name, tel, photo, dateofbirth FROM participants where id=?");
            $kask->bind_result($id, $name, $tel, $photo, $dateofbirth);
            $kask->bind_param("i", $_REQUEST["person_id"]);
            $kask->execute();

            if ($kask->fetch()) {
        ?>
                <table class="w3-table-all w3-hoverable">
                <tr class="w3-light-grey" id="trfield">
                <td class="hikecenter">Name</td>
                <td class="hikecenter">Tel number</td>
                <td class="hikecenter">Photo</td>
                <td class="hikecenter">Age</td>
                </tr>
                <?php
                    $birth = strtotime($dateofbirth);
                    $current = time();
                    $ageInSec = $current - $birth;
                    $age = floor($ageInSec / (365 * 24 * 60 * 60));
                    echo "<tr><td>".htmlspecialchars($name)."</td>";
                    echo "<td>".htmlspecialchars($tel)."</td>";
                    echo "<td><img src='".htmlspecialchars($photo)."' alt='Photo' width='100' height='100'></td>";
                    echo "<td>".htmlspecialchars($age)."</td>";
                    echo "<td><a href='?delete=$id' class='link'>Delete</a></td></tr>";
                ?>
                </table>
            <?php
            }
        }
        ?>
    </div>
    </div>
    <?php
    if(isset($_REQUEST["add"])){
    ?>
    <div>
        <h2>Registration form for the hike</h2>
        <form action="?" method="post" class="w3-container">
            <label for="name" class="w3-text-teal">Name</label>
            <input type="text" name="name" id="name" class="w3-input w3-border w3-light-grey">
            <br>
            <label for="tel" class="w3-text-teal">Tel number</label>
            <input type="number" name="tel" id="tel" class="w3-input w3-border w3-light-grey">
            <br>
            <label for="photo" class="w3-text-teal">Link to The Photo</label>
            <textarea name="photo" id="photo" class="w3-input w3-border w3-light-grey"></textarea>
            <br>
            <label for="date" class="w3-text-teal">Date of Birth</label>
            <input type="date" name="dateofbirth" id="date" class="w3-input w3-border w3-light-grey">
            <br>
            <input type="submit" name="submit" value="Register" class="w3-btn w3-blue-grey">
        </form>
    </div>
</div>
<?php
}
?>
</body>
</html>
