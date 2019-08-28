<?php

/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package UCSC_PBSci
 */
$page_blurb = get_field('page_blurb');
?>

<div class="wrap">
    <?php if (has_excerpt()) {
        the_excerpt();
    }
    if (is_page('academics')) {
        $secondaryMenu = 'menu-3';
    }
    if (is_page('research')) {
        $secondaryMenu = 'menu-2';
    }
    if (is_page('academics') || is_page('research')) {
        $secondaryNavCustomRows = get_field('secondary_navigation_customization');
        if ($secondaryNavCustomRows) {
            $customRowsCount = count($secondaryNavCustomRows);
            if (($customRowsCount < 4) && ($customRowsCount > 2)) {
                $customRowOne = $secondaryNavCustomRows[0];
                $customRowTwo = $secondaryNavCustomRows[1];
                $customRowThree = $secondaryNavCustomRows[2];
            }
            // for($i=0;$i<$customRowsCount;$i++){}
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
                echo "<li id='menu-item-$menuItemID' class='menu-item menu-item-type-post_type menu-item-object-page menu-item-$menuItemID'><a href='$menuItemUrl'><i style='color: $fontIconColor'class='fas fa-$fontIcon'></i><p class='chevron-right-yellow-small'>" . $menuItemTitle . "</p></a></li>";
            }
            echo '</ul>';
        }
        echo '</div>';
    }
    // debug
    // echo '<pre>';
    // var_dump($secondaryNav3);
    // echo '</pre>';
    // end debug
    ?>
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

        <div class="entry-content">
            <?php
            the_content();

            wp_link_pages(array(
                'before' => '<div class="page-links">' . esc_html__('Pages:', 'ucsc-pbsci'),
                'after'  => '</div>',
            ));
            ?>
        </div><!-- .entry-content -->
        <?php if (get_edit_post_link()) : ?>
        <footer class="entry-footer">
            <?php
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
                ?>
        </footer><!-- .entry-footer -->
        <?php endif; ?>
    </article><!-- #post-<?php the_ID(); ?> -->
</div>