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
<aside class="panel cta" style="background-image: url(<?php echo $ctaImageLink ?>)">
    <div class="wrap">
        <div class="cta-container">
        <div class="cta-headline"><p class="cta-p1">do you</p><p class="cta-p2">Love science?</p></div>
        <p class="cta-p3"><?php echo $ctaBody ?></p><a class="button" href="<?php echo $ctaButtonLink ?>"><i class="fas fa-check"></i><?php echo $ctaButtonText ?></a><div class="clear"></div>
        </div>
    </div>
</aside>