<?php
/**
 * Default template for posts show in filterable content pages.
 * 
 * Override this template per post-type by copy it to a new file named:
 * filterable-content-row-<post type>.php 
 * 
 * For example, filterable-content-row-department.php
 * 
 * --- Variables
 * $row_classes | array css class names (terms and whatnot).
 */
if ( !isset( $row_classes ) ) {
	$row_classes = [];
}
?>
<div class="card-container <?php echo implode(' ', $row_classes); ?>">
    <?php the_post_thumbnail('filterable-thumb'); ?>
	<div class="card-content">
		<div class="card-header">
			<a href="<?php echo esc_url( get_permalink() ) ?>">
				<h3><?php echo get_the_title() ?></h3>
			</a>
		</div>
		<div class="card-blurb">
			<?php echo get_the_excerpt() ?> 
		</div>
	</div>
</div>
