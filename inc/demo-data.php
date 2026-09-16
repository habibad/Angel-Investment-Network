<?php
/**
 * Static Demo Data Repository for Phase 1
 *
 * All demo datasets are centralized here in typed arrays.
 * Templates consume these arrays via helper functions.
 * In Phase 2, these functions will transparently query Custom Post Types (CPTs)
 * and WP user meta without modifying template files.
 *
 * @package AngelNetwork
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Returns structured investment opportunities
 */
function angel_get_demo_opportunities() {
    return [
        [
            'id'                 => 101,
            'title'              => 'NextGen Carbon Capture & Biopolymer Scaling',
            'slug'               => 'nextgen-carbon-capture',
            'company_name'       => 'AeroPure Technologies Inc.',
            'location'           => 'Vancouver, BC',
            'country'            => 'Canada',
            'industry'           => 'CleanTech',
            'industry_slug'      => 'cleantech',
            'stage'              => 'Seed Stage',
            'description'        => 'Patented point-source modular carbon capture technology yielding recyclable biopolymers with 78% lower energy expenditure.',
            'highlights'         => [
                'Commercial pilot completed with $1.4M ARR pipeline',
                'Global patent granted across 14 jurisdictions',
                'Tier-1 industrial co-development agreement signed'
            ],
            'total_required'     => 1500000,
            'amount_raised'      => 1050000,
            'minimum_investment' => 25000,
            'currency'           => 'CAD',
            'funding_type'       => 'Equity / SAFE',
            'image'              => 'https://images.unsplash.com/photo-1466611653911-95081537e5b7?auto=format&fit=crop&w=900&q=80',
            'founder_name'       => 'Elena Vance',
            'founder_role'       => 'Founder & CEO (Ex-Tesla Engineer)',
            'founder_avatar'     => 'https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?auto=format&fit=crop&w=200&q=80',
            'featured'           => true,
            'verified'           => true
        ],
        [
            'id'                 => 102,
            'title'              => 'Autonomous AI Agent Platform for Enterprise Logistics',
            'slug'               => 'omnilogix-ai-logistics',
            'company_name'       => 'OmniLogix Autonomous Systems',
            'location'           => 'Toronto, ON',
            'country'            => 'Canada',
            'industry'           => 'Artificial Intelligence',
            'industry_slug'      => 'ai',
            'stage'              => 'Pre-Seed',
            'description'        => 'Self-orchestrating multi-agent platform automating freight procurement and dynamic warehouse routing in real-time.',
            'highlights'         => [
                '4 Enterprise clients active in paid beta ($280K ARR)',
                'Reduces deadhead freight miles by 34%',
                'Founding team holds 4 PhDs in Machine Learning'
            ],
            'total_required'     => 850000,
            'amount_raised'      => 620000,
            'minimum_investment' => 15000,
            'currency'           => 'CAD',
            'funding_type'       => 'Convertible Note (8% discount)',
            'image'              => 'https://images.unsplash.com/photo-1586528116311-ad8dd3c8310d?auto=format&fit=crop&w=900&q=80',
            'founder_name'       => 'Devon Miller',
            'founder_role'       => 'Co-Founder & CTO',
            'founder_avatar'     => 'https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&w=200&q=80',
            'featured'           => true,
            'verified'           => true
        ],
        [
            'id'                 => 103,
            'title'              => 'Non-Invasive Diagnostic Ultrasound for Cardiac Care',
            'slug'               => 'medipulse-cardiac-diagnostic',
            'company_name'       => 'MediPulse BioDevices',
            'location'           => 'Montreal, QC',
            'country'            => 'Canada',
            'industry'           => 'Healthcare',
            'industry_slug'      => 'healthcare',
            'stage'              => 'Series A',
            'description'        => 'Handheld point-of-care cardiac diagnostic system leveraging edge computing to provide ICU-quality imaging at bedside.',
            'highlights'         => [
                'Health Canada & FDA 510(k) approval pathway initiated',
                'Completed 280-patient clinical trial with 99.1% diagnostic fidelity',
                'Over $600K in non-dilutive federal grants received'
            ],
            'total_required'     => 3000000,
            'amount_raised'      => 2100000,
            'minimum_investment' => 50000,
            'currency'           => 'CAD',
            'funding_type'       => 'Series A Preferred Equity',
            'image'              => 'https://images.unsplash.com/photo-1579684385127-1ef15d508118?auto=format&fit=crop&w=900&q=80',
            'founder_name'       => 'Dr. Aris Thorne',
            'founder_role'       => 'Chief Medical Officer & Founder',
            'founder_avatar'     => 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?auto=format&fit=crop&w=200&q=80',
            'featured'           => true,
            'verified'           => true
        ],
        [
            'id'                 => 104,
            'title'              => 'Decentralized Cross-Border Trade Settlement Infrastructure',
            'slug'               => 'veritrust-fintech-clearing',
            'company_name'       => 'VeriTrust Global Network',
            'location'           => 'Calgary, AB',
            'country'            => 'Canada',
            'industry'           => 'FinTech',
            'industry_slug'      => 'fintech',
            'stage'              => 'Seed Stage',
            'description'        => 'Compliant automated clearing network delivering instant cross-border settlement for Canadian export enterprises.',
            'highlights'         => [
                '$18M in monthly pilot payment volume processed',
                'Fintrac registered MSB with banking rail integrations',
                '90% gross margin business model'
            ],
            'total_required'     => 1800000,
            'amount_raised'      => 1250000,
            'minimum_investment' => 25000,
            'currency'           => 'CAD',
            'funding_type'       => 'Equity / SAFE',
            'image'              => 'https://images.unsplash.com/photo-1559526324-4b87b5e36e44?auto=format&fit=crop&w=900&q=80',
            'founder_name'       => 'Sarah Chen, CFA',
            'founder_role'       => 'Founder & Managing Director',
            'founder_avatar'     => 'https://images.unsplash.com/photo-1580489944761-15a19d654956?auto=format&fit=crop&w=200&q=80',
            'featured'           => false,
            'verified'           => true
        ],
        [
            'id'                 => 105,
            'title'              => 'Automated Precision Hydroponic AgTech for Cold Climates',
            'slug'               => 'urbanharvest-vertical-farming',
            'company_name'       => 'UrbanHarvest Biosystems',
            'location'           => 'Halifax, NS',
            'country'            => 'Canada',
            'industry'           => 'Agriculture',
            'industry_slug'      => 'agriculture',
            'stage'              => 'Seed Stage',
            'description'        => 'Year-round zero-pesticide indoor automated farms providing local fresh greens to major Canadian supermarket chains.',
            'highlights'         => [
                'Commercial supply contract signed with regional grocery retail chain',
                'Uses 95% less water and zero fossil heating via thermal recovery',
                'Positive unit economics achieved on Facility 1'
            ],
            'total_required'     => 1200000,
            'amount_raised'      => 800000,
            'minimum_investment' => 20000,
            'currency'           => 'CAD',
            'funding_type'       => 'Equity',
            'image'              => 'https://images.unsplash.com/photo-1530836369250-ef72a3f5cda8?auto=format&fit=crop&w=900&q=80',
            'founder_name'       => 'Liam O’Connor',
            'founder_role'       => 'Co-Founder & Chief Agronomist',
            'founder_avatar'     => 'https://images.unsplash.com/photo-1500648767791-00dcc994a43e?auto=format&fit=crop&w=200&q=80',
            'featured'           => false,
            'verified'           => true
        ],
        [
            'id'                 => 106,
            'title'              => 'Solid-State Thermal Battery Energy Storage for Remote Grids',
            'slug'               => 'aurora-thermal-energy-storage',
            'company_name'       => 'Aurora Thermal Dynamics',
            'location'           => 'Edmonton, AB',
            'country'            => 'Canada',
            'industry'           => 'CleanTech',
            'industry_slug'      => 'cleantech',
            'stage'              => 'Pre-Seed',
            'description'        => 'Long-duration non-lithium thermal storage systems engineered specifically for sub-zero industrial operations.',
            'highlights'         => [
                'Breakthrough patent in phase-change thermal alloys',
                'Demonstrated 30-year operational life with zero capacity decay',
                'Grant partnership with University of Alberta Clean Energy Lab'
            ],
            'total_required'     => 750000,
            'amount_raised'      => 450000,
            'minimum_investment' => 10000,
            'currency'           => 'CAD',
            'funding_type'       => 'SAFE Note',
            'image'              => 'https://images.unsplash.com/photo-1473341304170-971dccb5ac1e?auto=format&fit=crop&w=900&q=80',
            'founder_name'       => 'Marcus Tremblay',
            'founder_role'       => 'Lead Scientist & Founder',
            'founder_avatar'     => 'https://images.unsplash.com/photo-1492562080023-ab3db95bfbce?auto=format&fit=crop&w=200&q=80',
            'featured'           => false,
            'verified'           => true
        ],
    ];
}

