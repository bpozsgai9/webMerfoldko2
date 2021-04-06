<?php
class User {

    private $id;
    private $firstName;
    private $lastName;
    private $email;
    private $telephone;
    private $birthDate;

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

    public function __construct1($id, $firstName, $lastName, $email, $telephone, $birthDate) {

        $this->id = $id;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->email = $email;
        $this->telephone = $telephone;
        $this->birthDate = $birthDate;
    }

    public function __construct2($line) {

        $arrivingData = explode(";", $line);

        $this->id = (int)$arrivingData[0];
        $this->firstName = $arrivingData[1];
        $this->lastName = $arrivingData[2];
        $this->email = $arrivingData[3];
        $this->telephone = $arrivingData[4];
        $this->birthDate = $arrivingData[5];
    }

    public function __destruct() {

        //kapcsolat bont
    }

    public function getId() { return $this->id; }

    public function getFirstName() { return $this->firstName; }

    public function getLastName() { return $this->lastName; }

    public function getEmail() { return $this->email; }

    public function getTelephone() { return $this->telephone; }

    public function getBirthDate() { return $this->birthDate; }
}
?>