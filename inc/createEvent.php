<?php
	// Page d'accueil : /index.php
	header("Content-Type: text/html; charset=UTF-8");
	$root = realpath($_SERVER["DOCUMENT_ROOT"]);
	require_once $root.'/config.inc.php';
	require_once $root.'/inc/API.php';
	require_once $root.'/inc/checkadmin.php';
	require_once $root.'/inc/functions.php';

	$api = new API();

	$asso = isset($_SESSION['currentAsso']) ? $_SESSION['currentAsso'] : '';

	$eventName = isset($_POST['eventName']) ? ucfirst(mb_strtolower($_POST['eventName'], 'UTF-8')) : '';
	$eventDate = isset($_POST['eventDate']) ? $_POST['eventDate'] : '';
	$eventLocation = isset($_POST['eventLocation']) ? ucfirst(mb_strtolower($_POST['eventLocation'], 'UTF-8')) : '';
	$maxTickets = isset($_POST['maxTickets']) ? $_POST['maxTickets'] : '';

	if ($eventName != '' && $eventDate != '' && $eventLocation != '' && $maxTickets != '' && $asso != ''){

				$target_file = $_CONFIG["website"]['uploadPath'].generateRandomString(20);

				// Check if image file is a actual image or fake image
				$filename = $_FILES['eventFlyer']['name'];
				$ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));

				$target_file = $target_file.".".$ext;

				$uploadOk = 1;

				if(getimagesize($_FILES["eventFlyer"]["tmp_name"]) === false)
					$uploadOk = 0;

				elseif ($_FILES["eventFlyer"]["size"] > 1000000) // Larger than 1Mb
					$uploadOk = 0;

				elseif ($ext != "jpg" && $ext != "png" && $ext != "jpeg" && $ext != "gif" )
					$uploadOk = 0;

				while (file_exists($root."/".$target_file)) {
					$target_file = $_CONFIG['uploadPath'].generateRandomString(20);
					$target_file = $target_file.".".$ext;
				}

				if ($uploadOk)
					if(move_uploaded_file($_FILES["eventFlyer"]["tmp_name"], $root."/".$target_file))
						try{
							if ($api->createEvent($asso, $eventName, $eventDate, $target_file, $maxTickets, $eventLocation))
								header('Location: '.$_CONFIG["website"]['home'].'admin/');
							else
									header('Location: '.$_CONFIG["website"]['home'].'admin/createEvent.php?error=1');
						}
						catch(Exception $e){
							header('Location: '.$_CONFIG["website"]['home'].'admin/createEvent.php?error=2');
						}
					else
						header('Location: '.$_CONFIG["website"]['home'].'admin/createEvent.php?error=3');
				else
					header('Location: '.$_CONFIG["website"]['home'].'admin/createEvent.php?error=4');
	}
	else
		header('Location: '.$_CONFIG["website"]['home'].'admin/createEvent.php?error=5');
?>
