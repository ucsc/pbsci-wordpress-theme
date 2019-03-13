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

<footer id="colophon" class="site-footer">

    <div class="panel">
        <div class="wrap">
            <div class="flex-wrap">
                <div class="panel-heading footer-top">
                    <a href="#"><h2 class="chevron-right-medium-blue"><span class="span-a">Science</span><span class="span-b">Apply</span>Today</h2></a>
                </div>
            </div>
        </div>
    </div>
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
    <div class="site-info">
        <div class="wrap">
            <div class="footer-legal">
                <ul>
                    <li><a href="http://academicaffairs.ucsc.edu/accreditation/">Accreditation</a><span class="sep"> |
                        </span></li>
                    <li><a
                            href="http://diversity.ucsc.edu/eeo-aa/images/non-discrimination.pdf">Non-Discrimination&nbsp;Policy</a><span
                            class="sep"> | </span>
                    </li>
                    <li><a href="http://www.ucsc.edu/about/employment.html">Employment</a><span class="sep"> | </span>
                    </li>
                    <li><a
                            href="http://its.ucsc.edu/terms/">Privacy&nbsp;Policy&nbsp;&amp;&nbsp;Terms&nbsp;of&nbsp;Use</a><span
                            class="sep"> | </span>
                    </li>
                    <li><a href="http://safe.ucsc.edu">Sexual&nbsp;Violence&nbsp;Prevention&nbsp;&amp;&nbsp;Response</a>
                    </li>
                </ul>
                <p class="page-meta">
                    &copy;<?php echo date("Y");?> Regents of the University of California. All rights reserved.
                </p>
                <p class="page-meta">
                    Last modified: March 26, 2018 <span class="check-ip">128.114.113.73</span>
                </p>
            </div>
        </div>
    </div><!-- .site-info -->

</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>

</html>