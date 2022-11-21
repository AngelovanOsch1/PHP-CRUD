<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <title>User profile</title>
</head>

<body>
    <?php
    include 'includes/header.php';
    // if (!isset($gebruikerID)) {
    //     header("location: index.php"); 
    // }

        $stmt = $pdo->prepare("SELECT * FROM student WHERE loginID = ?");
        $stmt->execute([$gebruikerID]);
        $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($users as $row)

        $firstName = $row['firstName'];
        $lastName = $row['lastName'];
        $gender = $row['gender'];
        $country = $row['country'];
        $postcalcode = $row['postalcode'];
        $city = $row['city'];
        $streetName = $row['streetName'];
        $dateOfBirth = $row['dateOfBirth'];
        $telephoneNumber = $row['telephoneNumber'];
        $school = $row['school'];
        $study = $row['study'];
        $profileText = $row['profileText'];

        $stmt = $pdo->prepare("SELECT * FROM userss WHERE loginID = ?");
        $stmt->execute([$gebruikerID]);
        $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($users as $row)

        $username = $row['username'];
        $email = $row['email'];
    ?>

    <div id="profiel-container">
        <div class="profileImg"> <?php
        echo '<img src="./PHP/uploads/' . $imgUrl . '" height="150px" width="150px">' ?>
            <h2><?php echo $firstName.' '.$lastName; ?></h2>
        </div>
        <div class="profileText">
            <div class="left-side">
                <div class="profile-data">
                    <p>Last name: <?php  echo $lastName; ?></p>
                </div>
                <div class="profile-data">
                    <p>Gender: <?php echo $gender; ?></p>
                </div>
                <div class="profile-data">
                    <p>Country: <?php echo $country; ?></p>
                </div>
                <div class="profile-data">
                    <p>Postal Code: <?php echo $postcalcode; ?></p>
                </div>
                <div class="profile-data">
                    <p>Study: <?php echo $study; ?></p>
                </div>
            </div>
            <div class="right-side">
                <div class="profile-data">
                    <p>City: <?php echo $city; ?></p>
                </div>
                <div class="profile-data">
                    <p>Street name: <?php echo $streetName; ?></p>
                </div>
                <div class="profile-data">
                    <p>Date of birth: <?php echo $dateOfBirth; ?></p>
                </div>
                <div class="profile-data">
                    <p>Telephone number: <?php echo $telephoneNumber; ?></p>
                </div>
                <div class="profile-data">
                    <p>School: <?php echo $school; ?></p>
                </div>
            </div>
        </div>
        <div class="clear-float"></div>
        <div class="signup-text">
            <h2>About me</h2>
            <div class="signup-about-us-text">
                <p>
                <?php echo $profileText; ?>
                </p>
            </div>
            <div class="deco-line"></div>
            <div class="allign-text">
                <div class="left">
                    <a href="profile-change.php" class="text-change-password">
                        Change Password
                    </a>
                </div>
                <div class="right">
                    <a href="profile-delete.php" class="text-change-password">
                        Delete your account
                    </a>
                </div>
            </div>
        </div>
        <?php
        include 'includes/footer.php';
        ?>
</body>
</html>