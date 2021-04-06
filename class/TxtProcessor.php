<?php
require 'User.php';
require 'Restaurant.php';
require 'Menu.php';

class TxtProcessor {

    private $objectArray;

    /*
        objectType {
            "user"
            "restaurant",
            "menu"
        }
    */
    public function __construct($fileName, $objectType) {
        
        $this->objectArray = array();
        try {
            
            $file = fopen($fileName, "r");
            $firstLine = fgets($file);
            while(! feof($file)) {
                
                switch ($objectType) {
            
                    case "user": 
                        array_push($this->objectArray, new User(fgets($file)));    
                        break;

                    case "restaurant": 
                        array_push($this->objectArray, new Restaurant(fgets($file)));
                        break;

                    case "menu": 
                        array_push($this->objectArray, new Menu(fgets($file)));
                        break;
                }
                
            }
            fclose($file);

        } catch (Exception $e) {
            
            echo "Hiba: " . $e;
        }
    }

    public function getObjectArray() { return $this->objectArray; }
}
?>