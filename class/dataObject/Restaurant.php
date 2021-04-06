<?php
class Restaurant {

    private $id;
    private $restaurantName;
    private $city;
    private $rating;
    private $picturePath;

    public function __construct() {
        
        $argv = func_get_args();
        
        switch (func_num_args()) {
            
            case 5:
                self::__construct1($argv[0], $argv[1], $argv[2], $argv[3], $argv[4]);
            break;
            
            case 1:
                self::__construct2($argv[0]);
            break;
            
        }
    }

    public function __construct1($id, $restaurantName, $city, $rating, $picturePath) {

        $this->id = $id;
        $this->restaurantName = $restaurantName;
        $this->city = $city;
        $this->rating = $rating;
        $this->picturePath = $rating;
    }

    public function __construct2($line) {

        $arrivingData = explode(";", $line);

        $this->id = (int)$arrivingData[0];
        $this->restaurantName = $arrivingData[1];
        $this->city = $arrivingData[2];
        $this->rating = $arrivingData[3];
        $this->picturePath = $arrivingData[4];
    }

    public function __destruct() {

        //kapcsolat bont
    }

    public function getId() { return $this->id; }

    public function getRestaurantName() { return $this->restaurantName; }

    public function getCity() { return $this->city; }

    public function getRating() { return $this->rating; }

    public function getPicturePath() { return $this->picturePath; }   
}
?>