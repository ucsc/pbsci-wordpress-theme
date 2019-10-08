<?php

/**
 * The template for displaying the front page
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
if (have_rows('panel_one')) :
    while (have_rows('panel_one')) : the_row();
        $panelOneHead = get_sub_field('panel_one_heading');
        $panelOneSubhead = get_sub_field('panel_one_subheading');
        if (have_rows('panel_one_cell_one')) :
            while (have_rows('panel_one_cell_one')) : the_row();
                $panelOneCellOneMedia = get_sub_field('p1_cell_one_media');
            endwhile;
        endif;
        if (have_rows('panel_one_cell_two')) :
            while (have_rows('panel_one_cell_two')) : the_row();
                $panelOneCellTwoQuadOneIcon = get_sub_field('p1_cell_two_quad_one_icon');
                $panelOneCellTwoQuadOneIconColor = get_sub_field('p1_cell_two_quad_one_icon_color');
                $panelOneCellTwoQuadOneLink = get_sub_field('p1_cell_two_quad_one_link');
                if ($panelOneCellTwoQuadOneLink) :
                    $panelOneCellTwoQuadOneLinkUrl = $panelOneCellTwoQuadOneLink['url'];
                    $panelOneCellTwoQuadOneLinkTitle = $panelOneCellTwoQuadOneLink['title'];
                endif;
                $panelOneCellTwoQuadTwoIcon = get_sub_field('p1_cell_two_quad_two_icon');
                $panelOneCellTwoQuadTwoIconColor = get_sub_field('p1_cell_two_quad_two_icon_color');
                $panelOneCellTwoQuadTwoLink = get_sub_field('p1_cell_two_quad_two_link');
                if ($panelOneCellTwoQuadTwoLink) :
                    $panelOneCellTwoQuadTwoLinkUrl = $panelOneCellTwoQuadTwoLink['url'];
                    $panelOneCellTwoQuadTwoLinkTitle = $panelOneCellTwoQuadTwoLink['title'];
                endif;
                $panelOneCellTwoQuadThreeIcon = get_sub_field('p1_cell_two_quad_three_icon');
                $panelOneCellTwoQuadThreeIconColor = get_sub_field('p1_cell_two_quad_three_icon_color');
                $panelOneCellTwoQuadThreeLink = get_sub_field('p1_cell_two_quad_three_link');
                if ($panelOneCellTwoQuadThreeLink) :
                    $panelOneCellTwoQuadThreeLinkUrl = $panelOneCellTwoQuadThreeLink['url'];
                    $panelOneCellTwoQuadThreeLinkTitle = $panelOneCellTwoQuadThreeLink['title'];
                endif;
                $panelOneCellTwoQuadFourIcon = get_sub_field('p1_cell_two_quad_four_icon');
                $panelOneCellTwoQuadFourIconColor = get_sub_field('p1_cell_two_quad_four_icon_color');
                $panelOneCellTwoQuadFourLink = get_sub_field('p1_cell_two_quad_four_link');
                if ($panelOneCellTwoQuadFourLink) :
                    $panelOneCellTwoQuadFourLinkUrl = $panelOneCellTwoQuadFourLink['url'];
                    $panelOneCellTwoQuadFourLinkTitle = $panelOneCellTwoQuadFourLink['title'];
                endif;
            endwhile;
        endif;
    endwhile;
endif;

/** Panel Two Variables*/
if (have_rows('panel_two')) :
    while (have_rows('panel_two')) : the_row();
        $panelTwoHead = get_sub_field('panel_two_heading');
        $panelTwoSubhead = get_sub_field('panel_two_subheading');
        $panelTwoCellOneConditional = get_sub_field('p2_cell_one_image_or_video');
        $panelTwoCellOneMedia = get_sub_field('p2_cell_one_media');
        $panelTwoCellOneMeta = get_sub_field('p2_cell_one_meta');
        $panelTwoCellOneTeaser = get_sub_field('p2_cell_one_teaser');
        $panelTwoCellOneImage = get_sub_field('p2_cell_one_image');
        $panelTwoCellOneImageTeaser = get_sub_field('p2_cell_one_image_teaser');
        $panelTwoCellOneLink = get_sub_field('p2_cell_one_link');
        if ($panelTwoCellOneLink) :
            $panelTwoCellOneLinkTitle = $panelTwoCellOneLink['title'];
            $panelTwoCellOneLinkUrl = $panelTwoCellOneLink['url'];
            $panelTwoCellOneLinkTarget = $panelTwoCellOneLink['target'] ? $panelTwoCellOneLink['target'] : '_self';
        endif;
        $panelTwoCellTwoConditional = get_sub_field('p2_cell_two_image_or_video');
        $panelTwoCellTwoMedia = get_sub_field('p2_cell_two_media');
        $panelTwoCellTwoMeta = get_sub_field('p2_cell_two_meta');
        $panelTwoCellTwoTeaser = get_sub_field('p2_cell_two_teaser');
        $panelTwoCellTwoImage = get_sub_field('p2_cell_two_image');
        $panelTwoCellTwoImageTeaser = get_sub_field('p2_cell_two_image_teaser');
        $panelTwoCellTwoLink = get_sub_field('p2_cell_two_link');
        if ($panelTwoCellTwoLink) :
            $panelTwoCellTwoLinkTitle = $panelTwoCellTwoLink['title'];
            $panelTwoCellTwoLinkUrl = $panelTwoCellTwoLink['url'];
            $panelTwoCellTwoLinkTarget = $panelTwoCellTwoLink['target'] ? $panelTwoCellTwoLink['target'] : '_self';
        endif;
        $panelTwoCellThreeConditional = get_sub_field('p2_cell_three_image_or_video');
        $panelTwoCellThreeMedia = get_sub_field('p2_cell_three_media');
        $panelTwoCellThreeMeta = get_sub_field('p2_cell_three_meta');
        $panelTwoCellThreeTeaser = get_sub_field('p2_cell_three_teaser');
        $panelTwoCellThreeImage = get_sub_field('p2_cell_three_image');
        $panelTwoCellThreeImageTeaser = get_sub_field('p2_cell_three_image_teaser');
        $panelTwoCellThreeLink = get_sub_field('p2_cell_three_link');
        if ($panelTwoCellThreeLink) :
            $panelTwoCellThreeLinkTitle = $panelTwoCellThreeLink['title'];
            $panelTwoCellThreeLinkUrl = $panelTwoCellThreeLink['url'];
            $panelTwoCellThreeLinkTarget = $panelTwoCellThreeLink['target'] ? $panelTwoCellThreeLink['target'] : '_self';
        endif;
    endwhile;
