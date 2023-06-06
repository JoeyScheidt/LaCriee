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
  <div class="account">
    <h1><?php echo $user['prenomAcheteur']; ?> <?php echo $user['nomAcheteur']; ?>, bienvenue sur votre compte !</h1>
    <p>Retrouvez ci-dessous les informations relatives à votre compte. </br> Vous avez également la possibilité de vous déconnecter en appuyant sur le bouton ci-dessous.</p>
  </div>
  <div class="colonnes">
    <div class="infosGauche">
      <p><strong>Identifiant :</strong> <?php echo $user['loginAcheteur']; ?></p>
      <p><strong>Adresse mail :</strong> <?php echo $user['emailAcheteur']; ?></p>
      <p><strong>Nom :</strong> <?php echo $user['nomAcheteur']; ?></p>
      <p><strong>Prénom :</strong> <?php echo $user['prenomAcheteur']; ?></p>
    </div>
    <div class="infosDroite">
      <p><strong>Adresse :</strong> <?php echo $user['numRueAcheteur']; ?>, <?php echo $user['rueAcheteur']; ?></p>
      <p><strong>Ville :</strong> <?php echo $user['villeAcheteur']; ?></p>
      <p><strong>Code Postal :</strong> <?php echo $user['codePostalAcheteur']; ?></p>
    </div>
  </div>
  <form action="<?php echo site_url('Control/logout'); ?>" method="post">
    <button type="submit" class="logout-button">Déconnexion</button>
  </form>
</body>
</html>