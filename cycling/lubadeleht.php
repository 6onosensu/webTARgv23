<?php
require_once("konf.php");
if (!empty($_REQUEST["vormistamine_id"])) {
    $kask = $yhendus->prepare("UPDATE jalgrattaeksam SET luba=1 WHERE id=?");
    $kask->bind_param("i", $_REQUEST["vormistamine_id"]);
    $kask->execute();
}

if (!empty($_REQUEST["kustutamine_id"])) {
    $kask = $yhendus->prepare("DELETE FROM jalgrattaeksam WHERE id=?");
    $kask->bind_param("i", $_REQUEST["kustutamine_id"]);
    $kask->execute();
}
$kask = $yhendus->prepare("SELECT id, eesnimi, perekonnanimi, teooriatulemus, slaalom, ringtee, t2nav, luba FROM jalgrattaeksam;");
$kask->bind_result($id, $eesnimi, $perekonnanimi, $teooriatulemus, $slaalom, $ringtee, $t2nav, $luba);
$kask->execute();

function asenda($nr)
{
    if ($nr == -1) {
        return ".";
    }
    if ($nr == 1) {
        return "Passed";
    }
    if ($nr == 2) {
        return "Failed";
    }
    return "Unknown number";
}

?>
<!doctype html>
<html>
<head>
    <title>Permisson</title>
    <link rel="stylesheet" href="jalgrattastyle.css">
</head>
<body class="jalg">
<header id="JalgrattaHeader">
    <h1>Bicycle Exam Management</h1>
</header>
<nav id="nav-jalg">
    <ul id="ul-jalg">
        <li><a href="home.php" class="a-jalg active">Home</a></li>
        <li><a href="registreerimine.php" class="a-jalg">Registration</a></li>
        <li><a href="teooriaeksam.php" class="a-jalg">Theory Exam</a></li>
        <li><a href="slaalom.php" class="a-jalg">Slalom</a></li>
        <li><a href="ringtee.php" class="a-jalg">Roundabout</a></li>
        <li><a href="tanav.php" class="a-jalg">Street Riding</a></li>
        <li><a href="lubadeleht.php" class="a-jalg">Permit</a></li>
    </ul>
</nav>
<img src="bicycles.jpg" alt="!" class="img">
<h2>Permit</h2>
<table class="jalg-table">
    <tr>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Theory Exam</th>
        <th>Slalom</th>
        <th>Roundabout</th>
        <th>Street Riding</th>
        <th>Issuance of Permits</th>
        <th>Delete</th>
    </tr>
    <?php
    while ($kask->fetch()) {
        $asendatud_slaalom = asenda($slaalom);
        $asendatud_ringtee = asenda($ringtee);
        $asendatud_t2nav = asenda($t2nav);
        $loalahter = ".";
        if ($luba == 1) {
            $loalahter = "Issued";
        }
        if ($luba == -1 and $t2nav == 1) {
            $loalahter = "<a href='?vormistamine_id=$id' class='btn-field'>Approve</a>";
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
             <td><a href='?kustutamine_id=$id' class='btn-field' 
                    onclick='return confirm(\"Are you sure you want to delete this entry?\")'>Delete</a></td>
         </tr> 
        ";
    }
    ?>
</table>
<img src="" alt="">
</body>
</html>