/**
 * Returns structured angel investors
 */
function angel_get_demo_investors() {
    return [
        [
            'id'               => 201,
            'name'             => 'Christina S.',
            'role_title'       => 'Active Angel Investor & Syndicate Lead',
            'location'         => 'Toronto, ON',
            'country'          => 'Canada',
            'avatar'           => 'https://images.unsplash.com/photo-1573497019940-1c28c88b4f3e?auto=format&fit=crop&w=240&q=80',
            'investment_range' => 'CA$ 25,000 – CA$ 500,000',
            'min_ticket'       => 25000,
            'max_ticket'       => 500000,
            'industries'       => ['CleanTech', 'B2B SaaS', 'Healthcare'],
            'stage_focus'      => ['Pre-Seed', 'Seed'],
            'experience'       => 'Former VP of Enterprise Sales (Exited). Backed 16 Canadian startups with 3 successful secondary liquidity events.',
            'verified'         => true,
            'accredited'       => true
        ],
        [
            'id'               => 202,
            'name'             => 'Hugo A.',
            'role_title'       => 'Family Office Principal & Tech Investor',
            'location'         => 'Montreal, QC',
            'country'          => 'Canada',
            'avatar'           => 'https://images.unsplash.com/photo-1560250097-0b93528c311a?auto=format&fit=crop&w=240&q=80',
            'investment_range' => 'CA$ 50,000 – CA$ 1,000,000',
            'min_ticket'       => 50000,
            'max_ticket'       => 1000000,
            'industries'       => ['FinTech', 'AI / DeepTech', 'Manufacturing'],
            'stage_focus'      => ['Seed', 'Series A'],
            'experience'       => 'Over 18 years in private equity and direct early-stage syndication. Specializes in scale-up governance and M&A advisory.',
            'verified'         => true,
            'accredited'       => true
        ],
        [
            'id'               => 203,
            'name'             => 'Kaushal P.',
            'role_title'       => 'Tech Founder & Seed Angel',
            'location'         => 'Vancouver, BC',
            'country'          => 'Canada',
            'avatar'           => 'https://images.unsplash.com/photo-1519085360753-af0119f7cbe7?auto=format&fit=crop&w=240&q=80',
            'investment_range' => 'CA$ 10,000 – CA$ 250,000',
            'min_ticket'       => 10000,
            'max_ticket'       => 250000,
            'industries'       => ['Software', 'Digital Health', 'eCommerce'],
            'stage_focus'      => ['Pre-Seed', 'Seed'],
            'experience'       => 'Co-founded and scaled cloud security venture to Series B. Highly hands-on mentor for technical founders seeking product-market fit.',
            'verified'         => true,
            'accredited'       => true
        ],
    ];
}

