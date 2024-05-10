<?php

// Chemin vers le dossier des images
$albumDir = './data/album/';

// Ouvrir le dossier
$folder = opendir($albumDir);

// Parcourir les fichiers du dossier
while (($file = readdir($folder)) !== false) {
    // Ignorer les dossiers spéciaux
    if ($file != "." && $file != "..") {
        // Extraire le nom du fichier sans l'extension
        $name = pathinfo($file, PATHINFO_FILENAME);
        
        // Afficher l'élément HTML pour l'image
        echo '<img class="album-img" src="' . $albumDir . $file . '" alt="' . $name . '">';
    }
}

// Fermer le dossier
closedir($folder);

?>