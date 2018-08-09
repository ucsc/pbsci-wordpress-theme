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
            if ($value==="bachelors"){
                return "Bachelor's";
                }
            if ($value==="bachelors"){
                return "Bachelor's";
                }
            if ($value==="minor"){
                return "Minor";
                }
            if ($value==="masters"){
                return "Master's";
                }
            if ($value==="doctoral"){
                return "Doctoral";
                }
            if ($value==="masters"){
                return "Master's";
                }
            if ($value==="faculty"){
                return "Faculty";
                }
            if ($value==="courses"){
                return "Courses";
                }
            return $value;
            }
        $major_tabs = get_post_meta( get_the_ID(), '_ucsc_major_components_multicheckbox', true );
        $major_tabs_two = array_map("tabconvert",$major_tabs);
        if ($major_tabs !=''){
            echo '<div class="major-tabs">';
            echo '<ul role="tablist">';
            foreach ($major_tabs as $index => $major_tab) {
                echo '<li id="'.$major_tab.'-tab" role="presentation" class="active"><a href="#'.$major_tab.'-container" role="tab">'.$major_tabs_two[$index].'</a></li>';
              }
              echo '</ul>';
              echo '</div>';
              echo '<div style="clear:both"></div>';
        }
        $major_components = get_post_meta( get_the_ID(), '_ucsc_major_components_group', true );
        echo '<div><ul>';
        foreach ((array) $major_components as $key => $entry){
            $component = $content = '';

            if (isset($entry['major_component_checkbox'])){
                $component = esc_html($entry['major_component_checkbox']);
            }

            if (isset($entry['major_component_text'])){
                $content = wpautop($entry['major_component_text']);
                // $content = esc_html($entry['major_component_wysiwyg']);
            }

            echo '<li>';
            echo '<span>'.$component.'</span>';
            echo '<span>'.$content.'</span>';
            echo '</li>';
            
        }
        echo '</ul></div>';
        
        echo '<pre>';
        var_dump($major_components);
        echo '</pre>';

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
