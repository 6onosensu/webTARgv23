<?php
require_once("konf.php");
if(!empty($_REQUEST["korras_id"])){
    $kask=$yhendus->prepare("UPDATE jalgrattaeksam SET slaalom=1 WHERE id=?");
    $kask->bind_param("i", $_REQUEST["korras_id"]);
    $kask->execute();
}
if(!empty($_REQUEST["vigane_id"])){
    $kask=$yhendus->prepare(
        "UPDATE jalgrattaeksam SET slaalom=2 WHERE id=?");
    $kask->bind_param("i", $_REQUEST["vigane_id"]);
    $kask->execute();
}
$kask=$yhendus->prepare("SELECT id, eesnimi, perekonnanimi   FROM jalgrattaeksam WHERE teooriatulemus>=10 AND slaalom=-1");  $kask->bind_result($id, $eesnimi, $perekonnanimi);
$kask->execute();
?>
<!doctype html>
<html>
<head>
    <title>Slalom</title>
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
<img src="slalom.jpg" alt="!" class="img">
<h2>Slalom</h2>
<table class="jalg-table">
    <?php
    while($kask->fetch()){
        echo " 
 <tr> 
 <td>$eesnimi</td> 
 <td>$perekonnanimi</td> 
 <td> 
 <a href='?korras_id=$id' class='btn-field'>Passed</a>
 <a href='?vigane_id=$id' class='btn-field'>Failed</a> 
 </td> 
</tr> 
 ";
    }
    ?>
</table>
</body>
</html>