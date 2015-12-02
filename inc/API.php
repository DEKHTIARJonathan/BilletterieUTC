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

	public function getAllEvents(){
		$sth = $this->connexion->prepare('SELECT `t1`.`eventID`, `t1`.`asso`, `t1`.`eventName`, `t1`.`eventDate`, `t1`.`eventFlyer`, `t1`.`eventTicketMax`, `t1`.`location`, `t2`.`placeLeft` FROM `events` as `t1`, (SELECT events.eventTicketMax - (SELECT COUNT(*) FROM `tickets`) as `placeLeft`, `eventID` FROM `events`) as `t2` WHERE `eventDate` >= CURDATE() and `t2`.`eventID` = `t1`.`eventID` order by `eventDate`;');

		$sth->execute();

		$i = 0;

		$matrix;

		while ($row = $sth->fetch(PDO::FETCH_ASSOC, PDO::FETCH_ORI_NEXT)){
			$matrix[$i]["id"] = $row["eventID"];
			$matrix[$i]["name"] = $row["eventName"];
			$matrix[$i]["asso"] = $row["asso"];
			$matrix[$i]["date"] = $row["eventDate"];
			$matrix[$i]["location"] = $row["location"];
			$matrix[$i]["eventFlyer"] = $row["eventFlyer"];
			$matrix[$i]["maxTickets"] = $row["eventTicketMax"];
			$matrix[$i]["ticketsLeft"] = $row["placeLeft"];
			$i += 1;
		}

		return $matrix;
	}

	public function getEventInfos($eventID){
		$sth = $this->connexion->prepare('SELECT `t1`.`eventFlyer`, `t1`.`eventName`, `t2`.`placeLeft` FROM `events` as `t1`, (SELECT events.eventTicketMax - (SELECT COUNT(*) FROM `tickets`) as `placeLeft`, `eventID` FROM `events`) as `t2` WHERE `t2`.`eventID` = `t1`.`eventID` and `t1`.`eventID` = :eventID');

		$sth->bindParam(':eventID', $eventID);
		$sth->execute();

		return $sth->fetch();
	}


	public function getAllTarifsByEvent($eventID){
		$sth = $this->connexion->prepare('SELECT * FROM `tarifs` WHERE `eventID` = :eventID');
		$sth->bindParam(':eventID', $eventID);

		$sth->execute();

		$i = 0;

		$matrix;

		while ($row = $sth->fetch(PDO::FETCH_ASSOC, PDO::FETCH_ORI_NEXT)) {
			$matrix[$i]["tarifID"] = $row["tarifID"];
			$matrix[$i]["eventID"] = $row["eventID"];
			$matrix[$i]["tarifName"] = $row["tarifName"];
			$matrix[$i]["price"] = $row["price"];
			$matrix[$i]["maxByUser"] = $row["maxByUser"];
			$i += 1;
		}

		return $matrix;
	}

}

?>
