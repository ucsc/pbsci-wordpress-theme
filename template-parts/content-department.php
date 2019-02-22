<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package UC_Santa_Cruz
 */

?>
<div class="crumbs">
    <div class="wrap">
        <?php get_template_part( 'template-parts/breadcrumbs','all' ); ?>
    </div>
</div>
<div class="wrap">
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <div class="entry-content">
            <?php
        //get the parts
        $department_blurb = get_field('department_blurb');
        $department_location = get_field('department_location');
        $department_website = get_field('department_website');
        $department_address_university_street_address = get_field('department_address_university_street_address');
        $department_address_dept_name = get_field('department_address_dept_name');
        $department_address_mail_stop = get_field('department_address_mail_stop');
        $department_address_city = get_field('department_address_city');
        $department_address_state = get_field('department_address_state');
        $department_address_zip = get_field('department_address_zip');
        $department_phone_numbers = get_field('department_phone_numbers');
        $meta = get_post_meta($post->ID);

        //Filter phone number output
        function ucsc_format_dept_phone(&$args){
            if(  preg_match( '/^\+\d(\d{3})(\d{3})(\d{4})$/', $args,  $matches ) ){
            $result = '(' . $matches[1] . ') ' .$matches[2] . '-' . $matches[3];
            return $result;
            }
        }
        //build the parts
        echo $department_blurb;

        if (have_rows('department_phone_numbers')): while (have_rows('department_phone_numbers')):the_row();
        $department_phone_line = get_sub_field('phone_line');
        $department_phone_number = get_sub_field('phone_number');
        echo '<p>';
        if ($department_phone_line):
            echo '<span>'.$department_phone_line.': </span>';
        endif;
        if ($department_phone_number):
            echo '<span>'.ucsc_format_dept_phone($department_phone_number).'</span>';
        endif;
        endwhile;
        endif;


        echo '<p class="department-location">Department Location: '.$department_location.'</p>';
        echo '<p><a href="'.$department_website.'">Department Website</a></p>';
        echo '<p>Mailing Address:</p>';
        echo '<p>UC Santa Cruz</p>';
        echo '<p>'.$department_address_dept_name.'</p>';
        echo '<p>'.$department_address_university_street_address.'</p>';
        if ($department_address_mail_stop !=""){
        echo '<p>MS: '.$department_address_mail_stop.'</p>';
        }
        echo '<p>'.$department_address_city.', '.$department_address_state.'&nbsp;'.$department_address_zip.'</p>';
        // debug
        // echo '<pre>';
        // var_dump($department_phone_numbers);
        // echo '</pre>';
        // echo '<pre>';
        // var_dump($meta);
        // echo '</pre>';

        /**
         * BEGINNING OF ORIGINAL UNDERSCORES CODE
         */
		the_content( sprintf(
			wp_kses(
				/* translators: %s: Name of current post. Only visible to screen readers */
				__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'ucsc-pbsci' ),
				array(
					'span' => array(
						'class' => array(),
					),
				)
			),
			get_the_title()
		) );

		wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'ucsc-pbsci' ),
			'after'  => '</div>',
		) );
		?>
        </div><!-- .entry-content -->

        <footer class="entry-footer">
            <?php ucsc_pbsci_entry_footer(); ?>
        </footer><!-- .entry-footer -->
    </article><!-- #post-<?php the_ID(); ?> -->
</div>