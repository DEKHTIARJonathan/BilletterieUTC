<?php

$root = realpath($_SERVER["DOCUMENT_ROOT"]);

require_once $root.'/class/xmlToArrayParser.class.php';
require_once $root.'/config.inc.php';

class Cas {

	public static function authenticate($ticket,$service) {
		global $_CONFIG;
		$url_validate = $_CONFIG["cas"]["url"]."serviceValidate?service=".$service."&ticket=".$ticket;
		
		$arrContextOptions=array(
			"ssl"=>array(
				"verify_peer"=>false,
				"verify_peer_name"=>false,
			),
		); 
		
		$data = file_get_contents($url_validate, false, stream_context_create($arrContextOptions));
		echo $data;
		if(empty($data)) return -1;

		$parsed = new xmlToArrayParser($data);
		if(isset($parsed->array['cas:serviceResponse']['cas:authenticationSuccess']['cas:user']))
			return $parsed->array['cas:serviceResponse']['cas:authenticationSuccess']['cas:user'];
		else
			return -1;
	}

	public static function getURl() {
		global $_CONFIG;
		return $_CONFIG["cas"]["url"];
	}

}
?>
