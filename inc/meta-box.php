<?php

final class WP_Corl_Meta_Box_Page
{
    protected $screens = ['post', 'page'];

    public function __construct()
    {
        add_action('add_meta_boxes', [$this, 'add']);
        add_action('save_post', [$this, 'save']);
    }

    /**
     * Set up and add the meta box.
     */
    public function add()
    {

        foreach ($this->screens as $screen) {
            add_meta_box('wp_corl_add_fea', 'Additional Features', [$this, 'html'], $screen);
        }
    }


    /**
     * Save the meta box selections.
     *
     * @param int $post_id The post ID.
     */
    public function save(int $post_id)
    {

        if (in_array(get_post($post_id)->post_type, $this->screens) && array_key_exists('_wp_corl_background_body', $_POST)) {
            update_post_meta(
                $post_id,
                '_wp_corl_background_body',
                $_POST['_wp_corl_background_body']
            );
        }
    }


    /**
     * Display the meta box HTML to the user.
     *
     * @param \WP_Post $post Post object.
     */
    public function html($post)
    {
        $value = get_post_meta($post->ID, '_wp_corl_background_body', true);
        ?>
        <div style="display: flex; align-items: center">
            <label for="wp-corl-bakcground-body">
                <span>Add to background blue gradient : </span>
            </label>
            <select name="_wp_corl_background_body" id="wp-corl-bakcground-body" class="postbox" style="margin-bottom: 0;margin-left: 15px">
                <option value="disable">Disable</option>
                <option value="active" <?php selected($value, 'active'); ?>>Active</option>

            </select>
        </div>
        <?php
    }
}
