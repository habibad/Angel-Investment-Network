<?php
/**
 * Template Name: Services & How It Works
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
    'title'    => esc_html__( 'How the Angel Network Operates', 'angel-network' ),
    'subtitle' => esc_html__( 'An institutional step-by-step roadmap for accredited investors and high-growth entrepreneurs.', 'angel-network' ),
    'badge'    => esc_html__( 'Platform Mechanics', 'angel-network' ),
    'bg_image' => 'https://images.unsplash.com/photo-1517245386807-bb43f82c33c4?auto=format&fit=crop&w=1600&q=80',
] ); 
?>

<!-- Step-by-Step Roadmaps -->
<section class="py-20 bg-white">
    <div class="container mx-auto">
        <!-- The Investor Workflow -->
        <div class="mb-20">
            <div class="max-w-2xl mb-12">
                <span class="badge badge-primary mb-2"><?php esc_html_e( 'For Investors', 'angel-network' ); ?></span>
                <h2 class="text-3xl font-heading font-extrabold text-primary">The Investor Journey</h2>
                <p class="text-slate-600 text-sm mt-1">Four simple steps to accessing vetted private startup allocations.</p>
            </div>

            <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-8">
                <div class="card p-6 border border-slate-200 bg-slate-50/50">
                    <span class="text-3xl font-heading font-extrabold text-accent mb-4 block">01</span>
                    <h3 class="text-base font-heading font-bold text-primary mb-2">Accreditation Profile</h3>
                    <p class="text-xs text-slate-600 leading-relaxed">
                        Create your private angel profile and attest to exempt distribution eligibility under provincial securities guidelines.
                    </p>
                </div>

                <div class="card p-6 border border-slate-200 bg-slate-50/50">
                    <span class="text-3xl font-heading font-extrabold text-accent mb-4 block">02</span>
                    <h3 class="text-base font-heading font-bold text-primary mb-2">Dealflow Filtering</h3>
                    <p class="text-xs text-slate-600 leading-relaxed">
                        Filter by industry vertical, target ticket size, revenue traction, and funding stage to find opportunities aligned with your thesis.
                    </p>
                </div>

                <div class="card p-6 border border-slate-200 bg-slate-50/50">
                    <span class="text-3xl font-heading font-extrabold text-accent mb-4 block">03</span>
                    <h3 class="text-base font-heading font-bold text-primary mb-2">Data Room Due Diligence</h3>
                    <p class="text-xs text-slate-600 leading-relaxed">
                        Request confidential pitch deck access, financial models, and customer contract metrics directly from verified founders.
                    </p>
                </div>

                <div class="card p-6 border border-slate-200 bg-slate-50/50">
                    <span class="text-3xl font-heading font-extrabold text-accent mb-4 block">04</span>
                    <h3 class="text-base font-heading font-bold text-primary mb-2">Direct Allocation</h3>
                    <p class="text-xs text-slate-600 leading-relaxed">
                        Execute SAFE, convertible note, or equity subscription agreements directly with the company. Zero platform carry or brokerage fees.
                    </p>
                </div>
            </div>
        </div>

        <!-- The Founder Workflow -->
        <div>
            <div class="max-w-2xl mb-12">
                <span class="badge badge-accent mb-2"><?php esc_html_e( 'For Entrepreneurs', 'angel-network' ); ?></span>
                <h2 class="text-3xl font-heading font-extrabold text-primary">The Entrepreneur Journey</h2>
                <p class="text-slate-600 text-sm mt-1">Accelerate your fundraising with structured investor visibility.</p>
            </div>

            <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-8">
                <div class="card p-6 border border-slate-200 bg-slate-50/50">
                    <span class="text-3xl font-heading font-extrabold text-primary mb-4 block">01</span>
                    <h3 class="text-base font-heading font-bold text-primary mb-2">Build Your Pitch</h3>
                    <p class="text-xs text-slate-600 leading-relaxed">
                        Use our guided wizard to define your capital ask, minimum ticket size, team background, and key traction milestones.
                    </p>
                </div>

                <div class="card p-6 border border-slate-200 bg-slate-50/50">
                    <span class="text-3xl font-heading font-extrabold text-primary mb-4 block">02</span>
                    <h3 class="text-base font-heading font-bold text-primary mb-2">Compliance Review</h3>
                    <p class="text-xs text-slate-600 leading-relaxed">
                        Our internal review team audits your pitch within 24 hours to ensure high clarity and regulatory standard compliance.
                    </p>
                </div>

                <div class="card p-6 border border-slate-200 bg-slate-50/50">
                    <span class="text-3xl font-heading font-extrabold text-primary mb-4 block">03</span>
                    <h3 class="text-base font-heading font-bold text-primary mb-2">Investor Exposure</h3>
                    <p class="text-xs text-slate-600 leading-relaxed">
                        Your listing is published across our network of 15,200+ angels, matching with investors whose criteria fit your sector.
                    </p>
                </div>

                <div class="card p-6 border border-slate-200 bg-slate-50/50">
                    <span class="text-3xl font-heading font-extrabold text-primary mb-4 block">04</span>
                    <h3 class="text-base font-heading font-bold text-primary mb-2">Close Capital</h3>
                    <p class="text-xs text-slate-600 leading-relaxed">
                        Receive intro requests, schedule pitch calls, and secure checks directly into your bank account without giving away equity carry.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Pricing Tiers Table -->
<section class="py-20 bg-slate-50">
    <div class="container mx-auto">
        <div class="text-center max-w-2xl mx-auto mb-16">
            <span class="badge badge-gold mb-3"><?php esc_html_e( 'Transparent Rates', 'angel-network' ); ?></span>
            <h2 class="text-3xl sm:text-4xl font-heading font-extrabold text-primary mb-4">
                Founder Listing Packages
            </h2>
            <p class="text-slate-600 text-sm sm:text-base">
                Investor accounts are 100% free. Entrepreneurs pay a one-time listing fee with zero back-end success fees or equity deductions.
            </p>
        </div>

        <div class="grid md:grid-cols-3 gap-8 max-w-5xl mx-auto">
            <!-- Standard Plan -->
            <div class="card p-8 bg-white border border-slate-200 flex flex-col justify-between">
                <div>
                    <h3 class="text-lg font-heading font-bold text-primary mb-2">Standard Pitch</h3>
                    <p class="text-xs text-slate-500 mb-6">Ideal for local seed raises and early angel testing.</p>
                    <div class="mb-6">
                        <span class="text-3xl font-heading font-extrabold text-primary">CA$ 249</span>
                        <span class="text-xs text-slate-400">/ 90 days listing</span>
                    </div>
                    <ul class="space-y-3 text-xs text-slate-600 mb-8">
                        <li class="flex items-center gap-2">✓ Published across Canadian marketplace</li>
                        <li class="flex items-center gap-2">✓ Standard investor messaging inbox</li>
                        <li class="flex items-center gap-2">✓ Up to 5 document uploads in data room</li>
                        <li class="flex items-center gap-2">✓ Zero success fee on capital raised</li>
                    </ul>
                </div>
                <button type="button" data-open-modal="auth-modal" data-modal-tab="register" data-modal-role="entrepreneur" class="btn btn-secondary w-full">
                    Select Standard
                </button>
            </div>

            <!-- Pro Plan (Featured) -->
            <div class="card p-8 bg-white border-2 border-accent relative shadow-xl flex flex-col justify-between">
                <span class="absolute -top-3.5 left-1/2 -translate-x-1/2 badge badge-accent font-bold py-1 px-3">
                    Most Popular
                </span>
                <div>
                    <h3 class="text-lg font-heading font-bold text-primary mb-2">Pro Network</h3>
                    <p class="text-xs text-slate-500 mb-6">For fast-moving ventures seeking lead angel commitment.</p>
                    <div class="mb-6">
                        <span class="text-3xl font-heading font-extrabold text-primary">CA$ 449</span>
                        <span class="text-xs text-slate-400">/ 180 days listing</span>
                    </div>
                    <ul class="space-y-3 text-xs text-slate-600 mb-8">
                        <li class="flex items-center gap-2 font-semibold text-primary">✓ Featured Homepage Placement</li>
                        <li class="flex items-center gap-2">✓ Targeted email blast to sector angels</li>
                        <li class="flex items-center gap-2">✓ Unlimited data room document hosting</li>
                        <li class="flex items-center gap-2">✓ Priority 12-hour compliance screening</li>
                        <li class="flex items-center gap-2">✓ Dedicated investment support advisor</li>
                    </ul>
                </div>
                <button type="button" data-open-modal="auth-modal" data-modal-tab="register" data-modal-role="entrepreneur" class="btn btn-accent w-full">
                    Get Started with Pro
                </button>
            </div>

            <!-- Global Executive Plan -->
            <div class="card p-8 bg-white border border-slate-200 flex flex-col justify-between">
                <div>
                    <h3 class="text-lg font-heading font-bold text-primary mb-2">Global Executive</h3>
                    <p class="text-xs text-slate-500 mb-6">For Series A and cross-border US/UK investments.</p>
                    <div class="mb-6">
                        <span class="text-3xl font-heading font-extrabold text-primary">CA$ 899</span>
                        <span class="text-xs text-slate-400">/ 365 days listing</span>
                    </div>
                    <ul class="space-y-3 text-xs text-slate-600 mb-8">
                        <li class="flex items-center gap-2">✓ Cross-border North America & UK investment distribution</li>
                        <li class="flex items-center gap-2">✓ Verified Institutional Founder Badge</li>
                        <li class="flex items-center gap-2">✓ Premium editorial feature in newsletter</li>
                        <li class="flex items-center gap-2">✓ Direct introductions to 10 matching family offices</li>
                    </ul>
                </div>
                <button type="button" data-open-modal="auth-modal" data-modal-tab="register" data-modal-role="entrepreneur" class="btn btn-secondary w-full">
                    Select Global Executive
                </button>
            </div>
        </div>
    </div>
</section>

<!-- Bottom CTA -->
<?php get_template_part( 'template-parts/sections/cta-banner' ); ?>

<?php
get_footer();
