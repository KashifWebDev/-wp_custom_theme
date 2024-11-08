<?php
/*
 * Plugin Name: Simple Contact Form
 * Description: Simple Contact Form Tutorial 
 */

if(!defined('ABSPATH')) {
    exit();
}

class Simple_Contact_Form {
    public function __construct()
    {
        add_action('init', array($this, 'create_custom_post_type'));

        add_action('wp_enqueue_scripts', array($this, 'load_assets'));

        add_shortcode('contact-form', array($this, 'load_shortcode'));
        
        add_action('wp_footer', array($this, 'load_wp_footer'));

        add_action('rest_api_init', array($this, 'register_rest_api'));
    }

    public function create_custom_post_type()
    {
        $args = array(
            'public' => true,
            'has_archive' => true,
            'supports' => array( 'title'),
            'exclude_from_search' => true,
            'publicly_queryable' => false,
            'capability' => 'manage_options',
            'labels' => array(
                'name' => 'Contact Form',
                'singular_name' => 'Contact Form Entry',
            ),
            'menu_icon' => 'dashicons-format-chat',
        );
        register_post_type('simple_contact_form', $args);
    }

    public function load_assets()
    {
        wp_enqueue_style(
            'simple-contact-form',
            plugin_dir_url(__FILE__) . 'css/simple-contact-form.css',
            array(),
            1,
            'all'
        );
        wp_enqueue_script(
            'simple-contact-form',
            plugin_dir_url(__FILE__) . 'js/simple-contact-form.js',
            array('jquery'),
            1,
            true
        );
    }

    public function load_shortcode()
    {
        return <<<HTML
            <h5>Send us an Email</h5>
            <form id="simple-contact-form">
                <div class="form-group">
                    <label for="Name">Name</label>
                    <input type="text" class="form-control">
                </div>
                <div class="form-group">
                    <label for="Email">Email</label>
                    <input type="text" class="form-control">
                </div>
                <div class="form-group">
                    <label for="Email">Email</label>
                    <textarea class="form-control"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Submit Message</button>
            </form>
        HTML;

    }

    public function load_wp_footer()
    { ?>
            <script>
                (function ($) {
                    $("#simple-contact-form").submit(function (event){
                        event.preventDefault();
                        var form = $(this).serialize();

                        $.ajax({
                            method: 'post',
                            url: '<?php echo get_rest_url(null, ) ?>simple-contact-form/v1/send-email',
                            headers: { 'X-WP-Nonce': '<?= wp_create_nonce('wp_rest') ?>'},
                            data: form
                        })
                    });
                })(jQuery)

            </script>
            
    <?php }

    public function register_rest_api()
    {
        register_rest_route('simple-contact-form/v1', 'send-email', array(
                'methods' => 'POST',
                'callback' => array($this, 'handle_contact_form')
        ));
    }

    public function handle_contact_form($data)
    {
        $headers = $data->get_headers();
        $params = $data->get_params();
        $nonce = $headers['x_wp_nonce'][0];

        if(!wp_verify_nonce($nonce, 'wp_rest')){
            return new WP_REST_Response('Message not sent', 422);
        }

        $post_id = wp_insert_post(array(
                'post_type' => 'simple_contact_form',
                'post_title' => 'Contact Enquiry',
                'post_status' => 'publish',
        ));

        if($post_id){
            return new WP_REST_Response('Email was sent!', 200);
        }
    }
}

new Simple_Contact_Form;