<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package UC_Santa_Cruz
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
        <?php
        get_template_part( 'template-parts/breadcrumbs', 'all' );
		if ( is_singular() ) :
			the_title( '<h1 class="entry-title">', '</h1>' );
		else :
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;

		if ( 'post' === get_post_type() ) :
			?>
			<div class="entry-meta">
				<?php
				ucsc_underscore_posted_on();
                ucsc_underscore_posted_by();

				?>
			</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	<?php ucsc_underscore_post_thumbnail(); ?>

	<div class="entry-content">
    <?php
        //get the parts
        $department_blurb = get_field('department_blurb');
        $department_location = get_field('department_location');
        $department_phone = get_field('department_phone_number');
        $department_graduate_phone = get_field('department_graduate_phone_number');
        $department_undergraduate_phone = get_field('department_undergraduate_phone_number');
        $department_fax = get_field('department_fax_number');
        $department_website = get_field('department_website');
        $department_address_university_street_address = get_field('department_address_university_street_address');
        $department_address_dept_name = get_field('department_address_dept_name');
        $department_address_mail_stop = get_field('department_address_mail_stop');
        $department_address_city = get_field('department_address_city');
        $department_address_state = get_field('department_address_state');
        $department_address_zip = get_field('department_address_zip');
        $meta = get_post_meta($post->ID);

        //manipulate the parts
        function ucsc_format_dept_phone($department_phone){
            if(  preg_match( '/^\+\d(\d{3})(\d{3})(\d{4})$/', $department_phone,  $matches ) ){
            $result = '(' . $matches[1] . ') ' .$matches[2] . '-' . $matches[3];
            return $result;
            }
        }
        function ucsc_format_grad_dept_phone($department_graduate_phone){
            if(  preg_match( '/^\+\d(\d{3})(\d{3})(\d{4})$/', $department_graduate_phone,  $matches ) ){
            $result = '(' . $matches[1] . ') ' .$matches[2] . '-' . $matches[3];
            return $result;
            }
        }
        function ucsc_format_undergrad_dept_phone($department_undergraduate_phone){
            if(  preg_match( '/^\+\d(\d{3})(\d{3})(\d{4})$/', $department_undergraduate_phone,  $matches ) ){
            $result = '(' . $matches[1] . ') ' .$matches[2] . '-' . $matches[3];
            return $result;
            }
        }
        function ucsc_format_fax($department_fax){
            if(  preg_match( '/^\+\d(\d{3})(\d{3})(\d{4})$/', $department_fax,  $matches ) ){
            $result = '(' . $matches[1] . ') ' .$matches[2] . '-' . $matches[3];
            return $result;
            }
        }

        //build the parts
        echo $department_blurb;
        if ($department_phone !=""){
            echo '<p>Telephone: '.ucsc_format_dept_phone($department_phone).'</p>';
        }

        if ($department_graduate_phone !=""){
            echo '<p>Graduate Telephone: '.ucsc_format_grad_dept_phone($department_graduate_phone).'</p>';
        }

        if ($department_undergraduate_phone !=""){
            echo '<p>Undergraduate Telephone: '.ucsc_format_undergrad_dept_phone($department_undergraduate_phone).'</p>';
        }
        if ($department_fax !=""){
            echo '<p>Fax: '.ucsc_format_fax($department_fax).'</p>';
        }

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
        //debug
        // echo '<pre>';
        // var_dump($department_undergraduate_phone);
        // echo '</pre>';
//
        // echo '<pre>';
        // var_dump($meta);
        // echo '</pre>';

        /**
         * BEGINNING OF ORIGINAL UNDERSCORES CODE
         */
		the_content( sprintf(
			wp_kses(
				/* translators: %s: Name of current post. Only visible to screen readers */
				__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'ucsc-underscore' ),
				array(
					'span' => array(
						'class' => array(),
					),
				)
			),
			get_the_title()
		) );

		wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'ucsc-underscore' ),
			'after'  => '</div>',
		) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php ucsc_underscore_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
