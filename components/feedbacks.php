<?php

// Chemin vers le fichier JSON des avis
$jsonDir = './data/feedbacks.json';

// Lire le contenu du fichier JSON
$json = file_get_contents($jsonDir);

// Convertir le contenu JSON en tableau associatif PHP
$feedbacks = json_decode($json, true);

// Vérifier si la conversion a réussi
if ($feedbacks !== null) {
    // Parcourir les avis et afficher chaque nom et commentaire
    foreach ($feedbacks as $feedback) {
        $nom = $feedback['name'];
        $commentaire = $feedback['comment'];
        
        // Afficher le contenu avec une seule instruction echo
        echo "<div class=\"feedback-container\">\n";
        echo "    <h3>$nom</h3>\n";
        echo "    <p>$commentaire</p>\n";
        echo "</div>\n";
    }
} else {
    echo "Erreur lors de la lecture du fichier JSON.";
}

?>