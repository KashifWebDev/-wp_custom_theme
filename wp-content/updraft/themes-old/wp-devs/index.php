<?=get_header()?>
    <img src="<?= header_image() ?>" height="<?= get_custom_header()->height ?>" width="<?= get_custom_header()->width ?>">
     <div id="content" class="site-content">
         <div id="primary" class="content-area">
             <main id="main" class="site-main">
                 <h1>Blog</h1>
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
                     <?= get_sidebar(); ?>
                 </div>
             </main>
         </div>
     </div>
<?=get_footer()?>