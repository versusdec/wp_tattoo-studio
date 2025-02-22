<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <?php wp_head(); ?>
  <meta charset="<?php bloginfo('charset'); ?>"
  ">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Tattoo Studio</title>
  <meta name="description" content="Best tattoo studio in town">
  <meta name="keywords" content="tattoo, ink, art, studio, neotrad, neotraditional">
  <meta name="robots" content="index, follow">
  <meta property="og:title" content="Tattoo Studio">
  <meta property="og:description" content="Best tattoo studio in town">
  <meta property="og:image" content="/assets/img/tattoos/tattoo-artist-makes-a-tattoo.jpg">
  <meta property="og:url" content="http://tattoostudio.infinityfreeapp.com/">
  <link rel="canonical" href="http://tattoostudio.infinityfreeapp.com/">
  <link rel="icon" type="image/png" href="<?php echo get_template_directory_uri() ?>/assets/img/favicon-96x96.png" sizes="96x96"/>
  <link rel="icon" type="image/svg+xml" href="<?php echo get_template_directory_uri() ?>/assets/img/favicon.svg"/>
  <link rel="shortcut icon" href="<?php echo get_template_directory_uri() ?>/assets/img/favicon.ico"/>
  <link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_template_directory_uri() ?>/assets/img/apple-touch-icon.png"/>
  <meta name="apple-mobile-web-app-title" content="Tattoo Studio"/>
  <link rel="manifest" href="<?php echo get_template_directory_uri() ?>/assets/img/site.webmanifest"/>
  <link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css"
  />
  <link href="https://fonts.googleapis.com/css2?family=Alegreya+Sans+SC:ital,wght@0,100;0,300;0,400;0,500;0,700;0,800;0,900;1,100;1,300;1,400;1,500;1,700;1,800;1,900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/style/main.css">
  <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
  <script src="<?php echo get_template_directory_uri() ?>/scripts/main.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js"></script>
  <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "Organization",
      "name": "Tattoo Studio",
      "url": "<?php echo home_url(); ?>",
      "logo": "<?php echo wp_get_attachment_image_src( get_theme_mod( 'custom_logo' ), 'full' )[0] ?>",
      "contactPoint": {
        "@type": "ContactPoint",
        "telephone": "+1-800-555-5555",
        "contactType": "Customer Service"
      },
      "sameAs": [
        "https://www.facebook.com/yourorganization",
        "https://twitter.com/yourorganization"
      ]
    }
  </script>
</head>
<body id="top" <?php body_class(); ?>>
<?php wp_body_open(); ?>
<header id="header" class="header">
  <div class="container">
    <a href="<?php echo (is_front_page()) ? '#top' : home_url(); ?>">
      <div class="logo">
        <img src="<?php echo wp_get_attachment_image_src( get_theme_mod( 'custom_logo' ), 'full' )[0] ?>" alt="<?php bloginfo('name') ?>">
      </div>
    </a>
    <nav>
        <?php
        wp_nav_menu([
            'theme_location' => 'header-menu',
            'container' => false,
            'menu_class' => '',
            'menu_id' => '',
            'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
        ]);
        ?>
    </nav>
    <div class="menu-btn">
      <span></span>
    </div>
  </div>
</header>