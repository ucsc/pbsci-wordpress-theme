
<header id="masthead" class="site-header">
	<div class="site-branding">
		<?php
		$page_for_posts = get_option('page_for_posts');

		if ((!is_home()) || (is_single() && 'post' != get_post_type()) ) {
			// If this is NOT the blog posts index
			$hero = get_the_post_thumbnail_url(get_the_ID(), 'page-hero');
			$heroCaption = get_the_post_thumbnail_caption();
		}
		$page_blurb = get_field('page_blurb');
		$degrees_offered = get_field_object('degrees_offered');
		$degrees = $degrees_offered['value'];
		if ($hero) {
			echo '<div class="hero-page flex-wrap" style="background:url(' . $hero . ') no-repeat bottom; background-size: cover;">';
		} else {
			echo '<div class="no-hero flex-wrap">';
		}
		?>

		<div class="header-runner">
			<div class="wrap flex-wrap">
				<header class="entry-header flex-wrap">
					<div class="entry-header-right">
						<span class="entry-header-span-b flex-wrap">
							<?php if ('post' === get_post_type()) :
								// single_post_title('<h1 class="entry-title">', '</h1>');
								echo '<h1 class="entry-title">' . get_the_title($page_for_posts) . '</h1>';
							else : the_title('<h1 class="entry-title">', '</h1>');
							endif; ?>
						</span>
						<?php
						if ('degree' == get_post_type()) {
							echo '<span class="enhero-page try-header-span-c">'; //TODO: Fix this class
							if ($degrees) :
								echo '<!-- Card Degrees Offered Begin --><div class="card-degrees-offered">';
								echo '<ul class="card-list flex-wrap">';
								if (in_array('phd', $degrees)) :
									echo '<li class="phd">Ph.D.</li>';
								endif;
								if (in_array('ma', $degrees)) :
									echo '<li class="ma">M.A.</li>';
								endif;
								if (in_array('ms', $degrees)) :
									echo '<li class="ms">M.S.</li>';
								endif;
								if (in_array('designatedemphasis', $degrees)) :
									echo '<li class="bs">D.E.</li>';
								endif;
								if (in_array('contig', $degrees)) :
									echo '<li class="ma">4+1</li>';
								endif;
								if (in_array('ba', $degrees)) :
									echo '<li class="ba">B.A.</li>';
								endif;
								if (in_array('bs', $degrees)) :
									echo '<li class="bs">B.S.</li>';
								endif;
								if (in_array('undergradminor', $degrees) || in_array('gradminor', $degrees)) :
									echo '<li class="minor">Min.</li>';
								endif;
								echo '</ul>';
								echo '</div><!-- Panel Degrees Offered End -->';
							endif;
						}
						?></span>
					</div>
				</header><!-- .entry-header -->

			</div><!-- .hero-home wrap -->
		</div><!-- .header-runner -->

	</div><!-- .site-branding -->
</header><!-- #masthead -->
<?php
	if ($heroCaption) {
		echo '<div class="wrap"><p class="wp-caption-text thumb-caption-text">' . $heroCaption . '</p></div>';
	}
?>
