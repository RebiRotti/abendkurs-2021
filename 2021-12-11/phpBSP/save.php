<?php
// var_dump($_POST);
include 'db.php';
// Save new Entry
if($_POST['newEntry'] == 1) {
    /* Vorbereitete Anweisung, Stufe 1: vorbereiten */
    $stmt = $conn->prepare("INSERT INTO beispiel_1(name) VALUES (?)");

    /* Vorbereitete Anweisung, Stufe 2: binden und ausführen */
    $label = $_POST['inputName'];
    $stmt->bind_param("s", $label);
    // "s" bedeutet, dass $label als Zeichenkette gebunden ist
    // 'i' steht für integer

    $stmt->execute();

}

// Update exist Entry
if($_POST['newEntry'] == 2) {
    $stmt = $conn->prepare("UPDATE beispiel_1 SET name=? WHERE id=?");
    $name = $_POST['editName'];
    $id = (int)$_POST['editID'];
    $stmt->bind_param("si", $name, $id);
    $stmt->execute();
}
header("Location: " . $rootPath);
$stmt->close();

