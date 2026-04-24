<?php
add_action('init', 'sm_register_student_cpt');
function sm_register_student_cpt()
{
    $labels = array(
        'name' => 'Sinh viên',
        'singular_name' => 'Sinh viên',
        'add_new' => 'Thêm sinh viên mới',
        'edit_item' => 'Sửa thông tin sinh viên',
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'has_archive' => true,
        'menu_icon' => 'dashicons-businessman',
        'supports' => array('title', 'editor'),
    );
    register_post_type('student', $args);
}