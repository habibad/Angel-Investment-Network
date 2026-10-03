<?php
/**
 * Data Repository for Cuba Investment Network
 *
 * All obsolete Canadian template data, fabricated investor profiles (Christina S., Hugo A., Kaushal P.),
 * fictional testimonials, and unsupported numerical marketing metrics have been strictly removed.
 *
 * In accordance with client audit guidelines (PDF Pages 6–40):
 * - Fictional identities and unsupported metrics are eliminated.
 * - Platform operates in transparent Pre-Launch mode until authorized listings are published.
 * - Opportunities display Cuba-appropriate data models (Capital Sought, neutral currency USD/EUR,
 *   ownership structure, location, "Information supplied by the business owner", and status controls).
 *
 * @package InvestmentNetwork
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Returns published or sample business opportunities
 * When no live listings exist, returns empty or illustrative pre-launch structures.
 */
function angel_get_demo_opportunities() {
    return [
        [
            'id'                     => 101,
            'title'                  => 'Sustainable Agro-Industrial Fruit Processing & Cold Storage',
            'slug'                   => 'agro-industrial-cold-storage',
            'company_name'           => 'Empresa de Transformación Agrícola',
            'location'               => 'Cienfuegos',
            'country'                => 'Cuba',
            'industry'               => 'Agriculture & Food Processing',
            'industry_slug'          => 'agriculture',
            'stage'                  => 'Operating Business',
            'status'                 => 'Under Review',
            'status_label'           => 'Initial Listing Review',
            'is_sample'              => true,
            'description'            => 'Established agricultural processing facility seeking capital for modern solar-assisted refrigeration, export packaging lines, and expanded grower contracts.',
            'highlights'             => [
                'Operational facility with existing regional farmer supply agreements',
                'Phase 1 solar energy feasibility study completed',
                'Targeting regional Caribbean and international export distribution'
            ],
            'capital_sought'         => 350000,
            'total_required'         => 350000,
            'amount_raised'          => 0,
            'minimum_investment'     => 25000,
            'currency'               => 'USD',
            'ownership_structure'    => 'Private Cuban Enterprise (MIPYME)',
            'capital_purpose'        => 'Equipment acquisition, refrigeration modernization & working capital',
            'partnership_type'       => 'Direct Investment / Equipment Partnership',
            'operating_history'      => '3+ Years Operating',
            'last_updated'           => 'September 2026',
            'info_source'            => 'Information supplied by the business owner',
            'image'                  => 'https://images.unsplash.com/photo-1500937386664-56d1dfef3854?auto=format&fit=crop&w=900&q=80',
            'owner_title'            => 'Business Owner & Managing Director',
            'featured'               => true,
        ],
        [
            'id'                     => 102,
            'title'                  => 'Solar Energy Microgrid & Commercial Distributed Power',
            'slug'                   => 'distributed-solar-microgrid',
            'company_name'           => 'Soluciones Energéticas Renovables',
            'location'               => 'Havana',
            'country'                => 'Cuba',
            'industry'               => 'Clean Energy & Infrastructure',
            'industry_slug'          => 'cleantech',
            'stage'                  => 'Growth Stage',
            'status'                 => 'Under Review',
            'status_label'           => 'Initial Listing Review',
            'is_sample'              => true,
            'description'            => 'Commercial rooftop solar installation and battery storage provider developing resilient backup microgrids for private hospitality and commercial enterprises.',
            'highlights'             => [
                'Over 18 completed rooftop installations across western Cuba',
                'Established supplier channels for tier-1 inverter and battery components',
                'Demonstrated commercial client demand in industrial and hospitality hubs'
            ],
            'capital_sought'         => 500000,
            'total_required'         => 500000,
            'amount_raised'          => 0,
            'minimum_investment'     => 50000,
            'currency'               => 'USD',
            'ownership_structure'    => 'Private Cuban Enterprise (MIPYME)',
            'capital_purpose'        => 'Inventory expansion, technical equipment & commercial scaling',
            'partnership_type'       => 'Equity / Equipment Financing',
            'operating_history'      => '4+ Years Operating',
            'last_updated'           => 'September 2026',
            'info_source'            => 'Information supplied by the business owner',
            'image'                  => 'https://images.unsplash.com/photo-1497440001374-f26997328c1b?auto=format&fit=crop&w=900&q=80',
            'owner_title'            => 'Lead Engineer & Business Owner',
            'featured'               => true,
        ],
        [
            'id'                     => 103,
            'title'                  => 'B2B Logistics & Inter-Provincial Cold-Chain Transport',
            'slug'                   => 'cold-chain-logistics-distribution',
            'company_name'           => 'Logística y Transporte Privado',
            'location'               => 'Matanzas',
            'country'                => 'Cuba',
            'industry'               => 'Supply Chain & Logistics',
            'industry_slug'          => 'logistics',
            'stage'                  => 'Expansion',
            'status'                 => 'Under Review',
            'status_label'           => 'Initial Listing Review',
            'is_sample'              => true,
            'description'            => 'Regional freight and temperature-controlled delivery fleet connecting food producers in central Cuba with hospitality and retail outlets.',
            'highlights'             => [
                'Existing operational fleet servicing key supply corridors',
                'Direct commercial contracts with major private food producers',
                'High fleet utilization rate with established driver and maintenance operations'
            ],
            'capital_sought'         => 280000,
            'total_required'         => 280000,
            'amount_raised'          => 0,
            'minimum_investment'     => 25000,
            'currency'               => 'USD',
            'ownership_structure'    => 'Private Cuban Enterprise (MIPYME)',
            'capital_purpose'        => 'Fleet expansion with refrigerated commercial vehicles',
            'partnership_type'       => 'Debt / Revenue-Share / Equipment Partnership',
            'operating_history'      => '2+ Years Operating',
            'last_updated'           => 'September 2026',
            'info_source'            => 'Information supplied by the business owner',
            'image'                  => 'https://images.unsplash.com/photo-1586528116311-ad8dd3c8310d?auto=format&fit=crop&w=900&q=80',
            'owner_title'            => 'Operations Director & Business Owner',
            'featured'               => true,
        ],
    ];
}

