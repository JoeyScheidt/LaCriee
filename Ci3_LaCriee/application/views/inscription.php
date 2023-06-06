<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title></title>
  <link rel="shortcut icon" href="<?php echo base_url().'img/favicon.ico?v=1';?>" type="image/x-icon">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@300;400;500;600;700;800&family=Poppins:wght@200;300;400;500;600;700&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="<?php echo base_url().'/css/style.css';?>">
</head>
<body>
  <div class="inscription">
    <h1>Inscrivez-vous</h1>
    <p>Remplissez le formulaire ci-dessous afin de vous inscrire et ainsi pouvoir enchérir sur notre plateforme.</p>
  </div>
  <form method="POST" action="<?php echo site_url('Control/traitementInscription'); ?>" class="formInsc">
    <label for="nomAcheteur">Nom<red>*</red> :</label>
    <input type="text" id="nomAcheteur" name="nomAcheteur" required>

    <label for="prenomAcheteur">Prénom<red>*</red> :</label>
    <input type="text" id="prenomAcheteur" name="prenomAcheteur" required>
      
    <label for="emailAcheteur">Adresse e-mail<red>*</red> :</label>
    <input type="email" id="emailAcheteur" name="emailAcheteur" required>
      
    <label for="loginAcheteur">Identifiant<red>*</red> :</label>
    <input type="text" id="loginAcheteur" name="loginAcheteur" required>

    <label for="numRueAcheteur">Numéro de rue<red>*</red> :</label>
    <input type="text" id="numRueAcheteur" name="numRueAcheteur" required>

    <label for="rueAcheteur">Rue<red>*</red> :</label>
    <input type="text" id="rueAcheteur" name="rueAcheteur" required>

    <label for="villeAcheteur">Ville<red>*</red> :</label>
    <input type="text" id="villeAcheteur" name="villeAcheteur" required>

    <label for="codePostalAcheteur">Code postal<red>*</red> :</label>
    <input type="text" id="codePostalAcheteur" name="codePostalAcheteur" required>

    <label for="raisonSociale">Raison sociale <gray>(Pour les entreprises)</gray> :</label>
    <input type="text" id="raisonSociale" name="raisonSociale">

    <label for="numHabilitation">N° d'habilitation <gray>(Pour les entreprises)</gray> :</label>
    <input type="text" id="numHabilitation" name=numHabilitation">
      
    </br>

    <label for="passwordAcheteur">Mot de passe<red>*</red> :</label>
    <input type="password" id="passwordAcheteur" name="passwordAcheteur" required>
    <label for="confirmPassword">Confirmation du mot de passe<red>*</red> :</label>
    <input type="password" id="confirmPassword" name="confirmPassword" required>
      
    </br>

    <input class="Envoyer" type="submit" value="S'inscrire">

    </br>
    <p>(<red>*</red>) : Champs obligatoires</p>
  </form>
</body>
</html>