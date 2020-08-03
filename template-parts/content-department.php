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
    <?php
    $children = get_posts( [ 'post_parent' => $parent->ID, ] );
    if ( !empty ($children) ) {
        $class="show-submenu";
    } else {
        $class="no-submenu";
    }
    ?>
    <div class="entry-content">
        <div class="content-wrapper">
            <div class="content <?php print $class; ?>" >
                <?php the_content(); ?>
            </div>
            <?php if (!empty ($children)) : ?>
            <div class="sidebar <?php print $class; ?>">
                <?php get_template_part( 'template-parts/department-submenu' ) ?>
            </div>
            <?php endif; ?>
        </div>
    </div><!-- .entry-content -->

    <footer class="entry-footer">
        <?php ucsc_pbsci_entry_footer(); ?>
    </footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
</div>