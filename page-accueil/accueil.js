/*===================*/
/*  carrousel d'actu  */
/*===================*/
    document.addEventListener("DOMContentLoaded", function () {


        let currentIndex = 0;
    const items = document.querySelectorAll(".carousel-item");
    const totalItems = items.length;

    function updateCarousel() {
        items.forEach((item, index) => {
            item.classList.remove("active", "left", "right");
            if (index === currentIndex) {
                item.classList.add("active");
            } else if (index === (currentIndex - 1 + totalItems) % totalItems) {
                item.classList.add("left");
            } else if (index === (currentIndex + 1) % totalItems) {
                item.classList.add("right");
            }
        });
    }

    function showNextSlide() {
        currentIndex = (currentIndex + 1) % totalItems;
        updateCarousel();
    }

    setInterval(showNextSlide, 3000);
    updateCarousel(); // Initialisation



        const navbarToggler = document.querySelector('.navbar-toggler');
        const menu = document.querySelector('.menu');

        navbarToggler.addEventListener('click', function () {
            menu.classList.toggle('active');
        });
});