/**
 * Returns structured industry sectors
 */
function angel_get_demo_industries() {
    return [
        [
            'slug'      => 'technology',
            'title'     => 'Technology & Cloud',
            'icon'      => 'cpu',
            'count'     => 142,
            'highlight' => 'Fastest Growing'
        ],
        [
            'slug'      => 'cleantech',
            'title'     => 'CleanTech & Energy',
            'icon'      => 'leaf',
            'count'     => 86,
            'highlight' => 'High Syndicate Demand'
        ],
        [
            'slug'      => 'ai',
            'title'     => 'Artificial Intelligence',
            'icon'      => 'sparkles',
            'count'     => 118,
            'highlight' => 'Trending'
        ],
        [
            'slug'      => 'healthcare',
            'title'     => 'Healthcare & MedTech',
            'icon'      => 'activity',
            'count'     => 64,
            'highlight' => 'High Valuation'
        ],
        [
            'slug'      => 'fintech',
            'title'     => 'FinTech & Payments',
            'icon'      => 'credit-card',
            'count'     => 95,
            'highlight' => 'Active Capital'
        ],
        [
            'slug'      => 'agriculture',
            'title'     => 'AgTech & FoodTech',
            'icon'      => 'sprout',
            'count'     => 42,
            'highlight' => 'Sustainable'
        ],
        [
            'slug'      => 'manufacturing',
            'title'     => 'Advanced Manufacturing',
            'icon'      => 'cog',
            'count'     => 38,
            'highlight' => 'Industrial'
        ],
        [
            'slug'      => 'real-estate',
            'title'     => 'PropTech & Real Estate',
            'icon'      => 'home',
            'count'     => 53,
            'highlight' => 'Asset Backed'
        ],
        [
            'slug'      => 'logistics',
            'title'     => 'Supply Chain & Logistics',
            'icon'      => 'truck',
            'count'     => 47,
            'highlight' => 'High ROI'
        ],
        [
            'slug'      => 'consumer',
            'title'     => 'Consumer & D2C Brands',
            'icon'      => 'shopping-bag',
            'count'     => 61,
            'highlight' => 'Omnichannel'
        ],
        [
            'slug'      => 'biotech',
            'title'     => 'Life Sciences & Bio',
            'icon'      => 'dna',
            'count'     => 35,
            'highlight' => 'DeepTech'
        ],
        [
            'slug'      => 'education',
            'title'     => 'EdTech & Upskilling',
            'icon'      => 'book-open',
            'count'     => 29,
            'highlight' => 'Workforce'
        ],
    ];
}

