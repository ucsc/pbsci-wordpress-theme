<?php

/**
 * Template part for displaying some landing page content based on page title
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package UCSC_PBSci
 */


if (is_page('academics')) {
	$secondaryMenu = 'menu-3';
}
if (is_page('research')) {
	$secondaryMenu = 'menu-2';
}
if (is_page(array('academics','research'))){
	$secondaryNavCustomRows = get_field('secondary_navigation_customization');
	if ($secondaryNavCustomRows) {
		$customRowsCount = count($secondaryNavCustomRows);
		if (($customRowsCount < 4) && ($customRowsCount > 2)) {
			$customRowOne = $secondaryNavCustomRows[0];
			$customRowTwo = $secondaryNavCustomRows[1];
			$customRowThree = $secondaryNavCustomRows[2];
		}
	}
	$secondaryNav1 = $customRowOne['secondary_navigation_label'];
	$secondaryIcon1 = $customRowOne['secondary_navigation_icon'];
	$secondaryIconColor1 = $customRowOne['secondary_navigation_icon_color'];
	$secondaryNav2 = $customRowTwo['secondary_navigation_label'];
	$secondaryIcon2 = $customRowTwo['secondary_navigation_icon'];
	$secondaryIconColor2 = $customRowTwo['secondary_navigation_icon_color'];
	$secondaryNav3 = $customRowThree['secondary_navigation_label'];
	$secondaryIcon3 = $customRowThree['secondary_navigation_icon'];
	$secondaryIconColor3 = $customRowThree['secondary_navigation_icon_color'];
	echo '<div class="secondary-menu-container">';
	$menuLocations = get_nav_menu_locations();
	if (has_nav_menu($secondaryMenu)) {
		$menuID = $menuLocations[$secondaryMenu];
		$menuObject = wp_get_nav_menu_object($menuID);
		$menuSlug = $menuObject->slug;
		$menuItems = wp_get_nav_menu_items($menuID);
		$itemCount = count($menuItems);
		echo '<ul id="menu-' . $menuSlug . '" class="menu secondary-navigation flex-wrap">';

		foreach ($menuItems as $menuItem) {
			$menuItemTitle = $menuItem->title;
			$menuItemUrl = $menuItem->url;
			$menuItemID = $menuItem->ID;
			$pos = strpos($menuItemTitle, $secondaryNav1);
			$pos1 = strpos($menuItemTitle, $secondaryNav2);
			$pos2 = strpos($menuItemTitle, $secondaryNav3);
			if ($pos !== false) {
				$fontIcon = $secondaryIcon1;
				$fontIconColor = $secondaryIconColor1;
			}
			if ($pos1 !== false) {
				$fontIcon = $secondaryIcon2;
				$fontIconColor = $secondaryIconColor2;
			}
			if ($pos2 !== false) {
				$fontIcon = $secondaryIcon3;
				$fontIconColor = $secondaryIconColor3;
			}
			echo "<li id='menu-item-$menuItemID' class='menu-item menu-item-type-post_type menu-item-object-page menu-item-$menuItemID'><a href='$menuItemUrl'><i style='color: $fontIconColor'class='fas fa-$fontIcon'></i><p>" . $menuItemTitle . "</p></a></li>";
		}
		echo '</ul>';
	}
	echo '</div>';
}

?>