<?php
/**
 * Opportunity Card Component
 * Designed around Cuban private business realities per PDF Pages 30 & 35
 *
 * @param array $deal (Passed in via template part args)
 * @package InvestmentNetwork
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$deal = isset( $args['deal'] ) ? $args['deal'] : [];

if ( empty( $deal ) ) {
    return;
}

$currency       = isset( $deal['currency'] ) ? $deal['currency'] : 'USD';
$capital_sought = isset( $deal['capital_sought'] ) ? $deal['capital_sought'] : ( isset( $deal['total_required'] ) ? $deal['total_required'] : 0 );
$status         = isset( $deal['status'] ) ? $deal['status'] : 'Under Review';
$status_label   = isset( $deal['status_label'] ) ? $deal['status_label'] : $status;
$ownership      = isset( $deal['ownership_structure'] ) ? $deal['ownership_structure'] : 'Private Enterprise (MIPYME)';
$history        = isset( $deal['operating_history'] ) ? $deal['operating_history'] : 'Operating Business';
$last_updated   = isset( $deal['last_updated'] ) ? $deal['last_updated'] : 'September 2026';
?>

<article 
    class="opportunity-item card group flex flex-col overflow-hidden transition-all duration-300 hover:-translate-y-1 bg-white border border-slate-200"
    data-sector="<?php echo esc_attr( $deal['industry_slug'] ); ?>"
>
    <!-- Deal Cover Image with Badges -->
    <div class="relative h-52 w-full overflow-hidden bg-slate-100">
        <img 
            src="<?php echo esc_url( $deal['image'] ); ?>" 
            alt="<?php echo esc_attr( $deal['title'] ); ?>" 
            loading="lazy"
            class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105"
        >
        <!-- Top Overlay Badges: Status & Sector -->
        <div class="absolute top-3 left-3 right-3 flex items-center justify-between pointer-events-none">
            <span class="badge badge-accent bg-accent text-white font-bold shadow-sm">
                <?php echo esc_html( $status_label ); ?>
            </span>
            <span class="badge badge-slate bg-white/95 text-slate-800 backdrop-blur-xs font-semibold shadow-sm">
                <?php echo esc_html( $deal['industry'] ); ?>
            </span>
        </div>
        
        <!-- Bottom Overlay: Location in Cuba -->
        <div class="absolute bottom-3 left-3 flex items-center gap-1.5 px-2.5 py-1 rounded-md bg-slate-950/75 text-white text-xs font-medium backdrop-blur-xs">
            <?php echo angel_get_svg_icon( 'location', 'w-3.5 h-3.5 text-accent' ); ?>
            <span><?php echo esc_html( $deal['location'] ); ?>, Cuba</span>
        </div>
    </div>

    <!-- Content Body -->
    <div class="p-6 flex-1 flex flex-col justify-between">
        <div>
            <!-- Company & Structure Header -->
            <div class="flex items-center justify-between gap-2 mb-1.5">
                <span class="deal-company text-xs font-bold tracking-wider text-slate-500 uppercase">
                    <?php echo esc_html( $deal['company_name'] ); ?>
                </span>
                <span class="text-[11px] text-slate-400 font-medium truncate">
                    <?php echo esc_html( $history ); ?>
                </span>
            </div>

            <!-- Opportunity Title -->
            <h3 class="deal-title text-base sm:text-lg font-heading font-bold text-primary group-hover:text-primary-light transition-colors line-clamp-2 leading-snug mb-2.5">
                <a href="<?php echo esc_url( home_url( '/opportunity/' . $deal['slug'] . '/' ) ); ?>">
                    <?php echo esc_html( $deal['title'] ); ?>
                </a>
            </h3>

            <!-- Business Description Excerpt -->
            <p class="deal-desc text-xs sm:text-sm text-slate-600 line-clamp-2 leading-relaxed mb-4">
                <?php echo esc_html( $deal['description'] ); ?>
            </p>

            <!-- Highlights / Objectives -->
            <?php if ( ! empty( $deal['highlights'] ) ) : ?>
                <ul class="space-y-1.5 mb-5 border-t border-slate-100 pt-3">
                    <?php foreach ( array_slice( $deal['highlights'], 0, 2 ) as $highlight ) : ?>
                        <li class="flex items-start gap-2 text-xs text-slate-600">
                            <span class="text-accent mt-0.5 shrink-0"><?php echo angel_get_svg_icon( 'check', 'w-3.5 h-3.5' ); ?></span>
                            <span class="line-clamp-1"><?php echo esc_html( $highlight ); ?></span>
                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>
        </div>

        <!-- Financial & Opportunity Parameters (PDF Page 30 & 35) -->
        <div class="border-t border-slate-100 pt-4 mt-auto">
            <!-- Capital Sought Grid (Replacing fake funding progress bar) -->
            <div class="grid grid-cols-2 gap-3 py-2 bg-slate-50/80 rounded-xl p-3 mb-4 text-center border border-slate-100">
                <div>
                    <span class="block text-[11px] text-slate-500 font-semibold uppercase tracking-wider">
                        <?php esc_html_e( 'Capital Sought', 'angel-network' ); ?>
                    </span>
                    <span class="text-sm sm:text-base font-heading font-extrabold text-primary block mt-0.5">
                        <?php echo esc_html( angel_format_currency( $capital_sought, $currency, true ) ); ?>
                    </span>
                </div>
                <div class="border-l border-slate-200">
                    <span class="block text-[11px] text-slate-500 font-semibold uppercase tracking-wider">
                        <?php esc_html_e( 'Min. Investment', 'angel-network' ); ?>
                    </span>
                    <span class="text-sm sm:text-base font-heading font-bold text-slate-800 block mt-0.5">
                        <?php echo esc_html( angel_format_currency( $deal['minimum_investment'], $currency ) ); ?>
                    </span>
                </div>
            </div>

            <!-- Transparency Meta: Source & Date (PDF Page 35) -->
            <div class="flex items-center justify-between text-[11px] text-slate-400 mb-3 px-0.5">
                <span><?php esc_html_e( 'Supplied by business owner', 'angel-network' ); ?></span>
                <span><?php printf( esc_html__( 'Updated: %s', 'angel-network' ), esc_html( $last_updated ) ); ?></span>
            </div>

            <!-- Action Button -->
            <div class="pt-2 border-t border-slate-100 flex items-center justify-between">
                <span class="text-[11px] text-slate-500 font-medium">
                    <?php echo esc_html( $ownership ); ?>
                </span>
                <a 
                    href="<?php echo esc_url( home_url( '/opportunity/' . $deal['slug'] . '/' ) ); ?>" 
                    class="btn btn-outline-primary btn-sm flex items-center gap-1 group-hover:bg-primary group-hover:text-white transition-colors"
                >
                    <span><?php esc_html_e( 'View Details', 'angel-network' ); ?></span>
                    <?php echo angel_get_svg_icon( 'arrow-right', 'w-3.5 h-3.5' ); ?>
                </a>
            </div>
        </div>
    </div>
</article>
