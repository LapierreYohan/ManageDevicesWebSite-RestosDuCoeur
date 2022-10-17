<?php

// const db = "p2103678";
// const dbhost = "iutbg-lamp.univ-lyon1.fr";
// const dbport = 3306;
// const dbuser = "p2103678";
// const dbpasswd = "12103678";

const db = "resto";
const dbhost = "localhost";
const dbport = 3306;
const dbuser = "p2103678";
const dbpasswd = "12103678";

function bddRestos(): PDO {
    $bdd = new PDO('mysql:host=' . dbhost . ';port=' . dbport . ';dbname=' . db . '', dbuser, dbpasswd);
    $bdd->exec("SET CHARACTER SET utf8");
    return $bdd;
}

// $stmt = $bdd->prepare("SELECT * FROM Utilisateur");
// $stmt->execute();

// $res = $stmt->fetchAll();
// foreach ( $res as $row ) {
//     print_r($row);
// }

?>


//?https://www.linuxtricks.fr/wiki/php-exemples-avec-pdo-pour-interroger-une-base-mariadb
//?https://www.w3schools.com/Php/php_mysql_create_table.asp