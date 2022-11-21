<?php

include '../includes/connection.php';

$status = "";

if (isset($_POST["submit"]) && isset($_FILES["profileLogo"])) {
    $imgName = $_FILES["profileLogo"]["name"];
    $imgSize = $_FILES["profileLogo"]["size"];
    $tmpName = $_FILES["profileLogo"]["tmp_name"];
    $error = $_FILES["profileLogo"]["error"];

    if ($error === 0) {
        if ($imgSize > 1250000) {
            header("location: ../login-student.php?error=filetoobig");
            exit();
        } else {
            $imgEx = pathinfo($imgName, PATHINFO_EXTENSION);
            $imgExLc = strtolower($imgEx);

            $allowed_exs = array("jpg", "jpeg", "png");

            if (in_array($imgExLc, $allowed_exs)) {
                $newImgName = uniqid("IMG-", true) . '.' . $imgExLc;
                $imgUploadPath = 'uploads/' . $newImgName;
                move_uploaded_file($tmpName, $imgUploadPath);
            } else {
                header("location: ../login-student.php?error=invalidfile");
                exit();
            }
        }
    }

    $userName = $_POST["username"];
    $password = $_POST["password"];
    $repeatPassword = $_POST["repeatPassword"];
    $email = $_POST["email"];
    $firstName = $_POST["firstName"];
    $lastName = $_POST["lastName"];
    $gender = $_POST["gender"];
    $dateOfBirth = $_POST["dateOfBirth"];
    $country = $_POST["country"];
    $postalcode = $_POST["postalcode"];
    $city = $_POST["city"];
    $streetName = $_POST["streetName"];
    $telephoneNumber = $_POST["telephoneNumber"];
    $school = $_POST["school"];
    $study = $_POST["study"];
    $profileText = $_POST["profileText"];
    $terms = $_POST["terms"];
    
    if (empty($userName) || empty($password) || empty($repeatPassword) || empty($email) || empty($firstName) || empty($lastName) || empty($gender) || empty($dateOfBirth) || empty($country) || empty($postalcode) || empty($city) || empty($streetName) || empty($telephoneNumber) || empty($school) || empty($study) || empty($profileText) || empty($terms)) {
        header("location: ../login-student.php?error=emptyfields");
        exit();
    }

    else if (!preg_match("/^[a-zA-Z0-9]*$/", $userName)) {
        header("location: ../login-student.php?error=invalidUN");
        exit();
    }

    else if (strlen($userName) > 10) {
    header("location: ../login-student.php?error=UNtoolong");
    exit();
    }

    else if (!preg_match("/^[a-zA-Z0-9]*$/", $password)) {
    header("location: ../login-student.php?error=invalidPW");
    exit();
    }

    else if (strlen($password) > 10) {
    header("location: ../login-student.php?error=PWtoolong");
    exit();
    }

    else if ($password != $repeatPassword) {
    header("location: ../login-student.php?error=PWdontmatch");
    exit();
    }

    else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    header("location: ../login-student.php?error=invalidemail");
    exit();
    } 

    else if (preg_match("/^[a-zA-Z]*$/", $telephoneNumber)) {
    header("location: ../login-student.php?error=invalidnumber");
    exit();
    }

    else if (strlen($telephoneNumber) > 15) {
        header("location: ../login-student.php?error=numbertoolong");
        exit();
    }

    else if (strlen($profileText) > 500) {
        header("location: ../login-student.php?error=PTtoolong");
        exit();
    }
        
        else {

        $stmt = $pdo->prepare("SELECT * FROM userss WHERE email = ?");
        $stmt->execute([$email]);
        $user = $stmt->fetch();

        if (!$user) {    
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            if ($hashedPassword) {
    
                $sql1 = "INSERT INTO userss (username, password, email) VALUES (:username, :password, :email)";
                $stmt1 = $pdo->prepare($sql1);
                $stmt1->execute(['username' => $userName, 'password' => $hashedPassword, 'email' => $email]);
    
                if ($stmt1) {
    
                    $stmt1 = $pdo->prepare("SELECT * FROM userss WHERE username = ?");
                    $stmt1->execute([$userName]);
                    $users = $stmt1->fetchAll(PDO::FETCH_ASSOC);
    
                    foreach ($users as $row)
    
                    $loginID = $row['loginID'];
                    settype($loginID, "integer");
    
                    if ($loginID) {
    
                        $sql = "INSERT INTO student (loginID, firstName, lastName, gender, country, postalcode, city, streetName, dateOfBirth, telephoneNumber, school, study, profileText, imgUrl) VALUES (:loginID, :firstName, :lastName, :gender, :country, :postalcode, :city, :streetName, :dateOfBirth, :telephoneNumber, :school, :study, :profileText, :imgUrl)";
                        $stmt = $pdo->prepare($sql);
                        $stmt->execute(['loginID' => $loginID, 'firstName' => $firstName, 'lastName' => $lastName, 'gender' => $gender, 'country' => $country, 'postalcode' => $postalcode, 'city' => $city, 'streetName' => $streetName, 'dateOfBirth' => $dateOfBirth, 'telephoneNumber' => $telephoneNumber, 'school' => $school, 'study' => $study, 'profileText' => $profileText, 'imgUrl' => $newImgName]);
                    } else {
                        header("location: ../login-student.php?error=error");
                        exit();
                    }
                } else {
                    header("location: ../login-student.php?error=error");
                    exit();
                }
            } else {
                header("location: ../login-student.php?error=error");
                exit();
            }
        
        } else {
            header("location: ../login-student.php?error=userAlreadyExists");
            exit();
        }


    }
    header("location: ../index.php");
    exit();
}
if (!isset($_POST["submit"])) {
    header("location: ../index.php");
    exit();
}