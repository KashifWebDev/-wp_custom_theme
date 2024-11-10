<?php

class MV_Slider_Settings
{
    public static $options;

    public function __construct(){
        self::$options = get_option('mv_slider_options');
        add_action('admin_init', array($this,'mv_slider_settings_init'));
    }

    public function mv_slider_settings_init()
    {
        register_setting('mv_slider_group', 'mv_slider_options');

        add_settings_field(
            'mv_slider_shortcode',
            'Shortcode',
            array($this,'mv_slider_shortcode_callback'),
            'mv_slider_page1',
            'mv_slider_main_section'
        );
        add_settings_section(
            'mv_slider_main_section',
            'How does it work?',
            null,
            'mv_slider_page1'
        );


        add_settings_section(
            'mv_slider_second_section',
            'Other Plugin options',
            null,
            'mv_slider_page2'
        );
        add_settings_field(
            'mv_slider_title',
            'Slider Title',
            array($this,'mv_slider_title_callback'),
            'mv_slider_page2',
            'mv_slider_second_section'
        );
        add_settings_field(
            'mv_slider_bullet',
            'Display Bullet',
            array($this,'mv_slider_bullet_callback'),
            'mv_slider_page2',
            'mv_slider_second_section'
        );
        add_settings_field(
            'mv_slider_style',
            'Styles',
            array($this,'mv_slider_style_callback'),
            'mv_slider_page2',
            'mv_slider_second_section'
        );
    }

    public function mv_slider_shortcode_callback()
    {
        echo "use the shortcode [mv_slider] to display slider in any page";
    }
    public function mv_slider_title_callback()
    { ?>
        <input type="text" name="mv_slider_options[mv_slider_title]"
               id="mv_slider_title"
               value="<?= isset(self::$options['mv_slider_title']) ? esc_attr(self::$options['mv_slider_title']) : '' ?>">
    <?php }
    public function mv_slider_bullet_callback()
    { ?>
        <input type="checkbox" name="mv_slider_options[mv_slider_bullet]"
               id="mv_slider_bullet"
               value="1"
               <?php
               if(isset(self::$options['mv_slider_bullet'])){
                   checked('1', self::$options['mv_slider_bullet'], true);
               }
               ?>
            >
        <label for="mv_slider_bullet">Whether to display bullets or not</label>
    <?php }

    public function mv_slider_style_callback()
    { ?>
        <select name="mv_slider_options[mv_slider_style]" id="mv_slider_style">
            <option value="style-1" <?php
                isset(self::$options['mv_slider_style']) ? selected('style-1', self::$options['mv_slider_style'], true) : '';
            ?>>Style 1</option>
            <option value="style-2" <?php
                isset(self::$options['mv_slider_style']) ? selected('style-2', self::$options['mv_slider_style'], true) : '';
            ?>>Style 2</option>
        </select>
    <?php }
}