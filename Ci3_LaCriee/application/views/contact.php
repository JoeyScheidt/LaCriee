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
  <div class="contact">
    <h1>Contactez-nous</h1>
    <p>Remplissez le formulaire ci-dessous pour nous contacter.</p>
  </div>
  <form method="POST" action="envoie-message.php" class="formContact">
    <label for="nom">Nom :</label>
    <input type="text" id="nom" name="nom" required>
      
    <label for="email">Adresse e-mail :</label>
    <input type="email" id="email" name="email" required>
      
    <label for="objet">Objet :</label>
    <input type="text" id="objet" name="objet" required>
      
    <label for="message">Message :</label>
    <textarea id="message" name="message" required></textarea>
      
    <input class="Envoyer" type="submit" value="Envoyer">
  </form>
</body>
</html>