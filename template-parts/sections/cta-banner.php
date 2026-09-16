<?php
/**
 * Final CTA Section - Calm, Aspirational Editorial Conclusion
 *
 * @package AngelNetwork
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
?>

<section class="relative py-28 lg:py-36 bg-brand-canvas border-b border-brand-border overflow-hidden">
    <div class="container mx-auto">
        <div class="relative bg-white border border-brand-border rounded p-10 sm:p-16 lg:p-20 overflow-hidden">
            <!-- Subtle architectural background image overlay -->
            <div class="absolute inset-0 opacity-15 mix-blend-multiply pointer-events-none">
                <img 
                    src="https://images.unsplash.com/photo-1497366216548-37526070297c?auto=format&fit=crop&w=1400&q=80" 
                    alt="" 
                    class="w-full h-full object-cover object-center"
                >
            </div>

            <div class="relative z-10 max-w-2xl">
                <p class="text-xs font-sans font-semibold uppercase tracking-widest-plus text-brand-teal mb-4">
                    <?php esc_html_e( 'Begin Your Journey', 'angel-network' ); ?>
                </p>

                <h2 class="font-serif text-3xl sm:text-4xl lg:text-5xl text-brand-dark leading-[1.15] tracking-tight mb-6">
                    Ready to Turn Ideas<br>
                    into <span class="italic font-normal">Impact?</span>
                </h2>

                <p class="text-base font-sans text-brand-muted leading-relaxed mb-8">
                    <?php esc_html_e( 'Join a growing network of investors and entrepreneurs building the businesses of tomorrow.', 'angel-network' ); ?>
                </p>

                <!-- Calm, aspirational buttons -->
                <div class="flex flex-col sm:flex-row items-stretch sm:items-center gap-4">
                    <a href="<?php echo esc_url( home_url( '/invest/' ) ); ?>" class="btn btn-primary">
                        <span><?php esc_html_e( 'Explore Opportunities', 'angel-network' ); ?></span>
                        <span class="ml-2">→</span>
                    </a>
                    <button 
                        type="button" 
                        data-open-modal="auth-modal" 
                        data-modal-tab="register" 
                        class="btn btn-secondary"
                    >
                        <span><?php esc_html_e( 'Join the Network', 'angel-network' ); ?></span>
                        <span class="ml-2">→</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>
