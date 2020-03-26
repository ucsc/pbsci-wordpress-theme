<?php

/**
 * Template part for displaying all visibile CTAs
 *
 * @package UCSC_PBSci
 */

$ctas = ucsc_cta_get_visible_ctas();

foreach ( $ctas as $ID => $cta ) {
	$ctaGroup = get_field( 'cta_fields', $ID );
	$style = '';
	if ( !empty( $ctaGroup['cta_background_image'] ) ) {
		$style = "background-image: url('{$ctaGroup['cta_background_image']['url']}')";
	}
	?>
	<aside class="panel cta" style="<?php echo $style ?>">
		<div class="wrap">
			<div class="cta-container">
				<div class="cta-headline">
					<?php if ( !empty( $ctaGroup['cta_heading_1'] ) ) : ?> 
						<p class="cta-p1"><?php echo $ctaGroup['cta_heading_1'] ?></p>
					<?php endif ?>
					<?php if ( !empty( $ctaGroup['cta_heading_2'] ) ) : ?> 
						<p class="cta-p2"><?php echo $ctaGroup['cta_heading_2'] ?></p>
					<?php endif ?>
				</div>
				<?php if ( !empty( $ctaGroup['cta_body'] ) ) : ?>
					<p class="cta-p3"><?php echo $ctaGroup['cta_body'] ?></p>
				<?php endif ?>
				<?php if ( !empty($ctaGroup['cta_button']) ) : ?>
					<a class="button cta-button" href="<?php echo $ctaGroup['cta_button']['url'] ?>"><i class="fas fa-check"></i><?php echo $ctaGroup['cta_button']['title'] ?></a>
				<?php endif ?>
				<div class="clear"></div>
			</div>
		</div>
	</aside>
	<?php
}