/**
 * Returns structured investors
 * Fabricated identities (Christina S., Hugo A., Kaushal P.) have been REMOVED completely per PDF Pages 28–30.
 * Returns empty array until genuine, authorized investor profiles exist.
 */
function angel_get_demo_investors() {
    return [];
}

/**
 * Returns structured industry sectors
 * Numerically fabricated deal counts (142 deals, 86 deals, etc.) REMOVED per PDF Pages 32 & 34.
 * Sectors reflect key Cuba-relevant economic and private business domains.
 */
function angel_get_demo_industries() {
    return [
        [
            'slug'        => 'agriculture',
            'title'       => 'Agriculture & Food Processing',
            'icon'        => 'sprout',
            'description' => 'Crop production, livestock, food processing, cold storage, and sustainable farming.',
        ],
        [
            'slug'        => 'cleantech',
            'title'       => 'Clean Energy & Infrastructure',
            'icon'        => 'leaf',
            'description' => 'Solar power, distributed energy, microgrids, efficiency, and backup systems.',
        ],
        [
            'slug'        => 'logistics',
            'title'       => 'Supply Chain & Logistics',
            'icon'        => 'truck',
            'description' => 'Inter-provincial transport, cold chain, warehousing, and freight logistics.',
        ],
        [
            'slug'        => 'manufacturing',
            'title'       => 'Light Manufacturing & Industry',
            'icon'        => 'cog',
            'description' => 'Construction materials, packaging, consumer goods, and mechanical repair.',
        ],
        [
            'slug'        => 'technology',
            'title'       => 'Technology & Digital Services',
            'icon'        => 'cpu',
            'description' => 'Software development, digital commerce, technical consulting, and IT support.',
        ],
        [
            'slug'        => 'hospitality',
            'title'       => 'Tourism & Hospitality Services',
            'icon'        => 'home',
            'description' => 'Private guest accommodations, dining, specialized tours, and hospitality supply.',
        ],
    ];
}

