<?php
/**
 * Industry Sectors Directory Grid Component
 *
 * @package AngelNetwork
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$industries = angel_get_industries();
?>

<section class="py-20 bg-white">
    <div class="container mx-auto">
        <div class="flex flex-col md:flex-row md:items-end justify-between mb-12">
            <div>
                <span class="badge badge-accent mb-3"><?php esc_html_e( 'Venture Sectors', 'angel-network' ); ?></span>
                <h2 class="text-3xl sm:text-4xl font-heading font-extrabold text-primary">
                    <?php esc_html_e( 'Targeted Investment Sectors', 'angel-network' ); ?>
                </h2>
                <p class="text-slate-600 text-sm sm:text-base mt-2 max-w-xl">
                    <?php esc_html_e( 'Connect across diverse growth verticals curated to meet specific angel risk-reward profiles and thesis requirements.', 'angel-network' ); ?>
                </p>
            </div>
            <a href="<?php echo esc_url( home_url( '/invest/' ) ); ?>" class="mt-4 md:mt-0 text-sm font-semibold text-primary hover:text-accent flex items-center gap-1.5 transition-colors">
                <span><?php esc_html_e( 'Explore All Sectors', 'angel-network' ); ?></span>
                <?php echo angel_get_svg_icon( 'arrow-right', 'w-4 h-4' ); ?>
            </a>
        </div>

        <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 xl:grid-cols-6 gap-4 sm:gap-6">
            <?php foreach ( $industries as $sector ) : ?>
                <a 
                    href="<?php echo esc_url( home_url( '/invest/?sector=' . $sector['slug'] ) ); ?>" 
                    class="group p-5 bg-slate-50/70 hover:bg-white rounded-xl border border-slate-200 hover:border-primary/30 hover:shadow-card transition-all duration-200 flex flex-col items-center text-center"
                >
                    <div class="w-12 h-12 rounded-xl bg-white border border-slate-200 group-hover:border-primary/20 group-hover:bg-primary group-hover:text-white flex items-center justify-center text-primary mb-3 shadow-xs transition-colors">
                        <?php echo angel_get_svg_icon( $sector['icon'], 'w-6 h-6' ); ?>
                    </div>
                    <span class="text-sm font-heading font-bold text-slate-800 group-hover:text-primary transition-colors line-clamp-1 mb-1">
                        <?php echo esc_html( $sector['title'] ); ?>
                    </span>
                    <span class="text-xs text-slate-400 font-medium">
                        <?php echo esc_html( $sector['count'] ); ?> <?php esc_html_e( 'Deals', 'angel-network' ); ?>
                    </span>
                </a>
            <?php endforeach; ?>
        </div>
    </div>
</section>
