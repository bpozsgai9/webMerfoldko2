<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
        <h1>Kérlek tölts fel egy képet is magadról!</h1><br>
        <input type="file" name="fileToUpload" id="fileToUpload"><br>
        <input type="submit" value="Feltölt" name="submit"><br>
    </form>
</body>
</html>
<?php

if (!empty($_POST["submit"]) && isset($_POST["submit"])) {
    
    $target_dir = "kepek/userPic/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    if ($uploadOk == 0) {
    
        echo "Hiba: A fájl nem lett feltöltve!";

    } else {
    
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            
            echo htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " fel lett töltve!";
        } else {
            
            echo "Hiba: Feltöltés közben hiba lépett fel!";
    }
}
}

?>

