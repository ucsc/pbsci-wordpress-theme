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
        $secondaryNav1 = '#da216d';//magenta
        $secondaryNav2 = '#93c02d';//green
        $secondaryNav3 = '#007988';//aquamarine
        echo '<style>';
        echo '.menu-item {color: green}';
        echo '.secondary-navigation li:nth-child(1) i { color: '.$secondaryNav1.'; }';
        echo '.secondary-navigation li:nth-child(2) i { color: '.$secondaryNav2.'; }';
        echo '.secondary-navigation li:nth-child(3) i { color: '.$secondaryNav3.'; }';
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
                $pos = strpos($menuItemTitle, 'Degree');
                // if ($pos !== false){
                //     echo "The string 'Degree' was found in the string '$menuItemTitle'";
                //     echo "and its position is '$pos'";
                //     $fontIcon = 'fa-poo';
                //     echo $fontIcon;
                // } else {
                //     echo "The string 'Degree' was not found in the string '$menuItemTitle'";

                //     $fontIcon = 'fa-thumbs-up';
                //     echo $fontIcon;
                // }

                if (strpos($menuItemTitle, 'Degree') != false){
                    $fontIcon = 'fa-poo';
                    echo "woot!";
                }
                if (strpos($menuItemTitle, 'Academic') != false){
                    $fontIcon = 'fa-facebook';
                    echo "woot!";
                }
                echo "<li id='menu-item-$menuItemID' class='menu-item menu-item-type-post_type menu-item-object-page menu-item-$menuItemID'><a href='$menuItemUrl'><i class='fas $fontIcon'></i><p class='chevron-right-yellow-small'>".$menuItemTitle."</p></a></li>";
            }
            echo '</ul>';
        }
        echo '</div>';
    }
        var_dump($menuSlug);
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