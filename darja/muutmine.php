<?php
require("abifunktsioonid.php");

if (isset($_REQUEST["grupilisamine"]) && !empty($_REQUEST["uuegrupinimi"]) && !(preg_match('/\d/', $_REQUEST["uuegrupinimi"]))) {
    lisaGrupp($_REQUEST["uuegrupinimi"]);
    header("Location: muutmine.php");
    exit();
}

if (isset($_REQUEST["kaubalisamine"]) && !empty($_REQUEST["nimetus"]) && !(preg_match('/\d/', $_REQUEST["nimetus"]))) {
    lisaKaup($_REQUEST["nimetus"], $_REQUEST["kaubagrupi_id"], $_REQUEST["hind"]);
    header("Location: muutmine.php");
    exit();
} else {

}

if (isset($_REQUEST["kustutusid"])) {
    kustutaKaup($_REQUEST["kustutusid"]);
}

if (isset($_REQUEST["muutmine"])) {
    muudaKaup($_REQUEST["muudetudid"], $_REQUEST["nimetus"],
        $_REQUEST["kaubagrupi_id"], $_REQUEST["hind"]);
}

$sorttulp = "nimetus";
$otsisona = "";
if(isSet($_REQUEST["sort"])){
    $sorttulp=$_REQUEST["sort"];
}
if (isset($_REQUEST["otsisona"])) {
    $otsisona = $_REQUEST["otsisona"];
}
$kaubad = kysiKaupadeAndmed($sorttulp, $otsisona);
?>

<!DOCTYPE html>

<html lang="et">
<head>
    <title>Kaupade leht</title>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8"/>
    <link rel="stylesheet" href="muutminestyles.css">
</head>
<body>
<div class="flex-container">
    <div>
        <h2>Kaupade loetelu</h2>
        <form action="?">
            <label for="otsisona">Otsi nimetuse või kaubagrupi järgi</label>
            <input type="text" class="form_muutmine" name="otsisona" id="otsisona"/>
            <table class="td_muutmine">
                <tr>
                    <th>Haldus</th>
                    <th><a href="?sort=nimetus">Nimetus</a></th>
                    <th><a href="?sort=grupinimi">Kaubagrupp</a></th>
                    <th><a href="?sort=hind">Hind</a></th>
                </tr>
                <?php foreach ($kaubad as $kaup): ?>
                    <tr>
                        <?php if (isset($_REQUEST["muutmisid"]) &&
                            intval($_REQUEST["muutmisid"]) == $kaup->id): ?>
                            <td>
                                <input type="submit" name="muutmine" class="form_muutmine" value="Muuda"/>
                                <input type="submit" name="katkestus" class="form_muutmine" value="Katkesta"/>
                                <input type="hidden" class="form_muutmine" name="muudetudid" value="<?= $kaup->id ?>"/>
                            </td>
                            <td>
                                <input type="text" class="form_muutmine" name="nimetus" value="<?= $kaup->nimetus ?>"/>
                            </td>
                            <td>
                                <?php
                                echo looRippMenyy("SELECT id, grupinimi FROM kaubagrupid",
                                    "kaubagrupi_id", $kaup->id);
                                ?>
                            </td>
                            <td>
                                <input type="text" name="hind" class="form_muutmine" value="<?= $kaup->hind ?>"/>
                            </td>  <?php else: ?>
                            <td>
                                <a href="?kustutusid=<?= $kaup->id ?>"
                                   onclick="return confirm('Kas ikka soovid kustutada?')">delete</a>
                                <a href="?muutmisid=<?= $kaup->id ?>">edit</a>
                            </td>
                            <td><?= $kaup->nimetus ?></td>
                            <td><?= $kaup->grupinimi ?></td>
                            <td><?= $kaup->hind ?></td>
                        <?php endif ?>
                    </tr>
                <?php endforeach; ?>
            </table>
        </form>
    </div>

    <div class="muutmine">
        <form action="?" class="td_muutmine">
            <h2>Kauba lisamine</h2>
            <dl>
                <dt>Nimetus:</dt>
                <dd><input type="text" name="nimetus"/></dd>
                <dt>Kaubagrupp:</dt>
                <dd>
                    <?php
                    echo looRippMenyy("SELECT id, grupinimi FROM kaubagrupid", "kaubagrupi_id");
                    ?>
                </dd>
                <dt>Hind:</dt>
                <dd>
                    <input type="text" name="hind"/>
                </dd>
            </dl>
            <input type="submit" name="kaubalisamine" value="Lisa kaup" class="form_muutmine"/>
            <h2>Grupi lisamine</h2>
            <input type="text" name="uuegrupinimi" class="form_muutmine"/>
            <input type="submit" name="grupilisamine" value="Lisa grupp" class="form_muutmine"/>
        </form>
    </div>
</div>

</body>
</html>