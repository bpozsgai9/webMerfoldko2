<?php
require 'TxtProcessor.php';

class CoolFood {

    public function __construct() {
        
        self::listUserArray();
        self::listRestaurantArray();
    }

    public function __destruct() {

        //kapcsolat bont
    }

    public function listUserArray() {

        $userTxtProcessor = new TxtProcessor("../txt/user.txt", "user");
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
        
        $restaurantTxtProcessor = new TxtProcessor("../txt/restaurant.txt", "restaurant");
        $objectArray = $restaurantTxtProcessor->getObjectArray();

        foreach ($objectArray as $object) {

            echo "<h3>";
                echo "A(z) " .  $object->getId() . ". étterem adatai:<br>";
            echo "</h3>";
            echo "A(z) étterem neve: " . $object->getRestaurantName() . "<br>";
            echo "Város: " . $object->getCity() . "<br>";
            echo "Értékelés: " . $object->getRating() . "<br>";
            echo "<img src='../" . $object->getPicturePath() . "' alt='varosKep' width='200'><br>";
        }
    }
}

//példány
$coolFood = new CoolFood();
?>