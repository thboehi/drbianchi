<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?php echo $title ?></title>
        <meta name="description" lang="fr" content="<?php echo $description ?>">
        <meta name="description" lang="en" content="<?php echo $descriptionEnglish ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../global.css?v=4.0.1">
        <link rel="stylesheet" href="../pages.css?v=4.0.1">
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
        <link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,100..1000;1,9..40,100..1000&family=Nunito+Sans:ital,opsz,wght@0,6..12,200..1000;1,6..12,200..1000&display=swap" rel="stylesheet">

        <!--- Tippy.js --->
        <script src="https://unpkg.com/@popperjs/core@2"></script>
        <script src="https://unpkg.com/tippy.js@6"></script>
    </head>
    <body>
        <?php require __DIR__ . '/navbar.php'; ?>
