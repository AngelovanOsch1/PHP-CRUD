<?php

session_start();

if (isset($_SESSION['gebruikerID'])) {
    $gebruikerID = $_SESSION['gebruikerID'];
} else {
    //wegsturen
}
//wegsturen
?>