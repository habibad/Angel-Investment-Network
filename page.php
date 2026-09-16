<?php
/**
 * Default Page Template
 *
 * @package AngelNetwork
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
] ); 
?>

<section class="py-16 bg-white border-b border-slate-200">
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
