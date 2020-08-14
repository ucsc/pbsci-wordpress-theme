<header id="masthead" class="site-header">
    <div class="site-branding">
        <?php if( have_rows('slideshow_slide') ): ?>
            <div class="hero-slideshow">
                <?php get_template_part('template-parts/department-slideshow'); ?>
            </div>
        <?php endif; ?>
    </div>
</header>
