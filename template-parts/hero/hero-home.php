<?php
/**
 * Homepage Hero Section Component
 *
 * @package InvestmentNetwork
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$region_label = get_theme_mod( 'angel_region_label', 'Cuba' );
?>

<section id="hero-home" class="relative overflow-hidden bg-gradient-to-b from-slate-50 via-white to-slate-50/50 pt-10 pb-20 lg:pt-16 lg:pb-28">
    <!-- Subtle Ambient Background Glows -->
    <div class="absolute top-0 right-1/4 w-96 h-96 bg-primary-100/30 rounded-full blur-3xl -z-10 pointer-events-none"></div>
    <div class="absolute bottom-0 left-10 w-80 h-80 bg-accent-100/30 rounded-full blur-3xl -z-10 pointer-events-none"></div>

    <div class="container mx-auto">
        <div class="grid lg:grid-cols-12 gap-12 lg:gap-8 items-center">
            <!-- Left Column: Copy & Dual Intent Selector -->
            <div class="lg:col-span-7 flex flex-col items-start text-left">
                <!-- Tagline Badge -->
                <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-primary-50 border border-primary-200 mb-6 hero-fade-up delay-100">
                    <span class="inline-block w-2 h-2 rounded-full bg-accent animate-pulse"></span>
                    <span class="text-xs font-heading font-bold uppercase tracking-wider text-primary">
                        <?php esc_html_e( 'Cuban Investment Network', 'angel-network' ); ?>
                    </span>
                </div>

                <!-- Main Headline -->
                <h1 class="text-4xl sm:text-5xl lg:text-6xl font-heading font-extrabold text-primary tracking-tight leading-[1.1] mb-6 hero-fade-up delay-200">
                    Connecting Cuban Opportunities with <span class="text-accent underline decoration-accent/30 underline-offset-8">Strategic Capital</span>
                </h1>

                <!-- Subtitle -->
                <p class="text-lg sm:text-xl text-slate-600 leading-relaxed max-w-2xl mb-8 hero-fade-up delay-300">
                    <?php esc_html_e( 'We bridge the funding gap between ambitious Cuban enterprises and global investors.', 'angel-network' ); ?>
                </p>

                <!-- Dual Intent Entry Point (Invest vs Fundraise) -->
                <div class="w-full sm:w-fit max-w-2xl p-2.5 sm:p-3 bg-white rounded-2xl border border-slate-200 shadow-card mb-4 hero-pop-in delay-400">
                    <div class="flex flex-col sm:flex-row items-stretch sm:items-center gap-3">
                        <div class="flex items-center gap-2 w-full sm:w-auto px-4 py-3 bg-slate-50 rounded-xl border border-slate-200 shrink-0">
                            <span class="text-xs font-bold text-slate-500 uppercase tracking-wider whitespace-nowrap">
                                <?php esc_html_e( 'I want to', 'angel-network' ); ?>:
                            </span>
                            <select 
                                id="hero-objective-select" 
                                class="bg-transparent text-sm font-heading font-bold text-primary focus:outline-none cursor-pointer pr-3"
                            >
                                <option value="invest"><?php esc_html_e( 'Invest in Startups', 'angel-network' ); ?></option>
                                <option value="fundraise"><?php esc_html_e( 'Raise Capital (Fundraise)', 'angel-network' ); ?></option>
                            </select>
                        </div>

                        <a 
                            id="hero-get-started-btn" 
                            href="<?php echo esc_url( home_url( '/invest/' ) ); ?>" 
                            class="btn btn-primary btn-lg w-full sm:w-auto px-6 py-3 sm:py-3.5 text-center font-bold whitespace-nowrap inline-flex items-center justify-center gap-2"
                        >
                            <span><?php esc_html_e( 'Explore Opportunities', 'angel-network' ); ?></span>&nbsp;&rarr;
                        </a>
                    </div>
                </div>
            </div>

            <!-- Right Column: Visual Composition with Floating Interactive Cards -->
            <div class="lg:col-span-5 relative flex items-center justify-center">
                <!-- Centerpiece Visual Canvas -->
                <div class="relative w-full max-w-md aspect-square rounded-3xl overflow-hidden shadow-2xl border-4 border-white bg-slate-900 hero-scale-in delay-200">
                    <img 
                        src="https://images.unsplash.com/photo-1553877522-43269d4ea984?auto=format&fit=crop&w=800&q=80" 
                        alt="Investment Network Boardroom" 
                        class="w-full h-full object-cover opacity-80"
                    >
                    <div class="absolute inset-0 bg-gradient-to-t from-slate-950 via-slate-950/40 to-transparent"></div>

                    <!-- Bottom Overlay Stat Inside Photo -->
                    <div class="absolute bottom-6 left-6 right-6 p-4 bg-white/95 backdrop-blur-md rounded-xl border border-white/40 shadow-lg">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 rounded-full bg-accent/20 flex items-center justify-center text-accent">
                                    <?php echo angel_get_svg_icon( 'sparkles', 'w-5 h-5' ); ?>
                                </div>
                                <div>
                                    <p class="text-xs font-bold text-slate-400 uppercase tracking-wider"><?php esc_html_e( 'Marketplace Dealflow', 'angel-network' ); ?></p>
                                    <p class="text-sm font-heading font-extrabold text-primary"><?php esc_html_e( '18 New Deals This Week', 'angel-network' ); ?></p>
                                </div>
                            </div>
                            <span class="badge badge-accent text-[11px]"><?php esc_html_e( 'Live', 'angel-network' ); ?></span>
                        </div>
                    </div>
                </div>

                <!-- Floating Card 1: Top Angel Badge (Top Right) -->
                <div class="absolute -top-4 -right-4 sm:-right-6 bg-white p-3.5 rounded-2xl shadow-xl border border-slate-100 flex items-center gap-3 animate-bounce-subtle z-20 hero-pop-in delay-500">
                    <img 
                        src="https://images.unsplash.com/photo-1573497019940-1c28c88b4f3e?auto=format&fit=crop&w=120&q=80" 
                        alt="Christina S." 
                        class="w-11 h-11 rounded-full object-cover border border-slate-200"
                    >
                    <div class="flex flex-col">
                        <div class="flex items-center gap-1">
                            <span class="text-xs font-bold text-slate-800">Christina S.</span>
                            <?php echo angel_get_svg_icon( 'verified', 'w-3.5 h-3.5 text-accent' ); ?>
                        </div>
                        <span class="text-[10px] text-slate-400">Verified Angel Investor</span>
                        <span class="text-[11px] font-bold text-accent font-heading">$25K - $500K Check</span>
                    </div>
                </div>

                <!-- Floating Card 2: Pitch Milestone (Middle Left) -->
                <div class="absolute top-1/2 -left-4 sm:-left-8 -translate-y-1/2 bg-white p-4 rounded-2xl shadow-xl border border-slate-100 flex flex-col gap-1.5 z-20 max-w-[220px] hero-pop-in-center delay-650">
                    <div class="flex items-center justify-between">
                        <span class="badge badge-gold text-[10px] py-0.5 px-2 font-bold">Series Seed</span>
                        <span class="text-[10px] text-slate-400 font-semibold">70% Funded</span>
                    </div>
                    <span class="text-xs font-heading font-bold text-primary truncate">AeroPure CleanTech</span>
                    <div class="w-full h-1.5 bg-slate-100 rounded-full overflow-hidden">
                        <div class="h-full bg-accent rounded-full" style="width: 70%;"></div>
                    </div>
                    <span class="text-[10px] text-slate-500">$1.05M of $1.5M Goal</span>
                </div>
            </div>
        </div>
    </div>
</section>