/**
 * Returns structured testimonials
 */
function angel_get_demo_testimonials() {
    return [
        [
            'id'          => 1,
            'quote'       => 'My capital raise was on a fast deal-by-deal structure. Within 28 days of publishing our verified pitch, I connected with 4 qualified Canadian angel investors who not only closed our $850K round but opened direct distribution doors with national retail chains. The platform worked exactly as designed.',
            'author_name' => 'Luke Guthrie',
            'author_role' => 'Founder & CEO, TerraLogix Systems',
            'author_img'  => 'https://images.unsplash.com/photo-1535713875002-d1d0cf377fde?auto=format&fit=crop&w=120&q=80',
            'raised_amt'  => 'CA$ 850,000 Raised',
            'rating'      => 5,
            'location'    => 'Calgary, AB'
        ],
        [
            'id'          => 2,
            'quote'       => 'As an angel syndicate coordinator, filtering high-signal opportunities from low-conviction ideas used to consume 80% of our week. This network provides standardized financial metrics, transparent cap table asks, and verified founder backgrounds. We have completed 6 investments this year alone.',
            'author_name' => 'Stewart Mackey',
            'author_role' => 'Syndicate Lead, Pacific Rim Angels',
            'author_img'  => 'https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?auto=format&fit=crop&w=120&q=80',
            'raised_amt'  => '6 Deals Syndicated',
            'rating'      => 5,
            'location'    => 'Vancouver, BC'
        ],
        [
            'id'          => 3,
            'quote'       => 'All around exceptional experience. The structured pitch wizard forced us to clarify our unit economics before going live. When angels reached out, they were genuinely accredited, sophisticated, and ready to write $50K+ checks without endless red tape.',
            'author_name' => 'Jamie Brookes',
            'author_role' => 'Co-Founder, BioHealth Nexus',
            'author_img'  => 'https://images.unsplash.com/photo-1580489944761-15a19d654956?auto=format&fit=crop&w=120&q=80',
            'raised_amt'  => 'CA$ 1.2M Seed Round',
            'rating'      => 5,
            'location'    => 'Toronto, ON'
        ],
    ];
}

