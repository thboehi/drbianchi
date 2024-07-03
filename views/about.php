<?php require "./components/hero.php" ?>

<section id="about" class="about padding margin-first">
    <div class="section-container max-width about-container">
        <div class="about-left">
            <h2>Le cabinet</h2>
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Sunt quos nemo culpa iusto facilis optio, corrupti magnam, sequi asperiores nostrum placeat recusandae ullam deserunt ea voluptates perferendis illo, quod vero.</p>
        </div>
        <div class="about-right">
            <img src="../img/banner.jpg" alt="Oui">
        </div>
    </div>
</section>

<section id="partner" class="partner">
    <h2>Nos partenaires</h2>
    <div class="section-container max-width partner-container">
        <a href="https://babyimpulse.ch/" target="_blank">
            <img src="../img/partner/babyimpulse.png" alt="Logo de BabyImpulse">
        </a>
    </div>
</section>

<section id="equipe" class="about padding">
    <h2>Notre équipe</h2>
    <div class="section-container max-width team-container">
        <?php require "./components/team.php" ?>
    </div>
</section>