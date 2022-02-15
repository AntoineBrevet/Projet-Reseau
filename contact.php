<?php
session_start();
include('inc/pdo.php');

$title = 'Nous contacter';

include('inc/header.php');
// include('modal.php'); 
?>



<div class="wrap-contact">
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
</div>


<?php
include('inc/footer.php');
