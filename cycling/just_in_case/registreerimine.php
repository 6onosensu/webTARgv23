<?php
require_once("konf.php");
$error_message = "";
if (isset($_REQUEST["sisestusnupp"])) {
    $perenimi=$_REQUEST["perekonnanimi"];
    $nimi= $_REQUEST["eesnimi"];
    if (empty($perenimi) && empty($nimi)) {
        $error_message = "The fields cannot be empty!";
    } else if (preg_match('/\d/', $nimi) && preg_match('/\d/', $perenimi)) {
        $error_message = "The fields must consist only of words!";
    } else {
        $kask = $yhendus->prepare("INSERT INTO jalgrattaeksam(eesnimi, perekonnanimi) VALUES (?, ?)");
        $kask->bind_param("ss", $_REQUEST["eesnimi"], $_REQUEST["perekonnanimi"]);
        $kask->execute();
        $yhendus->close();
        header("Location: $_SERVER[PHP_SELF]?lisatudeesnimi=$_REQUEST[eesnimi]");
        exit();
    }
}
?>
<!doctype html>
<html>
<head>
    <title>Kasutaja registreerimine</title>
    <link rel="stylesheet" href="jalgrattastyle.css">
</head>
<body class="jalg">
<header id="JalgrattaHeader">
    <h1>Jalgrattaeksami haldamine rakendus</h1>
</header>
<nav id="nav-jalg">
    <ul id="ul-jalg">
        <li><a href="home.php" class="a-jalg">Home</a></li>
        <li><a href="registreerimine.php" class="a-jalg active">Registreerimine</a></li>
        <li><a href="teooriaeksam.php" class="a-jalg">Teooriaeksam</a></li>
        <li><a href="slaalom.php" class="a-jalg">Slaalom</a></li>
        <li><a href="ringtee.php" class="a-jalg">Ringtee</a></li>
        <li><a href="tanav.php" class="a-jalg">Tänavasõit</a></li>
        <li><a href="lubadeleht.php" class="a-jalg">Lubadeleht</a></li>
    </ul>
</nav>
<img src="bike.jpg" alt="Cycling" class="img">
<h2>Registreerimine</h2>
<?php if (!empty($error_message)): ?>
<p style="color: red;"><?= htmlspecialchars($error_message) ?></p>
<?php endif; ?>
<?php if (isset($_REQUEST["lisatudeesnimi"])) {
    echo "Lisati $_REQUEST[lisatudeesnimi]";
}
?>
<form action="?">
    <dl>
        <dd>
            <label for="eesnimi">Eesnimi:</label>
            <input type="text" name="eesnimi" id="eesnimi"/>
        </dd>
        <dd>
            <label for="perekonnanimi">Perekonnanimi:</label>
            <input type="text" name="perekonnanimi" id="perekonnanimi"/>
        </dd>
        <dt>
            <input type="submit" name="sisestusnupp" value="sisesta"/>
        </dt>
    </dl>
</form>
</body>
</html>