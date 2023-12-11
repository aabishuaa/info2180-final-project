<?php
    require "../core/init.php"; 

    if(!empty($_SESSION["user_data"])) {
        unset($_SESSION['user_data']);
        if(!empty($_SESSION["current_contact"])) {
            unset($_SESSION['user_data']);
        }

        session_destroy();
        redirect("");
    } else {
        redirect("");
    }
?>