<?php
/**
 * Testimonials Section - Human Editorial Stories
 *
 * @package AngelNetwork
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
?>

<section class="py-24 lg:py-32 bg-brand-canvas border-b border-brand-border">
    <div class="container mx-auto">
        <!-- Section Header -->
        <div class="max-w-xl mb-16">
            <p class="text-xs font-sans font-semibold uppercase tracking-widest-plus text-brand-teal mb-3">
                <?php esc_html_e( 'Real Connections', 'angel-network' ); ?>
            </p>
            <h2 class="font-serif text-3xl sm:text-4xl text-brand-dark leading-tight tracking-tight">
                Perspectives from<br>
                <span class="italic font-normal">Founders & Investors</span>
            </h2>
        </div>

        <div class="grid lg:grid-cols-12 gap-8 lg:gap-12 items-stretch">
            
            <!-- Dominant Featured Testimonial (Left 7 cols) -->
            <div class="lg:col-span-7 bg-white border border-brand-border rounded p-8 sm:p-12 flex flex-col justify-between">
                <div>
                    <span class="badge-editorial mb-6">
                        Case Study • CA$ 850,000 Seed
                    </span>
                    <blockquote class="font-serif text-xl sm:text-2xl text-brand-dark leading-relaxed mb-8">
                        &ldquo;Our capital raise was on a deal-by-deal timeline. Within four weeks of publishing our pitch, we engaged four qualified Canadian angel investors who not only anchored our round but unlocked enterprise pilot contracts with national retail chains.&rdquo;
                    </blockquote>
                </div>

                <div class="flex items-center gap-4 pt-6 border-t border-brand-border">
                    <img 
                        src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&w=140&q=80" 
                        alt="Elena Vance" 
                        class="w-12 h-12 rounded-full object-cover"
                        loading="lazy"
                    >
                    <div>
                        <p class="font-serif text-base font-bold text-brand-dark">Elena Vance</p>
                        <p class="text-xs font-sans text-brand-muted">Founder & CEO, AeroPure Technologies • Vancouver</p>
                    </div>
                </div>
            </div>

            <!-- Two Supporting Testimonials (Right 5 cols) -->
            <div class="lg:col-span-5 flex flex-col gap-6">
                
                <!-- Supporting 1 -->
                <div class="bg-white border border-brand-border rounded p-6 sm:p-8 flex-1 flex flex-col justify-between">
                    <blockquote class="text-sm font-sans text-brand-muted leading-relaxed mb-6">
                        &ldquo;Filtering signal from noise used to consume days. This network provides verified cap tables and direct founder dialogue without broker markups.&rdquo;
                    </blockquote>
                    <div class="flex items-center gap-3 pt-4 border-t border-brand-border/70">
                        <img 
                            src="https://images.unsplash.com/photo-1560250097-0b93528c311a?auto=format&fit=crop&w=100&q=80" 
                            alt="Hugo A." 
                            class="w-9 h-9 rounded-full object-cover"
                            loading="lazy"
                        >
                        <div>
                            <p class="font-serif text-sm font-bold text-brand-dark">Hugo A.</p>
                            <p class="text-[11px] font-sans text-brand-light">Family Office Principal • Montreal</p>
                        </div>
                    </div>
                </div>

                <!-- Supporting 2 -->
                <div class="bg-white border border-brand-border rounded p-6 sm:p-8 flex-1 flex flex-col justify-between">
                    <blockquote class="text-sm font-sans text-brand-muted leading-relaxed mb-6">
                        &ldquo;The structured pitch format forces discipline. When angels reached out, they were genuinely accredited and prepared to commit capital.&rdquo;
                    </blockquote>
                    <div class="flex items-center gap-3 pt-4 border-t border-brand-border/70">
                        <img 
                            src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?auto=format&fit=crop&w=100&q=80" 
                            alt="Dr. Aris Thorne" 
                            class="w-9 h-9 rounded-full object-cover"
                            loading="lazy"
                        >
                        <div>
                            <p class="font-serif text-sm font-bold text-brand-dark">Dr. Aris Thorne</p>
                            <p class="text-[11px] font-sans text-brand-light">Founder, MediPulse BioDevices • Toronto</p>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
</section>
