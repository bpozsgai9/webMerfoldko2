<?php
class Restaurant {

    private $id;
    private $restaurantName;
    private $city;
    private $rating;
    private $picturePath;

    public function __construct($id) {

        $this->id = $id;
    }

    private function __destruct() {

        //kapcsolat bont
    }

    public function getId() {

        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }
}
?>