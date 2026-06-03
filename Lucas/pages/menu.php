<?php
require_once __DIR__ . '/../classes/classMenu.php';

// classes
$menu = new Menu();
$items = $menu->readItems();

$dbClass = new Database();
$db = $dbClass->connection();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--links -->
    <link rel="stylesheet" href="../../Lucas/styling/styling.css">
    <title>Menu</title>
</head>

<body>

    <!--navbar -->
    <?php include('../../Lucas/prefabs/navbar.php') ?>


    <!--Menu -->
    <div class="menu-container">
        <?php foreach ($items as $item): ?>
            <div class="menu-item">
                <h3><?= htmlspecialchars($item['item']) ?></h3>
                <p><?= htmlspecialchars($item['omschrijving']) ?></p>
                <p>€<?= htmlspecialchars($item['prijs']) ?></p>

                <form action="menu.php" method="post">
                    <button class="add">Voeg toe</button>
                    <button class="update">Verander eten</button>
                    <button class="delete">Verwijder</button>

                </form>
            </div>
        <?php endforeach; ?>
    </div>
</body>

</html>