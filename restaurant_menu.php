<?php
require 'class/CoolFood.php';

$coolFood = new CoolFood();
?>

<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <title>Menü🌭</title>
    <link rel="stylesheet" href="css/restaurant_menu.css">
    <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Bebas%7CNeue' rel='stylesheet'>
    <link rel="icon" href="kepek/logo.png" type="image/png">
</head>
<body>
<header>
    <div class="header"><a style="text-decoration: none" href="index.php">
        Cool <span>Food</span>
    </a>
        <div class="image"></div>
    </div>
</header>
<a href="restauratnt_list.php">Vissza</a>
<div class="title">
    Liliom utcai látványpékség<br/>
    🥐🥨🍞
</div>
    <?php $coolFood->listMenuArray() ?>
</body>
</html>