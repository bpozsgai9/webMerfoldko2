<?php
require 'class/CoolFood.php';

$coolFood = new CoolFood();
?>

<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <title>Étterem Lista🥙</title>
    <link rel="stylesheet" href="css/restauratnt_list.css">
    <link rel="icon" href="kepek/logo.png" type="image/png">
</head>
<body>
    <header>
        <a href="index.php"> Vissza</a>
        <div class="title">
            <strong>
                Szeged
            </strong>
            <br />
        </div>
        <div class="slogan">
            <em>
                A tisza otthona
            </em> 🐟🌊
        </div>
    </header>
    <div class="content">

        <table>
            <tr>
                <th></th>
            </tr>
            <tr>
                <td></td>
            </tr>
        </table>
        <h1>Népszerű Éttermek:</h1>
        <div class="listRestaurant">
          <?php $coolFood->listRestaurantArray() ?>  
        </div>
    </div>
</body>
</html>