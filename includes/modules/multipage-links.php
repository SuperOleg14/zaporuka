<?php
if (class_exists(Silencenjoyer\Seo\Models\Multipage::class)) {
    $post = get_post();
    if ($post) {

        $pagesForPost = Silencenjoyer\Seo\Models\Multipage::findAll(
            'post_id = ' . $post->ID,
            '1 DESC'
        );

        if (empty($pagesForPost)) {
            return '';
        }

        if ($pagesForPost) {
            echo '<div class="multipage-links"><div class="container"><div class="block-title">Available in:</div><div class="multipage-links__content service-taxonomy__content_text d-flex --align-center f-wrap">';
            foreach ($pagesForPost as $page) {

                if (parse_url($page->getFullLink(), PHP_URL_PATH) != $_SERVER['REQUEST_URI']) {

                    echo sprintf('<a href="%s">%s</a>', $page->getFullLink(), $page->name);
                }
            }
            echo '</div><div class="block-btn block-btn-margin service-btn-more">Show more</div></div></div>';
        }
    }
}
?>
