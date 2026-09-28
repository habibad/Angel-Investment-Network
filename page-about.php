<?php
/**
 * Template Name: About Us
 *
 * @package InvestmentNetwork
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

get_header();
?>

<!-- Subpage Hero -->
<?php 
get_template_part( 'template-parts/hero/hero-page', null, [
    'title'           => esc_html__( 'About Cuba Investment Network', 'angel-network' ),
    'subtitle'        => esc_html__( 'Cuba Investment Network is a platform designed to help Cuba-focused business owners present investment opportunities and connect with investors and strategic partners around the world.', 'angel-network' ),
    'badge'           => esc_html__( 'About Us', 'angel-network' ),
    'breadcrumb_text' => esc_html__( 'About Us', 'angel-network' ),
    'bg_image'        => 'https://images.unsplash.com/photo-1542744173-8e7e53415bb0?auto=format&fit=crop&w=1600&q=80',
] ); 
?>

<!-- Our Purpose Section (PDF Pages 22-23) -->
<section class="py-20 lg:py-24 bg-white relative overflow-hidden">
    <!-- Subtle ambient decorative accents -->
    <div class="absolute top-1/4 -right-24 w-96 h-96 bg-primary/5 rounded-full blur-3xl pointer-events-none"></div>
    <div class="absolute bottom-10 -left-20 w-80 h-80 bg-accent/5 rounded-full blur-3xl pointer-events-none"></div>

    <div class="container mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="grid lg:grid-cols-12 gap-10 lg:gap-14 items-stretch">
            <!-- Left Column: Purpose & Structured Copy -->
            <div class="lg:col-span-6 flex flex-col justify-center">
                <div class="inline-flex items-center gap-2 mb-3">
                    <span class="badge badge-accent uppercase tracking-wider text-[11px] font-bold px-3 py-1">
                        <?php esc_html_e( 'Our Purpose', 'angel-network' ); ?>
                    </span>
                    <span class="text-xs font-semibold text-slate-300">•</span>
                    <span class="text-xs font-semibold text-slate-500 uppercase tracking-wider">
                        <?php esc_html_e( 'Platform Mandate', 'angel-network' ); ?>
                    </span>
                </div>

                <h2 class="text-3xl sm:text-4xl lg:text-[2.5rem] font-heading font-extrabold text-primary leading-tight mb-5">
                    <?php esc_html_e( 'Creating Access to Cuba-Focused Opportunities', 'angel-network' ); ?>
                </h2>

                <p class="text-base sm:text-lg text-slate-600 leading-relaxed font-normal mb-6">
                    <?php esc_html_e( 'Cuba-focused businesses can offer valuable opportunities across agriculture, technology, manufacturing, energy, tourism, professional services, and other sectors. However, information about these businesses and their investment needs is often fragmented or difficult for international investors to access.', 'angel-network' ); ?>
                </p>

                <!-- Structured Value Points from Approved PDF Copy -->
                <div class="space-y-4">
                    <!-- Point 1: Structured Discovery -->
                    <div class="flex items-start gap-4 p-4 sm:p-5 rounded-2xl bg-slate-50 border border-slate-200/80 hover:border-primary/20 hover:bg-slate-50/80 transition-all duration-300">
                        <div class="w-10 h-10 rounded-xl bg-primary/10 text-primary flex items-center justify-center shrink-0 mt-0.5">
                            <?php echo angel_get_svg_icon( 'sparkles', 'w-5 h-5' ); ?>
                        </div>
                        <div>
                            <h3 class="text-sm sm:text-base font-heading font-bold text-slate-900 mb-1">
                                <?php esc_html_e( 'Structured Opportunity Presentation', 'angel-network' ); ?>
                            </h3>
                            <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">
                                <?php esc_html_e( 'Cuba Investment Network gives business owners a structured way to present their companies, growth plans, and funding needs. It also gives investors a central place to discover opportunities and identify businesses that may match their interests.', 'angel-network' ); ?>
                            </p>
                        </div>
                    </div>

                    <!-- Point 2: Direct Communication & Independent Governance -->
                    <div class="flex items-start gap-4 p-4 sm:p-5 rounded-2xl bg-slate-50 border border-slate-200/80 hover:border-primary/20 hover:bg-slate-50/80 transition-all duration-300">
                        <div class="w-10 h-10 rounded-xl bg-accent/15 text-accent-700 flex items-center justify-center shrink-0 mt-0.5">
                            <?php echo angel_get_svg_icon( 'shield', 'w-5 h-5' ); ?>
                        </div>
                        <div>
                            <h3 class="text-sm sm:text-base font-heading font-bold text-slate-900 mb-1">
                                <?php esc_html_e( 'Visibility & Direct Engagement', 'angel-network' ); ?>
                            </h3>
                            <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">
                                <?php esc_html_e( 'Our role is to improve visibility and enable direct communication. Business owners and investors remain responsible for their own evaluations, due diligence, negotiations, and professional advice.', 'angel-network' ); ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Column: Visual Frame with Docked Direct Connections Card -->
            <div class="lg:col-span-6 relative flex flex-col">
                <div class="relative rounded-3xl overflow-hidden shadow-2xl border-4 border-white bg-slate-900 min-h-[440px] sm:min-h-[500px] lg:h-full lg:min-h-[540px] flex flex-col justify-between group">
                    <!-- High-Resolution Image -->
                    <img 
                        src="https://images.unsplash.com/photo-1577495508048-b635879837f1?auto=format&fit=crop&w=1200&q=80" 
                        alt="<?php esc_attr_e( 'Cuban Enterprise and Business Development', 'angel-network' ); ?>" 
                        class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 ease-out group-hover:scale-105"
                    >

                    <!-- Cinematic Gradient Overlays -->
                    <div class="absolute inset-0 bg-gradient-to-t from-slate-950 via-slate-950/40 to-transparent opacity-90 pointer-events-none"></div>
                    <div class="absolute inset-0 bg-primary/20 mix-blend-multiply pointer-events-none"></div>

                    <!-- Top Pill Badge -->
                    <div class="relative z-10 p-5 sm:p-6 flex items-center justify-between">
                        <span class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-white/95 backdrop-blur-md text-primary text-xs font-bold shadow-md border border-white/50">
                            <span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span>
                            <?php esc_html_e( 'Private Enterprise Ecosystem', 'angel-network' ); ?>
                        </span>
                        <span class="text-xs font-semibold text-white/90 bg-slate-900/60 backdrop-blur-md px-3 py-1 rounded-full border border-white/10 hidden sm:inline-flex">
                            <?php esc_html_e( 'MIPYMEs & Growth Ventures', 'angel-network' ); ?>
                        </span>
                    </div>

                    <!-- Floating / Docked Callout Card (PDF Page 23) -->
                    <div class="relative z-10 p-5 sm:p-6 m-4 sm:m-6 rounded-2xl bg-slate-900/95 backdrop-blur-xl border border-white/15 text-white shadow-2xl">
                        <div class="flex items-center justify-between gap-3 mb-2.5">
                            <div class="flex items-center gap-2.5">
                                <div class="w-8 h-8 rounded-lg bg-accent/20 text-accent flex items-center justify-center shrink-0">
                                    <?php echo angel_get_svg_icon( 'shield', 'w-4 h-4' ); ?>
                                </div>
                                <h4 class="text-base sm:text-lg font-heading font-extrabold text-accent">
                                    <?php esc_html_e( 'Direct Connections', 'angel-network' ); ?>
                                </h4>
                            </div>
                            <span class="text-[10px] font-bold uppercase tracking-wider px-2 py-0.5 rounded bg-white/10 text-slate-300 border border-white/10 shrink-0">
                                <?php esc_html_e( 'Zero Fund Custody', 'angel-network' ); ?>
                            </span>
                        </div>
                        <p class="text-xs sm:text-sm text-slate-300 leading-relaxed mb-3">
                            <?php esc_html_e( 'Business owners and investors communicate directly. The platform does not receive or handle investment funds.', 'angel-network' ); ?>
                        </p>
                        <div class="pt-3 border-t border-white/10 flex flex-wrap items-center gap-y-1 gap-x-4 text-[11px] text-slate-400">
                            <span class="flex items-center gap-1.5">
                                <svg class="w-3.5 h-3.5 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
                                <?php esc_html_e( 'Direct Negotiations', 'angel-network' ); ?>
                            </span>
                            <span class="flex items-center gap-1.5">
                                <svg class="w-3.5 h-3.5 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
                                <?php esc_html_e( 'Independent Due Diligence', 'angel-network' ); ?>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Principles / Core Standards Section -->
<?php get_template_part( 'template-parts/sections/benefits' ); ?>

<!-- Bottom CTA -->
<?php get_template_part( 'template-parts/sections/cta-banner' ); ?>

<?php
get_footer();
