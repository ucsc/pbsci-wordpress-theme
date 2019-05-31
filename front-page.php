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
 /** Panel One */
 if(have_rows('panel_one')):
    while(have_rows('panel_one')): the_row();
        $panelOneHead = get_sub_field('panel_one_heading');
        $panelOneSubhead = get_sub_field('panel_one_subheading');
        if(have_rows('panel_one_cell_one')):
            while(have_rows('panel_one_cell_one')): the_row();
            $panelOneCellOneMedia = get_sub_field('p1_cell_one_media');
            endwhile;
        endif;
    endwhile;
 endif;

/** Panel Two */
$panelTwo = get_field('panel_two');
//  var_dump($panelTwo);
if(have_rows('panel_two')):
    while(have_rows('panel_two')): the_row();
        $panelTwoHead = get_sub_field('panel_two_heading');
        $panelTwoSubhead = get_sub_field('panel_two_subheading');
        if(have_rows('panel_two_cell_one')):
            while(have_rows('panel_two_cell_one')): the_row();
            $panelTwoCellOneMedia = get_sub_field('p2_cell_one_media');
            $panelTwoCellOneMeta = get_sub_field('p2_cell_one_meta');
            $panelTwoCellOneTeaser = get_sub_field('p2_cell_one_teaser');
            endwhile;
        endif;
        if(have_rows('panel_two_cell_two')):
            while(have_rows('panel_two_cell_two')): the_row();
            $panelTwoCellTwoMedia = get_sub_field('p2_cell_two_media');
            $panelTwoCellTwoMeta = get_sub_field('p2_cell_two_meta');
            $panelTwoCellTwoTeaser = get_sub_field('p2_cell_two_teaser');
            endwhile;
        endif;
        if(have_rows('panel_two_cell_three')):
            while(have_rows('panel_two_cell_three')): the_row();
            $panelTwoCellThreeMedia = get_sub_field('p2_cell_three_media');
            $panelTwoCellThreeMeta = get_sub_field('p2_cell_three_meta');
            $panelTwoCellThreeTeaser = get_sub_field('p2_cell_three_teaser');
            endwhile;
        endif;
    endwhile;
 endif;

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
                                    <p class="chevron-right-yellow-small">Facts & rankings</p>
                                </a>
                            </div>
                            <div class="panel-cell-1 flex-wrap panel-cell-quarter">
                                <a class="" href="#">
                                    <i class="fas fa-hand-point-down"></i>
                                    <p class="chevron-right-yellow-small">Alumni success</p>
                                </a>
                            </div>

                        </div>
                        <div class="flex-wrap">
                        <div class="panel-cell-1 flex-wrap panel-cell-quarter">
                                <a class="" href="#">
                                    <i class="fas fa-hand-point-up"></i>
                                    <p class="chevron-right-yellow-small">Student experience</p>
                                </a>
                            </div>
                            <div class="panel-cell-1 flex-wrap panel-cell-quarter">
                                <a class="" href="#">
                                    <i class="fas fa-hand-point-left"></i>
                                    <p class="chevron-right-yellow-small">World-class facilities</p>
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
                        <a href="#" class="white-cell-link"><p class="chevron-right-yellow-small">Program name here</p></a>
                        <p>Ooga booga. Ipsum and what not. Something witty is this here writ.</p>
                    </div>


                    <div class="panel-cell-1">
                        <?php echo $panelThreeCellTwoMedia ?>
                        <a href="#" class="white-cell-link"><p class="chevron-right-yellow-small">Program name here</p></a>
                        <p>Ooga booga. Ipsum and what not. Something witty is this here writ.</p>
                    </div>
                </div>
            </div>
        </section>
    </main><!-- #main -->

</div><!-- #primary -->

<?php

get_footer();