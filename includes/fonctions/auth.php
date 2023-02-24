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
            $rel = null;
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


function isAuthorized2() : void {
    require_once(__DIR__ . "/../../includes/MariaDB.php");
    if (!$_SESSION["User"]["Admin_User"]) { // this verify if we are admin, admin have all the rights on the website
            $rec = null; //initialisation
            $ret = null;
            if (!empty($_GET['dr'])) { // if 'dr' is in GET so verify if we have the acces to this 'dr', if not $ret will be null
                $ret = Connexion::getDB()->getResult("SELECT ID_DR FROM Administrer WHERE ID_DR = " . $_GET['dr'] . " AND ID_User = " . $_SESSION["User"]["ID_User"]);
            }
            elseif (!empty($_GET['ad'])) { // if 'ad' is in GET so verify if we have the acces to this 'ad' or the "DR" of this 'ad', if not $ret and $rec will be null
                $rec = Connexion::getDB()->getResult("SELECT ID_Site FROM Gerer WHERE ID_User = " . $_SESSION["User"]["ID_User"] . " AND ID_Site = " . $_GET['ad'] . " LIMIT 1");
                $ret = Connexion::getDB()->getResult("SELECT ID_DR FROM Administrer WHERE ID_DR = (Select ID_DR from Site where ID_Site = " . $_GET['ad'] . " ) AND ID_User = " . $_SESSION["User"]["ID_User"]);
            }

            if ($rec || $ret){ // if we have a result it means that we have the right to create a new site so we return
                return;
            }

            header('Location: /pages/home.php'); // if we have no result it means that we don't have the right to create a new site so we return to the home page
            die();
    }
}


function isAuthorized3() : void {
    require_once(__DIR__ . "/../../includes/MariaDB.php");
    if (!$_SESSION["User"]["Admin_User"]) { // this verify if we are admin, admin have all the rights on the website
            $rec = null; //initialisation
            $ret = null;
            if (!empty($_POST['dr'])) { // if 'dr' is in GET so verify if we have the acces to this 'dr', if not $ret will be null
                $ret = Connexion::getDB()->getResult("SELECT ID_DR FROM Administrer WHERE ID_DR = " . $_POST['dr'] . " AND ID_User = " . $_SESSION["User"]["ID_User"]);
                // echo "dr : " . $_POST['dr'];
                // exit();
            }
            elseif (!empty($_POST['ad'])) { // if 'ad' is in GET so verify if we have the acces to this 'ad' or the "DR" of this 'ad', if not $ret and $rec will be null
                $rec = Connexion::getDB()->getResult("SELECT ID_Site FROM Gerer WHERE ID_User = " . $_SESSION["User"]["ID_User"] . " AND ID_Site = " . $_POST['ad'] . " LIMIT 1");
                $ret = Connexion::getDB()->getResult("SELECT ID_DR FROM Administrer WHERE ID_DR = (Select ID_DR from Site where ID_Site = " . $_POST['ad'] . " ) AND ID_User = " . $_SESSION["User"]["ID_User"]);
                // echo "ad : " . $_POST['ad'];
                // exit();
            }

            if ($rec || $ret){ // if we have a result it means that we have the right to create a new site so we return
                return;
                
            }

            header('Location: /pages/home.php'); // if we have no result it means that we don't have the right to create a new site so we return to the home page
            die();
    }
}
?>