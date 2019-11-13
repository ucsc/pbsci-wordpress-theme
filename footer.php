<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package UCSC_PBSci
 */

?>

</div><!-- #content -->
<?php
if (class_exists('acf')) {
    $cta = get_field('call_to_action', 'option');
    if ($cta['cta_switch']) : get_template_part('template-parts/footer', 'cta');
    endif;
}
get_template_part('template-parts/to', 'top');

?>
<footer id="colophon" class="site-footer front-page-blue-panel">
    <?php //get_template_part( 'template-parts/footer', 'applytoday' );
    ?>
    <div class="wrap">
        <div class="flex-wrap">
            <div class="panel-cell-2 footer-cell">
                <?php get_sidebar('footer-one'); ?>
            </div>
            <div class="panel-cell-2 footer-cell">
                <?php get_sidebar('footer-two'); ?>
            </div>
            <div class="panel-cell-2 footer-cell">
                <?php get_sidebar('footer-three'); ?>
            </div>
        </div>
    </div>
    <?php
    $footerLinks = get_field('footer_links', 'option');
    if ($footerLinks) {
        echo '<div class="site-info"><div class="wrap"><div class="footer-legal"><a href="https://science.ucsc.edu"><img src="' . IMAGES . '/science-logo.svg" alt="Science at UC Santa Cruz"/></a><ul>';
        foreach ($footerLinks as $footerLink) {
            echo '<li><a href="' . $footerLink['footer_link_url'] . '">' . $footerLink['footer_link_text'] . '</a></li>';
        }
        echo '</ul><p class="page-meta">
        &copy;' . date("Y") . ' Regents of the University of California. All rights reserved.</p><p class="page-meta">Last modified: ' . get_the_modified_date() . '</p></div></div><!-- .site-info -->';
    }
    ?>
</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>

</html>