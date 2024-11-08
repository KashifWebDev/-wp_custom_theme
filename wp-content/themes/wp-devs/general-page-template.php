<?php
/*
 * Template Name: Page Template
 */
?>

<?=get_header()?>
<img src="<?= header_image() ?>" height="<?= get_custom_header()->height ?>" width="<?= get_custom_header()->width ?>">
<div id="content" class="site-content">
    <div id="primary" class="content-area">
        <main id="main" class="site-main">
            <section id="general-template">
                <div class="container">
                        <?php
                        if( have_posts() ):
                            while( have_posts() ): the_post();
                                ?>
                                <article>
                                    <h1><?= the_title() ?></h1>
                                    <?= the_content(); ?>
                                </article>
                            <?php
                            endwhile;
                        else:
                            ?> <p>Nothing to display yet!</p>
                        <?php endif; ?>
                    </div>
            </section>
        </main>
    </div>
</div>
<?=get_footer()?>
