
<header id="masthead" class="site-header">
	<div class="site-branding">
		<?php
        $thumb = get_the_post_thumbnail_url(get_the_ID(), 'page-hero');
        $parent = $post->post_parent;
        $parent_thumb = get_the_post_thumbnail_url($parent);
        ?>

		<div class="hero-page wrap">
    		<div class="header-runner">
                <div class="entry-header">
					<?php get_template_part('template-parts/breadcrumbs'); ?>
					<div class="dept-title">
                        <?php
                        if ($parent > 0) : ?>
                            <div class="entry-title"><?php echo get_the_title( $post->post_parent ); ?></div>
                        <?php else: ?>
                            <h1 class="entry-title"><?php echo get_the_title(); ?></h1>
                        <?php endif; ?>
                    </div>
				</div>
			</div>
                <?php if( have_rows('slideshow_slide') ): ?>
                    <div class="hero-slideshow">
                        <?php get_template_part('template-parts/department-slideshow'); ?>
                    </div>
                <?php elseif (!empty ($thumb)) : ?>
                    <div class="hero-bg" style="background-image: url(<?php print $thumb; ?>"></div>
                <?php elseif (!empty ($parent_thumb)) : ?>
                    <div class="hero-bg" style="background-image: url(<?php print $parent_thumb; ?>"></div>
                <?php endif; ?>

		    </div>
        </div>

	</div><!-- .site-branding -->
</header><!-- #masthead -->
