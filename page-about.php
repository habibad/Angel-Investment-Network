<?php
/**
 * Template Name: About Us
 *
 * @package AngelNetwork
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

get_header();

$stats = angel_get_stats();
?>

<!-- Subpage Hero -->
<?php 
get_template_part( 'template-parts/hero/hero-page', null, [
    'title'    => esc_html__( 'About Angel Investment Network', 'angel-network' ),
    'subtitle' => esc_html__( 'Canada’s institutional bridge connecting high-conviction angel investors with ambitious founders driving technological and industrial transformation.', 'angel-network' ),
    'badge'    => esc_html__( 'Our Syndicate Story', 'angel-network' ),
    'bg_image' => 'https://images.unsplash.com/photo-1522071820081-009f0129c71c?auto=format&fit=crop&w=1600&q=80',
] ); 
?>

<!-- Mission & Vision Section -->
<section class="py-20 bg-white">
    <div class="container mx-auto">
        <div class="grid lg:grid-cols-12 gap-12 items-center">
            <div class="lg:col-span-6">
                <span class="badge badge-accent mb-3"><?php esc_html_e( 'Our Purpose', 'angel-network' ); ?></span>
                <h2 class="text-3xl sm:text-4xl font-heading font-extrabold text-primary mb-6">
                    Fostering Sustainable Innovation Through Direct Angel Capital
                </h2>
                <div class="space-y-4 text-slate-600 text-sm sm:text-base leading-relaxed">
                    <p>
                        Founded with a singular mission, the Angel Investment Network eliminates bureaucratic venture intermediaries by establishing a direct, transparent channel between experienced capital allocators and early-stage startup leaders.
                    </p>
                    <p>
                        Unlike traditional funds weighed down by 2-and-20 fee structures and protracted decision horizons, angel syndicates move with agility. We provide the governance infrastructure, standardized due diligence materials, and private deal room security that enable accredited angels to write high-conviction checks within weeks, not quarters.
                    </p>
                    <p>
                        Today, our network represents more than 15,200 verified angel investors and has facilitated over CA$ 420 million in direct early-stage equity, convertible notes, and SAFEs across Canadian technology hubs from Vancouver to Halifax.
                    </p>
                </div>
            </div>

            <div class="lg:col-span-6 relative">
                <div class="rounded-3xl overflow-hidden shadow-2xl border-4 border-white bg-slate-100 aspect-4/3">
                    <img 
                        src="https://images.unsplash.com/photo-1522071820081-009f0129c71c?auto=format&fit=crop&w=800&q=80" 
                        alt="Angel Network Leadership and Founders" 
                        class="w-full h-full object-cover"
                    >
                </div>
                <div class="absolute -bottom-6 -left-6 bg-primary text-white p-6 rounded-2xl shadow-xl max-w-xs border border-primary-light">
                    <p class="text-2xl font-heading font-extrabold text-accent">100% Direct</p>
                    <p class="text-xs text-slate-300 mt-1">Zero carry, zero broker commission on angel investments.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Impact Metrics Bar -->
<section class="py-16 bg-slate-50">
    <div class="container mx-auto">
        <div class="grid grid-cols-2 lg:grid-cols-4 gap-8 text-center">
            <?php foreach ( $stats as $stat ) : ?>
                <div class="p-4">
                    <p class="text-3xl sm:text-4xl font-heading font-extrabold text-primary tracking-tight mb-1">
                        <?php echo esc_html( $stat['value'] ); ?>
                    </p>
                    <p class="text-xs sm:text-sm font-semibold text-slate-700"><?php echo esc_html( $stat['label'] ); ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Core Pillars Section -->
<?php get_template_part( 'template-parts/sections/benefits' ); ?>

<!-- Bottom CTA -->
<?php get_template_part( 'template-parts/sections/cta-banner' ); ?>

<?php
get_footer();
