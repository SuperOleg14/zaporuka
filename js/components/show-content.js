$(document).ready(function () {
    $('.seo-block__text').each(function () {
        var fullText = $(this).html().trim();
        var shortText = fullText.substring(0, 600);

        if (fullText.length > 600) {
            $(this).data('full-text', fullText).html(shortText + '...');
            $(this).after('<div class="seo-block-btn">Показати більше</div>');
        }
    });

    $(document).on('click', '.seo-block-btn', function () {
        var container = $(this).prev('.seo-block__text');
        var fullText = container.data('full-text');
        var shortText = fullText.substring(0, 600);

        if (!container.hasClass('expanded')) {
            container.addClass('expanded').animate({ height: 'auto' }, 300).html(fullText);
            $(this).addClass('active').text('Сховати');
        } else {
            container.removeClass('expanded').animate({ height: 'auto' }, 300).html(shortText + '...');
            $(this).removeClass('active').text('Показати більше');
        }
    });
});
