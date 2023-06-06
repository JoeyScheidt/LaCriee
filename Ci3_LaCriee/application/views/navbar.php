<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>La Criée</title>
  <link rel="shortcut icon" href="<?php echo base_url().'img/favicon.ico?v=1';?>" type="image/x-icon">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@300;400;500;600;700;800&family=Poppins:wght@200;300;400;500;600;700&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="<?php echo base_url().'/css/style.css';?>">
</head>
<body>
  <header class="header">
    <div class="container d-flex">
      <div class="left">
        <a href="<?php echo base_url('Criee/index')?>"><img class="logo" src="<?php echo base_url().'/img/logo.png'?>" alt="Logo"></a>
      </div>
      <nav class="navbar">
        <ul class="menu list-unstyled">
          <li><a href="<?php echo base_url('Criee/index')?>">Accueil</a></li>
          <li><a href="<?php echo base_url('Criee/encheresEC')?>">Enchères en cours</a></li>
          <li><a href="<?php echo base_url('Criee/produits')?>">Tous les Produits</a></li>
          <li><a href="<?php echo base_url('Criee/contact')?>">Contact</a></li>
          <li><a href="<?php echo base_url('Criee/connexion')?>">Se connecter</a></li>
        </ul>
      </nav>
      <div class="right">
        <ul>
          <li><a href="<?php echo base_url('Criee/account')?>"><i class="material-icons" id="btnAccount">&#xe853;</i></a></li>
          <li><a href="<?php echo base_url('Criee/context')?>"><i class="material-icons" id="btnHelp">&#xe8fd;</i></a></li>
        </ul>
      </div>
    </div>
  </header>
</body>
</html>