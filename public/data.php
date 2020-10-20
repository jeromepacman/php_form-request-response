<?php
var_dump($_GET);

$country = $_GET['country'];


$pdo = new PDO('mysql:host=acs-exercice-selectbox-mysql;dbname=test1', 'root', 'acsql', [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]);

$sql= "INSERT INTO Country_db (country) VALUE ('$country')";
$pdo->exec($sql);

?>
