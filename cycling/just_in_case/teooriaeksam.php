<?php
require_once("konf.php");
if(!empty($_REQUEST["teooriatulemus"])){
    $kask=$yhendus->prepare(
        "UPDATE jalgrattaeksam SET teooriatulemus=? WHERE id=?");
    $kask->bind_param("ii", $_REQUEST["teooriatulemus"], $_REQUEST["id"]); $kask->execute();
}
$kask=$yhendus->prepare("SELECT id, eesnimi, perekonnanimi   FROM jalgrattaeksam WHERE teooriatulemus=-1");
$kask->bind_result($id, $eesnimi, $perekonnanimi);
$kask->execute();
?>
<!doctype html>
<html>
<head>
    <title>Teooriaeksam</title>
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
        <li><a href="teooriaeksam.php" class="a-jalg active">Teooriaeksam</a></li>
        <li><a href="slaalom.php" class="a-jalg">Slaalom</a></li>
        <li><a href="ringtee.php" class="a-jalg">Ringtee</a></li>
        <li><a href="tanav.php" class="a-jalg">Tänavasõit</a></li>
        <li><a href="lubadeleht.php" class="a-jalg">Lubadeleht</a></li>
    </ul>
</nav>
<h2>Teooriaeksam</h2>
<table>
    <?php
    while($kask->fetch()){
        echo " 
 <tr> 
 <td>$eesnimi</td> 
 <td>$perekonnanimi</td> 
 <td><form action=''> 
 <input type='hidden' name='id' value='$id' /> 
 <input type='text' name='teooriatulemus' />
 <input type='submit' value='Sisesta tulemus' /> 
 </form> 
 </td> 
</tr> 
 ";
    }
    ?>
</table>
</body>
</html>