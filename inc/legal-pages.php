<?php
/**
 * Legal Pages Auto-Installer & Content Repository
 *
 * Ensures Privacy Policy, Terms of Service, and Risk Disclosure
 * pages are automatically created, published, and kept up-to-date
 * upon theme activation on any local or live server.
 *
 * @package InvestmentNetwork
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Returns default content for Privacy Policy
 */
function angel_get_privacy_policy_content() {
    return '<h2>1. Introduction &amp; Overview</h2>
<p>Cuba Investment Network ("the Platform", "we", "us", or "our") is an independent introduction and information service designed to connect Cuban and Cuba-focused business owners with prospective international investors, strategic partners, and advisors. We are committed to protecting the privacy and confidentiality of personal and business information entrusted to us.</p>
<p>This Privacy Policy explains how we collect, use, store, and disclose information when you visit our website, submit inquiries, or interact with our platform.</p>
<p><em>[Operating Entity &amp; Legal Governance: Operating entity, jurisdiction, and official corporate registration details will be confirmed upon formal completion of commercial regulatory filings.]</em></p>

<h2>2. Information We Collect</h2>
<p>We only collect personal information that is necessary for the performance of our introduction and communication services. This includes:</p>
<ul>
    <li><strong>Contact Inquiries:</strong> Full name, email address, company or organization name, telephone number (optional), inquiry subject, and message content submitted through our contact form.</li>
    <li><strong>Business Owner Listing Information:</strong> Legal business name, operating location, ownership structure, operating history, products and services, target markets, capital sought, use of funds, and supporting business documentation voluntarily submitted for publication review.</li>
    <li><strong>Investor Profile Inquiries:</strong> Investment interests, preferred sectors, geographic focus, and typical investment criteria provided during registration or introduction requests.</li>
    <li><strong>Technical &amp; Browsing Data:</strong> Standard server logs, IP addresses, browser types, and access timestamps collected automatically for system security, spam prevention, and error diagnostic purposes. We do not expose submitted form information to third-party marketing or analytics logs.</li>
</ul>

<h2>3. Purpose and Legal Basis of Processing</h2>
<p>We process your information strictly for legitimate and transparent business purposes, including:</p>
<ul>
    <li>Responding directly to inquiries and communications from business owners, investors, and general visitors.</li>
    <li>Reviewing, formatting, and publishing business listings authorized by the respective business owners.</li>
    <li>Facilitating direct, mutual introductions between interested investors and business owners upon explicit request.</li>
    <li>Maintaining platform security, mitigating automated spam, preventing fraudulent representations, and enforcing our Terms of Service.</li>
</ul>
<p>We do not sell, rent, monetize, or trade personal information to third-party brokers, advertisers, or marketers.</p>

<h2>4. Disclosure of Information &amp; Confidentiality</h2>
<p>Personal and business information is kept confidential and shared only under the following controlled circumstances:</p>
<ul>
    <li><strong>Public Business Summaries:</strong> Basic business summaries are made publicly accessible on the platform only after explicit review and publication approval by the business owner.</li>
    <li><strong>Restricted Documents:</strong> Sensitive business plans, financial records, and identifying documents are never published openly. They are shared solely through confidential deal channels upon mutual authorization between the business owner and the prospective investor.</li>
    <li><strong>Legal Requirements:</strong> Where required by applicable law, court order, or governmental regulation to protect legal rights or prevent fraud.</li>
</ul>

<h2>5. Cross-Border Data Transfers &amp; International Users</h2>
<p>Cuba Investment Network is an internationally accessible platform. Personal and business information submitted to the platform may be stored and processed on secure servers located in international jurisdictions. By submitting information, you acknowledge that international data transfers may occur in accordance with this Privacy Policy.</p>

<h2>6. Data Retention and Security Controls</h2>
<p>We retain personal information only for as long as necessary to fulfill the purposes for which it was collected or to satisfy legal, operational, and record-keeping requirements. We maintain reasonable technical, organizational, and administrative safeguards designed to protect personal data against unauthorized access, loss, alteration, or disclosure.</p>

<h2>7. Your Privacy Rights</h2>
<p>Depending on your jurisdiction, you may have the right to:</p>
<ul>
    <li>Request access to the personal data we hold about you.</li>
    <li>Request correction of inaccurate or outdated information.</li>
    <li>Request deletion or erasure of your personal data where retention is no longer justified.</li>
    <li>Withdraw consent to future communications or listing publication at any time.</li>
</ul>
<p>To exercise any of these rights, please contact us through our official <a href="' . esc_url( home_url( '/contact/' ) ) . '">Contact page</a>.</p>

<h2>8. Updates to this Policy</h2>
<p>We may update this Privacy Policy periodically to reflect changes in our operational procedures, technical controls, or legal obligations. The "Last Updated" date at the top of this page indicates when revisions were made.</p>
<p class="text-xs text-slate-500 mt-8 pt-4 border-t border-slate-200">Last updated: September 2026</p>';
}