endif;

/** Panel Three Variables */
if (have_rows('panel_three')) :
    while (have_rows('panel_three')) : the_row();
        $panelThreeHead = get_sub_field('panel_three_heading');
        $panelThreeSubhead = get_sub_field('panel_three_subheading');
        $panelThreeCellOneMedia = get_sub_field('p3_cell_one_media');
        $panelThreeCellOneLink = get_sub_field('p3_cell_one_link');
        if ($panelThreeCellOneLink) :
            $panelThreeCellOneLinkTitle = $panelThreeCellOneLink['title'];
            $panelThreeCellOneLinkUrl = $panelThreeCellOneLink['url'];
            $panelThreeCellOneLinkTarget = $panelThreeCellOneLink['target'] ? $panelThreeCellOneLink['target'] : '_self';
        endif;
        $panelThreeCellOneTeaser = get_sub_field('p3_cell_one_teaser');
        $panelThreeCellTwoMedia = get_sub_field('p3_cell_two_media');
        $panelThreeCellTwoLink = get_sub_field('p3_cell_two_link');
        if ($panelThreeCellTwoLink) :
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
                        <h2><?php echo $panelOneHead ?></h2>
                        <p><?php echo $panelOneSubhead ?></p>
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
                                    <i class="fas fa-<?php echo $panelOneCellTwoQuadOneIcon ?>"
                                        style="color:<?php echo $panelOneCellTwoQuadOneIconColor ?>"></i>
                                    <p><?php echo $panelOneCellTwoQuadOneLinkTitle; ?></p>
                                </a>
                            </div>
                            <div class="panel-cell-1 flex-wrap panel-cell-quarter">
                                <a class="" href="<?php echo esc_url($panelOneCellTwoQuadTwoLinkUrl); ?>">
                                    <i class="fas fa-<?php echo $panelOneCellTwoQuadTwoIcon ?>"
                                        style="color:<?php echo $panelOneCellTwoQuadTwoIconColor ?>"></i>
                                    <p><?php echo $panelOneCellTwoQuadTwoLinkTitle; ?></p>
                                </a>
                            </div>
                        </div>
                        <div class="flex-wrap">
                            <div class="panel-cell-1 flex-wrap panel-cell-quarter">
                                <a class="" href="<?php echo esc_url($panelOneCellTwoQuadThreeLinkUrl); ?>">
                                    <i class="fas fa-<?php echo $panelOneCellTwoQuadThreeIcon ?>"
                                        style="color:<?php echo $panelOneCellTwoQuadThreeIconColor ?>"></i>
                                    <p><?php echo $panelOneCellTwoQuadThreeLinkTitle; ?></p>
                                </a>
                            </div>
                            <div class="panel-cell-1 flex-wrap panel-cell-quarter">
                                <a class="" href="<?php echo esc_url($panelOneCellTwoQuadFourLinkUrl); ?>">
                                    <i class="fas fa-<?php echo $panelOneCellTwoQuadFourIcon ?>"
                                        style="color:<?php echo $panelOneCellTwoQuadFourIconColor ?>"></i>
                                    <p><?php echo $panelOneCellTwoQuadFourLinkTitle; ?></p>
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
                        <h2><?php echo $panelTwoHead ?></h2>
                        <p><?php echo $panelTwoSubhead ?></p>
                    </div>
                </div>
                <div class="flex-wrap">
                    <div class="panel-cell-2 display-block">
                        <?php 
                        if (!empty($panelTwoCellOneConditional)) {
                            if ($panelTwoCellOneConditional == 'image') {
                                if ($panelTwoCellOneImage) {
                                    $size = 'home-grid';
                                    echo '<a class="cell-image-link" href="'.esc_url($panelTwoCellOneLinkUrl).'" class="white-cell-link"
                                    target="'.esc_attr($panelTwoCellOneLinkTarget).'"><img src="'.$panelTwoCellOneImage['sizes'][$size].'" title="'.$panelTwoCellOneImage['title'].'" alt="'.$panelTwoCellOneImage['alt'].'"></a>';
                                }
                                
                            } elseif ($panelTwoCellOneConditional == 'video'){
                                echo $panelTwoCellOneMedia;
                            }
                        } else {
                            echo '<p>You missed something, partner! Pleae select "Image" or "Video" in the page editor.</p>';
                        } 
                        if (!empty($panelTwoCellOneConditional)) {
                            if ($panelTwoCellOneConditional == 'image') {
                              echo '<a class="cell-meta-link" href="'.esc_url($panelTwoCellOneLinkUrl).'"
                            target="'.esc_attr($panelTwoCellOneLinkTarget).'">
                            <p class="panel-2-cell-meta">'.esc_html($panelTwoCellOneLinkTitle).'</p></a>';
                            }elseif ($panelTwoCellOneConditional == 'video') {
                                echo '<p class="panel-2-cell-meta">'.$panelTwoCellOneMeta .'</p>';
                            }
                        } else {
                            echo '<p>You missed something, partner! Pleae select "Image" or "Video" in the page editor.</p>';
                        }
                        if (!empty($panelTwoCellOneConditional)) {
                            if ($panelTwoCellOneConditional == 'image') {
                                echo '<p>'.$panelTwoCellOneImageTeaser.'</p>';
                            }elseif ($panelTwoCellOneConditional == 'video') {
                                echo '<p>'.$panelTwoCellOneTeaser.'</p>';
                            }
                        }
                        ?>
                    </div>
                    <div class="panel-cell-2 display-block">
                        <?php 
                        if (!empty($panelTwoCellTwoConditional)) {
                            if ($panelTwoCellTwoConditional == 'image') {
                                if ($panelTwoCellTwoImage) {
                                    $size = 'home-grid';
                                    echo '<a class="cell-image-link" href="'.esc_url($panelTwoCellTwoLinkUrl).'" class="white-cell-link"
                                    target="'.esc_attr($panelTwoCellTwoLinkTarget).'"><img src="'.$panelTwoCellTwoImage['sizes'][$size].'" title="'.$panelTwoCellTwoImage['title'].'" alt="'.$panelTwoCellTwoImage['alt'].'"></a>';
                                }                             
                            } elseif ($panelTwoCellTwoConditional == 'video'){
                                echo $panelTwoCellTwoMedia;
                            }
                        } else {
                            echo '<p>You missed something, partner! Pleae select "Image" or "Video" in the page editor.</p>';
                        } 
                        if (!empty($panelTwoCellTwoConditional)) {
                            if ($panelTwoCellTwoConditional == 'image') {
                              echo '<a class="cell-meta-link" href="'.esc_url($panelTwoCellTwoLinkUrl).'"
                            target="'.esc_attr($panelTwoCellTwoLinkTarget).'">
                            <p class="panel-2-cell-meta">'.esc_html($panelTwoCellTwoLinkTitle).'</p></a>';
                            }elseif ($panelTwoCellTwoConditional == 'video') {
                                echo '<p class="panel-2-cell-meta">'.$panelTwoCellTwoMeta .'</p>';
                            }
                        } else {
                            echo '<p>You missed something, partner! Pleae select "Image" or "Video" in the page editor.</p>';
                        }
                        if (!empty($panelTwoCellTwoConditional)) {
                            if ($panelTwoCellTwoConditional == 'image') {
                                echo '<p>'.$panelTwoCellTwoImageTeaser.'</p>';
                            }elseif ($panelTwoCellTwoConditional == 'video') {
                                echo '<p>'.$panelTwoCellTwoTeaser.'</p>';
                            }
                        }
                        ?>
                    </div>
                    <div class="panel-cell-2 display-block">
                        <?php 
                        if (!empty($panelTwoCellThreeConditional)) {
                            if ($panelTwoCellThreeConditional == 'image') {
                                if ($panelTwoCellThreeImage) {
                                    $size = 'home-grid';
                                    echo '<a class="cell-image-link" href="'.esc_url($panelTwoCellThreeLinkUrl).'" class="white-cell-link"
                                    target="'.esc_attr($panelTwoCellThreeLinkTarget).'"><img src="'.$panelTwoCellThreeImage['sizes'][$size].'" title="'.$panelTwoCellThreeImage['title'].'" alt="'.$panelTwoCellThreeImage['alt'].'"></a>';
                                }                           
                            } elseif ($panelTwoCellThreeConditional == 'video'){
                                echo $panelTwoCellThreeMedia;
                            }
                        } else {
                            echo '<p>You missed something, partner! Pleae select "Image" or "Video" in the page editor.</p>';
                        } 
                        if (!empty($panelTwoCellThreeConditional)) {
                            if ($panelTwoCellThreeConditional == 'image') {
                              echo '<a class="cell-meta-link" href="'.esc_url($panelTwoCellThreeLinkUrl).'"
                            target="'.esc_attr($panelTwoCellThreeLinkTarget).'">
                            <p class="panel-2-cell-meta">'.esc_html($panelTwoCellThreeLinkTitle).'</p></a>';
                            }elseif ($panelTwoCellThreeConditional == 'video') {
                                echo '<p class="panel-2-cell-meta">'.$panelTwoCellThreeMeta .'</p>';
                            }
                        } else {
                            echo '<p>You missed something, partner! Pleae select "Image" or "Video" in the page editor.</p>';
                        }
                        if (!empty($panelTwoCellThreeConditional)) {
                            if ($panelTwoCellThreeConditional == 'image') {
                                echo '<p>'.$panelTwoCellThreeImageTeaser.'</p>';
                            }elseif ($panelTwoCellThreeConditional == 'video') {
                                echo '<p>'.$panelTwoCellThreeTeaser.'</p>';
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </section>
        <section class="panel panel-three front-page-white-panel">
            <div class="wrap">
                <div class="flex-wrap">
                    <div class="panel-heading">
                        <h2><?php echo $panelThreeHead ?></h2>
                        <p><?php echo $panelThreeSubhead ?></p>
                    </div>
                </div>
                <div class="flex-wrap">
                    <div class="panel-cell-1">
                        <?php echo $panelThreeCellOneMedia ?>
                        <a href="<?php echo esc_url($panelThreeCellOneLinkUrl); ?>" class="white-cell-link"
                            target="<?php esc_attr($panelThreeCellOneLinkTarget); ?>">
                            <p><?php echo esc_html($panelThreeCellOneLinkTitle); ?></p>
                        </a>
                        <p><?php echo $panelThreeCellOneTeaser ?></p>
                    </div>
                    <div class="panel-cell-1">
                        <?php echo $panelThreeCellTwoMedia ?>
                        <a href="<?php echo esc_url($panelThreeCellTwoLinkUrl); ?>" class="white-cell-link"
                            target="<?php esc_attr($panelThreeCellTwoLinkTarget); ?>">
                            <p><?php echo esc_html($panelThreeCellTwoLinkTitle); ?></p>
                        </a>
                        <p><?php echo $panelThreeCellTwoTeaser ?></p>
                    </div>
                </div>
            </div>
        </section>
    </main><!-- #main -->
</div><!-- #primary -->
<?php
get_footer();