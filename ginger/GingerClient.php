<?php
namespace Ginger\Client;

class GingerClient extends KoalaClient {
  private $key;

  public function __construct($key, $url="https://assos.utc.fr/ginger/v1/", $debug = false){
    $this->url = $url;
    $this->key = $key;
    $this->debug = $debug;
  }

  public function apiCall($endpoint, $params = array(), $method = "GET", $debug = false) {
    // Ajout de la clé aux requêtes et appel du parent
    $params["key"] = $this->key;
    return parent::apiCall($endpoint, $params, $method, $debug);
  }

  /**
   * Récupérer un utilisateur à partir d'un login.
   *
   * @param string $login Login
   * @return object Utilisateur
   */
  public function getUser($login) {
    return $this->apiCall($login, array(), "GET", $this->debug);
  }

  /**
   * Récupérer un utilisateur à partir d'un id de badge
   * (si la clé l'autorise).
   *
   * @param string $badge Identifiant de badge
   * @return object Utilisateur
   */
  public function getCard($badge) {
    return $this->apiCall("badge/$badge", array(), "GET", $this->debug);
  }

  public function findPersonne($loginPart) {
    return $this->apiCall("find/$loginPart", array(), "GET", $this->debug);
  }

  public function getCotisations($login) {
    return $this->apiCall("$login/cotisations", array(), "GET", $this->debug);
  }

  public function addCotisation($login, $debut, $fin, $montant){
    $params = array(
      "debut" => $debut,
      "fin" => $fin,
      "montant" => $montant,
    );
    return $this->apiCall("$login/cotisations", $params, "POST", $this->debug);
  }

  /**
   * Récupérer l'historique des cotisations par semestre
   * (nécessite une clé avec le droit cotisation).
   *
   * @return array Stats (semestre => nombre de cotisations)
   */
  public function getStats() {
    return $this->apiCall("stats");
  }

  public function setPersonne($login, $nom, $prenom, $mail, $is_adulte){
    $params = array(
      "nom" => $nom,
      "prenom" => $prenom,
      "mail" => $mail,
      "is_adulte" => $is_adulte ? "true" : "false"
    );
    return $this->apiCall("$login/edit", $params, "POST", $this->debug);
  }
}
