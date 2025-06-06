$(document).ready(function () {
    var $slider = $('.important-slider');
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

document.getElementById('project-link').addEventListener('click', function (e) {
    e.preventDefault();
    const url = this.getAttribute('data-url');
    navigator.clipboard.writeText(url).then(() => {
        showNotification();
    }).catch(() => {
        alert('Не вдалося скопіювати посилання.');
    });
});

function showNotification() {
    const notification = document.querySelector('.notification');
    notification.classList.add('show');

    setTimeout(() => {
        notification.classList.remove('show');
    }, 2000);
}

document.addEventListener('DOMContentLoaded', function () {
    const select = document.getElementById('last-donate__block');
    const toggle = document.getElementById('last-donate');

    toggle.addEventListener('click', function (e) {
        e.stopPropagation();
        select.classList.toggle('active');
        toggle.classList.toggle('active');
    });

    document.addEventListener('click', function (e) {
        if (!select.contains(e.target)) {
            select.classList.remove('active');
            toggle.classList.remove('active');
        }
    });

    function moveInfoBlock() {
        const info = document.querySelector('.first-display__info');
        const image = document.querySelector('.first-display__image');
        const wrapper = document.querySelector('.first-display__wrapper');

        if (window.innerWidth < 1199 && info && image && wrapper) {
            if (!wrapper.contains(info)) {
                image.insertAdjacentElement('afterend', info);
            }
        } else {
            const container = document.querySelector('.first-display__content');
            if (!container.contains(info)) {
                container.appendChild(info);
            }
        }
    }

    moveInfoBlock();
    window.addEventListener('resize', moveInfoBlock);
});

