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

get_header('home');

/**
 *
 * Home Page Variables
 *
 */
/**
 * Remove HARD CODING
 */
 /** Panel One */
$panelOneHead = get_field('panel_one_heading');
$panelOneSubhead = get_field('panel_one_subheading');
$panelOneCellOneMedia = get_field('p1_cell_one_media');
// var_dump($panelOneCellOneMedia);

/** Panel Two */
$panelTwoHead = get_field('panel_two_heading');
$panelTwoSubhead = get_field('panel_two_subheading');
$panelTwoCellOneMedia = get_field('p2_cell_one_media');
$panelTwoCellOneMeta = get_field('p2_cell_one_meta');
$panelTwoCellOneTeaser = get_field('p2_cell_one_teaser');
$panelTwoCellTwoMedia = get_field('p2_cell_two_media');
$panelTwoCellTwoMeta = get_field('p2_cell_two_meta');
$panelTwoCellTwoTeaser = get_field('p2_cell_two_teaser');
$panelTwoCellThreeMedia = get_field('p2_cell_three_media');
$panelTwoCellThreeMeta = get_field('p2_cell_three_meta');
$panelTwoCellThreeTeaser = get_field('p2_cell_three_teaser');

/** Panel Three */
$panelThreeHead = get_field('panel_three_heading');
$panelThreeSubhead = get_field('panel_three_subheading');
$panelThreeCellOneMedia = get_field('p3_cell_one_media');
$panelThreeCellOneLink = get_field('p3_cell_one_link');
$panelThreeCellOneLinkTitle = get_field('p3_cell_one_link_title');
$panelThreeCellOneTeaser = get_field('p3_cell_one_teaser');
$panelThreeCellTwoMedia = get_field('p3_cell_two_media');
$panelThreeCellTwoLink = get_field('p3_cell_two_link');
$panelThreeCellTwoLinkTitle = get_field('p3_cell_two_link_title');
$panelThreeCellTwoTeaser = get_field('p3_cell_two_teaser');
?>
<div id="primary" class="content-area">
    <main id="main" class="site-main">
        <section class="panel front-page-white-panel">
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
                        <div class="flex-wrap panel-cell-quarter-top">

                            <div class="panel-cell-1 flex-wrap panel-cell-quarter">
                                <a class="" href="#">
                                    <i class="fas fa-hand-point-right"></i>
                                    <p class="chevron-right">Facts & rankings</p>
                                </a>
                            </div>
                            <div class="panel-cell-1 flex-wrap panel-cell-quarter">
                                <a class="" href="#">
                                    <i class="fas fa-hand-point-down"></i>
                                    <p class="chevron-right">Alumni success</p>
                                </a>
                            </div>

                        </div>
                        <div class="flex-wrap">
                        <div class="panel-cell-1 flex-wrap panel-cell-quarter">
                                <a class="" href="#">
                                    <i class="fas fa-hand-point-up"></i>
                                    <p class="chevron-right">Student experience</p>
                                </a>
                            </div>
                            <div class="panel-cell-1 flex-wrap panel-cell-quarter">
                                <a class="" href="#">
                                    <i class="fas fa-hand-point-left"></i>
                                    <p class="chevron-right">World-class facilities</p>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="panel front-page-blue-panel">
            <div class="wrap">
                <div class="flex-wrap">
                    <div class="panel-heading">
                        <h2><?php echo $panelTwoHead?></h2>
                        <p><?php echo $panelTwoSubhead?></p>
                    </div>
                </div>
                <div class="flex-wrap">
                    <div class="panel-cell-2 display-block">
                        <?php echo $panelTwoCellOneMedia ?>
                        <p class="panel-2-cell-meta"><?php echo $panelTwoCellOneMeta?></p>
                        <p><?php echo $panelTwoCellOneTeaser?></p>
                    </div>
                    <div class="panel-cell-2 display-block">
                        <?php echo $panelTwoCellTwoMedia ?>
                        <p class="panel-2-cell-meta"><?php echo $panelTwoCellTwoMeta?></p>
                        <p><?php echo $panelTwoCellTwoTeaser?></p>
                    </div>
                    <div class="panel-cell-2 display-block">
                        <?php echo $panelTwoCellThreeMedia ?>
                        <p class="panel-2-cell-meta"><?php echo $panelTwoCellThreeMeta?></p>
                        <p><?php echo $panelTwoCellThreeTeaser?></p>
                    </div>
                </div>
            </div>
        </section>
        <section class="panel front-page-white-panel">
            <div class="wrap">
                <div class="flex-wrap">
                    <div class="panel-heading">
                        <h2><?php echo $panelThreeHead?></h2>
                        <p><?php echo $panelThreeSubhead?></p>
                    </div>
                </div>
                <div class="flex-wrap">
                    <div class="panel-cell-1">
                        <?php echo $panelThreeCellOneMedia ?>
                        <p class="white-cell-link chevron-right"><a href="#">Program name here</a></p>
                        <p>Ooga booga. Ipsum and what not. Something witty is this here writ.</p>
                    </div>


                    <div class="panel-cell-1">
                        <?php echo $panelThreeCellTwoMedia ?>
                        <p class="white-cell-link chevron-right"><a href="#">Program name here</a></p>
                        <p>Ooga booga. Ipsum and what not. Something witty is this here writ.</p>
                    </div>
                </div>
            </div>
        </section>
    </main><!-- #main -->

</div><!-- #primary -->

<?php

get_footer();