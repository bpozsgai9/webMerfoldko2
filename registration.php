<?php

require  'class/CoolFood.php';
$coolfood = New CoolFood();

?>
<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <title>Regisztráció🍕</title>
    <link rel="stylesheet" href="css/registration.css">
    <link rel="icon" href="kepek/logo.png" type="image/png">
    <link href='https://fonts.googleapis.com/css?family=Bebas%7CNeue' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>
</head>
<body>
<header>
    <div class="header">
        <ul>
            <li><a id="index" href="index.php"><b>Főoldal</b></a></li>
            <li><a id="login" href="login.php"><b>Bejelentkezés</b></a></li>
            <li class="notLink">Regisztráció</li>
        </ul>
    </div>


</header>
<form method="post">
    <div class="register">
        <b>Hozd létre fiókodat.</b>
    </div>

    <fieldset>
        <legend style="font-size: 20px; opacity: 0.7;">

            <b><i>Személyes adatok</i></b>

        </legend>
        <div class="belso">
            <div class="nev">Vezetéknév<span>Keresztnév</span></div>
            <label>
                <input type="text" name="firstName" placeholder="Vezetéknév" required>

            </label>
            <label>
                <input type="text" name="lastName" placeholder="Keresztnév" required>

            </label>
            <br/>
            <div>E-mail</div>
            <label>
                <input type="email" name="email" placeholder="E-mail" required>
            </label>
            <div>Jelszó</div>
            <label>
                <input type="password" name="password1" placeholder="Jelszó" required>
            </label>
            <div>Jelszó újra</div>
            <label>
                <input type="password" name="password2" placeholder="Jelszó" required>
            </label>
            <br/>
            <div>Életkor</div>
            <label>
                <input type="number" name="age" placeholder="Életkor" required>
            </label>
            <div>Telefonszám</div>
            <label>
                <input type="tel" name="phone" placeholder="Telefonszám">
            </label>
            <label>
                <input type="hidden" id="save" name="ment" value="">
            </label>
            <br>

            <div>Születési dátum</div>
            <label>
                <input type="date" name="birthDate">

            </label>
            <br/>
            <label>
                <input type="checkbox" name="accept1" required>
                Elfogadom az <u>általános szerződési feltételeket.</u>
            </label>
                <br/>
            <label>
                <input type="checkbox" name="accept2">
                Szeretnék értesülni az ajánlatokról és a promóciókról e-mailben.
            </label>


            <div id="also">
                <label>
                    <input type="submit" name="regist" value="FIÓK LÉTREHOZÁSA">
                </label>
                <label>
                    <input type="reset" name="reset" value="ALAPHELYZET">
                </label>
            </div>
            <?php
            if(isset($_POST["regist"])){
                 $coolfood->register(1, $_POST["firstName"],
                        $_POST["lastName"], $_POST["password1"], $_POST["password2"],$_POST["age"],
                                 $_POST["email"], $_POST["phone"], $_POST["birthDate"]);
            }

            ?>

        </div>

    </fieldset>
    </form>
<footer>

</footer>


</body>
</html>