<?php

//Retenir l'adresse vers laquelle l'utilisateur souhaite se rendre
$request = $_SERVER['REQUEST_URI'];

//Définir les repertoire important
$viewDir = '/views/';
$compDir = '/components/';

//Paramètres important du site Web
$siteName = "Dr. Grace Bianchi";
$siteDescription = "Cabinet de la Doctoresse Patrizia Grace Bianchi Movarekhi, spécialiste en Gynécologie-obstétrique opératoire, stérilité et fertilité. Nous offrons des traitements pour l'infertilité, le désir de grossesse, et la FIV - ICSI, avec une prise en charge personnalisée et des soins attentionnés.";
$separator = " | ";

//Cette partie est la plus importante, c'est le routeur, il permet de charger les éléments en fonction du lien dans la barre de navigation
//Chaque case est une situation, le default est l'erreur 404, pour tous les case inexistants.
switch ($request) {

    case '/':
        //Définir le titre de la page
        $title = $siteName . '' . $separator . "Accueil";
        $description = $siteDescription;

        //Charger le header, puis le contenu, puis le footer.
        require __DIR__ . $compDir . 'header.php';
        require __DIR__ . $viewDir . 'home.php';
        require __DIR__ . $compDir . 'footer.php';

        break;
    
    case '/about':
        //Définir le titre de la page
        $title = $siteName . $separator . "Présentation";
        $description = $siteDescription;

        //Charger le header, puis le contenu, puis le footer.
        require __DIR__ . $compDir . 'header.php';
        require __DIR__ . $viewDir . 'about.php';
        require __DIR__ . $compDir . 'footer.php';

        break;

    case '/contact':
        //Définir le titre de la page
        $title = $siteName . $separator . "Contact";
        $description = $siteDescription;

        //Charger le header, puis le contenu, puis le footer.
        require __DIR__ . $compDir . 'header.php';
        require __DIR__ . $viewDir . 'contact.php';
        require __DIR__ . $compDir . 'footer.php';

        break;
            
    default:
        //Renvoyer erreur 404 au navigateur
        http_response_code(404);
        //Définir le titre de la page
        $title = $siteName . $separator . "Erreur";
        $description = $siteDescription;

        //Charger le header, puis le contenu, puis le footer.
        require __DIR__ . $compDir . 'header.php';
        require __DIR__ . $viewDir . '404.php';
        require __DIR__ . $compDir . 'footer.php';

        break;
}