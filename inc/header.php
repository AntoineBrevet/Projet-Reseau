<?php

// $connected = false;
// if (!empty($_SESSION['connected'])) {
//   $connected = true;
// }
// var_dump($_SESSION['connected']);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <!-- <meta name="viewport" content="width=device-width, initial-scale=1.0"> -->
  <meta name="viewport" content="initial-scale=1, maximum-scale=1">
  <!-- =================================== ICO =================================== -->
  <link rel="apple-touch-icon" sizes="180x180" href="assets/ico/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="assets/ico/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="assets/ico/favicon-16x16.png">
  <link rel="manifest" href="assets/ico/site.webmanifest">

  <!-- =================================== FONT =================================== -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Cabin:wght@400;500;600;700&display=swap" rel="stylesheet">

  <!-- =================================== ICONS =================================== -->
  <script src="https://kit.fontawesome.com/ceee3d5b7f.js" crossorigin="anonymous"></script>

  <!-- =================================== MAP =================================== -->
  <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>

  <!-- =================================== IMPORT CSS =================================== -->
  <link rel="stylesheet" type="text/css" href="assets/css/glide.core.min.css">
  <link rel="stylesheet" type="text/css" href="assets/css/glide.theme.min.css">


  <!-- =================================== BOOTSTRAP =================================== -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <!-- =================================== CSS =================================== -->
  <!-- <link rel="stylesheet" href="assets/css/mdp-change.css"> -->
  <link rel="stylesheet" href="assets/css/normalize-preloader.css">
  <link rel="stylesheet" href="assets/css/preloader.css">
  <link rel="stylesheet" href="assets/css/chart.css">
  <link rel="stylesheet" href="assets/css/mdp-change.css">
  <link rel="stylesheet" href="assets/css/inscription.css">
  <link rel="stylesheet" href="assets/css/mdp-reset.css">
  <link rel="stylesheet" href="assets/css/style.css">

  <title>FrameIP | <?php echo $title; ?></title>
</head>

<body id="body">
  <div id="loader-wrapper">
    <div id="loader"></div>

    <div class="loader-section section-left"></div>
    <div class="loader-section section-right"></div>

  </div>
  <div id="content">
    <header>
      <div class="header-container">
        <div class="header-left">
          <a href="index.php">
            <img class="img-header" src="assets/img/logo.png" alt="">
          </a>
        </div>
        <div class="header-right">
          <!-- <?php
          if (isset($_SESSION['connected'])) { ?>
            <p class="hello">Bonjour <?php echo ucfirst($_SESSION['name']) ?></p>
          <?php } ?> -->
          <i class="far fa-user-circle" id="test"></i>
        </div>
        <!-- Connect?? -->
        <?php
        if (isset($_SESSION['connected'])) { ?>
          <div id="hide" class="menu">
            <h3 class="title-menu">Mon profil</h3>
            <ul class="ul">
              <li class="li"><a class="a fancy" href="chart.php">Mon espace</a></li>
              <li class="li"><a class="a fancy" href="aboutus.php">Qui sommes nous ?</a></li>
              <li class="li"><a class="a fancy" href="contact.php">Contact</a></li>
              <li class="li"><a class="a fancy" href="deconnexion.php">D??connexion</a></li>
            </ul>
          </div>

        <?php } else { ?>
          <!-- Pas Connect?? -->
          <div id="hide" class="menu">
            <h3 class="title-menu">Bienvenue</h3>
            <ul class="ul">
              <li class="li"><a class="a fancy" data-toggle="modal" data-target="#myModal" href="">Inscription/Connexion</a></li>
              <li class="li"><a class="a fancy" href="aboutus.php">Qui sommes nous ?</a></li>
              <li class="li"><a class="a fancy" href="contact.php">Contact</a></li>
            </ul>
          </div>
      </div>
    <?php } ?>
  </div>
  <!-- </div> -->
  </header>