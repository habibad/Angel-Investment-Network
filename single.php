<?php
/**
 * Single Post Template
 *
 * @package AngelNetwork
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

get_header();

// Fetch single post or fallback to demo article
$title     = get_the_title();
$content   = get_the_content();
$author    = get_the_author();
$date      = get_the_date();
$read_time = angel_estimate_reading_time( $content );
?>

<article class="py-16 bg-white">
    <div class="container mx-auto max-w-4xl">
        <!-- Breadcrumb / Back Link -->
        <div class="mb-6">
            <a href="<?php echo esc_url( home_url( '/blog/' ) ); ?>" class="text-xs font-semibold text-primary hover:text-accent flex items-center gap-1.5 transition-colors">
                <span>← Back to Venture Insights</span>
            </a>
        </div>

        <!-- Article Header -->
        <header class="mb-10 text-left">
            <div class="inline-flex items-center gap-2 mb-4">
                <span class="badge badge-accent">Market Insights</span>
                <span class="text-xs text-slate-400">•</span>
                <span class="text-xs text-slate-500"><?php echo esc_html( $date ? $date : 'September 12, 2026' ); ?></span>
                <span class="text-xs text-slate-400">•</span>
                <span class="text-xs text-slate-500"><?php echo esc_html( $read_time ); ?> min read</span>
            </div>

            <h1 class="text-3xl sm:text-4xl lg:text-5xl font-heading font-extrabold text-primary tracking-tight leading-tight mb-6">
                <?php echo esc_html( $title ? $title : 'The 2026 Angel Syndicate Playbook: Navigating Seed Valuations' ); ?>
            </h1>

            <!-- Author byline -->
            <div class="flex items-center gap-3 pt-4 border-t border-slate-100">
                <img 
                    src="https://images.unsplash.com/photo-1560250097-0b93528c311a?auto=format&fit=crop&w=120&q=80" 
                    alt="<?php echo esc_attr( $author ); ?>" 
                    class="w-10 h-10 rounded-full object-cover border border-slate-200"
                >
                <div>
                    <p class="text-sm font-heading font-bold text-primary"><?php echo esc_html( $author ? $author : 'Marcus Sterling' ); ?></p>
                    <p class="text-xs text-slate-500">Managing Partner, Sterling Syndicate & Venture Contributor</p>
                </div>
            </div>
        </header>

        <!-- Featured Image -->
        <div class="rounded-2xl overflow-hidden shadow-md mb-12 aspect-16/9 bg-slate-100">
            <img 
                src="https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?auto=format&fit=crop&w=1200&q=80" 
                alt="<?php echo esc_attr( $title ); ?>" 
                class="w-full h-full object-cover"
            >
        </div>

        <!-- Article Editorial Body -->
        <div class="prose prose-slate max-w-none text-slate-700 text-base leading-relaxed space-y-6">
            <?php if ( have_posts() && ! empty( $content ) ) : ?>
                <?php while ( have_posts() ) : the_post(); the_content(); endwhile; ?>
            <?php else : ?>
                <p class="text-lg text-slate-800 font-medium leading-relaxed">
                    Over the past 18 months, Canadian early-stage venture capital has transitioned from speculative founder-friendly valuations toward rigorous financial fundamentals, clear gross margin defensibility, and disciplined milestones.
                </p>
                <h2 class="text-2xl font-heading font-bold text-primary mt-8 mb-4">1. Valuation Discipline in Seed & Pre-Seed</h2>
                <p>
                    Historically, Canadian tech startups raised early capital at post-money valuations hovering between $8M and $12M with minimal revenue proof. Today, angels expect pre-money valuations in the $4M to $7M bracket, accompanied by clear annual recurring revenue (ARR) indicators or verified corporate pilot letters of intent (LOIs).
                </p>
                <h2 class="text-2xl font-heading font-bold text-primary mt-8 mb-4">2. The Strategic Advantage of Syndicate Rounds</h2>
                <p>
                    Rather than negotiating with a single institutional lead whose decision matrix might require 3 months of committee reviews, syndicate platforms enable 5 to 15 accredited angels to combine check sizes ($25K to $100K each) to close a $1M seed round within 30 to 45 days.
                </p>
                <blockquote class="p-4 my-6 border-l-4 border-accent bg-slate-50 italic text-slate-700 rounded-r-lg">
                    &ldquo;The best angels don’t just write checks—they open enterprise sales doors, facilitate regulatory relationships, and anchor future institutional Series A rounds.&rdquo;
                </blockquote>
                <h2 class="text-2xl font-heading font-bold text-primary mt-8 mb-4">3. Data Room Hygiene</h2>
                <p>
                    Founders who organize cap tables, IP assignments, customer retention cohorts, and audited financial projections in clean, accessible data rooms consistently close rounds at an accelerated velocity.
                </p>
            <?php endif; ?>
        </div>

        <!-- Author Bio Box -->
        <div class="mt-14 p-8 bg-slate-50 rounded-2xl border border-slate-200 flex flex-col sm:flex-row items-center sm:items-start gap-6">
            <img 
                src="https://images.unsplash.com/photo-1560250097-0b93528c311a?auto=format&fit=crop&w=160&q=80" 
                alt="Marcus Sterling" 
                class="w-20 h-20 rounded-full object-cover border-2 border-white shadow-md shrink-0"
            >
            <div>
                <h3 class="text-base font-heading font-bold text-primary">About the Author</h3>
                <p class="text-xs text-slate-600 leading-relaxed mt-1 mb-3">
                    Marcus is an active angel syndicate lead based in Toronto who has deployed over $18M across 28 seed-stage ventures. He writes extensively on valuation models, governance, and early-stage scaling.
                </p>
                <button type="button" data-open-modal="auth-modal" data-modal-tab="register" class="btn btn-outline-primary btn-sm">
                    Connect with Angel Network
                </button>
            </div>
        </div>
    </div>
</article>

<!-- Bottom CTA -->
<?php get_template_part( 'template-parts/sections/cta-banner' ); ?>

<?php
get_footer();
