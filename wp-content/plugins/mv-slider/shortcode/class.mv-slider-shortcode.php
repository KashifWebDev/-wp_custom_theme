<?php

class MV_Slider_Shortcode {
    public function __construct(){
        add_shortcode('mv_slider', array($this, 'mv_slider_shortcode'));
    }

    public function mv_slider_shortcode($atts = array(), $content = null, $tag = null) {
        $atts = array_change_key_case( (array) $atts, CASE_LOWER);

        extract(shortcode_atts(
            array(
                'id' => '',
                'orderby' => 'data'
            ),
            $atts,
            $tag
        ));

        if(! empty($id)) {
            $id = array_map('absint', explode(',', $id));
        }

        ob_start();
        require MV_SLIDER_PATH . 'views/mv-slider-shortcode.php';
        wp_enqueue_script('mv-slider-name-jq');
        wp_enqueue_script('mv-slider-options-jq');
        wp_enqueue_style('mv-slider-main-css');
        return ob_get_clean();
    }
}