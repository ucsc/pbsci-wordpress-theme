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
	$degrees = get_field('degrees_offered');

	// First we need a list of degrees that we display in order of importance - some field options shouldn't be displayed on this page
	$degrees_map = [
		'phd' => [
			'name' => 'Ph.D.',
			'class' => 'phd',
		],
		'ma' => [
			'name' => 'M.A.',
			'class' => 'ma',
		],
		'ms' => [
			'name' => 'M.S.',
			'class' => 'ms',
		],
		'designatedemphasis' => [
			'name' => 'D.E.',
			'class' => 'bs',
		],
		'contig' => [
			'name' => '4+1',
			'class' => 'ma',
		],
		'ba' => [
			'name' => 'B.A.',
			'class' => 'ba',
		],
		'bs' => [
			'name' => 'B.S.',
			'class' => 'bs',
		],
		'undergradminor' => [
			'name' => 'Min.',
			'class' => 'minor',
		],
	];

if ( !isset( $row_classes ) ) {
	$row_classes = [];
}
?>
<div class="card-container <?php echo implode(' ', $row_classes); ?>">
    <?php the_post_thumbnail('filterable-thumb'); ?>
	<div class="card-content">
		<div class="card-header">
			<a href="<?php echo esc_url( get_permalink() ) ?>"><h3><?php echo get_the_title() ?></h3></a>
		</div>
		<div class="card-blurb card-degrees-offered">
		<?php if ( !empty( $degrees ) && is_array( $degrees ) ) : ?>
			<ul class="card-list flex-wrap">
			<?php foreach ($degrees_map as $degree => $details) : ?>
				<?php if (in_array( $degree, $degrees )) : ?>
				<li class="<?php echo $details['class']; ?>"><?php echo $details['name']; ?></li>
				<?php endif ?>
			<?php endforeach ?>
			</ul>
		<?php endif ?>
		</div>
	</div>
</div>
