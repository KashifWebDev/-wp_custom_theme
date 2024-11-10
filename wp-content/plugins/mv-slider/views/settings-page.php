<div class="wrap">
    <h1><?= esc_html(get_admin_page_title()) ?></h1>
    <?php $active_tab = isset($_GET['tab']) ? $_GET['tab'] : 'main_options'; ?>
    <h2 class="nav-tab-wrapper">
        <a href="?page=mv-slider&tab=main_option" class="nav-tab <?= $active_tab == 'main_option' ? 'nav-tab-active' : '' ?>">Main Options</a>
        <a href="?page=mv-slider&tab=additional_option" class="nav-tab <?= $active_tab == 'additional_option' ? 'nav-tab-active' : '' ?>">Additional Options</a>
    </h2>
    <form action="options.php" method="post">
        <?php
        settings_fields('mv_slider_group');
        if($active_tab == 'main_option'){
            do_settings_sections('mv_slider_page1');
        }else{
            do_settings_sections('mv_slider_page2');
            submit_button('Save Settings');
        }
        ?>


     </form>
</div>