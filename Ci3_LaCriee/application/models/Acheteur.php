<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Acheteur extends CI_Model
{
  public $nomAcheteur;
  public $prenomAcheteur;
  public $emailAcheteur;
  public $loginAcheteur;
  public $numRueAcheteur;
  public $rueAcheteur;
  public $villeAcheteur;
  public $codePostalAcheteur;
  public $passwordAcheteur;

  public function __construct()
  {
    parent::__construct();
  }

  public function save($data) {
    $this->db->insert('acheteur', $data);
    return $this->db->insert_id();
  }
}
?>