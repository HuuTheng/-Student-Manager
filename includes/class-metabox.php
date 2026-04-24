<?php
add_action('add_meta_boxes', 'sm_add_student_metabox');
function sm_add_student_metabox()
{
    add_meta_box('sm_details', 'Thông tin chi tiết', 'sm_render_metabox', 'student', 'normal', 'high');
}

function sm_render_metabox($post)
{

    wp_nonce_field('sm_save_meta', 'sm_nonce');

    $mssv = get_post_meta($post->ID, '_sm_mssv', true);
    $lop = get_post_meta($post->ID, '_sm_lop', true);
    $ngay_sinh = get_post_meta($post->ID, '_sm_ngay_sinh', true);

    echo '<p>MSSV: <input type="text" name="sm_mssv" value="' . esc_attr($mssv) . '" class="widefat"></p>';
    echo '<p>Lớp: <select name="sm_lop" class="widefat">
            <option value="CNTT" ' . selected($lop, 'CNTT', false) . '>CNTT</option>
            <option value="Kinh tế" ' . selected($lop, 'Kinh tế', false) . '>Kinh tế</option>
            <option value="Marketing" ' . selected($lop, 'Marketing', false) . '>Marketing</option>
          </select></p>';
    echo '<p>Ngày sinh: <input type="date" name="sm_ngay_sinh" value="' . esc_attr($ngay_sinh) . '" class="widefat"></p>';
}

add_action('save_post', 'sm_save_student_meta');
function sm_save_student_meta($post_id)
{
    if (!isset($_POST['sm_nonce']) || !wp_verify_nonce($_POST['sm_nonce'], 'sm_save_meta'))
        return;
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
        return;

    if (isset($_POST['sm_mssv']))
        update_post_meta($post_id, '_sm_mssv', sanitize_text_field($_POST['sm_mssv']));
    if (isset($_POST['sm_lop']))
        update_post_meta($post_id, '_sm_lop', sanitize_text_field($_POST['sm_lop']));
    if (isset($_POST['sm_ngay_sinh']))
        update_post_meta($post_id, '_sm_ngay_sinh', sanitize_text_field($_POST['sm_ngay_sinh']));
}