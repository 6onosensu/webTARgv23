<!DOCTYPE html>
<html lang="et">
<head>
    <meta charset="UTF-8">
    <title>Darja PHP leht</title>
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="style/navstyle.css">
    <link rel="stylesheet" href="style/canvasstyle.css">
    <link rel="stylesheet" href="style/lipudstyle.css">
    <link rel="stylesheet" href="style/tabelidstyle.css">
    <link rel="stylesheet" href="style/vormidstyle.css">
    <link rel="stylesheet" href="style/textfunctionsstyle.css">
    <link rel="stylesheet" href="style/jquerystyle.css">
    <link rel="stylesheet" href="style/catsalestyle.css">
</head>
<body>

<div id="container">
    <?php
    include('nav.php')
    ?>
    <main>
        <?php
        include('header.php')
        ?>
        <?php
        if(isset($_GET["veebileht"])) {
            include('content/'.$_GET["veebileht"]);
        } else {
            echo "Welcome! You will find here my works on PHP";
        }
        ?>

        <?php
        include('footer.php')
        ?>
    </main>
</div>

</body>
</html>
