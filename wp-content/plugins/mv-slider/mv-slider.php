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
            array($this, 'mv_slider_settings_page')
        );
    }

    public function mv_slider_settings_page0(){
        echo "This is a test page";
    }
}

register_activation_hook(__FILE__, array('MV_Slider', 'activate'));
register_activation_hook(__FILE__, array('MV_Slider', 'deactivate'));
register_activation_hook(__FILE__, array('MV_Slider', 'uninstall'));

$mv_slider = new MV_Slider();
