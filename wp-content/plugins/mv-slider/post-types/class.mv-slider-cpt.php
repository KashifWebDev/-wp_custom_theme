<?php

class MV_Slider_Post_Type{
    public function __construct(){
        add_action( 'init', array( $this, 'create_post_type' ) );
        add_action('add_meta_boxes', array( $this, 'add_meta_boxes' ) );
        add_action('save_post', array( $this, 'save_post' ) );
        add_filter('manage_mv-slider_posts_columns', array( $this, 'add_custom_columns' ) );
        add_action('manage_mv-slider_posts_custom_column', array( $this, 'manage_custom_columns' ), 10, 2 );
    }

    public function create_post_type(){
        register_post_type( 'mv-slider', array(
            'label' => 'Slider',
            'description' => 'Sliders',
            'labels' => array(
                'name' => 'Sliders',
                'singular_name' => 'Slider',
            ),
            'public' => true,
            'supports' => array( 'title', 'editor', 'thumbnail'),
            'hierarchical' => false,
            'show_ui' => true,
            'show_in_menu' => false,
            'menu_position' => 5,
            'show_in_admin_bar' => true,
            'show_in_nav_menus' => true,
            'can_export' => true,
            'has_archive' => false,
            'exclude_from_search' => false,
            'publicly_queryable' => true,
            'show_in_rest' => true,
            'menu_icon' => 'dashicons-images-alt2',
        ));
    }

    public function add_meta_boxes(){
        add_meta_box(
            'mv_slider_meta_box',
            'Link Options',
            array( $this, 'render_meta_box' ),
            'mv-slider',
            'normal',
            'high'
        );
    }

    public function render_meta_box($post){
        require_once(MV_SLIDER_PATH . 'views/mv-slider_metabox.php');
    }

    public function save_post($post_id)
    {
        if( isset( $_POST['mv_slider_nonce'] ) ){
            if (! wp_verify_nonce( $_POST['mv_slider_nonce'], 'mv_slider_nonce' ) ){
                return;
            }
        }

        if(isset( $_POST['post_type'] ) && $_POST['post_type'] == 'mv-slider' ){
            if( !current_user_can( 'edit_post', $post_id ) ){
                return ;
            }elseif (! current_user_can( 'edit_page', $post_id ) ){
                return;
            }
        }

        $old_link_text = get_post_meta($post_id, 'mv_slider_link_text', true);
        $old_link_url = get_post_meta($post_id, 'mv_slider_link_url', true);
        $new_link_text = $_POST["mv_slider_link_text"] ?? '';
        $new_link_url = $_POST["mv_slider_link_url"] ?? '';

        update_post_meta($post_id, 'mv_slider_link_text', $new_link_text, $old_link_text);
        update_post_meta($post_id, 'mv_slider_link_url', $new_link_url, $old_link_url);
    }

    public function add_custom_columns($columns)
    {
        $columns['mv_slider_link_text'] = esc_html__('Link Text', 'mv-slider');
        $columns['mv_slider_link_url'] = esc_html__('Link URL', 'mv-slider');
        return $columns;
    }

    public function manage_custom_columns($column, $post_id)
    {
        switch ($column) {
            case 'mv_slider_link_text':
                echo get_post_meta($post_id, 'mv_slider_link_text', true);
                break;
            case 'mv_slider_link_url':
                echo get_post_meta($post_id, 'mv_slider_link_url', true);
                break;
        }
    }
}