<?php
/**
 * Template Name: How It Works / Services
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
    'title'           => esc_html__( 'How the Cuba Investment Network Works', 'angel-network' ),
    'subtitle'        => esc_html__( 'A clear process for business owners to present opportunities and for investors to discover, evaluate, and connect with them.', 'angel-network' ),
    'badge'           => esc_html__( 'How It Works', 'angel-network' ),
    'breadcrumb_text' => esc_html__( 'How It Works', 'angel-network' ),
    'bg_image'        => 'https://images.unsplash.com/photo-1454165804606-c3d57bc86b40?auto=format&fit=crop&w=1600&q=80',
] ); 
?>

<!-- Step-by-Step Roadmaps -->
<section class="py-20 bg-white">
    <div class="container mx-auto">
        <!-- The Investor Workflow -->
        <div class="mb-20">
            <div class="max-w-2xl mb-12">
                <span class="badge badge-primary mb-2"><?php esc_html_e( 'For Investors', 'angel-network' ); ?></span>
                <h2 class="text-3xl font-heading font-extrabold text-primary">
                    <?php esc_html_e( 'How Investors Use the Network', 'angel-network' ); ?>
                </h2>
                <p class="text-slate-600 text-sm sm:text-base mt-2">
                    <?php esc_html_e( 'Four steps to discover Cuba-focused businesses and connect directly with their owners.', 'angel-network' ); ?>
                </p>
            </div>

            <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- 01 -->
                <div class="card p-6 border border-slate-200 bg-slate-50/50 flex flex-col justify-between hover:-translate-y-1 transition-all">
                    <div>
                        <span class="text-3xl font-heading font-extrabold text-accent mb-4 block">01</span>
                        <h3 class="text-base font-heading font-bold text-primary mb-2">
                            <?php esc_html_e( 'Create Your Investor Profile', 'angel-network' ); ?>
                        </h3>
                        <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">
                            <?php esc_html_e( 'Describe your investment interests, preferred sectors, geographic focus, and typical investment range.', 'angel-network' ); ?>
                        </p>
                    </div>
                </div>

                <!-- 02 -->
                <div class="card p-6 border border-slate-200 bg-slate-50/50 flex flex-col justify-between hover:-translate-y-1 transition-all">
                    <div>
                        <span class="text-3xl font-heading font-extrabold text-accent mb-4 block">02</span>
                        <h3 class="text-base font-heading font-bold text-primary mb-2">
                            <?php esc_html_e( 'Explore Opportunities', 'angel-network' ); ?>
                        </h3>
                        <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">
                            <?php esc_html_e( 'Browse business profiles and filter opportunities by sector, development stage, funding needs, and strategic fit.', 'angel-network' ); ?>
                        </p>
                    </div>
                </div>

                <!-- 03 -->
                <div class="card p-6 border border-slate-200 bg-slate-50/50 flex flex-col justify-between hover:-translate-y-1 transition-all">
                    <div>
                        <span class="text-3xl font-heading font-extrabold text-accent mb-4 block">03</span>
                        <h3 class="text-base font-heading font-bold text-primary mb-2">
                            <?php esc_html_e( 'Review the Information', 'angel-network' ); ?>
                        </h3>
                        <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">
                            <?php esc_html_e( 'Request additional business information and conduct your own evaluation, due diligence, and professional review.', 'angel-network' ); ?>
                        </p>
                    </div>
                </div>

                <!-- 04 -->
                <div class="card p-6 border border-slate-200 bg-slate-50/50 flex flex-col justify-between hover:-translate-y-1 transition-all">
                    <div>
                        <span class="text-3xl font-heading font-extrabold text-accent mb-4 block">04</span>
                        <h3 class="text-base font-heading font-bold text-primary mb-2">
                            <?php esc_html_e( 'Connect Directly', 'angel-network' ); ?>
                        </h3>
                        <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">
                            <?php esc_html_e( 'Contact business owners to ask questions, discuss the opportunity, and determine whether further conversations are appropriate.', 'angel-network' ); ?>
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- The Business Owner Workflow -->
        <div id="business-owners" class="mb-16">
            <div class="max-w-2xl mb-12">
                <span class="badge badge-accent mb-2"><?php esc_html_e( 'For Business Owners', 'angel-network' ); ?></span>
                <h2 class="text-3xl font-heading font-extrabold text-primary">
                    <?php esc_html_e( 'How Business Owners Use the Network', 'angel-network' ); ?>
                </h2>
                <p class="text-slate-600 text-sm sm:text-base mt-2">
                    <?php esc_html_e( 'Four steps to present your business and connect with potential investors.', 'angel-network' ); ?>
                </p>
            </div>

            <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- 01 -->
                <div class="card p-6 border border-slate-200 bg-slate-50/50 flex flex-col justify-between hover:-translate-y-1 transition-all">
                    <div>
                        <span class="text-3xl font-heading font-extrabold text-primary mb-4 block">01</span>
                        <h3 class="text-base font-heading font-bold text-primary mb-2">
                            <?php esc_html_e( 'Create Your Business Profile', 'angel-network' ); ?>
                        </h3>
                        <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">
                            <?php esc_html_e( 'Provide information about your company, market, operations, management team, and growth plans.', 'angel-network' ); ?>
                        </p>
                    </div>
                </div>

                <!-- 02 -->
                <div class="card p-6 border border-slate-200 bg-slate-50/50 flex flex-col justify-between hover:-translate-y-1 transition-all">
                    <div>
                        <span class="text-3xl font-heading font-extrabold text-primary mb-4 block">02</span>
                        <h3 class="text-base font-heading font-bold text-primary mb-2">
                            <?php esc_html_e( 'Present Your Opportunity', 'angel-network' ); ?>
                        </h3>
                        <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">
                            <?php esc_html_e( 'Explain the investment sought, intended use of funds, business objectives, and the type of investor or strategic partner you are seeking.', 'angel-network' ); ?>
                        </p>
                    </div>
                </div>

                <!-- 03 -->
                <div class="card p-6 border border-slate-200 bg-slate-50/50 flex flex-col justify-between hover:-translate-y-1 transition-all">
                    <div>
                        <span class="text-3xl font-heading font-extrabold text-primary mb-4 block">03</span>
                        <h3 class="text-base font-heading font-bold text-primary mb-2">
                            <?php esc_html_e( 'Publish Your Listing', 'angel-network' ); ?>
                        </h3>
                        <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">
                            <?php esc_html_e( 'Make your business profile available for interested investors to discover and review.', 'angel-network' ); ?>
                        </p>
                    </div>
                </div>

                <!-- 04 -->
                <div class="card p-6 border border-slate-200 bg-slate-50/50 flex flex-col justify-between hover:-translate-y-1 transition-all">
                    <div>
                        <span class="text-3xl font-heading font-extrabold text-primary mb-4 block">04</span>
                        <h3 class="text-base font-heading font-bold text-primary mb-2">
                            <?php esc_html_e( 'Respond and Connect', 'angel-network' ); ?>
                        </h3>
                        <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">
                            <?php esc_html_e( 'Receive enquiries, share additional information when appropriate, and continue discussions directly with interested investors.', 'angel-network' ); ?>
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Platform Role Statement (PDF Page 18 - Immediately Beneath Both Journeys) -->
        <div class="p-6 sm:p-8 bg-slate-50 rounded-2xl border-l-4 border-accent border border-slate-200">
            <h3 class="text-base font-heading font-bold text-primary mb-2">
                <?php esc_html_e( 'Platform Role & Responsibilities', 'angel-network' ); ?>
            </h3>
            <p class="text-xs sm:text-sm text-slate-700 leading-relaxed">
                <?php esc_html_e( 'Cuba Investment Network provides business-listing and introduction services. It does not recommend investments, conduct due diligence on behalf of users, negotiate investment terms, or handle investment funds. Investors and business owners are responsible for their own assessments and for obtaining appropriate legal, financial, tax, and regulatory advice.', 'angel-network' ); ?>
            </p>
        </div>
    </div>
</section>

<!-- Early Access Launch Offer (PDF Pages 18-20 - Replacing 3 Pricing Packages) -->
<section id="pricing" class="py-20 bg-slate-50 border-t border-slate-200">
    <div class="container mx-auto max-w-4xl">
        <div class="text-center max-w-2xl mx-auto mb-12">
            <span class="badge badge-accent mb-3"><?php esc_html_e( 'Early Access', 'angel-network' ); ?></span>
            <h2 class="text-3xl sm:text-4xl font-heading font-extrabold text-primary mb-4">
                <?php esc_html_e( 'Free During Our Launch Period', 'angel-network' ); ?>
            </h2>
            <p class="text-slate-600 text-sm sm:text-base leading-relaxed">
                <?php esc_html_e( 'Business owners can create and publish a business listing at no charge during the launch period. Investors can explore available opportunities and connect directly with business owners free of charge.', 'angel-network' ); ?>
            </p>
        </div>

        <!-- Single Launch Offer Card -->
        <div class="card p-8 sm:p-10 bg-white border-2 border-accent relative shadow-xl max-w-2xl mx-auto">
            <span class="absolute -top-3.5 left-1/2 -translate-x-1/2 badge badge-accent font-bold py-1 px-4 shadow-sm">
                <?php esc_html_e( 'Launch Offer', 'angel-network' ); ?>
            </span>

            <div class="text-center pb-6 border-b border-slate-100 mb-6">
                <h3 class="text-2xl font-heading font-extrabold text-primary mb-1">
                    <?php esc_html_e( 'Launch Membership', 'angel-network' ); ?>
                </h3>
                <p class="text-xs text-slate-500">
                    <?php esc_html_e( 'Complimentary access for qualified business owners and investors', 'angel-network' ); ?>
                </p>
            </div>

            <ul class="space-y-4 text-xs sm:text-sm text-slate-700 mb-8">
                <li class="flex items-start gap-3">
                    <span class="text-accent mt-0.5"><?php echo angel_get_svg_icon( 'check', 'w-4 h-4' ); ?></span>
                    <span><?php esc_html_e( 'Create a business profile', 'angel-network' ); ?></span>
                </li>
                <li class="flex items-start gap-3">
                    <span class="text-accent mt-0.5"><?php echo angel_get_svg_icon( 'check', 'w-4 h-4' ); ?></span>
                    <span><?php esc_html_e( 'Present an investment opportunity', 'angel-network' ); ?></span>
                </li>
                <li class="flex items-start gap-3">
                    <span class="text-accent mt-0.5"><?php echo angel_get_svg_icon( 'check', 'w-4 h-4' ); ?></span>
                    <span><?php esc_html_e( 'Receive direct investor enquiries', 'angel-network' ); ?></span>
                </li>
                <li class="flex items-start gap-3">
                    <span class="text-accent mt-0.5"><?php echo angel_get_svg_icon( 'check', 'w-4 h-4' ); ?></span>
                    <span><?php esc_html_e( 'Update and manage the listing', 'angel-network' ); ?></span>
                </li>
            </ul>

            <div class="pt-2 text-center">
                <a 
                    href="<?php echo esc_url( home_url( '/fundraise/' ) ); ?>" 
                    class="btn btn-accent btn-lg w-full font-bold shadow-md hover:shadow-lg transition-all"
                >
                    <?php esc_html_e( 'LIST YOUR BUSINESS', 'angel-network' ); ?>
                </a>
                <p class="text-xs text-slate-500 mt-4 leading-relaxed">
                    <?php esc_html_e( 'No credit card required. Optional paid plans or premium features may be introduced in the future. Any pricing changes will be communicated in advance and will require the user’s agreement.', 'angel-network' ); ?>
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Bottom CTA -->
<?php get_template_part( 'template-parts/sections/cta-banner' ); ?>

<?php
get_footer();
