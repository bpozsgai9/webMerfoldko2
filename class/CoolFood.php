<?php
require 'TxtProcessor.php';
include_once 'class/dataObject/User.php';

class CoolFood {

    public function __construct() {

        session_start();
        self::serializeCityData();
    }

    public function __destruct() {

        //kapcsolat bont
    }

    //példa
    private function listUserArray() {

        $userTxtProcessor = new TxtProcessor("txt/user.txt", "user");
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

    public function listRestaurantArray() {

        $restaurantTxtProcessor = new TxtProcessor("txt/restaurant.txt", "restaurant");
        $objectArray = $restaurantTxtProcessor->getObjectArray();

        foreach ($objectArray as $object) {

            echo "<div class='element'>";
            echo "<img src='" . $object->getPicturePath() . "' alt='étel kép'>";
            echo "<div class='container'>";
            echo "<div class='first'>";
            echo "<div class='name'>" . $object->getRestaurantName() . " (" . $object->getCity() . ")</div>";
            echo "<div class='info'>";
            echo  $object->getRating() . " / 5 ⭐⭐⭐⭐<br /><br />";
            echo "✔️ SZÉP kártyás fizetés<br />";
            echo "✔️ Érintkezésmentes kiszállítás<br />";
            echo "</div>";
            echo "</div>";
            echo "<div class='second'></div>";
            echo "<div class='buttons'>";
            echo "<div class='smiley'>" . $object->getId() . "</div>";
            echo "<div class='menu'>";
            echo "<a href='restaurant_menu.php' style='color: #1abc9c;'>Menü Kattints ide!</a>";
            echo "</div>";
            echo "<div class='contact'>";
            echo "<a href=''>Kontakt</a>";
            echo "</div>";
            echo "<div class='saveToFavList'>";
            echo "<a href=''>Mentés</a>";
            echo "</div>";
            echo "</div>";
            echo "</div>";
            echo "</div>";
        }
    }

    public function listMenuArray() {
        
        $menuTxtProcessor = new TxtProcessor("txt/menu.txt", "menu");
        $objectArray = $menuTxtProcessor->getObjectArray();

        //print_r($objectArray);
        
        echo "<table class='lepeny'>";
        echo "<tr>";
            echo "<th>Lepények</th>";
            echo "<th></th>";
        echo "</tr>";        
        foreach ($objectArray as $object) {
            
            if (str_contains($object->getName(), 'lepény')) {
                
                echo "<tr>";
                echo "<td>";
                echo "<div class='name'>" . $object->getId() . ". " . $object->getName() . "</div>";
                echo "<div class='leiras'>" . $object->getDescription() . "</div>";
                echo "<div class='price'><mark>" . $object->getPrice() . " Ft</mark></div>";
                echo "</td>";
                echo "<td><img src='" . $object->getPicturePath() ."' alt='lepény'></td>";
                echo "</tr>";
            }
        }
        echo "</table>";
        echo "<br>";

        //második
        echo "<table class='peksuti'>";
        echo "<tr>";
            echo "<th><b>Péksütemények</b></th>";
            echo "<th></th>";
        echo "</tr>";
        foreach ($objectArray as $object) {
            
            if (!str_contains($object->getName(), 'lepény')) {
                
                echo "<tr>";
                echo "<td>";
                echo "<div class='name'>" . $object->getId() . ". " . $object->getName() . "</div>";
                echo "<div class='leiras'>" . $object->getDescription() . "</div>";
                echo "<div class='price'><mark>" . $object->getPrice() . " Ft</mark></div>";
                echo "</td>";
                echo "<td><img src='" . $object->getPicturePath() ."' alt='péksüti'></td>";
                echo "</tr>";
            }
        }
        echo "</table>";
    }

    private function serializeCityData() {

        $cityData = [
            ["name" => "Szeged", "partOfDay" => "DN", "picPath" => "szeged.jpg"],
            ["name" => "Budapest", "partOfDay" => "DN", "picPath" => "budapest.jpg"],
            ["name" => "Debrecen", "partOfDay" => "DN", "picPath" => "budapest.jpg"],
            ["name" => "Győr", "partOfDay" => "DN", "picPath" => "debrecen.jpg"],
            ["name" => "Kecskemét", "partOfDay" => "D", "picPath" => "gyor.jpg"],
            ["name" => "Miskolc", "partOfDay" => "DN", "picPath" => "miskolc.jpg"],
            ["name" => "Pécs", "partOfDay" => "D", "picPath" => "pecs.jpg"],
            ["name" => "Nyíregyháza", "partOfDay" => "D", "picPath" => "nyiregyhaza.jpg"],
            ["name" => "Szombathely", "partOfDay" => "D", "picPath" => "szombathely.jpeg"],
            ["name" => "Szentendre", "partOfDay" => "D", "picPath" => "szentendre.jpg"]
        ];

        $file = fopen("txt/city.txt", "w") or die("Fájl hiba!");
        fwrite($file, serialize($cityData));
        fclose($file);
    }

    public function listCityDataViaUnserialize() {

        $file = fopen("txt/city.txt", "r") or die("Fájl hiba!");
        $cityData = unserialize(fgets($file));
        fclose($file);

        $counter = 0;
        echo "<tr>";
        foreach ($cityData as $city) {
            if( isset( $_SESSION["userId"] ) ){

                $actualName = ($city["name"] == "Szeged" ? "<a href='restauratnt_list.php'>" .
                    $city["name"] . "- Kattints ide!</a>" : "" . $city["name"]);

            }
            else{

                $actualName = ($city["name"] == "Szeged" ? "<a href='login.php'>" .
                    $city["name"] . "- Kattints ide!</a>" : "" . $city["name"]);

            }


            $actualOpenDaytime = ($city["partOfDay"] == "DN" ? "☀️🌙" : "☀️");

            if ($counter == 5) {
                echo "</tr>";
                echo "<tr>";
            }
            echo "<td>";
                echo "<div class='polaroid'>";
                    echo "<img src='kepek/" . $city["picPath"] . "' alt='Budapest'>";
                    echo "<div class='container'>";
                    echo "<p>" . $actualName . "<br />" . $actualOpenDaytime .  "</p>";
                    echo "</div>";
                echo "</div>";
            echo "</td>";
            $counter++;
        }
        echo "</tr>";
    }

    public function uploadFile() {

            $target_dir = "kepek/uploads/";
            $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

            
            $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);    
            if($check !== false) {
                    
                $uploadOk = 1;

            } else {
                    
                echo "Hiba: A fájl nem kép! ";
                $uploadOk = 0;
            }
        
            if ($uploadOk == 0) {
            
                echo "Hiba: A fájl nem lett feltöltve!";
        
            } else {
            
                if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {

                    echo "<div style='z-index: -1'>" . basename( $_FILES["fileToUpload"]["name"]) . " fel lett töltve! Köszönjük a képet!</div>";
                    //header('Location: index.php');
        
                } else {
                    
                    echo "Hiba: Feltöltés közben hiba lépett fel!";
                }
            }
    }

