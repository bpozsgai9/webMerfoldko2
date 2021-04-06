<?php
class Restaurant {

    private $id;
    private $restaurantName;
    private $city;
    private $rating;
    private $picturePath;

    /*public function __construct($id, $restaurantName, $city, $rating, $picturePath) {

        $this->id = $id;
        $this->restaurantName = $restaurantName;
        $this->city = $city;
        $this->rating = $rating;
        $this->picturePath = $rating;
    }*/

    public function __construct($line) {

        $arrivingData = explode(";", $line);

        $this->id = (int)$arrivingData[0];
        $this->restaurantName = $arrivingData[1];
        $this->city = $arrivingData[2];
        $this->rating = $arrivingData[3];
        $this->picturePath = $arrivingData[4];
    }

    

    private function __destruct() {

        //kapcsolat bont
    }

    public function getId() { return $this->id; }

    public function getRestaurantName() { return $this->restaurantName; }

    public function getCity() { return $this->city; }

    public function getRating() { return $this->rating; }

    public function getPicturePath() { return $this->picturePath; }

    
}
?>