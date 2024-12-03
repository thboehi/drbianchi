<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$configFile = './settings.json';
$config = json_decode(file_get_contents($configFile), true);
$vacances = $config['vacances'];

$mailSent = false;
$errorMessage = "";

require "./components/hero.php";

date_default_timezone_set('Europe/Paris'); // Assurez-vous que le fuseau horaire est correct

// Obtenez le jour de la semaine et l'heure actuelle
$dayOfWeek = date('N'); // 1 (pour lundi) à 7 (pour dimanche)
$currentTime = date('H:i');

// Définit les plages horaires pour chaque jour
$workingHours = [
    1 => [['08:30', '12:00'], ['14:00', '17:00']], // Lundi
    2 => [['08:30', '12:00'], ['14:00', '17:00']], // Mardi
    3 => [['08:30', '12:00']],                     // Mercredi
    4 => [['08:30', '12:00']],                     // Jeudi
    5 => [['08:30', '12:00'], ['14:00', '17:00']], // Vendredi
];

$openHours = [
    1 => [['08:30', '13:00'], ['14:00', '18:00']], // Lundi
    2 => [['08:30', '13:00'], ['14:00', '18:00']], // Mardi
    3 => [['08:30', '14:00']], // Mercredi
    4 => [['08:30', '13:00']], // Jeudi
    5 => [['08:30', '13:00'], ['14:00', '18:00']], // Vendredi
];

// Fonction pour vérifier si l'heure actuelle est dans une plage horaire donnée
function isWithinTimeRange($currentTime, $timeRange) {
    global $vacances;
    if ($vacances) {
        return false;
    } else {
        list($startTime, $endTime) = $timeRange;
        return ($currentTime >= $startTime && $currentTime <= $endTime);
    }
    
}

// Vérifie si l'heure actuelle est dans une des plages horaires du jour actuel
function isAvailable($dayOfWeek, $currentTime, $hours) {
    global $vacances;
    if ($vacances) {
        return false;
    } else {
        if (isset($hours[$dayOfWeek])) {
            foreach ($hours[$dayOfWeek] as $timeRange) {
                if (isWithinTimeRange($currentTime, $timeRange)) {
                    return true;
                }
            }
        }
    }
    
    return false;
}

//Check si la méthode est poste, si oui, récupérer tous les champs
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $message = $_POST["message"];

    //Check si l'email est valide
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        //Check si le message fait au moins 10 caractères
        if (strlen($message) >= 10){
            // Envoi de l'email
            $to = "bianchitest@thbo.ch";
            $subject = "Nouveau message de $name";
            $body = "Nom: $name\nEmail: $email\nTéléphone: $phone\nMessage:\n$message";
            $headers = "From: $email";

            // Retirer le commentaire à la ligne suivante pour activer la fonction d'envoi de mail 
            // mail($to, $subject, $body, $headers);
            $mailSent = true;
        } else {
            $errorMessage = "Message trop court.";
            $mailSent = false;
        }
        
    } else {
        $errorMessage = "Adresse email invalide.";
        $mailSent = false;
    }
    
}


?>


<section class="form padding">
    <h2>Formulaire</h3>
    <?php if ($mailSent) : ?>
        <p class="form-feedback">Votre message a bien été envoyé. Nous vous répondrons dans les plus brefs délais.</p>
    <?php else : ?>
    <div class="form-container max-width section-container">
        <?php if ($errorMessage) : ?>
            <p class="form-error"><?php echo $errorMessage ?></p>
        <?php endif; ?>
        <form method="post">
            <div class="form-group">
                <label for="name">Prénom et nom</label>
                <input type="text" id="name" name="name" required value="<?php echo !empty($name) ? htmlspecialchars($name) : ''; ?>" >
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required value="<?php echo !empty($email) ? htmlspecialchars($email) : ''; ?>">
            </div>
            <div class="form-group">
                <label for="phone">Téléphone</label>
                <input type="tel" id="phone" name="phone" required value="<?php echo !empty($phone) ? htmlspecialchars($phone) : ''; ?>">
            </div>
            <div class="form-group">
                <label for="message">Message</label>
                <textarea id="message" name="message" minlength="10" required value="<?php echo !empty($message) ? htmlspecialchars($message) : ''; ?>"></textarea>
            </div>
            <button type="submit" class="cta">Envoyer</button>
        </form>
    </div>
    <?php endif; ?>
</section>

<section class="contact padding">
    <h2>Contact</h2>
    <div class="contact-container max-width section-container">
        <div class="contact-top">

            <div class="contact-top-left">
                <div class="consult-schedule">
                    <h3>Horaires de consultation</h3>
                    <hr class="separator">
                    <p>(pour patientes de fertilité)</p>
                    <h4>Lundi - Mardi - Jeudi - Vendredi</h4>
                    <p>8h30 - 13h</p>
                    <h4>Mercredi</h4>
                    <p>8h30 - 14h</p>
                    <hr class="separator">
                    <p>(pour la gynécologie-obstétrique)</p>
                    <h4>Lundi - Mardi - Vendredi</h4>
                    <p>14h - 18h</p>
                    <hr class="separator">
                    <?php
                    // Affiche "Joignable" ou "Injoignable" en fonction de la disponibilité
                    if ($vacances) {
                        echo "<p class=\"contact-inactive\" id=\"injoignable\">Vacances</p>";
                    } elseif (isAvailable($dayOfWeek, $currentTime, $openHours)) {
                        echo "<p class=\"contact-active\" id=\"ouvert\">Ouvert</p>";
                    } else {
                        echo "<p class=\"contact-inactive\" id=\"ferme\">Fermé</p>";
                    }
                    ?>
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
                    if ($vacances) {
                        echo "<p class=\"contact-inactive\" id=\"injoignable\">Vacances</p>";
                    }
                    elseif (isAvailable($dayOfWeek, $currentTime, $workingHours)) {
                        echo "<p class=\"contact-active\" id=\"joignable\">Joignable</p>";
                    } else {
                        echo "<p class=\"contact-inactive\" id=\"injoignable\">Injoignable</p>";
                    }
                    ?>
                </div>
                
            </div>

        </div>
    </div>
</section>