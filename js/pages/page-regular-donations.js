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
