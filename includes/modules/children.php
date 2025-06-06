<?php
$totalCount = 0;
if (have_rows('children', 'options')) {
    while (have_rows('children', 'options')) {
        the_row();
        if (have_rows('children_content')) {
            while (have_rows('children_content')) {
                the_row();
                $totalCount++;
            }
        }
    }
}
?>

<div class="children m-150">
    <div class="container">
        <?php if (have_rows('children', 'options')): ?>
            <?php while (have_rows('children', 'options')): the_row(); ?>
                <h2 class="title"><?php echo get_sub_field('children_title'); ?></h2>
            <?php endwhile; ?>
        <?php endif; ?>
        <div id="children-container" class="children__content d-flex --just-space --align-stretch f-wrap"></div>
        <div class="d-flex --just-space --align-center">
            <button class="btn btn-content" id="load-more" data-page="1">Завантажити ще</button>
            <div class="children__counter text">
                Показано <span id="shown-count">0</span> із <span id="total-count"><?php echo $totalCount; ?></span>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const loadBtn = document.getElementById('load-more');
        const container = document.getElementById('children-container');
        const shownCountEl = document.getElementById('shown-count');
        const totalCountEl = document.getElementById('total-count');

        let shown = 0;

        const loadChildren = () => {
            const page = parseInt(loadBtn.dataset.page);
            loadBtn.disabled = true;

            fetch(`<?php echo get_template_directory_uri(); ?>/children-ajax.php?page=${page}`)
                .then(res => res.text())
                .then(html => {
                    const added = (html.match(/children__content_item/g) || []).length;

                    if (added) {
                        container.insertAdjacentHTML('beforeend', html);
                        shown += added;
                        shownCountEl.textContent = shown;

                        loadBtn.dataset.page = page + 1;
                        loadBtn.disabled = false;

                        if (shown >= parseInt(totalCountEl.textContent)) {
                            loadBtn.remove();
                        }
                    } else {
                        loadBtn.remove();
                    }
                });
        };


        loadChildren();
        loadBtn.addEventListener('click', loadChildren);
    });
</script>

