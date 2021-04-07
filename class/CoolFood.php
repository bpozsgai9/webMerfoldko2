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
}

//példány - class-on kívül

?>