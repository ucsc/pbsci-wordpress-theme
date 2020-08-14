<?php
/**
 * Template Name: Alternate Homepage
 * Template Post Type: page
 *
 * @link https://developer.wordpress.org/themes/template-files-section/page-template-files/
 */

get_header();
?>
    <div id="primary">
        <main id="main" class="site-main">
            <div class="content-wrapper">
            <?php while (have_posts()) : the_post(); ?>
                <?php the_content(); ?>
            <?php endwhile; ?>
            <?php if( have_rows('section_one') ): ?>
                <?php while( have_rows('section_one') ): the_row(); ?>
                    <div class="homepage-section section-one">
                        <?php if (get_theme_mod('watermark', '')) : ?>
                            <span class="background watermark" style="background-image: url(<?php print get_theme_mod('watermark', ''); ?>)"></span>
                        <?php endif; ?>
                        <div class="wrap">
                            <?php if( get_sub_field('section_one_title')): ?>
                                <h2 class="section-title"><?php print get_sub_field('section_one_title'); ?></h2>
                            <?php endif; ?>
                            <?php if( get_sub_field('section_one_subtitle')): ?>
                                <div class="section-subtitle"><?php print get_sub_field('section_one_subtitle'); ?></div>
                            <?php endif; ?>
                            <?php if( get_sub_field('section_one_content')): ?>
                                <div class="section-content"><?php print get_sub_field('section_one_content'); ?></div>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php endif; ?>
            <?php if( have_rows('section_two') ): ?>
                <?php while( have_rows('section_two') ): the_row(); ?>
                    <div class="homepage-section section-two">
                        <?php if( get_sub_field('section_two_watermark')): ?>
                            <span class="background watermark" style="background-image: url(<?php print get_sub_field('section_two_watermark'); ?>)"></span>
                        <?php endif; ?>
                        <div class="wrap">
                            <?php if( get_sub_field('section_two_title')): ?>
                                <h2 class="section-title"><?php print get_sub_field('section_two_title'); ?></h2>
                            <?php endif; ?>
                            <?php if( get_sub_field('section_two_subtitle')): ?>
                                <div class="section-subtitle"><?php print get_sub_field('section_two_subtitle'); ?></div>
                            <?php endif; ?>
                            <?php if( get_sub_field('section_two_posts')): ?>
                                <div class="section-content">
                                    <?php if (have_rows('section_two_posts')) : ?>
                                        <?php while (have_rows('section_two_posts')) : the_row(); ?>
                                            <?php $featured_posts = get_sub_field('homepage_featured_post'); ?>
                                            <?php foreach ($featured_posts as $post): ?>
                                                <?php
                                                    setup_postdata($post);
                                                    $permalink = get_permalink();
                                                    $title = get_the_title();
                                                    $thumb = get_the_post_thumbnail($post->ID, array(360, 240));
                                                ?>
                                                <div class="section-post">
                                                    <a href="<?php echo $permalink ?>">
                                                        <div class="img-container"><?php echo $thumb ?></div>
                                                    </a>
                                                    <div class="categories">
                                                        <?php
                                                        $terms = get_the_terms( $post->ID, 'category' );
                                                        foreach ( $terms as $term ): ?>
                                                            <?php $term_link = get_term_link( $term );
                                                            if ( !(is_wp_error( $term_link ) ) ): ?>
                                                                <a href="<?php echo esc_url( $term_link );?>"><span><?php echo $term->name; ?></span></a>
                                                            <?php endif; ?>
                                                        <?php endforeach; ?>
                                                    </div>
                                                    <a href="<?php echo $permalink ?>">
                                                        <h3><?php echo $title ?></h3>
                                                    </a>
                                                </div>
                                            <?php endforeach; ?>
                                        <?php endwhile; ?>
                                    <?php endif; ?>
                                    <?php wp_reset_postdata(); ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <?php endwhile; ?>
                <?php endif; ?>
                <?php if( have_rows('section_three') ): ?>
                        <?php while( have_rows('section_three') ): the_row(); ?>
                            <div class="homepage-section section-three">
                                <?php if (get_theme_mod('watermark', '')) : ?>
                                    <span class="background watermark" style="background-image: url(<?php print get_theme_mod('watermark', ''); ?>)"></span>
                                <?php endif; ?>
                                <div class="wrap">
                                    <?php if( get_sub_field('section_three_title')): ?>
                                        <h2 class="section-title"><?php print get_sub_field('section_three_title'); ?></h2>
                                    <?php endif; ?>
                                    <?php if( get_sub_field('section_three_subtitle')): ?>
                                        <div class="section-subtitle"><?php print get_sub_field('section_three_subtitle'); ?></div>
                                    <?php endif; ?>
                                    <?php if( get_sub_field('section_three_content')): ?>
                                        <div class="section-content"><?php print get_sub_field('section_three_content'); ?></div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    <?php endif; ?>
                    <?php if( have_rows('section_four') ): ?>
                        <?php while( have_rows('section_four') ): the_row(); ?>
		                    <?php if( get_sub_field('section_four_title') || get_sub_field('section_four_subtitle') || get_sub_field('section_four_content') ): ?>
                            <div class="homepage-section section-four">
                                <div class="overlay"></div>
                                <div class="wrap">
                                    <?php if( get_sub_field('section_four_title')): ?>
                                        <h2 class="section-title"><?php print get_sub_field('section_four_title'); ?></h2>
                                    <?php endif; ?>
                                    <?php if( get_sub_field('section_four_subtitle')): ?>
                                        <div class="section-subtitle"><?php print get_sub_field('section_four_subtitle'); ?></div>
                                    <?php endif; ?>
                                    <?php if( get_sub_field('section_four_content')): ?>
                                        <div class="section-content"><?php print get_sub_field('section_four_content'); ?></div>
                                    <?php endif; ?>
                                </div>
                            </div>
		                    <?php endif; ?>
                        <?php endwhile; ?>
                    <?php endif; ?>
                </div>
            </main>
        </div>
    <?php get_footer();
