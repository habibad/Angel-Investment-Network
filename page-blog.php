<?php
/**
 * Template Name: Blog & Insights Page
 * Template for displaying the Cuba Investment Network Insights & Resources archive (/blog/)
 * Conforms to PDF Pages 27 & 36
 *
 * @package InvestmentNetwork
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

get_header();

// Fetch posts from database, or fallback to curated demo articles
$db_posts = new WP_Query( [
    'post_type'      => 'post',
    'post_status'    => 'publish',
    'posts_per_page' => -1,
    'orderby'        => 'date',
    'order'          => 'DESC',
] );

$articles = [];
if ( $db_posts->have_posts() ) {
    while ( $db_posts->have_posts() ) {
        $db_posts->the_post();
        $cats = get_the_category();
        $cat_name = ! empty( $cats ) ? $cats[0]->name : 'Market and Sector Insights';
        $content = get_the_content();
        $read_time = function_exists( 'angel_estimate_reading_time' ) ? angel_estimate_reading_time( $content ) : 5;

        $thumbnail = get_the_post_thumbnail_url( get_the_ID(), 'large' );
        if ( ! $thumbnail ) {
            // Curated relevant business imagery
            $slug = get_post_field( 'post_name', get_the_ID() );
            if ( strpos( $slug, 'mipymes' ) !== false ) {
                $thumbnail = get_template_directory_uri() . '/assets/images/insights-herobg.jpg';
            } elseif ( strpos( $slug, 'business-owners' ) !== false ) {
                $thumbnail = 'https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?auto=format&fit=crop&w=800&q=80';
            } else {
                $thumbnail = 'https://images.unsplash.com/photo-1497366216548-37526070297c?auto=format&fit=crop&w=800&q=80';
            }
        }

        $articles[] = [
            'id'          => get_the_ID(),
            'title'       => get_the_title(),
            'slug'        => get_post_field( 'post_name', get_the_ID() ),
            'url'         => home_url( '/blog/' . get_post_field( 'post_name', get_the_ID() ) . '/' ),
            'excerpt'     => get_the_excerpt() ? get_the_excerpt() : wp_trim_words( $content, 26 ),
            'category'    => $cat_name,
            'date'        => get_the_date( 'F Y' ),
            'read_time'   => $read_time . ' min read',
            'author_name' => 'Research Desk',
            'author_role' => 'Cuba Investment Network',
            'image'       => $thumbnail,
        ];
    }
    wp_reset_postdata();
}

// Fallback if DB was empty
if ( empty( $articles ) && function_exists( 'angel_get_blog_posts' ) ) {
    $raw_articles = angel_get_blog_posts();
    foreach ( $raw_articles as $item ) {
        $item['url'] = home_url( '/blog/' . $item['slug'] . '/' );
        $articles[]  = $item;
    }
}

// Identify featured article (first article)
$featured_article = ! empty( $articles ) ? $articles[0] : null;
$grid_articles     = ! empty( $articles ) ? array_slice( $articles, 1 ) : [];
?>

<!-- Subpage Hero (PDF Page 27 Specification) -->
<?php 
get_template_part( 'template-parts/hero/hero-page', null, [
    'title'           => esc_html__( 'Insights on Cuba-Focused Investment', 'angel-network' ),
    'subtitle'        => esc_html__( 'Articles, market observations, and practical resources for business owners and investors exploring opportunities connected to Cuba.', 'angel-network' ),
    'badge'           => esc_html__( 'Insights & Resources', 'angel-network' ),
    'breadcrumb_text' => esc_html__( 'Insights', 'angel-network' ),
    'bg_image'        => get_template_directory_uri() . '/assets/images/insights-herobg.jpg',
] ); 
?>

<!-- Main Content Area -->
<section class="py-16 sm:py-20 bg-slate-50 min-h-screen">
    <div class="container mx-auto">

        <!-- Category Filter Navigation Bar -->
        <div class="mb-12">
            <div class="flex flex-wrap items-center justify-between gap-4 pb-6 border-b border-slate-200">
                <div class="flex flex-wrap items-center gap-2" id="insights-category-filters" role="tablist" aria-label="<?php esc_attr_e( 'Filter articles by category', 'angel-network' ); ?>">
                    <button 
                        type="button" 
                        data-filter="all" 
                        class="insights-filter-btn px-4 py-2 rounded-full text-xs font-heading font-bold bg-primary text-white shadow-xs transition-all cursor-pointer"
                    >
                        <?php esc_html_e( 'All Insights', 'angel-network' ); ?> (<?php echo esc_html( count( $articles ) ); ?>)
                    </button>
                    <button 
                        type="button" 
                        data-filter="Market and Sector Insights" 
                        class="insights-filter-btn px-4 py-2 rounded-full text-xs font-heading font-bold bg-white text-slate-700 border border-slate-200 hover:border-slate-300 hover:bg-slate-100 transition-all cursor-pointer"
                    >
                        <?php esc_html_e( 'Market & Sector Insights', 'angel-network' ); ?>
                    </button>
                    <button 
                        type="button" 
                        data-filter="Resources for Business Owners" 
                        class="insights-filter-btn px-4 py-2 rounded-full text-xs font-heading font-bold bg-white text-slate-700 border border-slate-200 hover:border-slate-300 hover:bg-slate-100 transition-all cursor-pointer"
                    >
                        <?php esc_html_e( 'For Business Owners', 'angel-network' ); ?>
                    </button>
                    <button 
                        type="button" 
                        data-filter="Resources for Investors" 
                        class="insights-filter-btn px-4 py-2 rounded-full text-xs font-heading font-bold bg-white text-slate-700 border border-slate-200 hover:border-slate-300 hover:bg-slate-100 transition-all cursor-pointer"
                    >
                        <?php esc_html_e( 'For Investors', 'angel-network' ); ?>
                    </button>
                </div>

                <div class="text-xs text-slate-500 font-medium">
                    <?php esc_html_e( 'Analytical briefings & practical guides', 'angel-network' ); ?>
                </div>
            </div>
        </div>

        <?php if ( ! empty( $featured_article ) ) : ?>
            <!-- Featured Lead Briefing Showcase -->
            <div class="mb-14 article-card-item" data-category="<?php echo esc_attr( $featured_article['category'] ); ?>">
                <div class="card overflow-hidden bg-white border border-slate-200 hover:border-primary/30 transition-all duration-300 shadow-md hover:shadow-xl rounded-2xl group">
                    <div class="grid grid-cols-1 lg:grid-cols-12 gap-0">
                        <div class="lg:col-span-7 relative h-72 sm:h-96 lg:h-auto overflow-hidden bg-slate-900">
                            <img 
                                src="<?php echo esc_url( $featured_article['image'] ); ?>" 
                                alt="<?php echo esc_attr( $featured_article['title'] ); ?>" 
                                class="w-full h-full object-cover opacity-90 transition-transform duration-700 group-hover:scale-105"
                            >
                            <div class="absolute inset-0 bg-gradient-to-t from-slate-950/80 via-transparent to-transparent lg:hidden"></div>
                            <div class="absolute top-4 left-4 flex items-center gap-2">
                                <span class="badge badge-accent shadow-md">
                                    ★ <?php esc_html_e( 'Featured Briefing', 'angel-network' ); ?>
                                </span>
                                <span class="badge badge-primary bg-primary/90 text-white font-semibold">
                                    <?php echo esc_html( $featured_article['category'] ); ?>
                                </span>
                            </div>
                        </div>

                        <div class="lg:col-span-5 p-6 sm:p-10 flex flex-col justify-between">
                            <div>
                                <div class="flex items-center gap-2 text-xs text-slate-400 font-medium mb-3">
                                    <span><?php echo esc_html( $featured_article['date'] ); ?></span>
                                    <span>•</span>
                                    <span><?php echo esc_html( $featured_article['read_time'] ); ?></span>
                                </div>

                                <h2 class="text-xl sm:text-2xl lg:text-3xl font-heading font-extrabold text-primary group-hover:text-accent transition-colors leading-tight mb-4">
                                    <a href="<?php echo esc_url( $featured_article['url'] ); ?>">
                                        <?php echo esc_html( $featured_article['title'] ); ?>
                                    </a>
                                </h2>

                                <p class="text-sm text-slate-600 leading-relaxed mb-6">
                                    <?php echo esc_html( $featured_article['excerpt'] ); ?>
                                </p>
                            </div>

                            <div class="pt-6 border-t border-slate-100 flex items-center justify-between">
                                <div class="flex items-center gap-2.5">
                                    <div class="w-8 h-8 rounded-full bg-primary text-white flex items-center justify-center font-bold text-xs">
                                        CIN
                                    </div>
                                    <div class="flex flex-col">
                                        <span class="text-xs font-bold text-slate-800"><?php echo esc_html( $featured_article['author_name'] ); ?></span>
                                        <span class="text-[10px] text-slate-400"><?php echo esc_html( $featured_article['author_role'] ); ?></span>
                                    </div>
                                </div>

                                <a href="<?php echo esc_url( $featured_article['url'] ); ?>" class="btn btn-primary btn-sm text-xs font-bold px-4 py-2 rounded-lg shadow-sm group-hover:bg-accent group-hover:border-accent transition-all flex items-center gap-1.5">
                                    <span><?php esc_html_e( 'Read Briefing', 'angel-network' ); ?></span>
                                    <?php echo angel_get_svg_icon( 'arrow-right', 'w-3.5 h-3.5' ); ?>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <!-- Articles Grid (Remaining Articles) -->
        <div>
            <div class="flex items-center justify-between mb-8">
                <h3 class="font-heading font-bold text-xl text-primary">
                    <?php esc_html_e( 'Latest Briefings & Practical Resources', 'angel-network' ); ?>
                </h3>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8" id="insights-articles-grid">
                <?php foreach ( $articles as $article ) : ?>
                    <article class="card group flex flex-col justify-between overflow-hidden transition-all duration-300 hover:-translate-y-1 bg-white border border-slate-200 rounded-2xl shadow-sm hover:shadow-xl article-card-item" data-category="<?php echo esc_attr( $article['category'] ); ?>">
                        <div>
                            <!-- Card Image -->
                            <div class="relative h-48 sm:h-52 overflow-hidden bg-slate-100">
                                <img 
                                    src="<?php echo esc_url( $article['image'] ); ?>" 
                                    alt="<?php echo esc_attr( $article['title'] ); ?>" 
                                    loading="lazy"
                                    class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105"
                                >
                                <div class="absolute top-3 left-3">
                                    <span class="badge badge-primary bg-primary/90 text-white font-semibold backdrop-blur-xs text-[11px]">
                                        <?php echo esc_html( $article['category'] ); ?>
                                    </span>
                                </div>
                            </div>

                            <!-- Card Body -->
                            <div class="p-6">
                                <div class="flex items-center gap-2 text-xs text-slate-400 font-medium mb-2.5">
                                    <span><?php echo esc_html( $article['date'] ); ?></span>
                                    <span>•</span>
                                    <span><?php echo esc_html( $article['read_time'] ); ?></span>
                                </div>

                                <h3 class="text-base font-heading font-bold text-primary group-hover:text-accent transition-colors line-clamp-2 leading-snug mb-3">
                                    <a href="<?php echo esc_url( $article['url'] ); ?>">
                                        <?php echo esc_html( $article['title'] ); ?>
                                    </a>
                                </h3>

                                <p class="text-xs text-slate-600 line-clamp-3 leading-relaxed">
                                    <?php echo esc_html( $article['excerpt'] ); ?>
                                </p>
                            </div>
                        </div>

                        <!-- Card Footer -->
                        <div class="p-6 pt-4 border-t border-slate-100 flex items-center justify-between">
                            <span class="text-xs font-semibold text-slate-700"><?php echo esc_html( $article['author_name'] ); ?></span>
                            <a href="<?php echo esc_url( $article['url'] ); ?>" class="text-xs font-bold text-primary group-hover:text-accent flex items-center gap-1 transition-colors">
                                <span><?php esc_html_e( 'Read Article', 'angel-network' ); ?></span>
                                <?php echo angel_get_svg_icon( 'arrow-right', 'w-3 h-3' ); ?>
                            </a>
                        </div>
                    </article>
                <?php endforeach; ?>
            </div>

            <!-- Empty State if filter yields no matches -->
            <div id="insights-empty-state" class="hidden text-center py-16 bg-white rounded-2xl border border-slate-200 p-8">
                <p class="text-sm font-semibold text-slate-700 mb-1"><?php esc_html_e( 'No articles found in this category.', 'angel-network' ); ?></p>
                <p class="text-xs text-slate-500 mb-4"><?php esc_html_e( 'Select another category or view all insights.', 'angel-network' ); ?></p>
                <button type="button" onclick="document.querySelector('[data-filter=all]').click()" class="btn btn-primary btn-sm text-xs font-bold">
                    <?php esc_html_e( 'View All Insights', 'angel-network' ); ?>
                </button>
            </div>
        </div>

        <!-- Editorial Disclosure Notice (PDF Page 27 & 36) -->
        <div class="mt-16 p-6 sm:p-8 bg-white rounded-2xl border border-slate-200 shadow-xs text-xs text-slate-600 leading-relaxed space-y-2">
            <div class="flex items-center gap-2 mb-1">
                <span class="w-2 h-2 rounded-full bg-accent"></span>
                <span class="font-heading font-bold text-primary uppercase tracking-wider text-[11px]">
                    <?php esc_html_e( 'Editorial & Analytical Disclosure', 'angel-network' ); ?>
                </span>
            </div>
            <p>
                <?php esc_html_e( 'All articles and market observations published by Cuba Investment Network are prepared for informational and educational purposes. They do not constitute investment, financial, legal, or tax advice, nor should they be construed as an endorsement or guarantee of any transaction. Readers are advised to consult qualified independent legal, financial, and regulatory counsel prior to making any commercial commitments.', 'angel-network' ); ?>
            </p>
        </div>

    </div>
</section>

<!-- Client-side Interactive Category Filter Script -->
<script>
document.addEventListener('DOMContentLoaded', () => {
    const filterButtons = document.querySelectorAll('.insights-filter-btn');
    const articleCards = document.querySelectorAll('.article-card-item');
    const emptyState = document.getElementById('insights-empty-state');

    filterButtons.forEach(btn => {
        btn.addEventListener('click', () => {
            const filterValue = btn.getAttribute('data-filter');

            // Update active pill classes
            filterButtons.forEach(b => {
                b.classList.remove('bg-primary', 'text-white');
                b.classList.add('bg-white', 'text-slate-700', 'border', 'border-slate-200');
            });
            btn.classList.add('bg-primary', 'text-white');
            btn.classList.remove('bg-white', 'text-slate-700', 'border', 'border-slate-200');

            let visibleCount = 0;
            articleCards.forEach(card => {
                const cardCat = card.getAttribute('data-category');
                if (filterValue === 'all' || cardCat === filterValue) {
                    card.classList.remove('hidden');
                    visibleCount++;
                } else {
                    card.classList.add('hidden');
                }
            });

            if (emptyState) {
                if (visibleCount === 0) {
                    emptyState.classList.remove('hidden');
                } else {
                    emptyState.classList.add('hidden');
                }
            }
        });
    });
});
</script>

<!-- Bottom CTA Banner -->
<?php get_template_part( 'template-parts/sections/cta-banner' ); ?>

<?php
get_footer();
