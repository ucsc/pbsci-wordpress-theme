<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package UCSC_PBSci
 */

get_header();

/**
 *
 * Home Page Variables
 *
 */

 /** Panel One */
$panelOneHead = get_field('panel_one_heading',132);
$panelOneSubhead = get_field('panel_one_subheading',132);
$panelOneCellOneMedia = get_field('p1_cell_one_media', 132);
// var_dump($panelOneCellOneMedia);

/** Panel Two */
$panelTwoHead = get_field('panel_two_heading',132);
$panelTwoSubhead = get_field('panel_two_subheading',132);
$panelTwoCellOneMedia = get_field('p2_cell_one_media', 132);
$panelTwoCellOneMeta = get_field('p2_cell_one_meta', 132);
$panelTwoCellOneTeaser = get_field('p2_cell_one_teaser', 132);
$panelTwoCellTwoMedia = get_field('p2_cell_two_media', 132);
$panelTwoCellTwoMeta = get_field('p2_cell_two_meta', 132);
$panelTwoCellTwoTeaser = get_field('p2_cell_two_teaser', 132);
$panelTwoCellThreeMedia = get_field('p2_cell_three_media', 132);
$panelTwoCellThreeMeta = get_field('p2_cell_three_meta', 132);
$panelTwoCellThreeTeaser = get_field('p2_cell_three_teaser', 132);

/** Panel Three */
$panelThreeHead = get_field('panel_three_heading',132);
$panelThreeSubhead = get_field('panel_three_subheading',132);
$panelThreeCellOneMedia = get_field('p3_cell_one_media', 132);
$panelThreeCellOneLink = get_field('p3_cell_one_link', 132);
$panelThreeCellOneLinkTitle = get_field('p3_cell_one_link_title', 132);
$panelThreeCellOneTeaser = get_field('p3_cell_one_teaser', 132);
$panelThreeCellTwoMedia = get_field('p3_cell_two_media', 132);
$panelThreeCellTwoLink = get_field('p3_cell_two_link', 132);
$panelThreeCellTwoLinkTitle = get_field('p3_cell_two_link_title', 132);
$panelThreeCellTwoTeaser = get_field('p3_cell_two_teaser', 132);
?>
<div id="primary" class="content-area">
    <main id="main" class="site-main">
        <div class="panel">
            <div class="wrap">
                <div class="flex-wrap">
                    <div class="panel-heading">
                        <h2><?php echo $panelOneHead?></h2>
                        <p><?php echo $panelOneSubhead?></p>
                    </div>
                </div>

                <div class="flex-wrap">
                    <div class="panel-cell-1 display-block">
                        <?php echo $panelOneCellOneMedia ?>
                    </div>

                    <div class="panel-cell-1">
                        <div class="flex-wrap">
                            <div class="panel-cell-1 flex-wrap 		panel-cell-quarter">
                                <i class="fas fa-hand-point-right"></i>
                                <p>Facts & rankings</p>
                            </div>
                            <div class="panel-cell-1 flex-wrap 		panel-cell-quarter">
                                <i class="fas fa-cannabis"></i>
                                <p>Alumni success</p>
                            </div>
                        </div>
                        <div class="flex-wrap">
                            <div class="panel-cell-1 flex-wrap 		panel-cell-quarter">
                                <i class="fas fa-bong"></i>
                                <p>Student experience</p>
                            </div>
                            <div class="panel-cell-1 flex-wrap 		panel-cell-quarter">
                                <i class="fas fa-hand-point-left"></i>
                                <p>World-class facilities</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="panel front-page-blue-panel topo-left">
            <div class="wrap">
                <div class="flex-wrap">
                    <div class="panel-heading">
                        <!-- <h2><span>Mind</span>Blowing</h2> -->
                        <h2><?php echo $panelTwoHead?></h2>
                        <p><?php echo $panelTwoSubhead?></p>
                    </div>
                </div>
                <div class="flex-wrap">
                    <div class="panel-cell-2 display-block">
                        <iframe width="560" height="315" src="https://www.youtube.com/embed/04nKIkvEOoY" frameborder="0"
                            allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen></iframe>
                    </div>
                    <div class="panel-cell-2 display-block">
                        <iframe width="560" height="315" src="https://www.youtube.com/embed/WP3WK8Lwtws" frameborder="0"
                            allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen></iframe>
                    </div>
                    <div class="panel-cell-2 display-block">
                        <iframe width="560" height="315" src="https://www.youtube.com/embed/Yq2jJLswL8I" frameborder="0"
                            allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen></iframe>
                    </div>
                </div>
            </div>
        </div>
        <div class="panel">
            <div class="wrap">
                <div class="flex-wrap">
                    <div class="panel-heading">
                        <h2><span>Bragging</span>Rights</h2>
                        <h2><?php echo $panelThreeHead?></h2>
                        <p><?php echo $panelThreeSubhead?></p>
                    </div>
                </div>
                <div class="flex-wrap">
                    <div class="panel-cell-1">
                        <iframe width="560" height="315" src="https://www.youtube.com/embed/k32voqQhODc" frameborder="0"
                            allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen></iframe>
                            <p class="white-cell-link chevron-right"><a href="#">Program name here</a></p>
                            <p>Ooga booga. Ipsum and what not. Something witty is this here writ.</p>
                    </div>


                    <div class="panel-cell-1">
                        <iframe width="560" height="315" src="https://www.youtube.com/embed/lf0wPU59PfI" frameborder="0"
                            allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen></iframe>
                            <p class="white-cell-link chevron-right"><a href="#">Program name here</a></p>
                            <p>Ooga booga. Ipsum and what not. Something witty is this here writ.</p>
                    </div>
                </div>
            </div>
        </div>
    </main><!-- #main --><div id="primary" class="content-area">
    <main id="main" class="site-main">
        <div class="panel">
            <div class="wrap">
                <div class="flex-wrap">
                    <div class="panel-heading">
</div><!-- #primary -->

<?php

get_footer();