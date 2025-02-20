let isBurgerOpen = false
const burgerButton = document.getElementById("burger-button")
const burgerMenu = document.getElementById("burger-menu")
const debug = false

const burgerOpen = () => {
    let position = window.scrollY
    if (isBurgerOpen) {
        isBurgerOpen = false
        burgerButton.setAttribute("data-state", "close")
        burgerMenu.setAttribute("data-state", "close")
        document.body.removeAttribute("data-fixed")
        if (position === 0) {
            navbar.removeAttribute("data-bg")
        }
    } else {
        isBurgerOpen = true
        burgerButton.setAttribute("data-state", "open")
        burgerMenu.setAttribute("data-state", "open")
        document.body.setAttribute("data-fixed", "true")
        navbar.setAttribute("data-bg", "visible")
    }
}

const navbar = document.getElementById("nav-element")
let lastPosition = 0

onscroll = (event) => {

    let position = window.scrollY
    let screenHeight = window.screen.availHeight
    if (debug) {
        console.log(position);
    }

    //Si la position est plus basse que 50px, on affiche le fond de la navbar
    if (position > (screenHeight*2/3)) {
        navbar.setAttribute("data-bg", "visible")
    } else {
        navbar.removeAttribute("data-bg")
    }

    //Si la position est plus basse (chiffre plus haut ouais je sais c'est chelou mais on descend quoi, donc plus de pixels wesh) qu'avant et qu'on est en dessous de 100px, on cache
    if (lastPosition < position && position >= (screenHeight - 250)) {
        navbar.setAttribute("data-view", "hidden")
    } else {
        navbar.removeAttribute("data-view")
    }
    lastPosition = position
}

onload = () => {
    let position = window.scrollY
    if (debug) {
        console.log(position);
    }

    //Si la position est plus basse que 50px, on affiche le fond de la navbar
    if (position > 1) {
        navbar.setAttribute("data-bg", "visible")
    } else {
        navbar.removeAttribute("data-bg")
    }

    //Si la position est plus basse (chiffre plus haut ouais je sais c'est chelou mais on descend quoi, donc plus de pixels wesh) qu'avant et qu'on est en dessous de 100px, on cache
    if (lastPosition < position && position >= 600) {
        navbar.setAttribute("data-view", "hidden")
    } else {
        navbar.removeAttribute("data-view")
    }
    lastPosition = position
}

tippy('#joignable', {
    content: 'Nous sommes atteignable par téléphone',
  });
tippy('#injoignable', {
content: 'Réessayez durant les heures d\'ouverture',
});
tippy('#ouvert', {
    content: 'Vous pouvez venir nous voir',
  });
tippy('#ferme', {
content: 'Les consultations soint terminées pour aujourd\'hui',
});

// ALBUM VARIABLES
const transitionDuration = 600; // Durée de la transition en ms
let currentIndex = 1;
let isTransitioning = false;
let userInteracted = false;
let userInteractedTimer;
let autoScrollInterval;
let totalUpdatedImages;
let albumContent;

document.addEventListener("DOMContentLoaded", function () {
    // Initialisation de albumContent uniquement après que le DOM est chargé
    albumContent = document.querySelector(".album-content");

    // Vérifier que albumContent existe bien avant de poursuivre
    if (!albumContent) {
        console.error("Erreur : Impossible de trouver .album-content !");
        return;
    }

    const images = Array.from(document.querySelectorAll(".album-img"));
    const totalImages = images.length;

    // Vérification si des images existent
    if (totalImages === 0) {
        console.error("Erreur : Aucune image trouvée dans l'album !");
        return;
    }

    // Dupliquer la première et la dernière image pour créer l'effet de défilement infini
    const firstClone = images[0].cloneNode(true);
    const lastClone = images[totalImages - 1].cloneNode(true);

    albumContent.appendChild(firstClone);
    albumContent.insertBefore(lastClone, images[0]);

    // Mettre à jour la liste des images après duplication
    totalUpdatedImages = document.querySelectorAll(".album-img").length;

    // Initialiser la position de l'album après la duplication des images
    updateAlbumPosition(false);

    // Initialiser l'auto-scroll
    resetAutoScroll();

    // Ajouter les événements pour les touches de direction
    document.addEventListener("keydown", function (event) {
        if (event.key === "ArrowRight") {
            userAction();
            nextImage();
        } else if (event.key === "ArrowLeft") {
            userAction();
            prevImage();
        }
    });
});

// Fonction de mise à jour de la position de l'album
function updateAlbumPosition(smooth = true) {
    if (!albumContent) {
        console.error("Erreur : albumContent est undefined dans updateAlbumPosition !");
        return;
    }
    albumContent.style.transition = smooth ? `transform ${transitionDuration}ms ease-in-out` : "none";
    albumContent.style.transform = `translateX(-${currentIndex * 100}%)`;
}

// Fonction pour réinitialiser l'auto-scroll
function resetAutoScroll() {
    clearInterval(autoScrollInterval);
    
    if (!userInteracted) { // On ne redémarre pas l'auto-scroll si l'utilisateur a interagi récemment
        autoScrollInterval = setInterval(() => {
            if (!userInteracted) {
                nextImage();
            }
        }, 5000); // Changer d'image toutes les 5 secondes si l'utilisateur n'a pas interagi
    }
}

// Fonction pour marquer l'interaction de l'utilisateur
function userAction() {
    userInteracted = true;
    clearTimeout(userInteractedTimer);
    
    userInteractedTimer = setTimeout(() => {
        userInteracted = false;
        resetAutoScroll(); // On redémarre l'auto-scroll UNIQUEMENT après 5s d'inactivité
    }, 5000);
}

// Fonction pour passer à l'image suivante
function nextImage() {
    if (isTransitioning) return;
    isTransitioning = true;

    if (currentIndex >= totalUpdatedImages - 1) return; // Ne pas dépasser la dernière image
    currentIndex++;
    updateAlbumPosition();

    setTimeout(() => {
        // Si on atteint la dernière image, revenir à la première
        if (currentIndex === totalUpdatedImages - 1) {
            currentIndex = 1;
            updateAlbumPosition(false); // Sans transition pour éviter un effet bizarre
        }
        isTransitioning = false;
    }, transitionDuration);
}

// Fonction pour revenir à l'image précédente
function prevImage() {
    if (isTransitioning) return;
    isTransitioning = true;

    if (currentIndex <= 0) return; // Ne pas dépasser la première image
    currentIndex--;
    updateAlbumPosition();

    setTimeout(() => {
        // Si on atteint la première image, revenir à la dernière
        if (currentIndex === 0) {
            currentIndex = totalUpdatedImages - 2;
            updateAlbumPosition(false); // Sans transition pour éviter un effet bizarre
        }
        isTransitioning = false;
    }, transitionDuration);
}