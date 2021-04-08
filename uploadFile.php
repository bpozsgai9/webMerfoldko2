<?php
require 'class/CoolFood.php';

$coolFood = new CoolFood();
$coolFood->uploadFile();
?>

<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>

<body>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
        <h1>Kérlek tölts fel egy képet is magadról!</h1><br>
        <label class="custom-file-upload">
            <input type="file" name="fileToUpload" id="fileToUpload"><br>
        </label>
        <input type="submit" value="Feltölt" name="submit"><br>
    </form>
    <a href="registration.php">Vissza</a>
</body>
</html>

