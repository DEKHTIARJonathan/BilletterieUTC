<?php
	// Page d'accueil : /index.php
	header("Content-Type: text/html; charset=UTF-8");
	$root = realpath($_SERVER["DOCUMENT_ROOT"]);
	require_once $root.'/config.inc.php';
	require_once $root.'/ginger/ApiException.php';
	require_once $root.'/ginger/KoalaClient.php';
	require_once $root.'/ginger/GingerClient.php';

	class gingerAPI {

		private $ginger = False;

	  public function __construct(){
			global $_CONFIG;
			try {
					$this->ginger = new \Ginger\Client\GingerClient ($_CONFIG['ginger']["key"], $_CONFIG['ginger']["service"], $_CONFIG['debug']);
			}catch ( Exception $e )
			{
					echo "Instanciation Ginger Impossible: <br>", $e->getMessage();
					echo '<meta http-equiv="Refresh" content="5; Url='.$_CONFIG["website"]['home'].'">';
					die();
			}
	  }

		public function findPersonne($inputSTR){
			try{
				$array = 	$this->ginger->findPersonne($inputSTR);
				return $array;
		  }
		  catch(Exception $e){
			  echo False;
		  }
		}

		public function getUser($login){
			try{
				$array = 	$this->ginger->getUser($login);
				return $array;
				/*
				echo $user->login;echo"<br>";
			  echo $user->nom;echo"<br>";
			  echo $user->prenom;echo"<br>";
			  echo $user->mail;echo"<br>";
			  echo $user->type;echo"<br>";
			  echo $user->is_adulte;echo"<br>";
			  echo $user->is_cotisant;echo"<br>";
			  echo $user->badge_uid;echo"<br>";
			  echo $user->expiration_badge;echo"<br>";
				*/
		  }
		  catch(Exception $e){
			  echo False;
		  }
		}
}

?>
