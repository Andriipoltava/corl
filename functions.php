<?php
/**
 * corl functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package corl
 */

if (!defined('_S_VERSION')) {
    // Replace the version number of the theme on each release.
    define('_S_VERSION', '1.0.0');
}

if (!function_exists('corl_setup')) :
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function corl_setup()
    {
        /*
         * Make theme available for translation.
         * Translations can be filed in the /languages/ directory.
         * If you're building a theme based on corl, use a find and replace
         * to change 'corl' to the name of your theme in all the template files.
         */
        load_theme_textdomain('corl', get_template_directory() . '/languages');

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
                'menu-1' => esc_html__('Primary Menu', 'corl'),
                'menu-2' => esc_html__('Mobile Menu', 'corl'),

                'menu-3' => esc_html__('Footer Left Menu', 'corl'),
                'menu-4' => esc_html__('Footer Right Menu', 'corl'),
                'menu-5' => esc_html__('Footer Bottom Menu', 'corl'),

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
                'corl_custom_background_args',
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
endif;
add_action('after_setup_theme', 'corl_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function corl_content_width()
{
    $GLOBALS['content_width'] = apply_filters('corl_content_width', 640);
}

add_action('after_setup_theme', 'corl_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function corl_widgets_init()
{
    register_sidebar(
        array(
            'name' => esc_html__('Sidebar', 'corl'),
            'id' => 'sidebar-1',
            'description' => esc_html__('Add widgets here.', 'corl'),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget' => '</section>',
            'before_title' => '<h2 class="widget-title">',
            'after_title' => '</h2>',
        )
    );
}

add_action('widgets_init', 'corl_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function corl_scripts()
{
    wp_enqueue_style('corl-style', get_stylesheet_uri(), array(), _S_VERSION);

    wp_enqueue_style('corl-style-bootstrap', get_template_directory_uri() . '/assets/css/vendor/bootstrap.min.css', array(), _S_VERSION);
    wp_enqueue_style('corl-style-all-min-css', get_template_directory_uri() . '/assets/css/vendor/all.min.css', array(), _S_VERSION);
    wp_enqueue_style('corl-style-fontawesome-css', get_template_directory_uri() . '/assets/css/vendor/fontawesome.min.css', array(), _S_VERSION);
    wp_enqueue_style('corl-style-jquery-ui-css', get_template_directory_uri() . '/assets/css/vendor/jquery-ui.min.css', array(), _S_VERSION);
    wp_enqueue_style('corl-style-animate-css', get_template_directory_uri() . '/assets/css/plugins/animate.min.css', array(), _S_VERSION);
    wp_enqueue_style('corl-style-owl-carousel-css', get_template_directory_uri() . '/assets/css/plugins/owl.carousel.min.css', array(), _S_VERSION);
    wp_enqueue_style('corl-style-main-css', get_template_directory_uri() . '/assets/css/style.css', array(), _S_VERSION);
    wp_enqueue_style('corl-style-responsive-css', get_template_directory_uri() . '/assets/css/responsive.css', array(), _S_VERSION);

    wp_style_add_data('corl-style', 'rtl', 'replace');


    wp_enqueue_script('corl-modernizr', get_template_directory_uri() . '/assets/js/vendor/modernizr-3.11.2.min.js', array(), _S_VERSION, true);

    wp_enqueue_script('jquery', get_template_directory_uri() . '/assets/js/vendor/jquery-3.6.0.min.js', array(), _S_VERSION, true);
    wp_enqueue_script('corl-jquery-migrate', get_template_directory_uri() . '/assets/js/vendor/jquery-migrate-3.3.2.min.js', array(), _S_VERSION, true);
    wp_enqueue_script('corl-bootstrap-bundle', get_template_directory_uri() . '/assets/js/vendor/bootstrap.bundle.min.js', array(), _S_VERSION, true);
    wp_enqueue_script('corl-jquery-ui', get_template_directory_uri() . '/assets/js/vendor/jquery-ui.min.js', array(), _S_VERSION, true);
    wp_enqueue_script('corl-material-scrolltop', get_template_directory_uri() . '/assets/js/plugins/material-scrolltop.js', array(), _S_VERSION, true);
    wp_enqueue_script('corl-owl-carousel', get_template_directory_uri() . '/assets/js/plugins/owl.carousel.min.js', array(), _S_VERSION, true);

    if (is_front_page()) {
        wp_enqueue_script('corl-owl-particles', get_template_directory_uri() . '/assets/js/plugins/particles.js', array(), _S_VERSION, true);
        wp_enqueue_script('corl-app', get_template_directory_uri() . '/assets/js/plugins/app.js', array(), _S_VERSION, true);

    }


    wp_enqueue_script('corl-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true);
    wp_enqueue_script('corl-calculator-chart', 'https://cdn.jsdelivr.net/npm/chart.js', array(), _S_VERSION, true);
    wp_enqueue_script('corl-fairming', get_template_directory_uri() . '/assets/js/plugins/fairming.js', array(), _S_VERSION, true);
    wp_enqueue_script('corl-main', get_template_directory_uri() . '/assets/js/main.js', array(), _S_VERSION, true);


    wp_enqueue_script('corl-header-widget', get_template_directory_uri() . '/assets/js/header-widget.js', array(), _S_VERSION);


    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}

add_action('wp_enqueue_scripts', 'corl_scripts');

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

/**
 * Load WooCommerce compatibility file.
 */
if (class_exists('WooCommerce')) {
    require get_template_directory() . '/inc/woocommerce.php';
}
/**
 * WP Rocket | Exclude Uploaded Elementor CSS from CPCSS
 */
if (is_plugin_active('wp-rocket/wp-rocket.php')) {
    require get_template_directory() . '/inc/wp-rocket-exclude_elementor_uploaded_css.php';
}
/**
 * unable svg file to upload.
 */
function add_svg_to_upload_mimes($upload_mimes)
{
    $upload_mimes['svg'] = 'image/svg+xml';
    $upload_mimes['svgz'] = 'image/svg+xml';
    return $upload_mimes;
}

add_filter('upload_mimes', 'add_svg_to_upload_mimes', 10, 1);


// Elementor settings

require get_template_directory() . '/lib/elementor-settings.php';


/* excerpt word limit */
function get_excerpt()
{
    $excerpt = get_the_content();
    $excerpt = preg_replace(" ([.*?])", '', $excerpt);
    $excerpt = strip_shortcodes($excerpt);
    $excerpt = strip_tags($excerpt);
    $excerpt = substr($excerpt, 0, 76);
    $excerpt = substr($excerpt, 0, strripos($excerpt, " "));
    $excerpt = trim(preg_replace('/\s+/', ' ', $excerpt));
    $excerpt = $excerpt . '...';
    return $excerpt;
}

/* excerpt for blog first post */
function get_excerpt_first()
{
    $excerpt = get_the_content();
    $excerpt = preg_replace(" ([.*?])", '', $excerpt);
    $excerpt = strip_shortcodes($excerpt);
    $excerpt = strip_tags($excerpt);
    $excerpt = substr($excerpt, 0, 221);
    $excerpt = substr($excerpt, 0, strripos($excerpt, " "));
    $excerpt = trim(preg_replace('/\s+/', ' ', $excerpt));
    $excerpt = $excerpt . '...';
    return $excerpt;
}


/**
 * Customizer Filled Added on customizer
 */


function corl_customizer_settings($wp_customize)
{

    $wp_customize->add_section('corl_header_customizer_section', array(
        'title' => __('Corl Header', 'corl'),
        'priority' => 30,
    ));


    // add a setting for the site logo
    $wp_customize->add_setting('corl_signin_button_text');
    $wp_customize->add_setting('corl_signin_button_link');

    $wp_customize->add_setting('corl_applynow_button_text');
    $wp_customize->add_setting('corl_applynow_button_link');


    $wp_customize->add_control('corl_signin_button_text', array(
        'type' => 'text',
        'section' => 'corl_header_customizer_section',
        'label' => __('Sign In button Text'),
    ));

    $wp_customize->add_control('corl_signin_button_link', array(
        'type' => 'url',
        'section' => 'corl_header_customizer_section',
        'label' => __('Sign In button Link'),
    ));

    $wp_customize->add_control('corl_applynow_button_text', array(
        'type' => 'text',
        'section' => 'corl_header_customizer_section',
        'label' => __('Apply Now button Text'),
    ));

    $wp_customize->add_control('corl_applynow_button_link', array(
        'type' => 'url',
        'section' => 'corl_header_customizer_section',
        'label' => __('Apply Now button Link'),
    ));


    $wp_customize->add_section('corl_mobile_customizer_section', array(
        'title' => __('Corl Mobile Header', 'corl'),
        'priority' => 32,
    ));

    $wp_customize->add_setting('corl_mobile_logo');

    $wp_customize->add_setting('first_button_text');
    $wp_customize->add_setting('first_button_link');

    $wp_customize->add_setting('secound_button_text');
    $wp_customize->add_setting('secound_button_link');


    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'corl_mobile_logo', array(
        'label' => 'Upload Mobile Logo',
        'section' => 'corl_mobile_customizer_section',
        'settings' => 'corl_mobile_logo',
    )));

    $wp_customize->add_control('first_button_text', array(
        'type' => 'text',
        'section' => 'corl_mobile_customizer_section',
        'label' => __('Frist Button Text'),
    ));

    $wp_customize->add_control('first_button_link', array(
        'type' => 'url',
        'section' => 'corl_mobile_customizer_section',
        'label' => __('Frist Button Link'),
    ));


    $wp_customize->add_control('secound_button_text', array(
        'type' => 'text',
        'section' => 'corl_mobile_customizer_section',
        'label' => __('2nd Button Text'),
    ));

    $wp_customize->add_control('secound_button_link', array(
        'type' => 'url',
        'section' => 'corl_mobile_customizer_section',
        'label' => __('2nd Button Link'),
    ));


    $wp_customize->add_section('corl_social_customizer_section', array(
        'title' => __('Corl Social', 'corl'),
        'priority' => 33,
    ));

    $wp_customize->add_setting('corl_linkedin_link');
    $wp_customize->add_setting('corl_facebook_link');
    $wp_customize->add_setting('corl_twitter_link');
    $wp_customize->add_setting('corl_instagram_link');

    $wp_customize->add_control('corl_linkedin_link', array(
        'type' => 'url',
        'section' => 'corl_social_customizer_section',
        'label' => __('Linkedin Link'),
    ));

    $wp_customize->add_control('corl_facebook_link', array(
        'type' => 'url',
        'section' => 'corl_social_customizer_section',
        'label' => __('Facebook Link'),
    ));

    $wp_customize->add_control('corl_twitter_link', array(
        'type' => 'url',
        'section' => 'corl_social_customizer_section',
        'label' => __('Twitter Link'),
    ));

    $wp_customize->add_control('corl_instagram_link', array(
        'type' => 'url',
        'section' => 'corl_social_customizer_section',
        'label' => __('Instagram Link'),
    ));


    $wp_customize->add_section('corl_footer_customizer_section', array(
        'title' => __('Corl Footer', 'corl'),
        'priority' => 34,
    ));

    $wp_customize->add_setting('corl_footer_logo');

    $wp_customize->add_setting('corl_footer_cta_title');

    $wp_customize->add_setting('corl_footer_cta_first_button_text');
    $wp_customize->add_setting('corl_footer_cta_first_button_link');

    $wp_customize->add_setting('corl_footer_cta_secound_button_text');
    $wp_customize->add_setting('corl_footer_cta_secound_button_link');


    $wp_customize->add_setting('corl_footer_copyright');


    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'corl_footer_logo', array(
        'label' => 'Upload Footer Logo',
        'section' => 'corl_footer_customizer_section',
        'settings' => 'corl_footer_logo',
    )));

    $wp_customize->add_control('corl_footer_cta_title', array(
        'type' => 'text',
        'section' => 'corl_footer_customizer_section',
        'label' => __('CTA Title'),
    ));

    $wp_customize->add_control('corl_footer_cta_first_button_text', array(
        'type' => 'text',
        'section' => 'corl_footer_customizer_section',
        'label' => __('CTA First Button Text'),
    ));

    $wp_customize->add_control('corl_footer_cta_first_button_link', array(
        'type' => 'url',
        'section' => 'corl_footer_customizer_section',
        'label' => __('CTA First Button Link'),
    ));

    $wp_customize->add_control('corl_footer_cta_secound_button_text', array(
        'type' => 'text',
        'section' => 'corl_footer_customizer_section',
        'label' => __('CTA 2nd Button Text'),
    ));

    $wp_customize->add_control('corl_footer_cta_secound_button_link', array(
        'type' => 'url',
        'section' => 'corl_footer_customizer_section',
        'label' => __('CTA 2nd Button Link'),
    ));


    $wp_customize->add_control('corl_footer_copyright', array(
        'type' => 'textarea',
        'section' => 'corl_footer_customizer_section',
        'label' => __('Footer Copyright Text'),
    ));


}

add_action('customize_register', 'corl_customizer_settings');


/* 	Featured post */

function register_post_assets()
{
    add_meta_box('featured-post', __('Featured Post'), 'add_featured_meta_box', 'post', 'advanced', 'high');
}

add_action('admin_init', 'register_post_assets', 1);


function add_featured_meta_box($post)
{
    $featured = get_post_meta($post->ID, '_featured-post', true);
    echo "<label for='_featured-post'>" . __('Feature this post?', 'corl') . "</label>";

    if ($featured == 1) {

        echo '<input type="checkbox" name="_featured-post" id="featured-post" value="1"  checked/>';
    } else {
        echo '<input type="checkbox" name="_featured-post" id="featured-post" value="1"/>';
    }

}

function save_featured_meta($post_id)
{
    // Do validation here for post_type, nonces, autosave, etc...
    if (isset($_REQUEST['_featured-post']))
        update_post_meta($post_id, '_featured-post', 1, 0);
    // I like using _ before my custom fields, so they are only editable within my form rather than the normal custom fields UI
}

add_action('save_post', 'save_featured_meta');


if (!function_exists('redirect_404_to_homepage')) {

    add_action('template_redirect', 'redirect_404_to_homepage');

    function redirect_404_to_homepage()
    {
        if (is_404()):
            wp_safe_redirect(home_url('/'));
            exit;
        endif;
    }
}