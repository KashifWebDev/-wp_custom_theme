<footer class="site-footer">
    <div class="container">
        <div class="copyright">
            <p>Copyright X - All Rights Reserved</p>
        </div>
        <nav class="footer-menu">
            <?= wp_nav_menu(array(
                    'wp_devs_footer_menu' => 'wp_devs_footer_menu',
                    'depth' => 1,
            )) ?>
        </nav>
    </div>
</footer>

</div>
<?=wp_footer()?>
</body>
</html>