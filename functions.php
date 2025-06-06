<?php

//ADDING JS AND CSS FILES
//--------------------------------------------------
function ox_adding_scripts() {
    if (!function_exists('is_login_page')) {
        function is_login_page() {
            return !strncmp($_SERVER['REQUEST_URI'], '/wp-login.php', strlen('/wp-login.php'));
        }
    }

    if( !is_admin() && !is_login_page()){
        /*removed wp-embed.min.js*/
        wp_deregister_script('wp-embed');
        wp_dequeue_style( 'wp-block-library');

        /*jquery*/
        wp_deregister_script('jquery');
        wp_enqueue_script('jquery', get_template_directory_uri() . '/js/min/jquery.min.js', null, '3.2.1', true);

        //общие для всего сайта стили и скрипты

        /*custom js*/
        wp_enqueue_script('main', get_template_directory_uri() . '/js/min/main.min.js', array('jquery'), time(), true );

        /*custom css*/
        wp_enqueue_style( 'main', get_template_directory_uri() . '/css/style.min.css', array(), time(), 'all');

        //добавляем css и js для кастомных страниц
        $pageTemplate = get_page_template_slug();

        if (strrpos($pageTemplate, 'pages/') === 0){
            $pageTemplateName = str_replace(['pages/', '.php'], '', $pageTemplate);

            $isCssFile = file_exists(get_theme_file_path('css/' . $pageTemplateName . '.min.css'));
            $isJsFile = file_exists(get_theme_file_path('js/min/' . $pageTemplateName . '.min.js'));

            if($isCssFile) {
                $cssFilePath = get_theme_file_uri('css/' . $pageTemplateName . '.min.css');
                wp_enqueue_style( $pageTemplateName , $cssFilePath, array(), time(), 'all');
            }

            if($isJsFile){
                $jsFilePath = get_theme_file_uri('js/min/' . $pageTemplateName . '.min.js');
                wp_enqueue_script($pageTemplateName, $jsFilePath, array('jquery'), time(), true );
            }
        }

        //добавляем стили для блога и постов
        if(is_home() || is_single() || is_category() || is_search() || is_author() || is_tag()){
            wp_enqueue_style( 'blog', get_template_directory_uri() . '/css/page-blog.min.css', array(), time(), 'all');
            wp_enqueue_script('blog', get_template_directory_uri() . '/js/min/page-blog.min.js', array('jquery'), time(), true );
        }

        if(is_page_template('projects-template.php') || is_singular('projects') || is_tax('projects-category') || is_search()){
            wp_enqueue_style( 'projects', get_template_directory_uri() . '/css/page-projects.min.css', array(), time(), 'all');
            wp_enqueue_script('projects', get_template_directory_uri() . '/js/min/page-projects.min.js', array('jquery'), time(), true );

        }

        if(is_404()){
            wp_enqueue_style( 'error', get_template_directory_uri() . '/css/page-error.min.css', array(), time(), 'all');
        }

        if(is_page_template('pages/page-contacts-us.php')){
            wp_enqueue_style('fancybox', 'https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css');
            wp_enqueue_script('fancybox', 'https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js', array('jquery'), '3.5.7', true);
        }


    }
}

add_action( 'wp_enqueue_scripts', 'ox_adding_scripts' );

//ADDING CRITICAL CSS (only for front-page)
//--------------------------------------------------
//render-blocking styles
$css_files = array(
    'main'
);

//add_action('wp_enqueue_scripts', 'ox_adding_critical_css');


function ox_adding_critical_css()
{
    if (!is_front_page()) return;

    global $wp_styles, $css_files;

    if (empty($css_files)) return;

    $registered_styles = $css_files;
    $css_files = array();

    foreach ($registered_styles as $item) {
        $s = $wp_styles->registered[$item]->src . '?ver=' . $wp_styles->registered[$item]->ver;
        $css_files[$item] = $s;
    }

    $critical_css = load_template_part('css/critical.css');
    echo '<style>' . $critical_css . '</style>';

    global $css_files;

    foreach ($css_files as $key => $item) {
        wp_deregister_style($key);
        echo "<noscript><link rel='stylesheet' href='$item'/></noscript>";
    }

    function hook_non_critical_css()
    {
        global $css_files;

        foreach ($css_files as $key => $item) {
            echo '<script>function loadCSS(e,t,n){"use strict";var i=window.document.createElement("link");var o=t||window.document.getElementsByTagName("script")[0];i.rel="stylesheet";i.href=e;i.media="only x";o.parentNode.insertBefore(i,o);setTimeout(function(){i.media=n||"all"})}loadCSS("' . $item .'");</script>';
        }
    }

    add_action('wp_footer', 'hook_non_critical_css');
}

function load_template_part($template_name, $part_name = null)
{
    ob_start();
    get_template_part($template_name, $part_name);
    $var = ob_get_contents();
    ob_end_clean();
    return $var;
}


//REWOVE SOME META TAGS AND UNNECESSARY LINKS
//--------------------------------------------------
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wp_shortlink_wp_head', 10);
remove_action('wp_head', 'feed_links_extra', 3 );
remove_action('wp_head', 'feed_links', 2 );
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'wlwmanifest_link');

//remove wpemoji
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'wp_print_styles', 'print_emoji_styles' );
remove_action( 'admin_print_styles', 'print_emoji_styles' );

//remove wp-json
remove_action( 'wp_head', 'rest_output_link_wp_head', 10 );
remove_action( 'wp_head', 'wp_oembed_add_discovery_links', 10 );


//REGISTRATION MENU
//--------------------------------------------------
register_nav_menus( array(
    'header_menu' => 'Header Menu',
    'footer_menu_about' => 'Footer Menu About',
    'footer_menu_activity' => 'Footer Menu Activity',
    'footer_menu_help' => 'Footer Menu Help',
));

