<?php
require 'class/CoolFood.php';
$coolfood = New CoolFood();
?>

<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <title>Bejelentkezés🥩</title>
    <link rel="stylesheet" href="css/login.css">
    <link rel="icon" href="kepek/logo.png" type="image/png">
    <link href='https://fonts.googleapis.com/css?family=Bebas%7CNeue' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>

<div>
    <ul>
        <li><a id="index" href="index.php"><b>Főoldal</b></a></li>
        <li><a id="reg" href="registration.php"><b>Regisztráció</b></a></li>
        <li class="notLink">Bejelentkezés</li>
    </ul>
</div>
<div class="felulet">

    <img id="kep" src="kepek/bejelentkezes.jpg" alt="dekor">
    <form method="post">
        <br/>
        <div class="title">
            Bejelentkezés
        </div>

        <div class="userData">
            <div class="emailicon">
                <label>
                    <i class="fa fa-envelope icon">
                    </i>
                    <input class="belso" type="email" name="email"  required placeholder="E-mail">
                </label>
            </div>
            <div class="jelszoicon">
                <label>
                    <i class="fa fa-key icon">
                    </i>
                    <input class="belso" type="password" name="password"  required placeholder="Jelszó">
                </label>
            </div>

            <div id="logIn">
                <label>

                    <input type="submit" name="login" value="Bejelentkezés">
                </label>
                <?php
                if(isset($_POST["login"])){
                    $coolfood->logIn($_POST["email"],$_POST["password"]);
                }
                ?>
            </div>

            <div class="register">
                <a href="registration.php">
                    Kattints ide ha még nincsen fiókod.
                </a>
            </div>
            <div class="index">
                <a href="index.php">
                    Vissza a főoldalra.
                </a>
            </div>
        </div>
    </form>
</div>


<br/>
<footer>
    <div class="footer">

    </div>
</footer>
</body>
</html>