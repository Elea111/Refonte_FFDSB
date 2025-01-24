const items = document.querySelectorAll('.carousel-item');
let currentIndex = 1;

function showNext() {
    items[currentIndex].classList.remove('active');
    currentIndex = (currentIndex + 1) % items.length;
    items[currentIndex].classList.add('active');
}

setInterval(showNext, 3000);