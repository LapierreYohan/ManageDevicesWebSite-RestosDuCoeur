<?php
function is_connected () : bool {
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    return !empty($_SESSION['H!g0h?s,BVDVo']);
}

function redirectUser() : void {
    if (!is_connected()) {
        header('Location: /index.php');
        exit();
    }  
}

function disconnect(): void
{
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    unset($_SESSION);

    session_destroy();

    header('Location: /index.php');
}
?>