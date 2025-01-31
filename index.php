<?php

//Retenir l'adresse vers laquelle l'utilisateur souhaite se rendre
$request = $_SERVER['REQUEST_URI'];

//Définir les repertoire important
$viewDir = '/views/';
$compDir = '/components/';

//Paramètres important du site Web
$siteName = "Dr. Grace Bianchi | Centre de procréation médicalement assistée";
$siteDescription = "Centre de procréation médicalement assistée (PMA) de la Doctoresse Patrizia Grace Bianchi Movarekhi à Genève, spécialiste en gynécologie-obstétrique opératoire, stérilité, infertilité, et fertilité. Nous proposons des traitements personnalisés pour le désir de grossesse, la FIV - ICSI, la vitrification des gamètes, la conservation des ovocytes et du sperme, avec une prise en charge attentive";
$siteDescriptionEnglish = "Assisted reproductive technology (ART) center led by Doctor Patrizia Grace Bianchi Movarekhi in Geneva, specialist in operative gynecology, sterility, infertility, and fertility. We offer personalized treatments for pregnancy planning, IVF - ICSI, gamete vitrification, egg preservation, and sperm preservation, with attentive care.";
$separator = " | ";

//Cette partie est la plus importante, c'est le routeur, il permet de charger les éléments en fonction du lien dans la barre de navigation
//Chaque case est une situation, le default est l'erreur 404, pour tous les case inexistants.
switch ($request) {

    case '/':
        //Définir le titre de la page
        $title = $siteName . '' . $separator . "Accueil";
        $description = $siteDescription;
        $descriptionEnglish = $siteDescriptionEnglish;

        //Charger le header, puis le contenu, puis le footer.
        require __DIR__ . $compDir . 'header.php';
        require __DIR__ . $viewDir . 'home.php';
        require __DIR__ . $compDir . 'footer.php';

        break;
    
    case '/about':
        //Définir le titre de la page
        $title = $siteName . $separator . "Présentation";
        $description = $siteDescription;
        $descriptionEnglish = $siteDescriptionEnglish;

        //Charger le header, puis le contenu, puis le footer.
        require __DIR__ . $compDir . 'header.php';
        require __DIR__ . $viewDir . 'about.php';
        require __DIR__ . $compDir . 'footer.php';

        break;

    case '/contact':
        //Définir le titre de la page
        $title = $siteName . $separator . "Contact";
        $description = $siteDescription;
        $descriptionEnglish = $siteDescriptionEnglish;

        //Charger le header, puis le contenu, puis le footer.
        require __DIR__ . $compDir . 'header.php';
        require __DIR__ . $viewDir . 'contact.php';
        require __DIR__ . $compDir . 'footer.php';

        break;
    case '/config':
        //Définir le titre de la page
        $title = $siteName . $separator . "Configuration";
        $description = $siteDescription;
        $descriptionEnglish = $siteDescriptionEnglish;

        //Charger le header, puis le contenu, puis le footer.
        require __DIR__ . $compDir . 'header.php';
        require __DIR__ . $viewDir . 'config.php';
        require __DIR__ . $compDir . 'footer.php';

        break;
    case '/config?logout':
        //Définir le titre de la page
        $title = $siteName . $separator . "Configuration";
        $description = $siteDescription;
        $descriptionEnglish = $siteDescriptionEnglish;

        //Charger le header, puis le contenu, puis le footer.
        require __DIR__ . $compDir . 'header.php';
        require __DIR__ . $viewDir . 'config.php';
        require __DIR__ . $compDir . 'footer.php';

        break;
            
    default:
        //Renvoyer erreur 404 au navigateur
        http_response_code(404);
        //Définir le titre de la page
        $title = $siteName . $separator . "Erreur";
        $description = $siteDescription;
        $descriptionEnglish = $siteDescriptionEnglish;

        //Charger le header, puis le contenu, puis le footer.
        require __DIR__ . $compDir . 'header.php';
        require __DIR__ . $viewDir . '404.php';
        require __DIR__ . $compDir . 'footer.php';

        break;
}