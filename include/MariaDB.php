<?php

class Connexion{

	private $h, $d, $u, $p;

	public function __construct(){
	}

	public function getDB(){
		$this->h = "localhost";
		$this->d = "resto";
		$this->u = "p2103678";
		$this->p = "12103678";

		$db = new PDO('mysql:host='.$this->h.';dbname='.$this->d.';',$this->u,$this->p);
		$db->exec('SET NAMES utf8');
        $db->exec('SET default_storage_engine = InnoDB');
        $db->exec('SET SQL_SAFE_UPDATES = 0');
		return $db;
	}

    public static function bddRestos() {
        $db = new Connexion();
		return $db->getDB();
    }

	public static function exec($sql){
		$db = new Connexion();
		$dbh = $db->getDB();
		$res = $dbh->exec($sql);
		$dbh = null;
		return true;
	}

	public static function getResult($sql){
		$tmp=array();

		$db = new Connexion();
		$dbh = $db->getDB();
		$res = $dbh->query($sql);
		$dbh = null;
		while($data = $res->fetch(PDO::FETCH_ASSOC)){
			$tmp[] = $data;
		}
		return $tmp;
	}

    public static function printCarouselElements ($res, $selector) {
        foreach ($res as $row) {

            echo '<input type="radio" name="'. $selector .'" id="' . $row["Reference"] . '">';
            echo '<div class="carousel-cell">';
            echo '<label for="' . $row["Reference"] . '">';
            echo '<img src="../img/icon/Département.png" alt="Icon Département">';
            echo '<p>' . $row["Reference"] . '</p>';
            echo '</label>';
            echo '</div>';
        }
        return true;
    }
}

// const DB = "p2103678";
// const DBHOST = "iutbg-lamp.univ-lyon1.fr";
// const DBPORT = 3306;
// const DBUSER = "p2103678";
// const DBPASSWORD = "12103678";

//const DB = "resto";
//const DBHOST = "localhost";
//const DBPORT = 3306;
//const DBUSER = "p2103678";
//const DBPASSWORD = "12103678";

// const DB = "rdc";
// const DBHOST = "localhost";
// const DBPORT = 3306;
// const DBUSER = "root";
// const DBPASSWORD = "Agrloul55555";

/*function bddRestos(): PDO
{
    $bdd = new PDO('mysql:host=' . DBHOST . ';port=' . DBPORT . ';dbname=' . DB . '', DBUSER, DBPASSWORD);
    $bdd->exec("SET CHARACTER SET utf8");
    return $bdd;
}*/

// $stmt = $bdd->prepare("SELECT * FROM Utilisateur");
// $stmt->execute();

// $res = $stmt->fetchAll();
// foreach ( $res as $row ) {
//     print_r($row);
// }
