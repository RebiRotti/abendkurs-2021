<!DOCTYPE html>
<html>
<head>
    <title>PHP Übung</title>
    <meta charset="UTF-8">
    <?php include 'db.php'; ?>
</head>
<body>
    <?php
    $sql = "SELECT * FROM beispiel_1 WHERE id = ?"; // SQL with parameters
    $stmt = $conn->prepare($sql);
    $id = (int)$_GET['entry'];
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result(); // get the mysqli result
    while($row = $result->fetch_assoc()) {
    ?>
    <form action="save.php" method="POST">
        <input type="hidden" name="newEntry" value="2">
        <input type="hidden" name="editID" value="<?= $row["id"] ?>">
        <input type="text" name="editName" value="<?= $row["name"] ?>">
        <button type="submit">Save</button>
    </form>

    <?php

    }
    $conn->close();
    ?>
</body>
</html>
