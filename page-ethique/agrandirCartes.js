// Sélectionne toutes les cartes
const cartes = document.querySelectorAll('.carte');

// Agrandit les cartes
function agrandirCarte(event) {
    const carte = event.currentTarget;
    carte.style.transform = "scale(1.2)";
    carte.style.boxShadow = "0px 8px 20px rgba(0, 0, 0, 0.2)";
}

// Rétrécit les cartes
function reduireCarte(event) {
    const carte = event.currentTarget;
    carte.style.transform = "scale(1)";
    carte.style.boxShadow = "none";
}

// Ajouter les événements à chaque carte
cartes.forEach(carte => {
    carte.addEventListener('mouseover', agrandirCarte);
    carte.addEventListener('mouseout', reduireCarte);
});
