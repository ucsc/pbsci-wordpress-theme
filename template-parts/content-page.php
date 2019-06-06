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
<?php if(has_excerpt()) {
    the_excerpt();
}
    if(is_page('academics')) {
        $secondaryMenu = 'menu-3';
    }
    if(is_page('research')) {
        $secondaryMenu = 'menu-2';
    }
    if(is_page('academics')||is_page('research')){
        echo '<style>';
        echo '.menu-item {color: green}';
        // li:nth-child(1) i { color: $ucsc--green; }
        // }
        // &:nth-child(2) {
        //     a {
        //         i {
        //             color: $ucsc--magenta;
        //         }
        //     }
        // }
        // &:nth-child(3) {
        //     a {
        //         i {
        //             color: $ucsc--lighter-blue;
        //         }
        //     }
        // }
        echo '</style>';
        echo '<div class="secondary-menu-container">';

        $menuLocations = get_nav_menu_locations();
        if (has_nav_menu($secondaryMenu)){
            $menuID = $menuLocations[$secondaryMenu];
            $menuObject = wp_get_nav_menu_object($menuID);
            $menuSlug = $menuObject->slug;
            $menuItems = wp_get_nav_menu_items($menuID);
            echo '<ul id="menu-'.$menuSlug.'" class="menu secondary-navigation flex-wrap">';
            foreach($menuItems as $menuItem){
                $menuItemTitle = $menuItem->title;
                $menuItemUrl = $menuItem->url;
                $menuItemID = $menuItem->ID;
                if (strpos($menuItemTitle, 'Degree') != false){
                    $fontIcon = 'fa-poo';
                } else {
                    $fontIcon = 'fa-user-graduate';
                }
                echo "<li id='menu-item-$menuItemID' class='menu-item menu-item-type-post_type menu-item-object-page menu-item-$menuItemID'><a href='$menuItemUrl'><i class='fas $fontIcon'></i><p class='chevron-right-yellow-small'>".$menuItemTitle."</p></a></li>";
            }
            echo '</ul>';
        }
        echo '</div>';
    }
        var_dump($menuItemTitle);
    if(is_page('academics')||is_page('research')){
        if (has_nav_menu($secondaryMenu)){
            wp_nav_menu( array(
                'theme_location' => $secondaryMenu,
                'link_before' => '<i class="fas '.$fontIcon.'"></i><p class="chevron-right-yellow-small">',
                'link_after' => '</p>',
                'menu_class' => 'menu secondary-navigation flex-wrap',
            ) );
        }

    }
?>
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

        <div class="entry-content">
            <?php
        the_content();

        wp_link_pages( array(
            'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'ucsc-pbsci' ),
            'after'  => '</div>',
        ) );
        ?>
        </div><!-- .entry-content -->
        <?php if ( get_edit_post_link() ) : ?>
        <footer class="entry-footer">
            <?php
            edit_post_link(
                sprintf(
                    wp_kses(
                        /* translators: %s: Name of current post. Only visible to screen readers */
                        __( 'Edit <span class="screen-reader-text">%s</span>', 'ucsc-pbsci' ),
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