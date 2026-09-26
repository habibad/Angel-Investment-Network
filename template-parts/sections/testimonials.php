<?php
/**
 * Testimonials & Verified Case Studies Section Component
 *
 * @package InvestmentNetwork
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$testimonials = angel_get_testimonials();
?>

<section class="py-20 bg-slate-50">
    <div class="container mx-auto">
        <div class="text-center max-w-2xl mx-auto mb-16 reveal-on-scroll">
            <span class="badge badge-accent mb-3"><?php esc_html_e( 'Community Perspectives', 'angel-network' ); ?></span>
            <h2 class="text-3xl sm:text-4xl font-heading font-extrabold text-primary mb-4">
                <?php esc_html_e( 'Perspectives from Business Owners and Investors', 'angel-network' ); ?>
            </h2>
            <p class="text-slate-600 text-base leading-relaxed">
                <?php esc_html_e( 'Hear from business owners developing new ventures and investors exploring opportunities connected to Cuba’s emerging private sector.', 'angel-network' ); ?>
            </p>
        </div>

        <div class="grid md:grid-cols-3 gap-8" data-reveal-group>
            <?php foreach ( $testimonials as $testimonial ) : ?>
                <?php get_template_part( 'template-parts/cards/card-testimonial', null, [ 'testimonial' => $testimonial ] ); ?>
            <?php endforeach; ?>
        </div>
    </div>
</section>
