<?=get_header()?>
<img src="<?= header_image() ?>" height="<?= get_custom_header()->height ?>" width="<?= get_custom_header()->width ?>">
<div id="content" class="site-content">
    <div id="primary" class="content-area">
        <main id="main" class="site-main">
            <section id="page-template">
                <div class="container">
                    <?php
                        while( have_posts() ): the_post();
                            ?>
                            <article>
                                <header>
                                    <h1><?= the_title() ?></h1>
                                </header>
                                <?= the_content(); ?>
                            </article>
                        <?php
                        endwhile;
                        ?>
                </div>
            </section>
        </main>
    </div>
</div>
<?=get_footer()?>
