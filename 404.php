<?php
session_start();
require('inc/pdo.php');
$title = 'Page not found';
include('inscription-connexion.php');
include('inc/headerall.php');
?>


<div id="error404">
  <img class="error404" src="assets/img/404bis.svg" alt="">
</div>


<?php
include('inc/footer.php');
