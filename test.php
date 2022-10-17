<?php
$db = "p2103678";
$dbhost = "iutbg-lamp.univ-lyon1.fr";
$dbport = 3306;
$dbuser = "p2103678";
$dbpasswd = "12103678";

$pdo = new PDO('mysql:host=' . $dbhost . ';port=' . $dbport . ';dbname=' . $db . '', $dbuser, $dbpasswd);
$pdo->exec("SET CHARACTER SET utf8");

$stmt = $pdo->prepare("SELECT * FROM Utilisateur");
$stmt->execute();

$res = $stmt->fetchAll();
foreach ($res as $row) {
    print_r($row);
}

?>




<?php
$pdo = null;
?>