<?php
/**
 * Single Post Template / Insights Article
 *
 * @package InvestmentNetwork
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

get_header();

$title     = get_the_title();
$content   = get_the_content();
$author    = get_the_author();
$date      = get_the_date();
$read_time = ! empty( $content ) ? angel_estimate_reading_time( $content ) : 5;
?>

<article class="py-16 bg-white">
    <div class="container mx-auto max-w-4xl">
        <!-- Breadcrumb / Back Link -->
        <nav class="mb-6 flex items-center gap-2 text-xs font-semibold text-slate-500 uppercase tracking-wider" aria-label="<?php esc_attr_e( 'Breadcrumb', 'angel-network' ); ?>">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="hover:text-primary transition-colors"><?php esc_html_e( 'Home', 'angel-network' ); ?></a>
            <span>/</span>
            <a href="<?php echo esc_url( home_url( '/blog/' ) ); ?>" class="hover:text-primary transition-colors"><?php esc_html_e( 'Insights', 'angel-network' ); ?></a>
            <span>/</span>
            <span class="text-slate-400 truncate max-w-xs"><?php echo esc_html( $title ? $title : 'Market Insights' ); ?></span>
        </nav>

        <!-- Article Header -->
        <header class="mb-10 text-left">
            <?php
            $categories = get_the_category();
            $cat_name = ! empty( $categories ) ? $categories[0]->name : 'Market and Sector Insights';
            $post_thumb = get_the_post_thumbnail_url( get_the_ID(), 'full' );
            if ( ! $post_thumb ) {
                $slug = get_post_field( 'post_name', get_the_ID() );
                if ( strpos( $slug, 'mipymes' ) !== false ) {
                    $post_thumb = 'https://images.unsplash.com/photo-1451187580459-43490279c0fa?auto=format&fit=crop&w=1200&q=80';
                } elseif ( strpos( $slug, 'business-owners' ) !== false ) {
                    $post_thumb = 'https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?auto=format&fit=crop&w=1200&q=80';
                } else {
                    $post_thumb = 'https://images.unsplash.com/photo-1497366216548-37526070297c?auto=format&fit=crop&w=1200&q=80';
                }
            }
            ?>
            <div class="inline-flex items-center gap-2 mb-4">
                <span class="badge badge-accent"><?php echo esc_html( $cat_name ); ?></span>
                <span class="text-xs text-slate-400">•</span>
                <span class="text-xs text-slate-500"><?php echo esc_html( get_the_date( 'F j, Y' ) ? get_the_date( 'F j, Y' ) : 'September 2026' ); ?></span>
                <span class="text-xs text-slate-400">•</span>
                <span class="text-xs text-slate-500"><?php echo esc_html( $read_time ); ?> min read</span>
            </div>

            <h1 class="text-3xl sm:text-4xl lg:text-5xl font-heading font-extrabold text-primary tracking-tight leading-tight mb-6">
                <?php echo esc_html( get_the_title() ? get_the_title() : 'Understanding Cuba’s Private Enterprise Framework: The Emergence of MIPYMEs' ); ?>
            </h1>

            <!-- Author Byline -->
            <div class="flex items-center gap-3 pt-4 border-t border-slate-100">
                <div class="w-10 h-10 rounded-full bg-primary text-white flex items-center justify-center font-bold text-sm shadow-sm">
                    CIN
                </div>
                <div>
                    <p class="text-sm font-heading font-bold text-primary"><?php echo esc_html( $author ? $author : 'Research Desk' ); ?></p>
                    <p class="text-xs text-slate-500">Cuba Investment Network &bull; Analytical Editorial</p>
                </div>
            </div>
        </header>

        <!-- Featured Image -->
        <div class="rounded-2xl overflow-hidden shadow-md mb-12 aspect-16/9 bg-slate-100 max-h-[460px]">
            <img 
                src="<?php echo esc_url( $post_thumb ); ?>" 
                alt="<?php echo esc_attr( get_the_title() ); ?>" 
                class="w-full h-full object-cover"
            >
        </div>

        <!-- Article Editorial Body -->
        <div class="prose prose-slate max-w-none text-slate-700 text-base leading-relaxed space-y-6">
            <?php 
            if ( have_posts() && ! empty( $content ) ) :
                while ( have_posts() ) : the_post();
                    the_content();
                endwhile;
            else :
            ?>
                <p class="text-lg text-slate-800 font-medium leading-relaxed">
                    Over recent years, the regulatory environment for private business activity in Cuba has undergone meaningful evolution, centered on the legal recognition and expansion of micro, small, and medium enterprises (MIPYMEs).
                </p>
                <h2 class="text-2xl font-heading font-bold text-primary mt-8 mb-4">1. Legal Foundations of Cuban MIPYMEs</h2>
                <p>
                    Established under decree laws approving non-state commercial actors, MIPYMEs operate as distinct private legal entities. These enterprises span high-demand sectors including agriculture, food production, light manufacturing, logistics, software development, and specialized professional services.
                </p>
                <h2 class="text-2xl font-heading font-bold text-primary mt-8 mb-4">2. Capital Requirements and Operating Challenges</h2>
                <p>
                    While domestic market demand for consumer goods and services remains robust, Cuban private business owners face distinct operating hurdles: access to capital equipment, international supply-chain procurement, energy grid stability, and modern financial infrastructure. Partnerships that provide equipment, logistics coordination, or strategic capital can create significant operational acceleration.
                </p>
                <blockquote class="p-4 my-6 border-l-4 border-accent bg-slate-50 italic text-slate-700 rounded-r-lg">
                    &ldquo;Clear documentation—covering legal structure, operational assets, grower or customer agreements, and practical use of funds—is the foundation of credible international engagement.&rdquo;
                </blockquote>
                <h2 class="text-2xl font-heading font-bold text-primary mt-8 mb-4">3. Cross-Border Due Diligence Priorities</h2>
                <p>
                    Prospective international partners must conduct rigorous, independent due diligence. Key areas of focus include verifying domestic business registration, reviewing banking and currency-transfer mechanics, determining cross-border sanctions compliance (such as OFAC regulations for U.S. persons), and establishing transparent commercial contracts directly with enterprise owners.
                </p>
            <?php endif; ?>
        </div>

        <!-- Editorial Desk Note -->
        <div class="mt-14 p-6 bg-slate-50 rounded-2xl border border-slate-200 text-xs text-slate-600 leading-relaxed space-y-2">
            <p class="font-bold text-primary uppercase tracking-wider text-[11px]"><?php esc_html_e( 'Editorial & Disclosure Notice', 'angel-network' ); ?></p>
            <p>
                <?php esc_html_e( 'Articles published by Cuba Investment Network are prepared for informational purposes only and do not constitute investment, financial, legal, or regulatory advice. Readers are responsible for conducting independent professional review before engaging in any transaction.', 'angel-network' ); ?>
            </p>
        </div>
    </div>
</article>

<!-- Bottom CTA -->
<?php get_template_part( 'template-parts/sections/cta-banner' ); ?>

<?php
get_footer();
