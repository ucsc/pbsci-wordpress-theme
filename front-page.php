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

 /** Panel One Variables */
if(have_rows('panel_one')):
    while(have_rows('panel_one')): the_row();
        $panelOneHead = get_sub_field('panel_one_heading');
        $panelOneSubhead = get_sub_field('panel_one_subheading');
        if(have_rows('panel_one_cell_one')):
            while(have_rows('panel_one_cell_one')): the_row();
            $panelOneCellOneMedia = get_sub_field('p1_cell_one_media');
            endwhile;
        endif;
        if(have_rows('panel_one_cell_two')):
            while(have_rows('panel_one_cell_two')): the_row();
                $panelOneCellTwoQuadOneIcon = get_sub_field('p1_cell_two_quad_one_icon');
                $panelOneCellTwoQuadOneIconColor = get_sub_field('p1_cell_two_quad_one_icon_color');
                $panelOneCellTwoQuadOneLink = get_sub_field('p1_cell_two_quad_one_link');
                    if($panelOneCellTwoQuadOneLink):
                        $panelOneCellTwoQuadOneLinkUrl = $panelOneCellTwoQuadOneLink['url'];
                        $panelOneCellTwoQuadOneLinkTitle = $panelOneCellTwoQuadOneLink['title'];
                    endif;
                $panelOneCellTwoQuadTwoIcon = get_sub_field('p1_cell_two_quad_two_icon');
                $panelOneCellTwoQuadTwoIconColor = get_sub_field('p1_cell_two_quad_two_icon_color');
                $panelOneCellTwoQuadTwoLink = get_sub_field('p1_cell_two_quad_two_link');
                    if($panelOneCellTwoQuadTwoLink):
                        $panelOneCellTwoQuadTwoLinkUrl = $panelOneCellTwoQuadTwoLink['url'];
                        $panelOneCellTwoQuadTwoLinkTitle = $panelOneCellTwoQuadTwoLink['title'];
                    endif;
                $panelOneCellTwoQuadThreeIcon = get_sub_field('p1_cell_two_quad_three_icon');
                $panelOneCellTwoQuadThreeIconColor = get_sub_field('p1_cell_two_quad_three_icon_color');
                $panelOneCellTwoQuadThreeLink = get_sub_field('p1_cell_two_quad_three_link');
                    if($panelOneCellTwoQuadThreeLink):
                        $panelOneCellTwoQuadThreeLinkUrl = $panelOneCellTwoQuadThreeLink['url'];
                        $panelOneCellTwoQuadThreeLinkTitle = $panelOneCellTwoQuadThreeLink['title'];
                    endif;
                $panelOneCellTwoQuadFourIcon = get_sub_field('p1_cell_two_quad_four_icon');
                $panelOneCellTwoQuadFourIconColor = get_sub_field('p1_cell_two_quad_four_icon_color');
                $panelOneCellTwoQuadFourLink = get_sub_field('p1_cell_two_quad_four_link');
                    if($panelOneCellTwoQuadFourLink):
                        $panelOneCellTwoQuadFourLinkUrl = $panelOneCellTwoQuadFourLink['url'];
                        $panelOneCellTwoQuadFourLinkTitle = $panelOneCellTwoQuadFourLink['title'];
                    endif;
            endwhile;
        endif;
    endwhile;
endif;
// var_dump($panelOneCellTwoQuadOneLink);
/** Panel Two Variables*/
if(have_rows('panel_two')):
    while(have_rows('panel_two')): the_row();
        $panelTwoHead = get_sub_field('panel_two_heading');
        $panelTwoSubhead = get_sub_field('panel_two_subheading');
        $panelTwoCellOneMedia = get_sub_field('p2_cell_one_media');
        $panelTwoCellOneMeta = get_sub_field('p2_cell_one_meta');
        $panelTwoCellOneTeaser = get_sub_field('p2_cell_one_teaser');
        $panelTwoCellTwoMedia = get_sub_field('p2_cell_two_media');
        $panelTwoCellTwoMeta = get_sub_field('p2_cell_two_meta');
        $panelTwoCellTwoTeaser = get_sub_field('p2_cell_two_teaser');
        $panelTwoCellThreeMedia = get_sub_field('p2_cell_three_media');
        $panelTwoCellThreeMeta = get_sub_field('p2_cell_three_meta');
        $panelTwoCellThreeTeaser = get_sub_field('p2_cell_three_teaser');
    endwhile;
 endif;

/** Panel Three Variables */

