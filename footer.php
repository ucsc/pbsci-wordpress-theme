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
                    <h2 class="chevron-right"><span class="span-a">Science</span><span
                            class="span-b">Apply</span>Today</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="wrap">
        <div class="flex-wrap">
            <div class="panel-cell-2 footer-cell">
                <div class="panel-heading-footer flex-wrap">
                    <span class="f-logo"><img
                            src="<?php echo get_stylesheet_directory_uri();?>/images/uc-santa-cruz-reverse.svg" alt=""
                            width="195px" height="auto" /></span><span class="f-text">Science</span>
                </div>
            </div>
            <div class="panel-cell-2 footer-cell">
                <div class="panel-heading">
                    <h2><span>Academic</span>Departments</h2>
                </div>
                <ul class="footer-departments-list">
                    <li class="chevron-right"><a href="#">Astronomy &amp; Astrophysics</a></li>
                    <li class="chevron-right"><a href="#">Chemistry &amp; Biochemistry</a></li>
                </ul>
            </div>
            <div class="panel-cell-2 footer-cell">
                <div class="panel-heading">
                    <h2><span>Sharing</span>Science</h2>
                </div>
                <div class="footer-social-container">
                    <!-- <div class="footer-social"> -->
                        <ul class="footer-social flex-wrap">
                            <li><a href="http://www.facebook.com/ucsantacruz" title="Facebook"><i
                                        class="fab fa-facebook-f" aria-hidden="true"></i></a></li>
                            <li><a href="http://twitter.com/ucsc" title="Twitter"><i class="fab fa-twitter"
                                        aria-hidden="true"></i>
                            <li><a href="http://youtube.com/ucsantacruz" title="YouTube"><i class="fab fa-youtube"
                                        aria-hidden="true"></i></a></li>
                            <li><a href="http://www.linkedin.com/groups?home=&amp;gid=102708" title="LinkedIn"><i class="fab fa-linkedin-in" aria-hidden="true"></i></a></li>
                        </ul>
                    <!-- </div> -->
                </div>
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