<?php
require 'TxtProcessor.php';

class CoolFood {

    public function __construct() {
        
        //self::listUserArray();
    }

    public function __destruct() {

        //kapcsolat bont
    }

    public function listUserArray() {

        $userTxtProcessor = new TxtProcessor("txt/user.txt", "user");
        $objectArray = $userTxtProcessor->getObjectArray();
        
        foreach ($objectArray as $object) {

            echo "<h3>";
                echo "A(z) " .  $object->getId() . ". felhasználó adatai:<br>";
            echo "</h3>";
            echo "Kerszetnév: " . $object->getFirstName() . "<br>";
            echo "Vezetéknév: " . $object->getLastName() . "<br>";
            echo "Email: " . $object->getEmail() . "<br>";
            echo "Telefon: : " . $object->getTelephone() . "<br>";
            echo "Születési év: " . $object->getBirthDate() . "<br>";
            echo "<br><br>";
        }
    }

    public function listRestaurantArray() {
        
        $restaurantTxtProcessor = new TxtProcessor("txt/restaurant.txt", "restaurant");
        $objectArray = $restaurantTxtProcessor->getObjectArray();

        foreach ($objectArray as $object) {

            echo "<div class='element'>";
            echo "<img src='" . $object->getPicturePath() . "' alt='étel kép'>";
            echo "<div class='container'>";
            echo "<div class='first'>";
            echo "<div class='name'>" . $object->getRestaurantName() . " (" . $object->getCity() . ")</div>";
            echo "<div class='info'>";
            echo  $object->getRating() . " / 5 ⭐⭐⭐⭐<br /><br />";
            echo "✔️ SZÉP kártyás fizetés<br />";
            echo "✔️ Érintkezésmentes kiszállítás<br />";
            echo "</div>";
            echo "</div>";
            echo "<div class='second'></div>";
            echo "<div class='buttons'>";
            echo "<div class='smiley'>" . $object->getId() . "</div>";
            echo "<div class='menu'>";
            echo "<a href='restaurant_menu.php' style='color: #1abc9c;'>Menü Kattints ide!</a>";
            echo "</div>";
            echo "<div class='contact'>";
            echo "<a href=''>Kontakt</a>";
            echo "</div>";
            echo "<div class='saveToFavList'>";
            echo "<a href=''>Mentés</a>";
            echo "</div>";
            echo "</div>";
            echo "</div>";
            echo "</div>";
        }
    }

    public function listMenuArray() {
        
        $menuTxtProcessor = new TxtProcessor("txt/menu.txt", "menu");
        $objectArray = $menuTxtProcessor->getObjectArray();

        //print_r($objectArray);
        
        echo "<table class='lepeny'>";
        echo "<tr>";
            echo "<th>Lepények</th>";
            echo "<th></th>";
        echo "</tr>";        
        foreach ($objectArray as $object) {
            
            if (str_contains($object->getName(), 'lepény')) {
                
                echo "<tr>";
                echo "<td>";
                echo "<div class='name'>" . $object->getId() . ". " . $object->getName() . "</div>";
                echo "<div class='leiras'>" . $object->getDescription() . "</div>";
                echo "<div class='price'><mark>" . $object->getPrice() . " Ft</mark></div>";
                echo "</td>";
                echo "<td><img src='" . $object->getPicturePath() ."' alt='lepény'></td>";
                echo "</tr>";
            }
        }
        echo "</table>";
        echo "<br>";

        //második
        echo "<table class='peksuti'>";
        echo "<tr>";
            echo "<th><b>Péksütemények</b></th>";
            echo "<th></th>";
        echo "</tr>";
        foreach ($objectArray as $object) {
            
            if (!str_contains($object->getName(), 'lepény')) {
                
                echo "<tr>";
                echo "<td>";
                echo "<div class='name'>" . $object->getId() . ". " . $object->getName() . "</div>";
                echo "<div class='leiras'>" . $object->getDescription() . "</div>";
                echo "<div class='price'><mark>" . $object->getPrice() . " Ft</mark></div>";
                echo "</td>";
                echo "<td><img src='" . $object->getPicturePath() ."' alt='péksüti'></td>";
                echo "</tr>";
            }
        }
        echo "</table>";
    }

    public function logIn() {

        //akkor hívja meg a függvényt, ha a logIn submit gomb a frontenden értéket kap
        //paraméterül kapja a bejelentekzési adatokat
        //mégnézi hogy a listban talál-e ilyet
        /*
        $userTxtProcessor = new TxtProcessor("txt/user.txt", "user");
        $objectArray = $userTxtProcessor->getObjectArray();
        
        foreach ($objectArray as $object) {
            if (str_contains($object->getName(), $_POST['userName']) && str_contains($object->getName(), $_POST['password'])) {

                //a session értéke legyen loggedIn
                //ha a session értéke loggedIn
                //akkor navigáljon át egy másik oldalra
                //és echo kijelentkező submit

            }
        }
        */
    }

    public function logOut() {

        //ha a kijelnkező submit értéket kap
        //törölje a session értékét
        //és ha a session értéke törölve van akkor ki kell hogy dobjon az oldlaról
    }

    public function register() {

        //kapja paraméterül a form-ból érkező adatokat
        //készítsen egy new User() típusú objectet
        //hívja meg a TxtProcessor::writeobjectToFile() és a TxtProcessor::getActualHighestId() osztály függvényeit és készítsen új felhasználót

    }

}