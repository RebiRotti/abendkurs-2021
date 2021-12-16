<?php
include 'connection.php';
//var_dump($_POST);

// Statment definieren
$stmt = $conn->prepare("INSERT INTO mathquiz(user, question, right_answer, user_answer, level) value (?, ?, ?, ?, ?)");

// Abspeichern des Post Value in Variable
$userResult = $_POST['userResult'];
$result = $_POST['sum'];
$level = $_POST['level'];
$question = $_POST['question'];
$username = $_POST['username'];

// Parameter binden
$stmt->bind_param('ssiii', $username, $question, $result, $userResult, $level);

// Ausführen des Statments
$stmt->execute();

// Verbindungen schließen
$stmt->close();
$conn->close();

// Rückgabewert definieren
$output = include('./table.php');
echo $output;