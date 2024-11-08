<?=get_header()?>
    <div id="content" class="site-content">
        <div id="primary" class="content-area">
            <main id="main" class="site-main">
                <section id="hero">
                    Section Hero
                </section>
                <section id="service">
                    <div class="container">
                        <div class="services-item">
                            <?php
                                if(is_active_sidebar('service-1')){
                                    dynamic_sidebar('service-1');
                                }
                            ?>
                        </div>
                        <div class="services-item">
                            <?php
                                if(is_active_sidebar('service-2')){
                                    dynamic_sidebar('service-2');
                                }
                            ?>
                        </div>
                        <div class="services-item">
                            <?php
                                if(is_active_sidebar('service-3')){
                                    dynamic_sidebar('service-3');
                                }
                            ?>
                        </div>
                    </div>
                </section>
                <section id="home-blog">
                    <div class="container">
                        <div class="blog-items">
                            <?php
                            if( have_posts() ):
                                while( have_posts() ): the_post();
                                    ?>
                                    <article>
                                        <h2><?= the_title() ?></h2>
                                        <div class="meta-info">
                                            <p>Posted in <?= get_the_date(); ?> by <?= the_author_posts_link(); ?></p>
                                            <p>Categories: <?= the_category(' '); ?></p>
                                            <p>Tags: <?= the_tags('', ' ') ?></p>
                                        </div>
                                        <?= the_content(); ?>
                                    </article>
                                <?php
                                endwhile;
                            else:
                                ?> <p>Nothing to display yet!</p>
                            <?php endif; ?>
                        </div>
                    </div>
                </section>
            </main>
        </div>
    </div>
<?=get_footer()?>