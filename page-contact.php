<?php
/**
 * Template Name: Contact Us
 *
 * @package InvestmentNetwork
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

get_header();

$support_email = get_theme_mod( 'angel_support_email', 'syndicate@angelinvestmentnetwork.local' );
$phone_number  = get_theme_mod( 'angel_phone_number', '+1 (800) 555-ANGEL' );
?>

<!-- Subpage Hero -->
<?php 
get_template_part( 'template-parts/hero/hero-page', null, [
    'title'    => esc_html__( 'Contact Syndicate Support & Inquiries', 'angel-network' ),
    'subtitle' => esc_html__( 'Have questions about platform diligence, accreditation verification, or corporate syndication? Connect with our dedicated team.', 'angel-network' ),
    'badge'    => esc_html__( 'Get in Touch', 'angel-network' ),
    'bg_image' => 'https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?auto=format&fit=crop&w=1600&q=80',
] ); 
?>

<section class="py-20 bg-slate-50">
    <div class="container mx-auto">
        <div class="grid lg:grid-cols-12 gap-12">
            <!-- Contact Form Column -->
            <div class="lg:col-span-7 bg-white p-8 sm:p-10 rounded-2xl border border-slate-200 shadow-sm">
                <h2 class="text-2xl font-heading font-extrabold text-primary mb-2">Send an Inquiry</h2>
                <p class="text-xs text-slate-500 mb-8">Our compliance and onboarding coordinators respond within 1 business day.</p>

                <form action="#" method="POST" class="space-y-5" onsubmit="event.preventDefault(); alert('Inquiry received. Our syndicate coordinator will connect with you shortly.');">
                    <!-- Inquiry Type Selector -->
                    <div>
                        <label class="block text-xs font-semibold text-slate-600 uppercase tracking-wider mb-2">Inquiry Type</label>
                        <div class="grid grid-cols-3 gap-2 text-xs">
                            <label class="flex items-center justify-center p-3 border border-slate-200 rounded-lg cursor-pointer hover:border-primary text-slate-700 font-medium">
                                <input type="radio" name="inquiry_type" value="founder" checked class="mr-2 text-primary focus:ring-primary">
                                <span>Founder</span>
                            </label>
                            <label class="flex items-center justify-center p-3 border border-slate-200 rounded-lg cursor-pointer hover:border-primary text-slate-700 font-medium">
                                <input type="radio" name="inquiry_type" value="investor" class="mr-2 text-primary focus:ring-primary">
                                <span>Investor</span>
                            </label>
                            <label class="flex items-center justify-center p-3 border border-slate-200 rounded-lg cursor-pointer hover:border-primary text-slate-700 font-medium">
                                <input type="radio" name="inquiry_type" value="partner" class="mr-2 text-primary focus:ring-primary">
                                <span>Press/Partner</span>
                            </label>
                        </div>
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-medium text-slate-700 mb-1">Full Name *</label>
                            <input type="text" required placeholder="Elena Vance" class="form-input">
                        </div>
                        <div>
                            <label class="block text-xs font-medium text-slate-700 mb-1">Work Email *</label>
                            <input type="email" required placeholder="elena@company.com" class="form-input">
                        </div>
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-medium text-slate-700 mb-1">Company / Syndicate Name</label>
                            <input type="text" placeholder="AeroPure Technologies" class="form-input">
                        </div>
                        <div>
                            <label class="block text-xs font-medium text-slate-700 mb-1">Direct Phone Number</label>
                            <input type="tel" placeholder="+1 (416) 555-0192" class="form-input">
                        </div>
                    </div>

                    <div>
                        <label class="block text-xs font-medium text-slate-700 mb-1">Your Message or Question *</label>
                        <textarea required rows="4" placeholder="Detail your capital requirement, investor criteria, or question..." class="form-input"></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary btn-lg w-full">
                        Submit Inquiry →
                    </button>
                </form>
            </div>

            <!-- Regional Coordinates & Hubs -->
            <div class="lg:col-span-5 flex flex-col justify-between space-y-6">
                <div class="bg-white p-8 rounded-2xl border border-slate-200 shadow-sm space-y-6">
                    <h3 class="text-lg font-heading font-bold text-primary">Direct Syndicate Desks</h3>

                    <div class="flex items-start gap-4">
                        <div class="w-10 h-10 rounded-xl bg-primary-50 text-primary flex items-center justify-center shrink-0">
                            <?php echo angel_get_svg_icon( 'location', 'w-5 h-5 text-accent' ); ?>
                        </div>
                        <div>
                            <p class="text-sm font-heading font-bold text-primary">Toronto Headquarters</p>
                            <p class="text-xs text-slate-500 leading-relaxed">161 Bay Street, Suite 2700, Toronto, ON M5J 2S1</p>
                        </div>
                    </div>

                    <div class="flex items-start gap-4">
                        <div class="w-10 h-10 rounded-xl bg-primary-50 text-primary flex items-center justify-center shrink-0">
                            <?php echo angel_get_svg_icon( 'location', 'w-5 h-5 text-accent' ); ?>
                        </div>
                        <div>
                            <p class="text-sm font-heading font-bold text-primary">Vancouver Innovation Hub</p>
                            <p class="text-xs text-slate-500 leading-relaxed">1055 West Georgia St, Suite 1500, Vancouver, BC V6E 3P3</p>
                        </div>
                    </div>

                    <div class="pt-6 border-t border-slate-100 space-y-3">
                        <div class="flex items-center justify-between text-xs">
                            <span class="text-slate-400">Direct Email:</span>
                            <a href="mailto:<?php echo esc_attr( $support_email ); ?>" class="font-semibold text-primary hover:underline"><?php echo esc_html( $support_email ); ?></a>
                        </div>
                        <div class="flex items-center justify-between text-xs">
                            <span class="text-slate-400">Toll-Free Desk:</span>
                            <span class="font-semibold text-primary"><?php echo esc_html( $phone_number ); ?></span>
                        </div>
                        <div class="flex items-center justify-between text-xs">
                            <span class="text-slate-400">Hours of Operation:</span>
                            <span class="font-semibold text-slate-700">Mon – Fri: 9:00 AM – 6:00 PM EST</span>
                        </div>
                    </div>
                </div>

                <div class="bg-primary text-white p-6 rounded-2xl shadow-md border border-primary-light">
                    <h4 class="font-heading font-bold text-sm text-accent uppercase tracking-wider mb-1">Accredited Investor Help</h4>
                    <p class="text-xs text-slate-300 leading-relaxed">
                        Need assistance verifying exemption status under OSC Rule 45-501 or setting up a corporate family office account? Reach our dedicated compliance desk directly.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Bottom CTA -->
<?php get_template_part( 'template-parts/sections/cta-banner' ); ?>

<?php
get_footer();
