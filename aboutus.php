<?php
session_start();
$title = 'Qui sommes nous ?';
include('inscription-connexion.php');
include('inc/header.php');
?>
<div class="aboutus">

  <h1 class="text about-title">Qui sommes nous ?</h1>
  <h3 class="text about-para">Une équipe à l'écoute des besoins de votre entreprise, Des techniciens formés pour vous accompagner et vous conseiller. Notre technicien se rend dans votre entreprise et procède à l'analyse de votre réseau. Vous pouvez ensuite accéder à vos analyses sous formes de graphiques en vous connectant directement sur notre site. Qu'attendez-vous ? Inscrivez-vous maintenant et restez à jour sur vos analyses !</h3>

  <div class="container">
    <div class="glide">
      <div class="glide__track" data-glide-el="track">
        <ul class="glide__slides">
          <li class="glide__slide img-slides"><img src="assets/img/td_proto.png" alt=""></li>
          <li class="glide__slide img-slides"><img src="assets/img/logs_top.png" alt=""></li>
          <li class="glide__slide img-slides"><img src="assets/img/round-graph.png" alt=""></li>
          <li class="glide__slide img-slides"><img src="assets/img/test_photo.png" alt=""></li>
        </ul>
      </div>
      <div class="glide__arrows" data-glide-el="controls">
        <button class="glide__arrow glide__arrow--left" data-glide-dir="<">prec</button>
        <button class="glide__arrow glide__arrow--right" data-glide-dir=">">suiv</button>
      </div>
    </div>
  </div>
</div>

<?php

include('inc/footerSlider.php');
?>