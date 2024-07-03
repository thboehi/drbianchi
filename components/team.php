<?php

// Chemin vers le fichier JSON des avis
$jsonDir = './data/team.json';

// Lire le contenu du fichier JSON
$json = file_get_contents($jsonDir);

// Convertir le contenu JSON en tableau associatif PHP
$feedbacks = json_decode($json, true);

// Vérifier si la conversion a réussi
if ($feedbacks !== null) {
    // Parcourir les avis et afficher chaque nom et commentaire
    foreach ($feedbacks as $feedback) {
        $name = $feedback['name'];
        $post = $feedback['post'];
        $piclink = $feedback['picture'];
        
        // Afficher le contenu avec une seule instruction echo
        echo "<div class=\"person-container\">\n";
        echo "    <div class=\"person-img-container\">\n";
        echo "        <img src=\"img/team/$piclink\" alt=\"$name - $post\">\n";
        echo "    </div>";
        echo "    <h3>$name</h3>\n";
        echo "    <p>$post</p>\n";
        echo "</div>\n";
    }
} else {
    echo "Erreur lors de la lecture du fichier JSON.";
}

?>