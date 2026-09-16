<?php
/**
 * Single Investor Profile Template
 *
 * @package AngelNetwork
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

get_header();

$inv_id = get_query_var( 'angel_investor' );
$all_investors = angel_get_investors();
$investor = null;

if ( ! empty( $inv_id ) ) {
    foreach ( $all_investors as $i ) {
        if ( (string) $i['id'] === (string) $inv_id || sanitize_title( $i['name'] ) === $inv_id ) {
            $investor = $i;
            break;
        }
    }
}

if ( ! $investor && ! empty( $all_investors ) ) {
    $investor = $all_investors[0];
}
?>

<div class="bg-primary text-white py-12 lg:py-16 border-b border-primary-light">
    <div class="container mx-auto max-w-4xl">
        <nav class="flex items-center gap-2 text-xs text-slate-300 mb-6">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="hover:text-white transition-colors">Home</a>
            <span>/</span>
            <a href="<?php echo esc_url( home_url( '/#investors' ) ); ?>" class="hover:text-white transition-colors">Angel Community</a>
            <span>/</span>
            <span class="text-accent"><?php echo esc_html( $investor['name'] ); ?></span>
        </nav>

        <div class="flex flex-col sm:flex-row items-center sm:items-start gap-6">
            <div class="relative">
                <img 
                    src="<?php echo esc_url( $investor['avatar'] ); ?>" 
                    alt="<?php echo esc_attr( $investor['name'] ); ?>" 
                    class="w-24 h-24 rounded-full object-cover border-4 border-white shadow-xl"
                >
                <span class="absolute bottom-0 right-0 bg-white rounded-full p-1 shadow-sm">
                    <?php echo angel_get_svg_icon( 'verified', 'w-6 h-6 text-accent' ); ?>
                </span>
            </div>

            <div class="text-center sm:text-left">
                <div class="flex flex-wrap items-center justify-center sm:justify-start gap-2 mb-2">
                    <h1 class="text-2xl sm:text-3xl font-heading font-extrabold text-white"><?php echo esc_html( $investor['name'] ); ?></h1>
                    <span class="badge badge-accent font-bold">Verified Accredited Angel</span>
                </div>
                <p class="text-sm text-slate-300 font-medium"><?php echo esc_html( $investor['role_title'] ); ?></p>
                <p class="text-xs text-slate-400 mt-1"><?php echo esc_html( $investor['location'] ); ?>, <?php echo esc_html( $investor['country'] ); ?></p>
            </div>
        </div>
    </div>
</div>

<section class="py-16 bg-slate-50 border-b border-slate-200">
    <div class="container mx-auto max-w-4xl space-y-8">
        <!-- Investment Criteria Matrix -->
        <div class="card p-8 bg-white border border-slate-200">
            <h2 class="text-xl font-heading font-bold text-primary mb-6">Investment Focus & Check Sizes</h2>
            
            <div class="grid sm:grid-cols-2 gap-6 mb-8">
                <div class="p-4 rounded-xl bg-primary-50/60 border border-primary-100">
                    <span class="text-xs font-semibold text-primary-600 uppercase tracking-wider block mb-1">Typical Allocation Range</span>
                    <p class="text-xl font-heading font-extrabold text-primary"><?php echo esc_html( $investor['investment_range'] ); ?></p>
                </div>
                <div class="p-4 rounded-xl bg-slate-50 border border-slate-100">
                    <span class="text-xs font-semibold text-slate-500 uppercase tracking-wider block mb-1">Target Stages</span>
                    <div class="flex gap-2 mt-1">
                        <?php foreach ( $investor['stage_focus'] as $stage ) : ?>
                            <span class="badge badge-accent"><?php echo esc_html( $stage ); ?></span>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>

            <div class="mb-6">
                <span class="text-xs font-semibold text-slate-500 uppercase tracking-wider block mb-2">Sector Thesis & Focus Verticals</span>
                <div class="flex flex-wrap gap-2">
                    <?php foreach ( $investor['industries'] as $ind ) : ?>
                        <span class="badge badge-slate text-xs py-1 px-3"><?php echo esc_html( $ind ); ?></span>
                    <?php endforeach; ?>
                </div>
            </div>

            <div>
                <span class="text-xs font-semibold text-slate-500 uppercase tracking-wider block mb-2">Background & Syndicate Track Record</span>
                <p class="text-sm text-slate-700 leading-relaxed">
                    <?php echo esc_html( $investor['experience'] ); ?>
                </p>
            </div>
        </div>

        <!-- Direct Pitch Action -->
        <div class="card p-8 bg-white border border-slate-200 text-center">
            <h3 class="text-lg font-heading font-bold text-primary mb-2">Do You Match This Investor's Thesis?</h3>
            <p class="text-xs sm:text-sm text-slate-600 mb-6 max-w-md mx-auto">
                Submit your pitch through our verified founder portal to request an introduction and review.
            </p>
            <button 
                type="button" 
                data-open-modal="auth-modal" 
                data-modal-tab="register" 
                data-modal-role="entrepreneur"
                class="btn btn-accent btn-lg font-bold shadow-md"
            >
                Submit Pitch to <?php echo esc_html( $investor['name'] ); ?> →
            </button>
        </div>
    </div>
</section>

<!-- Bottom CTA -->
<?php get_template_part( 'template-parts/sections/cta-banner' ); ?>

<?php
get_footer();
