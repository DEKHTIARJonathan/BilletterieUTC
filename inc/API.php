<?php
	// Page d'accueil : /index.php
	header("Content-Type: text/html; charset=UTF-8");
	$root = realpath($_SERVER["DOCUMENT_ROOT"]);
	require_once $root.'/config.inc.php';

class API {

	private $connexion = False;

  public function __construct(){
		global $_CONFIG;
		try {
				$this->connexion = new PDO('mysql:host='.$_CONFIG['db']['host'].';port='.$_CONFIG['db']['port'].';dbname='.$_CONFIG['db']['name'], $_CONFIG['db']['user'], $_CONFIG['db']['pass'],  array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
				$this->connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		}catch ( Exception $e )
		{
				echo "Connection à MySQL impossible : <br>", $e->getMessage();
				echo '<meta http-equiv="Refresh" content="5; Url='.$_CONFIG["website"]['home'].'">';
				die();
		}
  }
	public function checkRights($login, $asso){
		$sth = $this->connexion->prepare('Select `t1`.`isAdmin`, `t2`.`hasRight`, `t3`.`name` From
		(Select CASE WHEN count(*) = "0" THEN "FALSE" ELSE "TRUE" END AS `isAdmin` From `admin` where `login` = :login) as `t1`,
		(Select CASE WHEN count(*) = "0" THEN "FALSE" ELSE "TRUE" END AS `hasRight` From `asso_assoc` where `login` = :login and `association` = :asso) as `t2`,
		`assos` as `t3`
		WHERE `t3`.`name` = :asso;
		');

		$sth->bindParam(':login', $login);
		$sth->bindParam(':asso', $asso);
		$sth->execute();

		$output = $sth->fetch();

		$rsltAdmin = filter_var($output["isAdmin"], FILTER_VALIDATE_BOOLEAN);
		$rsltAssoRight = filter_var($output["hasRight"], FILTER_VALIDATE_BOOLEAN);

		return $rsltAdmin || $rsltAssoRight;

	}
	public function createAsso($name, $email, $payutcKey){
		$sth = $this->connexion->prepare('INSERT INTO `assos` (`name`, `email`, `payutcKey`) VALUES (:name, :email, :payutckey);');

		$sth->bindParam(':name', $name);
		$sth->bindParam(':email', $email);
		$sth->bindParam(':payutckey', $payutcKey);

		return $sth->execute();
	}
	public function createEvent($asso, $name, $eventDate, $flyer, $maxTickets, $location){
		$sth = $this->connexion->prepare("INSERT INTO `events` (`eventID`, `asso`, `eventName`, `eventDate`, `eventFlyer`, `eventTicketMax`, `location`) VALUES (NULL, :asso, :name, DATE_FORMAT(STR_TO_DATE(:eventDate,'%d/%m/%Y'),'%Y-%m-%d'), :flyer, :maxTickets, :location)");

		$sth->bindParam(':asso', $asso);
		$sth->bindParam(':name', $name);
		$sth->bindParam(':eventDate', $eventDate);
		$sth->bindParam(':flyer', $flyer);
		$sth->bindParam(':maxTickets', $maxTickets);
		$sth->bindParam(':location', $location);

		return $sth->execute();
	}
	public function getPeopleCount(){
		$sth = $this->connexion->prepare('SELECT COUNT(DISTINCT `login`) as `peopleCount` FROM ((SELECT DISTINCT `login` FROM `admin`) UNION ALL (SELECT DISTINCT `login` FROM `asso_assoc`)) `peopleCount`');
		$sth->execute();
		return $sth->fetch()["peopleCount"];
	}
	public function getAllAdmins(){
		$sth = $this->connexion->prepare('SELECT `login` FROM `admin` order by `login`');
		$sth->execute();

		$i = 0;
		$array = array();

		while ($row = $sth->fetch(PDO::FETCH_ASSOC, PDO::FETCH_ORI_NEXT)){
			$array[$i] = $row["login"];
			$i ++;
		}

		return $array;
	}
	public function getAllAssos(){
		$sth = $this->connexion->prepare('SELECT `name` FROM `assos`;');
		$sth->execute();

		$i = 0;
		$array = array();

		while ($row = $sth->fetch(PDO::FETCH_ASSOC, PDO::FETCH_ORI_NEXT)){
			$array[$i] = $row["name"];
			$i ++;
		}

		return $array;
	}
	public function getAllEvents(){
		$sth = $this->connexion->prepare('SELECT `t1`.`eventID`, `t1`.`asso`, `t1`.`eventName`, `t1`.`eventDate`, `t1`.`eventFlyer`, `t1`.`eventTicketMax`, `t1`.`location`, `t2`.`placeLeft` FROM `events` as `t1`, (SELECT events.eventTicketMax - (SELECT COUNT(*) FROM `tickets`) as `placeLeft`, `eventID` FROM `events`) as `t2` WHERE `t2`.`eventID` = `t1`.`eventID` order by `eventDate`;');

		$sth->execute();

		$i = 0;

		$matrix;

		while ($row = $sth->fetch(PDO::FETCH_ASSOC, PDO::FETCH_ORI_NEXT)){
			$matrix["id"][$i] = $row["eventID"];
			$matrix["name"][$i] = $row["eventName"];
			$matrix["asso"][$i] = $row["asso"];
			$matrix["date"][$i] = $row["eventDate"];
			$matrix["location"][$i] = $row["location"];
			$matrix["eventFlyer"][$i] = $row["eventFlyer"];
			$matrix["maxTickets"][$i] = $row["eventTicketMax"];
			$matrix["ticketsLeft"][$i] = $row["placeLeft"];
			$i ++;
		}

		return $matrix;
	}
	public function getAllEventsAlived(){
		$sth = $this->connexion->prepare('SELECT `t1`.`eventID`, `t1`.`asso`, `t1`.`eventName`, `t1`.`eventDate`, `t1`.`eventFlyer`, `t1`.`eventTicketMax`, `t1`.`location`, `t2`.`placeLeft` FROM `events` as `t1`, (SELECT events.eventTicketMax - (SELECT COUNT(*) FROM `tickets`) as `placeLeft`, `eventID` FROM `events`) as `t2` WHERE `eventDate` >= CURDATE() and `t2`.`eventID` = `t1`.`eventID` order by `eventDate`;');

		$sth->execute();

		$i = 0;

		$matrix;

		while ($row = $sth->fetch(PDO::FETCH_ASSOC, PDO::FETCH_ORI_NEXT)){
			$matrix["id"][$i] = $row["eventID"];
			$matrix["name"][$i] = $row["eventName"];
			$matrix["asso"][$i] = $row["asso"];
			$matrix["date"][$i] = $row["eventDate"];
			$matrix["location"][$i] = $row["location"];
			$matrix["eventFlyer"][$i] = $row["eventFlyer"];
			$matrix["maxTickets"][$i] = $row["eventTicketMax"];
			$matrix["ticketsLeft"][$i] = $row["placeLeft"];
			$i ++;
		}

		return $matrix;
	}
	public function getAllTarifsByEvent($eventID){
		$sth = $this->connexion->prepare('SELECT * FROM `tarifs` WHERE `eventID` = :eventID');
		$sth->bindParam(':eventID', $eventID);

		$sth->execute();

		$i = 0;

		while ($row = $sth->fetch(PDO::FETCH_ASSOC, PDO::FETCH_ORI_NEXT)) {
			$matrix[$i]["tarifID"] = $row["tarifID"];
			$matrix[$i]["eventID"] = $row["eventID"];
			$matrix[$i]["tarifName"] = $row["tarifName"];
			$matrix[$i]["price"] = $row["price"];
			$matrix[$i]["maxByUser"] = $row["maxByUser"];
			$i ++;
		}

		if (isset($matrix))
			return $matrix;
		else
			return False;
	}
	public function getAssosCount(){
		$sth = $this->connexion->prepare('SELECT count(*) FROM `assos`;');
		$sth->execute();
		return $sth->fetch()[0];
	}
	public function getAssosRoles($login){

		$sth = $this->connexion->prepare('SELECT `association`, `role` FROM `asso_assoc` WHERE (`login` = :login)');
		$sth->bindParam(':login', $login);

		$sth->execute();

		$i = 0;
		$matrix = array();

		while ($row = $sth->fetch(PDO::FETCH_ASSOC, PDO::FETCH_ORI_NEXT)) {
			$matrix["association"][$i] = $row["association"];
			$matrix["role"][$i] = $row["role"];
			$i ++;;
		}
		return $matrix;

	}
	public function getEventsCount(){
		$sth = $this->connexion->prepare('SELECT count(*) FROM `events`;');
		$sth->execute();
		return $sth->fetch()[0];
	}
	public function getEventInfos($eventID){
		$sth = $this->connexion->prepare('SELECT `t1`.`eventFlyer`, `t1`.`eventName`, `t2`.`placeLeft` FROM `events` as `t1`, (SELECT events.eventTicketMax - (SELECT COUNT(*) FROM `tickets` where `eventID` = :eventID) as `placeLeft`, `eventID` FROM `events`) as `t2` WHERE `t2`.`eventID` = `t1`.`eventID` and `t1`.`eventID` = :eventID');

		$sth->bindParam(':eventID', $eventID);
		$sth->execute();

		return $sth->fetch();
	}
	public function getTicketsSoldCount(){
		$sth = $this->connexion->prepare('SELECT count(*) FROM `tickets`;');
		$sth->execute();
		return $sth->fetch()[0];
	}
	public function isAdmin($login){
		$sth = $this->connexion->prepare('Select CASE WHEN count(*) = "0" THEN "FALSE" ELSE "TRUE" END AS `isAdmin` From `admin` where `login` = :login');
		$sth->bindParam(':login', $login);
		$sth->execute();
		return filter_var($sth->fetch()["isAdmin"], FILTER_VALIDATE_BOOLEAN);
	}
	public function isAssoAdmin($login){
		$sth = $this->connexion->prepare('Select CASE WHEN count(*) = "0" THEN "FALSE" ELSE "TRUE" END AS `isAssoAdmin` From `asso_assoc` where `login` = :login');
		$sth->bindParam(':login', $login);
		$sth->execute();
		return filter_var($sth->fetch()["isAssoAdmin"], FILTER_VALIDATE_BOOLEAN);
	}

}



?>
