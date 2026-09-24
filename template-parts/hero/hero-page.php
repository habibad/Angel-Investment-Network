<?php
/**
 * Subpage Hero Banner Component with Meaningful Split-Visual Background
 * Left side: High-contrast brand overlay focusing readable text
 * Right side: Clean, focused contextual photography
 *
 * @param array $args (title, subtitle, badge, bg_image)
 * @package InvestmentNetwork
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$title    = isset( $args['title'] ) ? $args['title'] : get_the_title();
$subtitle = isset( $args['subtitle'] ) ? $args['subtitle'] : '';
$badge    = isset( $args['badge'] ) ? $args['badge'] : '';
$bg_image = isset( $args['bg_image'] ) ? $args['bg_image'] : '';

// Meaningful contextual background image assignment if not explicitly passed
if ( empty( $bg_image ) ) {
    if ( is_page( 'invest' ) ) {
        // High-conviction dealflow & capital allocation desk
        $bg_image = 'https://images.unsplash.com/photo-1590283603385-17ffb3a7f29f?auto=format&fit=crop&w=1600&q=80';
    } elseif ( is_page( 'fundraise' ) ) {
        // Executive tech founder pitching with confidence on the right
        $bg_image = 'https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?auto=format&fit=crop&w=1600&q=80';
    } elseif ( is_page( 'services' ) ) {
        // High-growth venture workshop, diligence & platform mechanics
        $bg_image = 'https://images.unsplash.com/photo-1517245386807-bb43f82c33c4?auto=format&fit=crop&w=1600&q=80';
    } elseif ( is_page( 'about-us' ) || is_page( 'about' ) ) {
        // Syndicate leadership team & investment committee collaboration
        $bg_image = 'https://images.unsplash.com/photo-1522071820081-009f0129c71c?auto=format&fit=crop&w=1600&q=80';
    } elseif ( is_page( 'contact' ) ) {
        // Financial district headquarters & urban syndicate tower
        $bg_image = 'https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?auto=format&fit=crop&w=1600&q=80';
    } elseif ( is_home() || is_archive() || is_category() ) {
        // Venture research, data analytics & market intelligence
        $bg_image = 'https://images.unsplash.com/photo-1451187580459-43490279c0fa?auto=format&fit=crop&w=1600&q=80';
    } elseif ( has_post_thumbnail() ) {
        $bg_image = get_the_post_thumbnail_url( get_the_ID(), 'full' );
    } else {
        // Institutional architectural perspective
        $bg_image = 'https://images.unsplash.com/photo-1497366216548-37526070297c?auto=format&fit=crop&w=1600&q=80';
    }
}
?>

<section class="relative bg-slate-950 text-white py-16 sm:py-20 lg:py-24 overflow-hidden">
    <!-- Contextual Background Image & Split Contrast Overlay -->
    <div class="absolute inset-0 -z-0">
        <img 
            src="<?php echo esc_url( $bg_image ); ?>" 
            alt="<?php echo esc_attr( $title ); ?>" 
            class="w-full h-full object-cover object-right transform scale-100"
            loading="eager"
        >
        <!-- Dark Color Overlay: Heavy on the Left to focus the text, Fading to transparent/subtle on the Right to focus the image -->
        <div class="absolute inset-0 bg-slate-950/40"></div>
        <div class="absolute inset-0 bg-gradient-to-r from-slate-950 via-slate-950/95 via-45% to-slate-950/20 sm:to-transparent"></div>
        <div class="absolute inset-0 bg-gradient-to-t from-slate-950 via-transparent to-slate-950/60 lg:hidden"></div>

        <!-- Ambient Brand Light Accent -->
        <div class="absolute -left-20 top-1/2 -translate-y-1/2 w-96 h-96 bg-primary-light/30 rounded-full blur-3xl pointer-events-none"></div>
    </div>

    <div class="container mx-auto relative z-10">
        <div class="max-w-2xl lg:max-w-3xl text-left flex flex-col items-start">
            <!-- Breadcrumb Navigation -->
            <nav class="flex items-center gap-2 text-xs font-semibold text-slate-400 mb-4 tracking-wide uppercase" aria-label="<?php esc_attr_e( 'Breadcrumb', 'angel-network' ); ?>">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="hover:text-accent transition-colors flex items-center gap-1.5">
                    <?php echo angel_get_svg_icon( 'home', 'w-3.5 h-3.5 text-slate-400 hover:text-accent' ); ?>
                    <span><?php esc_html_e( 'Home', 'angel-network' ); ?></span>
                </a>
                <span class="text-slate-600">/</span>
                <span class="text-slate-300 truncate max-w-xs"><?php echo esc_html( ! empty( $badge ) ? $badge : $title ); ?></span>
            </nav>

            <!-- Pill Badge -->
            <?php if ( ! empty( $badge ) ) : ?>
                <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-slate-900/90 backdrop-blur-md border border-accent/40 text-xs font-heading font-bold tracking-wider text-accent uppercase mb-4 shadow-sm">
                    <span class="w-1.5 h-1.5 rounded-full bg-accent animate-pulse"></span>
                    <span><?php echo esc_html( $badge ); ?></span>
                </div>
            <?php endif; ?>

            <!-- Headline -->
            <h1 class="text-3xl sm:text-4xl lg:text-5xl font-heading font-extrabold text-white tracking-tight leading-[1.15] mb-5">
                <?php echo esc_html( $title ); ?>
            </h1>

            <!-- Subtitle -->
            <?php if ( ! empty( $subtitle ) ) : ?>
                <p class="text-base sm:text-lg text-slate-300 leading-relaxed max-w-2xl">
                    <?php echo esc_html( $subtitle ); ?>
                </p>
            <?php endif; ?>
        </div>
    </div>
</section>