/**
 * Returns default content for Terms of Service
 */
function angel_get_terms_content() {
    return '<h2>1. Acceptance of Terms</h2>
<p>These Terms of Service ("Terms") constitute a legally binding agreement between you and Cuba Investment Network ("the Platform", "we", "us", or "our"). By accessing, browsing, or utilizing any portion of this website, you confirm that you have read, understood, and agree to be bound by these Terms, as well as our <a href="' . esc_url( home_url( '/privacy-policy/' ) ) . '">Privacy Policy</a> and <a href="' . esc_url( home_url( '/risk-disclosure/' ) ) . '">Risk Disclosure</a>.</p>

<h2>2. Nature of Platform Services</h2>
<p><strong>Cuba Investment Network is strictly an online information, business-listing, and introduction directory.</strong> The platform exists to improve visibility for Cuba-focused businesses and to enable direct communication between business owners, prospective investors, and strategic partners.</p>
<p>The platform explicitly clarifies that it is <strong>NOT</strong>:</p>
<ul>
    <li>A registered broker, dealer, underwriter, or placement agent under any securities laws.</li>
    <li>An investment adviser, financial planner, legal counselor, or tax adviser.</li>
    <li>An investment fund, venture capital firm, syndicate lead, or asset manager.</li>
    <li>A securities exchange, trading platform, or secondary market.</li>
    <li>A custodian, depository, escrow agent, or payment processor.</li>
    <li>An investment guarantor, insurer, or performance underwriter.</li>
</ul>
<p>The platform does not provide investment recommendations, does not negotiate terms of investment, does not execute investment agreements, and does not receive, hold, or transmit investment funds under any circumstances.</p>

<h2>3. User Eligibility &amp; Jurisdiction Responsibility</h2>
<p>Access to this platform is intended solely for adult individuals (at least 18 years of age or the age of legal majority in their jurisdiction) and legal entities possessing the full capacity to enter into binding agreements.</p>
<p><strong>Jurisdiction Responsibility:</strong> Users are solely responsible for determining whether their access to the platform and participation in any discussions, listings, or potential cross-border transactions complies with all laws, rules, and regulations applicable to them in their country of residence, citizenship, or incorporation.</p>

<h2>4. Critical Cross-Border &amp; Sanctions Notice</h2>
<p><strong>United States Persons Warning:</strong> Under regulations administered by the U.S. Department of the Treasury\'s Office of Foreign Assets Control (OFAC) and related U.S. statutes, persons subject to United States jurisdiction face comprehensive prohibitions and restrictions regarding investments, transactions, and commercial dealings involving Cuba, Cuban enterprises, and Cuban nationals, unless authorized by general or specific OFAC licenses. The platform does not provide legal advice regarding OFAC compliance. U.S. persons must obtain competent, qualified U.S. legal counsel before engaging in any discussions or activities related to Cuba.</p>
<p><strong>International Participants:</strong> All non-U.S. participants must independently verify compliance with applicable foreign direct investment laws, foreign exchange controls, anti-money laundering (AML) requirements, and sanctions frameworks within their respective jurisdictions.</p>

<h2>5. No Verification, Warranty, or Due Diligence by Platform</h2>
<p>All information, summaries, descriptions, metrics, and documents regarding business opportunities are provided directly by the respective business owners. Cuba Investment Network does not independently verify, audit, authenticate, or warrant the truthfulness, accuracy, completeness, or viability of any information submitted by users.</p>
<p>A listing on the platform does not constitute an offer, solicitation, endorsement, or recommendation of any security or investment opportunity. Investors and business owners must conduct their own independent legal, financial, tax, and operational due diligence before entering into any binding commitments.</p>

<h2>6. User Conduct &amp; Submissions</h2>
<p>Users agree not to:</p>
<ul>
    <li>Submit false, misleading, fraudulent, or deceptive information.</li>
    <li>Impersonate any person or entity, or falsely claim affiliation with any organization.</li>
    <li>Publish proprietary or confidential business materials without proper written authorization from the owner.</li>
    <li>Use automated scrapers, bots, or data harvesting scripts on the platform.</li>
    <li>Violate any local, national, or international laws, trade sanctions, or regulatory requirements.</li>
</ul>

<h2>7. Launch Period &amp; Pricing Terms</h2>
<p>During our initial launch period, basic business listings and platform access are provided free of charge ("Early Access"). No credit card is required to submit a business profile for review or to register investor interests. Optional premium features or paid subscription tiers may be introduced in the future; any future pricing changes will be communicated transparently in advance and will require affirmative user agreement.</p>

<h2>8. Intellectual Property</h2>
<p>All branding, trademarks, logos, site architecture, and visual assets of Cuba Investment Network are the intellectual property of the platform operator. Business owners retain full ownership of their submitted materials, trademarks, and documentation, granting the platform only a limited, non-exclusive license to display authorized profile summaries.</p>

<h2>9. Limitation of Liability &amp; Indemnification</h2>
<p>To the fullest extent permitted by applicable law, Cuba Investment Network, its operators, directors, affiliates, and agents shall not be liable for any direct, indirect, incidental, special, consequential, or punitive damages arising from your access to or use of the platform, including but not limited to investment losses, commercial disputes, lost opportunities, or inaccuracies in user-submitted listings.</p>
<p>You agree to indemnify, defend, and hold harmless Cuba Investment Network from and against any claims, liabilities, damages, and expenses arising out of your violation of these Terms or applicable laws.</p>

<h2>10. Governing Law &amp; Dispute Resolution</h2>
<p>These Terms shall be interpreted and governed in accordance with applicable laws. Any disputes arising under these Terms shall be subject to the exclusive jurisdiction of the competent courts of the operating jurisdiction, to be formally designated upon completion of corporate entity registration.</p>
<p class="text-xs text-slate-500 mt-8 pt-4 border-t border-slate-200">Last updated: September 2026</p>';
}

