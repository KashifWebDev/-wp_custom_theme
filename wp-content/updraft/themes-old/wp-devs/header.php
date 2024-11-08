<!doctype html>
<html <?=language_attributes()?>>
<head>
    <meta charset="<?=bloginfo('charset')?>">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <?=wp_head()?>
</head>
<body <?=body_class()?>>
<div id="page" class="site">
    <header>
        <section class="top-bar">
            <div class="container">
                <div class="logo">
                    <?= the_custom_logo(); ?>
                </div>
                <div class="searchbox">
                    Searchbox
                </div>
            </div>

        </section>
        <section class="menu-area">
            <div class="container">
                <nav class="main-menu">
                    <button class="check-button">
                        <span class="menu-icon">
                            <div class="bar1"></div>
                            <div class="bar2"></div>
                            <div class="bar3"></div>
                        </span>
                    </button>
                    <?= wp_nav_menu(array(
                            'theme_location' => 'wp_devs_main_menu',
                            'depth' => 2,
                    )) ?>
                </nav>
            </div>
        </section>
    </header>