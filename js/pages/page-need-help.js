document.addEventListener('DOMContentLoaded', function () {
    const select = document.querySelector('select[name=\'city\']');
    const hospitals = document.querySelectorAll('.hospital-item');

    select.addEventListener('change', function () {
        const selectedCity = this.value;

        hospitals.forEach(hospital => {
            hospital.style.display = hospital.getAttribute('data-value') === selectedCity ? 'flex' : 'none';
        });
    });
    document.querySelectorAll('.copy-text-btn').forEach(button => {
        button.addEventListener('click', function () {
            const text = this.previousElementSibling.innerText.trim();
            copyToClipboard(text);
            showNotification();
        });
    });

    function copyToClipboard(text) {
        navigator.clipboard.writeText(text);
    }

    function showNotification() {
        const notification = document.querySelector('.notification');
        notification.classList.add('show');

        setTimeout(() => {
            notification.classList.remove('show');
        }, 2000);
    }
});

$(document).ready(function () {
    var $slider = $('.info-block-slider');
    var $counter = $('.slider-counter');
    var $currentSlide = $counter.find('.current-slide');
    var $totalSlides = $counter.find('.total-slides');

    $slider.on('init reInit afterChange', function (event, slick, currentSlide) {
        var i = (currentSlide ? currentSlide : 0) + 1;
        $currentSlide.text(i);
        $totalSlides.text(slick.slideCount);
    });

    $slider.slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: true,
        dots: false,
    });
});
