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

                <!-- Dual Intent Entry Point (PDF Page 34: Explore Opportunities vs Present Your Business) -->
                <div class="w-full sm:w-fit max-w-2xl p-2.5 sm:p-3 bg-white rounded-2xl border border-slate-200 shadow-card mb-4 hero-pop-in delay-400">
                    <div class="flex flex-col sm:flex-row items-stretch sm:items-center gap-3">
                        <div class="flex items-center gap-2 w-full sm:w-auto px-4 py-3 bg-slate-50 rounded-xl border border-slate-200 shrink-0">
                            <label for="hero-objective-select" class="text-xs font-bold text-slate-500 uppercase tracking-wider whitespace-nowrap">
                                <?php esc_html_e( 'I want to', 'angel-network' ); ?>:
                            </label>
                            <select 
                                id="hero-objective-select" 
                                class="bg-transparent text-sm font-heading font-bold text-primary focus:outline-none cursor-pointer pr-3"
                            >
                                <option value="invest"><?php esc_html_e( 'Explore Opportunities', 'angel-network' ); ?></option>
                                <option value="fundraise"><?php esc_html_e( 'Present Your Business', 'angel-network' ); ?></option>
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

                <!-- Trust Micro-Notice -->
                <p class="text-xs text-slate-500 mt-2 flex items-center gap-1.5 hero-fade-up delay-500">
                    <span class="text-accent"><?php echo angel_get_svg_icon( 'check', 'w-3.5 h-3.5' ); ?></span>
                    <span><?php esc_html_e( 'Direct discussions between business owners and investors. Free during launch.', 'angel-network' ); ?></span>
                </p>
            </div>

            <!-- Right Column: Cuba Silhouette & Authentic Business Composition (PDF Pages 28-30 & 34) -->
            <div class="lg:col-span-5 relative flex items-center justify-center">
                <!-- Centerpiece Visual Canvas -->
                <div class="relative w-full max-w-md aspect-square rounded-3xl overflow-hidden shadow-2xl border-4 border-white bg-slate-900 hero-scale-in delay-200">
                    <img 
                        src="https://images.unsplash.com/photo-1577495508048-b635879837f1?auto=format&fit=crop&w=800&q=80" 
                        alt="<?php esc_attr_e( 'Cuban Enterprise and Private Sector Growth', 'angel-network' ); ?>" 
                        class="w-full h-full object-cover opacity-85"
                    >
                    <div class="absolute inset-0 bg-gradient-to-t from-slate-950 via-slate-950/30 to-transparent"></div>

                    <!-- Bottom Overlay Banner: Cuba Silhouette & Global Network -->
                    <div class="absolute bottom-6 left-6 right-6 p-4 bg-white/95 backdrop-blur-md rounded-xl border border-white/40 shadow-lg">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 rounded-full bg-accent/20 flex items-center justify-center text-accent shrink-0">
                                    <?php echo angel_get_svg_icon( 'sparkles', 'w-5 h-5' ); ?>
                                </div>
                                <div>
                                    <p class="text-xs font-bold text-slate-400 uppercase tracking-wider"><?php esc_html_e( 'Connecting Cuba with the World', 'angel-network' ); ?></p>
                                    <p class="text-sm font-heading font-extrabold text-primary"><?php esc_html_e( 'Private Enterprise Directory', 'angel-network' ); ?></p>
                                </div>
                            </div>
                            <span class="badge badge-accent text-[11px] font-bold"><?php esc_html_e( 'Active', 'angel-network' ); ?></span>
                        </div>
                    </div>
                </div>

                <!-- Floating Card 1: Direct Communication Badge (Top Right) -->
                <div class="absolute -top-4 -right-4 sm:-right-6 bg-white p-3.5 rounded-2xl shadow-xl border border-slate-100 flex items-center gap-3 z-20 hero-pop-in delay-500">
                    <div class="w-10 h-10 rounded-xl bg-primary-50 text-primary flex items-center justify-center shrink-0">
                        <?php echo angel_get_svg_icon( 'activity', 'w-5 h-5 text-accent' ); ?>
                    </div>
                    <div class="flex flex-col">
                        <span class="text-xs font-bold text-slate-800"><?php esc_html_e( 'Direct Connections', 'angel-network' ); ?></span>
                        <span class="text-[10px] text-slate-500"><?php esc_html_e( 'No Intermediary Fees', 'angel-network' ); ?></span>
                    </div>
                </div>

                <!-- Floating Card 2: Initial Review Milestone (Middle Left) -->
                <div class="absolute top-1/2 -left-4 sm:-left-8 -translate-y-1/2 bg-white p-4 rounded-2xl shadow-xl border border-slate-100 flex flex-col gap-1.5 z-20 max-w-[210px] hero-pop-in-center delay-650">
                    <div class="flex items-center justify-between">
                        <span class="badge badge-primary text-[10px] py-0.5 px-2 font-bold"><?php esc_html_e( 'Reviewed Listings', 'angel-network' ); ?></span>
                        <span class="text-[10px] text-accent font-semibold"><?php esc_html_e( 'Launch Phase', 'angel-network' ); ?></span>
                    </div>
                    <span class="text-xs font-heading font-bold text-primary truncate"><?php esc_html_e( 'Emerging Enterprises', 'angel-network' ); ?></span>
                    <span class="text-[10px] text-slate-500"><?php esc_html_e( 'Cuba-focused opportunities across key sectors', 'angel-network' ); ?></span>
                </div>
            </div>
        </div>
    </div>
</section>
