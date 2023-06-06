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
  <div class="banniere">
    <div class="fond">
      <img src="<?php echo base_url().'/img/banniere_criee.jpg';?>" alt="Bannière">
    </div>
    <div class="presentation">
      <h1>Les Criées de Cornouaille</h1>
      <p>Les Criées de Cornouaille sont un ensemble de sept ports de pêche situés en Bretagne, qui proposent une <strong>large variété de produits frais et de qualité.</strong> 
        Grâce à la mutualisation des services, à la vente à distance et à la cellule commerciale, les Criées de Cornouaille assurent un approvisionnement <strong>régulier 
        et diversifié</strong> pour les professionnels du mareyage.</p>
      <p>Les Criées de Cornouaille sont le <strong>leader</strong> en pêche fraîche en France.</p>
    </div>
  </div>
  <div class="main">
    <div class="produitsDispo">
      <div class="title">
        <h2>Produits :</h2>
        <a href="<?php echo base_url('Criee/produits')?>">Voir plus...</a>
      </div>
      <div class="articles d-flex">
        <?php
          for ($i = 0; $i <= 4; $i++) { 
          $lot = $lots[$i];
        ?>
        <a class="liendiv" href="<?php echo base_url('Criee/achat/' . $lot['numLot']); ?>">
          <div class="article">
            <img src="<?php echo base_url().'/img/poissons/poisson'.$lot['numEspece'].'.jpg';?>" alt="poisson"> 
            <h4><?php echo $nomPoisson = $this->requetes->getNomPoisson($lot['numEspece']); ?></h4>
            <h4><?php echo $lot['prixLot']; ?> €/kg</h4>
            <p class="<?php echo $lot['codeStatut']; ?>"><?php echo $statut = $this->requetes->getStatut($lot['codeStatut']); ?></p>
          </div>
        </a>
        <?php } ?>
      </div>
    </div>
  </div>
</body>
</html>