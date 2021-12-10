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
    header('Location: ' . $_SERVER['HTTP_REFERER']);
}

// Update exist Entry
if($_POST['newEntry'] == 2) {
    $sql = "UPDATE beispiel_1 SET name=? WHERE id=?";
    $stmt= $conn->prepare($sql);
    $name = $_POST['editName'];
    $id = $_POST['editID'];
    $stmt->bind_param("si", $name, $id);
    $stmt->execute();
    header("Location: http://localhost/phpBSP/");
}
$stmt->close();

