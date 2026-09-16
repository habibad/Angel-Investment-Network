<?php
/**
 * Minimal Trust & Media Strip - Editorial Redesign
 *
 * @package AngelNetwork
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$brands = [
    'Forbes',
    'Bloomberg',
    'Financial Times',
    'TechCrunch',
    'The Times',
    'BBC News',
    'Globe & Mail'
];
?>

<section class="py-14 bg-brand-canvas border-y border-brand-border">
    <div class="container mx-auto">
        <div class="flex flex-col md:flex-row items-center justify-between gap-6 md:gap-12">
            <p class="text-xs font-sans text-brand-light font-medium tracking-wide shrink-0 text-center md:text-left">
                <?php esc_html_e( 'Trusted by forward-thinking companies and featured in', 'angel-network' ); ?>
            </p>

            <div class="flex flex-wrap items-center justify-center md:justify-end gap-x-10 gap-y-3 opacity-60 hover:opacity-90 transition-opacity">
                <?php foreach ( $brands as $brand ) : ?>
                    <span class="font-serif text-base tracking-tight text-brand-dark cursor-default select-none">
                        <?php echo esc_html( $brand ); ?>
                    </span>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>
