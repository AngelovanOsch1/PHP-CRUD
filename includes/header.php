<?php 
    include 'connection.php';
    include 'session.php';
?>
<header>
<script src="https://kit.fontawesome.com/187395bb85.js" crossorigin="anonymous"></script>
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <a href="index.php">
        <img src="images/sample-logo.png" alt="#">
    </a>
    <nav>
        <ul>
            <li><a href="faq.php">FAQ</li></a>
            <li><a href="socials.php">About us & Socials</li></a>
            <li><a href="login-student.php">Sign UP</li></a>
        </ul>
    </nav>
    <div class="center-login">
        <?php
        if (!isset($gebruikerID)) {
            include 'login.php';
        
        } else {
            
            $stmt = $pdo->prepare("SELECT * FROM student WHERE loginID = ?");
            $stmt->execute([$gebruikerID]);
            $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
                if($users) {
                    foreach ($users as $row) {
                        $imgUrl = $row['imgUrl'];          
                    }
                }
    
                else {
                    $imgUrl = 'default-user-icon-13.png';
                }

            echo '<div id="dropdownOverlay">';
            echo '<img src="./PHP/uploads/' . $imgUrl . '" height="50px" width="50px" id="dropdownToggle">';
            echo '<div id="dropdown"><ul><li><a href="user-profile.php">Profile</li></a><li><a href="includes/logout.php">Logout</li></a></ul></div>';
            echo '</div>';
        }
        ?>
    </div>
</header>