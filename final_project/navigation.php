<?php
$links = [
    "?" => "Home",
    "?veebileht=jquery.php" => "",
    "?veebileht=textfunctions.php" => "",
    "database/adding.php" => "",
]

?>

<nav>
    <ul>
        <?php foreach ($links as $key => $value): ?>
            <?php
            $isActive = false;
            if ($key === "?" && empty($_GET)) {
                $isActive = true; // Home page
            } elseif (str_contains($key, "=")) {
                $page = explode("=", $key)[1];
                $isActive = isset($_GET['veebileht']) && $page === $_GET['veebileht'];
            } elseif (str_contains($key, "database")) {
                $isActive = isset($_GET['database']);
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