/**
 * Returns default content for Risk Disclosure
 */
function angel_get_risk_disclosure_content() {
    return '<div class="p-6 bg-slate-50 border-l-4 border-gold rounded-r-xl mb-8">
    <h3 class="text-base font-heading font-bold text-primary mb-2">Important Investment Notice</h3>
    <p class="text-xs sm:text-sm text-slate-700 leading-relaxed">
        Investment Network is an online platform designed to introduce investors to business owners seeking capital. Information published on the platform is provided for general informational purposes and does not constitute investment, financial, legal, or tax advice. A listing does not represent an offer, recommendation, endorsement, or guarantee of any investment.
    </p>
    <p class="text-xs sm:text-sm text-slate-700 leading-relaxed mt-2">
        Private investments involve substantial risk, including limited liquidity, dilution, uncertain returns, and the possible loss of all invested capital. Investment Network does not guarantee the accuracy or completeness of information submitted by users or the future performance of any business.
    </p>
    <p class="text-xs sm:text-sm text-slate-700 leading-relaxed mt-2">
        Investors and business owners are responsible for conducting independent financial, legal, tax, and operational reviews before entering into any agreement. Each participant must also ensure compliance with the laws and regulations applicable to the participant and the proposed transaction, including cross-border investment, sanctions, currency-transfer, and foreign-ownership requirements.
    </p>
</div>

<h2>1. Inherent Risks of Private Business Investments</h2>
<p>Engaging in early-stage, growth, or private enterprise investments involves a very high degree of financial and business risk. Before committing capital or resources to any private business, participants must carefully consider the following fundamental risks:</p>
<ul>
    <li><strong>Risk of Complete Capital Loss:</strong> Private and developing enterprises face high failure rates. There is no assurance that any business will achieve commercial profitability, generate positive cash flow, or return any capital to investors. You should only consider investments where you can afford the complete loss of all invested capital.</li>
    <li><strong>Lack of Liquidity &amp; Transfer Restrictions:</strong> Private business investments are highly illiquid. There is no public market, trading exchange, or secondary trading facility for private equity, debt instruments, or partnership interests in these companies. Investors must be prepared to hold their interests indefinitely.</li>
    <li><strong>Dilution from Future Financing:</strong> Businesses frequently require subsequent rounds of capital to sustain operations or expand. Subsequent issuances of equity or convertible securities may significantly dilute earlier investors\' ownership stakes and voting rights.</li>
    <li><strong>Operational and Execution Vulnerabilities:</strong> Emerging enterprises often depend heavily on a small management team, face supply chain interruptions, regulatory changes, customer concentration, and intense competitive pressures.</li>
</ul>

<h2>2. No Platform Due Diligence or Guarantee of Accuracy</h2>
<p>All information published regarding business opportunities on Cuba Investment Network is provided exclusively by the respective business owners. <strong>Cuba Investment Network does not perform independent financial audits, technical assessments, background checks, or legal verifications of claims made by business owners.</strong></p>
<p>The publication of a listing does not imply that the platform has vetted, validated, verified, or endorsed the business, its founders, its projections, or its valuation. Users must assume that all forward-looking statements, growth projections, and market estimates are subjective and uncertain.</p>

<h2>3. Cross-Border, Currency &amp; Sanctions Considerations</h2>
<p>Cross-border business relationships and investments in or connected to Cuba involve specialized legal, geopolitical, and financial complexities:</p>
<ul>
    <li><strong>United States Sanctions &amp; OFAC Restrictions:</strong> Persons subject to U.S. jurisdiction are subject to comprehensive restrictions administered by the U.S. Office of Foreign Assets Control (OFAC). Under U.S. law, U.S. citizens, permanent residents, entities organized under U.S. law, and foreign entities owned or controlled by U.S. persons generally may not invest in or transact business with Cuban entities without specific authorization from OFAC. The platform cannot grant authorization or determine individual compliance status.</li>
    <li><strong>Currency Transfer &amp; Foreign Exchange Restrictions:</strong> International transactions may be subject to currency conversion controls, foreign exchange volatility, banking channel restrictions, and limitations on cross-border capital repatriation.</li>
    <li><strong>Foreign Ownership &amp; Regulatory Frameworks:</strong> Laws governing foreign participation, joint ventures, operational licenses, and private business ownership differ widely by jurisdiction and are subject to regulatory change.</li>
</ul>

<h2>4. Absolute Requirement for Independent Professional Advice</h2>
<p>Neither Cuba Investment Network nor any of its affiliates, directors, or representatives provides financial, legal, tax, accounting, or regulatory advice. Nothing on this website should be interpreted as a personal recommendation or solicitation.</p>
<p>All investors, business owners, and prospective partners are strictly advised to engage qualified, independent professionals—including certified legal counsel, licensed accountants, tax specialists, and cross-border regulatory experts—before entering into any agreement, memorandum of understanding, or financial transaction.</p>

<h2>5. Direct Negotiations and Absence of Platform Intermediation</h2>
<p>All communications, document reviews, negotiations, and contractual agreements are conducted directly between the prospective investor and the business owner. Cuba Investment Network does not act as an intermediary, does not negotiate terms, does not execute transactions, and does not receive, hold, handle, or transmit investment funds.</p>

<p class="text-xs text-slate-500 mt-8 pt-4 border-t border-slate-200">Last updated: September 2026</p>';
}

