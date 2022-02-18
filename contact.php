<?php
session_start();
include('inc/pdo.php');
$title = 'Nous contacter';
include('inscription-connexion.php');


include('inc/header.php');
// include('modal.php'); 
?>


<div class="container-contact">

    <div class="box">
        <h1 class="title-contact">Contactez nous!</h1>
        <div class="text-box top-text">
            <!-- Pour toutes questions, suggestions ou autres requêtes n'hésitez pas à nous contacter. Nous sommes toujours content  -->
            Si vous avez des questions, des suggestions ou d'autres demandes, n'hésitez pas à nous contacter ! Nous sommes toujours heureux d'avoir de vos nouvelles !
            <!-- If you have any questions, suggestions or other requests feel free to contact us! We are always happy to hear from you! -->
        </div>
        <div class="text-box bottom-text">
            <a class="linktext" target="_blank" href="mailto:frameipassistance@gmail.com"><i class="fa fa-envelope" aria-hidden="true"></i> E-Mail: frameipassistance@gmail.com</a>
            <a class="linktext" target="_blank" href="https://twitter.com" title="color space twitter"> <i class="fa fa-twitter" aria-hidden="true"></i> Twitter: https://twitter.com</a><br>
        </div>

    </div>

</div>

<?php
include('inc/footer.php');
