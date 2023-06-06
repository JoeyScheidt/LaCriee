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
    <h3 class="warning">Vous ne pouvez pas vous inscrire, vous êtes déjà connecté en tant que <?php echo $user['prenomAcheteur']; ?> <?php echo $user['nomAcheteur']; ?>.</h3>
  </div>
  <form method="POST" action="" class="formInsc">
    <label for="nomAcheteur">Nom :</label>
    <input type="text" id="nomAcheteur" name="nomAcheteur" required disabled>

    <label for="prenomAcheteur">Prénom :</label>
    <input type="text" id="prenomAcheteur" name="prenomAcheteur" required disabled>
      
    <label for="emailAcheteur">Adresse e-mail :</label>
    <input type="email" id="emailAcheteur" name="emailAcheteur" required disabled>
      
    <label for="loginAcheteur">Identifiant :</label>
    <input type="text" id="loginAcheteur" name="loginAcheteur" required disabled>

    <label for="numRueAcheteur">Numéro de rue :</label>
    <input type="text" id="numRueAcheteur" name="numRueAcheteur" required disabled>

    <label for="rueAcheteur">Rue :</label>
    <input type="text" id="rueAcheteur" name="rueAcheteur" required disabled>

    <label for="villeAcheteur">Ville :</label>
    <input type="text" id="villeAcheteur" name="villeAcheteur" required disabled>

    <label for="codePostalAcheteur">Code postal :</label>
    <input type="text" id="codePostalAcheteur" name="codePostalAcheteur" required disabled>

    <label for="raisonSociale">Raison sociale <gray>(Pour les entreprises)</gray> :</label>
    <input type="text" id="raisonSociale" name="raisonSociale" disabled>

    <label for="numHabilitation">N° d'habilitation <gray>(Pour les entreprises)</gray> :</label>
    <input type="text" id="numHabilitation" name=numHabilitation" disabled>
      
    </br>

    <label for="passwordAcheteur">Mot de passe :</label>
    <input type="password" id="passwordAcheteur" name="passwordAcheteur" required disabled>
    <label for="confirmPassword">Confirmation du mot de passe :</label>
    <input type="password" id="confirmPassword" name="confirmPassword" required disabled>
      
    </br>

    <input class="Envoyer" type="submit" value="S'inscrire" disabled>

    </br>
  </form>
</body>
</html>