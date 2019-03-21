    </main>

    <footer class="site-footer">

        <div class="footer-cols">

            <?php get_template_part( 'template-parts/navigation/footer', 'nav' ); ?>

        </div>

        <div class="footer-middle">FOR SOCCER</div>

        <?php get_template_part( 'template-parts/navigation/footer', 'social' ); ?>

        <div class="footer-extra">
            <div class="copyright">&copy; <?php echo date("Y"); ?> Born Kickers LLC. All Rights Reserved</div>

            <?php get_template_part( 'template-parts/navigation/footer', 'terms' ); ?>
        </div>

    <?php wp_footer(); ?>
    </footer>

</div>
</body>
</html>
