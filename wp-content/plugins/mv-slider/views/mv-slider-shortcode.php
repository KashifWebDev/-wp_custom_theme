<h3>Title</h3>
<?= !empty($content) ? $content : MV_Slider_Settings::$options['mv_slider_title'] ?>
<div class="mv-slider flexslider">
    <ul class="slides">
        <?php
            $args = array(
                    'post_type' => 'mv-slider',
                    'post_status' => 'publish',
                    'post__in' => $id,
                    'orderby' => $orderby
            );
        $my_query = new WP_Query($args);
        if($my_query->have_posts()):
            while($my_query->have_posts()):
                $my_query->the_post();
                $button_text = get_post_meta(get_the_ID(), 'mv_slider_link_text', true);
                $button_url = get_post_meta(get_the_ID(), 'mv_slider_url_text', true);
        ?>
            <li>
                <?= the_post_thumbnail('full', array('class' => 'img-fluid')) ?>
                <div class="mvs-container">
                    <div class="slider-details-container">
                        <div class="wrapper">
                            <div class="slider-title">
                                <h2><?= the_title() ?></h2>
                            </div>
                            <div class="slider-description">
                                <div class="subtitle">Subtitle</div>
                                <a href="<?= $button_url ?>" class="link"><?= $button_text ?></a>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
        <?php
            endwhile;
            wp_reset_postdata();
        endif;

        ?>

    </ul>
</div>