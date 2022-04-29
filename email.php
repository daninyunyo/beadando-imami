<?php
$dbh = new PDO('mysql:host=localhost;dbname=imami', 'root', '',
                            array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
            $dbh->query('SET NAMES utf8 COLLATE utf8_hungarian_ci');

            $sqlInsert = "insert into uzenetek(vezeteknev, keresztnev, uzenet)
            values(:vezeteknev, :keresztnev, :uzenet)";
$stmt = $dbh->prepare($sqlInsert); 
$stmt->execute(array(':vezeteknev' => $_POST['lname'], ':keresztnev' => $_POST['fname'],
                   ':uzenet' => $_POST['subject']));
?>
<meta http-equiv="Refresh" content="0; url='/?d=7'" />