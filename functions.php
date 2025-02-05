<?php
/**
 * tattoo studio functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package tattoo_studio
 */

if (!defined('_S_VERSION')) {
    // Replace the version number of the theme on each release.
    define('_S_VERSION', '1.0.0');
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function tattoo_studio_setup()
{
    /*
        * Make theme available for translation.
        * Translations can be filed in the /languages/ directory.
        * If you're building a theme based on tattoo studio, use a find and replace
        * to change 'tattoo-studio' to the name of your theme in all the template files.
        */
    load_theme_textdomain('tattoo-studio', get_template_directory() . '/languages');

    // Add default posts and comments RSS feed links to head.
    add_theme_support('automatic-feed-links');

    /*
        * Let WordPress manage the document title.
        * By adding theme support, we declare that this theme does not use a
        * hard-coded <title> tag in the document head, and expect WordPress to
        * provide it for us.
        */
    add_theme_support('title-tag');

    /*
        * Enable support for Post Thumbnails on posts and pages.
        *
        * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
        */
    add_theme_support('post-thumbnails');

    // This theme uses wp_nav_menu() in one location.
    register_nav_menus(
        array(
            'header-menu' => esc_html__('Primary', 'tattoo-studio'),
        )
    );

    /*
        * Switch default core markup for search form, comment form, and comments
        * to output valid HTML5.
        */
    add_theme_support(
        'html5',
        array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
            'style',
            'script',
        )
    );

    // Set up the WordPress core custom background feature.
    add_theme_support(
        'custom-background',
        apply_filters(
            'tattoo_studio_custom_background_args',
            array(
                'default-color' => 'ffffff',
                'default-image' => '',
            )
        )
    );

    // Add theme support for selective refresh for widgets.
    add_theme_support('customize-selective-refresh-widgets');

    /**
     * Add support for core custom logo.
     *
     * @link https://codex.wordpress.org/Theme_Logo
     */
    add_theme_support(
        'custom-logo',
        array(
            'height' => 250,
            'width' => 250,
            'flex-width' => true,
            'flex-height' => true,
        )
    );
}

add_action('after_setup_theme', 'tattoo_studio_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function tattoo_studio_content_width()
{
    $GLOBALS['content_width'] = apply_filters('tattoo_studio_content_width', 640);
}

add_action('after_setup_theme', 'tattoo_studio_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function tattoo_studio_widgets_init()
{
    register_sidebar(
        array(
            'name' => esc_html__('Sidebar', 'tattoo-studio'),
            'id' => 'sidebar-1',
            'description' => esc_html__('Add widgets here.', 'tattoo-studio'),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget' => '</section>',
            'before_title' => '<h2 class="widget-title">',
            'after_title' => '</h2>',
        )
    );
}

add_action('widgets_init', 'tattoo_studio_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function tattoo_studio_scripts()
{
    wp_enqueue_style('tattoo-studio-style', get_stylesheet_uri(), array(), _S_VERSION);
    wp_style_add_data('tattoo-studio-style', 'rtl', 'replace');

    wp_enqueue_script('tattoo-studio-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true);

    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}

add_action('wp_enqueue_scripts', 'tattoo_studio_scripts');

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if (defined('JETPACK__VERSION')) {
    require get_template_directory() . '/inc/jetpack.php';
}

function advantages_customizer($wp_customize)
{
    $wp_customize->add_section('advantages', array(
        'title' => __('Переваги', 'tattoostudio'),
        'priority' => 30,
    ));

    for ($i = 1; $i <= 4; $i++) {
        $wp_customize->add_setting("advantage_icon_$i", array('default' => '', 'transport' => 'refresh'));
        $wp_customize->add_setting("advantage_title_$i", array('default' => '', 'transport' => 'refresh'));
        $wp_customize->add_setting("advantage_desc_$i", array('default' => '', 'transport' => 'refresh'));

        $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, "advantage_icon_$i", array(
            'label' => __("Іконка $i", 'tattoostudio'),
            'section' => 'advantages',
            'settings' => "advantage_icon_$i",
        )));

        $wp_customize->add_control("advantage_title_$i", array(
            'label' => __("Заголовок $i", 'tattoostudio'),
            'section' => 'advantages',
            'type' => 'text',
        ));

        $wp_customize->add_control("advantage_desc_$i", array(
            'label' => __("Опис $i", 'tattoostudio'),
            'section' => 'advantages',
            'type' => 'textarea',
        ));
    }
}

add_action('customize_register', 'advantages_customizer');

function customize_video_section($wp_customize)
{
    $wp_customize->add_section('video_section', array(
        'title' => __('Відео', 'tattoostudio'),
        'priority' => 30,
    ));

    $wp_customize->add_setting('video_url', array(
        'default' => '',
        'transport' => 'refresh',
    ));

    $wp_customize->add_control(new WP_Customize_Upload_Control($wp_customize, 'video_url', array(
        'label' => __('Завантажити', 'tattoostudio'),
        'section' => 'video_section',
        'settings' => 'video_url',
        'mime_type' => 'video',
    )));
}

add_action('customize_register', 'customize_video_section');

function allow_svg_upload($mimes)
{
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}

add_filter('upload_mimes', 'allow_svg_upload');

require_once get_template_directory() . '/plugins/custom-gallery-manager/custom-gallery-manager.php';