/**
 * Returns platform aggregate statistics
 */
function angel_get_demo_stats() {
    return [
        [
            'label' => 'Total Capital Facilitated',
            'value' => 'CA$ 420M+',
            'sub'   => 'Across Seed & Growth Rounds'
        ],
        [
            'label' => 'Accredited Investors',
            'value' => '15,200+',
            'sub'   => 'Active Private Angels & Syndicates'
        ],
        [
            'label' => 'Funded Enterprises',
            'value' => '2,850+',
            'sub'   => 'High-Growth Ventures'
        ],
        [
            'label' => 'Median Time to First Check',
            'value' => '32 Days',
            'sub'   => 'From Pitch Verification'
        ],
    ];
}

/**
 * Returns media brand logos
 */
function angel_get_demo_media_brands() {
    return [
        ['name' => 'Forbes', 'tag' => 'Forbes'],
        ['name' => 'Bloomberg', 'tag' => 'Bloomberg'],
        ['name' => 'TechCrunch', 'tag' => 'TechCrunch'],
        ['name' => 'Financial Times', 'tag' => 'Financial Times'],
        ['name' => 'Business Insider', 'tag' => 'Business Insider'],
        ['name' => 'BBC World', 'tag' => 'BBC'],
        ['name' => 'The Globe and Mail', 'tag' => 'The Globe and Mail'],
        ['name' => 'Entrepreneur', 'tag' => 'Entrepreneur'],
    ];
}

/**
 * Returns demo blog articles / venture insights
 */
function angel_get_demo_blog_posts() {
    return [
        [
            'id'          => 301,
            'title'       => 'The 2026 Angel Syndicate Playbook: Navigating Seed Valuations in High-Interest Regimes',
            'slug'        => 'navigating-seed-valuations-2026',
            'excerpt'     => 'An in-depth analysis of valuation compression, SAFE note interest adjustments, and how top angels structure downside-protected terms.',
            'category'    => 'Market Insights',
            'date'        => 'September 12, 2026',
            'read_time'   => '6 min read',
            'author_name' => 'Marcus Sterling',
            'author_role' => 'Principal, Sterling Venture Partners',
            'image'       => 'https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?auto=format&fit=crop&w=800&q=80'
        ],
        [
            'id'          => 302,
            'title'       => 'How Early-Stage Founders Can Optimize Data Rooms for Rapid Investor Due Diligence',
            'slug'        => 'founder-guide-data-room-due-diligence',
            'excerpt'     => 'Clear checklists on cap table hygiene, IP assignments, revenue cohort retention models, and customer contract disclosures.',
            'category'    => 'Founder Guides',
            'date'        => 'September 8, 2026',
            'read_time'   => '8 min read',
            'author_name' => 'Elena Vance',
            'author_role' => 'Serial Founder & CEO',
            'image'       => 'https://images.unsplash.com/photo-1450133064473-71024230f91b?auto=format&fit=crop&w=800&q=80'
        ],
        [
            'id'          => 303,
            'title'       => 'CleanTech & Modular Infrastructure: Why Angels Are Moving Away from Pure Software',
            'slug'        => 'cleantech-hardware-angel-syndication',
            'excerpt'     => 'Why hardware-enabled recurring models and industrial decarbonization are attracting the largest angel rounds of the decade.',
            'category'    => 'Sector Deep Dive',
            'date'        => 'August 29, 2026',
            'read_time'   => '5 min read',
            'author_name' => 'Dr. Aris Thorne',
            'author_role' => 'Angel Syndicate Lead',
            'image'       => 'https://images.unsplash.com/photo-1497366216548-37526070297c?auto=format&fit=crop&w=800&q=80'
        ],
    ];
}

/**
 * Unified Abstraction Gateway
 * In Phase 1: Returns the demo data arrays.
 * In Phase 2: Checks if CPT records exist; queries WP_Query or falls back to demo data.
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
