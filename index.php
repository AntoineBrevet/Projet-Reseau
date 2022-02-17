<?php
session_start();
include('inc/pdo.php');

$title = 'Accueil';

include('inc/header.php');
include('inscription-connexion.php');


// if (isset($_SESSION['prenom'])) {
//   $prenom = ($_SESSION['prenom']);
// }

?>

<main>
  <div class="container-body">
    <div class="top-body">
      <h1 class="body-title">FrameIP un choix évident pour analyser vos réseaux !</h1>
    </div>
    <div class="middle-body">
      <h2 class="title-services">Services</h2>
      <p class="text-services">ESN spécialisée en Infrastructure Réseau & Sécurité Informatique,
        vous accompagne pour augmenter l’efficience de votre réseau,
        par l’optimisation et la sécurisation des échanges.
      </p>


      <div class="img-middle-body">
        <img class="img-middle img-middle-left" src="assets/img/connected.svg" alt="">
        <img class="img-middle img-middle-center" src="assets/img/data.svg" alt="">
        <img class="img-middle img-middle-right" src="assets/img/server.svg" alt="">
      </div>
    </div>

  </div>
  </div>
  <div class="iframe-maps">
    <iframe src="https://maps.google.com/maps?width=100%25&amp;height=600&amp;hl=en&amp;q=30%20Pl.%20Henri%20Gadeau%20de%20Kerville,%2076100%20Rouen+(My%20Business%20Name)&amp;t=p&amp;z=17&amp;ie=UTF8&amp;iwloc=B&amp;output=embed" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
  </div>
</main>
<!-- <div class="bottom-body" id="map"> -->
<!-- <div id="map"></div> -->


<?php
include('inc/footer.php');
