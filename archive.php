<?php
/**
 * Archive & Category Template
 *
 * @package AngelNetwork
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

get_header();

$archive_title = get_the_archive_title();
$articles      = angel_get_blog_posts();
?>

<!-- Subpage Hero -->
<?php 
get_template_part( 'template-parts/hero/hero-page', null, [
    'title'    => esc_html( $archive_title ? $archive_title : 'Venture Insights & Market Research' ),
    'subtitle' => esc_html__( 'Quarterly valuation reports, seed syndication playbooks, and founder fundraising intelligence.', 'angel-network' ),
    'badge'    => esc_html__( 'Editorial Archive', 'angel-network' ),
] ); 
?>

<section class="py-20 bg-slate-50 border-b border-slate-200">
    <div class="container mx-auto">
        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php if ( have_posts() ) : ?>
                <?php while ( have_posts() ) : the_post(); ?>
                    <article class="card group flex flex-col overflow-hidden transition-all duration-300 hover:-translate-y-1">
                        <div class="relative h-48 overflow-hidden bg-slate-100">
                            <?php if ( has_post_thumbnail() ) : ?>
                                <?php the_post_thumbnail( 'medium_large', [ 'class' => 'w-full h-full object-cover transition-transform duration-500 group-hover:scale-105' ] ); ?>
                            <?php else : ?>
                                <img src="https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?auto=format&fit=crop&w=800&q=80" alt="<?php the_title_attribute(); ?>" class="w-full h-full object-cover">
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
                                    <span>Read Article</span>
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