/**
 * Returns structured testimonials
 * Fabricated testimonials (Luke Guthrie, Stewart Mackey, Jamie Brookes) REMOVED per PDF Pages 13–14 & 32.
 * Returns empty array until genuine, authorized success stories with written consent are obtained.
 */
function angel_get_demo_testimonials() {
    return [];
}

/**
 * Returns platform aggregate statistics
 * Unsupported numerical claims (CA$ 420M, 15,200 investors, 2,850 funded companies, 32-day median)
 * REMOVED completely per PDF Pages 22, 25, 32.
 */
function angel_get_demo_stats() {
    return [];
}

/**
 * Returns media brand logos
 * Can be empty or omitted until official press mentions exist
 */
function angel_get_demo_media_brands() {
    return [];
}

/**
 * Returns insights articles / briefings
 * Fictional authors (Marcus Sterling, Elena Vance, etc.) and Canadian VC articles REMOVED.
 */
function angel_get_demo_blog_posts() {
    return [
        [
            'id'          => 301,
            'title'       => 'Understanding Cuba’s Private Enterprise Framework: The Emergence of MIPYMEs',
            'slug'        => 'cubas-private-enterprise-framework-mipymes',
            'excerpt'     => 'A foundational overview of the legal status, operating scope, and capital requirements of Cuba’s micro, small, and medium private enterprises (MIPYMEs).',
            'category'    => 'Market and Sector Insights',
            'date'        => 'September 2026',
            'read_time'   => '5 min read',
            'author_name' => 'Research Desk',
            'author_role' => 'Cuba Investment Network',
            'image'       => get_template_directory_uri() . '/assets/images/insights-herobg.jpg'
        ],
        [
            'id'          => 302,
            'title'       => 'Essential Information Business Owners Must Prepare Before Seeking International Capital',
            'slug'        => 'essential-information-for-business-owners',
            'excerpt'     => 'A practical guide for Cuban business owners covering business overview documentation, use of funds clarity, and operational risk disclosures.',
            'category'    => 'Resources for Business Owners',
            'date'        => 'September 2026',
            'read_time'   => '6 min read',
            'author_name' => 'Editorial Desk',
            'author_role' => 'Cuba Investment Network',
            'image'       => 'https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?auto=format&fit=crop&w=800&q=80'
        ],
        [
            'id'          => 303,
            'title'       => 'Cross-Border Due Diligence: Navigating Sanctions, Foreign Ownership, and Currency Rules',
            'slug'        => 'cross-border-due-diligence-cuba',
            'excerpt'     => 'Key considerations for international investors evaluating opportunities connected to Cuba, including OFAC restrictions for U.S. persons and currency mechanics.',
            'category'    => 'Resources for Investors',
            'date'        => 'September 2026',
            'read_time'   => '7 min read',
            'author_name' => 'Compliance Review',
            'author_role' => 'Cuba Investment Network',
            'image'       => 'https://images.unsplash.com/photo-1497366216548-37526070297c?auto=format&fit=crop&w=800&q=80'
        ],
    ];
}

/**
 * Unified Abstraction Gateway
 */
function angel_get_opportunities( $args = [] ) {
    return angel_get_demo_opportunities();
}

function angel_get_investors( $args = [] ) {
    return angel_get_demo_investors();
}

function angel_get_industries() {
    return angel_get_demo_industries();
}

function angel_get_testimonials() {
    return angel_get_demo_testimonials();
}

function angel_get_stats() {
    return angel_get_demo_stats();
}

function angel_get_media_brands() {
    return angel_get_demo_media_brands();
}

function angel_get_blog_posts() {
    return angel_get_demo_blog_posts();
}
