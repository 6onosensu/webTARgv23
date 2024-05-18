<?php
require_once("konf.php");

if (!empty($_REQUEST["korras_id"])) {
    $kask = $yhendus->prepare(
        "UPDATE jalgrattaeksam SET t2nav=1 WHERE id=?");
    $kask->bind_param("i", $_REQUEST["korras_id"]);
    $kask->execute();
}
if (!empty($_REQUEST["vigane_id"])) {
    $kask = $yhendus->prepare(
        "UPDATE jalgrattaeksam SET t2nav=2 WHERE id=?");
    $kask->bind_param("i", $_REQUEST["vigane_id"]);
    $kask->execute();
}
$kask = $yhendus->prepare("SELECT id, eesnimi, perekonnanimi   FROM jalgrattaeksam WHERE slaalom=1 AND ringtee=1 AND t2nav=-1");
$kask->bind_result($id, $eesnimi, $perekonnanimi);
$kask->execute();
?>
<!doctype html>
<html>
<head>
    <title>Tänavasõit</title>
    <link rel="stylesheet" href="jalgrattastyle.css">
</head>
<body class="jalg">
<header id="JalgrattaHeader">
    <h1>Jalgrattaeksami haldamine rakendus</h1>
</header>
<nav id="nav-jalg">
    <ul id="ul-jalg">
        <li><a href="home.php" class="a-jalg">Home</a></li>
        <li><a href="registreerimine.php" class="a-jalg">Registreerimine</a></li>
        <li><a href="teooriaeksam.php" class="a-jalg">Teooriaeksam</a></li>
        <li><a href="slaalom.php" class="a-jalg">Slaalom</a></li>
        <li><a href="ringtee.php" class="a-jalg">Ringtee</a></li>
        <li><a href="tanav.php" class="a-jalg active">Tänavasõit</a></li>
        <li><a href="lubadeleht.php" class="a-jalg">Lubadeleht</a></li>
    </ul>
</nav>
<h2>Tänavasõit</h2>
<table>
    <?php
    while ($kask->fetch()) {
        echo " 
            <tr> 
                <td>$eesnimi</td> 
                <td>$perekonnanimi</td> 
                <td> 
                    <a href='?korras_id=$id'>Korras</a> 
                    <a href='?vigane_id=$id'>Ebaõnnestunud</a> 
                 </td> 
            </tr>
        ";
    }
    ?>
</table>
</body>
</html>