<?php
/**
 * Industry Sectors - Editorial Investment-Sector Browser
 *
 * @package AngelNetwork
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$sectors = [
    ['name' => 'Technology', 'slug' => 'technology', 'deals' => '42 Deals', 'img' => 'https://images.unsplash.com/photo-1518770660439-4636190af475?auto=format&fit=crop&w=300&q=80'],
    ['name' => 'Healthcare & Bio', 'slug' => 'healthcare', 'deals' => '28 Deals', 'img' => 'https://images.unsplash.com/photo-1579684385127-1ef15d508118?auto=format&fit=crop&w=300&q=80'],
    ['name' => 'Finance & FinTech', 'slug' => 'fintech', 'deals' => '35 Deals', 'img' => 'https://images.unsplash.com/photo-1559526324-4b87b5e36e44?auto=format&fit=crop&w=300&q=80'],
    ['name' => 'Real Estate & PropTech', 'slug' => 'real-estate', 'deals' => '19 Deals', 'img' => 'https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?auto=format&fit=crop&w=300&q=80'],
    ['name' => 'Food & Beverage', 'slug' => 'food-beverage', 'deals' => '24 Deals', 'img' => 'https://images.unsplash.com/photo-1555396273-367ea4eb4db5?auto=format&fit=crop&w=300&q=80'],
    ['name' => 'Advanced Manufacturing', 'slug' => 'manufacturing', 'deals' => '16 Deals', 'img' => 'https://images.unsplash.com/photo-1581091226825-a6a2a5aee158?auto=format&fit=crop&w=300&q=80'],
    ['name' => 'Education & EdTech', 'slug' => 'education', 'deals' => '12 Deals', 'img' => 'https://images.unsplash.com/photo-1503676260728-1c00da094a0b?auto=format&fit=crop&w=300&q=80'],
    ['name' => 'CleanTech & Energy', 'slug' => 'cleantech', 'deals' => '31 Deals', 'img' => 'https://images.unsplash.com/photo-1473341304170-971dccb5ac1e?auto=format&fit=crop&w=300&q=80'],
    ['name' => 'Agriculture & AgTech', 'slug' => 'agriculture', 'deals' => '18 Deals', 'img' => 'https://images.unsplash.com/photo-1530836369250-ef72a3f5cda8?auto=format&fit=crop&w=300&q=80'],
    ['name' => 'Retail & Consumer', 'slug' => 'retail', 'deals' => '22 Deals', 'img' => 'https://images.unsplash.com/photo-1441986300917-64674bd600d8?auto=format&fit=crop&w=300&q=80'],
    ['name' => 'Logistics & Supply Chain', 'slug' => 'transportation', 'deals' => '15 Deals', 'img' => 'https://images.unsplash.com/photo-1586528116311-ad8dd3c8310d?auto=format&fit=crop&w=300&q=80'],
    ['name' => 'Professional Services', 'slug' => 'professional-services', 'deals' => '14 Deals', 'img' => 'https://images.unsplash.com/photo-1450133064473-71024230f91b?auto=format&fit=crop&w=300&q=80'],
];
?>

<section class="py-24 lg:py-32 bg-brand-canvas border-b border-brand-border">
    <div class="container mx-auto">
        <!-- Section Header -->
        <div class="flex flex-col md:flex-row md:items-end justify-between mb-16">
            <div>
                <p class="text-xs font-sans font-semibold uppercase tracking-widest-plus text-brand-teal mb-3">
                    <?php esc_html_e( 'Marketplace Coverage', 'angel-network' ); ?>
                </p>
                <h2 class="font-serif text-3xl sm:text-4xl text-brand-dark leading-tight tracking-tight">
                    Opportunities Across<br>
                    <span class="italic font-normal">Key Sectors</span>
                </h2>
            </div>
            <a href="<?php echo esc_url( home_url( '/invest/' ) ); ?>" class="btn-link text-xs mt-4 md:mt-0">
                <span><?php esc_html_e( 'View All Categories', 'angel-network' ); ?></span>
                <span>→</span>
            </a>
        </div>

        <!-- Editorial Sector Index Grid (Clean list/grid, subtle dark-green highlight, smooth transition) -->
        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-x-8 gap-y-2">
            <?php foreach ( $sectors as $sector ) : ?>
                <a 
                    href="<?php echo esc_url( home_url( '/invest/?sector=' . $sector['slug'] ) ); ?>" 
                    class="group flex items-center justify-between py-4 px-3 border-b border-brand-border/70 hover:border-brand-teal/50 hover:bg-white rounded transition-all duration-200"
                >
                    <div class="flex items-center gap-3">
                        <span class="w-1.5 h-1.5 rounded-full bg-brand-border group-hover:bg-brand-teal transition-colors"></span>
                        <span class="font-sans text-sm font-medium text-brand-dark group-hover:text-brand-teal transition-colors">
                            <?php echo esc_html( $sector['name'] ); ?>
                        </span>
                    </div>

                    <div class="flex items-center gap-3">
                        <span class="text-[11px] font-sans text-brand-light group-hover:text-brand-muted transition-colors">
                            <?php echo esc_html( $sector['deals'] ); ?>
                        </span>
                        <span class="text-brand-light group-hover:text-brand-teal group-hover:translate-x-1 transition-all text-xs">
                            →
                        </span>
                    </div>
                </a>
            <?php endforeach; ?>
        </div>
    </div>
</section>
