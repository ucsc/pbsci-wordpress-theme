<?php
/**
 * Template part for "Impact Science" Call To Action
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package UC_Santa_Cruz
 */

if (class_exists('acf')){
    $ctaGroup = get_field('call_to_action','option');
    if($ctaGroup) {
        $ctaHead1 = $ctaGroup['cta_heading_1'];
        $ctaHead2 = $ctaGroup['cta_heading_2'];
        $ctaBody = $ctaGroup['cta_body'];
        $ctaButton = $ctaGroup['cta_button'];
        $ctaButtonLink = $ctaButton['url'];
        $ctaButtonText = $ctaButton['title'];
        $ctaImage = $ctaGroup['cta_background_image'];
        $ctaImageLink = $ctaImage['url'];
    }
}
//var_dump($ctaImage);
?>
<aside class="panel cta" style="background: url('<?php echo $ctaImageLink ?>') no-repeat top">
    <div class="wrap">
        <div class="cta-container">
        <div class="cta-headline"><p class="cta-p1"><?php echo $ctaHead1 ?></p><p class="cta-p2"><?php echo $ctaHead2 ?></p></div>
        <p class="cta-p3"><?php echo $ctaBody ?></p><a class="button cta-button" href="<?php echo $ctaButtonLink ?>"><i class="fas fa-check"></i><?php echo $ctaButtonText ?></a><div class="clear"></div>
        </div>
    </div>
</aside>