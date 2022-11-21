<?php
include '../includes/connection.php';
include '../includes/session.php';

if (isset($_POST['submit'])) {
    $email = $_POST['email-change'];
    $oldPassword = $_POST['old-password-change'];
    $newPassword = $_POST['new-password-change']; 


    if (empty($email) || empty($oldPassword) || empty($newPassword)) {
        header("location: ../profile-change.php?error=emptyfields");
        exit();
    }

    else if (!preg_match("/^[a-zA-Z0-9]*$/", $newPassword)) {
        header("location: ../profile-change.php?error=invalidpassword");
        exit();
    }

    else if (strlen($newPassword) > 10) {
        header("location: ../profile-change.php?error=passwordtoolong");
        exit();
    }

    else if ($newPassword == $oldPassword) {
        header("location: ../profile-change.php?error=passwordsame");
        exit();
    }
    
        $stmt = $pdo->prepare("SELECT * FROM userss WHERE loginID = ?");
        $stmt->execute([$gebruikerID]);
        $users = $stmt->fetch();

        if($users) {
        
            $test = password_verify($oldPassword, $users['password']);
        
            if ($test) {

                $hashedPWD = password_hash($newPassword, PASSWORD_DEFAULT);

            } else {
                header("location: ../profile-change.php?error=invalidoldpassword");
                exit();
            }  

                $query = $pdo->prepare("UPDATE userss SET password = ? WHERE loginID = ?");
                $query->execute([$hashedPWD, $gebruikerID]);

                session_start();
                session_unset();
                session_destroy();
                
                header("location: ../index.php");
                exit();
            
            } else {
                header("location: ../profile-change.php?error=somethingwentwrong");
                exit();
            }  
    }

if (!isset($_POST["submit"])) {
    header("location: ../index.php");
}
?>