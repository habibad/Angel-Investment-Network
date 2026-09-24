<?php
/**
 * Article Card Component
 *
 * @param array $article
 * @package InvestmentNetwork
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$article = isset( $args['article'] ) ? $args['article'] : [];

if ( empty( $article ) ) {
    return;
}
?>

<article class="card group flex flex-col overflow-hidden transition-all duration-300 hover:-translate-y-1">
    <div class="relative h-48 overflow-hidden bg-slate-100">
        <img 
            src="<?php echo esc_url( $article['image'] ); ?>" 
            alt="<?php echo esc_attr( $article['title'] ); ?>" 
            loading="lazy"
            class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105"
        >
        <div class="absolute top-3 left-3">
            <span class="badge badge-primary bg-primary/90 text-white font-semibold backdrop-blur-xs">
                <?php echo esc_html( $article['category'] ); ?>
            </span>
        </div>
    </div>

    <div class="p-6 flex-1 flex flex-col justify-between">
        <div>
            <div class="flex items-center gap-2 text-xs text-slate-400 font-medium mb-2">
                <span><?php echo esc_html( $article['date'] ); ?></span>
                <span>•</span>
                <span><?php echo esc_html( $article['read_time'] ); ?></span>
            </div>

            <h3 class="text-base font-heading font-bold text-primary group-hover:text-primary-light transition-colors line-clamp-2 leading-snug mb-2.5">
                <a href="<?php echo esc_url( home_url( '/blog/' . $article['slug'] . '/' ) ); ?>">
                    <?php echo esc_html( $article['title'] ); ?>
                </a>
            </h3>

            <p class="text-xs text-slate-600 line-clamp-3 leading-relaxed mb-4">
                <?php echo esc_html( $article['excerpt'] ); ?>
            </p>
        </div>

        <div class="pt-4 border-t border-slate-100 flex items-center justify-between">
            <span class="text-xs font-semibold text-slate-700"><?php echo esc_html( $article['author_name'] ); ?></span>
            <a href="<?php echo esc_url( home_url( '/blog/' . $article['slug'] . '/' ) ); ?>" class="text-xs font-semibold text-primary group-hover:text-accent flex items-center gap-1">
                <span><?php esc_html_e( 'Read Article', 'angel-network' ); ?></span>
                <?php echo angel_get_svg_icon( 'arrow-right', 'w-3 h-3' ); ?>
            </a>
        </div>
    </div>
</article>
