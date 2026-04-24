<?php
/**
 * Plugin Name: Student Manager
 * Description: Quản lý thông tin sinh viên chuyên nghiệp.
 * Version: 1.0
 * Author: Nguyễn Hữu Thành
 */

if (!defined('ABSPATH'))
    exit;

define('SM_PATH', plugin_dir_path(__FILE__));

require_once SM_PATH . 'includes/class-cpt.php';
require_once SM_PATH . 'includes/class-metabox.php';
require_once SM_PATH . 'includes/class-shortcode.php';

add_action('wp_enqueue_scripts', function () {
    wp_enqueue_style('sm-style', plugins_url('assets/style.css', __FILE__));
});