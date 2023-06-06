<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
// La condition ici permet que l'accès au model ne puisse se faire qu'à partir d'un contrôleur
// Il s'agit d'une mesure de sécurité appelée "protection de l'accès direct" ou "protection contre le reniflage"

class Model extends CI_Model
{
  public function __construct()
  {
    parent::__construct();
	  $this->load->database();
  }

  function getUserByLogin($login)
  {
    // Prépare et exécute la requête SQL, le "?" est utilisé comme paramètre de substitution pour être remplacé par $login
    $query = $this->db->query('SELECT * FROM ACHETEUR WHERE loginAcheteur = ?', array($login));

    // Récupère le résultat de la requête
    // "row_array()" permet de récupérer ce résultat sous forme de tableau associatif
    $user = $query->row_array();

    // Vérifie si l'utilisateur a été trouvé
    if ($user)
      return $user;
    else
      return false;
  }

  function getAllProducts()
  {
    $query = $this->db->get('LOT');
    return $query->result_array();
  }

  function getEnchereProducts()
  {
    $query = $this->db->query('SELECT * FROM LOT WHERE codeStatut = "ENC"');
    return $query->result_array();
  }

  function getProduct($numLot)
  {
    $query = $this->db->query('SELECT * FROM LOT WHERE numLot = ?', array($numLot));
    return $query->row_array();
  }

  function getNomPoisson($numEspece)
  {
    $query = $this->db->query('SELECT nomCommunEspece FROM ESPECE WHERE numEspece = ?', array($numEspece));
    $result = $query->row(); // Récupère uniquement la première ligne du résultat
    return $result->nomCommunEspece;
  }

  function getTaille($numType)
  {
    $query = $this->db->query('SELECT specificationTaille FROM TAILLE WHERE numType = ?', array($numType));
    $result = $query->row(); // Récupère uniquement la première ligne du résultat
    return $result->specificationTaille;
  }

  function getQualite($codeQualite)
  {
    $query = $this->db->query('SELECT libelleQualite FROM QUALITE WHERE codeQualite = ?', array($codeQualite));
    $result = $query->row(); // Récupère uniquement la première ligne du résultat
    return $result->libelleQualite;
  }

  function getBac($codeBac)
  {
    $query = $this->db->query('SELECT libelleBac FROM BAC WHERE codeBac = ?', array($codeBac));
    $result = $query->row(); // Récupère uniquement la première ligne du résultat
    return $result->libelleBac;
  }

  function getPresentation($codePresentation)
  {
    $query = $this->db->query('SELECT libellePresentation FROM PRESENTATION WHERE codePresentation = ?', array($codePresentation));
    $result = $query->row(); // Récupère uniquement la première ligne du résultat
    return $result->libellePresentation;
  }

  function getPoidsBac($codeBac)
  {
    $query = $this->db->query('SELECT tareBac FROM BAC WHERE codeBac = ?', array($codeBac));
    $result = $query->row(); // Récupère uniquement la première ligne du résultat
    return $result->tareBac;
  }

  function getStatut($codeStatut)
  {
    $query = $this->db->query('SELECT libelleStatut FROM STATUT WHERE codeStatut = ?', array($codeStatut));
    $result = $query->row(); // Récupère uniquement la première ligne du résultat
    return $result->libelleStatut;
  }

  function setEnchere($acheteurId, $montantEnchere, $numLot)
  {
    // On associe les données avec les variables
    $data = array(
      'numAcheteur' => $acheteurId,
      'numLot' => $numLot,
      'prixEnchere' => $montantEnchere,
      'heureEnchere' => date('Y-m-d H:i:s')
    );
    
    // On insère les données dans la table POSTER pour garder en mémoire l'historique des enchères
    $this->db->insert('POSTER', $data);

    // On enregistre le nouveau prix du lot dans la table LOT
    // On utilise cette fois une procédure stockée
    $sql = "CALL UpdatePrixLot(?, ?)";
    $this->db->query($sql, array($numLot, $montantEnchere));
  }

}
?>