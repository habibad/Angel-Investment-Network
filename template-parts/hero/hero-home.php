<?php
/**
 * Homepage Hero Section - Asymmetric Editorial Composition
 *
 * @package AngelNetwork
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
?>

<section class="relative bg-brand-canvas pt-16 pb-24 lg:pt-24 lg:pb-36 overflow-hidden">
    <div class="container mx-auto">
        <div class="grid lg:grid-cols-12 gap-12 lg:gap-16 items-center">
            
            <!-- LEFT COLUMN: Editorial Typography & Intentional Linebreaks (approx 45-50% width) -->
            <div class="lg:col-span-6 xl:col-span-6 flex flex-col items-start z-10">
                <!-- Small Uppercase Label -->
                <p class="text-xs font-sans font-semibold uppercase tracking-widest-plus text-brand-teal mb-6">
                    <?php esc_html_e( 'Angel Investment Network', 'angel-network' ); ?>
                </p>

                <!-- Editorial Headline with Intentional Line Breaks -->
                <h1 class="font-serif text-4xl sm:text-5xl lg:text-6xl text-brand-dark leading-[1.12] tracking-tighter mb-6">
                    Connecting Visionary<br>
                    Entrepreneurs with<br>
                    <span class="italic font-normal">Strategic Investors</span>
                </h1>

                <!-- Supporting Prose -->
                <p class="text-base sm:text-lg font-sans text-brand-muted leading-relaxed max-w-lg mb-8">
                    <?php esc_html_e( 'Bridge the gap between ambitious businesses and the capital, expertise and relationships they need to grow.', 'angel-network' ); ?>
                </p>

                <!-- Quiet Button Pair -->
                <div class="flex flex-col sm:flex-row items-stretch sm:items-center gap-4 mb-10 w-full sm:w-auto">
                    <a href="<?php echo esc_url( home_url( '/invest/' ) ); ?>" class="btn btn-primary">
                        <span><?php esc_html_e( 'Explore Opportunities', 'angel-network' ); ?></span>
                        <span class="ml-2">→</span>
                    </a>
                    <a href="<?php echo esc_url( home_url( '/fundraise/' ) ); ?>" class="btn btn-secondary">
                        <span><?php esc_html_e( 'Raise Capital', 'angel-network' ); ?></span>
                        <span class="ml-2">→</span>
                    </a>
                </div>

                <!-- Small Quiet Trust Indicators -->
                <div class="pt-6 border-t border-brand-border/80 w-full max-w-md">
                    <p class="text-xs font-sans text-brand-light tracking-wide flex flex-wrap items-center gap-x-3 gap-y-1">
                        <span><?php esc_html_e( 'Verified Opportunities', 'angel-network' ); ?></span>
                        <span class="text-brand-border">•</span>
                        <span><?php esc_html_e( 'Global Network', 'angel-network' ); ?></span>
                        <span class="text-brand-border">•</span>
                        <span><?php esc_html_e( 'Expert Support', 'angel-network' ); ?></span>
                    </p>
                </div>
            </div>

            <!-- RIGHT COLUMN: Single Large Editorial Business Photo + Restrained Grounded Information Panel -->
            <div class="lg:col-span-6 xl:col-span-6 relative lg:-mr-6 xl:-mr-10">
                <!-- Editorial Image Container (Natural documentary-style photography) -->
                <div class="relative w-full aspect-[4/3] lg:aspect-[16/11] overflow-hidden rounded bg-brand-subtle">
                    <img 
                        src="https://images.unsplash.com/photo-1556761175-5973dc0f32e7?auto=format&fit=crop&w=1400&q=85" 
                        alt="<?php esc_attr_e( 'Entrepreneurs and investors in executive consultation', 'angel-network' ); ?>" 
                        class="w-full h-full object-cover object-center"
                        loading="eager"
                        fetchpriority="high"
                    >
                </div>

                <!-- Restrained Grounded Information Panel Overlapping Lower Edge -->
                <div class="relative lg:absolute -mt-8 lg:mt-0 lg:-bottom-10 lg:left-8 bg-white border border-brand-border rounded p-6 sm:p-8 max-w-md shadow-panel">
                    <p class="text-[11px] font-sans font-semibold uppercase tracking-widest text-brand-light mb-1">
                        <?php esc_html_e( 'Total Capital Connected', 'angel-network' ); ?>
                    </p>
                    <p class="font-serif text-3xl sm:text-4xl font-bold text-brand-dark tracking-tight mb-4">
                        $1.2B+
                    </p>
                    <div class="pt-4 border-t border-brand-border flex items-center justify-between text-xs font-sans text-brand-muted">
                        <div>
                            <span class="font-bold text-brand-dark">1,200+</span> Investors
                        </div>
                        <span class="text-brand-border">•</span>
                        <div>
                            <span class="font-bold text-brand-dark">700+</span> Founders
                        </div>
                        <span class="text-brand-border">•</span>
                        <div>
                            <span class="font-bold text-brand-dark">250+</span> Deals
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
</section>
