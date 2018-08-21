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

        function tabconvert($value) {
            if ($value==="overview") {
                return "Overview";
                }
            if ($value==="ba"){
                return "Bachelor's";
                }
            if ($value==="minor"){
                return "Minor";
                }
            if ($value==="ma"){
                return "Master's";
                }
            if ($value==="phd"){
                return "Doctoral";
                }
            if ($value==="faculty"){
                return "Faculty";
                }
            if ($value==="courses"){
                return "Courses";
                }
            return $value;
            }
        $major_tabs = get_field('major_components');

        if ($major_tabs !=''){
        $major_tabs_two = array_map("tabconvert",$major_tabs);

            echo '<div id="major-tabs" class="major-tabs">';
            echo '<ul role="tablist">';
            foreach ($major_tabs as $index => $major_tab) {
                echo '<li id="'.$major_tab.'-tab" class="tab-link" role="presentation"><a href="#" data-rel="'.$major_tab.'"role="tab">'.$major_tabs_two[$index].'</a></li>';
              }
              echo '</ul>';
              echo '</div>';
              echo '<div style="clear:both"></div>';
        // }
              echo '<div class="majorcontainers">';
            if (in_array("overview", $major_tabs)) {
                echo '<div id="overview" class="tab-content">'.get_field('overview').'</div>';
                }

            if (in_array("ba", $major_tabs)) {
                echo '<div id="ba" class="tab-content">'.get_field('bachelor_degree').'</div>';
                }
            if (in_array("ma", $major_tabs)) {
                echo '<div id="ma" class="tab-content">'.get_field('master_degree').'</div>';
                }
            if (in_array("phd", $major_tabs)) {
                echo '<div id="phd" class="tab-content">'.get_field('doctoral_degree').'</div>';
                }
            if (in_array("minor", $major_tabs)) {
                echo '<div id="minor" class="tab-content">'.get_field('minor').'</div>';
                }
            if (in_array("faculty", $major_tabs)) {
                echo '<div id="faculty" class="tab-content">'.get_field('faculty').'</div>';
                }
            if (in_array("courses", $major_tabs)) {
                echo '<div id="courses" class="tab-content">'.get_field('courses').'</div>';
                }
            echo '</div>';
            }
                $meta = get_post_meta($post->ID);
            echo '<pre>';
            var_dump($major_tabs);
            echo '</pre>';

            echo '<pre>';
            var_dump($meta);
            echo '</pre>';

        /**
         *
         * Lots of coding here. Loop to retrieve repeatable
         * fields. Don't want to lose it.
         */
        // $major_components = get_post_meta( get_the_ID(), '_ucsc_major_components_group', true );
        // echo '<div><ul>';
        // foreach ((array) $major_components as $key => $entry){
        //     $component = $content = '';

        //     if (isset($entry['major_component_checkbox'])){
        //         $component = esc_html($entry['major_component_checkbox']);
        //     }

        //     if (isset($entry['major_component_text'])){
        //         $content = wpautop($entry['major_component_text']);
        //         // $content = esc_html($entry['major_component_wysiwyg']);
        //     }

        //     echo '<li>';
        //     echo '<span>'.$component.'</span>';
        //     echo '<span>'.$content.'</span>';
        //     echo '</li>';

        // }
        // echo '</ul></div>';

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
