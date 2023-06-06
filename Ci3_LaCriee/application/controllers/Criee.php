<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Criee extends CI_Controller
{
	public function __construct()
	{
		parent::__construct(); //Appel du constructeur de la classe mère CI_Controller
		$this->load->database();
		$this->load->helper('url_helper'); //Charge les fonctions de base pour gérer les URL
		$this->load->model('model','requetes'); //Charge le modèle qui échange avec la BDD
    $this->load->library('session'); //Charge la bibliothèque permettant l'utilsiation de sessions
	}

	public function index()
	{
    // Récupérer les produits depuis la base de données
    $lots = $this->requetes->getAllProducts();
    // Passer les produits à la vue
    $data['lots'] = $lots;

		$this->load->view('navbar');
		$this->load->view('accueil', $data);
		$this->load->view('footer');
	}

	public function produits()
	{
    // Récupérer les produits depuis la base de données
    $lots = $this->requetes->getAllProducts();
    // Passer les produits à la vue
    $data['lots'] = $lots;

    // Charger la vue qui affiche les produits
		$this->load->view('navbar');
    $this->load->view('produits', $data);
    $this->load->view('footer');
	}

  public function achat($numLot)
	{
    // Charger les informations du lot depuis la base de données en utilisant le numéro de lot
    $lot = $this->requetes->getProduct($numLot);

    // Passer les informations du lot à la vue
    $data['lot'] = $lot;

		$this->load->view('navbar');
    $this->load->view('achat', $data);
    $this->load->view('footer');
	}

  public function encheresEC()
	{
    // Récupérer les produits depuis la base de données
    $products = $this->requetes->getEnchereProducts();
    // Passer les produits à la vue
    $data['products'] = $products;

    // Charger la vue qui affiche les produits*/
		$this->load->view('navbar');
    $this->load->view('encheresEC', $data);
    $this->load->view('footer');
	}

  public function contact()
	{
		$this->load->view('navbar');
    $this->load->view('contact');
    $this->load->view('footer');
	}

  public function mentionsLegales()
	{
		$this->load->view('navbar');
    $this->load->view('mentionsLegales');
    $this->load->view('footer');
	}

  public function context()
	{
		$this->load->view('navbar');
    $this->load->view('context');
    $this->load->view('footer');
	}

  public function connexion()
	{
		$this->load->view('navbar');
    $this->load->view('connexion');
    $this->load->view('footer');
	}

  public function inscription()
  {
    $this->load->library('session');
    // Vérifier si l'utilisateur est connecté
    if ($this->session->userdata('user')) {
      // Utilisateur connecté, récupérer les informations de l'utilisateur et empêcher l'accès à l'inscription
      $user = $this->session->userdata('user');
      $data['user'] = $user;
      $this->load->view('navbar');
      $this->load->view('logged_in', $data);
      $this->load->view('footer');
    } else {
      // Utilisateur non connecté, autorisation de l'inscription
      $this->load->view('navbar');
      $this->load->view('inscription');
      $this->load->view('footer');
    }
  }

  public function account()
  {
    $this->load->library('session');
    // Vérifier si l'utilisateur est connecté
    if ($this->session->userdata('user')) {
      // Utilisateur connecté, récupérer les informations de l'utilisateur
      $user = $this->session->userdata('user');

      // Charger "account" en transmettant les informations de l'utilisateur
      $data['user'] = $user;
      $this->load->view('navbar');
      $this->load->view('account', $data);
      $this->load->view('footer');
    } else {
      // Utilisateur non connecté, affichage d'un message proposant une redirection vers la page de connexion
      $data['message'] = 'Vous n\'êtes pas connecté. Veuillez vous connecter pour accéder à votre compte.';
      $this->load->view('navbar');
      $this->load->view('not_logged_in', $data);
      $this->load->view('footer');
    }
  }
}