/**
 * Automatically create and publish essential legal pages
 * if they do not already exist in the database.
 */
function angel_ensure_legal_pages() {
    $pages = [
        'privacy-policy' => [
            'title'   => 'Privacy Policy',
            'content' => angel_get_privacy_policy_content(),
        ],
        'terms-and-conditions' => [
            'title'   => 'Terms of Service',
            'content' => angel_get_terms_content(),
        ],
        'risk-disclosure' => [
            'title'   => 'Risk Disclosure',
            'content' => angel_get_risk_disclosure_content(),
        ],
    ];

    foreach ( $pages as $slug => $data ) {
        $existing_page = get_page_by_path( $slug, OBJECT, 'page' );

        // If page doesn't exist, check by slug in any status
        if ( ! $existing_page ) {
            $query = new WP_Query( [
                'post_type'      => 'page',
                'name'           => $slug,
                'post_status'    => 'any',
                'posts_per_page' => 1,
            ] );
            if ( $query->have_posts() ) {
                $existing_page = $query->posts[0];
            }
        }

        if ( ! $existing_page ) {
            // Insert new published page
            $page_id = wp_insert_post( [
                'post_title'     => $data['title'],
                'post_name'      => $slug,
                'post_content'   => $data['content'],
                'post_status'    => 'publish',
                'post_type'      => 'page',
                'comment_status' => 'closed',
                'ping_status'    => 'closed',
            ] );

            if ( 'privacy-policy' === $slug && $page_id && ! is_wp_error( $page_id ) ) {
                update_option( 'wp_page_for_privacy_policy', $page_id );
            }
        } else {
            // Ensure status is published and not draft or trash
            if ( in_array( $existing_page->post_status, [ 'draft', 'auto-draft', 'trash' ], true ) ) {
                wp_update_post( [
                    'ID'          => $existing_page->ID,
                    'post_status' => 'publish',
                ] );
            }

            // If empty content, populate with official text
            if ( empty( trim( $existing_page->post_content ) ) ) {
                wp_update_post( [
                    'ID'           => $existing_page->ID,
                    'post_content' => $data['content'],
                ] );
            }

            if ( 'privacy-policy' === $slug ) {
                update_option( 'wp_page_for_privacy_policy', $existing_page->ID );
            }
        }
    }
}

/**
 * Run setup on theme activation and ensure permalinks work
 */
function angel_theme_activation_setup() {
    angel_ensure_legal_pages();

    // Ensure standard permalink structure if plain
    $current_permalink = get_option( 'permalink_structure' );
    if ( empty( $current_permalink ) ) {
        global $wp_rewrite;
        $wp_rewrite->set_permalink_structure( '/%postname%/' );
    }

    flush_rewrite_rules();
}
add_action( 'after_switch_theme', 'angel_theme_activation_setup' );

/**
 * Ensure pages exist on admin init if not yet run
 */
function angel_admin_init_check_pages() {
    $installed = get_option( 'angel_legal_pages_installed_v2' );
    if ( ! $installed ) {
        angel_ensure_legal_pages();
        flush_rewrite_rules();
        update_option( 'angel_legal_pages_installed_v2', 1 );
    }
}
add_action( 'admin_init', 'angel_admin_init_check_pages' );
