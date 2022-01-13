<?php
require_once './inc/login.inc.php';

session_start();
if(isset($_SESSION['username'])) {
    header('location:welcome.php');
}

if(isset($_POST['btn_login'])) {
    $email = strip_tags($_POST['inputEmail']);
    $pw = strip_tags($_POST['inputPassword']);

    if(empty($email)) {
        $errorMsg[] = "E-Mail ist Pflicht";
    } else if (empty($pw)) {
        $errorMsg[] = "Passwort ist Pflicht";
    } else {
        try {
            $stmt = $conn->prepare('SELECT email, username, password FROM users WHERE email=:useremail');
            $stmt->execute(array(':useremail' => $email));
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            if($stmt->rowCount() > 0) {
                if(password_verify($pw, $row['password'])) {
                    $_SESSION['username'] = $row['username'];
                    $successMsg = "Du hast dich erfolgreich eingeloggt. Weiterleitung in 2 Sek";
                    header('refresh:2; index.php');
                } else {
                    $errorMsg[] = "Falsches Passwort";
                }
            } else {
                $errorMsg[] = "Falsche E-Mail Adresse";
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}

?>