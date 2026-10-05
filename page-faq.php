<?php
/**
 * Template Name: Frequently Asked Questions (FAQ)
 *
 * @package InvestmentNetwork
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

get_header();

$title    = get_the_title() ? get_the_title() : esc_html__( 'Frequently Asked Questions', 'angel-network' );
$badge    = esc_html__( 'FAQ & Knowledge Base', 'angel-network' );
$subtitle = esc_html__( 'Clear answers to common questions about Cuba Investment Network, participating as an investor or business owner, and how the platform works.', 'angel-network' );

get_template_part( 'template-parts/hero/hero-page', null, [
    'title'           => $title,
    'subtitle'        => $subtitle,
    'badge'           => $badge,
    'breadcrumb_text' => esc_html__( 'FAQ', 'angel-network' ),
    'bg_image'        => 'https://images.unsplash.com/photo-1454165804606-c3d57bc86b40?auto=format&fit=crop&w=1600&q=80',
] );
?>

<section class="py-16 sm:py-20 lg:py-24 bg-slate-50 relative overflow-hidden">
    <!-- Ambient glow decorative accents -->
    <div class="absolute top-10 -right-20 w-96 h-96 bg-primary/5 rounded-full blur-3xl pointer-events-none"></div>
    <div class="absolute bottom-10 -left-20 w-96 h-96 bg-accent/5 rounded-full blur-3xl pointer-events-none"></div>

    <div class="container mx-auto px-4 sm:px-6 lg:px-8 max-w-4xl relative z-10">
        <!-- Section Header -->
        <div class="text-center max-w-2xl mx-auto mb-12 sm:mb-16">
            <span class="badge badge-accent uppercase tracking-wider text-[11px] font-bold px-3 py-1 mb-3">
                <?php esc_html_e( 'General Platform Q&A', 'angel-network' ); ?>
            </span>
            <h2 class="text-3xl sm:text-4xl font-heading font-extrabold text-primary leading-tight">
                <?php esc_html_e( 'Everything You Need to Know', 'angel-network' ); ?>
            </h2>
            <p class="text-slate-600 text-sm sm:text-base mt-3 leading-relaxed">
                <?php esc_html_e( 'Find direct answers about platform eligibility, review procedures, introductions, and operating guidelines.', 'angel-network' ); ?>
            </p>
        </div>

        <?php
        $has_custom_content = false;
        if ( have_posts() ) {
            while ( have_posts() ) {
                the_post();
                $content = get_the_content();
                if ( ! empty( trim( $content ) ) ) {
                    $has_custom_content = true;
                    ?>
                    <div class="prose prose-slate max-w-none text-slate-700 text-base leading-relaxed space-y-6 bg-white p-8 sm:p-10 rounded-3xl border border-slate-200/80 shadow-sm mb-12">
                        <?php the_content(); ?>
                    </div>
                    <?php
                }
            }
        }

        // If no custom WordPress editor content, render the client-approved FAQ accordion
        if ( ! $has_custom_content && function_exists( 'angel_get_faqs' ) ) :
            $faqs = angel_get_faqs();
        ?>
            <!-- FAQ Accordion List -->
            <div class="space-y-4 mb-16">
                <?php foreach ( $faqs as $index => $faq ) : 
                    $num = sprintf( '%02d', $index + 1 );
                    $is_first = ( 0 === $index );
                ?>
                    <details 
                        class="group bg-white rounded-2xl border border-slate-200 shadow-sm hover:shadow-md transition-all duration-300 overflow-hidden"
                        <?php echo $is_first ? 'open' : ''; ?>
                    >
                        <summary class="w-full px-5 sm:px-7 py-5 sm:py-6 text-left flex items-center justify-between gap-4 cursor-pointer focus:outline-none select-none list-none [&::-webkit-details-marker]:hidden">
                            <div class="flex items-center gap-3.5 sm:gap-4 pr-2">
                                <span class="w-8 h-8 sm:w-9 sm:h-9 rounded-xl bg-primary/10 text-primary font-heading font-extrabold text-xs sm:text-sm flex items-center justify-center shrink-0 group-open:bg-primary group-open:text-white transition-colors duration-200">
                                    <?php echo esc_html( $num ); ?>
                                </span>
                                <h3 class="text-base sm:text-lg font-heading font-bold text-primary group-hover:text-primary-light transition-colors leading-snug">
                                    <?php echo esc_html( $faq['q'] ); ?>
                                </h3>
                            </div>
                            <span class="w-8 h-8 rounded-full bg-slate-100 group-open:bg-primary/10 group-open:text-primary flex items-center justify-center text-slate-400 shrink-0 transition-all duration-300 group-open:rotate-180">
                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                                </svg>
                            </span>
                        </summary>
                        <div class="px-5 sm:px-7 pb-6 pt-2 text-slate-600 leading-relaxed text-sm sm:text-base border-t border-slate-100 pl-16 sm:pl-20">
                            <p class="font-normal">
                                <?php echo esc_html( $faq['a'] ); ?>
                            </p>
                        </div>
                    </details>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

        <!-- Bottom Assistance CTA Box -->
        <div class="bg-primary text-white rounded-3xl p-8 sm:p-10 relative overflow-hidden shadow-xl">
            <!-- Decorative circle -->
            <div class="absolute -right-10 -bottom-10 w-64 h-64 bg-accent/20 rounded-full blur-2xl pointer-events-none"></div>

            <div class="relative z-10 flex flex-col md:flex-row md:items-center justify-between gap-6">
                <div class="max-w-xl">
                    <span class="badge badge-accent uppercase tracking-wider text-[11px] font-bold px-3 py-1 mb-3">
                        <?php esc_html_e( 'Have More Questions?', 'angel-network' ); ?>
                    </span>
                    <h3 class="text-2xl sm:text-3xl font-heading font-extrabold text-white mb-2">
                        <?php esc_html_e( 'Need Specific Guidance?', 'angel-network' ); ?>
                    </h3>
                    <p class="text-slate-300 text-sm sm:text-base leading-relaxed">
                        <?php esc_html_e( 'Whether you are a Cuban business owner seeking capital or an international investor evaluating opportunities, our team is available to assist.', 'angel-network' ); ?>
                    </p>
                </div>
                <div class="flex flex-col sm:flex-row items-stretch sm:items-center gap-3 shrink-0">
                    <a 
                        href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" 
                        class="btn btn-accent btn-md font-bold text-center justify-center shadow-md hover:shadow-lg transition-all"
                    >
                        <?php esc_html_e( 'Contact Our Team →', 'angel-network' ); ?>
                    </a>
                    <a 
                        href="<?php echo esc_url( home_url( '/invest/' ) ); ?>" 
                        class="btn btn-slate btn-md font-bold text-center justify-center bg-white/10 text-white hover:bg-white/20 border border-white/20 transition-all"
                    >
                        <?php esc_html_e( 'Explore Opportunities', 'angel-network' ); ?>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
get_footer();
