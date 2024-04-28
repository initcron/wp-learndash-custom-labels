<?php
/*
Plugin Name: LearnDash Custom Labels
Plugin URI: https://github.com/initcron/wp-sofd-customizations
Description: This plugin changes the label for "Free" courses to "Members Only" in LearnDash.
Version: 1.1
Author: Gourav Shah
Author URI: https://schoolofdevops.com
License: GPL2
*/

function custom_change_free_label($label, $post_id) {
    $course_meta = get_post_meta($post_id, '_sfwd-courses', true);
    $access_mode = isset($course_meta['sfwd-courses_course_price_type']) ? $course_meta['sfwd-courses_course_price_type'] : '';

    if ($access_mode === 'Free') {
        return 'Members Only';
    }

    return $label;
}
add_filter('learndash_price_text_free', 'custom_change_free_label', 10, 2);
