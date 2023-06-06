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
  <div class="hide"></div>
  <div class="boutique">
    <div class="espace-trier"></div>
    <div class="trier">
      <div class="informationPage">
        <h4>Liste de l'ensemble des produits.</h4>
        <p>Qu'ils soient actuellement aux enchères, en attente ou même déjà vendus, ils sont consultables ici.</p>
      </div>
      <div class="triage">
        <h4></h4>
        <ul class="trierpar list-unstyled">
          <li class="tri"></li>
          <li class="tri"></li>
          <li class="tri"></li>
          <li class="tri"></li>
        </ul>
      </div>
      <div class="filtrer">
        <h4></h4>
        <ul class="filtres list-unstyled">
          <li class="filtre"></li>
          <li class="filtre"></li>
          <li class="filtre"></li>
          <li class="filtre"></li>
        </ul>
      </div>
    </div>
    <div class="produits">
      <?php
      foreach ($lots as $lot) { ?>
      <a class="liendiv" href="<?php echo base_url('Criee/achat/' . $lot['numLot']); ?>">
      <div class="produit">
        <!-- Afficher les informations du lot -->
        <img src="<?php echo base_url().'/img/poissons/poisson'.$lot['numEspece'].'.jpg';?>" alt="poisson">
        <div class="produit-infos">
          <div class="infos-gauche">
            <h4 class="produit-num">Lot : <?php echo $lot['numLot']; ?></h4>
            <!-- Afficher les autres informations du lot -->
            <h3 class="produit-nom"><?php echo $nomPoisson = $this->requetes->getNomPoisson($lot['numEspece']); ?></h3>
            <h4 class="produit-taille">Taille : <?php echo $taille = $this->requetes->getTaille($lot['numType']); ?></h4>
            <div class="details">
              <p class="produit-poids">Poids Brut : <?php echo $lot['poidsBrutLot']; ?> kg</p>
              <p class="produit-bateau">Bateau : <?php echo $lot['idBateau']; ?></p>
            </div>
          </div>
          <div class="infos-droite">
            <h3 class="produit-prix"><?php echo $lot['prixLot']; ?> €/kg</h3>
            <h3 class="produit-statut <?php echo $lot['codeStatut']; ?>"><?php echo $statut = $this->requetes->getStatut($lot['codeStatut']); ?></h3>
          </div>
        </div>
      </div>
      </a>
      <?php } ?>
    </div>
  </div>
</body>
</html>