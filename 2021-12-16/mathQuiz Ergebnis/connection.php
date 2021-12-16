<?php

$conn = new mysqli('localhost', 'root', '', 'abendkurs');
if($conn->connect_errno) {
    die('Verbindung fehlgeschlagen: ' . $conn->connect_error);
}
?>