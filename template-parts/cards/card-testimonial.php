<?php
/**
 * Testimonial Card Component
 *
 * @param array $testimonial
 * @package AngelNetwork
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$testimonial = isset( $args['testimonial'] ) ? $args['testimonial'] : [];

if ( empty( $testimonial ) ) {
    return;
}
?>

<div class="card p-6 md:p-8 flex flex-col justify-between relative bg-white border border-slate-200">
    <div>
        <!-- Stars & Outcome Badge -->
        <div class="flex items-center justify-between gap-2 mb-4">
            <div class="flex items-center gap-0.5">
                <?php for ( $i = 0; $i < $testimonial['rating']; $i++ ) : ?>
                    <?php echo angel_get_svg_icon( 'star', 'w-4 h-4 text-gold' ); ?>
                <?php endfor; ?>
            </div>
            <span class="badge badge-accent font-heading font-semibold text-xs">
                <?php echo esc_html( $testimonial['raised_amt'] ); ?>
            </span>
        </div>

        <!-- Quote -->
        <p class="text-sm md:text-base text-slate-700 leading-relaxed italic mb-6">
            &ldquo;<?php echo esc_html( $testimonial['quote'] ); ?>&rdquo;
        </p>
    </div>

    <!-- Author Profile Row -->
    <div class="flex items-center gap-3 pt-4 border-t border-slate-100">
        <img 
            src="<?php echo esc_url( $testimonial['author_img'] ); ?>" 
            alt="<?php echo esc_attr( $testimonial['author_name'] ); ?>" 
            class="w-12 h-12 rounded-full object-cover border border-slate-200"
        >
        <div class="flex flex-col">
            <span class="text-sm font-heading font-bold text-primary"><?php echo esc_html( $testimonial['author_name'] ); ?></span>
            <span class="text-xs text-slate-500"><?php echo esc_html( $testimonial['author_role'] ); ?></span>
            <span class="text-[11px] text-slate-400"><?php echo esc_html( $testimonial['location'] ); ?></span>
        </div>
    </div>
</div>
