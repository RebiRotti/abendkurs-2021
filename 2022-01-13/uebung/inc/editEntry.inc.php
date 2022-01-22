<?php

require_once './inc/login.inc.php';

if(isset($_POST['btn_add'])) {
    $title = strip_tags($_POST['inputTitle']);
    $teaser = strip_tags($_POST['inputTeaser']);
    $description = strip_tags($_POST['inputDescription']);
    if(empty($title)) {
        $errorMsg[] = "Enter Title";
    } else if(empty($teaser)) {
        $errorMsg[] = "Enter Teaser";
    } else if (empty($description)) {
        $errorMsg[] = "Enter Description";
    } else {

        $filename = NULL;
        $uploadOk = 1;
        include('./inc/saveFile.inc.php');
        if($uploadOk == 1) {
            try {
                $stmt = $conn->prepare(
                    'INSERT INTO content (title, teaser, description, imgpath) VALUES (:title, :teaser, :description, :imgpath)'
                );
                if($stmt->execute(array(
                    ':title' => $title,
                    ':teaser' => $teaser,
                    ':description' => $description,
                    ':imgpath' => $filename
                ))) {
                    if(isset($successMsg)) {
                        $successMsg = "File upload & Eintrag erfolgreich bewältigt. Reload in 2 Sek";
                    } else {
                        $successMsg = "Eintrag gespeichert. Reload in 2 Sek";
                    }
                    header('refresh: 2; welcome.php');
                }
            } catch (PDOException $e) {
                echo $e->getMessage();
                unlink($target_file);
            }
        }

    }
}

if(isset($_POST['btn_edit'])) {
    $title = strip_tags($_POST['inputTitle']);
    $teaser = strip_tags($_POST['inputTeaser']);
    $description = strip_tags($_POST['inputDescription']);
    $id = $_POST['id'];

    if(empty($title)) {
        $errorMsg[] = "Enter Title";
    } elseif(empty($teaser)) {
        $errorMsg[] = "Enter Teaser";
    } elseif(empty($description)) {
        $errorMsg[] = "Enter Description";
    } else {
        try {
            $stmt = $conn->prepare(
                'UPDATE content SET title = :title, teaser = :teaser, description = :description WHERE id = :id'
            );
            if($stmt->execute(array(
                ':id' => $id,
                ':title' => $title,
                ':teaser' => $teaser,
                ':description' => $description
            ))) {
                $successMsg = "Erfolgreich gespeichert. Weiterleitung erfolgt in 2 Sek";
            }
            header('refresh:2; welcome.php');
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}

if(isset($_POST['btn_delete'])) {
    $id = $_POST['id'];
    try {
        $stmt = $conn->prepare('DELETE FROM content WHERE id = :id');
        if($stmt->execute(array(':id' => $id))) {
            $successMsg = "Erfolgreich gelöscht, Weiterleitung erfolgt in 2 Sek";
        }
        header('location:welcome.php');
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}


?>