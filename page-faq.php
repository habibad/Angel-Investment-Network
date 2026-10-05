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
    <div class="absolute top-10 -right-24 w-96 h-96 bg-primary/5 rounded-full blur-3xl pointer-events-none"></div>
    <div class="absolute bottom-10 -left-24 w-96 h-96 bg-accent/5 rounded-full blur-3xl pointer-events-none"></div>

    <div class="container mx-auto px-4 sm:px-6 lg:px-8 max-w-5xl relative z-10">
        <!-- Section Header -->
        <div class="text-center max-w-2xl mx-auto mb-10 sm:mb-14">
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
        // Fetch client-approved FAQs
        $faqs = function_exists( 'angel_get_faqs' ) ? angel_get_faqs() : [];
        if ( ! empty( $faqs ) ) :
        ?>
            <!-- Quick Actions Toolbar -->
            <div class="flex items-center justify-between pb-4 mb-4 border-b border-slate-200/80">
                <span class="text-xs sm:text-sm font-semibold text-slate-500">
                    <?php echo esc_html( sprintf( __( 'Showing %d Essential Questions', 'angel-network' ), count( $faqs ) ) ); ?>
                </span>
                <button 
                    type="button" 
                    id="faq-toggle-all-btn" 
                    class="text-xs font-bold text-primary hover:text-accent bg-white border border-slate-200 hover:border-slate-300 px-3.5 py-1.5 rounded-xl shadow-2xs transition-all cursor-pointer flex items-center gap-1.5"
                >
                    <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                    </svg>
                    <span><?php esc_html_e( 'Expand All', 'angel-network' ); ?></span>
                </button>
            </div>

            <!-- Distinct FAQ Accordion Cards -->
            <div class="space-y-4 mb-16">
                <?php foreach ( $faqs as $index => $faq ) : 
                    $num = sprintf( '%02d', $index + 1 );
                    // Open the first 2 questions by default for great scanability
                    $is_open = ( $index < 2 );
                ?>
                    <details 
                        class="faq-accordion-item group bg-white rounded-2xl border border-slate-200/90 shadow-sm hover:border-slate-300 hover:shadow-md transition-all duration-200 overflow-hidden"
                        <?php echo $is_open ? 'open' : ''; ?>
                    >
                        <summary class="w-full px-5 sm:px-7 py-5 sm:py-6 text-left flex items-center justify-between gap-4 cursor-pointer focus:outline-none select-none list-none [&::-webkit-details-marker]:hidden bg-white group-open:bg-slate-50/70 transition-colors">
                            <div class="flex items-center gap-3.5 sm:gap-4 pr-2">
                                <span class="w-9 h-9 sm:w-10 sm:h-10 rounded-xl bg-primary/10 text-primary font-heading font-extrabold text-xs sm:text-sm flex items-center justify-center shrink-0 group-open:bg-primary group-open:text-white transition-all duration-200 shadow-xs">
                                    <?php echo esc_html( $num ); ?>
                                </span>
                                <h3 class="text-base sm:text-lg font-heading font-bold text-primary group-hover:text-accent transition-colors leading-snug">
                                    <?php echo esc_html( $faq['q'] ); ?>
                                </h3>
                            </div>
                            <span class="w-8 h-8 rounded-full bg-slate-100 group-open:bg-primary/10 group-open:text-primary flex items-center justify-center text-slate-400 shrink-0 transition-transform duration-300 group-open:rotate-180">
                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                                </svg>
                            </span>
                        </summary>
                        <div class="px-5 sm:px-7 pb-6 pt-3 text-slate-600 leading-relaxed text-sm sm:text-base border-t border-slate-100 bg-white">
                            <div class="pl-12 sm:pl-14">
                                <p class="font-normal text-slate-600 leading-relaxed">
                                    <?php echo esc_html( $faq['a'] ); ?>
                                </p>
                            </div>
                        </div>
                    </details>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

        <!-- Bottom Assistance CTA Box -->
        <div class="bg-primary text-white rounded-3xl p-8 sm:p-12 relative overflow-hidden shadow-xl">
            <!-- Decorative atmospheric circles -->
            <div class="absolute -right-10 -bottom-10 w-72 h-72 bg-accent/20 rounded-full blur-3xl pointer-events-none"></div>
            <div class="absolute -left-10 -top-10 w-56 h-56 bg-white/5 rounded-full blur-2xl pointer-events-none"></div>

            <div class="relative z-10 flex flex-col lg:flex-row lg:items-center justify-between gap-8">
                <div class="max-w-xl">
                    <span class="badge badge-accent uppercase tracking-wider text-[11px] font-bold px-3 py-1 mb-3">
                        <?php esc_html_e( 'Have More Questions?', 'angel-network' ); ?>
                    </span>
                    <h3 class="text-2xl sm:text-3xl font-heading font-extrabold text-white mb-2 leading-tight">
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
                        class="btn btn-md font-bold text-center justify-center bg-white text-primary hover:bg-slate-100 shadow-md transition-all"
                    >
                        <?php esc_html_e( 'Explore Opportunities →', 'angel-network' ); ?>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const toggleBtn = document.getElementById('faq-toggle-all-btn');
    if (toggleBtn) {
        toggleBtn.addEventListener('click', () => {
            const items = document.querySelectorAll('.faq-accordion-item');
            const anyClosed = Array.from(items).some(item => !item.open);
            items.forEach(item => item.open = anyClosed);
            const btnSpan = toggleBtn.querySelector('span');
            if (btnSpan) {
                btnSpan.textContent = anyClosed ? '<?php echo esc_js( __( 'Collapse All', 'angel-network' ) ); ?>' : '<?php echo esc_js( __( 'Expand All', 'angel-network' ) ); ?>';
            }
        });
    }
});
</script>

<?php
get_footer();