//custom classes for menu items
function nav_class_filter( $classes, $item, $args, $depth ) {
    //добавлять классы только для меню в хедере
//    if($args->theme_location === 'header_menu' ) {
//        $classes = ['navigation__link']; //такая запись переписывает все классы для элемента меню
//    }

    if($args->theme_location === 'header_submenu' ) {
        $classes = ['submenu__link']; //такая запись переписывает все классы для элемента меню
    }

    //добавлять классы только для меню в футере
    if($args->theme_location === 'footer_menu') {
        $classes[] = ['footer-menu__link'];  //такая запись добавляет класс в общий массив классов, формирующийся вордпрессом
    }

    return $classes;
}

add_filter( 'nav_menu_css_class', 'nav_class_filter', 10, 4 );

/***
 * new pagination template for blog
 * @param $template
 * @param $class
 * @return string
 */
function my_navigation_template( $template, $class ){
    return '
            <nav class="%1$s blog__pagination" role="navigation">
                <div class="blog__nav-links">%3$s</div>
            </nav>    
            ';
}

add_filter('navigation_markup_template', 'my_navigation_template', 10, 2 );

/**
 * Limit excerpt to a number of characters
 * added read more btn
 *
 * @param string $excerpt
 * @return string
 */

//function custom_short_excerpt($excerpt){
//    global $post;
//    return substr($excerpt, 0, 400).'...';
//    return substr($excerpt, 0, 200).'... <a class="article-preview__more" href="'.get_permalink($post->ID).'">Read More>></a>';
//
//}

function custom_short_excerpt($excerpt, $limit = 35) {
    $words = explode(' ', $excerpt);
    if (count($words) > $limit) {
        $excerpt = implode(' ', array_slice($words, 0, $limit));
        $excerpt .= ' ...';
    }
    return $excerpt;
}

add_filter('the_excerpt', 'custom_short_excerpt');

/**
 * added thumbnails for blog
 */
add_theme_support( 'post-thumbnails', array('post') );

/**
 * Custom excerpt for recent posts
 */
function the_recent_post_excerpt( $post ){
    $excerpt = $post['post_excerpt'] ? $post['post_excerpt'] : $post['post_content'];
    return substr(wp_strip_all_tags($excerpt), 0, 200).'... <a class="article-preview__more" href="'.get_permalink($post['ID']).'">Read More>></a>';
}

/**
 * get template part with custom data
 * @param $template
 * @param array $data
 */
function get_template_part_params($template, $data= array()){
    extract($data);
    require locate_template($template.'.php');
}


/**
 * Следующие две функции позволяют отделять заголовок от основного контента
 */

/**
 * get title
 * @param $text
 * @return string|string[]|null
 */
function getPageTitle($text){
    $pattern = '/<h1[^>]*>\s*(.*?)\s*<\/h1>/i';
    preg_match($pattern, $text, $matches);
    $h1 = preg_replace('/<h1[^>]*?>([\\s\\S]*?)<\/h1>/',
        '\\1', $matches[0]);
    return $h1;
}

/**
 * get content without page title
 * @param $text
 * @return string|string[]|null
 */
function removeTitleFromContent($text){
    if( is_page() && !is_front_page()) {
        $pattern = '/<h1[^>]*>\s*(.*?)\s*<\/h1>/i';
        $result = preg_replace($pattern, "", $text);
        return $result;
    }
    else{
        return $text;
    }
}

add_theme_support( 'post-thumbnails' );

//add_filter('the_content', 'removeTitleFromContent');

function my_myme_types($mime_types){
    $mime_types['svg'] = 'image/svg+xml'; //Adding svg extension
    return $mime_types;
}

add_filter('upload_mimes', 'my_myme_types', 1, 1);

function bg_color( $color = false, $echo = true ) {

    if ( empty( $color ) ) {
        return false;
    }

    $string = 'style="background-color: '.$color.'"';

    if ( $echo ) {
        echo $string;
    } else {
        return $string;
    }
}

if( function_exists('acf_add_options_page') ) {

    acf_add_options_page();

    acf_add_options_page(array(
        'page_title' 	=> 'Theme Options',
        'menu_title'	=> 'Theme Options',
        'menu_slug' 	=> 'theme-options',
        'parent_slug'   => '',
        'capability'	=> 'edit_posts',
        'redirect'		=> false
    ));
    acf_add_options_page(array(
        'page_title' 	=> 'Наші Партнери',
        'menu_title'	=> 'Наші Партнери',
        'menu_slug' 	=> 'theme-options-our-partners',
        'capability'	=> 'edit_posts',
        'parent_slug'   => 'theme-options',
    ));
    acf_add_options_page(array(
        'page_title' 	=> 'Волонтерська спільнота',
        'menu_title'	=> 'Волонтерська спільнота',
        'menu_slug' 	=> 'theme-options-about-volunteering',
        'capability'	=> 'edit_posts',
        'parent_slug'   => 'theme-options',
    ));
    acf_add_options_page(array(
        'page_title' 	=> 'БФ “Запорука” у ЗМІ',
        'menu_title'	=> 'БФ “Запорука” у ЗМІ',
        'menu_slug' 	=> 'theme-options-media',
        'capability'	=> 'edit_posts',
        'parent_slug'   => 'theme-options',
    ));
    acf_add_options_page(array(
        'page_title' 	=> 'Звіт БФ «Запорука»',
        'menu_title'	=> 'Звіт БФ «Запорука»',
        'menu_slug' 	=> 'theme-options-block-report',
        'capability'	=> 'edit_posts',
        'parent_slug'   => 'theme-options',
    ));
    acf_add_options_page(array(
        'page_title' 	=> 'Діти',
        'menu_title'	=> 'Діти',
        'menu_slug' 	=> 'theme-options-children',
        'capability'	=> 'edit_posts',
        'parent_slug'   => 'theme-options',
    ));
    acf_add_options_page(array(
        'page_title' 	=> 'Приєднатися',
        'menu_title'	=> 'Приєднатися',
        'menu_slug' 	=> 'theme-options-join',
        'capability'	=> 'edit_posts',
        'parent_slug'   => 'theme-options',
    ));
    acf_add_options_page(array(
        'page_title' 	=> 'FAQ категорій проєктів',
        'menu_title'	=> 'FAQ категорій проєктів',
        'menu_slug' 	=> 'theme-options-projects-category-faq',
        'capability'	=> 'edit_posts',
        'parent_slug'   => 'theme-options',
    ));
}

