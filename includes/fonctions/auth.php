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

function isAdmin() : bool {
    if (!$_SESSION["User"]["Admin_User"]) {
        redirectUser();
        header('Location: /pages/home.php');
        return false;
    }
    return true;
}

function isAuthorized() : void {
    require_once(__DIR__ . "/../../includes/MariaDB.php");
    if (!$_SESSION["User"]["Admin_User"]) {
            $rec = null;
            $ret = null;
            if (!empty($_GET['uo'])) {
                $rec = Connexion::getDB()->getResult("SELECT ID_Site FROM Gerer WHERE ID_User = " . $_SESSION["User"]["ID_User"] . " AND ID_Site = " . $_GET['uo']);
                $ret = Connexion::getDB()->getResult("SELECT ID_DR FROM Administrer WHERE ID_DR = (Select ID_DR from Site where ID_Site = " . $_GET['uo'] . " ) AND ID_User = " . $_SESSION["User"]["ID_User"]);
                $rel = Connexion::getDB()->getResult("SELECT ID_Site FROM Gerer WHERE ID_Site = (Select ID_SiteParent from Site where ID_Site = " . $_GET['uo'] . " ) AND ID_User = " . $_SESSION["User"]["ID_User"]);
            }
            elseif (!empty($_GET['ad'])) {
                $rec = Connexion::getDB()->getResult("SELECT ID_Site FROM Gerer WHERE ID_User = " . $_SESSION["User"]["ID_User"] . " AND ID_Site = " . $_GET['ad'] . " LIMIT 1");
                $ret = Connexion::getDB()->getResult("SELECT ID_DR FROM Administrer WHERE ID_DR = (Select ID_DR from Site where ID_Site = " . $_GET['ad'] . " ) AND ID_User = " . $_SESSION["User"]["ID_User"]);
                if ($rec || $ret){
                    return;
                }
            }

            if ($rec || $ret || $rel){
                return;
            }

            header('Location: /pages/home.php');
            die();
    }
}

?>