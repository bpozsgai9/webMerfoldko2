<?php
class Menu {

    private $id;
    private $restaurantId;
    private $name;
    private $description;
    private $price;
    private $picturePath;

    public function __construct() {
        
        $argv = func_get_args();
        
        switch (func_num_args()) {
            
            case 6:
                self::__construct1($argv[0], $argv[1], $argv[2], $argv[3], $argv[4], $argv[5]);
            break;
            
            case 1:
                self::__construct2($argv[0]);
            break;
            
        }
    }

    public function __construct1($id, $restaurantId, $name, $description, $price, $picturePath) {

        $this->id = $id;
        $this->restaurantId = $restaurantId;
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
        $this->picturePath = $picturePath;
    }

    public function __construct2($line) {

        $arrivingData = explode(";", $line);

        $this->id = (int)$arrivingData[0];
        $this->restaurantId = (int)$arrivingData[1];
        $this->name = $arrivingData[2];
        $this->description = $arrivingData[3];
        $this->price = (int)$arrivingData[4];
        $this->picturePath = $arrivingData[4];
    }

    public function __destruct() {

        //kapcsolat bont
    }

    function getId() { $this->id; }
    
    function getRestaurantId() { $this->restaurantId; }
    
    function getName() { $this->name; }
    
    function getDescription() { $this->description; }
    
    function getPrice() { $this->price; }
    
    function getPicturePath() { $this->picturePath; }
}
?>