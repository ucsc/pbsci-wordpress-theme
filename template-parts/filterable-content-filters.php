<?php

/**
 * Field filters
 */
$field_filters = get_field('fc_filter_field');

if ( !empty( $field_filters ) && is_array( $field_filters ) ) {
	$field_names = array_column( $field_filters, 'filter_field' );
	foreach ($field_filters as $filter) {
		$filter_group = ucsc_make_slug($filter['filter_label']);
		$field = acf_get_field( $filter['filter_field'] );
		if ( empty( $field['choices'] ) ) {
			continue;
		}
	
		?>
		<div class="filter">
		<label class="sr-only" for="filter-<?php echo $filter_group; ?>"><?php echo $filter['filter_label'] ?></label>
			<select data-filter-group="<?php echo $filter_group; ?>" data-placeholder="<?php echo $filter['filter_label']; ?>" class="select-filter" id="filter-<?php echo $filter_group; ?>" name="<?php echo $filter_group; ?>">
				<option></option>
				<option value="reset" data-filter="reset">- Show all -</option>
				<?php foreach ($field['choices'] as $choice_key => $choice_label ) : ?>
				<option data-filter="<?php echo esc_attr($choice_key ) ?>" value="<?php echo esc_attr($choice_key ) ?>"><?php echo esc_html($choice_label) ?></option>
				<?php endforeach ?>
			</select>
		</div>
		<?php
	}
}

/**
 * Taxonomy filters
 */
$taxonomy_filters = get_field('fc_filter_taxonomy');

if ( !empty( $taxonomy_filters ) ) {
	foreach ($taxonomy_filters as $filter) {
		$filter_group = ucsc_make_slug($filter['filter_label']);
		$terms = get_terms( [
			'taxonomy' => $filter['filter_taxonomy'],
			'hide_empty' => false,
		] );
	
		if (empty($terms)) {
			continue;
		}  
	
		?>
		<div class="filter">
		<label class="sr-only" for="filter-<?php echo $filter_group; ?>"><?php echo $filter['filter_label'] ?></label>
			<select data-filter-group="<?php echo $filter_group; ?>" data-placeholder="<?php echo $filter['filter_label']; ?>" class="select-filter" id="filter-<?php echo $filter_group; ?>" name="<?php echo $filter_group; ?>">
				<option></option>
				<option value="reset" data-filter="reset">- Show all -</option>
				<?php foreach ($terms as $term) : ?>
				<option data-filter="<?php echo esc_attr($term->slug) ?>" value="<?php echo esc_attr($term->slug) ?>"><?php echo esc_html($term->name) ?></option>
				<?php endforeach ?>
			</select>
		</div>
		<?php
	}
}

/*
 * Departments filter
 */ 
if ( get_field('fc_filter_department') ) {
	$departments_by_category = ucsc_get_departments_by_category();
	?>
	<div class="filter">
	<label class="sr-only" for="filter-department">Department/Unit</label>
		<select data-filter-group="department" data-placeholder="Department/Unit" class="select-filter" id="filter-department" name="department">
			<option></option>
			<option value="reset" data-filter="reset">- Show all -</option>
			<?php foreach ($departments_by_category as $name => $departments) : ?>
				<optgroup label="<?php echo esc_attr($name) ?>">
					<?php foreach ($departments as $department) : ?>
					<option data-filter="<?php echo esc_attr($department->post_name) ?>" value="<?php echo esc_attr($department->post_name) ?>"><?php echo esc_html($department->post_title) ?></option>
					<?php endforeach ?>
				</optgroup>
			<?php endforeach ?>
		</select>
	</div>
	<?php
}

/*
 * Search filter
 */ 
if ( get_field('fc_filter_search') ) {
	?>
	<div class="filter">
		<label class="sr-only" for="filter-search">Search</label>
		<input type="text" id="filter-search" name="search" placeholder="Search">
	</div>
	<?php
}

/*
 * Reset Button
 */ 
if ( get_field('fc_filter_reset') ) {
	?>
	<div class="filter button-container">
		<button id="filter-reset" name="reset">Clear all filters</button>
	</div>
	<?php
}
