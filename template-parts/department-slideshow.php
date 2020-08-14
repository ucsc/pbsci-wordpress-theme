<?php
if( have_rows('slideshow_slide') ):
    while ( have_rows('slideshow_slide') ) : the_row(); ?>
        <div class="slide" style="background-image: url(<?php print the_sub_field('slide_image'); ?>)">
            <div class="slide-content wrap">
                <?php if ( (get_sub_field('slide_heading')) || get_sub_field('slide_text') || get_sub_field('slide_button_link') ) :?>
                    <div class="content-wrap">
                <?php endif; ?>
                <?php if(get_sub_field('slide_heading')): ?>
                    <h2><?php print get_sub_field('slide_heading'); ?></h2>
                <?php endif; ?>
                <?php if(get_sub_field('slide_text')): ?>
                    <div class="slide-text"><?php print get_sub_field('slide_text'); ?></div>
                <?php endif; ?>
                <?php if(get_sub_field('slide_button_link')): ?>
                    <a class="button yellow-outline" href="<?php print get_sub_field('slide_button_link'); ?>"><?php print get_sub_field('slide_button_text'); ?></a>
                <?php endif; ?>
                <?php if ( (get_sub_field('slide_heading')) || get_sub_field('slide_text') || get_sub_field('slide_button_link') ) :?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    <?php endwhile;
endif;