/**
 * Get Post Featured image
 *
 * @var int $id Post id
 * @var string $size = 'full' featured image size
 *
 * @return string Post featured image url
 * @author DimonPDAA
 */
function get_attached_img_url( $id = 0, $size = "medium_large" ) {
    $img = wp_get_attachment_image_src( get_post_thumbnail_id( $id ), $size );

    return $img[0];
}

add_filter('use_block_editor_for_post', '__return_false');


add_action( 'wp_footer', function () {
    ?>
    <script>
        document.addEventListener( 'wpcf7mailsent', function ( event ) {
            dataLayer.push({
                'event' : 'form_send',
                'formId' : event.detail.contactFormId
            });
        }, false );
    </script>
    <?php
}, 10, 0 );


/*-------------------------------------------------------------
Set post Views for BLOG post
-------------------------------------------------------------*/
function getPostViews($postID)
{
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if ($count == '') {
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return "0";
    } else {
        if ($count > 1000) {
            return round ( $count / 1000 ,1 ).'K';
        }
    }
    return $count;
}

function setPostViews($postID)
{
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if ($count == '') {
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    } else {
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}

function add_preview_post_meta_box() {
    add_meta_box(
        'preview_post_meta_box',
        'Preview Post',
        'render_preview_post_meta_box',
        'post',
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'add_preview_post_meta_box');

function render_preview_post_meta_box($post) {
    $preview_post_id = get_post_meta($post->ID, 'preview_post_id', true);
    wp_nonce_field('preview_post_meta_box_nonce', 'preview_post_meta_box_nonce');
    ?>
    <p>
        <label for="preview_post_id">Select Preview Post:</label>
        <br />
        <select name="preview_post_id" id="preview_post_id">
            <option value="">Select a Post</option>
            <?php
            $posts = get_posts(array(
                'post_type' => 'post',
                'numberposts' => -1,
                'orderby' => 'title',
                'order' => 'ASC'
            ));
            foreach ($posts as $post) {
                $selected = ($preview_post_id == $post->ID) ? 'selected' : '';
                echo '<option value="' . $post->ID . '" ' . $selected . '>' . $post->post_title . '</option>';
            }
            ?>
        </select>
    </p>
    <?php
}

function save_preview_post_meta($post_id) {
    if (!isset($_POST['preview_post_meta_box_nonce']) || !wp_verify_nonce($_POST['preview_post_meta_box_nonce'], 'preview_post_meta_box_nonce')) {
        return;
    }
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }
    if (isset($_POST['preview_post_id'])) {
        update_post_meta($post_id, 'preview_post_id', $_POST['preview_post_id']);
    } else {
        delete_post_meta($post_id, 'preview_post_id');
    }
}
add_action('save_post', 'save_preview_post_meta');


add_filter('get_avatar', 'custom_get_avatar', 10, 5);
function custom_get_avatar($avatar, $id_or_email, $size, $default, $alt) {
    if (is_numeric($size)) {
        $size = 'full';
    }

    return $avatar;
}

function remove_next_link_taxonomy() {
    if (get_post_type() == 'integration') {
        remove_action('wp_head', 'adjacent_posts_rel_link', 10);
    }
}
add_action('wp', 'remove_next_link_taxonomy');

function remove_empty_toc($content) {
    if (is_singular('post')) {
        global $post;
        $has_h2 = preg_match('/<h2[^>]*>/', $post->post_content);
        if (!$has_h2) {
            remove_filter('the_content', 'toc_display');
        }
    }
    return $content;
}
add_filter('the_content', 'remove_empty_toc', 9999);

function add_custom_media_fields($form_fields, $post) {
    $form_fields['photo_category'] = array(
        'label' => 'Category',
        'input' => 'text',
        'value' => get_post_meta($post->ID, 'photo_category', true),
    );
    $form_fields['name_category'] = array(
        'label' => 'Name Category',
        'input' => 'text',
        'value' => get_post_meta($post->ID, 'name_category', true),
    );
    return $form_fields;
}
add_filter('attachment_fields_to_edit', 'add_custom_media_fields', 10, 2);

function save_custom_media_fields($post, $attachment) {
    if (isset($attachment['photo_category'])) {
        update_post_meta($post['ID'], 'photo_category', sanitize_text_field($attachment['photo_category']));
    }
    if (isset($attachment['name_category'])) {
        update_post_meta($post['ID'], 'name_category', sanitize_text_field($attachment['name_category']));
    }
    return $post;
}
add_filter('attachment_fields_to_save', 'save_custom_media_fields', 10, 2);

function wp_nav_menu_no_current_link( $atts, $item, $args, $depth ) {
    if ( $item->current ) $atts['href'] = '';
    return $atts;
}
add_action( 'nav_menu_link_attributes', 'wp_nav_menu_no_current_link', 10, 4 );

add_filter( 'upload_mimes', 'svg_upload_allow' );

function svg_upload_allow( $mimes ) {
    $mimes['svg']  = 'image/svg+xml';

    return $mimes;
}

function wpspec_menu_desc( $item_output, $item, $depth, $args ) {
    if ($item->description) {
        $item_output = str_replace( '</a>', '<span class="description">' . $item->description . '</span></a>', $item_output );
    }

    return $item_output;
}

add_filter( 'walker_nav_menu_start_el', 'wpspec_menu_desc', 10, 4 );


//Custom post type projects
add_action('init', 'register_projects');
function register_projects()
{
    $labels = array(
        'name' => _x('Проєкти', 'post type general name', 'obp_front'),
        'singular_name' => _x('Проєкти', 'post type singular name', 'obp_front'),
        'menu_name' => _x('Проєкти', 'admin menu', 'obp_front'),
        'name_admin_bar' => _x('Проєкти', 'add new on admin bar', 'obp_front'),
        'add_new' => _x('Add New', 'Проєкти', 'obp_front'),
        'add_new_item' => __('Додати новий Проєкт', 'obp_front'),
        'new_item' => __('Новий Проєкт', 'obp_front'),
        'edit_item' => __('Редагувати Проєкт', 'obp_front'),
        'view_item' => __('Переглянути Проєкт', 'obp_front'),
        'all_items' => __('Всі Проєкти', 'obp_front'),
        'search_items' => __('Пошук Проєктів', 'obp_front'),
        'parent_item_colon' => __('Parent Services:', 'obp_front'),
        'not_found' => __('Проєкта не знайдено', 'obp_front'),
        'not_found_in_trash' => __('Немає жодного проєкту у кошику.', 'obp_front')
    );
    $args = array(
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'query_var' => true,
        'rewrite' => true,
        'capability_type' => 'post',
        'has_archive' => false,
        'hierarchical' => false,
        'menu_position' => 5,
        'show_in_rest' => true,
        'taxanomies' => array('projects-category'),
        'supports' => array('title', 'editor', 'author', 'thumbnail'),
    );
    register_post_type('projects', $args);
}
function tr_create_projects_taxonomy()
{
    register_taxonomy(
        'projects-category',
        'projects',
        array(
            'label' => __('Категорії проєктів'),
            'rewrite' => array('slug' => 'projects-category'),
            'show_in_rest' => true,
            'hierarchical' => true,
        )
    );
}
add_action('init', 'tr_create_projects_taxonomy');


function custom_gallery_output($output, $atts, $instance) {
    $ids = explode(',', $atts['ids']);
    $output = '<div class="gallery-slider">';

    foreach ($ids as $id) {
        $img_url = wp_get_attachment_image_url($id, 'full');
        $output .= '<div class="gallery-slide"><img src="' . esc_url($img_url) . '" alt=""></div>';
    }

    $output .= '</div>';

    return $output;
}
add_filter('post_gallery', 'custom_gallery_output', 10, 3);

function add_transactions_menu() {
    add_menu_page(
        'Транзакції', // Название страницы
        'Транзакції', // Название в меню
        'manage_options', // Права доступа
        'transactions_page', // Уникальный идентификатор
        'display_transactions_table', // Функция для вывода содержимого
        'dashicons-money', // Иконка
        8 // Позиция в меню
    );
}

add_action('admin_menu', 'add_transactions_menu');


function display_transactions_table() {
    global $wpdb;

    $per_page = 10;

    $paged = isset($_GET['paged']) ? intval($_GET['paged']) : 1;

    $offset = ($paged - 1) * $per_page;

    // Обновленный запрос с JOIN для добавления post_excerpt из таблицы zprk_posts
    $transactions = $wpdb->get_results(
        $wpdb->prepare(
            "SELECT t.*, p.post_title
            FROM zprk_liqpay t
            LEFT JOIN zprk_posts p ON t.project_id = p.id
            ORDER BY t.xdate DESC
            LIMIT %d, %d",
            $offset, $per_page
        ),
        ARRAY_A
    );

    // Получаем общее количество транзакций для пагинации
    $total_transactions = $wpdb->get_var("SELECT COUNT(*) FROM zprk_liqpay order by xdate DESC");

    if ($transactions) {
        echo '<div class="wrap">';
        echo '<h1>Список транзакцій</h1>';

        // Добавляем кнопку для добавления новой транзакции
        echo '<a href="' . admin_url('admin.php?page=add_transaction') . '" class="button-primary">Додати нову транзакцію</a><br><br>';

        echo '<table class="wp-list-table widefat fixed striped">';
        echo '<thead>';
        echo '<tr>';
        echo '<th>ID</th>';
        echo '<th>Ідентифікатор liqpay</th>';
        echo '<th>Ідентифікатор проекту</th>';
        echo '<th>Ідентифікатор підписки</th>';
        echo '<th>Дата транзакції</th>';
        echo '<th>Статус</th>';
        echo '<th>Email</th>';
        echo '<th>Сума</th>';
        echo '<th>Валюта</th>';
        echo '<th>Метод оплати</th>';
        echo '<th>Номер телефону</th>';
        echo '<th>Коментарі</th>';
        echo '<th>Деталі конвертації</th>';
        echo '<th>Опис проекту</th>';
        echo '<th>Активна транзакція</th>';
        echo '<th>Редагувати</th>';
        echo '</tr>';
        echo '</thead>';
        echo '<tbody>';

        // Проходим по всем транзакциям и выводим их данные
        foreach ($transactions as $transaction) {
            // Проверяем на NULL для post_excerpt и заменяем на 'Не указано'
            $post_title = $transaction['post_title'] ? esc_html($transaction['post_title']) : 'Не вказано';
            $is_active = $transaction['is_active'] ? 'Так' : 'Ні';

            echo '<tr>';
            echo '<td>' . esc_html($transaction['id']) . '</td>';
            echo '<td>' . esc_html($transaction['order_id']) . '</td>';
            echo '<td>' . esc_html($transaction['project_id']) . '</td>';
            echo '<td>' . esc_html($transaction['subscription_id']) . '</td>';
            echo '<td>' . esc_html($transaction['xdate']) . '</td>';
            echo '<td>' . esc_html($transaction['status'] ?? '') . '</td>';
            echo '<td>' . esc_html($transaction['email']) . '</td>';
            echo '<td>' . esc_html($transaction['summa']) . '</td>';
            echo '<td>' . esc_html($transaction['valuta']) . '</td>';
            echo '<td>' . esc_html($transaction['payment_method']) . '</td>';
            echo '<td>' . esc_html($transaction['sender_phone']) . '</td>';
            echo '<td>' . esc_html($transaction['comments']) . '</td>';
            echo '<td>' . esc_html($transaction['payment_note']) . '</td>';
            echo '<td>' . $post_title . '</td>';  // Выводим post_excerpt или 'Не вказано'
            echo '<td>' . $is_active . '</td>';
            echo '<td><a href="' . admin_url('admin.php?page=edit_transaction&id=' . esc_attr($transaction['id'])) . '">Редагувати</a></td>';
            echo '</tr>';
        }

        echo '</tbody>';
        echo '</table>';

        // Пагинация
        $total_pages = ceil($total_transactions / $per_page);

        if ($total_pages > 1) {
            $current_page = max(1, $paged);
            $pagination = paginate_links(array(
                'base' => add_query_arg('paged', '%#%'),
                'format' => '',
                'prev_text' => '&laquo; Попередня',
                'next_text' => 'Наступна &raquo;',
                'total' => $total_pages,
                'current' => $current_page,
            ));
            echo '<div class="tablenav"><div class="tablenav-pages">' . $pagination . '</div></div>';
        }

        echo '</div>';
    } else {
        echo '<p>Транзакції не знайдено.</p>';
    }
}

function edit_transaction_page() {
    global $wpdb;

    $transaction_id = isset($_GET['id']) ? intval($_GET['id']) : 0;
    $projects = get_active_projects();

    if ($transaction_id) {
        $transaction = $wpdb->get_row($wpdb->prepare("SELECT * FROM zprk_liqpay WHERE id = %d", $transaction_id), ARRAY_A);

        if ($transaction) {
            ?>
            <div class="wrap">
                <h1>Редагування транзакції</h1>
                <form method="post" action="">
                    <table class="form-table">
                        <tr>
                            <th><label for="project_id">Проект</label></th>
                            <td>
                                <select name="project_id" required>
                                    <option value=""> Оберіть проєкт </option>
                                    <?php foreach ($projects as $project): ?>
                                        <option value="<?php echo esc_attr($project->ID); ?>"
                                            <?php selected((int)($transaction['project_id'] ?? 0), (int)$project->ID); ?>>
                                            <?php echo esc_html($project->post_title); ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </td>

                        </tr>
                        <tr>
                            <th><label for="summa">Сума</label></th>
                            <td><input type="number" step="0.01" name="summa" value="<?php echo esc_attr($transaction['summa']); ?>" class="regular-text" required></td>
                        </tr>
                        <tr>
                            <th><label for="status">Статус</label></th>
                            <td><input type="text" name="status" value="<?php echo esc_attr($transaction['status']); ?>" class="regular-text" required></td>
                        </tr>
                        <tr>
                            <th><label for="email">Email</label></th>
                            <td><input type="email" name="email" value="<?php echo esc_attr($transaction['email']); ?>" class="regular-text" required></td>
                        </tr>
                        <tr>
                            <th><label for="comments">Коментарі</label></th>
                            <td><textarea name="comments" class="regular-text"><?php echo esc_textarea($transaction['comments']); ?></textarea></td>
                        </tr>
                        <tr>
                            <th><label for="is_active">Активна транзакція</label></th>
                            <td><input type="checkbox" name="is_active" value="1" <?php checked($transaction['is_active'], 1); ?>></td>
                        </tr>
                    </table>
                    <input type="submit" name="save_transaction" class="button-primary" value="Зберегти">
                </form>
            </div>
            <?php

            if (isset($_POST['save_transaction'])) {
                $is_active = isset($_POST['is_active']) ? 1 : 0;
                $wpdb->update(
                    'zprk_liqpay',
                    array(
                        'order_id' => sanitize_text_field($_POST['order_id']),
                        'project_id' => intval($_POST['project_id']),
                        'summa' => floatval($_POST['summa']),
                        'status' => sanitize_text_field($_POST['status']),
                        'email' => sanitize_email($_POST['email']),
                        'comments' => sanitize_textarea_field($_POST['comments']),
                        'is_active' => $is_active,
                    ),
                    array('id' => $transaction_id),
                    array('%s', '%d', '%f', '%s', '%s', '%s'),
                    array('%d')
                );

                echo '<div class="updated"><p>Транзакція оновлена!</p></div>';
            }
        } else {
            echo '<p>Транзакцію не знайдено.</p>';
        }
    } else {
        echo '<p>Невірний ID транзакції.</p>';
    }
}

// Добавляем обработчик для редактирования страницы
function add_edit_transaction_page() {
    if (isset($_GET['page']) && $_GET['page'] == 'edit_transaction') {
        add_submenu_page(
            null,
            'Редагування транзакції',
            'Редагувати транзакцію',
            'manage_options',
            'edit_transaction',
            'edit_transaction_page'
        );
    }
}

add_action('admin_menu', 'add_edit_transaction_page');


function add_transaction_page() {
    global $wpdb;

    if (isset($_POST['add_transaction'])) {
        // Validate and sanitize form data
        $project_id = intval($_POST['project_id']);
        $summa = floatval($_POST['summa']);
        $status = sanitize_text_field($_POST['status']);
        $email = sanitize_email($_POST['email']);
        $comments = sanitize_textarea_field($_POST['comments']);
        $is_active = isset($_POST['is_active']) ? 1 : 0;

        // Insert new transaction into database
        $wpdb->insert(
            'zprk_liqpay',
            [
                'project_id' => $project_id,
                'summa' => $summa,
                'status' => $status,
                'email' => $email ?? '',
                'comments' => $comments,
                'is_active' => $is_active,
                'xdate' => date('Y-m-d H:i:s'),
                'created_at' => date('Y-m-d H:i:s'),
            ],
            array('%s', '%d', '%f', '%s', '%s', '%s', '%s', '%s')
        );
        $meta_table = $wpdb->prefix .'postmeta';
        // Получение значения meta
        $get_meta = function($key) use ($wpdb, $meta_table, $project_id) {
            return $wpdb->get_var(
                $wpdb->prepare("
                SELECT meta_value
                FROM $meta_table
                WHERE post_id = %d AND meta_key = %s
                LIMIT 1
            ", $project_id, $key)
            );
        };
        $total_collected = floatval($get_meta('total-collected'));

        $new_total = $total_collected + $summa;

        $wpdb->update(
            $meta_table,
            ['meta_value' => $new_total],
            ['post_id' => $project_id, 'meta_key' => 'total-collected']
        );

        echo '<div class="updated"><p>Транзакція додана!</p></div>';
    }
    $projects = get_active_projects()
    ?>
    <div class="wrap">
        <h1>Додавання нової транзакції</h1>
        <form method="post" action="">
            <table class="form-table">
                <tr>
                    <th><label for="project_id">Проект</label></th>
                    <td>
                        <select name="project_id" required>
                            <option value=""> Оберіть проєкт </option>
                            <?php foreach ($projects as $project): ?>
                                <option value="<?php echo esc_attr($project->ID); ?>" <?php selected($transaction['project_id'] ?? '', $project->ID); ?>>
                                    <?php echo esc_html($project->post_title); ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <th><label for="summa">Сума</label></th>
                    <td><input type="number" step="0.01" name="summa" class="regular-text" required></td>
                </tr>
                <tr>
                    <th><label for="status">Статус</label></th>
                    <td><input type="text" name="status" class="regular-text" required></td>
                </tr>
                <tr>
                    <th><label for="email">Email</label></th>
                    <td><input type="email" name="email" class="regular-text"></td>
                </tr>
                <tr>
                    <th><label for="comments">Коментарі</label></th>
                    <td><textarea name="comments" class="regular-text"></textarea></td>
                </tr>
                <tr>
                    <th><label for="is_active">Активна транзакція</label></th>
                    <td><input type="checkbox" name="is_active" value="1"></td>
                </tr>
            </table>
            <input type="submit" name="add_transaction" class="button-primary" value="Додати">
        </form>
    </div>
    <?php
}

function get_active_projects()
{
    global $wpdb;
    return $wpdb->get_results("
    SELECT p.ID, p.post_title
    FROM {$wpdb->prefix}posts p
    JOIN {$wpdb->prefix}postmeta m ON p.ID = m.post_id
    WHERE p.post_type = 'projects'
      AND m.meta_key = 'single_project_type'
      AND m.meta_value = 'active'
    ORDER BY p.ID DESC
");

}

// Add the "Add Transaction" page to the admin menu
function add_add_transaction_page() {
    add_submenu_page(
        'tools.php',  // Parent menu
        'Додавання транзакції',  // Page title
        'Додати транзакцію',  // Menu title
        'manage_options',  // Capability
        'add_transaction',  // Menu slug
        'add_transaction_page'  // Callback function to display the form
    );
}

add_action('admin_menu', 'add_add_transaction_page');


function add_subscriptions_menu() {
    add_menu_page(
        'Підписки',
        'Підписки',
        'manage_options',
        'subscriptions_page',
        'display_subscriptions_table',
        'dashicons-email',
        9
    );
}

add_action('admin_menu', 'add_subscriptions_menu');

// Функция для отображения таблицы подписок с пагинацией
function display_subscriptions_table() {
    global $wpdb;

    // Количество записей на страницу
    $per_page = 10;

    // Получаем текущую страницу
    $paged = isset($_GET['paged']) ? intval($_GET['paged']) : 1;

    // Рассчитываем смещение
    $offset = ($paged - 1) * $per_page;

    // Получаем данные подписок из базы данных, сортируем по id и добавляем пагинацию
    $subscriptions = $wpdb->get_results(
        $wpdb->prepare(
            "SELECT * FROM zprk_subscriptions ORDER BY id DESC LIMIT %d, %d",
            $offset, $per_page
        ),
        ARRAY_A
    );

    // Получаем общее количество подписок для пагинации
    $total_subscriptions = $wpdb->get_var("SELECT COUNT(*) FROM zprk_subscriptions");

    // Проверка на наличие данных в таблице
    if ($subscriptions) {
        echo '<div class="wrap">';
        echo '<h1>Список підписок</h1>';
        echo '<table class="wp-list-table widefat fixed striped">';
        echo '<thead>';
        echo '<tr>';
        echo '<th>ID</th>';
        echo '<th>Сума</th>';
        echo '<th>Валюта</th>';
        echo '<th>Email</th>';
        echo '<th>Статус</th>';
        echo '<th>Номер телефону</th>';
        echo '<th>Орієнтовні платіжні суми</th>';
        echo '<th>Редагувати</th>';
        echo '</tr>';
        echo '</thead>';
        echo '<tbody>';

        // Проходим по всем подпискам и выводим их данные
        foreach ($subscriptions as $subscription) {
            echo '<tr>';
            echo '<td>' . esc_html($subscription['id']) . '</td>';
            echo '<td>' . esc_html($subscription['amount']) . '</td>';
            echo '<td>' . esc_html($subscription['currency']) . '</td>';
            echo '<td>' . esc_html($subscription['email']) . '</td>';
            echo '<td>' . esc_html($subscription['status']) . '</td>';
            echo '<td>' . esc_html($subscription['phone_number']) . '</td>';
            echo '<td>' . esc_html($subscription['total_charges']) . '</td>';
            echo '<td><a href="' . admin_url('admin.php?page=edit_subscription&id=' . esc_attr($subscription['id'])) . '">Редагувати</a></td>';
            echo '</tr>';
        }

        echo '</tbody>';
        echo '</table>';

        // Пагинация
        $total_pages = ceil($total_subscriptions / $per_page);

        if ($total_pages > 1) {
            $current_page = max(1, $paged);
            $pagination = paginate_links(array(
                'base' => add_query_arg('paged', '%#%'),
                'format' => '',
                'prev_text' => '&laquo; Попередня',
                'next_text' => 'Наступна &raquo;',
                'total' => $total_pages,
                'current' => $current_page,
            ));
            echo '<div class="tablenav"><div class="tablenav-pages">' . $pagination . '</div></div>';
        }

        echo '</div>';
    } else {
        echo '<p>Підписок не знайдено.</p>';
    }
}

function add_edit_subscription_page() {
    if (isset($_GET['page']) && $_GET['page'] == 'subscriptions_page') {
        add_submenu_page(
            'subscriptions_page',
            'Редагування підписки',
            'Редагувати підписку',
            'manage_options',
            'edit_subscription',
            'edit_subscription_page'
        );
    }
}

add_action('admin_menu', 'add_edit_subscription_page');

function edit_subscription_page() {
    global $wpdb;

    $subscription_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

    if ($subscription_id) {
        $subscription = $wpdb->get_row($wpdb->prepare("SELECT * FROM zprk_subscriptions WHERE id = %d", $subscription_id), ARRAY_A);

        if ($subscription) {
            ?>
            <div class="wrap">
                <h1>Редагування підписки</h1>
                <form method="post" action="">
                    <table class="form-table">
                        <tr>
                            <th><label for="amount">Сума</label></th>
                            <td><input type="text" name="amount" value="<?php echo esc_attr($subscription['amount']); ?>" class="regular-text" required></td>
                        </tr>
                        <tr>
                            <th><label for="currency">Валюта</label></th>
                            <td><input type="text" name="currency" value="<?php echo esc_attr($subscription['currency']); ?>" class="regular-text" required></td>
                        </tr>
                        <tr>
                            <th><label for="email">Email</label></th>
                            <td><input type="email" name="email" value="<?php echo esc_attr($subscription['email']); ?>" class="regular-text" required></td>
                        </tr>
                        <tr>
                            <th><label for="status">Статус</label></th>
                            <td><input type="text" name="status" value="<?php echo esc_attr($subscription['status']); ?>" class="regular-text" required></td>
                        </tr>
                        <tr>
                            <th><label for="phone_number">Номер телефону</label></th>
                            <td><input type="text" name="phone_number" value="<?php echo esc_attr($subscription['phone_number']); ?>" class="regular-text" required></td>
                        </tr>
                        <tr>
                            <th><label for="total_charges">Орієнтовні платіжні суми</label></th>
                            <td><input type="text" name="total_charges" value="<?php echo esc_attr($subscription['total_charges']); ?>" class="regular-text" required></td>
                        </tr>
                    </table>
                    <input type="submit" name="save_subscription" class="button-primary" value="Зберегти">
                </form>
            </div>
            <?php

            if (isset($_POST['save_subscription'])) {
                $wpdb->update(
                    'zprk_subscriptions',
                    array(
                        'amount' => floatval($_POST['amount']),
                        'currency' => sanitize_text_field($_POST['currency']),
                        'email' => sanitize_email($_POST['email']),
                        'status' => sanitize_text_field($_POST['status']),
                        'phone_number' => sanitize_text_field($_POST['phone_number']),
                        'total_charges' => floatval($_POST['total_charges']),
                    ),
                    array('id' => $subscription_id),
                    array('%f', '%s', '%s', '%s', '%s', '%f'),
                    array('%d')
                );

                echo '<div class="updated"><p>Підписка оновлена!</p></div>';
            }
        } else {
            echo '<p>Підписку не знайдено.</p>';
        }
    } else {
        echo '<p>Невірний ID підписки.</p>';
    }
}

add_action('admin_menu', 'zprk_register_donation_page');

function zprk_register_donation_page() {
    add_menu_page(
        'Розподіл внесків',
        'Переноси внесків',
        'manage_options',
        'zprk-donations',
        'zprk_render_donations_page',
        'dashicons-money-alt',
        10
    );
}

function zprk_render_donations_page() {
    global $wpdb;
    $table = $wpdb->prefix . 'donation_allocations';

    $per_page = 20;
    $current_page = isset($_GET['paged']) ? max(1, intval($_GET['paged'])) : 1;
    $offset = ($current_page - 1) * $per_page;

    // Обработка обновления
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_id'])) {
        $update_id = intval($_POST['update_id']);
        $updated_data = [
            'amount'         => floatval($_POST['amount']),
            'comment'        => sanitize_text_field($_POST['comment']),
            'project_id'     => intval($_POST['project_id']),
            'transaction_id' => sanitize_text_field($_POST['transaction_id']),
        ];

        $wpdb->update(
            $table,
            $updated_data,
            ['id' => $update_id],
            ['%f', '%s', '%d', '%s'],
            ['%d']
        );

        echo '<div class="notice notice-success is-dismissible"><p>Запис успішно оновлено.</p></div>';
    }

    // Получаем записи
    $rows = $wpdb->get_results(
        $wpdb->prepare("SELECT * FROM $table ORDER BY created_at DESC LIMIT %d OFFSET %d", $per_page, $offset),
        ARRAY_A
    );

    // Общее количество записей
    $total_items = $wpdb->get_var("SELECT COUNT(*) FROM $table");
    $total_pages = ceil($total_items / $per_page);

    // Отрисовка таблицы
    echo '<div class="wrap"><h1>Розподіл внесків</h1>';
    echo '<table class="widefat fixed striped">';
    echo '<thead><tr><th>ID</th><th>Сума</th><th>Коментар</th><th>ID проєкту</th><th>ID транзакції</th><th>Дата</th><th>Дія</th></tr></thead>';
    echo '<tbody>';

    foreach ($rows as $row) {
        echo '<tr>';
        echo '<form method="post">';
        echo '<td>' . esc_html($row['id']) . '<input type="hidden" name="update_id" value="' . esc_attr($row['id']) . '"></td>';
        echo '<td><input type="number" step="0.01" name="amount" value="' . esc_attr($row['amount']) . '" /></td>';
        echo '<td><input type="text" name="comment" value="' . esc_attr($row['comment']) . '" /></td>';
        echo '<td><input type="number" name="project_id" value="' . esc_attr($row['project_id']) . '" /></td>';
        echo '<td><input type="text" name="transaction_id" value="' . esc_attr($row['transaction_id']) . '" /></td>';
        echo '<td>' . esc_html($row['created_at']) . '</td>';
        echo '<td><input type="submit" class="button button-primary" value="Оновити"></td>';
        echo '</form>';
        echo '</tr>';
    }

    echo '</tbody></table>';

    // Пагинация
    $base_url = admin_url('admin.php?page=zprk-donations');
    echo '<div class="tablenav"><div class="tablenav-pages">';

    if ($current_page > 1) {
        echo '<a class="button" href="' . esc_url(add_query_arg('paged', $current_page - 1, $base_url)) . '">&laquo; Назад</a> ';
    }

    echo '<span class="pagination-links"> Сторінка ' . $current_page . ' з ' . $total_pages . ' </span>';

    if ($current_page < $total_pages) {
        echo ' <a class="button" href="' . esc_url(add_query_arg('paged', $current_page + 1, $base_url)) . '">Вперед &raquo;</a>';
    }

    echo '</div></div></div>';
}

add_action('rest_api_init', function() {
    register_rest_route('zaporuka/v1', '/transactions', [
        'methods' => 'GET',
        'callback' => 'getLimitedTransactions',
        'permission_callback' => '__return_true',
    ]);
});

function getLimitedTransactions(WP_REST_Request $request) {
    global $wpdb;

    // SQL-запрос
    $sql = "
        SELECT
    project_id,
    summa,
    payment_note,
    comments,
    valuta,
    client,
    xdate
FROM (
    SELECT
        p.project_id,
        p.summa,
        p.payment_note,
        p.comments,
        p.client,
        p.xdate,
        p.valuta,
        @row_num := IF(@prev_project = p.project_id, @row_num + 1, 1) AS row_num,
        @prev_project := p.project_id
    FROM
        zprk_liqpay p
    CROSS JOIN (SELECT @row_num := 0, @prev_project := NULL) AS vars
    WHERE
        p.project_id IN (SELECT id FROM zprk_posts WHERE post_type = 'projects')
        AND p.is_active = TRUE
    ORDER BY
        p.project_id, p.xdate DESC
) AS RankedProjects
WHERE
    row_num <= 5
ORDER BY
    project_id, xdate DESC;

    ";

    // Выполняем запрос
    $results = $wpdb->get_results($sql);

    if ($results) {
        return new WP_REST_Response($results, 200);
    } else {
        return new WP_REST_Response(['message' => 'No active projects found.'], 404);
    }
}

add_action('acf/input/admin_footer', 'disable_total_collected_field');
function disable_total_collected_field() {
    ?>
    <script type="text/javascript">
        (function($) {
            acf.addAction('ready', function() {
                var field1 = acf.getField('field_68249fb90b291');
                var field2 = acf.getField('field_682d9dddf654b');

                if (field1) {
                    field1.$input().attr('readonly', true);
                }

                if (field2) {
                    field2.$input().attr('readonly', true);
                }
            });
        })(jQuery);
    </script>
    <?php
}

add_filter('post_row_actions', 'add_duplicate_post_link', 10, 2);
function add_duplicate_post_link($actions, $post)
{
    if ($post->post_type !== 'projects') {
        return $actions;
    }

    if (current_user_can('edit_posts')) {
        $url = wp_nonce_url(
            admin_url('admin.php?action=duplicate_post_as_draft&post=' . $post->ID),
            basename(__FILE__),
            'duplicate_nonce'
        );
        $actions['duplicate'] = '<a href="' . $url . '" title="Клонувати цей запис" rel="permalink">Клонувати</a>';
    }

    return $actions;
}

add_action('admin_action_duplicate_post_as_draft', 'duplicate_post_as_draft');

function duplicate_post_as_draft()
{
    if (
        !isset($_GET['post']) ||
        !isset($_GET['duplicate_nonce']) ||
        !wp_verify_nonce($_GET['duplicate_nonce'], basename(__FILE__))
    ) {
        wp_die('Недійсний запит.');
    }

    $post_id = absint($_GET['post']);
    $post = get_post($post_id);

    if ($post && current_user_can('edit_posts')) {
        $new_post = array(
            'post_title'    => $post->post_title . ' (Копія)',
            'post_content'  => $post->post_content,
            'post_status'   => 'draft',
            'post_type'     => $post->post_type,
        );

        $new_post_id = wp_insert_post($new_post);

        $meta = get_post_meta($post_id);
        foreach ($meta as $key => $values) {
            foreach ($values as $value) {
                add_post_meta($new_post_id, $key, maybe_unserialize($value));
            }
        }

        wp_redirect(admin_url('post.php?action=edit&post=' . $new_post_id));
        exit;
    }
}
