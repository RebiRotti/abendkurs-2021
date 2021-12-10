<?php
$conn = new mysqli("127.0.0.1", "root", "", "abendkursBsp01");
if ($conn->connect_errno) {
    die("Verbindung fehlgeschlagen: " . $conn->connect_error);
}
?>



