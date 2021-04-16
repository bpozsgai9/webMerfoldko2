<?php
class User {

    private $id;
    private $firstName;
    private $lastName;
    private $password;
    private $email;
    private $telephone;
    private $birthDate;

    public function __construct() {
        
        $argv = func_get_args();
        
        switch (func_num_args()) {
            
            case 7:
                self::__construct1($argv[0], $argv[1], $argv[2], $argv[3], $argv[4], $argv[5], $argv[6]);
            break;
            
            case 1:
                self::__construct2($argv[0]);
            break;
            
        }
    }

    public function __construct1($id, $firstName, $lastName,$password, $email, $telephone, $birthDate) {

        $this->id = $id;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->password = $password;
        $this->email = $email;
        $this->telephone = $telephone;
        $this->birthDate = strtotime($birthDate);
    }

    public function __construct2($line) {

        $arrivingData = explode(";", $line);

        $this->id = (int)$arrivingData[0];
        $this->firstName = $arrivingData[1];
        $this->lastName = $arrivingData[2];
        $this->password = $arrivingData[3];
        $this->email = $arrivingData[4];
        $this->telephone = $arrivingData[5];
        $this->birthDate = strtotime($arrivingData[6]);
    }

    public function __destruct() {

        //kapcsolat bont
    }

    public function getId() { return $this->id; }

    public function getFirstName() { return $this->firstName; }

    public function getLastName() { return $this->lastName; }

    public function getPassword() { return $this->password;}

    public function getEmail() { return $this->email; }

    public function getTelephone() { return $this->telephone; }

    public function getBirthDate() { return date("Y-m-d",$this->birthDate); }
}
?>