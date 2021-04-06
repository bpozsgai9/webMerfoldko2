<?php
require 'dataObject/User.php';
require 'dataObject/Restaurant.php';
require 'dataObject/Menu.php';

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
            $firstLineOfFile = fgets($file);
            $nextLineOfFile;

            while(! feof($file)) {
                
                $nextLineOfFile = fgets($file);
                switch ($objectType) {
            
                    case "user": 
                        array_push($this->objectArray, new User($nextLineOfFile));    
                        break;

                    case "restaurant": 
                        array_push($this->objectArray, new Restaurant($nextLineOfFile));
                        break;

                    case "menu": 
                        array_push($this->objectArray, new Menu($nextLineOfFile));
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