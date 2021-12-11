<!DOCTYPE html>
<html>
<head>
    <title>PHP Übung</title>
    <meta charset="UTF-8">
</head>
<body>
    <form method="POST" action="save.php">
        <input type="hidden" name="newEntry" value="1">
        <label for="inputName">Name</label>
        <input type="text" name="inputName" id="inputName">
        <button type="submit">Absenden</button>
    </form>

    <?php
    include 'db.php';
    $sql = "SELECT * FROM beispiel_1";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            echo "id: " . $row["id"]. " - Name: " . $row["name"]. "<br>";
            ?>
            <form action="delete.php" method="POST">
                <input type="hidden" name="entryID" value="<?= $row["id"] ?>">
                <button type="submit">Delete</button>
            </form>
            <p><a href="edit.php?entry=<?= $row["id"]?>">Edit</a></p>
    <?php
        }
    } else {
        echo "0 results";
    }
    $conn->close();
    ?>
</body>
</html>
