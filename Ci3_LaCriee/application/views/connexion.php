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
  <div class="connexion">
		<h1>Connexion à votre compte</h1>
		<form method="POST" action="<?php echo site_url('Control/login'); ?>" class="formConnexion">
			<div class="form-group">
				<input type="text" class="form-control" name="loginAcheteur" placeholder="Votre identifiant">
			</div>
			<div class="form-group">
				<input type="password" class="form-control" name="passwordAcheteur" placeholder="Votre mot de passe">
			</div>
			<button type="submit" class="BtnConnexion">Se connecter</button>
		</form>
    <p class="sinscrire">Vous n'avez pas encore de compte ? Créez-en un <a href="<?php echo base_url('Criee/inscription'); ?>">ici</a></p>
	</div>
</body>
</html>