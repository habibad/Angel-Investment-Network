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

$title           = isset( $args['title'] ) ? $args['title'] : get_the_title();
$subtitle        = isset( $args['subtitle'] ) ? $args['subtitle'] : '';
$badge           = isset( $args['badge'] ) ? $args['badge'] : '';
$bg_image        = isset( $args['bg_image'] ) ? $args['bg_image'] : '';
$breadcrumb_text = isset( $args['breadcrumb_text'] ) ? $args['breadcrumb_text'] : '';

// Contextual background image assignment avoiding crypto charts and generic stock executives
if ( empty( $bg_image ) ) {
    if ( is_page( 'invest' ) ) {
        // International business network and connectivity
        $bg_image = 'https://images.unsplash.com/photo-1526374965328-7f61d4dc18c5?auto=format&fit=crop&w=1600&q=80';
    } elseif ( is_page( 'fundraise' ) ) {
        // Authentic business operations, industry, and enterprise production
        $bg_image = 'https://images.unsplash.com/photo-1581091226825-a6a2a5aee158?auto=format&fit=crop&w=1600&q=80';
    } elseif ( is_page( 'services' ) ) {
        // Structured workflow, evaluation, and professional review
        $bg_image = 'https://images.unsplash.com/photo-1454165804606-c3d57bc86b40?auto=format&fit=crop&w=1600&q=80';
    } elseif ( is_page( 'about-us' ) || is_page( 'about' ) ) {
        // Enterprise collaboration, strategy, and multisector operations
        $bg_image = 'https://images.unsplash.com/photo-1542744173-8e7e53415bb0?auto=format&fit=crop&w=1600&q=80';
    } elseif ( is_page( 'contact' ) ) {
        // International communication, inquiry channels, and global connection
        $bg_image = 'https://images.unsplash.com/photo-1423666639041-f56000c27a9a?auto=format&fit=crop&w=1600&q=80';
    } elseif ( is_home() || is_archive() || is_category() ) {
        // Economic research and market intelligence
        $bg_image = 'https://images.unsplash.com/photo-1451187580459-43490279c0fa?auto=format&fit=crop&w=1600&q=80';
    } elseif ( has_post_thumbnail() ) {
        $bg_image = get_the_post_thumbnail_url( get_the_ID(), 'full' );
    } else {
        // Understated modern architectural perspective
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
                <span class="text-slate-300 truncate max-w-xs">
                    <?php 
                    if ( ! empty( $breadcrumb_text ) ) {
                        echo esc_html( $breadcrumb_text );
                    } elseif ( ! empty( $badge ) ) {
                        echo esc_html( $badge );
                    } else {
                        echo esc_html( $title );
                    }
                    ?>
                </span>
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
