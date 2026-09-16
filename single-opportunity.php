<?php
/**
 * Single Opportunity / Pitch Detail Template
 *
 * @package AngelNetwork
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

get_header();

// Retrieve deal data from query var or route
$slug = get_query_var( 'angel_opportunity' );
$all_deals = angel_get_opportunities();
$deal = null;

if ( ! empty( $slug ) ) {
    foreach ( $all_deals as $d ) {
        if ( $d['slug'] === $slug ) {
            $deal = $d;
            break;
        }
    }
}

// Fallback to first deal if not matched
if ( ! $deal && ! empty( $all_deals ) ) {
    $deal = $all_deals[0];
}

$percent = angel_calc_percentage( $deal['amount_raised'], $deal['total_required'] );
$badge_class = angel_get_stage_badge_class( $deal['stage'] );
?>

<!-- Opportunity Breadcrumb & Sub-Hero -->
<div class="bg-primary text-white py-12 lg:py-16 relative overflow-hidden">
    <div class="container mx-auto">
        <!-- Breadcrumb -->
        <nav class="flex items-center gap-2 text-xs text-slate-300 mb-6">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="hover:text-white transition-colors">Home</a>
            <span>/</span>
            <a href="<?php echo esc_url( home_url( '/invest/' ) ); ?>" class="hover:text-white transition-colors">Opportunities</a>
            <span>/</span>
            <span class="text-accent"><?php echo esc_html( $deal['title'] ); ?></span>
        </nav>

        <div class="flex flex-col lg:flex-row lg:items-center justify-between gap-6">
            <div>
                <div class="flex flex-wrap items-center gap-2 mb-3">
                    <span class="badge <?php echo esc_attr( $badge_class ); ?> font-bold">
                        <?php echo esc_html( $deal['stage'] ); ?>
                    </span>
                    <span class="badge badge-slate bg-white/15 text-white border-white/20">
                        <?php echo esc_html( $deal['industry'] ); ?>
                    </span>
                    <span class="text-xs text-slate-300 flex items-center gap-1 ml-2">
                        <?php echo angel_get_svg_icon( 'location', 'w-3.5 h-3.5 text-accent' ); ?>
                        <?php echo esc_html( $deal['location'] ); ?>, <?php echo esc_html( $deal['country'] ); ?>
                    </span>
                </div>

                <h1 class="text-2xl sm:text-3xl lg:text-4xl font-heading font-extrabold text-white tracking-tight mb-2">
                    <?php echo esc_html( $deal['title'] ); ?>
                </h1>
                <p class="text-sm font-medium text-slate-300">
                    <?php echo esc_html( $deal['company_name'] ); ?>
                </p>
            </div>

            <!-- Quick Action -->
            <div class="flex items-center gap-3">
                <button 
                    type="button" 
                    data-open-modal="auth-modal" 
                    data-modal-tab="register" 
                    data-modal-role="investor"
                    class="btn btn-accent btn-lg font-bold shadow-lg"
                >
                    <?php esc_html_e( 'Request Data Room Access →', 'angel-network' ); ?>
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Main Pitch Detail Body -->
<section class="py-16 bg-slate-50">
    <div class="container mx-auto">
        <div class="grid lg:grid-cols-12 gap-10">
            <!-- Left Column: Details, Highlights & Financial Narrative (8 cols) -->
            <div class="lg:col-span-8 space-y-8">
                <!-- Featured Cover Image -->
                <div class="rounded-2xl overflow-hidden shadow-md bg-white border border-slate-200 aspect-16/9">
                    <img 
                        src="<?php echo esc_url( $deal['image'] ); ?>" 
                        alt="<?php echo esc_attr( $deal['title'] ); ?>" 
                        class="w-full h-full object-cover"
                    >
                </div>

                <!-- Executive Summary -->
                <div class="card p-8 bg-white border border-slate-200">
                    <h2 class="text-xl font-heading font-bold text-primary mb-4 flex items-center gap-2">
                        <span>Executive Summary</span>
                    </h2>
                    <p class="text-sm sm:text-base text-slate-700 leading-relaxed mb-6">
                        <?php echo esc_html( $deal['description'] ); ?>
                    </p>
                    <p class="text-sm text-slate-600 leading-relaxed">
                        The company has engineered a proprietary competitive moat backed by defensible intellectual property and strategic pilot engagements. With an expanding customer pipeline and verified unit economics, capital deployed in this round directly accelerates manufacturing scale and North American commercial distribution.
                    </p>
                </div>

                <!-- Key Traction Milestones -->
                <div class="card p-8 bg-white border border-slate-200">
                    <h2 class="text-xl font-heading font-bold text-primary mb-4">
                        Investment Highlights & Milestones
                    </h2>
                    <div class="grid sm:grid-cols-2 gap-4">
                        <?php foreach ( $deal['highlights'] as $highlight ) : ?>
                            <div class="flex items-start gap-3 p-4 rounded-xl bg-slate-50 border border-slate-100">
                                <span class="text-accent mt-0.5 shrink-0"><?php echo angel_get_svg_icon( 'check', 'w-5 h-5' ); ?></span>
                                <span class="text-xs sm:text-sm text-slate-700 font-medium leading-snug"><?php echo esc_html( $highlight ); ?></span>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>

                <!-- Deal Structure & Terms -->
                <div class="card p-8 bg-white border border-slate-200">
                    <h2 class="text-xl font-heading font-bold text-primary mb-4">
                        Deal Terms & Security Offering
                    </h2>
                    <div class="grid sm:grid-cols-3 gap-4 text-center">
                        <div class="p-4 rounded-xl bg-slate-50 border border-slate-100">
                            <span class="block text-xs text-slate-400 font-medium">Financing Instrument</span>
                            <span class="text-sm font-heading font-bold text-primary mt-1 block"><?php echo esc_html( $deal['funding_type'] ); ?></span>
                        </div>
                        <div class="p-4 rounded-xl bg-slate-50 border border-slate-100">
                            <span class="block text-xs text-slate-400 font-medium">Securities Exemption</span>
                            <span class="text-sm font-heading font-bold text-primary mt-1 block">NI 45-106 Accredited</span>
                        </div>
                        <div class="p-4 rounded-xl bg-slate-50 border border-slate-100">
                            <span class="block text-xs text-slate-400 font-medium">Target Close Window</span>
                            <span class="text-sm font-heading font-bold text-primary mt-1 block">45 Days</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Column: Investment Box & Founder Credentials (4 cols) -->
            <div class="lg:col-span-4 space-y-6">
                <!-- Sticky Investment Commitment Card -->
                <div class="card p-6 bg-white border border-slate-200 shadow-md sticky top-24">
                    <div class="flex items-center justify-between pb-4 border-b border-slate-100 mb-4">
                        <span class="text-xs font-semibold text-slate-500 uppercase tracking-wider">Round Status</span>
                        <span class="badge badge-accent font-bold">Actively Syndicating</span>
                    </div>

                    <!-- Progress Bar -->
                    <div class="mb-5">
                        <div class="flex items-center justify-between text-xs font-semibold text-slate-700 mb-1.5">
                            <span class="text-slate-500">Committed</span>
                            <span class="text-accent font-bold"><?php echo esc_html( $percent ); ?>% of Goal</span>
                        </div>
                        <div class="w-full h-3 bg-slate-100 rounded-full overflow-hidden">
                            <div class="h-full bg-accent rounded-full" style="width: <?php echo esc_attr( $percent ); ?>%"></div>
                        </div>
                    </div>

                    <!-- Financial Matrix -->
                    <div class="space-y-3 mb-6 bg-slate-50 p-4 rounded-xl border border-slate-100">
                        <div class="flex items-center justify-between text-xs">
                            <span class="text-slate-500">Target Capital Ask:</span>
                            <span class="font-heading font-bold text-primary text-sm">
                                <?php echo esc_html( angel_format_currency( $deal['total_required'], $deal['currency'] ) ); ?>
                            </span>
                        </div>
                        <div class="flex items-center justify-between text-xs">
                            <span class="text-slate-500">Capital Raised:</span>
                            <span class="font-heading font-bold text-slate-800 text-sm">
                                <?php echo esc_html( angel_format_currency( $deal['amount_raised'], $deal['currency'] ) ); ?>
                            </span>
                        </div>
                        <div class="flex items-center justify-between text-xs pt-2 border-t border-slate-200">
                            <span class="text-slate-500 font-semibold">Min. Check Size:</span>
                            <span class="font-heading font-extrabold text-accent text-sm">
                                <?php echo esc_html( angel_format_currency( $deal['minimum_investment'], $deal['currency'] ) ); ?>
                            </span>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="space-y-3">
                        <button 
                            type="button" 
                            data-open-modal="auth-modal" 
                            data-modal-tab="register" 
                            data-modal-role="investor"
                            class="btn btn-accent btn-lg w-full font-bold shadow-md"
                        >
                            Request Due Diligence Deck
                        </button>
                        <button 
                            type="button" 
                            data-open-modal="auth-modal" 
                            data-modal-tab="register" 
                            data-modal-role="investor"
                            class="btn btn-outline-primary w-full"
                        >
                            Express Angel Interest
                        </button>
                    </div>

                    <!-- Regulatory Notice -->
                    <p class="text-[11px] text-slate-400 leading-relaxed mt-4 text-center">
                        Financial statements and full cap table accessible to certified accredited investors following NDA acknowledgment.
                    </p>
                </div>

                <!-- Founder Profile Box -->
                <div class="card p-6 bg-white border border-slate-200">
                    <h3 class="text-xs font-semibold text-slate-400 uppercase tracking-wider mb-4">Leadership & Founder</h3>
                    <div class="flex items-center gap-3 mb-3">
                        <img 
                            src="<?php echo esc_url( $deal['founder_avatar'] ); ?>" 
                            alt="<?php echo esc_attr( $deal['founder_name'] ); ?>" 
                            class="w-12 h-12 rounded-full object-cover border border-slate-200"
                        >
                        <div>
                            <h4 class="text-sm font-heading font-bold text-primary"><?php echo esc_html( $deal['founder_name'] ); ?></h4>
                            <p class="text-xs text-slate-500"><?php echo esc_html( $deal['founder_role'] ); ?></p>
                        </div>
                    </div>
                    <p class="text-xs text-slate-600 leading-relaxed">
                        Experienced technologist and serial entrepreneur with deep technical domain expertise and executive leadership across commercial manufacturing.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Bottom CTA -->
<?php get_template_part( 'template-parts/sections/cta-banner' ); ?>

<?php
get_footer();
