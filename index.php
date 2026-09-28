<?php
/**
 * Main Template Fallback / Insights Index
 *
 * @package InvestmentNetwork
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

get_header();

$articles = angel_get_blog_posts();
?>

<!-- Subpage Hero (PDF Page 27) -->
<?php 
get_template_part( 'template-parts/hero/hero-page', null, [
    'title'           => esc_html__( 'Insights on Cuba-Focused Investment', 'angel-network' ),
    'subtitle'        => esc_html__( 'Articles, market observations, and practical resources for business owners and investors exploring opportunities connected to Cuba.', 'angel-network' ),
    'badge'           => esc_html__( 'Insights & Resources', 'angel-network' ),
    'breadcrumb_text' => esc_html__( 'Insights', 'angel-network' ),
    'bg_image'        => 'https://images.unsplash.com/photo-1451187580459-43490279c0fa?auto=format&fit=crop&w=1600&q=80',
] ); 
?>

<!-- Articles Grid -->
<section class="py-20 bg-slate-50">
    <div class="container mx-auto">
        <!-- Content Categories Filter -->
        <div class="flex flex-wrap items-center gap-2 mb-12">
            <span class="px-4 py-2 rounded-full text-xs font-heading font-bold bg-primary text-white">
                <?php esc_html_e( 'All Insights', 'angel-network' ); ?>
            </span>
            <span class="px-4 py-2 rounded-full text-xs font-heading font-bold bg-white text-slate-700 border border-slate-200">
                <?php esc_html_e( 'Market and Sector Insights', 'angel-network' ); ?>
            </span>
            <span class="px-4 py-2 rounded-full text-xs font-heading font-bold bg-white text-slate-700 border border-slate-200">
                <?php esc_html_e( 'Resources for Business Owners', 'angel-network' ); ?>
            </span>
            <span class="px-4 py-2 rounded-full text-xs font-heading font-bold bg-white text-slate-700 border border-slate-200">
                <?php esc_html_e( 'Resources for Investors', 'angel-network' ); ?>
            </span>
        </div>

        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php if ( have_posts() ) : ?>
                <?php while ( have_posts() ) : the_post(); ?>
                    <article class="card group flex flex-col overflow-hidden transition-all duration-300 hover:-translate-y-1 bg-white border border-slate-200">
                        <div class="relative h-48 overflow-hidden bg-slate-100">
                            <?php if ( has_post_thumbnail() ) : ?>
                                <?php the_post_thumbnail( 'medium_large', [ 'class' => 'w-full h-full object-cover transition-transform duration-500 group-hover:scale-105' ] ); ?>
                            <?php else : ?>
                                <img src="https://images.unsplash.com/photo-1451187580459-43490279c0fa?auto=format&fit=crop&w=800&q=80" alt="<?php the_title_attribute(); ?>" class="w-full h-full object-cover">
                            <?php endif; ?>
                        </div>
                        <div class="p-6 flex-1 flex flex-col justify-between">
                            <div>
                                <span class="text-xs text-slate-400 font-medium block mb-2"><?php echo esc_html( get_the_date() ); ?></span>
                                <h3 class="text-base font-heading font-bold text-primary group-hover:text-primary-light transition-colors line-clamp-2 leading-snug mb-2.5">
                                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                </h3>
                                <div class="text-xs text-slate-600 line-clamp-3 leading-relaxed mb-4">
                                    <?php the_excerpt(); ?>
                                </div>
                            </div>
                            <div class="pt-4 border-t border-slate-100">
                                <a href="<?php the_permalink(); ?>" class="text-xs font-semibold text-primary group-hover:text-accent flex items-center gap-1">
                                    <span><?php esc_html_e( 'Read Article', 'angel-network' ); ?></span>
                                    <?php echo angel_get_svg_icon( 'arrow-right', 'w-3 h-3' ); ?>
                                </a>
                            </div>
                        </div>
                    </article>
                <?php endwhile; ?>
            <?php else : ?>
                <?php foreach ( $articles as $article ) : ?>
                    <?php get_template_part( 'template-parts/cards/card-article', null, [ 'article' => $article ] ); ?>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</section>

<!-- Bottom CTA -->
<?php get_template_part( 'template-parts/sections/cta-banner' ); ?>

<?php
get_footer();
