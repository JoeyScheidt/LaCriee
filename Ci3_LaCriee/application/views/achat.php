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
  <div class="achat">
    <div class="lot">
      <img class="imageLot" src="<?php echo base_url().'/img/poissons/poisson'.$lot['numEspece'].'.jpg';?>" alt="poisson">
      <div class="descriptionLot">
        <h3 class="numLot">Lot : <?php echo $numLot = $lot['numLot']; ?></h3>
        <!-- Afficher les autres informations du lot -->
        <h1 class="nomLot"><?php echo $nomPoisson = $this->requetes->getNomPoisson($lot['numEspece']); ?></h1>
        <div class="details">
          <div class="detailshaut">
            <h4 class="tailleLot">Taille : <?php echo $taille = $this->requetes->getTaille($lot['numType']); ?></h4>
            <h4 class="poidsLot">Poids Brut : <?php echo $lot['poidsBrutLot']; ?> kg</h4>
            <h4 class="qualiteLot">Qualité : <?php echo $lot['codeQualite']; ?>, <?php echo $qualite = $this->requetes->getQualite($lot['codeQualite']); ?></h4>
            <h4 class="presentationLot">Présentation : <?php echo $presentation = $this->requetes->getPresentation($lot['codePresentation']); ?></h4>
          </div>
          <div class="detailsmid">
            <p class="bateauPecheLot">Pêché le <?php echo $lot['datePeche']; ?> par le bateau identifié "<?php echo $lot['idBateau']; ?>".</p>
            <p class="bacPoidsLot">Un bac de <u>type <?php echo $lot['codeBac']; ?></u> (<?php echo $bac = $this->requetes->getBac($lot['codeBac']); ?>) pesant <?php echo $poidsBac = $this->requetes->getPoidsBac($lot['codeBac']); ?>kg est utilisé.</p>
          </div>
          <div class="detailsbas">
            <p class="poidsNetLot"><strong>Le poids net du lot est de <u><?php echo $poidsNetLot = ($lot['poidsBrutLot']-$poidsBac); ?>kg</u></strong>, la tare du bac <?php echo $lot['codeBac'] ?> étant de <?php echo $poidsBac ?>kg.</p>
          </div>
        </div>
      </div>
    </div>
    <div class="encheres">
      <div class="panneauPrix">
        <h1 class="prixlot"><?php echo $lot['prixLot']; ?> €/kg</h1>
        <h2 class="statutLot <?php echo $lot['codeStatut']; ?>"><?php echo $statut = $this->requetes->getStatut($lot['codeStatut']); ?></h2>
      </div>
      <div class="panneauEnchere">
        <div class="enchereGauche">
          <h3 class="prixTotalLot">Prix Total : <?php echo $prixTotalLot = (($lot['prixLot'])*$poidsNetLot)?> €</h3>
          <h3 class="prixDepartLot">Prix de Départ : <?php echo $lot['prixDepart']?> €/kg</h3>
          <h3 class="prixPlancherLot">Prix Plancher : <?php echo $lot['prixPlancher']?> €/kg</h3>
        </div>
        <div class="enchereDroite">
          <?php if ($this->session->userdata('user')) { ?>
            <?php if ($lot['codeStatut'] === 'ENC') { ?>
              <!-- Formulaire d'enchère -->
              <form class="formEnchere" method="POST" action="<?php echo site_url('Control/encherir'); ?>">
                <!-- Champ d'enchère -->
                <input type="number" name="montant_enchere" step="any" required>
                <input type="hidden" name="num_lot" value="<?php echo $numLot; ?>">
                <button type="submit">Enchérir</button>
              </form>
              <h4>L'enchère se fait sur le prix au kilogramme* </br><u><?php echo $this->session->flashdata('error'); ?></u></h4>
            <?php } else { ?>
              <!-- Formulaire d'enchère INDISPONIBLE-->
              <form class="formEnchere" action="">
                <input type="number" name="montant_enchere" disabled>
                <button type="submit" disabled>Enchérir</button>
              </form>
              <h4>L'enchère n'est plus ou n'est pas encore disponible.</h4>
            <?php } ?>
          <?php } else { ?>
            <p>Veuillez vous connecter pour pouvoir enchérir. </br><a href="<?php echo base_url('Criee/connexion')?>">Se connecter...</a></p>
          <?php } ?>
        </div>
      </div>
    </div>
  </div>
</body>
</html>