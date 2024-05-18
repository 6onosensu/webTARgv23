<?php
require_once("konf.php");
if (!empty($_REQUEST["vormistamine_id"])) {
    $kask = $yhendus->prepare(
        "UPDATE jalgrattaeksam SET luba=1 WHERE id=?");
    $kask->bind_param("i", $_REQUEST["vormistamine_id"]);
    $kask->execute();
}
$kask = $yhendus->prepare(
    "SELECT id, eesnimi, perekonnanimi, teooriatulemus,  
 slaalom, ringtee, t2nav, luba FROM jalgrattaeksam;");
$kask->bind_result($id, $eesnimi, $perekonnanimi, $teooriatulemus, $slaalom, $ringtee, $t2nav, $luba);
$kask->execute();

function asenda($nr)
{
    if ($nr == -1) {
        return ".";
    } //tegemata
    if ($nr == 1) {
        return "korras";
    }
    if ($nr == 2) {
        return "ebaõnnestunud";
    }
    return "Tundmatu number";
}

?>
<!doctype html>
<html>
<head>
    <title>Lõpetamine</title>
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
        <li><a href="tanav.php" class="a-jalg">Tänavasõit</a></li>
        <li><a href="lubadeleht.php" class="a-jalg active">Lubadeleht</a></li>
    </ul>
</nav>
<h2>Lõpetamine</h2>
<table>
    <tr>
        <th>Eesnimi</th>
        <th>Perekonnanimi</th>
        <th>Teooriaeksam</th>
        <th>Slaalom</th>
        <th>Ringtee</th>
        <th>Tänavasõit</th>
        <th>Lubade väljastus</th>
    </tr>
    <?php
    while ($kask->fetch()) {
        $asendatud_slaalom = asenda($slaalom);
        $asendatud_ringtee = asenda($ringtee);
        $asendatud_t2nav = asenda($t2nav);
        $loalahter = ".";
        if ($luba == 1) {
            $loalahter = "Väljastatud";
        }
        if ($luba == -1 and $t2nav == 1) {
            $loalahter = "<a href='?vormistamine_id=$id'>Vormista load</a>";
        }
        echo " 
         <tr> 
             <td>$eesnimi</td> 
             <td>$perekonnanimi</td> 
             <td>$teooriatulemus</td> 
             <td>$asendatud_slaalom</td> 
             <td>$asendatud_ringtee</td> 
             <td>$asendatud_t2nav</td> 
             <td>$loalahter</td> 
         </tr> 
        ";
    }
    ?>
</table>
</body>
</html>