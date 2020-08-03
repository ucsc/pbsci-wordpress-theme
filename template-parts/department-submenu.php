<?php
$parent = get_post();

// If there is no "current post", then bail.
if ( !$parent ) {
	return;
}

// Find the most-parent item of the current post.
while ( $parent->post_parent > 0 ) {
	$parent = get_post( $parent->post_parent );
}
$children = get_posts( [
	'post_type' => 'department',
	'post_parent' => $parent->ID,
	'orderby' => 'menu_order',
	'order' => 'ASC',
] );

// If the parent has no children, bail.
if ( empty( $children ) ) {
	return;
}

$parent_active_class = $parent->ID === $post->ID ? 'active' : '';
$parent_title = get_field('department_menu_label', $parent->ID);
if ( empty( trim( $parent_title ) ) ) {
	$parent_title = get_the_title( $parent );
}
?>
    <div class="mobile-menu-toggle">Department Menu</div>
    <div class="mobile-menu-expandable">
        <ul class="department-submenu department-submenu--parent-<?php echo $parent->post_name ?>">
            <li class="department-submenu-item parent <?php echo $parent_active_class ?>">
                <a href="<?php echo get_permalink( $parent ) ?>"><?php echo $parent_title ?></a>
            </li>
            <?php foreach( $children as $child_post ) : ?>
                <?php $active_class = $child_post->ID === $post->ID ? 'active' : ''; ?>
                <li class="department-submenu-item child <?php echo $active_class ?>">
                    <a href="<?php echo get_permalink( $child_post ) ?>"><?php echo get_the_title( $child_post ) ?></a>
                </li>
            <?php endforeach ?>
        </ul>
    </div>
