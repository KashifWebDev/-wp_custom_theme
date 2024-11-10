<?php

/*
 * Plugin Name: Simple Custom Slider
 * Description: Practice pluging to immplement slider fucntionaliteis
 */

if(!defined('ABSPATH')) exit;

class MV_Slider{
    public function __construct(){
        $this->define_constants();

        add_action('admin_menu', array($this, 'add_menu'));

        require_once(MV_SLIDER_PATH . 'post-types/class.mv-slider-cpt.php');
        $MV_Slider_Post_Type = new MV_Slider_Post_Type();

        require_once(MV_SLIDER_PATH . 'MV_Slider_Settings.php');
        $mv_slider_settings = new MV_Slider_Settings();

        require_once(MV_SLIDER_PATH . 'shortcode/class.mv-slider-shortcode.php');
        $mv_slider_settings = new MV_Slider_Shortcode();

        add_action('wp_enqueue_scripts', array($this, 'register_scripts'), 999);
    }

    public function register_scripts(){
        wp_register_script('mv-slider-name-jq', MV_SLIDER_URL.'vendor/flexslider/jquery.flexslider.js',
            array('jquery'), MV_SLIDER_VERSION, true );
        wp_register_script('mv-slider-options-jq', MV_SLIDER_URL.'vendor/flexslider/flexslider.js',
            array('jquery'), MV_SLIDER_VERSION, true );
        wp_register_style('mv-slider-main-css', MV_SLIDER_URL.'vendor/flexslider/flexslider.css', array(), MV_SLIDER_VERSION, 'all');
    }

    public function define_constants(): void
    {
        define('MV_SLIDER_PATH', plugin_dir_path(__FILE__));
        define('MV_SLIDER_URL', plugin_dir_url(__FILE__));
        define('MV_SLIDER_VERSION', '1.0.0');
    }

    public static function activate(){
        update_option('rewrite_rules', '');
    }
    public static function deactivate(){
        flush_rewrite_rules();
        unregister_post_type('mv-slider');
    }
    public static function uninstall(){

    }

    public function add_menu(){
        add_menu_page(
            'MV Slider Options',
            'MV Slider',
            'manage_options',
            'mv-slider',
            array($this, 'mv_slider_settings_page'),
            'dashicons-images-alt2',
        );
        add_submenu_page(
            'mv-slider',
            'Manage Slides',
            'Manage Slides',
            'manage_options',
            'edit.php?post_type=mv-slider',
            null, null
        );
        add_submenu_page(
            'mv-slider',
            'Add New Slides',
            'Add New Slides',
            'manage_options',
            'post-new.php?post_type=mv-slider',
            null, null
        );
    }

    public function mv_slider_settings_page(){
        require MV_SLIDER_PATH . 'views/settings-page.php';
    }
}

register_activation_hook(__FILE__, array('MV_Slider', 'activate'));
register_activation_hook(__FILE__, array('MV_Slider', 'deactivate'));
register_activation_hook(__FILE__, array('MV_Slider', 'uninstall'));

$mv_slider = new MV_Slider();
