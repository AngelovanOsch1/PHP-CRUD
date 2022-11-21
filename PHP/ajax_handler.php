<?php

include '../includes/connection.php';

if(isset($_POST['email_id'])) {

    $emailValue = $_POST['email_id'];

    $stmt = $pdo->prepare("SELECT * FROM userss WHERE email = ?");
    $stmt->execute([$emailValue]);
    $user = $stmt->fetch();

    if(!$user) {
        echo "Email available";
    } else {
        echo "Email already exists. Please try another one";
    }
}
?>