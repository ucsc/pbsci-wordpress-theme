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

get_header();

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
        //Panel One Cell One
        if (have_rows('panel_one_cell_one')) :
            while (have_rows('panel_one_cell_one')) : the_row();
                $panelOneCellOneMedia = get_sub_field('p1_cell_one_media');
            endwhile;
        endif;
        //Panel Two Cell Two
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
        //Panel Two Cell One
        $panelTwoCellOneConditional = get_sub_field('p2_cell_one_image_or_video');
        $panelTwoCellOneMedia = get_sub_field('p2_cell_one_media');
        $panelTwoCellOneMeta = get_sub_field('p2_cell_one_meta');
        $panelTwoCellOneTeaser = get_sub_field('p2_cell_one_teaser');
        $panelTwoCellOneImage = get_sub_field('p2_cell_one_image');
        if ($panelTwoCellOneImage) :
            $size = 'home-grid';
            $panelTwoCellOneImageSrc = $panelTwoCellOneImage['sizes'][$size];
            $panelTwoCellOneImageAlt = $panelTwoCellOneImage['alt'];
            $panelTwoCellOneImageTitle = $panelTwoCellOneImage['title'];
        endif;
        $panelTwoCellOneImageTeaser = get_sub_field('p2_cell_one_image_teaser');
        $panelTwoCellOneLink = get_sub_field('p2_cell_one_link');
        if ($panelTwoCellOneLink) :
            $panelTwoCellOneLinkTitle = $panelTwoCellOneLink['title'];
            $panelTwoCellOneLinkUrl = $panelTwoCellOneLink['url'];
            $panelTwoCellOneLinkTarget = $panelTwoCellOneLink['target'] ? $panelTwoCellOneLink['target'] : '_self';
        endif;
        //Panel Two Cell Two
        $panelTwoCellTwoConditional = get_sub_field('p2_cell_two_image_or_video');
        $panelTwoCellTwoMedia = get_sub_field('p2_cell_two_media');
        $panelTwoCellTwoMeta = get_sub_field('p2_cell_two_meta');
        $panelTwoCellTwoTeaser = get_sub_field('p2_cell_two_teaser');
        $panelTwoCellTwoImage = get_sub_field('p2_cell_two_image');
        if ($panelTwoCellTwoImage) :
            $size = 'home-grid';
            $panelTwoCellTwoImageSrc = $panelTwoCellTwoImage['sizes'][$size];
            $panelTwoCellTwoImageAlt = $panelTwoCellTwoImage['alt'];
            $panelTwoCellTwoImageTitle = $panelTwoCellTwoImage['title'];
        endif;
        $panelTwoCellTwoImageTeaser = get_sub_field('p2_cell_two_image_teaser');
        $panelTwoCellTwoLink = get_sub_field('p2_cell_two_link');
        if ($panelTwoCellTwoLink) :
            $panelTwoCellTwoLinkTitle = $panelTwoCellTwoLink['title'];
            $panelTwoCellTwoLinkUrl = $panelTwoCellTwoLink['url'];
            $panelTwoCellTwoLinkTarget = $panelTwoCellTwoLink['target'] ? $panelTwoCellTwoLink['target'] : '_self';
        endif;
        //Panel Two Cell Three
        $panelTwoCellThreeConditional = get_sub_field('p2_cell_three_image_or_video');
        $panelTwoCellThreeMedia = get_sub_field('p2_cell_three_media');
        $panelTwoCellThreeMeta = get_sub_field('p2_cell_three_meta');
        $panelTwoCellThreeTeaser = get_sub_field('p2_cell_three_teaser');
        $panelTwoCellThreeImage = get_sub_field('p2_cell_three_image');
        if ($panelTwoCellThreeImage) :
            $size = 'home-grid';
            $panelTwoCellThreeImageSrc = $panelTwoCellThreeImage['sizes'][$size];
            $panelTwoCellThreeImageAlt = $panelTwoCellThreeImage['alt'];
            $panelTwoCellThreeImageTitle = $panelTwoCellThreeImage['title'];
        endif;
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
        //Panel Three Cell One
        $panelThreeCellOneConditional = get_sub_field('p3_cell_one_image_or_video');
        $panelThreeCellOneMedia = get_sub_field('p3_cell_one_media');
        $panelThreeCellOneMeta = get_sub_field('p3_cell_one_meta');
        $panelThreeCellOneTeaser = get_sub_field('p3_cell_one_teaser');
        $panelThreeCellOneImage = get_sub_field('p3_cell_one_image');
        if ($panelThreeCellOneImage) :
            $size = 'home-grid';
            $panelThreeCellOneImageSrc = $panelThreeCellOneImage['sizes'][$size];
            $panelThreeCellOneImageAlt = $panelThreeCellOneImage['alt'];
            $panelThreeCellOneImageTitle = $panelThreeCellOneImage['title'];
        endif;
        $panelThreeCellOneImageTeaser = get_sub_field('p3_cell_one_image_teaser');
        $panelThreeCellOneLink = get_sub_field('p3_cell_one_link');
        if ($panelThreeCellOneLink) :
            $panelThreeCellOneLinkTitle = $panelThreeCellOneLink['title'];
            $panelThreeCellOneLinkUrl = $panelThreeCellOneLink['url'];
            $panelThreeCellOneLinkTarget = $panelThreeCellOneLink['target'] ? $panelThreeCellOneLink['target'] : '_self';
        endif;
        $panelThreeCellOneTeaser = get_sub_field('p3_cell_one_teaser');
        //Panel Three Cell Two
        $panelThreeCellTwoConditional = get_sub_field('p3_cell_two_image_or_video');
        $panelThreeCellTwoMedia = get_sub_field('p3_cell_two_media');
        $panelThreeCellTwoMeta = get_sub_field('p3_cell_two_meta');
        $panelThreeCellTwoTeaser = get_sub_field('p3_cell_two_teaser');
        $panelThreeCellTwoImage = get_sub_field('p3_cell_two_image');
        if ($panelThreeCellTwoImage) :
            $size = 'home-grid';
            $panelThreeCellTwoImageSrc = $panelThreeCellTwoImage['sizes'][$size];
            $panelThreeCellTwoImageAlt = $panelThreeCellTwoImage['alt'];
            $panelThreeCellTwoImageTitle = $panelThreeCellTwoImage['title'];
        endif;
        $panelThreeCellTwoImageTeaser = get_sub_field('p3_cell_two_image_teaser');
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
                            <div class="panel-cell-1 flex-wrap panel-cell-quarter display-block">
                                <a class="" href="<?php echo esc_url($panelOneCellTwoQuadOneLinkUrl); ?>">
                                    <i class="fas fa-<?php echo $panelOneCellTwoQuadOneIcon ?>"
                                        style="color:<?php echo $panelOneCellTwoQuadOneIconColor ?>"></i>
                                    <p><?php echo $panelOneCellTwoQuadOneLinkTitle; ?></p>
                                </a>
                            </div>
                            <div class="panel-cell-1 flex-wrap panel-cell-quarter display-block">
                                <a class="" href="<?php echo esc_url($panelOneCellTwoQuadTwoLinkUrl); ?>">
                                    <i class="fas fa-<?php echo $panelOneCellTwoQuadTwoIcon ?>"
                                        style="color:<?php echo $panelOneCellTwoQuadTwoIconColor ?>"></i>
                                    <p><?php echo $panelOneCellTwoQuadTwoLinkTitle; ?></p>
                                </a>
                            </div>
                        </div>
                        <div class="flex-wrap">
                            <div class="panel-cell-1 flex-wrap panel-cell-quarter display-block">
                                <a class="" href="<?php echo esc_url($panelOneCellTwoQuadThreeLinkUrl); ?>">
                                    <i class="fas fa-<?php echo $panelOneCellTwoQuadThreeIcon ?>"
                                        style="color:<?php echo $panelOneCellTwoQuadThreeIconColor ?>"></i>
                                    <p><?php echo $panelOneCellTwoQuadThreeLinkTitle; ?></p>
                                </a>
                            </div>
                            <div class="panel-cell-1 flex-wrap panel-cell-quarter display-block">
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
                                    echo '<a class="cell-image-link" href="'.esc_url($panelTwoCellOneLinkUrl).'" class="white-cell-link"
                                    target="'.esc_attr($panelTwoCellOneLinkTarget).'"><img src="'.$panelTwoCellOneImageSrc.'" title="'.$panelTwoCellOneImageTitle.'" alt="'.$panelTwoCellOneImageAlt.'"></a>';
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
                            target="'.esc_attr($panelTwoCellOneLinkTarget).'">'.esc_html($panelTwoCellOneLinkTitle).'</a>';
                            }elseif ($panelTwoCellOneConditional == 'video') {
                                echo '<p class="cell-meta">'.$panelTwoCellOneMeta .'</p>';
                            }
                        } else {
                            echo '<p>You missed something, partner! Pleae select "Image" or "Video" in the page editor.</p>';
                        }
                        if (!empty($panelTwoCellOneConditional)) {
                            if ($panelTwoCellOneConditional == 'image') {
                                echo '<p class="cell-teaser">'.$panelTwoCellOneImageTeaser.'</p>';
                            }elseif ($panelTwoCellOneConditional == 'video') {
                                echo '<p class="cell-teaser">'.$panelTwoCellOneTeaser.'</p>';
                            }
                        }
                        ?>
                    </div>
                    <div class="panel-cell-2 display-block">
                        <?php 
                        if (!empty($panelTwoCellTwoConditional)) {
                            if ($panelTwoCellTwoConditional == 'image') {
                                if ($panelTwoCellTwoImage) {
                                    echo '<a class="cell-image-link" href="'.esc_url($panelTwoCellTwoLinkUrl).'" class="white-cell-link"
                                    target="'.esc_attr($panelTwoCellTwoLinkTarget).'"><img src="'.$panelTwoCellTwoImageSrc.'" title="'.$panelTwoCellTwoImageTitle.'" alt="'.$panelTwoCellTwoImageAlt.'"></a>';
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
                            target="'.esc_attr($panelTwoCellTwoLinkTarget).'">'.esc_html($panelTwoCellTwoLinkTitle).'</a>';
                            }elseif ($panelTwoCellTwoConditional == 'video') {
                                echo '<p class="cell-meta">'.$panelTwoCellTwoMeta .'</p>';
                            }
                        } else {
                            echo '<p>You missed something, partner! Pleae select "Image" or "Video" in the page editor.</p>';
                        }
                        if (!empty($panelTwoCellTwoConditional)) {
                            if ($panelTwoCellTwoConditional == 'image') {
                                echo '<p class="cell-teaser">'.$panelTwoCellTwoImageTeaser.'</p>';
                            }elseif ($panelTwoCellTwoConditional == 'video') {
                                echo '<p class="cell-teaser">'.$panelTwoCellTwoTeaser.'</p>';
                            }
                        }
                        ?>
                    </div>
                    <div class="panel-cell-2 display-block">
                        <?php 
                        if (!empty($panelTwoCellThreeConditional)) {
                            if ($panelTwoCellThreeConditional == 'image') {
                                if ($panelTwoCellThreeImage) {
                                    echo '<a class="cell-image-link" href="'.esc_url($panelTwoCellThreeLinkUrl).'" class="white-cell-link"
                                    target="'.esc_attr($panelTwoCellThreeLinkTarget).'"><img src="'.$panelTwoCellThreeImageSrc.'" title="'.$panelTwoCellThreeImageTitle.'" alt="'.$panelTwoCellThreeImageAlt.'"></a>';
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
                            target="'.esc_attr($panelTwoCellThreeLinkTarget).'">'.esc_html($panelTwoCellThreeLinkTitle).'</a>';
                            }elseif ($panelTwoCellThreeConditional == 'video') {
                                echo '<p class="cell-meta">'.$panelTwoCellThreeMeta .'</p>';
                            }
                        } else {
                            echo '<p>You missed something, partner! Pleae select "Image" or "Video" in the page editor.</p>';
                        }
                        if (!empty($panelTwoCellThreeConditional)) {
                            if ($panelTwoCellThreeConditional == 'image') {
                                echo '<p class="cell-teaser">'.$panelTwoCellThreeImageTeaser.'</p>';
                            }elseif ($panelTwoCellThreeConditional == 'video') {
                                echo '<p class="cell-teaser">'.$panelTwoCellThreeTeaser.'</p>';
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
                    <div class="panel-cell-1 display-block">
                    <?php
                    if (!empty($panelThreeCellOneConditional)) {
                            if ($panelThreeCellOneConditional == 'image') {
                                if ($panelThreeCellOneImage) {
                                    echo '<a class="cell-image-link" href="'.esc_url($panelThreeCellOneLinkUrl).'" class="white-cell-link"
                                    target="'.esc_attr($panelThreeCellOneLinkTarget).'"><img src="'.$panelThreeCellOneImageSrc.'" title="'.$panelThreeCellOneImageTitle.'" alt="'.$panelThreeCellOneImageAlt.'"></a>';
                                }                           
                            } elseif ($panelThreeCellOneConditional == 'video'){
                                echo $panelThreeCellOneMedia;
                            }
                        } else {
                            echo '<p>You missed something, partner! Pleae select "Image" or "Video" in the page editor.</p>';
                        } 
                        if (!empty($panelThreeCellOneConditional)) {
                            if ($panelThreeCellOneConditional == 'image') {
                              echo '<a class="cell-meta-link" href="'.esc_url($panelThreeCellOneLinkUrl).'"
                            target="'.esc_attr($panelThreeCellOneLinkTarget).'">
                            '.esc_html($panelThreeCellOneLinkTitle).'</a>';
                            } elseif ($panelThreeCellOneConditional == 'video') {
                                echo '<p class="cell-meta">'.$panelThreeCellOneMeta .'</p>';
                            }
                        } else {
                            echo '<p>You missed something, partner! Pleae select "Image" or "Video" in the page editor.</p>';
                        }
                        if (!empty($panelThreeCellOneConditional)) {
                            if ($panelThreeCellOneConditional == 'image') {
                                echo '<p class="cell-teaser">'.$panelThreeCellOneImageTeaser.'</p>';
                            }elseif ($panelThreeCellOneConditional == 'video') {
                                echo '<p class="cell-teaser">'.$panelThreeCellOneTeaser.'</p>';
                            }
                        }
                        ?>
                    </div>
                    <div class="panel-cell-1 display-block">
                    <?php
                    if (!empty($panelThreeCellTwoConditional)) {
                            if ($panelThreeCellTwoConditional == 'image') {
                                if ($panelThreeCellTwoImage) {
                                    echo '<a class="cell-image-link" href="'.esc_url($panelThreeCellTwoLinkUrl).'" class="white-cell-link"
                                    target="'.esc_attr($panelThreeCellTwoLinkTarget).'"><img src="'.$panelThreeCellTwoImageSrc.'" title="'.$panelThreeCellTwoImageTitle.'" alt="'.$panelThreeCellTwoImageAlt.'"></a>';
                                }                           
                            } elseif ($panelThreeCellTwoConditional == 'video'){
                                echo $panelThreeCellTwoMedia;
                            }
                        } else {
                            echo '<p>You missed something, partner! Pleae select "Image" or "Video" in the page editor.</p>';
                        } 
                        if (!empty($panelThreeCellTwoConditional)) {
                            if ($panelThreeCellTwoConditional == 'image') {
                              echo '<a class="cell-meta-link" href="'.esc_url($panelThreeCellTwoLinkUrl).'"
                            target="'.esc_attr($panelThreeCellTwoLinkTarget).'">
                            '.esc_html($panelThreeCellTwoLinkTitle).'</a>';
                            } elseif ($panelThreeCellTwoConditional == 'video') {
                                echo '<p class="cell-meta">'.$panelThreeCellTwoMeta .'</p>';
                            }
                        } else {
                            echo '<p>You missed something, partner! Pleae select "Image" or "Video" in the page editor.</p>';
                        }
                        if (!empty($panelThreeCellTwoConditional)) {
                            if ($panelThreeCellTwoConditional == 'image') {
                                echo '<p class="cell-teaser">'.$panelThreeCellTwoImageTeaser.'</p>';
                            }elseif ($panelThreeCellTwoConditional == 'video') {
                                echo '<p class="cell-teaser">'.$panelThreeCellTwoTeaser.'</p>';
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </section>
    </main><!-- #main -->
</div><!-- #primary -->
<?php
get_footer();