<!DOCTYPE html>
<html lang="et">
<head>
    <meta charset="UTF-8">
    <title>Auto Rent</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div>
    <?php
    include('header.php');
    include('navigation.php')
    ?>
    <main>
        <?php
        if(isset($_GET["veebileht"])) {
            include('content/'.$_GET["veebileht"]);
        } else {
            echo "Welcome! Would you like to rent a car?";
        }
        ?>

        <?php
        include('footer.php')
        ?>
    </main>
</div>

</body>
</html>
