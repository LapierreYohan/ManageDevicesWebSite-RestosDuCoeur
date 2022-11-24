<?php

class Connexion{

	private $h, $d, $u, $p;
	private static $instance = null;
	private $connexion = null;

	private function __construct() {
		
		$this->h = "localhost";
		$this->d = "resto";
		$this->u = "p2103678";
		$this->p = "12103678";

		try {
            $this->connexion = new PDO('mysql:host='.$this->h.';dbname='.$this->d.';',$this->u,$this->p);
			$this->connexion->exec('SET NAMES utf8');
			$this->connexion->exec('SET default_storage_engine = InnoDB');
			$this->connexion->exec('SET SQL_SAFE_UPDATES = 0');
            $this->connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        } catch (PDOException $Exception) {
            echo $Exception->getMessage();
            die();
        }
	}

	public static function getDB() {

		if (self::$instance === null)
        {
            self::$instance = new Connexion();
        }
    
        return self::$instance;
	}

	public function get() {
		return $this->connexion;
	}

	public function exec($sql) {
		$dbh = $this->connexion;
		$res = $dbh->exec($sql);
		return true;
	}

	public function getResult($sql) {
		$tmp=array();

		$dbh = $this->connexion;
		$res = $dbh->query($sql);
		while($data = $res->fetch(PDO::FETCH_ASSOC)){
			$tmp[] = $data;
		}
		return $tmp;
	}

    public function printCarouselElements ($res, $selector) {
        foreach ($res as $row) {

            echo '<input type="radio" name="'. $selector .'" id="' . $row["Reference"] . '">';
            echo '<div class="carousel-cell">';
            echo '<label for="' . $row["Reference"] . '">';
            echo '<img src="../img/icon/Département.png" alt="Icon Département">';
            echo '<p><b>' . $row["Reference"] . '</b></p>';
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
