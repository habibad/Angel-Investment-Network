<?php
/**
 * Opportunity Card Component - Light Editorial Direction
 *
 * @param array $args (deal, is_lead)
 * @package AngelNetwork
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$deal    = isset( $args['deal'] ) ? $args['deal'] : [];
$is_lead = ! empty( $args['is_lead'] );

if ( empty( $deal ) ) {
    return;
}
?>

<?php if ( $is_lead ) : ?>
    <!-- LEAD OPPORTUNITY: Prominent Editorial Presentation -->
    <article class="group relative bg-white border border-brand-border rounded overflow-hidden flex flex-col lg:flex-row lg:col-span-12 transition-all duration-300 hover:border-brand-teal/40">
        <!-- Prominent Image (Left) -->
        <div class="relative w-full lg:w-7/12 aspect-[16/10] lg:aspect-auto overflow-hidden bg-brand-subtle">
            <img 
                src="<?php echo esc_url( $deal['image'] ); ?>" 
                alt="<?php echo esc_attr( $deal['title'] ); ?>" 
                loading="lazy"
                class="w-full h-full object-cover object-center transition-transform duration-700 ease-out group-hover:scale-102"
            >
            <div class="absolute top-4 left-4 flex items-center gap-2">
                <span class="badge-editorial bg-white/95 backdrop-blur-xs text-brand-dark border-brand-border">
                    Featured Allocation
                </span>
                <span class="badge-quiet bg-white/90 backdrop-blur-xs">
                    <?php echo esc_html( $deal['industry'] ); ?>
                </span>
            </div>
        </div>

        <!-- Editorial Content (Right) -->
        <div class="w-full lg:w-5/12 p-8 lg:p-10 flex flex-col justify-between">
            <div>
                <!-- Location & Stage Meta -->
                <div class="flex items-center gap-3 text-xs font-sans text-brand-light mb-3">
                    <span><?php echo esc_html( $deal['location'] ); ?></span>
                    <span>•</span>
                    <span><?php echo esc_html( $deal['stage'] ); ?></span>
                </div>

                <!-- Title & Company -->
                <p class="text-xs font-sans font-semibold uppercase tracking-wider text-brand-teal mb-1.5">
                    <?php echo esc_html( $deal['company_name'] ); ?>
                </p>
                <h3 class="font-serif text-2xl lg:text-3xl text-brand-dark leading-snug tracking-tight mb-4 group-hover:text-brand-teal transition-colors">
                    <a href="<?php echo esc_url( home_url( '/opportunity/' . $deal['slug'] . '/' ) ); ?>">
                        <?php echo esc_html( $deal['title'] ); ?>
                    </a>
                </h3>

                <!-- Short Editorial Description -->
                <p class="text-sm font-sans text-brand-muted leading-relaxed line-clamp-3 mb-6">
                    <?php echo esc_html( $deal['description'] ); ?>
                </p>
            </div>

            <!-- Financial Metrics Strip -->
            <div class="pt-6 border-t border-brand-border">
                <div class="grid grid-cols-2 gap-6 mb-6">
                    <div>
                        <span class="block text-[11px] uppercase tracking-wider text-brand-light mb-1">
                            <?php esc_html_e( 'Funding Required', 'angel-network' ); ?>
                        </span>
                        <span class="font-serif text-xl font-bold text-brand-dark">
                            <?php echo esc_html( angel_format_currency( $deal['total_required'], $deal['currency'], true ) ); ?>
                        </span>
                    </div>
                    <div>
                        <span class="block text-[11px] uppercase tracking-wider text-brand-light mb-1">
                            <?php esc_html_e( 'Minimum Check', 'angel-network' ); ?>
                        </span>
                        <span class="font-serif text-xl font-bold text-brand-dark">
                            <?php echo esc_html( angel_format_currency( $deal['minimum_investment'], $deal['currency'] ) ); ?>
                        </span>
                    </div>
                </div>

                <div class="flex items-center justify-between">
                    <span class="text-xs text-brand-light">Led by <?php echo esc_html( $deal['founder_name'] ); ?></span>
                    <a href="<?php echo esc_url( home_url( '/opportunity/' . $deal['slug'] . '/' ) ); ?>" class="btn-link text-xs group-hover:translate-x-0.5 transition-transform">
                        <span><?php esc_html_e( 'Review Investment Details', 'angel-network' ); ?></span>
                        <span>→</span>
                    </a>
                </div>
            </div>
        </div>
    </article>

<?php else : ?>
    <!-- SUPPORTING OPPORTUNITY: Balanced Quiet Card -->
    <article class="group relative bg-white border border-brand-border rounded overflow-hidden flex flex-col justify-between transition-all duration-300 hover:border-brand-teal/40">
        <div>
            <!-- Image Crop -->
            <div class="relative w-full aspect-[16/10] overflow-hidden bg-brand-subtle">
                <img 
                    src="<?php echo esc_url( $deal['image'] ); ?>" 
                    alt="<?php echo esc_attr( $deal['title'] ); ?>" 
                    loading="lazy"
                    class="w-full h-full object-cover object-center transition-transform duration-700 ease-out group-hover:scale-103"
                >
                <div class="absolute top-3 left-3 flex items-center gap-1.5">
                    <span class="badge-quiet bg-white/95 backdrop-blur-xs font-semibold text-[10px]">
                        <?php echo esc_html( $deal['industry'] ); ?>
                    </span>
                </div>
            </div>

            <!-- Content -->
            <div class="p-6">
                <div class="flex items-center gap-2 text-xs font-sans text-brand-light mb-2">
                    <span><?php echo esc_html( $deal['location'] ); ?></span>
                    <span>•</span>
                    <span><?php echo esc_html( $deal['stage'] ); ?></span>
                </div>

                <p class="text-[11px] font-sans font-semibold uppercase tracking-wider text-brand-teal mb-1">
                    <?php echo esc_html( $deal['company_name'] ); ?>
                </p>

                <h3 class="font-serif text-xl text-brand-dark leading-snug tracking-tight mb-3 group-hover:text-brand-teal transition-colors line-clamp-2">
                    <a href="<?php echo esc_url( home_url( '/opportunity/' . $deal['slug'] . '/' ) ); ?>">
                        <?php echo esc_html( $deal['title'] ); ?>
                    </a>
                </h3>

                <p class="text-xs font-sans text-brand-muted leading-relaxed line-clamp-2 mb-4">
                    <?php echo esc_html( $deal['description'] ); ?>
                </p>
            </div>
        </div>

        <!-- Financial Metrics & Arrow -->
        <div class="px-6 pb-6 pt-4 border-t border-brand-border/70 mt-auto">
            <div class="grid grid-cols-2 gap-4 mb-4 text-left">
                <div>
                    <span class="block text-[10px] uppercase tracking-wider text-brand-light">Required</span>
                    <span class="font-serif text-base font-bold text-brand-dark">
                        <?php echo esc_html( angel_format_currency( $deal['total_required'], $deal['currency'], true ) ); ?>
                    </span>
                </div>
                <div>
                    <span class="block text-[10px] uppercase tracking-wider text-brand-light">Min. Check</span>
                    <span class="font-serif text-base font-bold text-brand-dark">
                        <?php echo esc_html( angel_format_currency( $deal['minimum_investment'], $deal['currency'] ) ); ?>
                    </span>
                </div>
            </div>

            <div class="flex items-center justify-between text-xs pt-2">
                <span class="text-[11px] text-brand-light"><?php echo esc_html( $deal['funding_type'] ); ?></span>
                <a href="<?php echo esc_url( home_url( '/opportunity/' . $deal['slug'] . '/' ) ); ?>" class="btn-link text-xs group-hover:translate-x-0.5 transition-transform">
                    <span>View Deal</span>
                    <span>→</span>
                </a>
            </div>
        </div>
    </article>
<?php endif; ?>
