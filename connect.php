<?php
$connection = mysqli_connect('localhost', 'root', '');
if (!$connection){
    die("MySQL csatlakozás meghiúsult!" . mysqli_error($connection));
}
$select_db = mysqli_select_db($connection, 'imami');
if (!$select_db){
    die("Adatbázis csatlakozás meghiúsult!" . mysqli_error($connection));
}
?>