<?php

include '../includes/connection.php';
include '../includes/session.php';

if (isset($_POST['submit'])) {
    $password = $_POST['password'];

    if(empty($password)) {
        header("location: ../profile-delete.php?error=emptyfields");
        exit();
    }
    
    $stmt1 = $pdo->prepare("SELECT * FROM userss WHERE loginID = ?");
    $stmt1->execute([$gebruikerID]);
    $users = $stmt1->fetchAll(PDO::FETCH_ASSOC);

        if($users) {
            foreach ($users as $row) {
                $databasePassword = $row['password'];
            }

            $test = password_verify($password, $databasePassword);

            if($test) {
                $stmt2 = $pdo->prepare("DELETE FROM userss WHERE loginID = ?");
                $stmt2->execute([$gebruikerID]);

                $stmt3 = $pdo->prepare("DELETE FROM student WHERE loginID = ?");
                $stmt3->execute([$gebruikerID]);

                header("location: ../includes/logout.php");
                exit(); 
            } else {
                header("location: ../profile-delete.php?error=incorrectdata");
                exit(); 
            }
        }

        else {
            header("location: ../profile-delete.php?error=incorrectdata");
            exit();
        }
    }
?>