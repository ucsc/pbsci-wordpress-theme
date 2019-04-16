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
        $department_email = get_field('department_email');
        $department_address_university_street_address = get_field('department_address_university_street_address');
        $department_address_dept_name = get_field('department_address_dept_name');
        $department_address_mail_stop = get_field('department_address_mail_stop');
        $department_address_delivery_building_room = get_field('department_address_delivery_building_room_number');
        $department_address_city = get_field('department_address_city');
        $department_address_state = get_field('department_address_state');
        $department_address_zip = get_field('department_address_zip');
        $department_phone_numbers = get_field('department_phone_numbers');
        $department_office_hours = get_field('department_office_hours');
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
        echo '<div class="flex-wrap">';
        echo '<div class="dept-info">';
        echo '<ul class="">';
        if ($department_location){
            echo '<li><h3>Department Contact</h3></li>';
            echo '<li><span class="dept-lable">Campus Location: </span>'.$department_location.'</li>';
        }
        if($department_email){
            echo '<li><span class="dept-lable">Department email: </span><a href="mailto:'.$department_email.'">'.$department_email.'</a></li>';
        }
        if (have_rows('department_phone_numbers')): while (have_rows('department_phone_numbers')):the_row();
        $department_phone_line = get_sub_field('phone_line');
        $department_phone_number = get_sub_field('phone_number');
        if ($department_phone_line):
            echo '<li><span class="dept-lable">'.$department_phone_line.': </span>';
        endif;
        if ($department_phone_number):
            echo '<span>'.ucsc_format_dept_phone($department_phone_number).'</span></li>';
        endif;
        endwhile;
        endif;
        if($department_website){
            echo '<li><a href="'.$department_website.'">Department Website</a></li>';
        }

        echo '</ul>';
        echo '</div>';
        echo '<div class="dept-info">';
        if($department_office_hours){
            echo '<ul class=""><li class=""><h3>Office Hours</h3></li>';
        }
        if (have_rows('department_office_hours')): while (have_rows('department_office_hours')):the_row();

        $day_from = get_sub_field('day_from');
        $day_to = get_sub_field('day_to');
        $morning_open = get_sub_field('morning_open');
        $morning_closed = get_sub_field('morning_closed');
        $afternoon_open = get_sub_field('afternoon_open');
        $afternoon_closed = get_sub_field('afternoon_closed');
        if ($day_from):
            echo '<li><span class="dept-lable">'.$day_from.' - '.$day_to.':</span> ';
            if($morning_open){
                echo $morning_open.' - '.$morning_closed;
            } else {
                echo "";
            }
            if($morning_open && $afternoon_open){
                echo ' and ';
            }
            if($afternoon_open){
                echo $afternoon_open.' - '.$afternoon_closed.'</li>';
            }else {
                echo '</li>';
            } ;
        endif;
        endwhile;
        endif;
        echo '</ul>';
        echo '</div>';
        echo '<div class="dept-info">';
        echo '<ul>';
        echo '<li><h3>USPS Mailing Address</h3></li>';
        echo '<li>UC Santa Cruz</li>';
        echo '<li>Department of '.$department_address_dept_name.'</li>';
        echo '<li>'.$department_address_university_street_address.'</li>';
        if ($department_address_mail_stop !=""){
            echo '<li>MS: '.$department_address_mail_stop.'</li>';
            }
        echo '<li>'.$department_address_city.', '.$department_address_state.'&nbsp;'.$department_address_zip.'</li>';
        echo '</ul>';
        echo '</div>';
        echo '<div class="dept-info">';
        echo '<ul class="">';
        echo '<li><h3>FedEx/UPS Delivery Address</h3></li>';
        echo '<li>UC Santa Cruz</li>';
        echo '<li>Department of '.$department_address_dept_name.'</li>';
        echo '<li>'.$department_address_university_street_address.'</li>';
        if ($department_address_delivery_building_room !=""){
            echo '<li>'.$department_address_delivery_building_room.'</li>';
            }
        echo '<li>'.$department_address_city.', '.$department_address_state.'&nbsp;'.$department_address_zip.'</li>';
        echo '</ul>';
        echo '</div>';
        echo '</div>';
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