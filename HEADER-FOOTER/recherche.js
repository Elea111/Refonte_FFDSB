document.addEventListener("DOMContentLoaded", function () {
    /*===================*/
    /*barre de recherche */
    /*===================*/
    const searchInput = document.getElementById("search-input");
    const searchResults = document.getElementById("search-results");

    const simulatedResults = {
        "faire": [
            {title: "Faire un don", url: "https://ffdsb.org/faire-un-don/"},
            {title: "Comment faire un don de sang ?", url: "https://ffdsb.org/comprendre-le-don-du-sang/les-3-types-de-don-du-sang/"},
        ],
        "faq": [
            {title: "FAQ", url: "https://ffdsb.org/?s=faq"},
            {title: "Questions fréquentes sur le don", url: "https://ffdsb.org/comprendre-le-don-du-sang/les-3-types-de-don-du-sang/"},
        ],
        "don": [
            {title: "Don de sang", url: "https://dondesang.efs.sante.fr/trouver-une-collecte"},
            {title: "Où donner mon sang ?", url: "https://dondesang.efs.sante.fr/trouver-une-collecte"},
        ]
    };

    searchInput.addEventListener("input", function () {
        const query = searchInput.value.trim().toLowerCase();
        searchResults.innerHTML = "";

        if (!query || !simulatedResults[query]) {
            searchResults.classList.add("hidden");
            return;
        }

        const filteredPages = simulatedResults[query];
        searchResults.classList.remove("hidden");

        filteredPages.forEach((page) => {
            const li = document.createElement("li");
            li.textContent = page.title;
            li.style.cursor = "pointer";
            li.addEventListener("click", function () {
                window.location.href = page.url;
            });
            searchResults.appendChild(li);
        });
    });

    document.addEventListener("click", function (e) {
        if (!searchInput.contains(e.target) && !searchResults.contains(e.target)) {
            searchResults.classList.add("hidden");
        }
    });
});