if(have_rows('panel_three')):
    while(have_rows('panel_three')): the_row();
        $panelThreeHead = get_sub_field('panel_three_heading');
        $panelThreeSubhead = get_sub_field('panel_three_subheading');
        $panelThreeCellOneMedia = get_sub_field('p3_cell_one_media');
        $panelThreeCellOneLink = get_sub_field('p3_cell_one_link');
        if($panelThreeCellOneLink):
            $panelThreeCellOneLinkTitle = $panelThreeCellOneLink['title'];
            $panelThreeCellOneLinkUrl = $panelThreeCellOneLink['url'];
            $panelThreeCellOneLinkTarget = $panelThreeCellOneLink['target'] ? $panelThreeCellOneLink['target'] : '_self';
        endif;
        $panelThreeCellOneTeaser = get_sub_field('p3_cell_one_teaser');
        $panelThreeCellTwoMedia = get_sub_field('p3_cell_two_media');
        $panelThreeCellTwoLink = get_sub_field('p3_cell_two_link');
        if($panelThreeCellTwoLink):
            $panelThreeCellTwoLinkTitle = $panelThreeCellTwoLink['title'];
            $panelThreeCellTwoLinkUrl = $panelThreeCellTwoLink['url'];
            $panelThreeCellTwoLinkTarget = $panelThreeCellTwoLink['target'] ? $panelThreeCellTwoLink['target'] : '_self';
        endif;
        $panelThreeCellTwoTeaser = get_sub_field('p3_cell_two_teaser');
    endwhile;
 endif;


/**
 * And now the code
 */
?>

<div id="primary" class="content-area">
    <main id="main" class="site-main">
        <section class="panel panel-one front-page-white-panel">
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
                                <a class="" href="<?php echo esc_url($panelOneCellTwoQuadOneLinkUrl); ?>">
                                    <i class="fas fa-<?php echo $panelOneCellTwoQuadOneIcon?>" style="color:<?php echo $panelOneCellTwoQuadOneIconColor?>"></i>
                                    <p class="chevron-right-yellow-small"><?php echo $panelOneCellTwoQuadOneLinkTitle; ?></p>
                                </a>
                            </div>
                            <div class="panel-cell-1 flex-wrap panel-cell-quarter">
                                <a class="" href="<?php echo esc_url($panelOneCellTwoQuadTwoLinkUrl); ?>">
                                    <i class="fas fa-<?php echo $panelOneCellTwoQuadTwoIcon?>" style="color:<?php echo $panelOneCellTwoQuadTwoIconColor?>"></i>
                                    <p class="chevron-right-yellow-small"><?php echo $panelOneCellTwoQuadTwoLinkTitle; ?></p>
                                </a>
                            </div>

                        </div>
                        <div class="flex-wrap">
                            <div class="panel-cell-1 flex-wrap panel-cell-quarter">
                                <a class="" href="<?php echo esc_url($panelOneCellTwoQuadThreeLinkUrl); ?>">
                                    <i class="fas fa-<?php echo $panelOneCellTwoQuadThreeIcon?>" style="color:<?php echo $panelOneCellTwoQuadThreeIconColor?>"></i>
                                    <p class="chevron-right-yellow-small"><?php echo $panelOneCellTwoQuadThreeLinkTitle; ?></p>
                                </a>
                            </div>
                            <div class="panel-cell-1 flex-wrap panel-cell-quarter">
                                <a class="" href="<?php echo esc_url($panelOneCellTwoQuadFourLinkUrl); ?>">
                                    <i class="fas fa-<?php echo $panelOneCellTwoQuadFourIcon?>" style="color:<?php echo $panelOneCellTwoQuadFourIconColor?>"></i>
                                    <p class="chevron-right-yellow-small"><?php echo $panelOneCellTwoQuadFourLinkTitle; ?></p>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="panel panel-two front-page-blue-panel">
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
        <section class="panel panel-three front-page-white-panel">
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
                        <a href="<?php echo esc_url($panelThreeCellOneLinkUrl); ?>" class="white-cell-link" target="<?php esc_attr($panelThreeCellOneLinkTarget); ?>"><p class="chevron-right-yellow-small"><?php echo esc_html( $panelThreeCellOneLinkTitle); ?></p></a>
                        <p><?php echo $panelThreeCellOneTeaser ?></p>
                    </div>


                    <div class="panel-cell-1">
                        <?php echo $panelThreeCellTwoMedia ?>
                        <a href="<?php echo esc_url($panelThreeCellTwoLinkUrl); ?>" class="white-cell-link" target="<?php esc_attr($panelThreeCellTwoLinkTarget); ?>"><p class="chevron-right-yellow-small"><?php echo esc_html( $panelThreeCellTwoLinkTitle); ?></p></a>
                        <p><?php echo $panelThreeCellTwoTeaser ?></p>
                    </div>
                </div>
            </div>
        </section>
    </main><!-- #main -->

</div><!-- #primary -->

<?php

get_footer();