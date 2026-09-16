<?php
/**
 * 404 Error Page Template
 *
 * @package AngelNetwork
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

get_header();

$opportunities = array_slice( angel_get_opportunities(), 0, 2 );
?>

<section class="py-24 bg-slate-50 border-b border-slate-200 text-center">
    <div class="container mx-auto max-w-2xl">
        <span class="badge badge-primary text-sm px-4 py-1.5 mb-4">404 Error</span>
        <h1 class="text-4xl sm:text-5xl font-heading font-extrabold text-primary mb-4">
            Allocation Not Found
        </h1>
        <p class="text-base text-slate-600 leading-relaxed mb-8">
            The opportunity or page you requested may have closed, transitioned to private due diligence, or moved to a different sector hub.
        </p>

        <div class="flex flex-col sm:flex-row items-center justify-center gap-4 mb-16">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="btn btn-primary btn-lg">
                Return to Homepage
            </a>
            <a href="<?php echo esc_url( home_url( '/invest/' ) ); ?>" class="btn btn-secondary btn-lg">
                Browse Active Deals Hub
            </a>
        </div>

        <div class="border-t border-slate-200 pt-12 text-left">
            <h3 class="text-lg font-heading font-bold text-primary mb-6 text-center">Explore Active Syndicate Opportunities</h3>
            <div class="grid sm:grid-cols-2 gap-6">
                <?php foreach ( $opportunities as $deal ) : ?>
                    <?php get_template_part( 'template-parts/cards/card-opportunity', null, [ 'deal' => $deal ] ); ?>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>

<?php
get_footer();
