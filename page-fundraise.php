<?php
/**
 * Template Name: For Business Owners / Present Your Business
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
    'title'           => esc_html__( 'Present Your Business to Potential Investors', 'angel-network' ),
    'subtitle'        => esc_html__( 'Create a clear business profile, explain your capital requirements, and connect with investors interested in opportunities in or connected to Cuba.', 'angel-network' ),
    'badge'           => esc_html__( 'For Business Owners', 'angel-network' ),
    'breadcrumb_text' => esc_html__( 'For Business Owners', 'angel-network' ),
    'bg_image'        => get_template_directory_uri() . '/assets/images/fundrise-herobg.jpg',
] ); 
?>

<!-- Before You Apply Section (PDF Pages 11-12) -->
<section id="before-you-apply" class="py-20 bg-white relative overflow-hidden">
    <!-- Subtle ambient decorative accents -->
    <div class="absolute top-1/4 -right-24 w-96 h-96 bg-primary/5 rounded-full blur-3xl pointer-events-none"></div>
    <div class="absolute bottom-10 -left-20 w-80 h-80 bg-accent/5 rounded-full blur-3xl pointer-events-none"></div>

    <div class="container mx-auto relative z-10">
        <div class="grid lg:grid-cols-12 gap-12 items-stretch">
            <!-- Left Column: Business Requirements & CTA -->
            <div class="lg:col-span-7 flex flex-col justify-between">
                <div>
                    <span class="badge badge-accent mb-3"><?php esc_html_e( 'Before You Apply', 'angel-network' ); ?></span>
                    <h2 class="text-3xl sm:text-4xl font-heading font-extrabold text-primary mb-4">
                        <?php esc_html_e( 'Prepare Your Business Information', 'angel-network' ); ?>
                    </h2>
                    <p class="text-slate-600 text-sm sm:text-base leading-relaxed mb-8">
                        <?php esc_html_e( 'Clear and complete information helps investors understand your business, capital requirements and proposed use of funds. Prepare the following information before submitting your application.', 'angel-network' ); ?>
                    </p>

                    <!-- Four Information Groups -->
                    <div class="space-y-4">
                        <!-- 1. Business Overview -->
                        <div class="flex items-start gap-4 p-5 rounded-2xl bg-slate-50 border border-slate-200/80 hover:border-primary/20 hover:bg-slate-50/80 transition-all duration-300">
                            <div class="w-10 h-10 rounded-xl bg-primary text-white flex items-center justify-center font-heading font-bold text-sm shrink-0 shadow-sm">
                                01
                            </div>
                            <div>
                                <h3 class="text-base font-heading font-bold text-primary mb-1">
                                    <?php esc_html_e( 'Business Overview', 'angel-network' ); ?>
                                </h3>
                                <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">
                                    <?php esc_html_e( 'Provide the legal business name, location, ownership structure, operating history, products or services, target customers and current market.', 'angel-network' ); ?>
                                </p>
                            </div>
                        </div>

                        <!-- 2. Capital Requirements and Use of Funds -->
                        <div class="flex items-start gap-4 p-5 rounded-2xl bg-slate-50 border border-slate-200/80 hover:border-primary/20 hover:bg-slate-50/80 transition-all duration-300">
                            <div class="w-10 h-10 rounded-xl bg-primary text-white flex items-center justify-center font-heading font-bold text-sm shrink-0 shadow-sm">
                                02
                            </div>
                            <div>
                                <h3 class="text-base font-heading font-bold text-primary mb-1">
                                    <?php esc_html_e( 'Capital Requirements and Use of Funds', 'angel-network' ); ?>
                                </h3>
                                <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">
                                    <?php esc_html_e( 'State the amount and currency sought, how the capital will be used, the expected business impact and the proposed investment structure, if known.', 'angel-network' ); ?>
                                </p>
                            </div>
                        </div>

                        <!-- 3. Operating Performance and Milestones -->
                        <div class="flex items-start gap-4 p-5 rounded-2xl bg-slate-50 border border-slate-200/80 hover:border-primary/20 hover:bg-slate-50/80 transition-all duration-300">
                            <div class="w-10 h-10 rounded-xl bg-primary text-white flex items-center justify-center font-heading font-bold text-sm shrink-0 shadow-sm">
                                03
                            </div>
                            <div>
                                <h3 class="text-base font-heading font-bold text-primary mb-1">
                                    <?php esc_html_e( 'Operating Performance and Milestones', 'angel-network' ); ?>
                                </h3>
                                <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">
                                    <?php esc_html_e( 'Summarize revenue history or range, customers, contracts, assets, licences, completed projects and significant growth milestones. Include supporting documents where available.', 'angel-network' ); ?>
                                </p>
                            </div>
                        </div>

                        <!-- 4. Management, Ownership and Key Risks -->
                        <div class="flex items-start gap-4 p-5 rounded-2xl bg-slate-50 border border-slate-200/80 hover:border-primary/20 hover:bg-slate-50/80 transition-all duration-300">
                            <div class="w-10 h-10 rounded-xl bg-primary text-white flex items-center justify-center font-heading font-bold text-sm shrink-0 shadow-sm">
                                04
                            </div>
                            <div>
                                <h3 class="text-base font-heading font-bold text-primary mb-1">
                                    <?php esc_html_e( 'Management, Ownership and Key Risks', 'angel-network' ); ?>
                                </h3>
                                <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">
                                    <?php esc_html_e( 'Introduce the business owners and management team, explain the ownership structure, and disclose significant liabilities, operational constraints and business risks.', 'angel-network' ); ?>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- CTA Button -->
                <div class="mt-8">
                    <?php if ( is_user_logged_in() ) : 
                        $user_roles = (array) wp_get_current_user()->roles;
                        $is_biz = in_array( 'cin_business_owner', $user_roles, true ) || ( class_exists( '\CubaInvestment\Core\Common\Constants' ) && in_array( \CubaInvestment\Core\Common\Constants::ROLE_BUSINESS_OWNER, $user_roles, true ) );
                        $btn_target = $is_biz ? home_url( '/business-owner/business-profile/' ) : home_url( '/dashboard/' );
                    ?>
                        <a 
                            href="<?php echo esc_url( $btn_target ); ?>" 
                            class="btn btn-accent btn-lg font-bold shadow-md hover:shadow-lg transition-all inline-flex items-center gap-2"
                        >
                            <span><?php echo $is_biz ? esc_html__( 'Manage Business Profile →', 'angel-network' ) : esc_html__( 'Go to Dashboard →', 'angel-network' ); ?></span>
                        </a>
                    <?php else : ?>
                        <a 
                            href="<?php echo esc_url( home_url( '/fundraise/' ) ); ?>" 
                            data-open-modal="auth-modal" 
                            data-modal-tab="register" 
                            data-modal-role="entrepreneur" 
                            class="btn btn-accent btn-lg font-bold shadow-md hover:shadow-lg transition-all inline-flex items-center gap-2"
                        >
                            <span><?php esc_html_e( 'Start Your Application →', 'angel-network' ); ?></span>
                        </a>
                    <?php endif; ?>
                </div>
            </div>

            <!-- Right Column: Visual & Application Review Card -->
            <div class="lg:col-span-5 relative flex flex-col justify-between h-full mt-8 lg:mt-0 space-y-6">
                <!-- Visual Canvas: Generous Height, Rounded Frame with Cinematic Depth -->
                <div class="relative rounded-3xl overflow-hidden shadow-2xl border-4 border-white bg-slate-900 w-full flex-1 min-h-[340px] sm:min-h-[380px] lg:min-h-[420px] group flex flex-col justify-between p-5 sm:p-6" style="min-height: 400px;">
                    <!-- High-Resolution Image -->
                    <img 
                        src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/investment-network-cuba.jpg' ); ?>" 
                        alt="<?php esc_attr_e( 'Cuban Enterprise Operations and Production', 'angel-network' ); ?>" 
                        class="absolute inset-0 w-full h-full object-cover object-center transition-transform duration-700 ease-out group-hover:scale-105"
                        loading="lazy"
                    >

                    <!-- Cinematic Gradients -->
                    <div class="absolute inset-0 bg-gradient-to-t from-slate-950/85 via-slate-950/20 to-slate-950/40 pointer-events-none"></div>

                    <!-- Top Pill Badge -->
                    <div class="relative z-10 flex items-center justify-between">
                        <span class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-white/95 backdrop-blur-md text-primary text-xs font-bold shadow-md border border-white/50">
                            <span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span>
                            <?php esc_html_e( 'Private Enterprise Ecosystem', 'angel-network' ); ?>
                        </span>
                        <span class="text-xs font-semibold text-white/90 bg-slate-900/60 backdrop-blur-md px-3 py-1 rounded-full border border-white/10 hidden sm:inline-flex">
                            <?php esc_html_e( 'Direct Capital Access', 'angel-network' ); ?>
                        </span>
                    </div>

                    <!-- Bottom Ambient Pill on Image -->
                    <div class="relative z-10 p-4 rounded-2xl bg-slate-900/90 backdrop-blur-md border border-white/15 text-white shadow-xl">
                        <p class="text-xs font-bold text-accent uppercase tracking-wider mb-1">
                            <?php esc_html_e( 'Verified Cuban Business Profiles', 'angel-network' ); ?>
                        </p>
                        <p class="text-xs text-slate-300 leading-relaxed">
                            <?php esc_html_e( 'Direct communication between business owners and qualified investors with zero fund custody.', 'angel-network' ); ?>
                        </p>
                    </div>
                </div>

                <!-- Application Review Info Card (PDF Page 12) -->
                <div class="bg-white p-6 sm:p-7 rounded-2xl shadow-xl border border-slate-200/90 shrink-0">
                    <div class="flex items-center justify-between gap-3 mb-3">
                        <div class="flex items-center gap-2">
                            <span class="w-2.5 h-2.5 rounded-full bg-accent animate-pulse"></span>
                            <span class="text-xs font-bold text-slate-500 uppercase tracking-wider">
                                <?php esc_html_e( 'Application Review', 'angel-network' ); ?>
                            </span>
                        </div>
                        <span class="badge badge-accent text-[10px] font-bold">
                            <?php esc_html_e( 'Launch Phase', 'angel-network' ); ?>
                        </span>
                    </div>

                    <h3 class="text-base sm:text-lg font-heading font-extrabold text-primary mb-2">
                        <?php esc_html_e( 'Initial Review & Listing Quality', 'angel-network' ); ?>
                    </h3>

                    <p class="text-xs sm:text-sm text-slate-600 leading-relaxed mb-4">
                        <?php esc_html_e( 'Submissions are reviewed for completeness and clarity before publication. Additional information may be requested to help investors understand your opportunity.', 'angel-network' ); ?>
                    </p>

                    <!-- Feature Checkmarks -->
                    <div class="pt-3 border-t border-slate-100 flex flex-wrap items-center gap-y-2 gap-x-4 text-xs text-slate-600 mb-4">
                        <span class="flex items-center gap-1.5 font-medium">
                            <svg class="w-4 h-4 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
                            <?php esc_html_e( 'Direct Negotiations', 'angel-network' ); ?>
                        </span>
                        <span class="flex items-center gap-1.5 font-medium">
                            <svg class="w-4 h-4 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
                            <?php esc_html_e( 'Zero Intermediary Fees', 'angel-network' ); ?>
                        </span>
                    </div>

                    <div class="pt-3 border-t border-slate-100 flex items-center justify-between text-xs text-slate-500">
                        <span class="font-medium"><?php esc_html_e( 'Listing Period:', 'angel-network' ); ?></span>
                        <span class="font-bold text-accent bg-accent/10 px-2.5 py-1 rounded-md"><?php esc_html_e( 'Free During Launch Period', 'angel-network' ); ?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- How It Works Section (PDF Pages 13-14 - Replacing Fake Testimonials) -->
<section id="how-it-works" class="py-20 bg-slate-50 border-t border-slate-200">
    <div class="container mx-auto">
        <div class="text-center max-w-2xl mx-auto mb-16">
            <span class="badge badge-primary mb-3"><?php esc_html_e( 'How It Works', 'angel-network' ); ?></span>
            <h2 class="text-3xl sm:text-4xl font-heading font-extrabold text-primary mb-4">
                <?php esc_html_e( 'Connecting Opportunities with Investors', 'angel-network' ); ?>
            </h2>
            <p class="text-slate-600 text-sm sm:text-base leading-relaxed">
                <?php esc_html_e( 'A focused network designed to help Cuba-related businesses present opportunities clearly and connect with investors interested in their markets and sectors.', 'angel-network' ); ?>
            </p>
        </div>

        <!-- Three Process Cards with Icons (No fake portraits, no fake stats) -->
        <div class="grid md:grid-cols-3 gap-8">
            <!-- Process 1 -->
            <div class="card p-8 bg-white border border-slate-200 flex flex-col justify-between hover:-translate-y-1 transition-all duration-300">
                <div>
                    <div class="w-12 h-12 rounded-xl bg-primary-50 text-primary flex items-center justify-center mb-6">
                        <?php echo angel_get_svg_icon( 'sparkles', 'w-6 h-6 text-accent' ); ?>
                    </div>
                    <span class="text-xs font-heading font-bold text-accent uppercase tracking-wider block mb-1">
                        <?php esc_html_e( 'Step 01', 'angel-network' ); ?>
                    </span>
                    <h3 class="text-lg font-heading font-bold text-primary mb-3">
                        <?php esc_html_e( '1. Present Your Opportunity', 'angel-network' ); ?>
                    </h3>
                    <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">
                        <?php esc_html_e( 'Business owners create a clear profile outlining their company, funding needs, growth plans, and investment opportunity.', 'angel-network' ); ?>
                    </p>
                </div>
                <div class="mt-6 pt-4 border-t border-slate-100 text-xs font-semibold text-accent">
                    <?php esc_html_e( 'Structured Profile Guide', 'angel-network' ); ?>
                </div>
            </div>

            <!-- Process 2 -->
            <div class="card p-8 bg-white border border-slate-200 flex flex-col justify-between hover:-translate-y-1 transition-all duration-300">
                <div>
                    <div class="w-12 h-12 rounded-xl bg-accent-50 text-accent flex items-center justify-center mb-6">
                        <?php echo angel_get_svg_icon( 'search', 'w-6 h-6' ); ?>
                    </div>
                    <span class="text-xs font-heading font-bold text-accent uppercase tracking-wider block mb-1">
                        <?php esc_html_e( 'Step 02', 'angel-network' ); ?>
                    </span>
                    <h3 class="text-lg font-heading font-bold text-primary mb-3">
                        <?php esc_html_e( '2. Explore Relevant Opportunities', 'angel-network' ); ?>
                    </h3>
                    <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">
                        <?php esc_html_e( 'Investors browse businesses based on sector, development stage, funding requirements, and strategic fit.', 'angel-network' ); ?>
                    </p>
                </div>
                <div class="mt-6 pt-4 border-t border-slate-100 text-xs font-semibold text-accent">
                    <?php esc_html_e( 'Sector & Stage Matching', 'angel-network' ); ?>
                </div>
            </div>

            <!-- Process 3 -->
            <div class="card p-8 bg-white border border-slate-200 flex flex-col justify-between hover:-translate-y-1 transition-all duration-300">
                <div>
                    <div class="w-12 h-12 rounded-xl bg-primary text-white flex items-center justify-center mb-6 shadow-sm">
                        <?php echo angel_get_svg_icon( 'activity', 'w-6 h-6 text-accent' ); ?>
                    </div>
                    <span class="text-xs font-heading font-bold text-accent uppercase tracking-wider block mb-1">
                        <?php esc_html_e( 'Step 03', 'angel-network' ); ?>
                    </span>
                    <h3 class="text-lg font-heading font-bold text-primary mb-3">
                        <?php esc_html_e( '3. Connect Directly', 'angel-network' ); ?>
                    </h3>
                    <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">
                        <?php esc_html_e( 'Interested investors and business owners begin confidential conversations, exchange information, and independently evaluate potential partnerships.', 'angel-network' ); ?>
                    </p>
                </div>
                <div class="mt-6 pt-4 border-t border-slate-100 text-xs font-semibold text-accent">
                    <?php esc_html_e( 'Direct Discussion Without Intermediaries', 'angel-network' ); ?>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Bottom CTA -->
<?php get_template_part( 'template-parts/sections/cta-banner' ); ?>

<?php
get_footer();
