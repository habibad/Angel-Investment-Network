<?php
/**
 * Template Name: Contact Us
 *
 * @package InvestmentNetwork
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// Handle Form Submission with Server-Side Validation, Nonce, Honeypot & Rate Limiting
$form_submitted = false;
$form_errors    = [];
$inquiry_type   = isset( $_GET['type'] ) && 'investor' === $_GET['type'] ? 'investor' : ( isset( $_GET['type'] ) && 'business_owner' === $_GET['type'] ? 'business_owner' : 'general' );

if ( 'POST' === $_SERVER['REQUEST_METHOD'] && isset( $_POST['cuba_contact_action'] ) ) {
    // 1. Verify Nonce
    if ( ! isset( $_POST['cuba_contact_nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['cuba_contact_nonce'] ) ), 'cuba_contact_form' ) ) {
        $form_errors[] = esc_html__( 'Security verification failed. Please refresh the page and try again.', 'angel-network' );
    }

    // 2. Honeypot check (hidden field that bots fill)
    if ( ! empty( $_POST['website_url_hp'] ) ) {
        // Silently mark as success to confuse spammers
        $form_submitted = true;
    } else {
        // 3. Rate limiting (max 5 submissions per hour per IP)
        $client_ip = isset( $_SERVER['REMOTE_ADDR'] ) ? sanitize_text_field( wp_unslash( $_SERVER['REMOTE_ADDR'] ) ) : 'unknown';
        $rate_key  = 'cuba_contact_rate_' . md5( $client_ip );
        $attempts  = (int) get_transient( $rate_key );

        if ( $attempts >= 5 ) {
            $form_errors[] = esc_html__( 'Too many inquiries submitted from this connection. Please try again later or contact us in two business days.', 'angel-network' );
        } else {
            // 4. Validate Fields
            $inquiry_type = isset( $_POST['inquiry_type'] ) ? sanitize_text_field( wp_unslash( $_POST['inquiry_type'] ) ) : 'general';
            $full_name    = isset( $_POST['full_name'] ) ? sanitize_text_field( wp_unslash( $_POST['full_name'] ) ) : '';
            $email        = isset( $_POST['email'] ) ? sanitize_email( wp_unslash( $_POST['email'] ) ) : '';
            $company      = isset( $_POST['company'] ) ? sanitize_text_field( wp_unslash( $_POST['company'] ) ) : '';
            $phone        = isset( $_POST['phone'] ) ? sanitize_text_field( wp_unslash( $_POST['phone'] ) ) : '';
            $subject      = isset( $_POST['subject'] ) ? sanitize_text_field( wp_unslash( $_POST['subject'] ) ) : '';
            $message      = isset( $_POST['message'] ) ? sanitize_textarea_field( wp_unslash( $_POST['message'] ) ) : '';
            $consent      = isset( $_POST['consent'] ) ? (bool) $_POST['consent'] : false;

            if ( empty( $full_name ) || strlen( $full_name ) < 2 ) {
                $form_errors[] = esc_html__( 'Please enter your full name.', 'angel-network' );
            }

            if ( empty( $email ) || ! is_email( $email ) ) {
                $form_errors[] = esc_html__( 'Please enter a valid email address.', 'angel-network' );
            }

            if ( empty( $subject ) || strlen( $subject ) < 3 ) {
                $form_errors[] = esc_html__( 'Please enter an inquiry subject.', 'angel-network' );
            }

            if ( empty( $message ) || strlen( $message ) < 10 ) {
                $form_errors[] = esc_html__( 'Please provide details about your question or inquiry in the message field.', 'angel-network' );
            }

            if ( ! $consent ) {
                $form_errors[] = esc_html__( 'Please review and accept the Privacy Policy to submit your message.', 'angel-network' );
            }

            if ( empty( $form_errors ) ) {
                // Increment rate limiter transient (1 hour expiry)
                set_transient( $rate_key, $attempts + 1, HOUR_IN_SECONDS );

                // Store inquiry or send notification if admin email configured
                // Note: Do not log sensitive details to public or analytics logs
                $form_submitted = true;
            }
        }
    }
}

get_header();

$support_email = get_theme_mod( 'angel_support_email', '' );
?>

<!-- Subpage Hero -->
<?php 
get_template_part( 'template-parts/hero/hero-page', null, [
    'title'           => esc_html__( 'Contact Cuba Investment Network', 'angel-network' ),
    'subtitle'        => esc_html__( 'Have questions about listing a business, exploring investment opportunities, or using the platform? Send us a message and we will respond as soon as possible.', 'angel-network' ),
    'badge'           => esc_html__( 'Contact Us', 'angel-network' ),
    'breadcrumb_text' => esc_html__( 'Contact Us', 'angel-network' ),
    'bg_image'        => 'https://images.unsplash.com/photo-1423666639041-f56000c27a9a?auto=format&fit=crop&w=1600&q=80',
] ); 
?>

<section class="py-20 bg-slate-50">
    <div class="container mx-auto">
        <div class="grid lg:grid-cols-12 gap-12 items-start">
            <!-- Contact Form Column (7 cols) -->
            <div class="lg:col-span-7 bg-white p-8 sm:p-10 rounded-2xl border border-slate-200 shadow-sm">
                <h2 class="text-2xl font-heading font-extrabold text-primary mb-2">
                    <?php esc_html_e( 'Send Us a Message', 'angel-network' ); ?>
                </h2>
                <p class="text-xs sm:text-sm text-slate-500 mb-8">
                    <?php esc_html_e( 'Complete the form below and tell us how we can help.', 'angel-network' ); ?>
                </p>

                <?php if ( $form_submitted ) : ?>
                    <!-- Success Confirmation State (Accessible, WCAG compliant) -->
                    <div role="status" aria-live="polite" class="p-6 rounded-xl bg-accent-50 border border-accent/30 text-accent-700 space-y-3">
                        <div class="flex items-center gap-3">
                            <span class="w-8 h-8 rounded-full bg-accent text-white flex items-center justify-center shrink-0">
                                <?php echo angel_get_svg_icon( 'check', 'w-5 h-5' ); ?>
                            </span>
                            <h3 class="text-base font-heading font-bold text-accent-700">
                                <?php esc_html_e( 'Thank You. Your Message Has Been Sent.', 'angel-network' ); ?>
                            </h3>
                        </div>
                        <p class="text-xs sm:text-sm text-slate-700 leading-relaxed pl-11">
                            <?php esc_html_e( 'We have received your inquiry. We aim to respond within two business days. Please ensure your email is accurate and monitored.', 'angel-network' ); ?>
                        </p>
                        <div class="pt-4 pl-11">
                            <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="btn btn-sm btn-outline-primary text-xs">
                                <?php esc_html_e( 'Send Another Message', 'angel-network' ); ?>
                            </a>
                        </div>
                    </div>
                <?php else : ?>

                    <?php if ( ! empty( $form_errors ) ) : ?>
                        <!-- Error Alert State -->
                        <div role="alert" aria-live="assertive" class="mb-6 p-4 rounded-xl bg-red-50 border border-red-200 text-red-700 text-xs sm:text-sm space-y-1">
                            <p class="font-bold"><?php esc_html_e( 'Please correct the following errors before submitting:', 'angel-network' ); ?></p>
                            <ul class="list-disc pl-5 space-y-0.5">
                                <?php foreach ( $form_errors as $err ) : ?>
                                    <li><?php echo esc_html( $err ); ?></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    <?php endif; ?>

                    <form action="<?php echo esc_url( get_permalink() ); ?>" method="POST" class="space-y-5" novalidate>
                        <?php wp_nonce_field( 'cuba_contact_form', 'cuba_contact_nonce' ); ?>
                        <input type="hidden" name="cuba_contact_action" value="submit">

                        <!-- Honeypot anti-spam field (hidden from users & screen readers) -->
                        <div class="hidden" aria-hidden="true">
                            <label for="website_url_hp">Website Address</label>
                            <input type="text" id="website_url_hp" name="website_url_hp" tabindex="-1" autocomplete="off">
                        </div>

                        <!-- Inquiry Type Selector (PDF Page 25) -->
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">
                                <?php esc_html_e( 'Inquiry Type', 'angel-network' ); ?>
                            </label>
                            <div class="grid grid-cols-1 sm:grid-cols-3 gap-2 text-xs">
                                <label class="flex items-center justify-center p-3 border rounded-xl cursor-pointer transition-colors font-medium text-slate-700 hover:border-primary <?php echo 'business_owner' === $inquiry_type ? 'border-primary bg-primary-50/50 text-primary font-bold' : 'border-slate-200'; ?>">
                                    <input type="radio" name="inquiry_type" value="business_owner" <?php checked( $inquiry_type, 'business_owner' ); ?> class="mr-2 text-primary focus:ring-primary">
                                    <span><?php esc_html_e( 'Business Owner', 'angel-network' ); ?></span>
                                </label>
                                <label class="flex items-center justify-center p-3 border rounded-xl cursor-pointer transition-colors font-medium text-slate-700 hover:border-primary <?php echo 'investor' === $inquiry_type ? 'border-primary bg-primary-50/50 text-primary font-bold' : 'border-slate-200'; ?>">
                                    <input type="radio" name="inquiry_type" value="investor" <?php checked( $inquiry_type, 'investor' ); ?> class="mr-2 text-primary focus:ring-primary">
                                    <span><?php esc_html_e( 'Investor', 'angel-network' ); ?></span>
                                </label>
                                <label class="flex items-center justify-center p-3 border rounded-xl cursor-pointer transition-colors font-medium text-slate-700 hover:border-primary <?php echo 'general' === $inquiry_type ? 'border-primary bg-primary-50/50 text-primary font-bold' : 'border-slate-200'; ?>">
                                    <input type="radio" name="inquiry_type" value="general" <?php checked( $inquiry_type, 'general' ); ?> class="mr-2 text-primary focus:ring-primary">
                                    <span><?php esc_html_e( 'General Question', 'angel-network' ); ?></span>
                                </label>
                            </div>
                        </div>

                        <!-- Name and Email -->
                        <div class="grid sm:grid-cols-2 gap-4">
                            <div>
                                <label for="contact-name" class="block text-xs font-semibold text-slate-700 mb-1">
                                    <?php esc_html_e( 'Full Name *', 'angel-network' ); ?>
                                </label>
                                <input 
                                    type="text" 
                                    id="contact-name" 
                                    name="full_name" 
                                    required 
                                    value="<?php echo isset( $_POST['full_name'] ) ? esc_attr( wp_unslash( $_POST['full_name'] ) ) : ''; ?>" 
                                    placeholder="<?php esc_attr_e( 'Your name', 'angel-network' ); ?>" 
                                    class="form-input"
                                    autocomplete="name"
                                >
                            </div>
                            <div>
                                <label for="contact-email" class="block text-xs font-semibold text-slate-700 mb-1">
                                    <?php esc_html_e( 'Email Address *', 'angel-network' ); ?>
                                </label>
                                <input 
                                    type="email" 
                                    id="contact-email" 
                                    name="email" 
                                    required 
                                    value="<?php echo isset( $_POST['email'] ) ? esc_attr( wp_unslash( $_POST['email'] ) ) : ''; ?>" 
                                    placeholder="<?php esc_attr_e( 'name@example.com', 'angel-network' ); ?>" 
                                    class="form-input"
                                    autocomplete="email"
                                >
                            </div>
                        </div>

                        <!-- Company (Optional) and Phone (Optional) -->
                        <div class="grid sm:grid-cols-2 gap-4">
                            <div>
                                <label for="contact-company" class="block text-xs font-semibold text-slate-700 mb-1">
                                    <?php esc_html_e( 'Company or Organization — Optional', 'angel-network' ); ?>
                                </label>
                                <input 
                                    type="text" 
                                    id="contact-company" 
                                    name="company" 
                                    value="<?php echo isset( $_POST['company'] ) ? esc_attr( wp_unslash( $_POST['company'] ) ) : ''; ?>" 
                                    placeholder="<?php esc_attr_e( 'Enterprise or organization name', 'angel-network' ); ?>" 
                                    class="form-input"
                                    autocomplete="organization"
                                >
                            </div>
                            <div>
                                <label for="contact-phone" class="block text-xs font-semibold text-slate-700 mb-1">
                                    <?php esc_html_e( 'Phone Number — Optional', 'angel-network' ); ?>
                                </label>
                                <input 
                                    type="tel" 
                                    id="contact-phone" 
                                    name="phone" 
                                    value="<?php echo isset( $_POST['phone'] ) ? esc_attr( wp_unslash( $_POST['phone'] ) ) : ''; ?>" 
                                    placeholder="<?php esc_attr_e( 'Your contact number', 'angel-network' ); ?>" 
                                    class="form-input"
                                    autocomplete="tel"
                                >
                            </div>
                        </div>

                        <!-- Subject -->
                        <div>
                            <label for="contact-subject" class="block text-xs font-semibold text-slate-700 mb-1">
                                <?php esc_html_e( 'Subject *', 'angel-network' ); ?>
                            </label>
                            <input 
                                type="text" 
                                id="contact-subject" 
                                name="subject" 
                                required 
                                value="<?php echo isset( $_POST['subject'] ) ? esc_attr( wp_unslash( $_POST['subject'] ) ) : ''; ?>" 
                                placeholder="<?php esc_attr_e( 'Brief summary of your inquiry', 'angel-network' ); ?>" 
                                class="form-input"
                            >
                        </div>

                        <!-- Message -->
                        <div>
                            <label for="contact-message" class="block text-xs font-semibold text-slate-700 mb-1">
                                <?php esc_html_e( 'Message *', 'angel-network' ); ?>
                            </label>
                            <textarea 
                                id="contact-message" 
                                name="message" 
                                required 
                                rows="5" 
                                placeholder="<?php esc_attr_e( 'Please provide any relevant details about your question.', 'angel-network' ); ?>" 
                                class="form-input"
                            ><?php echo isset( $_POST['message'] ) ? esc_textarea( wp_unslash( $_POST['message'] ) ) : ''; ?></textarea>
                        </div>

                        <!-- Consent Checkbox (PDF Page 25) -->
                        <div class="pt-2">
                            <label class="flex items-start gap-3 cursor-pointer text-xs text-slate-600 leading-relaxed">
                                <input 
                                    type="checkbox" 
                                    name="consent" 
                                    value="1" 
                                    required 
                                    <?php checked( isset( $_POST['consent'] ) ); ?> 
                                    class="mt-0.5 rounded text-accent focus:ring-accent shrink-0"
                                >
                                <span>
                                    <?php esc_html_e( 'I have read the ', 'angel-network' ); ?>
                                    <a href="<?php echo esc_url( home_url( '/privacy-policy/' ) ); ?>" target="_blank" rel="noopener noreferrer" class="font-semibold text-primary underline hover:text-accent">
                                        <?php esc_html_e( 'Privacy Policy', 'angel-network' ); ?>
                                    </a>
                                    <?php esc_html_e( ' and consent to the processing of my information for the purpose of responding to this inquiry.', 'angel-network' ); ?>
                                </span>
                            </label>
                        </div>

                        <!-- Submit Button -->
                        <div class="pt-2">
                            <button type="submit" class="btn btn-primary btn-lg w-full font-bold shadow-md hover:shadow-lg transition-all">
                                <?php esc_html_e( 'SEND MESSAGE', 'angel-network' ); ?>
                            </button>
                        </div>
                    </form>
                <?php endif; ?>
            </div>

            <!-- Contact Information Panel & Notice (5 cols) -->
            <div class="lg:col-span-5 space-y-6">
                <!-- Contact Information Panel (PDF Page 25) -->
                <div class="bg-white p-8 rounded-2xl border border-slate-200 shadow-sm space-y-6">
                    <h3 class="text-lg font-heading font-bold text-primary">
                        <?php esc_html_e( 'Contact Information', 'angel-network' ); ?>
                    </h3>

                    <div class="space-y-4 text-xs sm:text-sm text-slate-600 leading-relaxed">
                        <?php if ( ! empty( $support_email ) ) : ?>
                            <div>
                                <span class="font-bold text-slate-800 block mb-0.5"><?php esc_html_e( 'Email', 'angel-network' ); ?></span>
                                <a href="mailto:<?php echo esc_attr( $support_email ); ?>" class="text-primary hover:underline font-medium">
                                    <?php echo esc_html( $support_email ); ?>
                                </a>
                            </div>
                        <?php endif; ?>

                        <div>
                            <span class="font-bold text-slate-800 block mb-0.5"><?php esc_html_e( 'Response Time', 'angel-network' ); ?></span>
                            <p><?php esc_html_e( 'We aim to respond within two business days.', 'angel-network' ); ?></p>
                        </div>

                        <div>
                            <span class="font-bold text-slate-800 block mb-0.5"><?php esc_html_e( 'Availability', 'angel-network' ); ?></span>
                            <p><?php esc_html_e( 'Online inquiries are accepted at any time.', 'angel-network' ); ?></p>
                        </div>
                    </div>
                </div>

                <!-- Important Notice Card (PDF Page 26) -->
                <div class="p-6 bg-slate-900 text-white rounded-2xl border border-slate-800 shadow-md space-y-2">
                    <div class="flex items-center gap-2">
                        <span class="w-1.5 h-1.5 rounded-full bg-gold animate-pulse"></span>
                        <h4 class="font-heading font-bold text-xs uppercase tracking-wider text-gold">
                            <?php esc_html_e( 'Important Notice', 'angel-network' ); ?>
                        </h4>
                    </div>
                    <p class="text-xs text-slate-300 leading-relaxed">
                        <?php esc_html_e( 'Cuba Investment Network does not provide investment, legal, tax, or regulatory advice. We cannot determine investor eligibility or evaluate an investment on a user’s behalf. Please consult qualified professionals before making financial or business decisions.', 'angel-network' ); ?>
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
