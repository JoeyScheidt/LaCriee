<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Control extends CI_Controller
{
  public function encherir()
  {
    $this->load->model('Model', 'requetes');
    $this->load->helper('form');
    $this->load->library('session');

    // On vérifie d'abord que l'utilisateur est toujours connecté
    if ($this->session->userdata('user')) {
      // Récupérer les données de l'enchère depuis le formulaire
      $montantEnchere = $this->input->post('montant_enchere');
      $numLot = $this->input->post('num_lot');

      // Récupérer le numéro de l'acheteur concerné
      $acheteurId = $this->session->userdata('user')['numAcheteur'];

      // Récupérer le lot concerné
      $lot = $this->requetes->getProduct($numLot);

      // Vérification de l'enchère
      if ($montantEnchere > $lot['prixLot']) {
        // Si correcte on enregistre l'enchère et met à jour le prix
        $this->requetes->setEnchere($acheteurId, $montantEnchere, $numLot);
        // Actualisation de la page
        redirect('Criee/achat/' . $numLot);
      }
      else {
        // Sinon on actualise simplement la page affichant un message d'erreur
        $this->session->set_flashdata('error', "/!\ Le montant que vous avez saisi est trop bas");
        redirect('Criee/achat/' . $numLot);
      }
    }
    else {
      redirect('Criee/index');
    }

    
  }

  public function login()
  {
    $this->load->model('Model', 'requetes');
    $this->load->helper('form');
    $this->load->library('form_validation');
    $this->load->library('session');

    // Définition des règles de validation du formulaire de login
    $this->form_validation->set_rules('loginAcheteur', 'Login', 'required');
    $this->form_validation->set_rules('passwordAcheteur', 'Password', 'required');

    if ($this->form_validation->run() == FALSE) {
        // Le formulaire n'a pas été validé, affichage de la page de login
        $this->load->view('navbar');
        $this->load->view('connexion');
        $this->load->view('footer');
    } else {
        // Le formulaire a été validé, récupération des données et vérification du login/password
        $login = $this->input->post('loginAcheteur');
        $password = $this->input->post('passwordAcheteur');

        // Récupération de l'utilisateur correspondant au login
        $user = $this->requetes->getUserByLogin($login);

        // Vérification si l'utilisateur a été trouvé et si le mot de passe est correct
        if ($user && password_verify($password, $user['passwordAcheteur'])) {
          // Connexion réussie, création de la session utilisateur et redirection vers la page "account"
          $this->session->set_userdata('user', $user);
          redirect('Criee/account');
        } else {
          // Connexion échouée, affichage de la page de login avec un message d'erreur
          $data['error'] = 'Login ou mot de passe incorrect';
          $this->load->view('navbar');
          $this->load->view('connexion', $data);
          $this->load->view('footer');
        }
    }
  }

  public function logout()
  {
    $this->load->library('session');
    // Supprimer les données de session de l'utilisateur connecté
    $this->session->unset_userdata('user');
    // Redirection
    redirect('Criee/index');
  }
  
  public function traitementInscription()
  {
    // On charge les éléments nécessaires
    $this->load->model('Acheteur');

    // Vérification des champs obligatoires
    if (!isset($_POST['nomAcheteur']) || !isset($_POST['prenomAcheteur']) || !isset($_POST['emailAcheteur']) || !isset($_POST['loginAcheteur']) || !isset($_POST['numRueAcheteur']) || !isset($_POST['rueAcheteur']) || !isset($_POST['villeAcheteur']) || !isset($_POST['codePostalAcheteur']) || !isset($_POST['passwordAcheteur']) || !isset($_POST['confirmPassword'])) {
      // Si l'un des champs est manquant, on redirige vers la page d'inscription
      redirect('Criee/inscription');
      exit();
    }

    // Récupération des données du formulaire
    $nomAcheteur = $_POST['nomAcheteur'];
    $prenomAcheteur = $_POST['prenomAcheteur'];
    $emailAcheteur = $_POST['emailAcheteur'];
    $loginAcheteur = $_POST['loginAcheteur'];
    $numRueAcheteur = $_POST['numRueAcheteur'];
    $rueAcheteur = $_POST['rueAcheteur'];
    $villeAcheteur = $_POST['villeAcheteur'];
    $codePostalAcheteur = $_POST['codePostalAcheteur'];
    $passwordAcheteur = $_POST['passwordAcheteur'];
    $confirmation = $_POST['confirmPassword'];

    // Vérification de la correspondance entre les deux mots de passe
    if ($passwordAcheteur !== $confirmation) {
      // Si les mots de passe ne correspondent pas, on redirige vers la page d'inscription avec un message d'erreur
      redirect('Criee/inscription');
      exit();
    }

    // Création du nouveau compte acheteur
    $acheteur = new Acheteur();
    $acheteur->nomAcheteur = $nomAcheteur;
    $acheteur->prenomAcheteur = $prenomAcheteur;
    $acheteur->emailAcheteur = $emailAcheteur;
    $acheteur->loginAcheteur = $loginAcheteur;
    $acheteur->numRueAcheteur = $numRueAcheteur;
    $acheteur->rueAcheteur = $rueAcheteur;
    $acheteur->villeAcheteur = $villeAcheteur;
    $acheteur->codePostalAcheteur = $codePostalAcheteur;
    $acheteur->roleAcheteur = 'user';
    $acheteur->passwordAcheteur = password_hash($passwordAcheteur, PASSWORD_DEFAULT); // On stocke le mot de passe hashé
    $this->Acheteur->save($acheteur); // Sauvegarde du nouveau compte dans la base de données

    // Redirection vers la page de connexion avec un message de succès
    redirect('Criee/connexion');
    exit();
    //?error=missing_fields
    //?error=password_mismatch
    //?success=inscription
  }
}
?>