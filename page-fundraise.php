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
    'bg_image'        => 'https://images.unsplash.com/photo-1581091226825-a6a2a5aee158?auto=format&fit=crop&w=1600&q=80',
] ); 
?>

<!-- Before You Apply Section (PDF Pages 11-12) -->
<section id="before-you-apply" class="py-20 bg-white">
    <div class="container mx-auto">
        <div class="grid lg:grid-cols-12 gap-12 items-start">
            <div class="lg:col-span-7">
                <span class="badge badge-accent mb-3"><?php esc_html_e( 'Before You Apply', 'angel-network' ); ?></span>
                <h2 class="text-3xl sm:text-4xl font-heading font-extrabold text-primary mb-4">
                    <?php esc_html_e( 'Prepare Your Business Information', 'angel-network' ); ?>
                </h2>
                <p class="text-slate-600 text-sm sm:text-base leading-relaxed mb-8">
                    <?php esc_html_e( 'Clear and complete information helps investors understand your business, capital requirements and proposed use of funds. Prepare the following information before submitting your application.', 'angel-network' ); ?>
                </p>

                <!-- Four Information Groups -->
                <div class="space-y-5">
                    <!-- 1. Business Overview -->
                    <div class="flex items-start gap-4 p-5 rounded-xl bg-slate-50 border border-slate-200">
                        <div class="w-9 h-9 rounded-lg bg-primary text-white flex items-center justify-center font-heading font-bold text-sm shrink-0 shadow-xs">
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
                    <div class="flex items-start gap-4 p-5 rounded-xl bg-slate-50 border border-slate-200">
                        <div class="w-9 h-9 rounded-lg bg-primary text-white flex items-center justify-center font-heading font-bold text-sm shrink-0 shadow-xs">
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
                    <div class="flex items-start gap-4 p-5 rounded-xl bg-slate-50 border border-slate-200">
                        <div class="w-9 h-9 rounded-lg bg-primary text-white flex items-center justify-center font-heading font-bold text-sm shrink-0 shadow-xs">
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
                    <div class="flex items-start gap-4 p-5 rounded-xl bg-slate-50 border border-slate-200">
                        <div class="w-9 h-9 rounded-lg bg-primary text-white flex items-center justify-center font-heading font-bold text-sm shrink-0 shadow-xs">
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

                <!-- CTA Button -->
                <div class="mt-8">
                    <a 
                        href="<?php echo esc_url( home_url( '/contact/?type=business_owner' ) ); ?>" 
                        class="btn btn-accent btn-lg font-bold shadow-md hover:shadow-lg transition-all"
                    >
                        <?php esc_html_e( 'Start Your Application →', 'angel-network' ); ?>
                    </a>
                </div>
            </div>

            <!-- Right Column: Visual & Application Review Card -->
            <div class="lg:col-span-5 relative mt-6 lg:mt-0">
                <div class="rounded-3xl overflow-hidden shadow-2xl border-4 border-white bg-slate-100 aspect-4/3">
                    <img 
                        src="https://images.unsplash.com/photo-1577495508048-b635879837f1?auto=format&fit=crop&w=800&q=80" 
                        alt="<?php esc_attr_e( 'Cuban Enterprise Operations and Production', 'angel-network' ); ?>" 
                        class="w-full h-full object-cover"
                    >
                </div>

                <!-- Application Review Info Card (PDF Page 12) -->
                <div class="mt-6 bg-white p-6 rounded-2xl shadow-xl border border-slate-200">
                    <div class="flex items-center gap-2 mb-2">
                        <span class="w-2 h-2 rounded-full bg-accent animate-pulse"></span>
                        <p class="text-xs font-bold text-slate-500 uppercase tracking-wider">
                            <?php esc_html_e( 'Application Review', 'angel-network' ); ?>
                        </p>
                    </div>
                    <p class="text-base font-heading font-extrabold text-primary">
                        <?php esc_html_e( 'Initial Review', 'angel-network' ); ?>
                    </p>
                    <p class="text-xs sm:text-sm text-slate-600 mt-2 leading-relaxed">
                        <?php esc_html_e( 'Submissions are reviewed for completeness and clarity before publication. Additional information may be requested.', 'angel-network' ); ?>
                    </p>
                    <div class="mt-4 pt-4 border-t border-slate-100 flex items-center justify-between text-xs text-slate-500">
                        <span><?php esc_html_e( 'Listing Period:', 'angel-network' ); ?></span>
                        <span class="font-bold text-primary"><?php esc_html_e( 'Free During Launch Period', 'angel-network' ); ?></span>
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
