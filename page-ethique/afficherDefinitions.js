import {definitions} from '../../../test/page-ethique/definitions.js';

// Remplace les termes par des span avec les définitions
function remplacerAvecDefinition() {
    const paragraphe = document.getElementById('texte');
    let contenuHTML = paragraphe.innerHTML;

    for (let mot in definitions) {
        const modeleRecherche = new RegExp(`\\b(${mot})\\b`, 'gi');
        contenuHTML = contenuHTML.replace(modeleRecherche, `<span class="def" title="${definitions[mot]}">$1</span>`);
    }

    paragraphe.innerHTML = contenuHTML;
}

// Affiche les définitions
window.onload = remplacerAvecDefinition;