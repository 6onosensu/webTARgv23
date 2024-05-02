<?php
require ('conf.php');


global $connection;

//kustutamine
if(isset($_REQUEST['delete'])) {
    $kask=$connection->prepare("DELETE FROM valitsus WHERE id = ?");
    $kask->bind_param('i', $_REQUEST['delete']);
    $kask->execute();
    header("location: $_SERVER[PHP_SELF]");
}

//kommentaari lisamine
if(isset($_REQUEST['uuskomment']) && !empty($_REQUEST['komment'])) {
    $kask=$connection->prepare("UPDATE valitsus SET kommentaarid=CONCAT(kommentaarid, ?) WHERE id = ?");
    $addcomment=$_REQUEST['komment']."\n";
    $kask->bind_param('si', $addcomment, $_REQUEST['uuskomment']);
    $kask->execute();
    header("location: $_SERVER[PHP_SELF]");
}

//lisamine tabelisse
if(isset($_REQUEST['newvoice']) && !empty($_REQUEST['valitsusenimi'])) {
    $kask=$connection->prepare("INSERT INTO valitsus(valitsuseSeis, lisamisKuupaev) VALUES (?, NOW())");
    $kask->bind_param('s', $_REQUEST['valitsusenimi']);
    $kask->execute();
    header("location: $_SERVER[PHP_SELF]");
}
//punkti update
if(isset($_REQUEST['subtract'])) {
    $kask=$connection->prepare("UPDATE valitsus SET punktid = punktid - 1 WHERE id = ?");
    $kask->bind_param('i', $_REQUEST['subtract']);
    $kask->execute();
    header("location: $_SERVER[PHP_SELF]");
}
if(isset($_REQUEST['add'])) {
    $kask=$connection->prepare("UPDATE valitsus SET punktid = punktid + 1 WHERE id = ?");
    $kask->bind_param('i', $_REQUEST['add']);
    $kask->execute();
    header("location: $_SERVER[PHP_SELF]");
}

?>

<!DOCTYPE HTML>
<HTML lang="et">
<head>
    <title>Hääletamise leht</title>
    <link rel="stylesheet" href="haaletamine.css">
</head>
<body>
    <h1>Vali oma valitsus ja hääleta!</h1>
    <table>
        <tr>
            <th>ValitsuseSeis</th>
            <th>LisamisKuupäev</th>
            <th>Punktid</th>
            <th>Kommentaarid</th>
            <th>Tegevus</th>
        </tr>
        <?php
        //tabeli sisu näitamine andmebaasist
        global $connection;
        $kask=$connection->prepare("
        Select id, valitsuseSeis, punktid, kommentaarid, lisamisKuupaev from valitsus");
        $kask->bind_result($id, $valitsuseSeis, $punktid, $kommentaarid, $lisamisKuupaev);
        $kask->execute();
        while($kask->fetch()) {
            echo "<tr>";
            echo "<td>".htmlspecialchars($valitsuseSeis)."</td>";
            echo "<td>".$lisamisKuupaev."</td>";
            echo "<td>".$punktid."</td>";
            echo "<td>".nl2br(htmlspecialchars($kommentaarid))."
                    <form action='?' method='post'>
                        <input type='hidden' name='uuskomment' value='$id'>
                        <input type='text' name='komment'>
                        <input type='submit' value='Add comment'>
                    </form>
                </td>";
            echo "<td><a href='?add= $id'>+1 punkt</a></td>";
            echo "<td><a href='?subtract= $id'>-1 punkt</a></td>";
            echo "<td><a href='?delete= $id'>delete</a></td>";
            echo "</tr>";
        }
        ?>
    </table>

    <a href="?Add=yes">Lisa uus valitsus</a>
    <?php
    if (isset($_REQUEST['Add'])) {
    ?>
    <form action="?" method="post">
        <input type="hidden" value="yes" name="newvoice">
        <label for="valitsusenimi">Valitsuse nimi: </label>
        <input type="text" name="valitsusenimi" id="valitsusenimi">
        <input type="submit" value="Add">
    </form>
    <?php
    }
    ?>
</body>
</HTML>
