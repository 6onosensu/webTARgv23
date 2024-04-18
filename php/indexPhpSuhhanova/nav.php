<?php
$links = [
    "?" => "Kodu",
    "?veebileht=tabelid.php" => "HTML tabelid",
    "?veebileht=classworkhtml.php" => "HTML classwork",
    "?veebileht=lipud.php" => "Lipud",
    "?veebileht=canvas.php" => "Canvas",
    "?veebileht=saleofcats.php" => "Sale of Cats",
    "?veebileht=vormid.php" => "Vormid",
    "?veebileht=jquery.php" => "jQuery",
    "https://darjaportnova23.thkit.ee/ryhmaveeb/ryhmaveeb.html" => "Group web",
    "?veebileht=textfunctions.php" => "PHP: Text function",
    "https://darjaportnova23.thkit.ee/wp/" => "WordPress",
    "database/adding.php" => "Database and PHP",
]

?>

<nav id="nav">
    <ul>
        <?php foreach ($links as $key => $value): ?>
            <?php
            $isActive = false;
            if ($key != "?" && str_contains($key, "=")) {
                $page = explode("=", $key)[1];
                $isActive = isset($_GET['veebileht']) && $page === $_GET['veebileht'];
            } elseif (!str_contains($key, "http")) {
                $isActive = empty($_GET) || !isset($_GET['veebileht']);
            }
            $className = $isActive ? 'class="active"' : '';
            ?>
            <li>
                <a href="<?php echo htmlspecialchars($key) ?>" <?php echo $className ?>>
                    <?php echo htmlspecialchars($value) ?>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>
</nav>

