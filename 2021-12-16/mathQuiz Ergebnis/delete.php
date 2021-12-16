<?php

include 'connection.php';
// Statment definieren
$stmt = $conn->prepare("DELETE FROM mathquiz WHERE id = ?");

// Parameter binden
$value = (int)$_POST['id'];
$stmt->bind_param('i', $value);

// Ausführen
$stmt->execute();

// Verbindungen schließen
$stmt->close();
$conn->close();

// Rückgabewert definieren
$output = include('./table.php');
echo $output;

?>