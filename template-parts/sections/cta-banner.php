<?php
/**
 * Bottom Conversion CTA Banner Component
 *
 * @package InvestmentNetwork
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$region_label = get_theme_mod( 'angel_region_label', 'Cuba' );
$is_logged_in = is_user_logged_in();
$current_user = $is_logged_in ? wp_get_current_user() : null;
$roles        = $is_logged_in ? (array) $current_user->roles : [];
$is_investor  = in_array( 'cin_investor', $roles, true ) || ( class_exists( '\CubaInvestment\Core\Common\Constants' ) && in_array( \CubaInvestment\Core\Common\Constants::ROLE_INVESTOR, $roles, true ) );
$is_business  = in_array( 'cin_business_owner', $roles, true ) || ( class_exists( '\CubaInvestment\Core\Common\Constants' ) && in_array( \CubaInvestment\Core\Common\Constants::ROLE_BUSINESS_OWNER, $roles, true ) );

$dashboard_url = home_url( '/dashboard/' );
if ( $is_logged_in && class_exists( '\CubaInvestment\Core\Auth\AuthManager' ) ) {
    $dashboard_url = \CubaInvestment\Core\Auth\AuthManager::get_user_dashboard_url( $current_user );
}
?>

<section class="py-20 lg:py-24 bg-gradient-to-br from-primary-900 via-primary to-primary-950 text-white relative overflow-hidden">
    <!-- Subtle geometric background lines -->
    <div class="absolute -right-20 -bottom-20 w-96 h-96 bg-accent/20 rounded-full blur-3xl pointer-events-none"></div>
    <div class="absolute -left-20 -top-20 w-96 h-96 bg-primary-light/40 rounded-full blur-3xl pointer-events-none"></div>

    <div class="container mx-auto relative z-10 text-center max-w-3xl reveal-scale">
        <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-white/10 border border-white/20 text-xs font-heading font-semibold tracking-wider text-accent uppercase mb-6">
            <span><?php esc_html_e( 'Cuba Investment Network', 'angel-network' ); ?></span>
        </div>

        <h2 class="text-3xl sm:text-4xl lg:text-5xl font-heading font-extrabold text-white tracking-tight leading-tight mb-6">
            <?php esc_html_e( 'Connect with Cuba’s Next Generation of Businesses', 'angel-network' ); ?>
        </h2>

        <p class="text-base sm:text-lg text-slate-300 leading-relaxed mb-10 max-w-2xl mx-auto">
            <?php esc_html_e( 'Join a growing network of investors and business owners exploring opportunities across Cuba’s emerging private sector.', 'angel-network' ); ?>
        </p>

        <!-- Dual CTA Buttons -->
        <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
            <?php if ( $is_logged_in ) : ?>
                <?php if ( $is_investor ) : ?>
                    <a 
                        href="<?php echo esc_url( $dashboard_url ); ?>" 
                        class="btn btn-primary btn-lg w-full sm:w-auto bg-white text-primary hover:bg-slate-100 shadow-lg font-bold"
                    >
                        <?php esc_html_e( 'Go to Investor Dashboard →', 'angel-network' ); ?>
                    </a>
                    <a 
                        href="<?php echo esc_url( home_url( '/invest/' ) ); ?>" 
                        class="btn btn-accent btn-lg w-full sm:w-auto font-bold shadow-lg"
                    >
                        <?php esc_html_e( 'Explore Opportunities →', 'angel-network' ); ?>
                    </a>
                <?php elseif ( $is_business ) : ?>
                    <a 
                        href="<?php echo esc_url( $dashboard_url ); ?>" 
                        class="btn btn-primary btn-lg w-full sm:w-auto bg-white text-primary hover:bg-slate-100 shadow-lg font-bold"
                    >
                        <?php esc_html_e( 'Go to Business Dashboard →', 'angel-network' ); ?>
                    </a>
                    <a 
                        href="<?php echo esc_url( home_url( '/business-owner/business-profile/' ) ); ?>" 
                        class="btn btn-accent btn-lg w-full sm:w-auto font-bold shadow-lg"
                    >
                        <?php esc_html_e( 'Manage Business Profile →', 'angel-network' ); ?>
                    </a>
                <?php else : ?>
                    <a 
                        href="<?php echo esc_url( $dashboard_url ); ?>" 
                        class="btn btn-primary btn-lg w-full sm:w-auto bg-white text-primary hover:bg-slate-100 shadow-lg font-bold"
                    >
                        <?php esc_html_e( 'Access Portal Dashboard →', 'angel-network' ); ?>
                    </a>
                    <a 
                        href="<?php echo esc_url( home_url( '/invest/' ) ); ?>" 
                        class="btn btn-accent btn-lg w-full sm:w-auto font-bold shadow-lg"
                    >
                        <?php esc_html_e( 'Explore Opportunities →', 'angel-network' ); ?>
                    </a>
                <?php endif; ?>
            <?php else : ?>
                <a 
                    href="<?php echo esc_url( home_url( '/invest/#eligibility' ) ); ?>" 
                    data-open-modal="auth-modal" 
                    data-modal-tab="register" 
                    data-modal-role="investor"
                    class="btn btn-primary btn-lg w-full sm:w-auto bg-white text-primary hover:bg-slate-100 shadow-lg font-bold"
                >
                    <?php esc_html_e( 'Join as an Investor', 'angel-network' ); ?>
                </a>

                <a 
                    href="<?php echo esc_url( home_url( '/fundraise/' ) ); ?>" 
                    data-open-modal="auth-modal" 
                    data-modal-tab="register" 
                    data-modal-role="entrepreneur"
                    class="btn btn-accent btn-lg w-full sm:w-auto font-bold shadow-lg"
                >
                    <?php esc_html_e( 'Join as a Business', 'angel-network' ); ?>
                </a>
            <?php endif; ?>
        </div>

        <?php if ( $is_logged_in ) : ?>
            <p class="text-xs text-slate-300 mt-6">
                <?php echo esc_html( sprintf( __( 'You are currently signed in as %s.', 'angel-network' ), $current_user->display_name ) ); ?>
            </p>
        <?php else : ?>
            <p class="text-xs text-slate-400 mt-6">
                <?php esc_html_e( 'Registration is free. Business opportunities are reviewed before publication.', 'angel-network' ); ?>
            </p>
        <?php endif; ?>
    </div>
</section>
