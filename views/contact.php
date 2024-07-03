<?php

require "./components/hero.php";

date_default_timezone_set('Europe/Paris'); // Assurez-vous que le fuseau horaire est correct

// Obtenez le jour de la semaine et l'heure actuelle
$dayOfWeek = date('N'); // 1 (pour lundi) à 7 (pour dimanche)
$currentTime = date('H:i');

// Définit les plages horaires pour chaque jour
$workingHours = [
    1 => [['08:30', '12:00'], ['14:00', '17:00']], // Lundi
    2 => [['08:30', '12:00'], ['14:00', '17:00']], // Mardi
    3 => [['08:30', '12:00']],                    // Mercredi
    4 => [['08:30', '12:00']],                    // Jeudi
    5 => [['08:30', '12:00'], ['14:00', '17:00']], // Vendredi
];

$openHours = [
    1 => [['08:30', '13:00']], // Lundi
    2 => [['08:30', '13:00']], // Mardi
    3 => [['08:30', '13:00']], // Mercredi
    4 => [['08:30', '13:00']], // Jeudi
    5 => [['08:30', '13:00']], // Vendredi
];

// Fonction pour vérifier si l'heure actuelle est dans une plage horaire donnée
function isWithinTimeRange($currentTime, $timeRange) {
    list($startTime, $endTime) = $timeRange;
    return ($currentTime >= $startTime && $currentTime <= $endTime);
}

// Vérifie si l'heure actuelle est dans une des plages horaires du jour actuel
function isAvailable($dayOfWeek, $currentTime, $hours) {
    if (isset($hours[$dayOfWeek])) {
        foreach ($hours[$dayOfWeek] as $timeRange) {
            if (isWithinTimeRange($currentTime, $timeRange)) {
                return true;
            }
        }
    }
    return false;
}
?>


<section class="contact padding margin-first">
    <h2>Contact</h2>
    <div class="contact-container max-width section-container">
        <div class="contact-top">

            <div class="contact-top-left">
                <div class="contact-adress">
                    <h3>Adresses</h3>
                    <h4>Consultations au cabinet</h4>
                    <p>15, Rue Lombard</p>
                    <p>1205 Genève</p>
                    <h4>PMA (Procréation médicalement assistée)</h4>
                    <p>BabyImpulse - Clinique des Grangettes</p>
                    <p>Chemin des Grangettes 7</p>
                    <p>1224 Chêne Bougeries</p>
                </div>
                <div class="contact-coords">
                    <h3>Coordonnées du cabinet</h3>
                    <a href="tel:0223478646" class="underline-link">022 347 86 46</a></br>
                    <a href="mailto:cabinet.lombard@hin.ch" class="underline-link">cabinet.lombard@hin.ch</a>
                </div>
            </div>
            
            <div class="contact-top-right">
                <div class="phone-schedule">
                    <h3>Horaires téléphoniques</h3>
                    <h4>Lundi - Mardi - Vendredi</h4>
                    <p>8h30 - 12h / 14h - 17h</p>
                    <h4>Mercredi - Jeudi</h4>
                    <p>8h30 - 12h</p>
                    <?php
                    // Affiche "Joignable" ou "Injoignable" en fonction de la disponibilité
                    if (isAvailable($dayOfWeek, $currentTime, $workingHours)) {
                        echo "<p class=\"contact-active\">Joignable</p>";
                    } else {
                        echo "<p class=\"contact-inactive\">Injoignable</p>";
                    }
                    ?>
                </div>
                <div class="consult-schedule">
                    <h3>Horaires de consultation</h3>
                    <h4>Lundi au Vendredi</h4>
                    <p>8h30 - 13h</p>
                    <?php
                    // Affiche "Joignable" ou "Injoignable" en fonction de la disponibilité
                    if (isAvailable($dayOfWeek, $currentTime, $openHours)) {
                        echo "<p class=\"contact-active\">Ouvert</p>";
                    } else {
                        echo "<p class=\"contact-inactive\">Fermé</p>";
                    }
                    ?>
                </div>
            </div>

        </div>
    </div>
</section>

<section class="form">
    <h2>Formulaire de contact</h3>
    <div class="form-container max-width section-container">
        <form action="contact.php" method="post">
            <div class="form-group">
                <label for="name">Nom</label>
                <input type="text" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required>
            </div>
</section>