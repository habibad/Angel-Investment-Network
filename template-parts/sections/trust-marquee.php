<?php
/**
 * Trust & Media Marquee Component
 *
 * @package AngelNetwork
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$brands = angel_get_media_brands();
?>

<section class="py-12 bg-white border-b border-slate-200">
    <div class="container mx-auto">
        <p class="text-center text-xs font-heading font-bold uppercase tracking-widest text-slate-400 mb-8">
            <?php esc_html_e( 'Recognized & Featured Across Premier Financial Media', 'angel-network' ); ?>
        </p>
        <div class="grid grid-cols-2 sm:grid-cols-4 lg:grid-cols-8 gap-6 items-center text-center opacity-70 hover:opacity-100 transition-opacity">
            <?php foreach ( $brands as $brand ) : ?>
                <span class="text-slate-500 font-heading font-extrabold text-base sm:text-lg tracking-tighter hover:text-primary transition-colors cursor-default whitespace-nowrap">
                    <?php echo esc_html( $brand['name'] ); ?>
                </span>
            <?php endforeach; ?>
        </div>
    </div>
</section>
