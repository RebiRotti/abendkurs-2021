<?php
include 'connection.php';
$stmt = "SELECT * FROM mathquiz";
$result = $conn->query($stmt);
// var_dump($result);
if($result->num_rows > 0) {
    /* Output Data */
    while($row = $result->fetch_assoc()) {
        ?>
        <tr>
            <td><?= $row['user'] ?></td>
            <td><?= $row['question'] ?></td>
            <td>
                <?php
                    if($row['right_answer'] == $row['user_answer']) {
                        echo '<span class="alert alert-danger p-1">' . $row['user_answer'] . '</span>';
                    } else {
                        echo '<span class="alert alert-success p-1">' . $row['user_answer'] . '</span>';
                    }
                ?>
            </td>
            <td><?= $row['level'] ?></td>
            <td><?= $row['created_at'] ?></td>
            <td>
                <button onclick="deleteEntry(<?= $row['id'] ?>)" class="btn btn-danger">Delete</button>
            </td>
            <td>
                <button onclick="restartGame(<?= $row['id'] ?>)" class="btn btn-dark">Restart here</button>
            </td>
        </tr>
        <?php
    }
}
$conn->close();

?>