<?php
require_once('./inc/login.inc.php');

if(isset($_POST['btn_register'])) {
    $forename = strip_tags($_POST['inputForename']);
    $familyname = strip_tags($_POST['inputFamilyname']);
    $username = strip_tags($_POST['inputUsername']);
    $email = strip_tags($_POST['inputEmail']);
    $pw = strip_tags($_POST['inputPassword']);
    if(empty($forename)) {
        $errorMsg[] = "Vorname ist Pflicht";
    } else if (empty($familyname)) {
        $errorMsg[] = "Familienname ist Pflicht";
    } else if (empty($username)) {
        $errorMsg[] = "Username ist Pflicht";
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL) || empty($email)) {
        $errorMsg[] = "korrekte E-Mailadresse ist Pflicht";
    } else if(empty($pw) || strlen($pw) < 6) {
        $errorMsg[] = "Passwort muss mindestens 6 Zeichen lang sein";
    } else {
        try {
            $stmt = $conn->prepare(
                "SELECT username, email FROM users WHERE username=:insertName OR email=:insertMail"
            );
            $stmt->execute(array(
                ':insertName' => $username,
                ':insertMail' => $email
            ));
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            if($stmt->rowCount() > 0) {
                if($row['username'] == $username) {
                    $errorMsg[] = 'Username existiert bereits';
                } else if($row['email'] == $email) {
                    $errorMsg[] = 'E-Mail existiert bereits';
                }
            } else if(!isset($errorMsg)) {
                $newPW = password_hash($pw, PASSWORD_DEFAULT);
                $insertStmt = $conn->prepare(
                    'INSERT INTO users (username, forename, familyname, password, email) VALUES (:username, :forename, :familyname, :password, :email)'
                );
                if($insertStmt->execute(array(
                    ':username' => $username,
                    ':forename' => $forename,
                    ':familyname' => $familyname,
                    ':password' => $newPW,
                    ':email' => $email
                ))) {
                    $successMsg = "Registrierung erfolgreich. Klicke auf Login um dich einzuloggen.";
                }

            }
        } catch (PDOException $e) {
            echo  $e->getMessage();
        }
    }
}

?>