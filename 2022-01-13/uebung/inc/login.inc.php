<?php
$host = "localhost";
$pw = "";
$user = "root";
$table = "wiki";

try {
    $conn = new PDO("mysql:host=$host;dbname=$table", $user, $pw);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo $e->getMessage();
}

?>