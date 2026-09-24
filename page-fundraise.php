<?php
/**
 * Template Name: Fundraise Hub
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
    'title'    => esc_html__( 'Raise Angel Capital for Your Venture', 'angel-network' ),
    'subtitle' => esc_html__( 'Present your company directly to 15,200+ accredited Canadian and international investors ready to syndicate high-conviction checks.', 'angel-network' ),
    'badge'    => esc_html__( 'Founder Fundraising Portal', 'angel-network' ),
    'bg_image' => 'https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?auto=format&fit=crop&w=1600&q=80',
] ); 
?>

<!-- Pitch Preparation Checklist -->
<section class="py-20 bg-white">
    <div class="container mx-auto">
        <div class="grid lg:grid-cols-12 gap-12 items-center">
            <div class="lg:col-span-6">
                <span class="badge badge-accent mb-3"><?php esc_html_e( 'What Angels Look For', 'angel-network' ); ?></span>
                <h2 class="text-3xl sm:text-4xl font-heading font-extrabold text-primary mb-6">
                    What You Need Before Submitting Your Pitch
                </h2>
                <p class="text-slate-600 text-sm sm:text-base leading-relaxed mb-6">
                    Angels review dozens of deals weekly. Pitch decks with clear financial metrics, transparent dilution targets, and verifiable traction close rounds 3.4x faster.
                </p>

                <div class="space-y-4">
                    <div class="flex items-start gap-4 p-4 rounded-xl bg-slate-50 border border-slate-100">
                        <div class="w-8 h-8 rounded-lg bg-accent/20 text-accent flex items-center justify-center font-bold text-sm shrink-0">1</div>
                        <div>
                            <h3 class="text-sm font-heading font-bold text-primary">Executive Summary & Problem Statement</h3>
                            <p class="text-xs text-slate-500 mt-1">A succinct 2-paragraph overview detailing the customer pain point, proprietary solution, and total addressable market (TAM).</p>
                        </div>
                    </div>

                    <div class="flex items-start gap-4 p-4 rounded-xl bg-slate-50 border border-slate-100">
                        <div class="w-8 h-8 rounded-lg bg-accent/20 text-accent flex items-center justify-center font-bold text-sm shrink-0">2</div>
                        <div>
                            <h3 class="text-sm font-heading font-bold text-primary">Capital Requirement & Minimum Ticket</h3>
                            <p class="text-xs text-slate-500 mt-1">State your total target round (e.g. CA$ 1.5M), round structure (SAFE or Preferred Equity), and minimum check size (e.g. CA$ 25K).</p>
                        </div>
                    </div>

                    <div class="flex items-start gap-4 p-4 rounded-xl bg-slate-50 border border-slate-100">
                        <div class="w-8 h-8 rounded-lg bg-accent/20 text-accent flex items-center justify-center font-bold text-sm shrink-0">3</div>
                        <div>
                            <h3 class="text-sm font-heading font-bold text-primary">Traction, ARR & Key Milestones</h3>
                            <p class="text-xs text-slate-500 mt-1">Provide historical monthly recurring revenue, customer pilot contracts, patent statuses, or clinical trial milestones.</p>
                        </div>
                    </div>

                    <div class="flex items-start gap-4 p-4 rounded-xl bg-slate-50 border border-slate-100">
                        <div class="w-8 h-8 rounded-lg bg-accent/20 text-accent flex items-center justify-center font-bold text-sm shrink-0">4</div>
                        <div>
                            <h3 class="text-sm font-heading font-bold text-primary">Founder Pedigree & Cap Table Hygiene</h3>
                            <p class="text-xs text-slate-500 mt-1">Brief biographies of co-founders, previous startup exits, patents held, and clean cap table ownership breakdown.</p>
                        </div>
                    </div>
                </div>

                <div class="mt-8">
                    <button 
                        type="button" 
                        data-open-modal="auth-modal" 
                        data-modal-tab="register" 
                        data-modal-role="entrepreneur"
                        class="btn btn-accent btn-lg font-bold"
                    >
                        <?php esc_html_e( 'Submit Your Pitch Now →', 'angel-network' ); ?>
                    </button>
                </div>
            </div>

            <div class="lg:col-span-6 relative">
                <div class="rounded-3xl overflow-hidden shadow-2xl border-4 border-white bg-slate-100 aspect-4/3">
                    <img 
                        src="https://images.unsplash.com/photo-1551836022-d5d88e9218df?auto=format&fit=crop&w=800&q=80" 
                        alt="Founder Pitching to Syndicate" 
                        class="w-full h-full object-cover"
                    >
                </div>
                <div class="absolute -bottom-6 -right-6 bg-white p-6 rounded-2xl shadow-xl max-w-xs border border-slate-100">
                    <p class="text-xs font-bold text-slate-400 uppercase tracking-wider">Fast Turnaround</p>
                    <p class="text-xl font-heading font-extrabold text-primary mt-1">24-Hour Review</p>
                    <p class="text-xs text-slate-500 mt-1">Pitches screened by our compliance team within 24 hours of submission.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Founder Testimonials -->
<section class="py-20 bg-slate-50">
    <div class="container mx-auto">
        <div class="text-center max-w-2xl mx-auto mb-16">
            <span class="badge badge-primary mb-3"><?php esc_html_e( 'Success Stories', 'angel-network' ); ?></span>
            <h2 class="text-3xl font-heading font-extrabold text-primary mb-3">
                How Founders Funded Their Rounds
            </h2>
            <p class="text-slate-600 text-sm">Read how Canadian entrepreneurs turned structured pitches into committed capital.</p>
        </div>

        <div class="grid md:grid-cols-3 gap-8">
            <?php foreach ( angel_get_testimonials() as $testimonial ) : ?>
                <?php get_template_part( 'template-parts/cards/card-testimonial', null, [ 'testimonial' => $testimonial ] ); ?>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Bottom CTA -->
<?php get_template_part( 'template-parts/sections/cta-banner' ); ?>

<?php
get_footer();
