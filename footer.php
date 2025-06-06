</main><?php // main-container end ?>

<footer class="footer">
    <div class="container">
        <?php if (is_front_page()) : ?>
            <div class="logo">
                <?php echo file_get_contents(get_theme_file_path("./img/logo/logo.svg")); ?>
            </div>
        <?php else : ?>
            <a href="/" class="logo">
                <?php echo file_get_contents(get_theme_file_path("./img/logo/logo.svg")); ?>
            </a>
        <?php endif; ?>
        <div class="footer__content d-flex --just-space --align-stretch">
            <div class="footer__content_menu--item">
                <a href="https://www.facebook.com/Zaporuka" class="footer__content_menu--link fb" target="_blank"></a>
                <a href="https://www.instagram.com/zaporuka/" class="footer__content_menu--link inst" target="_blank"></a>
                <a href="https://www.youtube.com/channel/UCKp8SRgi3Gb-HJjgpq3Azmg" class="footer__content_menu--link yt" target="_blank"></a>
                <a href="https://t.me/zaporuka_bot" class="footer__content_menu--link tg" target="_blank"></a>
                <a href="viber://pa?chatURI=zaporuka/" class="footer__content_menu--link vb" target="_blank"></a>
            </div>
            <div class="footer__content_menu--item">
                <div class="footer__content_menu--title">
                    Про нас
                </div>
                <ul>
                    <?php if (has_nav_menu('footer_menu_about')) :
                        $nav_args = array(
                            'theme_location' => 'footer_menu_about',
                            'container' => '',
                            'items_wrap' => '%3$s',
                            'depth' => 2
                        );
                        wp_nav_menu($nav_args);
                    endif; ?>
                </ul>
            </div>
            <div class="footer__content_menu--item">
                <div class="footer__content_menu--title">
                    Діяльність
                </div>
                <ul>
                    <?php if (has_nav_menu('footer_menu_activity')) :
                        $nav_args = array(
                            'theme_location' => 'footer_menu_activity',
                            'container' => '',
                            'items_wrap' => '%3$s',
                            'depth' => 2
                        );
                        wp_nav_menu($nav_args);
                    endif; ?>
                </ul>
            </div>
            <div class="footer__content_menu--item">
                <div class="footer__content_menu--title">
                    Допомогти
                </div>
                <ul>
                    <?php if (has_nav_menu('footer_menu_help')) :
                        $nav_args = array(
                            'theme_location' => 'footer_menu_help',
                            'container' => '',
                            'items_wrap' => '%3$s',
                            'depth' => 2
                        );
                        wp_nav_menu($nav_args);
                    endif; ?>
                </ul>
            </div>
            <div class="footer__content_menu--item">
                <div class="footer__content_menu--title">
                    Контакти
                </div>
                <ul>
                    <li>
                        <a class="adress" href="https://maps.app.goo.gl/V6D4Jyiz7Q197xg69" target="_blank">Україна, Київ Верхній Вал 4А, 1 під’їзд, 3 поверх</a>
                    </li>
                    <li>
                        <a class="phone" href="tel:0443615697">+380 44 361 5697</a>
                    </li>
                    <li>
                        <a class="email" href="mailto:info@zaporuka.org.ua">info@zaporuka.org.ua</a>
                    </li>
                </ul>
            </div>
            <div class="footer__content_menu--item map">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2539.802466145847!2d30.506239576632577!3d50.463402971594604!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x40d4ce6bd7cb3821%3A0x352331df3c8a528e!2z0YPQuy4g0JLQtdGA0YXQvdC40Lkg0JLQsNC7LCA00JAsINCa0LjQtdCyLCAwNDA3MQ!5e0!3m2!1suk!2sua!4v1743676415352!5m2!1suk!2sua" width="300" height="100%" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
        <div class="footer__bottom d-flex --just-space --align-center">
            <div class="footer__bottom_copyright">
                © 2020 БФ “Запорука”
            </div>
            <div class="footer__bottom_support">
                Support by <a href="https://onebig.pro/" target="_blank">Onebig.pro</a>
            </div>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>

<div class="notification">
    <?php if (is_singular('projects')) : ?>
        Посилання успішно скопійовано
    <?php else : ?>
        Текст успішно скопійований
    <?php endif; ?>
</div>

</body>
</html>
