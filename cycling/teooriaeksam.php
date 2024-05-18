<?php
require_once("konf.php");
if(!empty($_REQUEST["teooriatulemus"])){
    $kask=$yhendus->prepare("UPDATE jalgrattaeksam SET teooriatulemus=? WHERE id=?");
    $kask->bind_param("ii", $_REQUEST["teooriatulemus"], $_REQUEST["id"]); $kask->execute();
}
$kask=$yhendus->prepare("SELECT id, eesnimi, perekonnanimi   FROM jalgrattaeksam WHERE teooriatulemus=-1");
$kask->bind_result($id, $eesnimi, $perekonnanimi);
$kask->execute();
?>
<!doctype html>
<html>
<head>
    <title>Theory Exam</title>
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
<img src="theory.png" alt="!" class="img">
<h2>Theory Exam</h2>
<table class="jalg-table">
    <?php
    while($kask->fetch()){
        echo " 
 <tr> 
 <td>$eesnimi</td> 
 <td>$perekonnanimi</td> 
 <td><form action=''> 
 <input type='hidden' name='id' value='$id' /> 
 <input type='text' name='teooriatulemus'/>
 <input type='submit' value='Enter the result' class='btn-field' /> 
 </form> 
 </td> 
</tr> 
 ";
    }
    ?>
</table>
</body>
</html>