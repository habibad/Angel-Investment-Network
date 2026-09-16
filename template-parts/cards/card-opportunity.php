<?php
/**
 * Opportunity Card Component
 *
 * @param array $deal (Passed in via template part args or loop context)
 * @package AngelNetwork
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$deal = isset( $args['deal'] ) ? $args['deal'] : [];

if ( empty( $deal ) ) {
    return;
}

$percent = angel_calc_percentage( $deal['amount_raised'], $deal['total_required'] );
$badge_class = angel_get_stage_badge_class( $deal['stage'] );
?>

<article 
    class="opportunity-item card group flex flex-col overflow-hidden transition-all duration-300 hover:-translate-y-1"
    data-sector="<?php echo esc_attr( $deal['industry_slug'] ); ?>"
>
    <!-- Deal Image with Zoom & Badges -->
    <div class="relative h-52 w-full overflow-hidden bg-slate-100">
        <img 
            src="<?php echo esc_url( $deal['image'] ); ?>" 
            alt="<?php echo esc_attr( $deal['title'] ); ?>" 
            loading="lazy"
            class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105"
        >
        <!-- Top Overlay Badges -->
        <div class="absolute top-3 left-3 right-3 flex items-center justify-between pointer-events-none">
            <span class="badge <?php echo esc_attr( $badge_class ); ?> shadow-sm">
                <?php echo esc_html( $deal['stage'] ); ?>
            </span>
            <span class="badge badge-slate bg-white/95 text-slate-800 backdrop-blur-xs font-semibold shadow-sm">
                <?php echo esc_html( $deal['industry'] ); ?>
            </span>
        </div>
        
        <!-- Bottom Overlay Location -->
        <div class="absolute bottom-3 left-3 flex items-center gap-1.5 px-2.5 py-1 rounded-md bg-slate-950/70 text-white text-xs font-medium backdrop-blur-xs">
            <?php echo angel_get_svg_icon( 'location', 'w-3.5 h-3.5 text-accent' ); ?>
            <span><?php echo esc_html( $deal['location'] ); ?></span>
        </div>
    </div>

    <!-- Content Body -->
    <div class="p-6 flex-1 flex flex-col justify-between">
        <div>
            <!-- Company Name -->
            <p class="deal-company text-xs font-semibold tracking-wider text-slate-500 uppercase mb-1">
                <?php echo esc_html( $deal['company_name'] ); ?>
            </p>

            <!-- Deal Title -->
            <h3 class="deal-title text-lg font-heading font-bold text-primary group-hover:text-primary-light transition-colors line-clamp-2 leading-snug mb-2.5">
                <a href="<?php echo esc_url( home_url( '/opportunity/' . $deal['slug'] . '/' ) ); ?>">
                    <?php echo esc_html( $deal['title'] ); ?>
                </a>
            </h3>

            <!-- Description Excerpt -->
            <p class="deal-desc text-sm text-slate-600 line-clamp-2 leading-relaxed mb-4">
                <?php echo esc_html( $deal['description'] ); ?>
            </p>

            <!-- Key Highlights / Milestones -->
            <?php if ( ! empty( $deal['highlights'] ) ) : ?>
                <ul class="space-y-1.5 mb-5 border-t border-slate-100 pt-3">
                    <?php foreach ( array_slice( $deal['highlights'], 0, 2 ) as $highlight ) : ?>
                        <li class="flex items-start gap-2 text-xs text-slate-600">
                            <span class="text-accent mt-0.5"><?php echo angel_get_svg_icon( 'check', 'w-3.5 h-3.5' ); ?></span>
                            <span class="line-clamp-1"><?php echo esc_html( $highlight ); ?></span>
                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>
        </div>

        <!-- Financial Metrics & Progress -->
        <div class="border-t border-slate-100 pt-4 mt-auto">
            <!-- Progress Bar -->
            <div class="mb-3">
                <div class="flex items-center justify-between text-xs font-semibold text-slate-700 mb-1.5">
                    <span class="text-slate-500"><?php esc_html_e( 'Funding Progress', 'angel-network' ); ?></span>
                    <span class="text-accent"><?php echo esc_html( $percent ); ?>% <?php esc_html_e( 'Committed', 'angel-network' ); ?></span>
                </div>
                <div class="w-full h-2 bg-slate-100 rounded-full overflow-hidden">
                    <div class="h-full bg-accent rounded-full transition-all duration-500" style="width: <?php echo esc_attr( $percent ); ?>%"></div>
                </div>
            </div>

            <!-- Numbers Grid -->
            <div class="grid grid-cols-2 gap-3 py-2 bg-slate-50/80 rounded-lg p-2.5 mb-4 text-center">
                <div>
                    <span class="block text-[11px] text-slate-500 font-medium"><?php esc_html_e( 'Target Capital', 'angel-network' ); ?></span>
                    <span class="text-sm font-heading font-bold text-primary">
                        <?php echo esc_html( angel_format_currency( $deal['total_required'], $deal['currency'], true ) ); ?>
                    </span>
                </div>
                <div class="border-l border-slate-200">
                    <span class="block text-[11px] text-slate-500 font-medium"><?php esc_html_e( 'Min. Check Size', 'angel-network' ); ?></span>
                    <span class="text-sm font-heading font-bold text-slate-800">
                        <?php echo esc_html( angel_format_currency( $deal['minimum_investment'], $deal['currency'] ) ); ?>
                    </span>
                </div>
            </div>

            <!-- Founder Info & View Button -->
            <div class="flex items-center justify-between pt-1">
                <div class="flex items-center gap-2.5">
                    <img 
                        src="<?php echo esc_url( $deal['founder_avatar'] ); ?>" 
                        alt="<?php echo esc_attr( $deal['founder_name'] ); ?>" 
                        class="w-8 h-8 rounded-full object-cover border border-slate-200"
                    >
                    <div class="flex flex-col">
                        <span class="text-xs font-semibold text-slate-800"><?php echo esc_html( $deal['founder_name'] ); ?></span>
                        <span class="text-[10px] text-slate-500"><?php echo esc_html( $deal['founder_role'] ); ?></span>
                    </div>
                </div>

                <a 
                    href="<?php echo esc_url( home_url( '/opportunity/' . $deal['slug'] . '/' ) ); ?>" 
                    class="btn btn-outline-primary btn-sm flex items-center gap-1 group-hover:bg-primary group-hover:text-white"
                >
                    <span><?php esc_html_e( 'View Pitch', 'angel-network' ); ?></span>
                    <?php echo angel_get_svg_icon( 'arrow-right', 'w-3.5 h-3.5' ); ?>
                </a>
            </div>
        </div>
    </div>
</article>
