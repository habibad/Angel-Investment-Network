<?php
/**
 * Community Section - Editorial Dual Network
 *
 * @package AngelNetwork
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
?>

<section class="py-24 lg:py-32 bg-brand-canvas border-b border-brand-border">
    <div class="container mx-auto">
        <div class="grid lg:grid-cols-12 gap-12 lg:gap-16 items-center">
            
            <!-- LEFT: Editorial Text Block -->
            <div class="lg:col-span-5 flex flex-col items-start">
                <p class="text-xs font-sans font-semibold uppercase tracking-widest-plus text-brand-teal mb-4">
                    <?php esc_html_e( 'Our Community', 'angel-network' ); ?>
                </p>

                <h2 class="font-serif text-3xl sm:text-4xl lg:text-5xl text-brand-dark leading-[1.15] tracking-tight mb-6">
                    A Growing Network of<br>
                    Investors and<br>
                    <span class="italic font-normal">Entrepreneurs</span>
                </h2>

                <p class="text-base font-sans text-brand-muted leading-relaxed mb-8">
                    <?php esc_html_e( 'We unite high-conviction capital with ambitious innovators. By replacing bureaucratic barriers with direct relationships, we enable early-stage businesses to secure backing from individuals who provide strategic industry insight alongside seed capital.', 'angel-network' ); ?>
                </p>

                <div class="pt-6 border-t border-brand-border w-full flex items-center gap-8 text-xs font-sans text-brand-light">
                    <div>
                        <span class="block font-serif text-2xl font-bold text-brand-dark">1,200+</span>
                        <span>Accredited Angels</span>
                    </div>
                    <div class="w-px h-8 bg-brand-border"></div>
                    <div>
                        <span class="block font-serif text-2xl font-bold text-brand-dark">700+</span>
                        <span>Funded Founders</span>
                    </div>
                </div>
            </div>

            <!-- RIGHT: Two Image-Led Audience Panels (Visually connected) -->
            <div class="lg:col-span-7 flex flex-col gap-6">
                
                <!-- Panel 1: For Investors -->
                <a href="<?php echo esc_url( home_url( '/invest/' ) ); ?>" class="group block p-6 sm:p-8 bg-white border border-brand-border rounded transition-all duration-300 hover:border-brand-teal/40">
                    <div class="flex flex-col sm:flex-row sm:items-center gap-6">
                        <div class="relative w-full sm:w-44 aspect-[4/3] rounded overflow-hidden bg-brand-subtle shrink-0">
                            <img 
                                src="https://images.unsplash.com/photo-1573497019940-1c28c88b4f3e?auto=format&fit=crop&w=400&q=80" 
                                alt="<?php esc_attr_e( 'Private angel investor reviewing deal portfolio', 'angel-network' ); ?>" 
                                class="w-full h-full object-cover group-hover:scale-103 transition-transform duration-500"
                                loading="lazy"
                            >
                        </div>
                        <div class="flex-1 flex flex-col justify-between">
                            <div>
                                <span class="text-[11px] font-sans font-semibold uppercase tracking-widest text-brand-teal mb-1 block">
                                    <?php esc_html_e( 'For Investors', 'angel-network' ); ?>
                                </span>
                                <h3 class="font-serif text-2xl text-brand-dark leading-snug mb-2 group-hover:text-brand-teal transition-colors">
                                    <?php esc_html_e( 'Direct Dealflow & Vetted Co-Investment', 'angel-network' ); ?>
                                </h3>
                                <p class="text-sm font-sans text-brand-muted leading-relaxed">
                                    <?php esc_html_e( 'Discover opportunities, connect directly with founders, review confidential data rooms, and grow your early-stage venture portfolio.', 'angel-network' ); ?>
                                </p>
                            </div>
                            <div class="pt-4 flex items-center text-xs font-semibold text-brand-teal gap-1.5 group-hover:translate-x-1 transition-transform">
                                <span><?php esc_html_e( 'Explore Opportunities', 'angel-network' ); ?></span>
                                <span>→</span>
                            </div>
                        </div>
                    </div>
                </a>

                <!-- Panel 2: For Entrepreneurs -->
                <a href="<?php echo esc_url( home_url( '/fundraise/' ) ); ?>" class="group block p-6 sm:p-8 bg-white border border-brand-border rounded transition-all duration-300 hover:border-brand-teal/40">
                    <div class="flex flex-col sm:flex-row sm:items-center gap-6">
                        <div class="relative w-full sm:w-44 aspect-[4/3] rounded overflow-hidden bg-brand-subtle shrink-0">
                            <img 
                                src="https://images.unsplash.com/photo-1519085360753-af0119f7cbe7?auto=format&fit=crop&w=400&q=80" 
                                alt="<?php esc_attr_e( 'Tech founder preparing syndicate pitch', 'angel-network' ); ?>" 
                                class="w-full h-full object-cover group-hover:scale-103 transition-transform duration-500"
                                loading="lazy"
                            >
                        </div>
                        <div class="flex-1 flex flex-col justify-between">
                            <div>
                                <span class="text-[11px] font-sans font-semibold uppercase tracking-widest text-brand-teal mb-1 block">
                                    <?php esc_html_e( 'For Entrepreneurs', 'angel-network' ); ?>
                                </span>
                                <h3 class="font-serif text-2xl text-brand-dark leading-snug mb-2 group-hover:text-brand-teal transition-colors">
                                    <?php esc_html_e( 'Raise Capital & Build Strategic Partnerships', 'angel-network' ); ?>
                                </h3>
                                <p class="text-sm font-sans text-brand-muted leading-relaxed">
                                    <?php esc_html_e( 'Showcase your business, attract investment, and find strategic partners with the sector expertise to accelerate your scale.', 'angel-network' ); ?>
                                </p>
                            </div>
                            <div class="pt-4 flex items-center text-xs font-semibold text-brand-teal gap-1.5 group-hover:translate-x-1 transition-transform">
                                <span><?php esc_html_e( 'Apply for Funding', 'angel-network' ); ?></span>
                                <span>→</span>
                            </div>
                        </div>
                    </div>
                </a>

            </div>

        </div>
    </div>
</section>
