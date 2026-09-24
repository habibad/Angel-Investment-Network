<?php
/**
 * Default Page Template
 *
 * @package InvestmentNetwork
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

get_header();
?>

<?php 
get_template_part( 'template-parts/hero/hero-page', null, [
    'title'    => get_the_title(),
    'subtitle' => '',
    'badge'    => esc_html__( 'Platform Documentation', 'angel-network' ),
    'bg_image' => 'https://images.unsplash.com/photo-1497366216548-37526070297c?auto=format&fit=crop&w=1600&q=80',
] ); 
?>

<section class="py-16 bg-white">
    <div class="container mx-auto max-w-4xl">
        <div class="prose prose-slate max-w-none text-slate-700 leading-relaxed space-y-6">
            <?php
            while ( have_posts() ) :
                the_post();
                the_content();
            endwhile;
            ?>
        </div>
    </div>
</section>

<?php
get_footer();
