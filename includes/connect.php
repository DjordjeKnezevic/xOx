<?php

$serverName = $_ENV['MYSQL_DATABASE_HOST'];
$dbName = $_ENV['MYSQL_DATABASE_NAME'];

try {
    $conn = new PDO("mysql:host=$serverName;dbname=$dbName", $_ENV['MYSQL_USER'], $_ENV['MYSQL_PASSWORD']);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
    // echo "Uspesna konekcija<br/>";
} catch (PDOException $e) {
    echo $e->getMessage();
}

?>