<?php
/*
Plugin Name: Custom Gallery Manager
Description: A plugin to manage galleries with names, thumbnails, and images.
Version: 1.1
Author: versusdec
*/

function debug_to_console($data) {
    $output = $data;
    if (is_array($output))
        $output = implode(',', $output);

    echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
}

function cgm_register_gallery_post_type() {
    $labels = array(
        'name' => 'Galleries',
        'singular_name' => 'Gallery',
        'menu_name' => 'Galleries',
        'add_new' => 'Add New Gallery',
        'add_new_item' => 'Add New Gallery',
        'edit_item' => 'Edit Gallery',
        'new_item' => 'New Gallery',
        'view_item' => 'View Gallery',
        'search_items' => 'Search Galleries',
        'not_found' => 'No galleries found',
        'not_found_in_trash' => 'No galleries found in Trash',
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'has_archive' => true,
        'menu_icon' => 'dashicons-format-gallery',
        'supports' => array('title', 'thumbnail'),
    );

    register_post_type('gallery', $args);
}
add_action('init', 'cgm_register_gallery_post_type');

function cgm_add_gallery_meta_box() {
    add_meta_box(
        'cgm_gallery_images', // Meta box ID
        'Gallery Images', // Title
        'cgm_gallery_images_meta_box_callback', // Callback function
        'gallery', // Post type
        'normal', // Context
        'high' // Priority
    );
}
add_action('add_meta_boxes', 'cgm_add_gallery_meta_box');

function cgm_gallery_images_meta_box_callback($post) {
    wp_nonce_field('cgm_save_gallery_images', 'cgm_gallery_images_nonce');

    // Get previously saved gallery images
    $gallery_images = get_post_meta($post->ID, '_cgm_gallery_images', true);
    $gallery_images = $gallery_images ? explode(',', $gallery_images) : array();

    // Output hidden input field to store image IDs
    echo '<div class="cgm-gallery-images">';
    echo '<input type="hidden" id="cgm_gallery_images-input" name="cgm_gallery_images" value="' . esc_attr(implode(',', $gallery_images)) . '">';

    // Show preview of images already saved in the gallery
    echo '<div id="cgm_gallery_images_preview">';
    if (!empty($gallery_images)) {
        foreach ($gallery_images as $image_id) {
            $image_url = wp_get_attachment_url($image_id);
            echo '<div class="cgm-gallery-image" data-id="' . esc_attr($image_id) . '">';
            echo '<img src="' . esc_url($image_url) . '" style="max-width: 100px; margin: 5px;">';
            echo '<button type="button" class="cgm-remove-image">Remove</button>';
            echo '</div>';
        }
    }
    echo '</div>';

    // Upload button
    echo '<button type="button" id="cgm_upload_gallery_images" class="button">Upload Images</button>';
    echo '</div>';
}




function cgm_save_gallery_images($post_id) {
    // Check nonce for security
    if (!isset($_POST['cgm_gallery_images_nonce']) || !wp_verify_nonce($_POST['cgm_gallery_images_nonce'], 'cgm_save_gallery_images')) {
        return;
    }

    // Check if it's an autosave or revision
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    // Check post type to avoid saving on other post types
    if ('gallery' !== get_post_type($post_id)) {
        return;
    }

    // Save the gallery images (comma-separated list of image IDs)
    if (isset($_POST['cgm_gallery_images'])) {
        $gallery_images = sanitize_text_field($_POST['cgm_gallery_images']);
        update_post_meta($post_id, '_cgm_gallery_images', $gallery_images);
    }
}
add_action('save_post', 'cgm_save_gallery_images');

function cgm_enqueue_scripts($hook) {
    if ('post.php' === $hook || 'post-new.php' === $hook) {
        wp_enqueue_media();
        wp_enqueue_script('cgm-gallery-manager', get_template_directory_uri() . '/plugins/custom-gallery-manager/cgm-gallery-manager.js', array('jquery'), '1.1', true);
    }
}
add_action('admin_enqueue_scripts', 'cgm_enqueue_scripts');

function cgm_display_galleries_shortcode($atts) {
    $args = array(
        'post_type' => 'gallery',
        'posts_per_page' => -1,
    );

    $galleries = new WP_Query($args);

    if ($galleries->have_posts()) {
        $output = '<div class="cgm-galleries">';
        while ($galleries->have_posts()) {
            $galleries->the_post();
            $gallery_images = get_post_meta(get_the_ID(), '_cgm_gallery_images', true);
            $gallery_images = $gallery_images ? explode(',', $gallery_images) : array();

            $output .= '<div class="cgm-gallery">';
            $output .= '<h3>' . get_the_title() . '</h3>';
            $output .= '<div class="cgm-gallery-thumbnail">' . get_the_post_thumbnail(get_the_ID(), 'medium') . '</div>';
            $output .= '<div class="cgm-gallery-images">';
            foreach ($gallery_images as $image_id) {
                $image_url = wp_get_attachment_url($image_id);
                $output .= '<div class="cgm-gallery-image" data-id="' . esc_attr($image_id) . '">';
                $output .= '<img src="' . esc_url($image_url) . '" style="max-width: 100px; margin: 5px;">';
                $output .= '</div>';
            }
            $output .= '</div>';
            $output .= '</div>';
        }
        $output .= '</div>';
        wp_reset_postdata();
        return $output;
    } else {
        return '<p>No galleries found.</p>';
    }
}
add_shortcode('cgm_galleries', 'cgm_display_galleries_shortcode');
function cgm_enqueue_admin_styles($hook) {
    // Only add styles to the gallery admin page
    if ('post.php' === $hook || 'post-new.php' === $hook) {
        wp_enqueue_style('cgm-admin-style', get_template_directory_uri() . '/plugins/custom-gallery-manager/style.css');
    }
}
add_action('admin_enqueue_scripts', 'cgm_enqueue_admin_styles');
