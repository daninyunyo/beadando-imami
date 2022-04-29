<?php
$target_dir = "upload/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));


if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  if($check !== false) {
    echo "A fájl egy kép - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    echo "A fájl nem kép.";
    $uploadOk = 0;
  }
}


if (file_exists($target_file)) {
  echo "Ezen a néven már van feltöltve kép.";
  $uploadOk = 0;
}


if ($_FILES["fileToUpload"]["size"] > 5000000) {
  echo "A feltöltött kép túl nagy.";
  $uploadOk = 0;
}


if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
  echo "Csak JPG, JPEG, PNG és GIF fájlok feltöltése megengedett.";
  $uploadOk = 0;
}


if ($uploadOk == 0) {
  echo "Meghiúsult feltöltés.";

} else {
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    echo "A ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " sikeresen feltöltve.";
  } else {
    echo "Meghiúsult feltöltés.";
  }
}
?>
<meta http-equiv="Refresh" content="2; url='/?d=2'" />