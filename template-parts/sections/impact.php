<?php
/**
 * Impact Section - The Single Dark Contrast Statement
 *
 * @package AngelNetwork
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
?>

<section class="relative py-28 lg:py-36 bg-[#0A3D36] text-white overflow-hidden">
    <!-- Very subtle architectural background photography overlay -->
    <div class="absolute inset-0 opacity-10 mix-blend-overlay pointer-events-none">
        <img 
            src="https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?auto=format&fit=crop&w=1600&q=80" 
            alt="" 
            class="w-full h-full object-cover"
        >
    </div>

    <div class="container mx-auto relative z-10">
        <!-- Section Narrative Header -->
        <div class="text-center max-w-2xl mx-auto mb-20">
            <p class="text-xs font-sans font-semibold uppercase tracking-widest-plus text-brand-sand/80 mb-4">
                <?php esc_html_e( 'Our Community', 'angel-network' ); ?>
            </p>
            <h2 class="font-serif text-3xl sm:text-4xl lg:text-5xl text-white leading-tight tracking-tight">
                Building a Stronger<br>
                <span class="italic font-normal">Investment Ecosystem</span>
            </h2>
        </div>

        <!-- Large Elegant Numbers with Small Labels (Brand statement feel, lots of breathing space) -->
        <div class="grid grid-cols-2 lg:grid-cols-4 gap-12 lg:gap-8 text-center max-w-5xl mx-auto">
            <div class="flex flex-col items-center">
                <span class="font-serif text-4xl sm:text-5xl lg:text-6xl font-light text-white tracking-tight mb-2">
                    1,200+
                </span>
                <span class="text-xs font-sans uppercase tracking-widest text-slate-300 font-medium">
                    <?php esc_html_e( 'Active Members', 'angel-network' ); ?>
                </span>
            </div>

            <div class="flex flex-col items-center">
                <span class="font-serif text-4xl sm:text-5xl lg:text-6xl font-light text-white tracking-tight mb-2">
                    500+
                </span>
                <span class="text-xs font-sans uppercase tracking-widest text-slate-300 font-medium">
                    <?php esc_html_e( 'Investors', 'angel-network' ); ?>
                </span>
            </div>

            <div class="flex flex-col items-center">
                <span class="font-serif text-4xl sm:text-5xl lg:text-6xl font-light text-white tracking-tight mb-2">
                    700+
                </span>
                <span class="text-xs font-sans uppercase tracking-widest text-slate-300 font-medium">
                    <?php esc_html_e( 'Entrepreneurs', 'angel-network' ); ?>
                </span>
            </div>

            <div class="flex flex-col items-center">
                <span class="font-serif text-4xl sm:text-5xl lg:text-6xl font-light text-white tracking-tight mb-2">
                    250+
                </span>
                <span class="text-xs font-sans uppercase tracking-widest text-slate-300 font-medium">
                    <?php esc_html_e( 'Fundraising Opportunities', 'angel-network' ); ?>
                </span>
            </div>
        </div>
    </div>
</section>
