document.addEventListener("DOMContentLoaded", function () {
    const elements = document.querySelectorAll("[thbo]"); // Sélectionne tous les éléments avec "thbo"

    if (elements.length === 0) return; // S'il n'y a pas d'éléments, on arrête là

    function updateParallax() {
        const scrollPosition = window.scrollY;

        elements.forEach(el => {
            const speed = parseFloat(el.getAttribute("thbo-speed")) || 0.3; // Récupère la vitesse, par défaut 0.3
            el.style.transform = `translateY(${scrollPosition * speed}px)`;
        });

        requestAnimationFrame(updateParallax); // Optimisation pour le scroll fluide
    }

    requestAnimationFrame(updateParallax); // Lance l'animation dès le début
});