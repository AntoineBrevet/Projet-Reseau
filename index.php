<?php
session_start();

$title = 'Accueil';

include('inc/header.php');
include('inscription-connexion.php');

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

      <div class="container">
        <div class="glide">
          <div class="glide__track" data-glide-el="track">
            <ul class="glide__slides">
              <li class="glide__slide img-slides"><img class="img-middle img-middle-left" src="assets/img/connected.svg" alt=""></li>
              <li class="glide__slide img-slides"><img class="img-middle img-middle-center" src="assets/img/data.svg" alt=""></li>
              <li class="glide__slide img-slides"><img class="img-middle img-middle-right" src="assets/img/server.svg" alt=""></li>
              <li class="glide__slide img-slides"><img src="assets/img/data_processing.svg" alt=""></li>
              <li class="glide__slide img-slides"><img src="assets/img/data_trends.svg" alt=""></li>
              <!-- <li class="glide__slide img-slides"><img src="assets/img/test_img_slide.png" alt=""></li> -->
              <!-- <li class="glide__slide img-slides"><img src="assets/img/graph_big_tramesday.png" alt=""></li> -->
              <!-- <li class="glide__slide img-slides"><img src="assets/img/graph_tramesday.png" alt=""></li> -->
              <!-- <li class="glide__slide img-slides"><img src="assets/img/graph_ttlLost.png" alt=""></li> -->
              <!-- <li class="glide__slide img-slides"><img src="assets/img/graph_frames_proto.png" alt=""></li> -->
              <!-- <li class="glide__slide img-slides"><img src="assets/img/graph_frames_ipfrom.png" alt=""></li> -->
              <!-- <li class="glide__slide img-slides"><img src="assets/img/graph_frames_ipdest.png" alt=""></li> -->
              <!-- <li class="glide__slide img-slides"><img src="assets/img/graph_framesday.png" alt=""></li> -->
              <!-- <li class="glide__slide img-slides"><img src="assets/img/graph_statut_global.png" alt=""></li> -->
              <!-- <li class="glide__slide img-slides"><img src="assets/img/wm_enlarge_graph_trames_proto.png" alt=""></li> -->
              <!-- <li class="glide__slide img-slides"><img src="assets/img/graph_ipdest.png" alt=""></li> -->
              <!-- <li class="glide__slide img-slides"><img src="assets/img/graph_ipfrom.png" alt=""></li> -->
            </ul>
          </div>
          <div class="glide__arrows" data-glide-el="controls">
            <button class="glide__arrow glide__arrow--left" data-glide-dir="<">prev</button>
            <button class="glide__arrow glide__arrow--right" data-glide-dir=">">next</button>
          </div>
        </div>
      </div>
      <!-- <div class="img-middle-body">
        
      </div> -->
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
