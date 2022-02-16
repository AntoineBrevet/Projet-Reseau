<?php
session_start();
include('inc/pdo.php');

$title = 'Nous contacter';

include('inc/header.php');
// include('modal.php'); 
?>



<!-- <div class="wrap-contact">
    <div class="container-contact">
        <div class="content-contact">
            <a href="#"><img class="img-contact" src="assets/img/female_avatar.svg" alt=""></a>
            <div class="work-item-content">
                <h3 class="color">Développeur: Medjahed Safia</h3>
                <p><a href="mailto:safia.medjahed@gmail.com">contact: safia.medjahed@gmail.com</p>
            </div>
        </div>

        <div class="content-contact"><a href="#"><img class="img-contact" src="assets/img/avatar_male.svg" alt=""></a>
            <div class="work-item-content">
                <h3 class="color">Développeur: Leblond Allan</h3>
                <p><a href="mailto:allanstm76@gmail.com">contact: allanstm76@gmail.com</a></p>
            </div>
        </div>

        <div class="content-contact"><a href="#"><img class="img-contact" src="assets/img/avatar_male_purple.svg" alt=""></a>
            <div class="work-item-content">
                <h3 class="color">Développeur: Blin Clément</h3>
                <p><a href="mailto:clement.blin76@gmail.com">contact: clement.blin76@gmail.com</a></p>
            </div>
        </div>
    </div>
</div> -->

<div class="container-contact">

    <div class="box">
        <h1 class="title-contact">Contact us!</h1>
        <div class="text-box top-text">
            If you have any questions, suggestions or other requests feel free to contact us! We are always happy to hear from you!
        </div>
        <div class="text-box bottom-text">
            <a class="linktext" target="_blank" href="mailto:frameip@gmail.com"><i class="fa fa-envelope" aria-hidden="true"></i> E-Mail: frameip@gmail.com</a>
            <a class="linktext" target="_blank" href="https://twitter.com" title="color space twitter"> <i class="fa fa-twitter" aria-hidden="true"></i> Twitter: https://twitter.com</a><br>
        </div>

        <!-- <img src="img/color-scheme-right.svg" alt="color palettes right"> -->

    </div>

</div>

<?php
include('inc/footer.php');
