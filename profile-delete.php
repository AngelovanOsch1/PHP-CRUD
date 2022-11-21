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
        if (!isset($gebruikerID)) {
            header("location: index.php"); 
        }
    ?>
        <form action="PHP/delete-account-handler.php" method="post">
            <h1 class="change-pw-text">Delete Account</h1>
            <br>
            <div class="error-handling">
                    <?php
                    if (isset($_GET["error"])) {
                        if ($_GET["error"] == "emptyfields") {
                            $status = "Empty fields!";
                            echo $status;
                        }
                        if ($_GET["error"] == "incorrectdata") {
                            $status = "email or password incorrect!";
                            echo $status;
                        }
                    }
                    ?>
        </div>
            <div class="change-input">
                <input type="password" name="password" class="border input" placeholder="Password"><br>
                <input type="submit" value="Delete Account" class="text-change-password border input" name="submit">
                <div class="space"></div>
            </div>
        </form>
    <?php
        include 'includes/footer.php';
    ?>
</body>
</html>