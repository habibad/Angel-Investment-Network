<?php
/**
 * Subpage Hero Banner Component
 *
 * @param array $args (title, subtitle, badge)
 * @package AngelNetwork
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$title    = isset( $args['title'] ) ? $args['title'] : get_the_title();
$subtitle = isset( $args['subtitle'] ) ? $args['subtitle'] : '';
$badge    = isset( $args['badge'] ) ? $args['badge'] : '';
?>

<section class="bg-primary text-white py-16 lg:py-20 relative overflow-hidden">
    <!-- Ambient geometric accent -->
    <div class="absolute right-0 top-0 w-96 h-96 bg-primary-light/40 rounded-full blur-3xl pointer-events-none -z-0"></div>
    <div class="absolute left-1/4 -bottom-20 w-80 h-80 bg-accent/10 rounded-full blur-2xl pointer-events-none -z-0"></div>

    <div class="container mx-auto relative z-10 text-center max-w-4xl">
        <?php if ( ! empty( $badge ) ) : ?>
            <div class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-white/10 border border-white/20 text-xs font-heading font-semibold tracking-wider text-accent uppercase mb-4">
                <span><?php echo esc_html( $badge ); ?></span>
            </div>
        <?php endif; ?>

        <h1 class="text-3xl sm:text-4xl lg:text-5xl font-heading font-extrabold text-white tracking-tight leading-tight mb-4">
            <?php echo esc_html( $title ); ?>
        </h1>

        <?php if ( ! empty( $subtitle ) ) : ?>
            <p class="text-base sm:text-lg text-slate-300 max-w-2xl mx-auto leading-relaxed">
                <?php echo esc_html( $subtitle ); ?>
            </p>
        <?php endif; ?>
    </div>
</section>
