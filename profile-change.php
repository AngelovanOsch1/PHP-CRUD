<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <title>Change account</title>
</head>
<body>
    <?php
        include 'includes/header.php';
        // if (!isset($gebruikerID)) {
        //     header("location: index.php"); 
        // }
    ?>
    <form action="PHP/change-password-handler.php" method="post">
        <h1 class="change-pw-text">Change Password</h1>
        <br>
        <div class="error-handling">
                    <?php
                    if (isset($_GET["error"])) {
                        if ($_GET["error"] == "emptyfields") {
                            $status = "Empty fields!";
                            echo $status;
                        }
                        else if ($_GET["error"] == "invalidpassword") {
                            $status = "Please obstrain from using special characters!";
                            echo $status;
                        }
                        else if ($_GET["error"] == "passwordtoolong") {
                            $status = "Password is too long!";
                            echo $status;
                        }
                        else if ($_GET["error"] == "invalidoldpassword") {
                            $status = "Old password is incorrect!";
                            echo $status;
                        }
                        else if ($_GET["error"] == "somethingwentwrong") {
                            $status = "Something went wrong please try again!";
                            echo $status;
                        }
                        else if ($_GET["error"] == "passwordsame") {
                            $status = "The old password and the new password cannot be the same!";
                            echo $status;
                        }
                    }
                    ?>
    </div>
        <div class="change-input">
            <input type="text" name="email-change" class="border email-change" placeholder="Email"><br>
            <input type="password" name="old-password-change" class="border input" placeholder="Old password"><br>
            <input type="password" name="new-password-change" class="border input" placeholder="New password"><br>
            <input type="submit" value="Change Password" class="text-change-password border input" name="submit">
            <div class="space"></div>
        </div>
    </form>
<?php
    include 'includes/footer.php';
?>
</body>
</html>