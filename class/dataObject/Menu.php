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
        $this->picturePath = $arrivingData[5];
    }

    public function __destruct() {

        //kapcsolat bont
    }

    public function getId() { return $this->id; }
    
    public function getRestaurantId() { return $this->restaurantId; }
    
    public function getName() { return $this->name; }
    
    public function getDescription() { return $this->description; }
    
    public function getPrice() { return $this->price; }
    
    public function getPicturePath() { return $this->picturePath; }
}
?>