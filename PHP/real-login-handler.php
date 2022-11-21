<?php

include '../includes/connection.php';

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (empty($email) || (empty($password))) {
        header("location: ...php?error=emptyfields");
    } else {
        $query = $pdo->prepare("SELECT * FROM userss WHERE email=?");
        $query->execute(array($email));
        $control = $query->fetch(PDO::FETCH_ASSOC);
        if (!$control > 0) {
            header("location: ...php?error=Userdoesnotexist");
        } else {
            $verify = password_verify($password, $control['password']);

            if ($verify) {

                session_start();

                $stmt = $pdo->prepare("SELECT * FROM userss WHERE email = ?");
                $stmt->execute([$email]);
                $fetch = $stmt->fetch();

                if($fetch) {

                    $loginID = $fetch['loginID'];

                    $_SESSION['gebruikerID'] = $loginID;
                    header('location: ../index.php');
                    exit();

                } else {
                    header('location: ../index.php');
                    exit();
                }
            } {
                
            }
        }
    }
}

if (!isset($_POST["submit"])) {
    header("location: ../index.php");
    exit();
}
