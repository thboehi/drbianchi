<?php
$currentPage = $_SERVER['REQUEST_URI'];
?>

<nav id="nav-element">
    <div class="navbar">
        <div class="navbar-left">
            <a href="/">
                <img src="../img/favicon.png" alt="Dr Bianchi">
                <p>Dr. Bianchi</p>
            </a>
        </div>
        <div class="navbar-right">
            <ul id="nav-menu">
                <li><a href="/" <?php if ($currentPage == '/') echo 'class="active"'; ?> >Accueil</a></li>
                <li><a href="/about" <?php if ($currentPage == '/about') echo 'class="active"'; ?>>Présentation</a></li>
                <li><a href="/contact" <?php if ($currentPage == '/contact') echo 'class="active"'; ?>>Contact</a></li>
            </ul>
            <div class="burger-button" id="burger-button" data-state="close" onclick="burgerOpen()">
                <div class="burger-line"></div>
                <div class="burger-line"></div>
                <div class="burger-line"></div>
            </div>
            <div class="burger-menu" id="burger-menu" data-state="close">

                <ul>
                    <li><a href="/" <?php if ($currentPage == '/') echo 'class="active"'; ?> >Accueil</a></li>
                    <li><a href="/about" <?php if ($currentPage == '/about') echo 'class="active"'; ?>>Présentation</a></li>
                    <li><a href="/contact" <?php if ($currentPage == '/contact') echo 'class="active"'; ?>>Contact</a></li>
                </ul>
            </div>
        </div>
    </div>
</nav>
