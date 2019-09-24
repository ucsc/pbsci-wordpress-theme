<?php

/**
 * Template part for displaying filtering options
 *
 * for Faculty and Researcher Labs CPT
 *
 * template part added from content-links.php
 *
 *  @package UC_Santa_Cruz
 */

// debug
// $meta = get_post_meta($post->ID);
// echo '<pre>';
// var_dump($values);
// echo '</pre>'

// end debug

// load taxonomy slugs into variables
$postTax1 = 'resesarch-group-location-tax';
$postTax2 = 'resesarch-area-expertise-tax';
// IDs
$selectID = 'research_groups_list';
$tax1ID = 'research-group-location';
$tax2ID = 'research-group-expertise';
// select value for null / top select drop-down values
$taxTitle1 = 'Locations';
$taxTitle2 = 'Expertise';
// all taxonomy terms per taxonomy -- used to build select
$taxTerms1 = get_terms($postTax1, ['hide_empty' => false]);
$taxTerms2 = get_terms($postTax2, ['hide_empty' => false]);

?>
<h3 class="filter-head">Filter this list:</h3>
<ul class="filter-list no-list-style">
    <li>
        <select class="filter-select" id="<?php echo $tax1ID ?>">
            <option selected="selected" value="clear"><?php echo $taxTitle1 ?></option>
            <?php if ($taxTerms1) {
                foreach ($taxTerms1 as $taxTerm1) {
                    echo '<option value="' . $taxTerm1->slug . '">' . $taxTerm1->name . '</option>';
                }
            } ?>
        </select>
    </li>
    <li>
        <select class="filter-select" id="<?php echo $tax2ID ?>">
            <option selected="selected" value="clear"><?php echo $taxTitle2 ?></option>
            <?php if ($taxTerms2) {
                foreach ($taxTerms2 as $taxTerm2) {
                    echo '<option value="' . $taxTerm2->slug . '">' . $taxTerm2->name . '</option>';
                }
            } ?>
        </select>
    </li>
    <li>
        <select class="filter-select" id="researcher-faculty-department-select3">
            <option selected="selected" value="clear">Department</option>
            <?php
            $depargs = array(
                'post_type' => 'department',
                'orderby' => 'title',
                'order' => 'ASC',
                'posts_per_page' => '-1'
            );
            $departmentsList = get_posts($depargs);

            if ($departmentsList) {
                foreach ($departmentsList as $department) {
                    $deptSlug = $department->post_name;
                    $deptTitle = $department->post_title;
                    echo '<option value="' . $deptSlug . '">' . $deptTitle . '</option>';
                }
            }
            ?>

        </select>
    </li>
    <li>
        <input type="search" class="search" id="res-grp-search" placeholder="Search by keyword" />
    </li>
    <li>
        <input value="Clear all filters" type="reset" class="primary filter-clear" id="res-grp-clear">
    </li>
</ul>