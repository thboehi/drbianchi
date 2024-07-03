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