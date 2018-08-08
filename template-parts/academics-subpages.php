<?php
/**
 * Template part for displaying subpage drop-down on academic pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package UC_Santa_Cruz
 */

?>

<!-- Subpages Dropdown -->
<form action="<?php bloginfo('url'); ?>" method="get">
    <?php
	$pageTitle = get_page_by_title('Academics');
	$pageID = $pageTitle->ID; 
	$args = array(
		'depth'                 => 0,
		'child_of'              => $pageID,
		'selected'              => 0,
		'echo'                  => 1,
		'name'                  => 'page_id',
		'id'                    => null, // string
		'class'                 => null, // string
		'show_option_none'      => 'Select One', // string
		'show_option_no_change' => null, // string
		'option_none_value'     => 'No Value', // string
	);

    wp_dropdown_pages($args);

	//echo str_replace('<select ', '<select onchange="this.form.submit()" ', $select);
	//return $select;
    ?>
	<input type="submit" name="submit" value="view" />
	</form>