    public function logIn( $userName, $password ) {

            if(trim($userName) === "" || trim($password) ===""){
                echo "<div style='color: red'><u>Hiba</u>: Adj meg minden adatot!</div>";
            }

            else {

                $userTxtProcessor = new TxtProcessor("txt/user.txt", "user");
                $objectArray = $userTxtProcessor->getObjectArray();

                foreach ( $objectArray as $object ) {

                    if ( str_contains( $object->getEmail(), $userName )
                        && str_contains( $object->getPassword(), $password) ) {

                                $_SESSION["userId"] = $object->getId();
                                header("Location: index.php");
                    }

                }
                echo "<br />";
                echo "<div style='color: red;'> <strong><u>Hibás adatok</u></strong> </div>";


            }


    }


    public function logOut() {

        session_unset();
        session_destroy();
        header("Location: login.php");

    }


    public function register( $id, $firstName, $lastName, $password , $password2, $age , $email, $phonenumber, $birthDate ) {


        if( $firstName == null && $lastName == null && $password == null && $password2 == null && $age == null
            && $email == null){

            echo '<div style="color: red;font-size:40px;text-align: center ">
                  <b><u>Hiba</u>: Mezők kitöltése kötelező!</b></div>';
            exit();

        }

        if( $firstName == null || $lastName == null){

            echo '<div style="color: red;font-size:40px;text-align: center ">
                  <b><u>Hiba</u>: Név megadása kötelező!</b></div>';
            exit();

        }

        if( $password == null || ($password2) == null){

            echo '<div style="color: red;font-size:40px;text-align: center ">
                  <b><u>Hiba</u>: Jelszó megadása kötelező!</b></div>';
            exit();

        }

        if( $age  == null){

            echo '<div style="color: red;font-size:40px;text-align: center ">
                  <b><u>Hiba</u>: Életkor  megadása kötelező!</b></div>';
            exit();

        }

        if( $email == null ){

            echo '<div style="color: red;font-size:40px;text-align: center ">
                  <b><u>Hiba</u>: Email megadása kötelező!</b></div>';
            exit();

        }


        if( strlen( $password ) <= 5 ){

            echo '<div style="color: red;font-size:40px;text-align: center ">
                  <b><u>Hiba</u>: Túl rövid jelszó!</b></div>';

        }
        if( (int)$age <= 17 ){

            echo '<div style="color: red;font-size:40px;text-align: center ">
                  <b><u>Hiba</u>: 18 éves kortól lehet regisztrálni!</b></div>';

        }

        elseif(!is_numeric($phonenumber)){

            echo '<div style="color: red;font-size:40px;text-align: center ">
                  <b><u>Hiba</u>: Telefonszám csak számokból állhat!</b></div>';

        }
        else{

            $id = $id + TxtProcessor::getActualHighestId("txt/user.txt");
            $userTxtProcessor = new TxtProcessor("txt/user.txt", "user");
            $objectArray = $userTxtProcessor->getObjectArray();

            if( $password == $password2 ){

                foreach ( $objectArray as $object ){
                    if( str_contains($object->getEmail(),$email) ){

                        echo '<div style="color: red;font-size:40px;text-align: center ">
                              <b><u>Hiba</u>: Ez az email foglalt!</b></div>';
                        exit();

                    }


                }
                $userdata = new User( $id, $firstName, $lastName, $password, $email, $phonenumber, $birthDate );
                TxtProcessor::writeobjectToFile("txt/user.txt",$userdata);
                header("location: login.php");



            }
            else{

                echo '<div style="color: red;font-size:40px;text-align: center ">
                                <b><u>Hiba</u>: A jelszók nem egyeznek!</b></div>';

            }
        }


    }

}