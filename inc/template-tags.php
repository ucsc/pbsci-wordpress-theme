<?php

/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package UCSC_PBSci
 */

if (!function_exists('ucsc_pbsci_posted_on')) :
	/**
	 * Prints HTML with meta information for the current post-date/time.
	 */
	function ucsc_pbsci_posted_on()
	{
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if (get_the_time('U') !== get_the_modified_time('U')) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
		}

		$time_string = sprintf(
			$time_string,
			esc_attr(get_the_date(DATE_W3C)),
			esc_html(get_the_date()),
			esc_attr(get_the_modified_date(DATE_W3C)),
			esc_html(get_the_modified_date())
		);

		$posted_on = sprintf(
			/* translators: %s: post date. */
			esc_html_x('%s', 'post date', 'ucsc-pbsci'),
			'<a href="' . esc_url(get_permalink()) . '" rel="bookmark">' . $time_string . '</a>'
		);

		echo '<span class="posted-on">' . $posted_on . '</span>'; // WPCS: XSS OK.

	}
endif;
if (!function_exists('ucsc_pbsci_author_full_name')) :
	function ucsc_pbsci_author_full_name()
	{
		$fname = get_the_author_meta('first_name');
		$lname = get_the_author_meta('last_name');
		$full_name = '';

		if (empty($fname)) {
			$full_name = $lname;
		} elseif (empty($lname)) {
			$full_name = $fname;
		} else {
			//both first name and last name are present
			$full_name = "{$fname} {$lname}";
		}

		echo $full_name;
	}
endif;
if (!function_exists('ucsc_pbsci_posted_by')) :
	/**
	 * Prints HTML with meta information for the current author.
	 * 
	 * 
	 */
	function ucsc_pbsci_posted_by()	{
		$linkAuthor = get_field('post_author');
		if (!empty($linkAuthor)) {
			$byline = 'By <span class="author vcard"><a class="url fn n" href="'.$linkAuthor['url'].'">'.$linkAuthor['title'].'</a></span>';
		} else {
			$byline = sprintf(
				/* translators: %s: post author. */
				esc_html_x('By %s', 'post author', 'ucsc-pbsci'),
				'<span class="author vcard"><a class="url fn n" href="' . esc_url(get_author_posts_url(get_the_author_meta('ID'))) . '">' . esc_html(get_the_author()) . '</a></span>'
			);
		}
		echo '<span class="byline"> ' . $byline . '</span>'; // WPCS: XSS OK.

	}
endif;

if (!function_exists('ucsc_pbsci_entry_footer')) :
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function ucsc_pbsci_entry_footer()
	{
		// Hide category and tag text for pages.
		if ('post' === get_post_type()) {
			/* translators: used between list items, there is a space after the comma */
			// $categories_list = get_the_category_list(esc_html__(', ', 'ucsc-pbsci'));
			// if ($categories_list) {
			// 	/* translators: 1: list of categories. */
			// 	printf('<span class="cat-links">' . esc_html__('Posted in %1$s', 'ucsc-pbsci') . '</span>', $categories_list); // WPCS: XSS OK.
			// }

			/* translators: used between list items, there is a space after the comma */
			$tags_list = get_the_tag_list('', esc_html_x(', ', 'list item separator', 'ucsc-pbsci'));
			if ($tags_list) {
				/* translators: 1: list of tags. */
				printf('<span class="tags-links">' . esc_html__('Topics: %1$s', 'ucsc-pbsci') . '</span>', $tags_list); // WPCS: XSS OK.
			}
		}

		if (!is_single() && !post_password_required() && (comments_open() || get_comments_number())) {
			echo '<span class="comments-link">';
			comments_popup_link(
				sprintf(
					wp_kses(
						/* translators: %s: post title */
						__('Leave a Comment<span class="screen-reader-text"> on %s</span>', 'ucsc-pbsci'),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					get_the_title()
				)
			);
			echo '</span>';
		}

		edit_post_link(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__('Edit <span class="screen-reader-text">%s</span>', 'ucsc-pbsci'),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				get_the_title()
			),
			'<span class="edit-link">',
			'</span>'
		);
	}
endif;
if (!function_exists('ucsc_pbsci_post_cats')) :
	/**
	 * Prints HTML with meta information for the categories.
	 */
	function ucsc_pbsci_post_cats()
	{
		// Hide category and tag text for pages.
		if ('post' === get_post_type()) {
			/* translators: used between list items, there is a space after the comma */
			$categories_list = get_the_category_list(esc_html__(', ', 'ucsc-pbsci'));
			if ($categories_list) {
				/* translators: 1: list of categories. */
				printf('<span class="cat-links">' . esc_html__('%1$s', 'ucsc-pbsci') . '</span>', $categories_list); // WPCS: XSS OK.
			}
		}
	}
endif;

if (!function_exists('ucsc_pbsci_post_tags')) :
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function ucsc_pbsci_post_tags()
	{
		// Hide category and tag text for pages.
		if ('post' === get_post_type()) {
			/* translators: used between list items, there is a space after the comma */
			$categories_list = get_the_category_list(esc_html__(', ', 'ucsc-pbsci'));
			if ($categories_list) {
				/* translators: 1: list of categories. */
				printf('<span class="cat-links">' . esc_html__('Posted in %1$s', 'ucsc-pbsci') . '</span>', $categories_list); // WPCS: XSS OK.
			}

			/* translators: used between list items, there is a space after the comma */
			$tags_list = get_the_tag_list('', esc_html_x(', ', 'list item separator', 'ucsc-pbsci'));
			if ($tags_list) {
				/* translators: 1: list of tags. */
				printf('<span class="tags-links">' . esc_html__('Tagged %1$s', 'ucsc-pbsci') . '</span>', $tags_list); // WPCS: XSS OK.
			}
		}
	}
endif;

if (!function_exists('ucsc_pbsci_post_thumbnail')) :
	/**
	 * Displays an optional post thumbnail.
	 *
	 * Wraps the post thumbnail in an anchor element on index views, or a div
	 * element when on single views.
	 */
	function ucsc_pbsci_post_thumbnail($size = 'post-thumbnail')
	{
	    if ( empty($size) ) {
	        $size = 'post-thumbnail';
        }
		if (post_password_required() || is_attachment() || !has_post_thumbnail()) {
			return;
		}

		if (is_singular()) :
			?>

<div class="post-thumbnail">
    <?php the_post_thumbnail(); ?>
</div><!-- .post-thumbnail -->

<?php else : ?>

            <a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
				<?php
				the_post_thumbnail($size, array(
					'alt' => the_title_attribute(array(
						'echo' => false,
					)),
				));
				?>
            </a>

<?php
		endif; // End is_singular().
	}
endif;

if (!function_exists('ucsc_pbsci_post_title')) :
	/**
	 * Displays Post/News Title
	 *
	 *
	 */
	/**
	 * Displays an optional post thumbnail.
	 *
	 * Wraps the post thumbnail in an anchor element on index views, or a div
	 * element when on single views.
	 */
	function ucsc_pbsci_post_title()
	{
		the_title('<h2 class="entry-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>');
	};
endif;
if (!function_exists('ucsc_pbsci_related_post_title')) :
	/**
	 * Displays Post/News Title
	 *
	 *
	 */
	/**
	 * Displays an optional post thumbnail.
	 *
	 * Wraps the post thumbnail in an anchor element on index views, or a div
	 * element when on single views.
	 */
	function ucsc_pbsci_related_post_title()
	{
		the_title('<h4 class="entry-title related-post-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h4>');
	};
endif;