<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="icon" href="<?php bloginfo('template_url'); ?>/img/favicon.png">
    <title><?php wp_title(); ?></title>
    <script type="text/javascript"> (function(c,l,a,r,i,t,y){ c[a]=c[a]||function(){(c[a].q=c[a].q||[]).push(arguments)}; t=l.createElement(r);t.async=1;t.src="https://www.clarity.ms/tag/"+i; y=l.getElementsByTagName(r)[0];y.parentNode.insertBefore(t,y); })(window, document, "clarity", "script", "kzacesa8zw"); </script>

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-167950089-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-167950089-1');
    </script>

    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
                new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
            j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
            'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-TL47VVC');</script>
    <!-- End Google Tag Manager -->
    <script type="text/javascript">
        (function(c,l,a,r,i,t,y){
            c[a]=c[a]||function(){(c[a].q=c[a].q||[]).push(arguments)};
            t=l.createElement(r);t.async=1;t.src="https://www.clarity.ms/tag/"+i;
            y=l.getElementsByTagName(r)[0];y.parentNode.insertBefore(t,y);
        })(window, document, "clarity", "script", "j277jwyrnw");
    </script>

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<header class="header">
    <div class="container">
        <div class="navbar-header d-flex --just-space --align-center">
            <?php if (is_front_page()) : ?>
                <div class="logo">
                    <?php echo file_get_contents(get_theme_file_path("./img/logo/logo.svg")); ?>
                </div>
            <?php else : ?>
                <a href="/" class="logo">
                    <?php echo file_get_contents(get_theme_file_path("./img/logo/logo.svg")); ?>
                </a>
            <?php endif; ?>
            <div class="header__navigation d-flex --just-space --align-center visible-desktop">
                <ul class="header__navigation_list">

                    <?php if (has_nav_menu('header_menu')) :
                        $nav_args = array(
                            'theme_location' => 'header_menu',
                            'container' => '',
                            'items_wrap' => '%3$s',
                            'depth' => 2
                        );
                        wp_nav_menu($nav_args);
                    endif; ?>
                </ul>
            </div>
            <a href="<?php echo home_url('/dopomohti/'); ?>" class="btn btn-content">
                Підтримати
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                    <path d="M11.0025 1.71339C10.7175 1.42887 10.2555 1.42887 9.97049 1.71339C9.68551 1.99792 9.68551 2.45922 9.97049 2.74375L16.5085 9.27143H1.72973C1.32671 9.27143 1 9.59762 1 10C1 10.4024 1.32671 10.7286 1.72973 10.7286H16.5085L9.97049 17.2562C9.68551 17.5408 9.68551 18.0021 9.97049 18.2866C10.2555 18.5711 10.7175 18.5711 11.0025 18.2866L18.7863 10.5152C18.9288 10.3729 19 10.1865 19 10C19 9.90121 18.9803 9.80702 18.9446 9.72111C18.909 9.63518 18.8562 9.55467 18.7863 9.48482L11.0025 1.71339Z" fill="white"/>
                </svg>
            </a>
            <div class="header__hamburger js-hamburger visible-mob">
                <div class="hamburger-line1"></div>
                <div class="hamburger-line3"></div>
            </div>
        </div>
    </div>
</header>

<main id="main" class="main">
