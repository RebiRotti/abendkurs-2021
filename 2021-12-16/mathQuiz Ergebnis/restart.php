<?php
include 'connection.php';
// Statment definieren
$stmt = $conn->prepare('SELECT * FROM mathquiz WHERE id = ?');

// Parameter binden
$value = (int)$_POST['id'];
$stmt->bind_param('i', $value);

// Ausführen
$stmt->execute();

// Eintrag aus DB auslesen
$result = $stmt->get_result();
while($row = $result->fetch_assoc()) {
    $output['user'] = $row['user'];
    if($row['right_answer'] == $row['user_answer']) {
        $row['level']++;
        $output['flag'] = 1;
    } else {
        $output['right_answer'] = $row['right_answer'];
        $output['question'] = $row['question'];
        $output['flag'] = 0;
    }
    $output['level'] = $row['level'];
}

// Verbindungen schließen
$stmt->close();
$conn->close();

// Rückgabewert als JSON Codieren und zurück geben
echo json_encode($output);

?>