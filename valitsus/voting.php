<?php
require ('conf.php');
global $connection;
//kustutamine
if(isset($_REQUEST['delete'])) {
    $kask=$connection->prepare("DELETE FROM valitsus WHERE id = ?");
    $kask->bind_param('i', $_REQUEST['delete']);
    $kask->execute();
}

//kommentaari lisamine


if(isset($_REQUEST['uuskomment']) && !empty($_REQUEST['komment'])) {
    $kask=$connection->prepare("UPDATE valitsus SET kommentaarid=CONCAT(kommentaarid, ?) WHERE id = ?");
    $addcomment=$_REQUEST['komment']."\n";
    $kask->bind_param('si', $addcomment, $_REQUEST['uuskomment']);
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

//lisamine tabelisse
if(isset($_REQUEST['newvoice']) && !empty($_REQUEST['valitsusenimi'])) {
    $kask=$connection->prepare("INSERT INTO valitsus(valitsuseSeis, lisamisKuupaev) VALUES (?, NOW())");
    $kask->bind_param('s', $_REQUEST['valitsusenimi']);
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
<div id="vote">
    <div>
        <h1>Vali oma valitsus ja hääleta!</h1>
        <?php
        $kask=$connection->prepare("SELECT id, valitsuseSeis FROM valitsus ORDER BY valitsuseSeis DESC");
        $kask->bind_result($id, $valitsuseSeis);
        $kask->execute();
        echo "<ul class='link'>";
        while ($kask->fetch()) {
            echo "<li class='link'><a class='a' href='?candidate=$id'>$valitsuseSeis</a></li>";
        }
        echo "</ul>";
        ?>
    </div>
    <div>
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
    </div>
    <div id="sisu">
        <?php
        if (isset($_REQUEST["candidate"])) {
            global $connection;
            $kask=$connection->prepare("
                                Select id, valitsuseSeis, punktid, kommentaarid, lisamisKuupaev from valitsus where id=?");
            $kask->bind_result($id, $valitsuseSeis, $punktid, $kommentaarid, $lisamisKuupaev);
            $kask->bind_param('i', $_REQUEST["candidate"]);
            $kask->execute();
        if ($kask->fetch()) {
        ?>
            <table>
                <tr>
                    <th>ValitsuseSeis</th>
                    <th>LisamisKuupaev</th>
                    <th>Punktid</th>
                    <th>Kommentaarid</th>
                    <th>Tegevus</th>
                </tr>
                <?php
                    echo "<tr><td>".htmlspecialchars($valitsuseSeis)."</td>";
                    echo "<td>".htmlspecialchars($lisamisKuupaev)."</td>";
                    echo "<td>".htmlspecialchars($punktid)."</td>";
                    echo "<td>".nl2br(htmlspecialchars($kommentaarid))."
                        <form action='?' method='post'>
                            <input type='hidden' name='uuskomment' value='$id'>
                            <input type='text' name='komment'>
                            <input type='submit' value='Add comment'>
                        </form>
                    </td>";
                    echo "<td><a class='a' href='?add= $id'>+1 punkt</a>
                            <br>
                            <a class='a' href='?subtract= $id'>-1 punkt</a>
                            <br>
                            <a class='a' href='?delete= $id'>delete</a></td></tr>";
                ?>
            </table>
        <?php
        }
        }
        ?>
    </div>
</div>
</body>
</HTML>
