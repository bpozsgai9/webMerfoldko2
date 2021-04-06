<?php
require 'TxtProcessor.php';

class CoolFood {

    public function __construct() {
        
        
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
}

$coolFood = new CoolFood();
$coolFood->listUserArray();
?>