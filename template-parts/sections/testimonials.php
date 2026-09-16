<?php
/**
 * Testimonials & Verified Case Studies Section Component
 *
 * @package AngelNetwork
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$testimonials = angel_get_testimonials();
?>

<section class="py-20 bg-slate-50 border-b border-slate-200">
    <div class="container mx-auto">
        <div class="text-center max-w-2xl mx-auto mb-16">
            <span class="badge badge-accent mb-3"><?php esc_html_e( 'Proven Track Record', 'angel-network' ); ?></span>
            <h2 class="text-3xl sm:text-4xl font-heading font-extrabold text-primary mb-4">
                <?php esc_html_e( 'Trusted by Founders & Angels Across Canada', 'angel-network' ); ?>
            </h2>
            <p class="text-slate-600 text-base leading-relaxed">
                <?php esc_html_e( 'Hear directly from entrepreneurs who secured transformative growth rounds and investors who built diversified venture portfolios.', 'angel-network' ); ?>
            </p>
        </div>

        <div class="grid md:grid-cols-3 gap-8">
            <?php foreach ( $testimonials as $testimonial ) : ?>
                <?php get_template_part( 'template-parts/cards/card-testimonial', null, [ 'testimonial' => $testimonial ] ); ?>
            <?php endforeach; ?>
        </div>
    </div>
</section>
