<?php
/**
 * Footer Template
 *
 * @package AngelNetwork
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
?>
</main><!-- #primary-content -->

<footer class="w-full">
    <?php get_template_part( 'template-parts/footer/disclaimer' ); ?>
    <?php get_template_part( 'template-parts/footer/footer-nav' ); ?>
</footer>

<!-- Authentication Modal (Login / Register) -->
<?php get_template_part( 'template-parts/modals/modal-auth' ); ?>

<?php wp_footer(); ?>
</body>
</html>
