<?php
function addFilterContentFaq($text)
{
    $pattern = '/(<(h[1-6])>[\w\s\/$%#{}[\].:\\@!,+();&<>"\'^*?=~`-–-]*?<\/h[1-6]>)/i';
    $result = preg_replace($pattern, "</div></div><div class='card'><div class='card-btn'>$1</div><div class='card-body'>", $text);
    $pos = strpos($result, '</div></div>');

    return substr_replace($result, '', $pos, 12) . '</div></div>';

}

add_filter('the_content', 'addFilterContentFaq');

?>


<?php if (is_tax('projects-category')) :
    if ( have_rows( 'projects_category_faq', 'options') ):
        while ( have_rows( 'projects_category_faq', 'options') ) : the_row(); ?>
            <div class="faq m-150">
                <div class="container">
                    <h2 class="title">Нас часто запитують</h2>
                    <div class="faq__content accordion">
                        <?php
                        $faq_content = get_sub_field('projects_category_faq_content');
                        echo addFilterContentFaq($faq_content);
                        ?>
                    </div>
                </div>
            </div>
        <?php endwhile;
    endif;
else : ?>
    <div class="faq m-150">
        <div class="container">
            <h2 class="title">Нас часто запитують</h2>
            <div class="faq__content accordion">
                <?php
                $faq_content = get_sub_field('faq_content');
                echo addFilterContentFaq($faq_content);
                ?>
            </div>
        </div>
    </div>
<?php endif; ?>
