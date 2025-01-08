<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?php echo $title ?></title>
        <meta name="description" lang="fr" content="<?php echo $description ?>">
        <meta name="description" lang="en" content="<?php echo $descriptionEnglish ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../global.css?v=3">
        <link rel="stylesheet" href="../pages.css?v=3">
        <link rel="icon" type="image/x-icon" href="../favicon.png">

        <!-- Socials -->
        <meta content="<?php echo $title ?>" property="og:title">
        <meta content="<?php echo $description ?>" property="og:description">
        <meta content="" property="og:url">
        <meta content="" property="og:image">
        <meta name="twitter:card" content="summary_large_image">
        <meta content="#F2F4F3" data-react-helmet="true" name="theme-color">
        <meta name="keywords" content="stérilité, fertilité, infertilité, désir de grossesse, FIV - ICSI, prise en charge, fertility, sterility, infertility, IVF - ICSI, LTC, personalized care">

        <!-- Google Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Della+Respira&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Merriweather:ital,wght@0,300;0,400;0,700;0,900;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:ital,opsz,wdth,wght,YTLC@0,6..12,75..125,200..1000,440..540;1,6..12,75..125,200..1000,440..540&display=swap" rel="stylesheet">

        <!--- Tippy.js --->
        <script src="https://unpkg.com/@popperjs/core@2"></script>
        <script src="https://unpkg.com/tippy.js@6"></script>
    </head>
    <body>
        <?php require __DIR__ . '/navbar.php'; ?>
