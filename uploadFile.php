<?php 
$target_dir = "kepek/userPic";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

if (isset($_POST["submit"])) {

  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);

  if($check !== false) {
    
    echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;

  } else {
    
    echo "File is not an image.";
    $uploadOk = 0;
  }
}
?>
<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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


