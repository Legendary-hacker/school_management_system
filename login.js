document.addEventListener('DOMContentLoaded', function() {
    const togglePassword1 = document.getElementById('togglePassword1');
    const password1 = document.getElementById('password1');
    
    const togglePassword2 = document.getElementById('togglePassword2');
    const password2 = document.getElementById('password2');
    
    togglePassword1.addEventListener('click', function () {
        const type = password1.getAttribute('type') === 'password' ? 'text' : 'password';
        password1.setAttribute('type', type);
        this.textContent = type === 'password' ? 'visibility_off' : 'visibility';
    });
    
    togglePassword2.addEventListener('click', function () {
        const type = password2.getAttribute('type') === 'password' ? 'text' : 'password';
        password2.setAttribute('type', type);
        this.textContent = type === 'password' ? 'visibility_off' : 'visibility';
    });
});
    
let currentIndex = 0;
const slides = document.querySelectorAll('.swiper-slide');
const totalSlides = slides.length;

function showNextSlide() {
    currentIndex = (currentIndex + 1) % totalSlides;
    const offset = -currentIndex * (slides[0].clientWidth + 20); // 20 is margin
    document.querySelector('.swiper-wrapper').style.transform = `translateX(${offset}px)`;
}

setInterval(showNextSlide, 3000); // Change slide every 3 seconds


