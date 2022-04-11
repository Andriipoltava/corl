<?php
/**
 * corl Theme Customizer
 *
 * @package corl
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function corl_customize_register($wp_customize)
{
    $wp_customize->get_setting('blogname')->transport = 'postMessage';
    $wp_customize->get_setting('blogdescription')->transport = 'postMessage';
    $wp_customize->get_setting('header_textcolor')->transport = 'postMessage';

    if (isset($wp_customize->selective_refresh)) {
        $wp_customize->selective_refresh->add_partial(
            'blogname',
            array(
                'selector' => '.site-title a',
                'render_callback' => 'corl_customize_partial_blogname',
            )
        );
        $wp_customize->selective_refresh->add_partial(
            'blogdescription',
            array(
                'selector' => '.site-description',
                'render_callback' => 'corl_customize_partial_blogdescription',
            )
        );
    }
}

add_action('customize_register', 'corl_customize_register');

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function corl_customize_partial_blogname()
{
    bloginfo('name');
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function corl_customize_partial_blogdescription()
{
    bloginfo('description');
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function corl_customize_preview_js()
{
    wp_enqueue_script('corl-customizer', get_template_directory_uri() . '/js/customizer.js', array('customize-preview'), _S_VERSION, true);
}

add_action('customize_preview_init', 'corl_customize_preview_js');


//Register Meta box
add_action('add_meta_boxes', function () {
    $page_for_posts = get_option('page_for_posts');

    if ($page_for_posts == get_the_ID())
        add_meta_box('corl_blog-id', 'Description Blog', 'corl_blog_field_cb', 'page');
});

//Meta callback function
function corl_blog_field_cb($post)
{
    $corl_blog_meta_val = get_post_meta($post->ID, 'corl_blog-description', true);
    ?>
    <label ><?php _e('Description','corl'); ?>
        <textarea style="width: 100%"  name="corl_blog-description" ><?php echo esc_attr($corl_blog_meta_val) ?></textarea>
    </label>
    <?php
}

//save meta value with save post hook
add_action('save_post', function ($post_id) {
    if (isset($_POST['corl_blog-description'])) {
        update_post_meta($post_id, 'corl_blog-description', $_POST['corl_blog-description']);
    }
});

// show meta value after post content
add_filter('the_content', function ($content) {
    $meta_val = get_post_meta(get_the_ID(), 'corl_blog-description', true);
    return $content . $meta_val;
});
